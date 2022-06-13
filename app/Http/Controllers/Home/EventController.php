<?php

namespace App\Http\Controllers\Home;

use App\Helpers\Friendships\FriendshipStatus;
use App\Helpers\Groupships\GroupshipStatus;
use App\Helpers\Messages\SendMessageStatus;
use App\Helpers\Posts\PostTypes;
use App\Helpers\Users\SendFriendRequestStatus;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Event;
use App\Models\Group;
use App\Models\Groupship;
use App\Models\Image as ImageModle;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class EventController extends Controller
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

    public function getEvent(Request $request){
        $user = Auth::user();
        $date = new Carbon();
        $today = new Carbon();
        if($request['date']){
            $date = Carbon::parse($request['date']);
        }
        $calendar = $this->getEventsCalendar($date);
        return view("home.event.event",['user' => $user, 'date' => $date, 'today' => $today, 'calendar' => $calendar]);
    }

    public function getGroupNewEvent(Request $request, $groupName){
        $group = Group::where('username', $groupName)->first();
        if($group == null){
            abort(404);
        }
        $event = new Post();
        $title = '+ Add New Group Event';
        return view("home.event.event-edit",['event' => $event, 'title' => $title, 'group' => $group]);
    }

    public function getEventSearch(Request $request){
        $events = Event::Search(Auth::user(), $request['q']);
        return view("home.event.event-search", ['events' => $events]);
    }

    public function getNewEvent(Request $request){
        $event = new Post();
        $title = '+ Add New Event';
        return view("home.event.event-edit",['event' => $event, 'title' => $title]);
    }

    public function getEventEdit(Request $request){
            $this->validate($request,[
                'event-name'=>'required|string|min:1',
                'event-price'=>'required|numeric|min:0',
                'event-location'=>'required|string',
                'event-type'=>'required|string',
                'event-start-date'=>'required|date_format:d/m/Y',
                'event-start-time'=>'required|string|max:5',
                'event-start-time-annotation'=>'required|string|max:2',
                'event-end-date'=>'nullable|date_format:d/m/Y',
                'event-end-time'=>'nullable|string|max:5',
                'event-end-time-annotation'=>'nullable|string|max:2',
                'description'=>'nullable|string',
                //'new-post-images'=>'required|image|dimensions:min_width=800,min_height=300',
            ]);
            $title = $request['event-name'];
            $price = $request['event-price'];
            $location = $request['event-location'];
            $type = PostTypes::EVENT;
            $privacy = $request['event-type'];
            $description = $request['event-description'];
            $images = $request['new-post-images'];
            $invitedFriends = json_decode($request['event-invite-friends']);
            $authUser = Auth::user();
            $model = $authUser;
            if($request['group']){
                $model = Group::where('username', $request['group'])->first();
                if($model == null || $model->user_id != $authUser->id){
                    abort(401);
                }
            }
            $event_start  = DateTime::createFromFormat('d/m/Y H:i:s A', $request["event-start-date"]." ".$request["event-start-time"].":00"." ".$request["event-start-time-annotation"]);
            $event_end = null;
            if($request["event-end-date"]){
                $event_end = DateTime::createFromFormat('d/m/Y H:i:s A', $request["event-end-date"]." ".$request["event-end-time"].":00"." ".$request["event-end-time-annotation"]);
            }

            $post = Post::find($request['id']);

            if($post == null){
                if ($images == null || count($images) == 0){ return redirect()->back()->with('error', 'At least one image is required to create new event.'); }
                $post = Post::create([
                    'key' => $this->generateKey(),
                    'type' => $type,
                    'privacy' => $privacy,
                    'title' => $title,
                    'price' => $price,
                    'body' => $description,
                    'event_location' => $location,
                    'event_start' => $event_start,
                    'event_end' => $event_end,
                    'user_id' => $authUser->getKey(),
                    'model_type' => $model->getMorphClass(),
                    'model_id' => $model->getKey(),
                ]);

            }
            else{
                if($post->user_id != $authUser->id){
                    abort(401);
                }

                $post->update([
                    'privacy' => $privacy,
                    'title' => $title,
                    'price' => $price,
                    'body' => $description,
                    'event_location' => $location,
                    'event_start' => $event_start,
                    'event_end' => $event_end,
                ]);

            }

            /*if ($cover != null) {
            $imagesUrl = 'storage/users/' . $authUser->username . '/posts/' . $post->key . '/';

            if (!File::isDirectory($imagesUrl)) {
                File::makeDirectory($imagesUrl, 0777, true, true);
            }

            $imageName = 'cover.jpg';
            $img = Image::make($cover);
            $img->fit(800, 500);
            $img->save(public_path($imagesUrl) . $imageName);
            $post->update(['cover' => '/' . $imagesUrl . $imageName . "?v=" . Carbon::now()->timestamp]);

            }*/

            if($images != null && count($images)>0){
                $this->addPostImages($post, $images);
            }

            if ($invitedFriends != null) {
                foreach ($invitedFriends as $invitedFriend){
                    $user = User::where('username', $invitedFriend->name)->first();
                    if($user != null && Auth::user()->isFriendWith($user) && $post->tagged()->where("tagged_id", $user->id)->first() == null){
                        Tag::create([
                            'key' => $this->generateKey(),
                            'tagin_type' => $post->getMorphClass(),
                            'tagin_id' => $post->getKey(),
                            'tagged_type' => $user->getMorphClass(),
                            'tagged_id' => $user->getKey(),
                        ]);
                    }
                }
            }


            return redirect(route('getViewEventManage', ['event' => $post->key]))->with('success', 'Your event has been updated successfully.');

    }

    public function getEventDelete(Request $request, $eventPid){
        $event = Post::where('key', $eventPid)->first();
        if($event == null){
            abort(404);
        }
        $user = Auth::user();
        if($event->privacy == 'Closed'){
            abort(401);
        }
        if($event->user != $user){
            abort(401);
        }
        $event->delete();
        return redirect(route('getEvent'))->with('success', 'Your event has been deleted successfully.');
    }

    public function getEventImageDelete(Request $request, $imagePid){
        $image = ImageModle::where('key', $imagePid)->first();
        if($image == null){
            abort(404);
        }
        $user = Auth::user();
        if($image->user_id != $user->id){
            abort(401);
        }
        $image->delete();
        $data = [];
        $data["message"]["type"] = "Success";
        $data["message"]["body"] = "Your image has been deleted successfully.";
        return response()->json($data);
    }

    public function getViewEventManage(Request $request, $eventPid){
        $event = Post::where('key', $eventPid)->first();
        if($event == null){
            abort(404);
        }
        if($event->user_id != Auth::user()->id){
            abort(401);
        }
        $title = "Update Event";
        return view("home.event.event-edit", ['event' => $event, 'title' => $title]);
    }

    public function getViewEvent(Request $request, $eventPid){
        $event = Post::where('key', $eventPid)->first();
        if($event == null){
            abort(404);
        }
        $user = Auth::user();
        if($event->user != $user && $event->privacy == 'Closed' &&  $event->tagged()->where("tagged_id", $user->id)->first() == null){
            abort(401);
        }
        return view("home.event.event-view",['user' => $user, 'event' => $event]);
    }

    public function getEventAdd(Request $request, $eventPid){
        $event = Post::where('key', $eventPid)->first();
        if($event == null){
            abort(404);
        }
        $user = Auth::user();
        if($event->privacy == 'Closed'){
            abort(401);
        }
        if($user != null && $event->tagged()->where("tagged_id", $user->id)->first() == null){
            Tag::create([
                'key' => $this->generateKey(),
                'tagin_type' => $event->getMorphClass(),
                'tagin_id' => $event->getKey(),
                'tagged_type' => $user->getMorphClass(),
                'tagged_id' => $user->getKey(),
            ]);
        }
        return redirect()->back()->with('success', 'The event has been added to your calendar.');
    }

    public function getEventRemove(Request $request, $eventPid){
        $event = Post::where('key', $eventPid)->first();
        if($event == null){
            abort(404);
        }
        $user = Auth::user();
        $tag = $event->tagged()->where("tagged_id", $user->id)->first();
        if($tag != null){
            $tag->delete();
        }
        return redirect(route('getEvent'))->with('success', 'The event has been removed from your calendar.');
    }

    public function getEventsCalendar($date, $small = false, $interactive = true){


        $today = Carbon::today();
        $tempDate = Carbon::createFromDate($date->year, $date->month, 1);
        $size = 'full';
        if($small){
            $size = 'small';
        }


        $calendar = '<div class="calendar '.$size.'">
                        <div class="calendar-week">
                            <p class="calendar-week-day"><span class="week-day-short">Sun</span><span class="week-day-long">Sunday</span>
                            </p>
                            <p class="calendar-week-day"><span class="week-day-short">Mon</span><span class="week-day-long">Monday</span>
                            </p>
                            <p class="calendar-week-day"><span class="week-day-short">Tue</span><span class="week-day-long">Tuesday</span>
                            </p>
                            <p class="calendar-week-day"><span class="week-day-short">Wed</span><span class="week-day-long">Wednesday</span>
                            </p>
                            <p class="calendar-week-day"><span class="week-day-short">Thu</span><span class="week-day-long">Thursday</span>
                            </p>
                            <p class="calendar-week-day"><span class="week-day-short">Fri</span><span class="week-day-long">Friday</span>
                            </p>
                            <p class="calendar-week-day"><span class="week-day-short">Sat</span><span class="week-day-long">Saturday</span>
                            </p>
                        </div>
                        <div class="calendar-days">';

        $skip = $tempDate->dayOfWeek;


        for($i = 0; $i < $skip; $i++)
        {
            $tempDate->subDay();
        }

        $isActive = false;
        //loops through month
        do
        {
            $calendar .= '<div class="calendar-day-row">';
            //loops through each week
            for($i=0; $i < 7; $i++)
            {
                if($tempDate->day == 1){
                    $isActive = !$isActive;
                }
                if($isActive){
                    $events = Auth::user()->getDayEvents($tempDate);
                    $eventsHTML = '';
                    $active = '';
                    if($tempDate->day == $today->day && $tempDate->month == $today->month && $tempDate->year == $today->year){
                        $active = 'active';
                    }
                    if(count($events) > 0){
                    $eventsHTML = '<div class="calendar-day-events">';
                    foreach ($events as $event){
                        $type = 'primary';
                        if($event->privacy == 'Closed'){
                            $type = 'secondary';
                        }
                        $eventsHTML .= '<a class="calendar-day-event '.$type.'" href="'.route('getViewEvent', ['event' => $event->key]).'"><span class="calendar-day-event-text">'.$event->title.'</span></a>';
                    }
                        $eventsHTML .= '</div>';
                    }
                    if($interactive){
                    $calendar .= '<div class="calendar-day '.$active.'"><a class="calendar-day-number" href="?date='.$tempDate->format('Y-m-d').'">'.$tempDate->day.'</a>'.$eventsHTML.'</div>';
                    }else {
                        $calendar .= '<div class="calendar-day ' . $active . '"><p class="calendar-day-number">' . $tempDate->day . '</p>' . $eventsHTML . '</div>';
                    }
                }else{
                    $calendar .= '<div class="calendar-day inactive"><p class="calendar-day-number">'.$tempDate->day.'</p></div>';
                }

                $tempDate->addDay();
            }
            $calendar .= '</div>';

        }while($tempDate->month == $date->month);

        $calendar .= '</div></div>';

        return $calendar;
    }

    //user events
    public function getUserEvent(Request $request){
        $user = Auth::user();
        $newsfeed = 'Profile';
        $profileName = $user->username;
        return view("home.user.profile.events",['user' => $user, 'addFriendButton' => false, 'sendMessageButton' => false, 'canPost' => true, 'newsfeed' => $newsfeed, 'profileName' => $profileName,]);
    }

    public function getPublicUserEvent(Request $request, $user){
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

        return view("home.user.profile.events",['user' => $user, 'addFriendButton' => $addFriendButton, 'cancelFriendButton' => $cancelFriendButton, 'acceptFriendButton' => $acceptFriendButton, 'deniedFriendButton' => $deniedFriendButton, 'blockFriendButton' => $blockFriendButton, 'unblockFriendButton' => $unblockFriendButton, 'unfriendButton' => $unfriendButton, 'sendMessageButton' => $sendMessageButton,'newsfeed' => $newsfeed, 'profileName' => $profileName,]);

    }

    private function addPostImages($post, $images){
        $user = Auth::user();
        $imagesUrl = 'storage/users/'.$user->username.'/posts/'.$post->key.'/';
        if(!File::isDirectory($imagesUrl)){
            File::makeDirectory($imagesUrl, 0777, true, true);
        }
        /*if($post->images != null && count($post->images)>0){
            foreach($post->images as $image){
                $image->delete();
            }
        }*/
        $imagesCounter = 1;
        if($post->images != null && count($post->images)>0){
            $imagesCounter = count($post->images)+1;
        }
        foreach ($images as $image){
            $imageName = 'post'.$imagesCounter.'.jpg';
            //$cover->move(public_path($coverUrl), $coverName);
            $img = Image::make($image);
            $img->fit(800, 500);
            $img->save(public_path($imagesUrl).$imageName);
            //$user->cover = '/'.$coverUrl.$coverName."?v=".Carbon::now()->timestamp;
            if($imagesCounter == 1){
                $post->update(['cover' => '/' . $imagesUrl . $imageName . "?v=" . Carbon::now()->timestamp]);
            }
            ImageModle::create([
                'key' => $this->generateKey(),
                'model_type' => $post->getMorphClass(),
                'model_id' => $post->getKey(),
                'user_id' => $user->getKey(),
                'src' => '/'.$imagesUrl.$imageName,
            ]);
            $imagesCounter++;
        }
    }

    private function generateKey(){
        return strtolower(sha1(time()).Auth::user()->getKey().Str::random(23));
    }

}
