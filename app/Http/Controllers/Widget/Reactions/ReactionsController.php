<?php

namespace App\Http\Controllers\Widget\Reactions;

use App\Helpers\Reactions\ReactionTypes;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReactionsController extends Controller
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

    public function delete(Request $request){
        $this->validate($request,[
            'type'=>'required|string',
            'pid'=>'required|string',
            'reaction'=>'required|string',
        ]);
    }
    public function add(Request $request){
        $this->validate($request,[
            'type'=>'required|string',
            'pid'=>'required|string',
            'reaction'=>'required|string',
        ]);
        $user = Auth::user();
        $type = $request["type"];
        $pid = $request["pid"];
        $reactionType = $request["reaction"];
        $model = null;
        if($type == "Post"){
            $model = Post::where("key", $pid)->first();
        }else if($type == "Reply"){
            $model = Comment::where("key", $pid)->first();
        }
        if($model == null){
            return [];
        }
        $reaction = $model->reactions()->where('user_id', $user->id)->first();
        if($reaction == null){
        $reaction =  Reaction::create([
            'key' => $this->generateKey(),
            'user_id' => $user->getKey(),
            'model_type' => $model->getMorphClass(),
            'model_id' => $model->getKey(),
            'type' => $reactionType,
        ]);
        }else{
            $reaction->update(['type' => $reactionType,]);
        }
        $data = [];
        $data["message"]["type"] = "Success";
        $data["message"]["body"] = "Your reaction has been successfully submitted.";
        $data["reactions"] = $this->getReactionResponseData($model);
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
