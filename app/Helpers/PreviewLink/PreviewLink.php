<?php


namespace App\Helpers\PreviewLink;


use App\Helpers\Posts\PostTypes;
use App\Models\Preview;
use Embed\Embed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;

class PreviewLink
{
    public static function start($model, $link){
        $info = PreviewLink::getInfos($link);
        if($info == null) { return; }
        $url = $link;
        $title = $info->title;
        $description = $info->description;
        $image = $info->image;
        $html = '';
        $type = PreviewLinkTypes::LINK;
        if($info->code){
            $html = $info->code->html;
            $type = PreviewLinkTypes::VIDEO;
        }

        $cover = '/storage/newsfeed/post/preview/default.jpg';
        if($image != null){
            $liveCover = PreviewLink::saveImage($model, $image);
            if($liveCover != null){
                $cover = $liveCover;
            }
        }

        if($title != null){
           Preview::create([
               'key' => PreviewLink::generateKey(),
               'type' => $type,
               'title' => $title,
               'description' => $description,
               'url' => $link,
               'html' => $html,
               'cover' => $cover,
               'user_id' => $model->user->getKey(),
               'model_type' => $model->getMorphClass(),
               'model_id' => $model->getKey(),
           ]);
        }
    }

    private static function saveImage($model, $image){

        if($image != null){
            $imageUrl = PreviewLink::unparse_url($image);
            $img = file_get_contents($imageUrl);
            if($img == false) { return null;}
            $imagePreviewPath = 'storage/users/'.$model->user->username.'/posts/'.$model->key.'/';
            $imagePreviewName = 'Preview.jpg';
            //$img->move(public_path($imagePreviewPath), $imagePreviewName);
            Storage::disk('public_path')->put($imagePreviewPath.$imagePreviewName, $img);
            return "/$imagePreviewPath$imagePreviewName";
        }
    }

    private static function unparse_url($parsed_url) {
        $scheme   = ($parsed_url->getScheme() != null) ? $parsed_url->getScheme() . '://' : '';
        $host     = ($parsed_url->getHost() != null) ? $parsed_url->getHost(): '';
        $port     = ($parsed_url->getPort() != null) ? ':' . $parsed_url->getPort() : '';
        $userInfo  = ($parsed_url->getUserInfo() != null) ? ':' . $parsed_url->getUserInfo() : '';
        /*$user     = ($parsed_url['user']) ? $parsed_url['user'] : '';
        $pass     = ($parsed_url['pass']) ? ':' . $parsed_url['pass']  : '';
        $pass     = ($user || $pass) ? "$pass@" : '';*/
        $path     = ($parsed_url->getPath() != null) ? $parsed_url->getPath() : '';
        $query    = ($parsed_url->getQuery() != null) ? '?' . $parsed_url->getQuery() : '';
        $fragment = ($parsed_url->getFragment() != null) ? '#' . $parsed_url->getFragment() : '';
        //return "$scheme$user$pass$host$port$path$query$fragment";
        return "$scheme$userInfo$host$port$path$query$fragment";
    }

    private static function getInfos($link){
        $embed = new Embed();

        $factory = $embed->getExtractorFactory();
        $factory->addAdapter('party.haochang.tv', Adapters\Haochang\Extractor::class);
        try{
            $info = $embed->get($link);
        }catch (Throwable $e){
            return null;
        }
        return $info;
    }

    private static function generateKey(){
        return strtolower(sha1(time()).Auth::user()->getKey().Str::random(23));
    }
}
