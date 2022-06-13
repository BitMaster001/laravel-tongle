<?php

namespace App\Models;

use App\Helpers\Groupships\Groupable;
use App\Helpers\Posts\PostTypes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory, Groupable;

    protected $fillable = [
        'avatar',
        'cover',
        'name',
        'username',
        'type',
        'tagline',
        'website',
        'email',
        'about',
        'rule',
        'facebook',
        'twitter',
        'instagram',
        'twitch',
        'google',
        'youtube',
        'patreon',
        'discord',
        'deviantart',
        'behance',
        'dribbble',
        'artstation',
        'members',
        'posts',
        'visits',
        'user_id',
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $hidden = [
    ];

    public function admin(){
        return $this->belongsTo(User::class ,'user_id','id');
    }

    public function getJoinedDate(){
        return Carbon::parse($this->created_at)->format('F dS, Y');
    }

    public function getMembers(){
        return $this->getGroupshipsApproved();
    }

    public function newVist(){
        return $this->update(['visits' => $this->visits + 1]);
    }
    public function countPosts(){
    $countPosts = Post::whereModel($this)->get()->count();
        return $this->update(['posts' => $countPosts]);
    }
    public function countMembers(){
        $countMembers = $this->getMembers()->count();
        return $this->update(['members' => $countMembers]);
    }
        public function getUpcomingEvents($date = null){
        $date = Carbon::parse($date);
        return Post::where('type', PostTypes::EVENT)->whereModel($this)
            ->where('event_start','>=', $date)
            ->orderBy('event_start', 'asc')->get();
    }

    public function getPastEvents($date = null){
        $date = Carbon::parse($date);
        return Post::where('type', PostTypes::EVENT)->whereModel($this)
            ->where('event_start','<', $date)
            ->orderBy('event_start', 'asc')->get();
    }
    
        public function getGroupsUpcomingEvent($rows = 10){
        $date = new Carbon();
        return Post::where('type', PostTypes::EVENT)->whereModel($this)
            ->where('event_start','>=', $date)
            ->take($rows)
            ->orderBy('event_start', 'asc')->get();
    }

    public function getGroupsPastEvent($rows = 10){
        $date = new Carbon();
        return Post::where('type', PostTypes::EVENT)->whereModel($this)
            ->where('event_start','<', $date)
            ->take($rows)
            ->orderBy('event_start', 'asc')->get();
    }
}
