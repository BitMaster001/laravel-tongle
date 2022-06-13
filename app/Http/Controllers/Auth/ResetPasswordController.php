<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
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
        return view("auth.passwords.email");
    }

    public function post(Request $request){
        $this->validate($request,[
            'username-email'=>'required|string|min:4|max:255',
        ]);
        $status = Password::sendResetLink(
            ['email' => $request["username-email"]],
        );
        if($status !== Password::RESET_LINK_SENT){
            $status = Password::sendResetLink(
                ['username' => $request["username-email"]],
            );
        }

        return $status === Password::RESET_LINK_SENT
            ? back()->withInput()->with(['reset-password-sent' => __($status)])
            : back()->withInput()->with(['reset-password-error' => __($status)]);
    }

    public function getReset($token){
        return view("auth.passwords.reset", ['token' => $token, "actionButton" => false]);
    }

    public function postReset(Request $request){
        $request->validate([
            'token' => 'required',
            'email'=>'required|string|email|max:255',
            'password'=>'required|string|min:8||max:255|required_with:password-confirmation|same:password-confirmation',
            'password-confirmation'=>'required',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password-confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                $user->setRememberToken(Str::random(60));

                event(new PasswordReset($user));
            }
        );
        if($status == Password::INVALID_TOKEN){
            return redirect()->route('resetPasswordGet')->with('token-expired', 'token expired');
        }

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('loginGet')->with('password-updated', __($status))
            : back()->withInput()->withErrors(['email' => __($status)]);
    }
}
