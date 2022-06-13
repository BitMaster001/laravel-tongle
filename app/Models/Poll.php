<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'question',
        'post_id',
    ];

    public function votes(){
        return $this->hasMany(Vote::class);
    }
}
