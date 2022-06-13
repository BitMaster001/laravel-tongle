<?php

namespace App\Http\Controllers\Home;

use App\Helpers\Categories\CategorieTypes;
use App\Helpers\Posts\PostTypes;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Marketplace;
use App\Models\Post;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
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

    public function getMarketplace(Request $request){
        $marketCategories = Marketplace::getCategories();
        $latestItems = Marketplace::getLatestItems(12);
        return view("home.marketplace.marketplace", compact('marketCategories', 'latestItems'));
    }

    public function getMarketplaceCategorie(Request $request, $categorieSlage){
        $categorie = Marketplace::getCategorie($categorieSlage);
        if($categorie == null || $categorie->type != CategorieTypes::MARKETPLACE){
            abort(404);
        }
        $marketCategories = Marketplace::getCategories();

        $items = Post::whereModel($categorie);

        if($categorie->name == 'All'){
            $items = Post::where('type', PostTypes::MARKETPLACE);
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
        $items = $items->get();
        return view("home.marketplace.marketplace-categorie", ['categorie' => $categorie, 'marketCategories' => $marketCategories, 'items' => $items]);
    }

    public function getMarketplaceItem(Request $request, $categorie, $item){
        $post = Post::where('key', $item)->first();
        if($post == null || $post->type != PostTypes::MARKETPLACE){
            abort(404);
        }
        if($post->model->slag != $categorie){
            return redirect(route('getMarketplaceItem', ['categorie' => $post->model->slag, 'item' => $post->key]));
        }
        return view("home.marketplace.marketplace-item", ['item' => $post]);
    }

    public function getNewestMarketplace($rows = 10){
        $items = Post::where('type', PostTypes::MARKETPLACE)->orderBy('created_at', 'desc');
        return $items->take($rows)->get();
    }
}
