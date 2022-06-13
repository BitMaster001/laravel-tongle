<?php

namespace App\Http\Controllers\Widget\Comments;

use App\Helpers\Reactions\ReactionTypes;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CommentsController extends Controller
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
        $this->validate($request,[
            'pid'=>'required|string',
        ]);
        $user = Auth::user()->id;
        $pid = $request["pid"];
        $post = Post::where('key', $pid)->first();
        if($post == null){
            return;
        }
        $commentsId = $post->comments()->orderBy('updated_at', 'desc')->pluck('id')->all();
        return response()->json($this->getPostCommentsResponseData($post, $commentsId));
    }

    private function getPostCommentsResponseData($model, $commentsId){
        $data = [];
        $comments = [];
        foreach ($commentsId as $commentId){
            $comment = Comment::find($commentId);
            if($comment != null){
                $commentData = $this->getPostCommentResponseData($comment);
                array_push($comments, $commentData);
            }
        }
        if(count($comments) > 0){
            $data['comments'] = $comments;
            $data['user']['id'] = Auth::user()->getKey();
            $data['user']['name'] = Auth::user()->username;
            $data['user']['gender'] = Auth::user()->gender;
            $data['user']['avatar'] = Auth::user()->avatar;
            $data['user']['time'] =  Carbon::now()->toDateTimeString();
        }
        if($model->getMorphClass() == Post::class) {
            $data["source"]["type"] = 'Post';
        }else if($model->getMorphClass() == Comment::class){
            $data["source"]["type"] = 'Reply';
        }
        $data["source"]["pid"] =  $model->key;
        return $data;
    }

    private function getPostCommentResponseData($comment){
        $data = [];
        $commentsReply = [];
        $data["comment"]["pid"] = $comment->key;
        $data["comment"]["body"] = $comment->body;
        //$data["comment"]["time"] = $comment->created_at;
        $data["comment"]["time"] = (new Carbon($comment->created_at))->toDateTimeString();
        $data["comment"]["reactions"] = $this->getReactionResponseData($comment);
        $data["user"]["name"] = $comment->user->username;
        $data["user"]["fullName"] = $comment->user->full_name;
        $data["user"]["gender"] = $comment->user->gender;
        $data["user"]["avatar"] = $comment->user->avatar;
        $data["user"]["profileUrl"] = route('userPublicProfileGet', ['user' => $comment->user->username]);
        if(count($comment->comments)>0){
            $commentReplyIds = $comment->comments()->orderBy('updated_at', 'desc')->pluck('id')->all();
            foreach ($commentReplyIds as $commentId){
                $comment = Comment::find($commentId);
                if($comment != null){
                    $commentData = $this->getPostCommentResponseData($comment);
                    array_push($commentsReply, $commentData);
                }
            }
        }
        $data['replies'] = $commentsReply;

        return $data;
    }

    public function add(Request $request){
        $this->validate($request,[
            'type'=>'required|string',
            'pid'=>'required|string',
            'comment'=>'required|string',
        ]);
        $user = Auth::user();
        $type = $request["type"];
        $pid = $request["pid"];
        $comment = $request["comment"];
        $model = null;
        if($type == "Post"){
        $model = Post::where("key", $pid)->first();
        }else if($type == "Reply"){
            $model = Comment::where("key", $pid)->first();
        }
        if($model == null){
            return [];
        }
        $comment =  Comment::create([
            'key' => $this->generateKey(),
            'user_id' => $user->getKey(),
            'model_type' => $model->getMorphClass(),
            'model_id' => $model->getKey(),
            'body' => $comment,
        ]);
        if($type == "Post"){
            $commentsCpt = count($model->comments()->get());
            $model->update(['comments' => $commentsCpt]);
        }
        $data = [];
        $data["message"]["type"] = "Success";
        $data["message"]["body"] = "Your comment has been successfully submitted.";
        $data["comments"] = $this->getPostCommentsResponseData($model, [$comment->id]);
        return response()->json($data);
    }

    private function getReactionResponseData($model){
        $data = [];
        $data['reactions'][ReactionTypes::LIKE] = [];
        $data['reactions'][ReactionTypes::LOVE] = [];
        $data['reactions'][ReactionTypes::DISLIKE] = [];
        $data['reactions'][ReactionTypes::HAPPY] = [];
        $data['reactions'][ReactionTypes::FUNNY] = [];
        $data['reactions'][ReactionTypes::WOW] = [];
        $data['reactions'][ReactionTypes::ANGRY] = [];
        $data['reactions'][ReactionTypes::SAD] = [];
        $reactions = $model->reactions;
        foreach($reactions as $reaction){
            array_push($data['reactions'][$reaction->type], $reaction->user->full_name);
        }
        if($model->getMorphClass() == Post::class) {
            $data["source"]["type"] = 'Post';
        }else if($model->getMorphClass() == Comment::class){
            $data["source"]["type"] = 'Reply';
        }
        $data["source"]["pid"] =  $model->key;
        $data['user']['name'] = Auth::user()->username;
        $data['user']['fullName'] = Auth::user()->full_name;
        return $data;
    }

    private function generateKey(){
        return strtolower(sha1(time()).Auth::user()->getKey().Str::random(23));
    }
}
