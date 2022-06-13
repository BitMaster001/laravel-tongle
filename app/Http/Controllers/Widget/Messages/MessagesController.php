<?php

namespace App\Http\Controllers\Widget\Messages;

use App\Helpers\Friendships\FriendshipStatus;
use App\Helpers\Messages\SendMessageStatus;
use App\Helpers\Messages\ThreadParticipantStatus;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Participant;
use App\Models\Thread;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
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
        return view("home.user.profile.settings.messages");
    }

    public function postMessagesGet(){
//        return;
        $user = Auth::user();
        $user->justSeen();
        $messages = [];
        $messages['id'] = $user->id;
        $messages['friends'] = $user->getMessageableFriends();
        //$messages['time'] = date('Y-m-d H:i:s');
        //$messages['time'] = Carbon::now()->subMinutes(5)->toDateTimeString();
        $messages['time'] = Carbon::now()->toDateTimeString();
        return response()->json($messages);
    }

    public function postMessagesGetv2(){
        $user = Auth::user();
        return response()->json($user->getMessageableFriendsv2());
    }

    public function postMessageAdd(Request $request, $user){
        $curentUser = Auth::user();
        $user = User::where('username', $user)->first();
        if(!$user || !$curentUser){
            abort(401);
        }
        $thread = $curentUser->getThreadWithUser($user);

        if($thread == null){
            $canContact = false;
            if($curentUser->isFriendWith($user)){
                $canContact = true;
            }else{
                switch ($user->privacy_send_message){
                    case SendMessageStatus::FRIENDSOFFRIENDS:
                        if($curentUser->isFriendsOfFriends($user)){
                            $canContact = true;
                        }
                        break;
                    case SendMessageStatus::ONLYFRIENDS:
                        break;
                    default:
                        $canContact = true;
                }
            }

            if($canContact){
                $thread = Thread::create();
                Participant::create([
                    'thread_id' => $thread->id,
                    'user_id' => $curentUser->id,
                    'last_read' => new Carbon,
                    'status' => ThreadParticipantStatus::ACCEPTED,
                ]);
                Participant::create([
                    'thread_id' => $thread->id,
                    'user_id' => $user->id,
                    'status' => ThreadParticipantStatus::ACCEPTED,
                ]);
            }
        }
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => $curentUser->id,
            'body' => $request['message'],
        ]);
    }

    public function postLastMessagesGet(Request $request, $user){
        $curentUser = Auth::user();
        $user = User::where('username', $user)->first();
        $lastMessageRecivedTime = $request['time'];
        if(!$user || !$curentUser || !$lastMessageRecivedTime){
            abort(401);
        }
        $messages =[];
        $userLastMessages = $curentUser->getLatestMessagesFromUser($user, $lastMessageRecivedTime);
            if(count($userLastMessages)>0){
                $messages["messages"] = $userLastMessages;
            }
        return response()->json($messages);
    }

    public function postLastMessagesCheck(Request $request){
        $curentUser = Auth::user();
        $lastMessageRecivedTime = $request['time'];
        if(!$curentUser || !$lastMessageRecivedTime){
            abort(401);
        }

        $data["newMessage"] = $curentUser->haveNewMessages($lastMessageRecivedTime);

        return response()->json($data);
    }

    public function postContactNoFriendGet(Request $request, $user){
        $curentUser = Auth::user();
        $user = User::where('username', $user)->first();
        if(!$user || !$curentUser){
            abort(401);
        }

        $data = [];
        $sendMessage = true;

        if($user->privacy_send_message == SendMessageStatus::FRIENDSOFFRIENDS && !$curentUser->isFriendsOfFriends($user)){
            $sendMessage = false;
        }
        if($user->privacy_send_message == SendMessageStatus::ONLYFRIENDS && !$curentUser->isFriendWith($user) ){
            $sendMessage = false;
        }
        $friendship = $curentUser->getFriendship($user);
        if($friendship != null && $friendship->status == FriendshipStatus::BLOCKED){
            $sendMessage = false;
        }

        if($sendMessage){
            $data["friend"] = User::where('username', $user->username)->select('id', 'username as name', 'full_name as fullName', 'avatar', 'gender', 'last_seen as lastSeen', 'privacy_chat_activity as status')->first();
        }

        return response()->json($data);
    }

    public function postMessageDelete(Request $request, $user){
        $curentUser = Auth::user();
        $user = User::where('username', $user)->first();
        if(!$user || !$curentUser){
            abort(401);
        }
        $thread = $curentUser->getThreadWithUser($user);
        if($thread != null){
            $thread->delete();
        }
        return redirect()->back()->with('success', 'Your messages with '.$user->full_name.' has been deleted.');
    }
}
