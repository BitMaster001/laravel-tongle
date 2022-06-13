<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupship extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'group_type',
        'group_id',
        'member_type',
        'member_id',
        'status',
        'user_id',
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $hidden = [
    ];

    public function group()
    {
        return $this->morphTo('group');
    }

    public function member()
    {
        return $this->morphTo('member');
    }

    public function inviter()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeWhereGroup($query, $model)
    {
        return $query->where('group_id', $model->getKey())
            ->where('group_type', $model->getMorphClass());
    }

    public function scopeWhereMember($query, $model)
    {
        return $query->where('member_id', $model->getKey())
            ->where('member_type', $model->getMorphClass());
    }

    public function scopeBetweenModels($query, $group, $member)
    {
        $query->where(function ($queryIn) use ($group, $member){
            $queryIn->where(function ($q) use ($group, $member) {
                $q->whereGroup($group)->whereMember($member);
            });
        });
    }

}
