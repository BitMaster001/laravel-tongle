<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RegisterController extends Controller
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
        if(Auth::check() && Auth::user()->hasVerifiedEmail()){
            return redirect(route("homeGet"));
        }else if(Auth::check() && !Auth::user()->hasVerifiedEmail()){
            return redirect(route("verification.notice"));
        }
        return view("auth.register");
    }

    public function post(Request $request){
        $this->validate($request,[
            'username'=>'required|string|min:4|max:255|unique:users|alpha_dash',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8||max:255|required_with:password-confirmation|same:password-confirmation',
            'password-confirmation'=>'required',
            'loc_address'=>'required',
            'latitude'=>'required',
        ],['latitude.required' => 'Please Select Google Suggestion Places']);
        $newsletter = false;
        if($request["register_newsletter"] == "on"){
            $newsletter = true;
        }
        $user = User::create([
            'username' => $request['username'],
            'full_name' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'email_notification_newsletter' => $newsletter,
            'email_verified_at' => new Carbon(),
            'loc_address' => $request['loc_address'],
            'latitude' => $request['latitude'],
            'longitude' => $request['longitude'],
        ]);


        $user->addBotMessage($user);

        //$user->sendEmailVerificationNotification();*/
        Auth::login($user);
        //event(new Registered($user));
        //$r = $request;
        return redirect()->back();
    }

    public function getVerifyNotice(Request $request){
        if(!Auth::check()){
            return redirect(route("loginGet"));
        }else if(Auth::check() && Auth::user()->hasVerifiedEmail()){
            return redirect(route("homeGet"));
        }
        return view('auth.verify', ["actionButton" => false]);
    }

    public function getVerify(EmailVerificationRequest $request){
        if(Auth::check() && !Auth::user()->hasVerifiedEmail()){
        $request->fulfill();
        }
        return redirect('/');
    }

    public function postVerify(Request $request){
        if(Auth::check() && !Auth::user()->hasVerifiedEmail()){
            $request->user()->sendEmailVerificationNotification();
            return back()->with('resent', 'verification-link-sent');
        }
        return redirect(route("loginGet"));
    }
}
