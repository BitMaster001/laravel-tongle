<?php

namespace App\Http\Controllers\Home\User\Profile\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialStreamController extends Controller
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
        return view("home.user.profile.settings.social-stream");
    }

    public function post(Request $request){
        $this->validate($request,[
            'facebook'=>'nullable|string|max:255',
            'twitter'=>'nullable|string|max:255',
            'instagram'=>'nullable|string|max:255',
            'twitch'=>'nullable|string|max:255',
            'google'=>'nullable|string|max:255',
            'youtube'=>'nullable|string|max:255',
            'patreon'=>'nullable|string|max:255',
            'discord'=>'nullable|string|max:255',
            'deviantart'=>'nullable|string|max:255',
            'behance'=>'nullable|string|max:255',
            'dribbble'=>'nullable|string|max:255',
            'artstation'=>'nullable|string|max:255',
            'streaming-description'=>'nullable|string',
            'streaming-monday'=>'nullable|string|max:255',
            'streaming-tuesday'=>'nullable|string|max:255',
            'streaming-wednesday'=>'nullable|string|max:255',
            'streaming-thursday'=>'nullable|string|max:255',
            'streaming-friday'=>'nullable|string|max:255',
            'streaming-saturday'=>'nullable|string|max:255',
            'streaming-sunday'=>'nullable|string|max:255',
        ]);
        $user = Auth::user();
        $user->facebook = $request["facebook"];
        $user->twitter = $request["twitter"];
        $user->instagram = $request["instagram"];
        $user->twitch = $request["twitch"];
        $user->google = $request["google"];
        $user->youtube = $request["youtube"];
        $user->patreon = $request["patreon"];
        $user->discord = $request["discord"];
        $user->deviantart = $request["deviantart"];
        $user->behance = $request["behance"];
        $user->dribbble = $request["dribbble"];
        $user->artstation = $request["artstation"];
        $user->streaming_description = $request["streaming-description"];
        $user->streaming_monday = $request["streaming-monday"];
        $user->streaming_tuesday = $request["streaming-tuesday"];
        $user->streaming_wednesday = $request["streaming-wednesday"];
        $user->streaming_thursday = $request["streaming-thursday"];
        $user->streaming_friday = $request["streaming-friday"];
        $user->streaming_saturday = $request["streaming-saturday"];
        $user->streaming_sunday = $request["streaming-sunday"];
        $user->save();
        return redirect(route('settingsSocialStreamGet'))->with('success', 'Your social and stream has been updated successfully.');
    }
}
