<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'tagin_type',
        'tagin_id',
        'tagged_type',
        'tagged_id',
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $hidden = [
    ];

    /*public function firend(){
        return $this->morphTo( 'tagged', User::class);
    }

    public function post(){
        return $this->morphTo( 'tagin', Post::class);
    }*/


    public function tagin(){
        return $this->morphTo('tagin');
    }

    public function tagged(){
        return $this->morphTo('tagged');
    }

    public function scopeWhereTagin($query, $model)
    {
        return $query->where('tagin_id', $model->getKey())
            ->where('tagin_type', $model->getMorphClass());
    }

    public function scopeWhereTagged($query, $model)
    {
        return $query->where('tagged_id', $model->getKey())
            ->where('tagged_type', $model->getMorphClass());
    }

/*    public function posts()
    {
        return $this->morphedByMany(Post::class, 'tagin');
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'tagged');
    }*/
}
