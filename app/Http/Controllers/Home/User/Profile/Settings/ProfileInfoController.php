<?php

namespace App\Http\Controllers\Home\User\Profile\Settings;

use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileInfoController extends Controller
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
        return view("home.user.profile.settings.profile-info");
    }

    public function post(Request $request){
        $this->validate($request,[
            'avatar'=>'image|dimensions:min_width=110,min_height=110',
            'cover'=>'image|dimensions:min_width=1184,min_height=300',
            'first-name'=>'nullable|string|max:255',
            'last-name'=>'nullable|string|max:255',
            'gender'=>'nullable|string|max:255',
            'birthday'=>'nullable|date_format:d/m/Y',
            'birthplace'=>'nullable|string|max:255',
            'city'=>'nullable|string|max:255',
            'country'=>'nullable|string|max:255',
            'status'=>'nullable|string|max:255',
            'occupation'=>'nullable|string|max:255',
            'public-email'=>'nullable|email|max:255',
            'public-phone'=>'nullable|string|max:255',
            'playstation-id'=>'nullable|string|max:255',
            'xbox-id'=>'nullable|string|max:255',
            'tagline'=>'nullable|string|max:255',
            'website'=>'nullable|string|max:255',
            'about'=>'nullable|string',
            'interest-show'=>'nullable|string',
            'interest-music'=>'nullable|string',
            'interest-movie'=>'nullable|string',
            'interest-book'=>'nullable|string',
            'interest-game'=>'nullable|string',
            'interest-hobby'=>'nullable|string',
            'loc_address'=>'required',
            'latitude'=>'required',
        ],['latitude.required' => 'Please Select Google Suggestion Places']);
        $user = Auth::user();
        $user->first_name = $request["first-name"];
        $user->last_name = $request["last-name"];
        $user->full_name = Str::of($request["first-name"]." ".$request["last-name"])->trim();
        if(strlen($user->full_name)==0){
            $user->full_name = $user->username;
        }
        $d = DateTime::createFromFormat('d/m/Y H:i:s', $request["birthday"]." 00:00:00");
        if ($d !== false) {
            $user->birthday = $d;
        }else{
            $user->birthday = null;
        }
        $user->gender = $request["gender"];
        $user->birthplace = $request["birthplace"];
        $user->city = $request["city"];
        $user->country = $request["country"];
        $user->marital_status = $request["status"];
        $user->occupation = $request["occupation"];
        $user->public_email = $request["public-email"];
        $user->public_phone = $request["public-phone"];
        $user->playstation_id = $request["playstation-id"];
        $user->xbox_id = $request["xbox-id"];
        $user->tagline = $request["tagline"];
        $user->website = $request["website"];
        $user->about = $request["about"];
        $user->interest_show = $request["interest-show"];
        $user->interest_music = $request["interest-music"];
        $user->interest_movie = $request["interest-movie"];
        $user->interest_book = $request["interest-book"];
        $user->interest_game = $request["interest-game"];
        $user->interest_hobby = $request["interest-hobby"];
        $user->loc_address = $request["loc_address"];
        $user->latitude = $request["latitude"];
        $user->longitude = $request["longitude"];

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarUrl = 'storage/users/'.$user->username.'/profile/';
            $avatarName = 'avatar.'.$avatar->getClientOriginalExtension();
            if(!File::isDirectory($avatarUrl)){
                File::makeDirectory($avatarUrl, 0777, true, true);
            }
            //$avatar->move(public_path($avatarUrl), $avatarName);
            $user->avatar = '/'.$avatarUrl.$avatarName."?v=".Carbon::now()->timestamp;
            /*if ($avatar->getClientOriginalExtension() == 'gif') {
                $avatar->move(public_path($avatarUrl), $avatarName);
            }
            else {*/
            $img = Image::make($avatar);
            $img->fit(110);
            $img->save(public_path($avatarUrl).$avatarName);
           //}
        }

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $coverUrl = 'storage/users/'.$user->username.'/profile/';
            $coverName = 'cover.'.$cover->getClientOriginalExtension();
            if(!File::isDirectory($coverUrl)){
                File::makeDirectory($coverUrl, 0777, true, true);
            }
            //$cover->move(public_path($coverUrl), $coverName);
            $user->cover = '/'.$coverUrl.$coverName."?v=".Carbon::now()->timestamp;
            /*if ($cover->getClientOriginalExtension() == 'gif') {
                $cover->move(public_path($coverUrl), $coverName);
            }
            else {*/        
            $img = Image::make($cover);
            $img->fit(1184, 300);
            $img->save(public_path($coverUrl).$coverName);
            //}
        }

        $user->save();
        return redirect(route('settingsProfileInfoGet'))->with('success', 'Your profile info has been updated successfully.');
    }
}
