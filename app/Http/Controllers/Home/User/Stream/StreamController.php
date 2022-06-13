<?php

namespace App\Http\Controllers\Home\User\Stream;

use App\Events\streamFire;
use App\Helpers\Friendships\FriendshipStatus;
use App\Helpers\Messages\SendMessageStatus;
use App\Helpers\Users\SendFriendRequestStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Pusher\Pusher;

class StreamController extends Controller
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

    public function testStream(){
        return view('home.stream.test');
    }

    public function testStreamFire(){
        $message = "hi from server!";
        /*Redis::subscribe(['StreamFire'], function ($message) {
            var_dump($message);
        });*/
        event(new streamFire("hi there!"));
        return $message;
    }

    public function stream(Request $request){
        $user = Auth::user();
        return view("home.user.profile.stream",['user' => $user, 'addFriendButton' => false, 'sendMessageButton' => false]);
   //return view('home.user.profile.stream');
    }

    public function userStream(Request $request, $user){
        $authUser = Auth::user();
        $user = User::where('username', $user)->first();
        if($authUser != null && $authUser->id == $user->id){
            return redirect(route('userAboutGet'));
        }

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

        return view("home.user.profile.user-stream",['user' => $user, 'addFriendButton' => $addFriendButton, 'cancelFriendButton' => $cancelFriendButton, 'acceptFriendButton' => $acceptFriendButton, 'deniedFriendButton' => $deniedFriendButton, 'blockFriendButton' => $blockFriendButton, 'unblockFriendButton' => $unblockFriendButton, 'unfriendButton' => $unfriendButton, 'sendMessageButton' => $sendMessageButton]);
    }

    public function authenticate(Request $request){
        $socketId = $request->socket_id;
        $channelName = $request->channel_name;
        $pusher = new Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), [
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => false,
            'useTLS' => false,
            'host' => 'tongle.ved',
            'port' => 6001,
            'scheme' => 'http'
        ]);
        $presence_data = ['name' => Auth::user()->full_name];
        $key = $pusher->presence_auth($channelName, $socketId, Auth::user()->id, $presence_data);
        return response($key);
    }
}
