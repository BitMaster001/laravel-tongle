<?php

namespace App\Http\Controllers\Home;

use App\Helpers\Categories\CategorieTypes;
use App\Helpers\MapSearch\MapSearchStatus;
use App\Helpers\Posts\PostTypes;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Marketplace;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class MapSearchController extends Controller
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

    public function getMapSearch(Request $request){
        $user = auth()->user();
        $marketCategories = Marketplace::getCategories();

        $defaultLatLn  = [
            'lat' => $user->latitude ?? MapSearchStatus::LATITUDE,
            'lng' => $user->longitude ?? MapSearchStatus::LONGITUDE
        ];

        $lat = $request['lat'] ?? $user->latitude ?? MapSearchStatus::LATITUDE;
        $lng = $request['lng'] ?? $user->longitude ?? MapSearchStatus::LONGITUDE;
        $distance = $request['radius'] ?? MapSearchStatus::DISTANCE;
        $nearestUsers = $user->getByDistance($lat,$lng, $distance);
        $marketPlaces = [];
        $users = [];
        $filterType = $request['search-for'] ?? 0;
        if($nearestUsers){
            $IDS = array_map(function ($a){return $a->id;},$nearestUsers);

            if($filterType == 1){

                $items = Post::where('type', PostTypes::MARKETPLACE)->whereIn('user_id',$IDS);

                $category = $request['category'] ?? 'all';
                if($category != 'all'){
                    $categorie = Marketplace::getCategorie($request['category']);
                    if($categorie && $categorie->type == CategorieTypes::MARKETPLACE){
                        $items = $items->whereModel($categorie);
                    }
                }

                if($request['q'] != null){
                    $queryValue = $request['q'];
                    $items = $items->where(function($query) use ($queryValue) {
                        $query->where('title', 'LIKE', "%{$queryValue}%")
                            ->orWhere('body', 'LIKE', "%{$queryValue}%");
                    });
                }

                if($request['from'] != null){
                    $queryValue = $request['from'];
                    $items = $items->where('price', '>=' , $queryValue);
                }

                if($request['to'] != null){
                    $queryValue = $request['to'];
                    $items = $items->where('price', '<=' , $queryValue);
                }

                if($request['items-filter'] != null){
                    $queryValue = $request['items-filter'];
                    switch($queryValue){
                        case 0:
                            $items = $items->orderBy('created_at', 'desc');
                            break;
                        case 1:
                            $items = $items->orderBy('created_at', 'asc');
                            break;
                        case 2:
                            $items = $items->orderBy('price', 'asc');
                            break;
                        case 3:
                            $items = $items->orderBy('price', 'desc');
                            break;
                    }
                }else{
                    $items = $items->orderBy('created_at', 'desc');
                }

                $marketPlaces =$items->get();
            }else{
                $users = User::getUsersByIDs($IDS);
            }
        }

        return view("home.map-search.3d-search", compact( 'marketPlaces','users','lat','lng','marketCategories', 'defaultLatLn'));
    }

    public function updateUserCoordinates(Request $request){
        auth()->user()->update([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'loc_address' => $request->address
        ]);
        return response()->json(['success'=>true]);
    }

}
