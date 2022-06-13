<?php

namespace App\Models;

use App\Helpers\Categories\CategorieTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    public static function getCategories(){
        return Categorie::where('type', CategorieTypes::FORUM)->orderBy('priority', 'asc')->get();
    }

    public static function getCategorie($slag){
        return Categorie::where('type', CategorieTypes::FORUM)->where('slag', $slag)->first();
    }
}
