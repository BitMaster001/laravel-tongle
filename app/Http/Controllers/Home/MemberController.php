<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function getMembers(Request $request){
        $members = User::orderBy('visits', 'desc');
        if($request['q'] != null){
            $queryValue = $request['q'];
            $members = $members->where(function($query) use ($queryValue) {
                $query->where('full_name', 'LIKE', "%{$queryValue}%")
                    ->orWhere('about', 'LIKE', "%{$queryValue}%");
            });
        }
        $members = $members->orderBy('visits', 'desc');
        $membersCount = $members->count();
        $members = $members->take(16)->get();
        return view('home.members', ['members' => $members, 'membersCount' => $membersCount]);
    }

    public function getNewestMembers($rows = 10){
        $members = User::orderBy('created_at', 'desc');
        return $members->take($rows)->get();
    }

    public function getPopularMembers($rows = 10){
        $members = User::orderBy('visits', 'desc');
        return $members->take($rows)->get();
    }

    public function getActiveMembers($rows = 10){
        $members = User::orderBy('last_seen', 'desc');
        return $members->take($rows)->get();
    }
}
