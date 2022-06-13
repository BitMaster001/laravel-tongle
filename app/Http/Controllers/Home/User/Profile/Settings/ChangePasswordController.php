<?php

namespace App\Http\Controllers\Home\User\Profile\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ChangePasswordController extends Controller
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
        return view("home.user.profile.settings.change-password");
    }

    public function post(Request $request){
        $this->validate($request,[
            'current-password'=>'required|string|min:8||max:255',
            'new-password'=>'required|string|min:8||max:255|required_with:password-confirmation|same:password-confirmation',
            'password-confirmation'=>'required',
        ]);
        $user = Auth::user();
        if (Hash::check($request["current-password"], $user->password)) {
            if($request["current-password"] != $request['new-password']){
            $user->password = Hash::make($request['new-password']);
            $user->save();
            return redirect(route('settingsChangePasswordGet'))->with('success', 'Your password has been updated successfully.');
        }else{
                return redirect(route('settingsChangePasswordGet'))->with('danger', 'Your password has not been updated. Your new password must be different from your previous password.')->withInput();
            }
        }else{
            throw ValidationException::withMessages(['current-password' => 'The current password you entered did not match our records. Please double-check and try again, or try to reset your password.']);
        }
    }

    public function getReste(){
        Auth::logout();
        return redirect(route('resetPasswordGet'));
    }
}
