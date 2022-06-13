<?php

namespace App\Http\Controllers\Widget\Posts;

use App\Helpers\Newsfeed\NewsfeedTypes;
use App\Helpers\Posts\PostTypes;
use App\Helpers\PreviewLink\PreviewLink;
use App\Helpers\Reactions\ReactionTypes;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Group;
use App\Models\Groupship;
use App\Models\Poll;
use App\Models\Post;
use App\Models\Preview;
use App\Models\Share;
use App\Models\Tag;
use App\Models\User;
use App\Models\Image as ImageModle;
use App\Models\Vote;
use Embed\Embed;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use mysql_xdevapi\Exception;
use Throwable;

class PostsController extends Controller
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

    function getNewsfeedPost(Request $request){
        $this->validate($request,[
            'newsfeed'=>'required|string',
            ]);
        $user = Auth::user();
        $newsfeed = $request["newsfeed"];
        $timeStart = $request["timeStart"];
        $timeEnd = $request["timeEnd"];
        if($newsfeed != NewsfeedTypes::GROUP) {
            $usersId = null;
            if ($newsfeed == NewsfeedTypes::ALL) {
                $usersId = [Auth::user()->getKey()];
                $friendsId = $user->getFriendsIds();
                $usersId = array_merge($usersId, $friendsId);
            } else if ($newsfeed == NewsfeedTypes::PROFILE) {
                $profileName = $request["profileName"];
                $profile = User::where('username', $profileName)->first();
                if ($profile == null) {
                    return;
                }
                $usersId = [$profile->id];
            }
            $posts = DB::table('posts')->whereIn('user_id', $usersId)->where('model_type', User::class)->whereIn('type', [PostTypes::POST, PostTypes::BLOG, PostTypes::POLL, PostTypes::SHARE, PostTypes::EVENT]);
            if ($timeStart != null && $timeEnd != null) {
                $posts = $posts->whereNotBetween('created_at', [$timeStart, $timeEnd]);
            }
            $postsId = $posts->orderBy('created_at', 'desc')->take(10)->pluck('id')->all();
            return response()->json($this->getPostsResponseData($postsId));
        }else{
            $profileName = $request["profileName"];
            $group = Group::where('username', $profileName)->first();
            if ($group == null) {
                return;
            }
            $posts = Post::whereModel($group)->whereIn('type', [PostTypes::POST, PostTypes::BLOG, PostTypes::POLL, PostTypes::SHARE, PostTypes::EVENT]);
            if ($timeStart != null && $timeEnd != null) {
                $posts = $posts->whereNotBetween('created_at', [$timeStart, $timeEnd]);
            }
            $postsId = $posts->orderBy('created_at', 'desc')->take(10)->pluck('id')->all();
            $data = $this->getPostsResponseData($postsId);

            if(count($data) > 0 && $data['user']['id'] == $group->user_id){
                $data['user']['admin'] = true;
            }
            return response()->json($data);
        }
    }

    function newsfeedDelete(Request $request){
        $this->validate($request,[
            'type'=>'required|string',
            'pid'=>'required|string',
        ]);
        $user = Auth::user();
        $type = $request["type"];
        $pid = $request["pid"];
        $model = null;
        if($type == "Post"){
            $model = Post::where("key", $pid)->first();
        }else if($type == "Reply"){
            $model = Comment::where("key", $pid)->first();
        }
        if($model == null){
            return [];
        }

        $message = "Your post has been successfully deleted.";
        $modelOwner =  $model->model;
        if($model->user_id == $user->id){
            if($type == "Reply"){
                $post = $model->post;
                if($post != null ){
                $commentsCpt = count($post->comments()->get());
                if($commentsCpt>0){
                $post->update(['comments' => $commentsCpt-1]);
                }
                }
            }

            $model->delete();

        }else if ($model->model_type == Group::class && $model->model->user_id == $user->id){
            $model->delete();
            $message = "This post has been successfully deleted.";
        }

        if($type == "Post"){
        }
        $data = [];
        $data["message"]["type"] = "Success";
        if($type == "Post"){
            $data["message"]["body"] = $message;
            $modelOwner->countPosts();
        }else if($type == "Reply"){
            $data["message"]["body"] = "Your comment has been successfully deleted.";
        }
        $data["source"]["type"] = $type;
        $data["source"]["pid"] = $pid;

        return response()->json($data);
    }

    function newsfeedVote(Request $request){
        $this->validate($request,[
            'postPid'=>'required|string',
            'pollPid'=>'required|string',
        ]);
        $user = Auth::user();
        $postPid = $request["postPid"];
        $pollPid = $request["pollPid"];
        $post = Post::where('key', $postPid)->first();
        if($post == null){
            retrun;
        }
        $poll = Poll::where('key', $pollPid)->first();
        if($post == null){
            retrun;
        }
        if(!$user->votes()->where('post_id', $post->id)->exists()){
            Vote::create([
                'key' => $this->generateKey(),
                'post_id' => $post->getKey(),
                'user_id' => $user->getKey(),
                'poll_id' => $poll->getKey(),
            ]);
        }
        $response = $this->getPostsResponseData([$post->id]);
        $response['message']['type'] = 'Success';
        $response['message']['body'] = 'Your vote has been posted!';
        $response['source']['type'] = 'Poll';
        $response['source']['pid'] = $postPid;
        return response()->json($response);
    }

    function getTagedFriends(){
        $friendsId = Auth::user()->getFriendsIds();
        $data['friends'] = User::whereIn('id', $friendsId)->select("id as value", "username as name", "full_name as fullName", "avatar")->get();
        return response()->json($data);
    }

    function add(Request $request){
        $this->validate($request,[
            'type'=>'required|string',]);
        //$user = Auth::user();
        switch ($request['type']){
                case PostTypes::POST:
                    return $this->addPost($request);
                break;
                case PostTypes::BLOG:
                    return $this->addBlog($request);
                break;
                case PostTypes::POLL:
                    return $this->addPoll($request);
                break;
        }
    }

    function share(Request $request){
        $this->validate($request,[
            'post'=>'required|string',]);
        $post = Post::where('key', $request['post'])->first();
        if($post == null){
            return redirect()->back()->with('error', 'Sorry, you can\'t share this post because isn\'t available anymore.');
        }
        if($post->type == PostTypes::SHARE){
            $postShare = Share::whereSharein($post)->first();
            if($postShare == null || $postShare->shared == null){
                return redirect()->back()->with('error', 'Sorry, you can\'t share this post because isn\'t available anymore.');
            }
            $post = $postShare->shared;
        }
        $authUser = Auth::user();
        $model = $authUser;
        if($request['shareto']){
            $model = Group::where('username', $request['shareto'])->first();
            if($model == null){
                abort(404);
            }
            if(Groupship::whereGroup($model)->whereMember($authUser)->first() == null){
                $model = $authUser->ownGroups()->where('username', $request['shareto'])->first();
                if($model == null) {
                    abort(401);
                }
            }
        }
        $body = $request['new-share-post-text'];
        $newPost = Post::create([
            'key' => $this->generateKey(),
            'type' => PostTypes::SHARE,
            'body' => $body,
            'user_id' => $authUser->getKey(),
            'model_type' => $model->getMorphClass(),
            'model_id' => $model->getKey(),
        ]);

        $model->countPosts();
        $tagedFriends = json_decode($request['new-share-post-tag-friends']);
        if($tagedFriends != null){
        $tagedFriendsList = [];
        foreach ($tagedFriends as $tagedFriend){
            array_push($tagedFriendsList, $tagedFriend->name);
        }
        if($tagedFriendsList != null && count($tagedFriendsList) > 0){
            $this->addPostTagged($newPost, $tagedFriendsList);
        }
         }

        Share::create([
            'key' => $this->generateKey(),
            'sharein_type' => $newPost->getMorphClass(),
            'sharein_id' => $newPost->getKey(),
            'shared_type' => $post->getMorphClass(),
            'shared_id' => $post->getKey(),
        ]);

        return redirect()->back()->with('success', 'The post has been shared successfully.');
    }

    private function addPost(Request $request){
        $this->validate($request,[
            'body'=>'required|string|min:1',]);
        $user = Auth::user();
        $model = $user;
        if($request['newsfeed'] == NewsfeedTypes::GROUP){
            $group = Group::where('username', $request['profileName'])->first();
            if($group == null){
                return;
            }
            $model = $group;
        }
        $body = $request['body'];
        $post = Post::create([
            'key' => $this->generateKey(),
            'type' => PostTypes::POST,
            'body' => $body,
            'user_id' => $user->getKey(),
            'model_type' => $model->getMorphClass(),
            'model_id' => $model->getKey(),
        ]);

        $tagged = $request['tagged'];
        if($tagged != null && count($tagged) > 0){
            $this->addPostTagged($post, $tagged);

        }

        $link = $this->isBodyHasLink($post->body);
            if($link != null){
                PreviewLink::start($post, $link);
            }

        $images = $request['images'];
        if($images != null && count($images)>0){
            $this->addPostImages($post, $images);
        }

        $videos = $request['videos'];
        if($videos != null && count($videos)>0){
            $this->addPostVideos($post, $videos);
        }


        $response = $this->getPostsResponseData([$post->id]);
        $response['message']['type'] = 'Success';
        $response['message']['body'] = 'Your post has been posted!';
        $model->countPosts();
        return response()->json($response);

    }
    private function addBlog(Request $request){
        $this->validate($request,[
            'title'=>'required|string|min:1',
            'timeToRead'=>'required|numeric|min:1|max:60',
            'body'=>'required|string|min:100',
            'cover'=>'required|image|dimensions:min_width=800,min_height=300',
            ]);
        $user = Auth::user();
        $model = $user;
        if($request['newsfeed'] == NewsfeedTypes::GROUP){
            $group = Group::where('username', $request['profileName'])->first();
            if($group == null){
                return;
            }
            $model = $group;
        }
        $title = $request['title'];
        $timeToRead = (int)$request['timeToRead'];
        $body = $request['body'];
        $cover = $request['cover'];

        $post = Post::create([
            'key' => $this->generateKey(),
            'type' => PostTypes::BLOG,
            'title' => $title,
            'body' => $body,
            'time_to_read' => $timeToRead,
            'user_id' => $user->getKey(),
            'model_type' => $model->getMorphClass(),
            'model_id' => $model->getKey(),
        ]);

        $this->addPostCover($post, $cover);

        $tagged = $request['tagged'];
        if($tagged != null && count($tagged) > 0){
            $this->addPostTagged($post, $tagged);

        }

        $images = $request['images'];
        if($images != null && count($images)>0){
            $this->addPostImages($post, $images);
        }

        $response = $this->getPostsResponseData([$post->id]);
        $response['message']['type'] = 'Success';
        $response['message']['body'] = 'Your blog has been posted!';
        $model->countPosts();
        return response()->json($response);
    }
    private function addPoll(Request $request){
        $this->validate($request,[
            'title'=>'required|string|min:1',
            'timeToEnd'=>'required|numeric|min:1|max:7',
            'questions'=>'required|array|min:2',
            'questions.*'=>'required|string|min:1',
        ]);
        $user = Auth::user();
        $model = $user;
        if($request['newsfeed'] == NewsfeedTypes::GROUP){
            $group = Group::where('username', $request['profileName'])->first();
            if($group == null){
                return;
            }
            $model = $group;
        }
        $title = $request['title'];
        $timeToEnd = Carbon::now()->addDays($request['timeToEnd']);
        $body = $request['body'];
        $questions = $request['questions'];

        $post = Post::create([
            'key' => $this->generateKey(),
            'type' => PostTypes::POLL,
            'title' => $title,
            'body' => $body,
            'time_to_ends' => $timeToEnd,
            'user_id' => $user->getKey(),
            'model_type' => $model->getMorphClass(),
            'model_id' => $model->getKey(),
        ]);

        $this->addPostQuestions($post, $questions);

        $tagged = $request['tagged'];
        if($tagged != null && count($tagged) > 0){
            $this->addPostTagged($post, $tagged);

        }

        $images = $request['images'];
        if($images != null && count($images)>0){
            $this->addPostImages($post, $images);
        }

        $response = $this->getPostsResponseData([$post->id]);
        $response['message']['type'] = 'Success';
        $response['message']['body'] = 'Your poll has been posted!';
        $model->countPosts();
        return response()->json($response);
    }

    private function addPostTagged($post, $tagged){
        foreach ($tagged as $username){
            $user = User::where('username', $username)->first();
            if($user != null && Auth::user()->isFriendWith($user)){
                Tag::create([
                    'key' => $this->generateKey(),
                    'tagin_type' => $post->getMorphClass(),
                    'tagin_id' => $post->getKey(),
                    'tagged_type' => $user->getMorphClass(),
                    'tagged_id' => $user->getKey(),
                ]);
            }
        }
    }

    private function addPostImages($post, $images){
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
                'src' => '/'.$imagesUrl.$imageName,
            ]);
        }
    }

    private function addPostVideos($post, $videos){
        $user = Auth::user();
        $videosUrl = 'storage/users/'.$user->username.'/posts/'.$post->key.'/';
        if(!File::isDirectory($videosUrl)){
            File::makeDirectory($videosUrl, 0777, true, true);
        }
        $videosCounter = 1;
        foreach ($videos as $video){
            $videoName = 'video'.$videosCounter.'.'.$video->getClientOriginalExtension();
            $videosCounter++;
            $video->move(public_path($videosUrl), $videoName);
            $videoUrl = '/'.$videosUrl.$videoName."#t=0.5";
            $videoHtml =  '<div class="iframe-wrap-video"><video controls="true" preload="metadata" playsinline disablePictureInPicture controlsList="nodownload" name="media" width="100%"><source src="'.$videoUrl.'" type="video/mp4"></video></div>';
            Preview::create([
                'key' => $this->generateKey(),
                'type' => "Video",
                'title' => $videoName,
                'url' => $videoUrl,
                'html' => $videoHtml,
                'cover' => $videoUrl,
                'user_id' => $post->user->getKey(),
                'model_type' => $post->getMorphClass(),
                'model_id' => $post->getKey(),
            ]);
        }
    }

    private function addPostCover($post, $cover){
        $user = Auth::user();
        $imagesUrl = 'storage/users/'.$user->username.'/posts/'.$post->key.'/';
        if(!File::isDirectory($imagesUrl)){
            File::makeDirectory($imagesUrl, 0777, true, true);
        }
        $coverName = 'cover.jpg';
        $img = Image::make($cover);
        $img->fit(800, 500);
        $img->save(public_path($imagesUrl).$coverName);
        $post->update(['cover' => '/'.$imagesUrl.$coverName]);
    }

    private function addPostQuestions($post, $questions){
        foreach ($questions as $question){
                Poll::create([
                    'key' => $this->generateKey(),
                    'question' => $question,
                    'post_id' => $post->getKey(),
                ]);
        }
    }

    private function getPostResponseData($post){
        $data = [];
        switch($post->type){
            case PostTypes::POST:
                $data['post'] = Post::where('id', $post->getKey())->select('key as pid', 'type', 'body', 'created_at as time')->first();

                $preview = $post->preview;
                if($preview != null){
                    $preview = $post->preview()->select('key as pid', 'type', 'url', 'title', 'description', 'html', 'cover')->first();
                }
                $data['post']['preview'] = $preview;
                break;
            case PostTypes::BLOG:
                $data['post'] = Post::where('id', $post->getKey())->select('key as pid', 'type', 'title', 'body', 'time_to_read as timeToRead', 'cover', 'created_at as time')->first();
                break;
            case PostTypes::POLL:
                $data['post'] = Post::where('id', $post->getKey())->select('key as pid', 'type', 'title', 'body', 'time_to_ends as timeToEnd', 'created_at as time')->first();
                $data['post']['questions'] = $post->questions()->select('key as pid', 'question')->get();
                $data['post']['voted'] = $post->votes()->where('user_id', Auth::user()->id)->exists();
                $data['post']['voter'] = $post->votes()->get()->count();
                $questions = $post->questions()->get();
                $votesArray = [];
                foreach ($questions as $question){
                    $votesArray[$question->question] = [];
                    $votes = $question->votes()->get();
                    foreach ($votes as $vote) {
                        $voter = [];
                        $voter["name"] = $vote->user->username;
                        $voter["fullName"] = $vote->user->full_name;
                        $voter["avatar"] = $vote->user->avatar;
                        array_push($votesArray[$question->question], $voter);
                    }
                }
                $data['post']['votes'] = $votesArray;
                break;
            case PostTypes::EVENT:
                $data['post'] = Post::where('id', $post->getKey())->select('key as pid', 'type', 'title', 'body', 'cover', 'created_at as time')->first();
                $data['post']['url'] = route('getViewEvent', ['event' => $post->key]);
                break;
            case PostTypes::SHARE:
                $postSharein = Post::where('id', $post->getKey())->select('key as pid', 'type', 'body', 'created_at as time')->first();
                $postShare = Share::whereSharein($post)->first();
                $data['post'] = $postSharein->toArray();
                if($postShare == null ){
                    $data['post']['shared'] = null;
                    break;
                }
                $postShare = $postShare->shared;
                if($postShare == null ){
                    $data['post']['shared'] = null;
                    break;
                }
                switch($postShare->type){
                    case PostTypes::POST:
                        $data['post']['shared']['post'] = Post::where('id', $postShare->getKey())->select('key as pid', 'type', 'body', 'created_at as time')->first();

                        $preview = $postShare->preview;
                        if($preview != null){
                            $preview = $postShare->preview()->select('key as pid', 'type', 'url', 'title', 'description', 'html', 'cover')->first();
                        }
                        $data['post']['shared']['post']['preview'] = $preview;
                        break;
                    case PostTypes::BLOG:
                        $data['post']['shared']['post'] = Post::where('id', $postShare->getKey())->select('key as pid', 'type', 'title', 'body', 'time_to_read as timeToRead', 'cover', 'created_at as time')->first();
                        break;
                    case PostTypes::POLL:
                        $data['post']['shared']['post'] = Post::where('id', $postShare->getKey())->select('key as pid', 'type', 'title', 'body', 'time_to_ends as timeToEnd', 'created_at as time')->first();
                        $data['post']['shared']['post']['questions'] = $postShare->questions()->select('key as pid', 'question')->get();
                        $data['post']['shared']['post']['voted'] = $postShare->votes()->where('user_id', Auth::user()->id)->exists();
                        $data['post']['shared']['post']['voter'] = $postShare->votes()->get()->count();
                        $questions = $postShare->questions()->get();
                        $votesArray = [];
                        foreach ($questions as $question){
                            $votesArray[$question->question] = [];
                            $votes = $question->votes()->get();
                            foreach ($votes as $vote) {
                                $voter = [];
                                $voter["name"] = $vote->user->username;
                                $voter["fullName"] = $vote->user->full_name;
                                $voter["avatar"] = $vote->user->avatar;
                                array_push($votesArray[$question->question], $voter);
                            }
                        }
                        $data['post']['shared']['post']['votes'] = $votesArray;
                        break;
                    case PostTypes::EVENT:
                        $data['post']['shared']['post'] = Post::where('id', $postShare->getKey())->select('key as pid', 'type', 'title', 'body', 'cover', 'created_at as time')->first();
                        $data['post']['shared']['post']['url'] = route('getViewEvent', ['event' => $postShare->key]);
                        break;
                }
                $data['post']['shared']['post']['images'] = $postShare->images()->select('src')->get();
                $friendsTaggedId = $postShare->tagged()->where("tagged_type", User::class)->pluck('tagged_id')->all();
                $friendsTagged = User::whereIn("id", $friendsTaggedId)->select("username as name", "full_name as fullName")->get();
                foreach ($friendsTagged as $friendTagged){
                    $friendTagged->profileUrl = route('userPublicProfileGet', ['user' => $friendTagged->name]);
                }
                $data['post']['shared']['post']['tagged'] = $friendsTagged;
                $data['post']['shared']['post']['reactions'] = $this->getReactionResponseData($post);
                $data['post']['shared']['post']['comments'] = $postShare->comments;
                $data['post']['shared']['post']['shares'] = Share::whereShared($postShare)->get()->count();

                $data['post']['shared']['user']['id'] = $postShare->user->id;
                $data['post']['shared']['user']['name'] = $postShare->user->username;
                $data['post']['shared']['user']['fullName'] = $postShare->user->full_name;
                $data['post']['shared']['user']['gender'] = $postShare->user->gender;
                $data['post']['shared']['user']['avatar'] = $postShare->user->avatar;
                $data['post']['shared']['user']['profileUrl'] =  route('userPublicProfileGet', ['user' => $postShare->user->username]);

                break;

        }
        $data['post']['images'] = $post->images()->select('src')->get();
        $friendsTaggedId = $post->tagged()->where("tagged_type", User::class)->pluck('tagged_id')->all();
        $friendsTagged = User::whereIn("id", $friendsTaggedId)->select("username as name", "full_name as fullName")->get();
        foreach ($friendsTagged as $friendTagged){
            $friendTagged->profileUrl = route('userPublicProfileGet', ['user' => $friendTagged->name]);
        }
        $data['post']['tagged'] = $friendsTagged;
        $data['post']['reactions'] = $this->getReactionResponseData($post);
        $data['post']['comments'] = $post->comments;
        $data['post']['shares'] = Share::whereShared($post)->get()->count();

        $data['user']['id'] = $post->user->id;
        $data['user']['name'] = $post->user->username;
        $data['user']['fullName'] = $post->user->full_name;
        $data['user']['gender'] = $post->user->gender;
        $data['user']['avatar'] = $post->user->avatar;
        $data['user']['profileUrl'] =  route('userPublicProfileGet', ['user' => $post->user->username]);
        return $data;
    }

    private function getPostsResponseData($postsId){
        $data = [];
        $posts = [];
        foreach ($postsId as $postId){
            $post = Post::find($postId);
            if($post != null) {
                if ($post->privacy == null || $post->privacy == 'Public') {

                $postData = $this->getPostResponseData($post);
                array_push($posts, $postData);
            }
            }
        }
        if(count($posts) > 0){
            $data['posts'] = $posts;
            $data['user']['id'] = Auth::user()->getKey();
            $data['user']['name'] = Auth::user()->username;
            $data['user']['gender'] = Auth::user()->gender;
            $data['user']['avatar'] = Auth::user()->avatar;
            $data['user']['time'] =  Carbon::now()->toDateTimeString();
        }
        return $data;
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

    private function isBodyHasLink($body){
        $linkFound = preg_match('!(http|ftp|scp)(s)?:\/\/[a-zA-Z0-9.?=&_/-]+!', $body, $links);
        if($linkFound){
            return $links[0];
        }
        return null;
    }
}
