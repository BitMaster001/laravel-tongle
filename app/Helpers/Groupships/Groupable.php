<?php


namespace App\Helpers\Groupships;



use App\Models\Groupship;
use Illuminate\Database\Eloquent\Model;

trait Groupable
{

    public function getGroupship(Model $member)
    {
        return Groupship::betweenModels($this, $member)->first();
    }

    public static function getGroupshipInvited(Model $member)
    {
        return Groupship::whereMember($member)->where('status', GroupshipStatus::INVITED)->get();
    }

    public static function getUserGroupshipsApproved(Model $member){
        return Groupship::whereMember($member)->where('status', GroupshipStatus::ACCEPTED)->get();
    }

    public function getGroupshipsApproved(){
        return Groupship::whereGroup($this)->where('status', GroupshipStatus::ACCEPTED)->get();
    }
    public function getGroupshipsUnapproved(){
        return Groupship::whereGroup($this)->where('status', GroupshipStatus::PENDING)->get();
    }
    public function getGroupshipsBlocked(){
        return Groupship::whereGroup($this)->where('status', GroupshipStatus::BLOCKED)->get();
    }

}
