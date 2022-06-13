<?php

namespace App\Models;

use App\Helpers\Categories\CategorieTypes;
use App\Helpers\Posts\PostTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Marketplace extends Model
{
    use HasFactory;

    public static function getCategories(){
        return Categorie::where('type', CategorieTypes::MARKETPLACE)->orderBy('priority', 'asc')->get();
    }

    public static function getCategorie($slag){
        return Categorie::where('type', CategorieTypes::MARKETPLACE)->where('slag', $slag)->first();
    }

    public static function getLatestItems($items){
        return Post::where('type', PostTypes::MARKETPLACE)->orderBy('created_at', 'desc')->take($items)->get();
    }

    public static function getItemsByUsers($users){
        return Post::where('type', PostTypes::MARKETPLACE)->whereIn('user_id',$users)->orderBy('created_at', 'desc')->get();
    }
}
