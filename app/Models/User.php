<?php

namespace App\Models;

use App\Helpers\Friendships\Friendable;
use App\Helpers\Groupships\Groupable;
use App\Helpers\MapSearch\MapSearchStatus;
use App\Helpers\Messages\Messagable;
use App\Helpers\Messages\MessagableStatus;
use App\Helpers\Posts\PostTypes;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, Friendable, Messagable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'full_name',
        'newsletter',
        'posts',
        'friends',
        'visits',
        'last_seen',
        'email_verified_at',
        'admin',
        'blocked_at',
        'avatar',
        'loc_address',
        'latitude',
        'longitude',
        'admin_message'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'birthday' => 'datetime',
        'email_verified_at' => 'datetime',
        'last_seen' => 'datetime',
    ];

    /**
     * Accessors & Mutators.
     *
     *
     */
    public function getJoinedDate(){
        return Carbon::parse($this->created_at)->format('F dS, Y');
    }
    public function getBirthdayDate(){
        if($this->birthday){
            return Carbon::parse($this->birthday)->format('F dS, Y');
        }else{
            return null;
        }
    }
    public function getAgeInYears()
    {
        if($this->birthday){
            return Carbon::parse($this->birthday)->age;
        }else{
            return null;
        }
    }

    public function getSinceSeen(){
        if($this->last_seen){
        return $this->time_elapsed_string($this->last_seen, $full = false);
        }else{
            return '-';
        }
    }

    public function getPendingFriends(){
        $pendingFriendships = $this->getFriendRequests();
        $pendingFriends = array();
        foreach ($pendingFriendships as $pendingFriendship){
            array_push($pendingFriends, User::find($pendingFriendship->sender_id));
        }
        return $pendingFriends;
    }

    public function getRequestingFriends(){
        $requestingFriendships = $this->getPendingFriendRequests();
        $requestingFriends = array();
        foreach ($requestingFriendships as $requestingFriendship){
            array_push($requestingFriends, User::find($requestingFriendship->recipient_id));
        }
        return $requestingFriends;
    }

    public function getBlockedFriends(){
        $blockedFriendships = $this->getBlockedFriendships();
        $blockedFriends = array();
        foreach ($blockedFriendships as $blockedFriendship){
            array_push($blockedFriends, User::find($blockedFriendship->recipient_id));
        }
        return $blockedFriends;
    }

    public function getMessageableFriendsv2(){
        $messagedFriendsIds = $this->getMessagedFriendsIds();
        $friendsIds = $this->getFriendsIds();
        $messagedFriendsIds = array_unique(array_merge($friendsIds, $messagedFriendsIds));
        $friends = User::where('id', '!=', $this->getKey())->whereIn('id', $messagedFriendsIds)->select('username as name', 'full_name as fullName', 'avatar', 'gender', 'last_seen as lastSeen', 'privacy_chat_activity as status')->get();
        foreach ($friends as $friend){
            //array_push($messagedFriendsIds, $thread->participants()->where("user_id", "!=", $this->getKey())->pluck('user_id')->first());
            $friend->messages = $this->getMessagesWithUser($friend);

        }
        return $friends;
    }

    public function getMessageableFriends(){
        $friendsId = [];
        $friends = [];
        $userThreads = $this->threads()->orderBy('updated_at', 'desc')->get();
        foreach($userThreads as $userThread){
            $friendId = $userThread->participants()->where("user_id", "!=", $this->getKey())->pluck('user_id')->first();
            $friend = User::where('id', $friendId)->select('id', 'username as name', 'full_name as fullName', 'avatar', 'gender', 'last_seen as lastSeen', 'privacy_chat_activity as status')->first();
            $friend->lastMessage = $userThread->messages()->latest()->select('user_id as id', 'body as text', 'created_at as time', )->first();
            $friend->messages = $userThread->messages()->select('user_id as id', 'body as text', 'created_at as time', )->get();
                // array_push($messagedFriendsIds, $thread->participants()->where("user_id", "!=", $this->getKey())->pluck('user_id')->first());
            array_push($friendsId, $friendId);
            array_push($friends, $friend);
        }
        $friendsNoThreadsId = $this->getFriendsIds();
        $friendsNoThreadsIdUnique= [];
        foreach ($friendsNoThreadsId as $friendNoThreadsId){
            if (!in_array($friendNoThreadsId, $friendsId)) {
                /*$friend = User::where('id', $friendNoThreadsId)->select('username as name', 'full_name as fullName', 'avatar', 'gender', 'last_seen as lastSeen', 'privacy_chat_activity as status')->first();
                $friend->lastMessage = null;
                array_push($friends, $friend);*/
                array_push($friendsNoThreadsIdUnique, $friendNoThreadsId);
            }
        }
        $friendsNoThreads = User::whereIn('id', $friendsNoThreadsIdUnique)->orderBy('last_seen', 'desc')->select('id', 'username as name', 'full_name as fullName', 'avatar', 'gender', 'last_seen as lastSeen', 'privacy_chat_activity as status')->get()->toArray();
        $friends = array_merge($friends, $friendsNoThreads);
        return $friends;
    }

    public function getMessageableStatus(){
        $Online = 'online';
        $Offline = 'offline';
        $Busy = 'busy';
        if($this->last_seen < Carbon::now()->subMinutes(5)->toDateTimeString()){
        return $Offline;
        }else{
            switch ($this->privacy_chat_activity) {
                case MessagableStatus::BUSY:
                    return $Busy;
                break;
                case MessagableStatus::OFFLINE:
                    return $Offline;
                break;
                default:
                    return $Online;
            }
        }
    }

    public function reactions(){
        return $this->hasMany(Reaction::class);
    }

    public function votes(){
        return $this->hasMany(Vote::class);
    }

    public function justSeen(){
        $this->update(['last_seen' => now()]);
    }

    public function ownGroups(){
        return $this->hasMany(Group::class);
    }

    public function getGroups(){
        return Groupable::getUserGroupshipsApproved($this);
    }

    public function countPosts(){
        $countPosts = Post::whereModel($this)->get()->count();
        return $this->update(['posts' => $countPosts]);
    }

    public function items(){
        return Post::where('type', PostTypes::MARKETPLACE)->where('user_id', $this->id)->get();
    }

    public function getMonthOwnerEvents($date = null){
        $date = Carbon::parse($date);
        return Post::where('type', PostTypes::EVENT)->where('user_id', Auth::user()->id)
            ->whereMonth('event_start', $date->month)->whereYear('event_start', $date->year)
            ->orderBy('event_start', 'asc')->get();
    }

    public function getDayEvents($date = null){
        $date = Carbon::parse($date);
        $dayOwnerEvents =  Post::where('type', PostTypes::EVENT)->where('user_id', Auth::user()->id)
            ->whereDay('event_start', $date->day)->whereMonth('event_start', $date->month)
            ->whereYear('event_start', $date->year)->orderBy('event_start', 'asc')->get();
        $events = Tag::whereTagged($this)->whereHasMorph('tagin', [Post::class], function ($queryIn) use ($date){
            $queryIn->where('type', PostTypes::EVENT)->whereDay('event_start', $date->day)
                ->whereMonth('event_start', $date->month)->whereYear('event_start', $date->year);
        })->get()->pluck('tagin')->sortBy('event_start');
        $events = $dayOwnerEvents->merge($events);
        return $events;
    }

    public function getUpcomingOwnerEvents($date = null){
        $date = Carbon::parse($date);
        if($this == Auth::user()){
        return Post::where('type', PostTypes::EVENT)->whereModel($this)
            ->where('event_start','>=', $date)
            ->orderBy('event_start', 'asc')->get();
        }else {
            $publicEvents = Post::where('type', PostTypes::EVENT)->where('user_id', $this->id)
                ->where('event_start','>=', $date)->where('privacy', 'Public')
                ->orderBy('event_start', 'asc')->get();
            $closedEvents = Tag::whereTagged(Auth::user())->whereHasMorph('tagin', [Post::class], function ($queryIn) use ($date) {
                $queryIn->where('event_start', '>=', $date)->where('privacy', 'Closed')->where('user_id', $this->id);
            })->get()->pluck('tagin');
            return $publicEvents->merge($closedEvents)->sortBy('event_start');
        }
    }


    public function getUpcomingEvents($date = null){
        $date = Carbon::parse($date);
        if($this == Auth::user()){
        $events = Tag::whereTagged($this)->whereHasMorph('tagin', [Post::class], function ($queryIn) use ($date){
            $queryIn->where('type', PostTypes::EVENT)->where('event_start','>=', $date);
        })->get()->pluck('tagin')->sortBy('event_start');
        }else {
            $publicEvents = Tag::whereTagged($this)->whereHasMorph('tagin', [Post::class], function ($queryIn) use ($date) {
                $queryIn->where('event_start', '>=', $date)->where('privacy', 'Public');
            })->get()->pluck('tagin');
            $closedEvents = Tag::whereTagged($this)->whereHasMorph('tagin', [Post::class], function ($queryIn) use ($date) {
                $queryIn->where('event_start', '>=', $date)->where('privacy', 'Closed')->where('user_id', Auth::user()->id);
            })->get()->pluck('tagin');
            $events = $publicEvents->merge($closedEvents)->sortBy('event_start');
        }

        return $events;
    }

    public function getPastEvents($date = null){
        $date = Carbon::parse($date);
        $events = Tag::whereTagged($this)->whereHasMorph('tagin', [Post::class], function ($queryIn) use ($date){
            $queryIn->where('type', PostTypes::EVENT)->where('event_start','<', $date);
        })->get()->pluck('tagin')->sortBy('event_start');
        return $events;
    }

    public function getUserBlogs(){
        return Post::whereModel($this)->where('type', PostTypes::BLOG)->get()->sortByDesc('created_at');
    }

    public function getReactionsReceived(){
        $postsId = Post::where('user_id', $this->getKey())->get()->pluck('id');
        $commentsId = Comment::where('user_id', $this->getKey())->get()->pluck('id');
        //$level1CommentsId = Comment::where('model_type', Comment::class)->whereIn('model_id', $commentsId)->get()->pluck('id');
        $postsReactions = Reaction::where('model_type', Post::class)->whereIn('model_id', $postsId)->get()->count();
        $commentsReactions = Reaction::where('model_type', Comment::class)->whereIn('model_id', $commentsId->toArray())->get()->count();
        return $postsReactions + $commentsReactions;
    }

    public function getCommentsReceived(){
        $postsId = Post::where('user_id', $this->id)->get()->pluck('id');
        $commentsId = Comment::where('model_type', Post::class)->whereIn('model_id', $postsId)->get()->pluck('id');
        $level1CommentsId = Comment::where('model_type', Comment::class)->whereIn('model_id', $commentsId)->get()->pluck('id');
        return $commentsId->count() + $level1CommentsId->count();
    }

    public function getReactionsReceivedDetailed(){
        $postsId = Post::where('user_id', $this->getKey())->get()->pluck('id');
        $commentsId = Comment::where('user_id', $this->getKey())->get()->pluck('id');
        //$level1CommentsId = Comment::where('model_type', Comment::class)->whereIn('model_id', $commentsId)->get()->pluck('id');
        $postsReactions = Reaction::where('model_type', Post::class)->whereIn('model_id', $postsId)->select('type', DB::raw('count(*) as total'))->groupBy('type')->get();
        $commentsReactions = Reaction::where('model_type', Comment::class)->whereIn('model_id', $commentsId->toArray())->select('type', DB::raw('count(*) as total'))->groupBy('type')->get();
        $temps = array_merge($postsReactions->toArray(), $commentsReactions->toArray());
        $data = [];
        foreach($temps as $temp){
            $data[$temp['type']] = $temp['total'];
        }
        return $data;
    }

    private function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    public static function getByDistance($lat, $lng, $distance = MapSearchStatus::DISTANCE)
    {
        $results = DB::select(DB::raw('SELECT id, ( ' . MapSearchStatus::FOR_KM . ' * acos( cos( radians(' . $lat . ') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $lng . ') ) + sin( radians(' . $lat .') ) * sin( radians(latitude) ) ) ) AS distance FROM users HAVING distance < ' . $distance . ' ORDER BY distance') );

        return $results;
    }

    public static function getUsersByIDs($IDs){
        return User::whereIn('id',$IDs)->orderBy('created_at', 'desc')->get();
    }

}
