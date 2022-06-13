<?php

namespace App\Http\Controllers\Home\User\Profile;

use App\Helpers\Friendships\FriendshipStatus;
use App\Helpers\Messages\SendMessageStatus;
use App\Helpers\Users\SendFriendRequestStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
        $user = Auth::user();
        $newsfeed = 'Profile';
        $profileName = $user->username;
        return view("home.user.profile.profile",['user' => $user, 'addFriendButton' => false, 'sendMessageButton' => false, 'canPost' => true, 'newsfeed' => $newsfeed, 'profileName' => $profileName,]);
    }

    public function getUser($user){
        $authUser = Auth::user();
        $user = User::where('username', $user)->first();
        if($authUser != null && $authUser->id == $user->id){
            return redirect(route('userProfileGet'));
        }
        $user->update(['visits' => ($user->visits+1)]);

        $addFriendButton = true;
        $cancelFriendButton = false;
        $acceptFriendButton = false;
        $deniedFriendButton = false;
        $blockFriendButton = false;
        $unblockFriendButton = false;
        $unfriendButton = false;

        if($user->privacy_send_friend_request == SendFriendRequestStatus::NoOne){
            $addFriendButton = false;
        }
        if($user->privacy_send_friend_request == SendFriendRequestStatus::FriendsOfFriends && !$authUser->isFriendsOfFriends($user)){
            $addFriendButton = false;
        }
        $friendship = $authUser->getFriendship($user);

        if($friendship != null){
            $addFriendButton = false;
            if($friendship->sender_id == $authUser->id){
                switch ($friendship->status) {
                    case FriendshipStatus::PENDING:
                        $cancelFriendButton = true;
                    break;
                    case FriendshipStatus::ACCEPTED:
                        $unfriendButton = true;
                        $blockFriendButton = true;
                    break;
                    case FriendshipStatus::DENIED:
                        $addFriendButton = true;
                    break;
                    case FriendshipStatus::BLOCKED:
                        $unblockFriendButton = true;
                    break;
                }
            }else{
                switch ($friendship->status) {
                    case FriendshipStatus::PENDING:
                        $acceptFriendButton = true;
                        $deniedFriendButton = true;
                        break;
                    case FriendshipStatus::ACCEPTED:
                        $unfriendButton = true;
                        $blockFriendButton = true;
                        break;
                    case FriendshipStatus::DENIED:
                        $addFriendButton = true;
                        break;
                    case FriendshipStatus::BLOCKED:
                        break;
                }
            }
        }

        $sendMessageButton = true;

        if($user->privacy_send_message == SendMessageStatus::FRIENDSOFFRIENDS && !$authUser->isFriendsOfFriends($user)){
            $sendMessageButton = false;
        }
        if($user->privacy_send_message == SendMessageStatus::ONLYFRIENDS && !$authUser->isFriendWith($user) ){
            $sendMessageButton = false;
        }
        if($friendship != null && $friendship->status == FriendshipStatus::BLOCKED){
            $sendMessageButton = false;
        }

        $newsfeed = 'Profile';
        $profileName = $user->username;

       return view("home.user.profile.profile",['user' => $user, 'addFriendButton' => $addFriendButton, 'cancelFriendButton' => $cancelFriendButton, 'acceptFriendButton' => $acceptFriendButton, 'deniedFriendButton' => $deniedFriendButton, 'blockFriendButton' => $blockFriendButton, 'unblockFriendButton' => $unblockFriendButton, 'unfriendButton' => $unfriendButton, 'sendMessageButton' => $sendMessageButton,'newsfeed' => $newsfeed, 'profileName' => $profileName,]);
    }
}
