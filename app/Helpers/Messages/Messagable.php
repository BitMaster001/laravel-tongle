<?php

namespace App\Helpers\Messages;

use App\Models\Message;
use App\Models\Models;
use App\Models\Participant;
use App\Models\Thread;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait Messagable
{


    /**
     * Message relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * @codeCoverageIgnore
     */
    public function messages()
    {
        return $this->hasMany(Models::classname(Message::class));
    }

    /**
     * Participants relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * @codeCoverageIgnore
     */
    public function participants()
    {
        return $this->hasMany(Models::classname(Participant::class));
    }

    /**
     * Thread relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     *
     * @codeCoverageIgnore
     */
    public function threads()
    {
        return $this->belongsToMany(
            Models::classname(Thread::class),
            Models::table('participants'),
            'user_id',
            'thread_id'
        );
    }

    /**
     * Returns the new messages count for user.
     *
     * @return int
     */
    public function newThreadsCount()
    {
        return $this->threadsWithNewMessages()->count();
    }

    /**
     * Returns the new messages count for user.
     *
     * @return int
     */
    public function unreadMessagesCount()
    {
        return Message::unreadForUser($this->getKey())->count();
    }

    /**
     * Returns all threads with new messages.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function threadsWithNewMessages()
    {
        return $this->threads()
            ->where(function (Builder $q) {
                $q->whereNull(Models::table('participants') . '.last_read');
                $q->orWhere(Models::table('threads') . '.updated_at', '>', $this->getConnection()->raw($this->getConnection()->getTablePrefix() . Models::table('participants') . '.last_read'));
            })->get();
    }

    public function getMessagedFriendsIds(){
        //$ids = $this->threads()->users()->where('id', '!=', $this->getKey())->pluck('id')->all();
        $messagedFriendsIds = [];
        $threads = $this->threads()->get();
        foreach ($threads as $thread){
            array_push($messagedFriendsIds, $thread->participants()->where("user_id", "!=", $this->getKey())->pluck('user_id')->first());
        }
        return $messagedFriendsIds;
    }

    public function getThreadWithUser($user){
        if(!isset($user->id)){
            $user = User::where('username', $user->name)->first();
        }
        return $threads = $this->threads()->with('participants')->whereHas('participants', function ($query) use ($user) {
            $query->where('user_id', $user->getKey());
        })->first();
    }

    public function getMessagesWithUser($user){
        $thread = $this->getThreadWithUser($user);
        $messages = [];
        if($thread){
            $messages = $thread->messages()->select('user_id as id', 'body as text', 'created_at as time', )->get();
        }
        return $messages;
    }

    public function getLatestMessagesFromUser($user, $lastMessageRecivedTime){
        $messages = [];
        $thread = $this->getThreadWithUser($user);
        if($thread){
            $messages = Message::where([
                ['thread_id', '=', $thread->id],
                ['user_id', '=', $user->id],
                ['created_at', '>', $lastMessageRecivedTime],
            ])->select('user_id as id', 'body as text', 'created_at as time', )->get();
        }
        //return $thread->messages()->select('user_id as id', 'body as text', 'created_at as time', )->get();
        return $messages;
    }

    public function haveNewMessages($lastMessageRecivedTime){
        $threads = $this->threads()->where(Models::table('threads') .'.updated_at', '>', $lastMessageRecivedTime)->get();
        if(count($threads) > 0 ){
            return true;
        }
        return false;
    }

    public function addBotMessage($curentUser){
        $adminUsers = User::where('admin', 1)->get();

        foreach($adminUsers as $admin){
            echo $admin->admin_messag;
            if($admin->admin_message != ''){
                $thread = Thread::create();
                Participant::create([
                    'thread_id' => $thread->id,
                    'user_id' => $curentUser->id,
                    'last_read' => new Carbon,
                    'status' => ThreadParticipantStatus::ACCEPTED,
                ]);
    
                Participant::create([
                    'thread_id' => $thread->id,
                    'user_id' => $admin->id,
                    'status' => ThreadParticipantStatus::ACCEPTED,
                ]);
    
                Message::create([
                    'thread_id' => $thread->id,
                    'user_id' => $admin->id,
                    'body' => $admin->admin_message,
                ]);
            }
        }
    }
}
