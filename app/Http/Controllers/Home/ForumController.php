<?php

namespace App\Http\Controllers\Home;

use App\Helpers\Categories\CategorieTypes;
use App\Helpers\Posts\PostTypes;
use App\Helpers\Reactions\ReactionTypes;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Comment;
use App\Models\Forum;
use App\Models\Group;
use App\Models\Marketplace;
use App\Models\Post;
use App\Models\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ForumController extends Controller
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

    public function getForum(Request $request){
        $forumCategories = Forum::getCategories();
        return view("home.forum.forum", compact('forumCategories'));
    }

    public function getForumCategorie(Request $request, $categorieSlage){
        $categorie = Forum::getCategorie($categorieSlage);
        if($categorieSlage == 'all'){
            $categorie = new Categorie(['slag' => 'all', 'name' => 'All', 'type' => CategorieTypes::FORUM]);
        }
        if($categorie == null || $categorie->type != CategorieTypes::FORUM){
            abort(404);
        }

        $topics = Post::whereModel($categorie);

        if($categorie->name == 'All'){
            $topics = Post::where('type', PostTypes::FORUM);
        }

        if($request['q'] != null){
            $queryValue = $request['q'];
            $topics = $topics->where(function($query) use ($queryValue) {
                $query->where('title', 'LIKE', "%{$queryValue}%")
                    ->orWhere('body', 'LIKE', "%{$queryValue}%");
            });
        }
        $topics = $topics->orderBy('created_at', 'desc');
        $topics = $topics->get();
        return view("home.forum.forum-categorie", ['categorie' => $categorie, 'topics' => $topics]);
    }

    public function getForumPost(Request $request, $categorieSlage, $post){
        $post = Post::where('key', $post)->first();
        if($post == null || $post->type != PostTypes::FORUM){
            abort(404);
        }
        if($post->model->slag != $categorieSlage){
            return redirect(route('getForumPost', ['categorie' => $post->model->slag, 'item' => $post->key]));
        }
        return view("home.forum.forum-topic", ['topic' => $post]);
    }


    public function getForumNewPost(Request $request, $categorieSlage){
        $categorie = Forum::getCategorie($categorieSlage);
        if($categorie == null || $categorie->type != CategorieTypes::FORUM){
            abort(404);
        }
        return view("home.forum.forum-topic-edit", ['categorie' => $categorie, 'topic' => new Post()]);
    }

    public function getForumManagePost(Request $request, $categorieSlage, $postKey){
        $categorie = Forum::getCategorie($categorieSlage);
        $post = Post::where('key', $postKey)->first();
        if($categorie == null || $post == null || $categorie->type != CategorieTypes::FORUM){
        abort(404);
        }
        if($post->user_id != Auth::user()->id){
            abort(401);
        }
        return view("home.forum.forum-topic-edit", ['categorie' => $categorie, 'topic' => $post]);
    }

    public function getForumDeletePost(Request $request, $categorieSlage, $post){
        $post = Post::where('key', $post)->first();
        if($post == null || $post->type != PostTypes::FORUM){
            abort(404);
        }
        if($post->model->slag != $categorieSlage){
            return redirect(route('getForumPost', ['categorie' => $post->model->slag, 'item' => $post->key]));
        }
        if($post->user_id != Auth::user()->id){
            abort(401);
        }
        $categorie = $post->model;
        $post->delete();
        $categorie->countItems();
        return redirect(route('getForumCategorie', ['categorie' => $categorie->slag,]));
    }

    public function edit(Request $request, $categorieSlage){
        $this->validate($request,[
            'title'=>'required|string|min:1',
            'description'=>'required|string|min:1'
        ]);
        $categorie = Forum::getCategorie($categorieSlage);
        if($categorie == null || $categorie->type != CategorieTypes::FORUM){
            abort(404);
        }
        $authUser = Auth::user();
        $title = $request['title'];
        $description = $request['description'];
        $post = Post::find($request['id']);
        if($post == null){
            $post = Post::create([
                'key' => $this->generateKey(),
                'type' => PostTypes::FORUM,
                'title' => $title,
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
            $post->update([
                'title' => $title,
                'body' => $description,
            ]);
        }
        return redirect(route('getForumManagePost', ['categorie' => $categorie->slag, 'post' => $post->key]))->with('success', 'Your topic has been updated successfully.');
    }

    public function comment (Request $request, $categorieSlage, $post){
        $this->validate($request,[
            'body'=>'required|string|min:1',
        ]);
        $post = Post::where('key', $post)->first();
        if($post == null || $post->type != PostTypes::FORUM){
            abort(404);
        }
        if($post->model->slag != $categorieSlage){
            return redirect(route('getForumPost', ['categorie' => $post->model->slag, 'item' => $post->key]));
        }
        $comment = $request['body'];
        Comment::create([
            'key' => $this->generateKey(),
            'user_id' => Auth::user()->getKey(),
            'model_type' => $post->getMorphClass(),
            'model_id' => $post->getKey(),
            'body' => $comment,
        ]);
        $post->countComments();
        return redirect(route('getForumPost', ['categorie' => $post->model->slag, 'post' => $post->key]))->with('success', 'Your reply has been added successfully.');
    }

    public function vote (Request $request, $categorieSlage, $post){
        $post = Post::where('key', $post)->first();
        if($post == null || $post->type != PostTypes::FORUM){
            abort(404);
        }
        if($post->model->slag != $categorieSlage){
            return redirect(route('getForumPost', ['categorie' => $post->model->slag, 'item' => $post->key]));
        }
        $authUser = Auth::user();
        $reaction = $post->reactions()->where('user_id', $authUser->id)->first();
        if($reaction == null) {
            Reaction::create([
                'key' => $this->generateKey(),
                'user_id' => $authUser->getKey(),
                'model_type' => $post->getMorphClass(),
                'model_id' => $post->getKey(),
                'type' => ReactionTypes::LIKE,
            ]);
        }
        return redirect(route('getForumPost', ['categorie' => $post->model->slag, 'post' => $post->key]))->with('success', 'Your voice has been added successfully.');
    }

    public function deleteComment(Request $request, $categorieSlage, $post, $comment){
        $post = Post::where('key', $post)->first();
        if($post == null || $post->type != PostTypes::FORUM){
            abort(404);
        }
        if($post->model->slag != $categorieSlage){
            return redirect(route('getForumPost', ['categorie' => $post->model->slag, 'item' => $post->key]));
        }
        $comment = Comment::where('key', $comment)->first();
        if($comment == null){
            abort(404);
        }
        if($comment->user_id != Auth::user()->id){
            abort(401);
        }
        $comment->delete();
        $post->countComments();
        return redirect(route('getForumPost', ['categorie' => $post->model->slag, 'post' => $post->key]))->with('success', 'Your reply has been deleted successfully.');
    }

    private function generateKey(){
        return strtolower(sha1(time()).Auth::user()->getKey().Str::random(23));
    }

    public function getNewestForums($rows = 10){
        $forums = Post::where('type', PostTypes::FORUM)->orderBy('created_at', 'desc');
        return $forums->take($rows)->get();
    }

    public function getPopularForums($rows = 10){
        $forums = Post::where('type', PostTypes::FORUM)->orderBy('comments', 'desc');
        return $forums->take($rows)->get();
    }

    public function getActiveForums($rows = 10){
        $forums = Post::where('type', PostTypes::FORUM)->orderBy('updated_at', 'desc');
        return $forums->take($rows)->get();
    }

}
