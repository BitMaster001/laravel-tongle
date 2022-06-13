<?php

namespace App\Http\Controllers\Widget\Search;

use App\Helpers\Posts\PostTypes;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
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

    public function post(Request $request){
        $this->validate($request,[
            'query-value'=>'string|min:3|max:50',
        ]);
    $data = [];
    $queryValue = $request["query-value"];

    $users = User::where('id', '!=',Auth::id())
                ->where(function($query) use ($queryValue) {
                    $query->where('username', 'LIKE', "%{$queryValue}%")
                        ->orWhere('full_name', 'LIKE', "%{$queryValue}%");
                })->select('username', 'full_name', 'avatar', 'gender')->take(5)->get();

    foreach ($users as $user){
        $user->profile = route('userPublicProfileGet', ['user' => $user->username]);
    }
        $data['members'] = $users;

    $groups = Group::where(function($query) use ($queryValue) {
                    $query->where('name', 'LIKE', "%{$queryValue}%")
                        ->orWhere('username', 'LIKE', "%{$queryValue}%");
                })->select('name', 'username', 'avatar', 'members')->take(5)->get();
        foreach ($groups as $group){
            $group->profile = route('groupGet', ['group' => $group->username]);
        }
    $data['groups'] = $groups;

    $items = Post::where('type', PostTypes::MARKETPLACE)->where(function($query) use ($queryValue) {
            $query->where('title', 'LIKE', "%{$queryValue}%")
                ->orWhere('body', 'LIKE', "%{$queryValue}%");
        })->select('key', 'title')->take(5)->get();

        foreach ($items as $item){
            $obj = Post::where('key', $item->key)->first();
            $item->profile = route('getMarketplaceItem', ['categorie' => $obj->model->slag, 'item' => $obj->key]);
            $item->name = $obj->user->full_name;
            $item->avatar = $obj->images[0]->src;
        }
    $data['items'] = $items;
    return response()->json( $data );
    }
}
