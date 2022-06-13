<?php

namespace App\Http\Controllers\Home;

use App\Helpers\Friendships\FriendshipStatus;
use App\Helpers\Groupships\GroupshipStatus;
use App\Helpers\Groupships\GroupTypes;
use App\Helpers\Messages\SendMessageStatus;
use App\Helpers\Newsfeed\NewsfeedTypes;
use App\Helpers\Users\SendFriendRequestStatus;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
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

    public function getGroups(Request $request){
        $groups = Group::orderBy('created_at', 'desc');
        if($request['q'] != null){
            $queryValue = $request['q'];
            $groups = $groups->where(function($query) use ($queryValue) {
                $query->where('name', 'LIKE', "%{$queryValue}%")
                    ->orWhere('about', 'LIKE', "%{$queryValue}%");
            });
        }
        $groups = $groups->orderBy('created_at', 'desc');
        $groups = $groups->get();
    return view('home.groups', ['groups' => $groups]);
    }

    public function get(){
        $user = Auth::user();
        return view("home.user.profile.groups",['user' => $user]);
    }

    public function getUser($user){
        $authUser = Auth::user();
        $user = User::where('username', $user)->first();
        if($authUser != null && $authUser->id == $user->id){
            return redirect(route('userProfileGet'));
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

        return view("home.user.profile.groups",['user' => $user, 'addFriendButton' => $addFriendButton, 'cancelFriendButton' => $cancelFriendButton, 'acceptFriendButton' => $acceptFriendButton, 'deniedFriendButton' => $deniedFriendButton, 'blockFriendButton' => $blockFriendButton, 'unblockFriendButton' => $unblockFriendButton, 'unfriendButton' => $unfriendButton, 'sendMessageButton' => $sendMessageButton]);
    }

    public function getGroup(Request $request, $groupName){
        $group = Group::where('username', $groupName)->first();
        $authUser = Auth::user();
        if($group == null || $authUser == null){
            abort(404);
        }

        $addGroupButton = true;
        $cancelGroupButton = false;
        $acceptGroupButton = false;
        $deniedGroupButton = false;
        $leaveGroupButton = false;
        $inviteGroupButton = false;
        $canPost = false;
        $public = true;

        if($group->type == GroupTypes::CLOSED){
            $public = false;
        }

        if($group->user_id == $authUser->id){
            $addGroupButton = false;
            $inviteGroupButton = true;
            $canPost = true;
            $public = true;
        }else{
            $group->newVist();
        }
        $groupship = $group->getGroupship($authUser);

        if($groupship != null){
            $addGroupButton = false;
            switch ($groupship->status) {
                case GroupshipStatus::PENDING:
                    $cancelGroupButton = true;
                    break;
                case GroupshipStatus::INVITED:
                    $acceptGroupButton = true;
                    $deniedGroupButton = true;
                    break;
                case GroupshipStatus::ACCEPTED:
                    $leaveGroupButton = true;
                    $inviteGroupButton = true;
                    $canPost = true;
                    $public = true;
                    break;
                case GroupshipStatus::BLOCKED:
                    $public = false;
                    break;
            }
        }
        $newsfeed = NewsfeedTypes::GROUP;
        $profileName = $group->username;

        return view("home.group.profile", [ 'newsfeed' => $newsfeed, 'profileName' => $profileName, 'canPost' => $canPost, 'public' => $public, 'group' => $group, 'groupship' => $groupship, 'addGroupButton' => $addGroupButton, 'cancelGroupButton' => $cancelGroupButton, 'acceptGroupButton' => $acceptGroupButton, 'deniedGroupButton' => $deniedGroupButton, 'leaveGroupButton' => $leaveGroupButton, 'inviteGroupButton' => $inviteGroupButton]);
    }

    public function getGroupInfo(Request $request, $groupName){
        $group = Group::where('username', $groupName)->first();
        $authUser = Auth::user();
        if($group == null || $authUser == null){
            abort(404);
        }

        $addGroupButton = true;
        $cancelGroupButton = false;
        $acceptGroupButton = false;
        $deniedGroupButton = false;
        $leaveGroupButton = false;
        $inviteGroupButton = false;
        $public = true;

        if($group->type == GroupTypes::CLOSED){
            $public = false;
        }

        if($group->user_id == $authUser->id){
            $addGroupButton = false;
            $inviteGroupButton = true;
            $public = true;
        }
        $groupship = $group->getGroupship($authUser);

        if($groupship != null){
            $addGroupButton = false;
            switch ($groupship->status) {
                case GroupshipStatus::PENDING:
                    $cancelGroupButton = true;
                    break;
                case GroupshipStatus::INVITED:
                    $acceptGroupButton = true;
                    $deniedGroupButton = true;
                    break;
                case GroupshipStatus::ACCEPTED:
                    $leaveGroupButton = true;
                    $inviteGroupButton = true;
                    $public = true;
                    break;
                case GroupshipStatus::BLOCKED:
                    $public = false;
                    break;
            }
        }

        return view("home.group.info", [ 'group' => $group, 'groupship' => $groupship, 'public' => $public, 'addGroupButton' => $addGroupButton, 'cancelGroupButton' => $cancelGroupButton, 'acceptGroupButton' => $acceptGroupButton, 'deniedGroupButton' => $deniedGroupButton, 'leaveGroupButton' => $leaveGroupButton, 'inviteGroupButton' => $inviteGroupButton]);
    }

    public function getGroupMembers(Request $request, $groupName){
        $group = Group::where('username', $groupName)->first();
        $authUser = Auth::user();
        if($group == null || $authUser == null){
            abort(404);
        }

        $addGroupButton = true;
        $cancelGroupButton = false;
        $acceptGroupButton = false;
        $deniedGroupButton = false;
        $leaveGroupButton = false;
        $inviteGroupButton = false;
        $public = true;

        if($group->type == GroupTypes::CLOSED){
            $public = false;
        }

        if($group->user_id == $authUser->id){
            $addGroupButton = false;
            $inviteGroupButton = true;
            $public = true;
        }
        $groupship = $group->getGroupship($authUser);

        if($groupship != null){
            $addGroupButton = false;
            switch ($groupship->status) {
                case GroupshipStatus::PENDING:
                    $cancelGroupButton = true;
                    break;
                case GroupshipStatus::INVITED:
                    $acceptGroupButton = true;
                    $deniedGroupButton = true;
                    break;
                case GroupshipStatus::ACCEPTED:
                    $leaveGroupButton = true;
                    $inviteGroupButton = true;
                    $public = true;
                    break;
                case GroupshipStatus::BLOCKED:
                    $public = false;
                    break;
            }
        }

        return view("home.group.members", [ 'group' => $group, 'groupship' => $groupship, 'public' => $public, 'addGroupButton' => $addGroupButton, 'cancelGroupButton' => $cancelGroupButton, 'acceptGroupButton' => $acceptGroupButton, 'deniedGroupButton' => $deniedGroupButton, 'leaveGroupButton' => $leaveGroupButton, 'inviteGroupButton' => $inviteGroupButton]);
    }
    
    public function getGroupEvents(Request $request, $groupName){
        $group = Group::where('username', $groupName)->first();
        $authUser = Auth::user();
        if($group == null || $authUser == null){
            abort(404);
        }

        $addGroupButton = true;
        $cancelGroupButton = false;
        $acceptGroupButton = false;
        $deniedGroupButton = false;
        $leaveGroupButton = false;
        $inviteGroupButton = false;
        $public = true;

        if($group->type == GroupTypes::CLOSED){
            $public = false;
        }

        if($group->user_id == $authUser->id){
            $addGroupButton = false;
            $inviteGroupButton = true;
            $public = true;
        }
        $groupship = $group->getGroupship($authUser);

        if($groupship != null){
            $addGroupButton = false;
            switch ($groupship->status) {
                case GroupshipStatus::PENDING:
                    $cancelGroupButton = true;
                    break;
                case GroupshipStatus::INVITED:
                    $acceptGroupButton = true;
                    $deniedGroupButton = true;
                    break;
                case GroupshipStatus::ACCEPTED:
                    $leaveGroupButton = true;
                    $inviteGroupButton = true;
                    $public = true;
                    break;
                case GroupshipStatus::BLOCKED:
                    $public = false;
                    break;
            }
        }

        return view("home.group.events", [ 'group' => $group, 'groupship' => $groupship, 'public' => $public, 'addGroupButton' => $addGroupButton, 'cancelGroupButton' => $cancelGroupButton, 'acceptGroupButton' => $acceptGroupButton, 'deniedGroupButton' => $deniedGroupButton, 'leaveGroupButton' => $leaveGroupButton, 'inviteGroupButton' => $inviteGroupButton]);
    }

    public function getNewestGroups($rows = 10){
        $groups = Group::orderBy('created_at', 'desc');
        return $groups->take($rows)->get();
    }

    public function getPopularGroups($rows = 10){
        $groups = Group::orderBy('visits', 'desc');
        return $groups->take($rows)->get();
    }

    public function getActiveGroups($rows = 10){
        $groups = Group::orderBy('members', 'desc');
        return $groups->take($rows)->get();
    }
}
