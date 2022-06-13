<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMessageController extends Controller
{
    public function __invoke(Request $request){
    }

    public function get(Request $request){
        $user = Auth::user();
        if(!$user->admin){
            abort(401);
        }

        return view("admin.admin-message", ['message' => $user->admin_message]);
    }

    public function save(Request $request){
        $user = Auth::user();
        if(!$user->admin){
            abort(401);
        }
        $updated  = $user->update([
            'admin_message' => $request['message'],
        ]);

        return response()->json('success');
    }

}
