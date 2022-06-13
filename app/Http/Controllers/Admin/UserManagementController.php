<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Friendship;
use App\Models\Group;
use App\Models\Groupship;
use App\Models\Image;
use App\Models\Message;
use App\Models\Participant;
use App\Models\Post;
use App\Models\Preview;
use App\Models\Reaction;
use App\Models\Share;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
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
        $pagination = 10;
        $user = Auth::user();
        if(!$user->admin){
            abort(401);
        }
        $users = User::where('id', '!=' , $user->id)->orderBy('created_at', 'desc');
        if($request['q'] != null){
            $queryValue = $request['q'];
            $users = $users->where(function($query) use ($queryValue) {
                $query->where('full_name', 'LIKE', "%{$queryValue}%")
                    ->orWhere('username', 'LIKE', "%{$queryValue}%");
            });
        }

        if($request['filter'] == 1){
            $users = $users->where('blocked_at' , '!=', null);
        }else if($request['filter'] == 2){
            $users = $users->where('admin' , '=', 1);
        }

        $users = $users->paginate($pagination);
        return view("admin.user-management", ['users' => $users]);
    }

    public function addAdmin(Request $request, $userName){
        $user = Auth::user();
        if(!$user->admin){
            abort(401);
        }
        $currentUser = User::where('username', $userName)->first();
        if(!$currentUser){
            abort(404);
        }
        $currentUser->update([
            'admin' => 1,
        ]);
        return redirect()->back()->with('success', $userName.' has been added to administration successfully.');
    }

    public function removeAdmin(Request $request, $userName){
        $user = Auth::user();
        if(!$user->admin){
            abort(401);
        }
        $currentUser = User::where('username', $userName)->first();
        if(!$currentUser){
            abort(404);
        }
        $currentUser->update([
            'admin' => 0,
        ]);
        return redirect()->back()->with('success', $userName.' has been removed from administration successfully.');
    }

    public function unblock(Request $request, $userName){
        $user = Auth::user();
        if(!$user->admin){
            abort(401);
        }
        $currentUser = User::where('username', $userName)->first();
        if(!$currentUser){
            abort(404);
        }
        $currentUser->update([
            'blocked_at' => null,
        ]);
        return redirect()->back()->with('success', $userName.' has been unblocked successfully.');
    }

    public function block(Request $request, $userName){
        $user = Auth::user();
        if(!$user->admin){
            abort(401);
        }
        $currentUser = User::where('username', $userName)->first();
        if(!$currentUser){
            abort(404);
        }
        $currentUser->update([
            'blocked_at' => new Carbon(),
        ]);
        return redirect()->back()->with('success', $userName.' has been blocked successfully.');
    }
    
    public function delete(Request $request, $userName){
        $user = Auth::user();
        if(!$user->admin){
            abort(401);
        }
        $currentUser = User::where('username', $userName)->first();
        if(!$currentUser){
            abort(404);
        }
        Comment::where('user_id', $currentUser->id)->delete();
        Friendship::where('sender_id', $currentUser->id)->orWhere('recipient_id', $currentUser->id)->delete();
        $groups = Group::where('user_id', $currentUser->id)->get();
        foreach($groups as $group){
            Groupship::where('group_id', $group->id)->delete();
            $group->delete();
        }
        Groupship::where('member_id', $currentUser->id)->delete();
        Image::where('user_id', $currentUser->id)->delete();
        Message::where('user_id', $currentUser->id)->delete();
        $participants = Participant::where('user_id', $currentUser->id)->get();
        foreach($participants as $participant){
            $participant->thread->delete();
            $participant->delete();
        }
        Post::where('user_id', $currentUser->id)->delete();
        Preview::where('user_id', $currentUser->id)->delete();
        Reaction::where('user_id', $currentUser->id)->delete();
        Tag::where('tagged_id', $currentUser->id)->delete();
        $currentUser->delete();
        return redirect()->back()->with('success', $userName.' has been deleted successfully.');
    }
}
