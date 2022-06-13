<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'post_id',
        'user_id',
        'poll_id',
    ];

    public function post(){
        return $this->belongsTo(User::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function poll(){
        return $this->belongsTo(User::class);
    }
}
