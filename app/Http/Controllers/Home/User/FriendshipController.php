<?php

namespace App\Http\Controllers\Home\User;

use App\Helpers\Friendships\FriendshipStatus;
use App\Helpers\Users\SendFriendRequestStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendshipController extends Controller
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

    public function getFriendshipAdd($user){
        $sender = Auth::user();
        $recipient = User::where('username', $user)->first();

        if($recipient == null || $recipient->privacy_send_friend_request == SendFriendRequestStatus::NoOne || ($recipient->privacy_send_friend_request == SendFriendRequestStatus::FriendsOfFriends && !$recipient->isFriendsOfFriends($sender))){
            abort(401);
        }
        if($sender->getFriendship($recipient) != null){
            return redirect()->back();
        }
        $sender->befriend($recipient);
        return redirect()->back()->with('success', 'Your friend request has been sent to '.$recipient->full_name.'.');
    }

    public function getFriendshipCancel($user){
        $sender = Auth::user();
        $recipient = User::where('username', $user)->first();
        if($sender->getFriendship($recipient) == null || ($sender->getFriendship($recipient) != null && $sender->getFriendship($recipient)->status == FriendshipStatus::ACCEPTED)){
            return redirect()->back();
        }
        $sender->unfriend($recipient);
        return redirect()->back()->with('success', 'Your friend request to '.$recipient->full_name.' has been cancel.');
    }

    public function getFriendshipAccept($user){
        $sender = Auth::user();
        $recipient = User::where('username', $user)->first();
        if($sender->getFriendship($recipient) == null || ($sender->getFriendship($recipient) != null && $sender->getFriendship($recipient)->status == FriendshipStatus::ACCEPTED)){
            return redirect()->back();
        }
        $sender->acceptFriendRequest($recipient);
        $sender->update(['friends' => $sender->getFriendsCount()]);
        $recipient->update(['friends' => $recipient->getFriendsCount()]);
        return redirect()->back()->with('success', 'The friend request from '.$recipient->full_name.' has been accepted.');
    }

    public function getFriendshipDenied($user){
        $sender = Auth::user();
        $recipient = User::where('username', $user)->first();
        if($sender->getFriendship($recipient) == null || ($sender->getFriendship($recipient) != null && $sender->getFriendship($recipient)->status == FriendshipStatus::ACCEPTED)){
            return redirect()->back();
        }
        $sender->unfriend($recipient);
        return redirect()->back()->with('success', 'The friend request from '.$recipient->full_name.' has been denied.');
    }

    public function getFriendshipBlock($user){
        $sender = Auth::user();
        $recipient = User::where('username', $user)->first();
        if($sender->getFriendship($recipient) == null || ($sender->getFriendship($recipient) != null && $sender->getFriendship($recipient)->status != FriendshipStatus::ACCEPTED)){
            return redirect()->back();
        }
        $sender->blockFriend($recipient);
        $sender->update(['friends' => $sender->getFriendsCount()]);
        $recipient->update(['friends' => $recipient->getFriendsCount()]);
        return redirect()->back()->with('success', 'Your friend '.$recipient->full_name.' has been blocked.');
    }

    public function getFriendshipUnblock($user){
        $sender = Auth::user();
        $recipient = User::where('username', $user)->first();
        if($sender->getFriendship($recipient) == null || ($sender->getFriendship($recipient) != null && $sender->getFriendship($recipient)->status != FriendshipStatus::BLOCKED)){
            return redirect()->back();
        }
        $sender->unblockFriend($recipient);
        $sender->update(['friends' => $sender->getFriendsCount()]);
        $recipient->update(['friends' => $recipient->getFriendsCount()]);
        return redirect()->back()->with('success', 'Your friend '.$recipient->full_name.' has been unblocked.');
    }

    public function getFriendshipUnfriend($user){
        $sender = Auth::user();
        $recipient = User::where('username', $user)->first();
        if($sender->getFriendship($recipient) == null || ($sender->getFriendship($recipient) != null && $sender->getFriendship($recipient)->status != FriendshipStatus::ACCEPTED)){
            return redirect()->back();
        }
        $sender->unfriend($recipient);
        $sender->update(['friends' => $sender->getFriendsCount()]);
        $recipient->update(['friends' => $recipient->getFriendsCount()]);
        return redirect()->back()->with('success', 'Your friend request to '.$recipient->full_name.' has been cancel.');
    }
}
