<?php

namespace App\Http\Controllers\Home\User\Profile\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralSettingsController extends Controller
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
        return view("home.user.profile.settings.general-settings");
    }

    public function post(Request $request){
        $this->validate($request,[
            'email-notification-newsletter'=>'nullable|string|max:255',
            'email-notification-comment'=>'nullable|string|max:255',
            'email-notification-tag'=>'nullable|string|max:255',
            'email-notification-friend_request'=>'nullable|string|max:255',
            'email-notification-group'=>'nullable|string|max:255',
            'email-notification-event'=>'nullable|string|max:255',
            'email-notification-marketplace'=>'nullable|string|max:255',
            'privacy-see-profile'=>'nullable|string|max:255',
            'privacy-send-friend-request'=>'nullable|string|max:255',
            'privacy-send-message'=>'nullable|string|max:255',
            'privacy-chat-activity'=>'nullable|string|max:255',
        ]);
        //$r = $request;
        $user = Auth::user();
        isset($request["email-notification-newsletter"]) && !empty($request["email-notification-newsletter"]) && $request["email-notification-newsletter"] == "on" ? $user->email_notification_newsletter = true : $user->email_notification_newsletter = false;
        isset($request["email-notification-comment"]) && !empty($request["email-notification-comment"]) && $request["email-notification-comment"] == "on" ? $user->email_notification_comment = true : $user->email_notification_comment = false;
        isset($request["email-notification-tag"]) && !empty($request["email-notification-tag"]) && $request["email-notification-tag"] == "on" ? $user->email_notification_tag = true : $user->email_notification_tag = false;
        isset($request["email-notification-friend_request"]) && !empty($request["email-notification-friend_request"]) && $request["email-notification-friend_request"] == "on" ? $user->email_notification_friend_request = true : $user->email_notification_friend_request = false;
        isset($request["email-notification-group"]) && !empty($request["email-notification-group"]) && $request["email-notification-group"] == "on" ? $user->email_notification_group = true : $user->email_notification_group = false;
        isset($request["email-notification-event"]) && !empty($request["email-notification-event"]) && $request["email-notification-event"] == "on" ? $user->email_notification_event = true : $user->email_notification_event = false;
        isset($request["email-notification-marketplace"]) && !empty($request["email-notification-marketplace"]) && $request["email-notification-marketplace"] == "on" ? $user->email_notification_marketplace = true : $user->email_notification_marketplace= false;
        $user->privacy_see_profile = $request["privacy-see-profile"];
        $user->privacy_send_friend_request = $request["privacy-send-friend-request"];
        $user->privacy_send_message = $request["privacy-send-message"];
        $user->privacy_chat_activity = $request["privacy-chat-activity"];
        $user->save();
        return redirect(route('settingsGeneralSettingsGet'))->with('success', 'Your general settings has been updated successfully.');
    }
}
