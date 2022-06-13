<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'model_type',
        'model_id',
        'user_id',
        'src',
    ];

    /*public function post(){
        return $this->morphTo('model' , Post::class,);
    }*/
}
