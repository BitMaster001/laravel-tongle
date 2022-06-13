<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Carbon\Carbon;

class LoginController extends Controller
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
        return view("auth.login");
    }

    public function post(Request $request){
        $this->validate($request,[
            'username-email'=>'required|string|min:4|max:255',
            'password'=>'required|string|min:8|max:255',
        ]);
        $remember = false;
        if($request["remember_me"] == "on"){
            $remember = true;
        }
        $user = User::where('username', $request["username-email"])->orWhere('email', $request["username-email"])->first();
        if($user != null && $user->blocked_at != null){
            return redirect()->back()->withInput()->with('authentication-blocked', 'authentication-blocked');
        }
        if (Auth::attempt(['email' => $request["username-email"], 'password' => $request["password"]], $remember) ||
            Auth::attempt(['username' => $request["username-email"], 'password' => $request["password"]], $remember)) {
            return redirect()->intended('/');
        } else {
            return redirect()->back()->withInput()->with('authentication-failed', 'authentication-failed');
        }

    }

    public function getLogout(Request $request){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect(route('loginGet'));
    }
    
        public function getRedirect(Request $request, $platform){
        return Socialite::driver($platform)->redirect();
    }

       public function getCallback(Request $request, $platform){
        if($platform != 'facebook' && $platform != 'google'){
            abort(401);
        }
        switch ($platform){
            case 'facebook':
                $fbUser = Socialite::driver('facebook')->user();
                $username = str_replace(' ', '', $fbUser->getName());
                $email = $fbUser->getEmail();
                $avatar = $fbUser->getAvatar();
                $user = User::where('username', $username)->orWhere('email', $email)->first();
                if($user == null){
                    $user = User::create([
                        'username' => $username,
                        'full_name' => $username,
                        'email' => $email,
                        'password' => Hash::make('pass123word987'),
                        'email_notification_newsletter' => true,
                        'email_verified_at' => new Carbon(),
                        'avatar' => $avatar,
                    ]);
                }
                if($user != null && $user->blocked_at != null){
                    return redirect()->back()->withInput()->with('authentication-blocked', 'authentication-blocked');
                }
                Auth::login($user);
                return redirect('/');
                break;
            case 'google':
                $fbUser = Socialite::driver('google')->user();
                $username = str_replace(' ', '', $fbUser->getName());
                $email = $fbUser->getEmail();
                $avatar = $fbUser->getAvatar();
                $user = User::where('username', $username)->orWhere('email', $email)->first();
                if($user == null){
                    $user = User::create([
                        'username' => $username,
                        'full_name' => $username,
                        'email' => $email,
                        'password' => Hash::make('pass123word987'),
                        'email_notification_newsletter' => true,
                        'email_verified_at' => new Carbon(),
                        'avatar' => $avatar,
                    ]);
                }
                if($user != null && $user->blocked_at != null){
                    return redirect()->back()->withInput()->with('authentication-blocked', 'authentication-blocked');
                }
                Auth::login($user);
                return redirect('/');
                break;
        }
    }
}
