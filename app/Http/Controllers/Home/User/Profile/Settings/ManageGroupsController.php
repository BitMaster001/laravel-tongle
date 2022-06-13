<?php

namespace App\Http\Controllers\Home\User\Profile\Settings;

use App\Helpers\Groupships\Groupable;
use App\Helpers\Posts\PostTypes;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ManageGroupsController extends Controller
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
        return view("home.user.profile.settings.manage-groups");
    }

    public function new(Request $request){
        $title = "Create New Group";
        return view("home.user.profile.settings.manage-groups-edit", [ 'group' => new Group(), 'title' => $title]);
    }

    public function manage(Request $request, $groupName){
        $group = Group::where('username', $groupName)->first();
        if($group == null){
            abort(404);
        }
        if($group->user_id != Auth::user()->id){
            abort(401);
        }
        $title = "Update Group";
        return view("home.user.profile.settings.manage-groups-edit", [ 'group' => $group, 'title' => $title]);
    }

    public function edit(Request $request){
        $this->validate($request,[
            'avatar'=>'image|dimensions:min_width=110,min_height=110',
            'cover'=>'image|dimensions:min_width=1184,min_height=300',
            'name'=>'required|string|max:255',
            'username'=>'required|string|min:4|max:255|unique:groups,username,'.$request->id.'|alpha_dash',
            'type'=>'required|string|max:255',
            'tagline'=>'nullable|string|max:255',
            'website'=>'nullable|string|max:255',
            'email'=>'nullable|email|max:255',
            'about'=>'nullable|string',
            'rule'=>'nullable|string',
            'facebook'=>'nullable|string|max:255',
            'twitter'=>'nullable|string|max:255',
            'instagram'=>'nullable|string|max:255',
            'twitch'=>'nullable|string|max:255',
            'google'=>'nullable|string|max:255',
            'youtube'=>'nullable|string|max:255',
            'patreon'=>'nullable|string|max:255',
            'discord'=>'nullable|string|max:255',
            'deviantart'=>'nullable|string|max:255',
            'behance'=>'nullable|string|max:255',
            'dribbble'=>'nullable|string|max:255',
            'artstation'=>'nullable|string|max:255',
        ]);
        $user = Auth::user();
        $id = (int) $request->id;
        $group = group::find($id);
        if($group == null){
            //create
            $group = Group::create([
                'name' => $request['name'],
                'username' => $request['username'],
                'type' => $request['type'],
                'tagline' => $request['tagline'],
                'website' => $request['website'],
                'email' => $request['email'],
                'about' => $request['about'],
                'rule' => $request['rule'],
                'facebook' => $request['facebook'],
                'twitter' => $request['twitter'],
                'instagram' => $request['instagram'],
                'twitch' => $request['twitch'],
                'google' => $request['google'],
                'youtube' => $request['youtube'],
                'patreon' => $request['patreon'],
                'discord' => $request['discord'],
                'deviantart' => $request['deviantart'],
                'behance' => $request['behance'],
                'dribbble' => $request['dribbble'],
                'artstation' => $request['artstation'],
                'user_id' => $user->id,
            ]);
        }else{
            //update
            $group->update([
                'name' => $request['name'],
                'username' => $request['username'],
                'type' => $request['type'],
                'tagline' => $request['tagline'],
                'website' => $request['website'],
                'email' => $request['email'],
                'about' => $request['about'],
                'rule' => $request['rule'],
                'facebook' => $request['facebook'],
                'twitter' => $request['twitter'],
                'instagram' => $request['instagram'],
                'twitch' => $request['twitch'],
                'google' => $request['google'],
                'youtube' => $request['youtube'],
                'patreon' => $request['patreon'],
                'discord' => $request['discord'],
                'deviantart' => $request['deviantart'],
                'behance' => $request['behance'],
                'dribbble' => $request['dribbble'],
                'artstation' => $request['artstation'],
            ]);

        }

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarUrl = 'storage/groups/'.$group->username.'/profile/';
            $avatarName = 'avatar.jpg';
            if(!File::isDirectory($avatarUrl)){
                File::makeDirectory($avatarUrl, 0777, true, true);
            }
            //$avatar->move(public_path($avatarUrl), $avatarName);
            $img = Image::make($avatar);
            $img->fit(110);
            $img->save(public_path($avatarUrl).$avatarName);
            $group->update(['avatar' => '/'.$avatarUrl.$avatarName."?v=".Carbon::now()->timestamp]);
        }

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $coverUrl = 'storage/groups/'.$group->username.'/profile/';
            $coverName = 'cover.jpg';
            if(!File::isDirectory($coverUrl)){
                File::makeDirectory($coverUrl, 0777, true, true);
            }
            //$cover->move(public_path($coverUrl), $coverName);
            $img = Image::make($cover);
            $img->fit(1184, 300);
            $img->save(public_path($coverUrl).$coverName);
            $group->update(['cover' => '/'.$coverUrl.$coverName."?v=".Carbon::now()->timestamp]);
        }

        return redirect(route('settingsManageGroupsManageGet', ['group' => $group->username]))->with('success', 'Your group has been updated successfully.');
    }

    public function members(Request $request, $groupName){
        $group = Group::where('username', $groupName)->first();
        if($group == null){
            abort(404);
        }
        if($group->user_id != Auth::user()->id){
            abort(401);
        }

        $groupshipsApproved = $group->getGroupshipsApproved();
        $groupshipsUnapproved = $group->getGroupshipsUnapproved();
        $groupshipsBlocked = $group->getGroupshipsBlocked();

        return view("home.user.profile.settings.manage-groups-members", ['group' => $group, 'groupshipsApproved' => $groupshipsApproved, 'groupshipsUnapproved' => $groupshipsUnapproved, 'groupshipsBlocked' => $groupshipsBlocked]);
    }

    public function delete(Request $request, $groupName){
        $group = Group::where('username', $groupName)->first();
        if($group == null){
            abort(404);
        }
        if($group->user_id != Auth::user()->id){
            abort(401);
        }
        $group->delete();
        return redirect(route('settingsManageGroupsGet'))->with('success', 'Your group has been deleted successfully.');
    }

    public function invitations(Request $request){
        $authUser = Auth::user();

        $groupshipsInvited = Groupable::getGroupshipInvited($authUser);

        return view("home.user.profile.settings.invitations", ['groupshipsInvited' => $groupshipsInvited]);
    }
}
