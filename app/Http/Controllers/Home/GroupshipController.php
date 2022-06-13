<?php

namespace App\Http\Controllers\Home;

use App\Helpers\Groupships\GroupshipStatus;
use App\Helpers\Groupships\GroupTypes;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Groupship;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GroupshipController extends Controller
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

    public function getGroupshipAdd(Request $request, $groupName){
        $group = Group::where('username', $groupName)->first();
        $authUser = Auth::user();
        if($group == null || $authUser == null){
            abort(404);
        }
        $groupship = $group->getGroupship($authUser);
        $groupshipStatus = GroupshipStatus::ACCEPTED;
        $message = 'Your request to join '.$group->name.' has been approved.';
        if($groupship == null){
            if($group->type == GroupTypes::CLOSED){
                $groupshipStatus = GroupshipStatus::PENDING;
                $message = 'Your request to join '.$group->name.' has been sent to approved by admin.';
            }
            Groupship::create([
                'key' => $this->generateKey(),
                'group_id' => $group->getKey(),
                'group_type' => $group->getMorphClass(),
                'member_id' => $authUser->getKey(),
                'member_type' => $authUser->getMorphClass(),
                'status' => $groupshipStatus,
            ]);
        }
        $group->countMembers();
        return redirect()->back()->with('success', $message);
    }

    public function getGroupshipInvite(Request $request, $groupName){
        $group = Group::where('username', $groupName)->first();
        $authUser = Auth::user();
        if($group == null || $authUser == null){
            abort(404);
        }

        $invitedFriends = json_decode($request['new-invite-friends']);
        foreach ($invitedFriends as $invitedFriend){
            $user = User::where('username', $invitedFriend->name)->first();
            if($user != null){
                $groupship = $group->getGroupship($user);
                $groupshipStatus = GroupshipStatus::INVITED;
                if($groupship == null){
                    Groupship::create([
                        'key' => $this->generateKey(),
                        'group_id' => $group->getKey(),
                        'group_type' => $group->getMorphClass(),
                        'member_id' => $user->getKey(),
                        'member_type' => $user->getMorphClass(),
                        'status' => $groupshipStatus,
                        'user_id' => $authUser->id,
                    ]);
                }
            }
        }
        $group->countMembers();
        return redirect()->back()->with('success', 'Invitations to join '.$group->name.' has been sent.');
    }

    public function getGroupshipCancel(Request $request, $groupshipKey){
        $groupship = Groupship::where('key', $groupshipKey)->first();
        $authUser = Auth::user();
        if($groupship == null || $authUser == null){
            abort(404);
        }
        $memeber = $groupship->member;
        if($memeber->id != $authUser->id){
            abort(401);
        }
        $group = $groupship->group;
        $groupship->delete();
        $group->countMembers();
        return redirect()->back()->with('success', 'Your request to join '.$group->name.' has been cancel.');
    }

    public function getGroupshipAccept(Request $request, $groupshipKey){
        $groupship = Groupship::where('key', $groupshipKey)->first();
        $authUser = Auth::user();
        if($groupship == null || $authUser == null){
            abort(404);
        }
        $memeber = $groupship->member;
        if($memeber->id != $authUser->id){
            abort(401);
        }
        $group = $groupship->group;
        $groupshipStatus = GroupshipStatus::ACCEPTED;
        $message = 'The request to join '.$group->name.' has been approved.';
            if($group->type == GroupTypes::CLOSED){
                $groupshipStatus = GroupshipStatus::PENDING;
                $message = 'The request to join '.$group->name.' has been sent to approved by admin.';
            }
        $groupship->update([
                'status' => $groupshipStatus,
            ]);
        $group->countMembers();
        return redirect()->back()->with('success', $message);
    }

    public function getGroupshipDenied(Request $request, $groupshipKey){
        $groupship = Groupship::where('key', $groupshipKey)->first();
        $authUser = Auth::user();
        if($groupship == null || $authUser == null){
            abort(404);
        }
        $memeber = $groupship->member;
        if($memeber->id != $authUser->id){
            abort(401);
        }
        $group = $groupship->group;
        $groupship->delete();
        $group->countMembers();
        return redirect()->back()->with('success', 'The invitation to join '.$group->name.' has been cancel.');
    }

    public function getGroupshipLeave(Request $request, $groupshipKey){
        $groupship = Groupship::where('key', $groupshipKey)->first();
        $authUser = Auth::user();
        if($groupship == null || $authUser == null){
            abort(404);
        }
        $memeber = $groupship->member;
        if($memeber->id != $authUser->id){
            abort(401);
        }
        $group = $groupship->group;
        $groupship->delete();
        $group->countMembers();
        return redirect()->back()->with('success', 'Your request to leave '.$group->name.' has been successfully submitted.');
    }

    public function getGroupshipApprove(Request $request, $groupshipKey){
        $groupship = Groupship::where('key', $groupshipKey)->first();
        $authUser = Auth::user();
        if($groupship == null || $authUser == null){
            abort(404);
        }
        $group = $groupship->group;
        if($group->user_id != $authUser->id){
            abort(401);
        }
        $groupship->update([
            'status' => GroupshipStatus::ACCEPTED,
        ]);
        $memeber = $groupship->member;
        $group->countMembers();
        return redirect()->back()->with('success', 'The request to join '.$group->name.' from '.$memeber->full_name.' has been approved.');
    }

    public function getGroupshipDelete(Request $request, $groupshipKey){
        $groupship = Groupship::where('key', $groupshipKey)->first();
        $authUser = Auth::user();
        if($groupship == null || $authUser == null){
            abort(404);
        }
        $group = $groupship->group;
        if($group->user_id != $authUser->id){
            abort(401);
        }
        $memeber = $groupship->member;
        $groupship->delete();
        $group->countMembers();
        return redirect()->back()->with('success', 'The member '.$memeber->full_name.' has been deleted.');
    }

    public function getGroupshipBlock(Request $request, $groupshipKey){
        $groupship = Groupship::where('key', $groupshipKey)->first();
        $authUser = Auth::user();
        if($groupship == null || $authUser == null){
            abort(404);
        }
        $group = $groupship->group;
        if($group->user_id != $authUser->id){
            abort(401);
        }
        $groupship->update([
            'status' => GroupshipStatus::BLOCKED,
        ]);
        $memeber = $groupship->member;
        $group->countMembers();
        return redirect()->back()->with('success', 'The member '.$memeber->full_name.' has been blocked.');
    }

    public function getGroupshipUnblock(Request $request, $groupshipKey){
        $groupship = Groupship::where('key', $groupshipKey)->first();
        $authUser = Auth::user();
        if($groupship == null || $authUser == null){
            abort(404);
        }
        $group = $groupship->group;
        if($group->user_id != $authUser->id){
            abort(401);
        }
        $groupship->update([
            'status' => GroupshipStatus::ACCEPTED,
        ]);
        $memeber = $groupship->member;
        $group->countMembers();
        return redirect()->back()->with('success', 'The member '.$memeber->full_name.' has been unblocked.');
    }

    private function generateKey(){
        return strtolower(sha1(time()).Auth::user()->getKey().Str::random(23));
    }
}
