<?php

namespace App\Models;

use App\Helpers\Posts\PostTypes;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'type',
        'title',
        'body',
        'time_to_read',
        'time_to_ends',
        'cover',
        'comments',
        'price',
        'privacy',
        'event_location',
        'event_start',
        'event_end',
        'user_id',
        'model_type',
        'model_id',
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $hidden = [
    ];

    public function model(){
        return $this->morphTo('model');
    }

    public function tagged()
    {
        return $this->morphMany(Tag::class, 'tagin');;
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'model');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'model');
    }

    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'model');
    }

    public function shares()
    {
        return $this->morphMany(Share::class, 'shared');
    }

    public function preview()
    {
        return $this->morphOne(Preview::class, 'model');
    }

    public function questions(){
        return $this->hasMany(Poll::class);
    }

    public function votes(){
        return $this->hasMany(Vote::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeWhereModel($query, $model)
    {
        return $query->where('model_id', $model->getKey())
            ->where('model_type', $model->getMorphClass());
    }

    public function getCreateDate(){
        return Carbon::parse($this->created_at)->format('F dS, Y');
    }

    public function getUpdateDate(){
        return Carbon::parse($this->updated_at)->format('F dS, Y');
    }

    public function getShortBody($characters){
        if(strlen($this->body) - 3 < $characters){
            return $this->body;
        }else{
            return str_split($this->body, $characters)[0].'...';
        }
    }

    public function sincePost(){
        return $this->time_elapsed_string($this->created_at, $full = false);
    }

    public function getLastComment(){
        $comment = $this->comments()->orderBy('created_at', 'desc')->first();
        return $comment;
    }

    public function countComments(){
        $this->update(['comments' => $this->comments()->get()->count()]);
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

    public function getEventStartDate(){
        if($this->event_start){
            return Carbon::parse($this->event_start)->format('d/m/Y');
        }else{
            return "";
        }
    }

    public function getEventStartDateDay(){
        if($this->event_start){
            return Carbon::parse($this->event_start)->format('d');
        }else{
            return "";
        }
    }

    public function getEventStartDateMonth(){
        if($this->event_start){
            return Carbon::parse($this->event_start)->format('M');
        }else{
            return "";
        }
    }

    public function getEventStartDatePublic(){
        if($this->event_start){
            return Carbon::parse($this->event_start)->format('l, F dS, Y');
        }else{
            return "";
        }
    }

    public function getEventStartTime(){
        if($this->event_start){
            return Carbon::parse($this->event_start)->format('g:i');
        }else{
            return "";
        }
    }

    public function getEventStartTimeAnnotation(){
        if($this->event_start){
            return Carbon::parse($this->event_start)->format('A');
        }else{
            return "";
        }
    }

    public function getEventEndDate(){
        if($this->event_end){
            return Carbon::parse($this->event_end)->format('d/m/Y');
        }else{
            return "";
        }
    }

    public function getEventEndDatePublic(){
        if($this->event_end){
            return Carbon::parse($this->event_end)->format('l, F dS, Y');
        }else{
            return "";
        }
    }

    public function getEventEndTime(){
        if($this->event_end){
            return Carbon::parse($this->event_end)->format('g:i');
        }else{
            return "";
        }
    }

    public function getEventEndTimeAnnotation(){
        if($this->event_end){
            return Carbon::parse($this->event_end)->format('A');
        }else{
            return "";
        }
    }

}
