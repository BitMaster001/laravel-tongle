<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
        if(!Auth::check() || !Auth::user()->hasVerifiedEmail()){
            return redirect(route("loginGet"));
        }
        return view("home.home", ['canPost' => true, 'user' => Auth::user()]);
    }
}
