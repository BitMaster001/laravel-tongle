<?php

namespace App\Models;

use App\Helpers\Posts\PostTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'slag',
        'name',
        'type',
        'posts',
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $hidden = [
    ];

    public function countItems(){
        $this->update(['posts' => Post::whereModel($this)->get()->count()]);
        $all = Categorie::where('type', PostTypes::MARKETPLACE)->where('name', 'All')->first();
        if($all != null){
            $all->update(['posts' => Post::where('type', PostTypes::MARKETPLACE)->get()->count()]);
        }
    }

    public function getLastPosts($count){
        $posts = Post::whereModel($this)->orderBy('created_at', 'desc')->take($count)->get();
        return $posts;
    }

}
