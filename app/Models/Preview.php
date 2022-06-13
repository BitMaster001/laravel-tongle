<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preview extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'type',
        'title',
        'description',
        'url',
        'html',
        'cover',
        'user_id',
        'model_type',
        'model_id',
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $hidden = [
    ];
}
