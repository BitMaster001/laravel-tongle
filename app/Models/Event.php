<?php

namespace App\Models;

use App\Helpers\Posts\PostTypes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class Event extends Model
{
    use HasFactory;

    public static function Search($user, $queryValue){
        $date = new Carbon();
        return Post::where('type', PostTypes::EVENT)->where('privacy', 'Public')->where('event_start', '>=', $date)
            ->where(function($query) use ($queryValue) {
                $query->where('title', 'LIKE', "%{$queryValue}%")
                    ->orWhere('body', 'LIKE', "%{$queryValue}%");
            })
            ->orderBy('event_start', 'asc')->get();
    }

}
