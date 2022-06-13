@extends('layouts.app')

@section('title')
{{$event->title}}
@endsection

@section('content')
<!-- GRID -->
<div class="grid">
        <!-- WIDGET BOX -->
        <div class="popup-event popup-event-information">
            @if(false)
            <!-- POPUP CLOSE BUTTON -->
            <div class="popup-close-button popup-event-information-trigger" style="right: unset; left: -20px;">
                <!-- POPUP CLOSE BUTTON ICON -->
                <svg class="popup-close-button-icon icon-cross">
                    <use xlink:href="#svg-cross"></use>
                </svg>
                <!-- /POPUP CLOSE BUTTON ICON -->
            </div>
            <!-- /POPUP CLOSE BUTTON -->
            @endif

            <!-- POPUP EVENT COVER -->
            <figure class="popup-event-cover liquid">
                <img src="{{$event->cover}}">
            </figure>
            <!-- /POPUP EVENT COVER -->

            <!-- POPUP EVENT INFO -->
            <div class="popup-event-info">
                <!-- POPUP EVENT TITLE -->
                <p class="popup-event-title">
                    @if($event->privacy == "Public")
                    <!-- ICON PUBLIC -->
                    <svg class="icon-public" style="fill: #4ff461;">
                        <use xlink:href="#svg-public"></use>
                    </svg>
                    <!-- /ICON PUBLIC -->
                    @else
                            <!-- ICON PUBLIC -->
                            <svg class="icon-private" style="fill: #7750f8;">
                                <use xlink:href="#svg-private"></use>
                            </svg>
                            <!-- /ICON PUBLIC -->
                    @endif
                    &nbsp;
                    {{$event->title}}
                        </p>
                <!-- /POPUP EVENT TITLE -->

                <!-- DECORATED FEATURE LIST -->
                <div class="decorated-feature-list">
                    <!-- DECORATED FEATURE -->
                    <div class="decorated-feature">
                        <!-- DECORATED FEATURE ICON -->
                        <svg class="decorated-feature-icon icon-pin">
                            <use xlink:href="#svg-pin"></use>
                        </svg>
                        <!-- /DECORATED FEATURE ICON -->

                        <!-- DECORATED FEATURE INFO -->
                        <div class="decorated-feature-info">
                            <!-- DECORATED FEATURE TITLE -->
                            <p class="decorated-feature-title">{{$event->event_location}}</p>
                            <!-- /DECORATED FEATURE TITLE -->

                            <!-- DECORATED FEATURE TEXT -->
                            <p class="decorated-feature-text"><a href="https://www.google.com/maps/place/{{$event->event_location}}" target="_blank">Open In Map</a></p>
                            <!-- /DECORATED FEATURE TEXT -->
                        </div>
                        <!-- /DECORATED FEATURE INFO -->
                    </div>
                    <!-- /DECORATED FEATURE -->

                    <!-- DECORATED FEATURE -->
                    <div class="decorated-feature">

                        @if($event->price>0)
                        <!-- DECORATED FEATURE -->
                        <div class="decorated-feature">
                            <!-- DECORATED FEATURE ICON -->
                            <svg class="decorated-feature-icon icon-ticket">
                                <use xlink:href="#svg-ticket"></use>
                            </svg>
                            <!-- /DECORATED FEATURE ICON -->

                            <!-- DECORATED FEATURE INFO -->
                            <div class="decorated-feature-info">
                                <!-- DECORATED FEATURE TITLE -->
                                <p class="decorated-feature-title">${{$event->price}}</p>
                                <!-- /DECORATED FEATURE TITLE -->

                                <!-- DECORATED FEATURE TEXT -->
                                <p class="decorated-feature-text">Entry Price</p>
                                <!-- /DECORATED FEATURE TEXT -->
                            </div>
                            <!-- /DECORATED FEATURE INFO -->
                        </div>
                        <!-- /DECORATED FEATURE -->
                        @endif

                    </div>
                    <!-- /DECORATED FEATURE -->

                    <!-- DECORATED FEATURE -->
                    <div class="decorated-feature">

                        <!-- DECORATED FEATURE ICON -->
                        <svg class="decorated-feature-icon icon-events">
                            <use xlink:href="#svg-events"></use>
                        </svg>
                        <!-- /DECORATED FEATURE ICON -->

                        <!-- DECORATED FEATURE INFO -->
                        <div class="decorated-feature-info">
                            <!-- DECORATED FEATURE TITLE -->
                            <p class="decorated-feature-title">{{$event->getEventStartDatePublic()}}</p>
                            <!-- /DECORATED FEATURE TITLE -->

                            <!-- DECORATED FEATURE TEXT -->
                            <p class="decorated-feature-text">{{$event->getEventStartTime()}} {{$event->getEventStartTimeAnnotation()}}</p>
                            <!-- /DECORATED FEATURE TEXT -->
                        </div>
                        <!-- /DECORATED FEATURE INFO -->
                    </div>
                    <!-- /DECORATED FEATURE -->

                    <!-- DECORATED FEATURE -->
                    <div class="decorated-feature">
                        @if($event->getEventEndDatePublic())
                        <!-- DECORATED FEATURE ICON -->
                        <svg class="decorated-feature-icon icon-events">
                            <use xlink:href="#svg-events"></use>
                        </svg>
                        <!-- /DECORATED FEATURE ICON -->

                        <!-- DECORATED FEATURE INFO -->
                        <div class="decorated-feature-info">
                            <!-- DECORATED FEATURE TITLE -->
                            <p class="decorated-feature-title">{{$event->getEventEndDatePublic()}}</p>
                            <!-- /DECORATED FEATURE TITLE -->

                            <!-- DECORATED FEATURE TEXT -->
                            <p class="decorated-feature-text">{{$event->getEventEndTime()}} {{$event->getEventEndTimeAnnotation()}}</p>
                            <!-- /DECORATED FEATURE TEXT -->
                        </div>
                        <!-- /DECORATED FEATURE INFO -->
                        @endif
                    </div>
                    <!-- /DECORATED FEATURE -->
                </div>
                <!-- /DECORATED FEATURE LIST -->

                <!-- POPUP EVENT SUBTITLE -->
                <p class="popup-event-subtitle">Event Organizer</p>
                <!-- /POPUP EVENT SUBTITLE -->
                <!-- USER STATUS LIST -->
                <div class="user-status-list" style="margin-top: 10px;">
                    @if($event->user == $event->model)
                    <!-- USER STATUS -->
                    <div class="user-status">
                        <!-- USER STATUS AVATAR -->
                        <a class="user-status-avatar" href="{{route('userPublicProfileGet', ['user' => $event->user->username])}}">
                            <!-- USER AVATAR -->
                            <div class="user-avatar small no-outline">
                                <!-- USER AVATAR CONTENT -->
                                <div class="user-avatar-content">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-image-30-32" data-src="{{$event->user->avatar ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR CONTENT -->

                                <!-- USER AVATAR PROGRESS -->
                                <div class="user-avatar-progress">
                                    <!-- HEXAGON -->
                                    @if($event->user->gender == "Male")
                                    <div class="hexagon-progress-40-44-male"></div>
                                    @elseif($event->user->gender == "Female")
                                    <div class="hexagon-progress-40-44-female"></div>
                                    @elseif($event->user->gender == "Other")
                                    <div class="hexagon-progress-40-44-other"></div>
                                    @else
                                    <div class="hexagon-progress-40-44"></div>
                                    @endif
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR PROGRESS -->

                                <!-- USER AVATAR PROGRESS BORDER -->
                                <div class="user-avatar-progress-border">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-border-40-44"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR PROGRESS BORDER -->
                            </div>
                            <!-- /USER AVATAR -->
                        </a>
                        <!-- /USER STATUS AVATAR -->

                        <!-- USER STATUS TITLE -->
                        <p class="user-status-title"><a class="bold" href="{{route('userPublicProfileGet', ['user' => $event->user->username])}}">{{$event->user->full_name}}</a></p>
                        <!-- /USER STATUS TITLE -->

                        <!-- USER STATUS TEXT -->
                        <p class="user-status-text small">{{'@'.$event->user->username}}</p>
                        <!-- /USER STATUS TEXT -->
                    </div>
                    <!-- /USER STATUS -->
                    @else
                    <!-- USER STATUS -->
                    <div class="user-status">
                        <!-- USER STATUS AVATAR -->
                        <a class="user-status-avatar" href="{{route('groupGet', ['group' => $event->model->username])}}">
                            <!-- USER AVATAR -->
                            <div class="user-avatar small no-outline">
                                <!-- USER AVATAR CONTENT -->
                                <div class="user-avatar-content">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-image-30-32" data-src="{{$event->model->avatar ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR CONTENT -->
                            </div>
                            <!-- /USER AVATAR -->
                        </a>
                        <!-- /USER STATUS AVATAR -->

                        <!-- USER STATUS TITLE -->
                        <p class="user-status-title"><a class="bold" href="{{route('groupGet', ['group' => $event->model->username])}}">{{$event->model->name}}</a></p>
                        <!-- /USER STATUS TITLE -->

                        <!-- USER STATUS TEXT -->
                        <p class="user-status-text small">{{'@'.$event->model->username}}</p>
                        <!-- /USER STATUS TEXT -->
                    </div>
                    <!-- /USER STATUS -->
                    @endif

                </div>
                <!-- /USER STATUS LIST -->

                <!-- POPUP EVENT SUBTITLE -->
                <p class="popup-event-subtitle">Description</p>
                <!-- /POPUP EVENT SUBTITLE -->

                <!-- POPUP EVENT TEXT -->
                <p class="popup-event-text">{{$event->body}}</p>
                <!-- /POPUP EVENT TEXT -->

                <!-- USER STATUS LIST -->
                <div class="user-status-list" style="margin-top: 10px;">
                    @if(false)
                    <!-- USER STATUS -->
                    <div class="user-status">
                        <!-- USER STATUS AVATAR -->
                        <a class="user-status-avatar" href="{{route('userPublicProfileGet', ['user' => $event->user->username])}}">
                            <!-- USER AVATAR -->
                            <div class="user-avatar small no-outline">
                                <!-- USER AVATAR CONTENT -->
                                <div class="user-avatar-content">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-image-30-32" data-src="{{$event->user->avatar ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR CONTENT -->

                                <!-- USER AVATAR PROGRESS -->
                                <div class="user-avatar-progress">
                                    <!-- HEXAGON -->
                                    @if($event->user->gender == "Male")
                                    <div class="hexagon-progress-40-44-male"></div>
                                    @elseif($event->user->gender == "Female")
                                    <div class="hexagon-progress-40-44-female"></div>
                                    @elseif($event->user->gender == "Other")
                                    <div class="hexagon-progress-40-44-other"></div>
                                    @else
                                    <div class="hexagon-progress-40-44"></div>
                                    @endif
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR PROGRESS -->

                                <!-- USER AVATAR PROGRESS BORDER -->
                                <div class="user-avatar-progress-border">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-border-40-44"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR PROGRESS BORDER -->
                            </div>
                            <!-- /USER AVATAR -->
                        </a>
                        <!-- /USER STATUS AVATAR -->

                        <!-- USER STATUS TITLE -->
                        <p class="user-status-title"><a class="bold" href="{{route('userPublicProfileGet', ['user' => $event->user->username])}}">{{$event->user->full_name}}</a></p>
                        <!-- /USER STATUS TITLE -->

                        <!-- USER STATUS TEXT -->
                        <p class="user-status-text small">{{'@'.$event->user->username}}</p>
                        <!-- /USER STATUS TEXT -->
                    </div>
                    <!-- /USER STATUS -->
                    @endif
                </div>
                <!-- /USER STATUS LIST -->

                <!-- POPUP EVENT SUBTITLE -->
                <p class="popup-event-subtitle">Map</p>
                <!-- /POPUP EVENT SUBTITLE -->
                <!-- GOOGLE MAP -->
                <div id="event-map" class="event-map"></div>
                <!-- /GOOGLE MAP -->

                @if(false)
                <!-- USER AVATAR LIST -->
                <div class="user-avatar-list reverse medium">
                    <!-- USER AVATAR -->
                    <div class="user-avatar smaller no-stats">
                        <!-- USER AVATAR BORDER -->
                        <div class="user-avatar-border">
                            <!-- HEXAGON -->
                            <div class="hexagon-34-36"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR BORDER -->

                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/03.jpg"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->
                    </div>
                    <!-- /USER AVATAR -->

                    <!-- USER AVATAR -->
                    <div class="user-avatar smaller no-stats">
                        <!-- USER AVATAR BORDER -->
                        <div class="user-avatar-border">
                            <!-- HEXAGON -->
                            <div class="hexagon-34-36"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR BORDER -->

                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/05.jpg"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->
                    </div>
                    <!-- /USER AVATAR -->

                    <!-- USER AVATAR -->
                    <div class="user-avatar smaller no-stats">
                        <!-- USER AVATAR BORDER -->
                        <div class="user-avatar-border">
                            <!-- HEXAGON -->
                            <div class="hexagon-34-36"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR BORDER -->

                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/10.jpg"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->
                    </div>
                    <!-- /USER AVATAR -->

                    <!-- USER AVATAR -->
                    <div class="user-avatar smaller no-stats">
                        <!-- USER AVATAR BORDER -->
                        <div class="user-avatar-border">
                            <!-- HEXAGON -->
                            <div class="hexagon-34-36"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR BORDER -->

                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/02.jpg"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->
                    </div>
                    <!-- /USER AVATAR -->

                    <!-- USER AVATAR -->
                    <div class="user-avatar smaller no-stats">
                        <!-- USER AVATAR BORDER -->
                        <div class="user-avatar-border">
                            <!-- HEXAGON -->
                            <div class="hexagon-34-36"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR BORDER -->

                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/06.jpg"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->
                    </div>
                    <!-- /USER AVATAR -->

                    <!-- USER AVATAR -->
                    <div class="user-avatar smaller no-stats">
                        <!-- USER AVATAR BORDER -->
                        <div class="user-avatar-border">
                            <!-- HEXAGON -->
                            <div class="hexagon-34-36"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR BORDER -->

                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/07.jpg"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->
                    </div>
                    <!-- /USER AVATAR -->

                    <!-- USER AVATAR -->
                    <div class="user-avatar smaller no-stats">
                        <!-- USER AVATAR BORDER -->
                        <div class="user-avatar-border">
                            <!-- HEXAGON -->
                            <div class="hexagon-34-36"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR BORDER -->

                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/13.jpg"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->
                    </div>
                    <!-- /USER AVATAR -->

                    <!-- USER AVATAR -->
                    <div class="user-avatar smaller no-stats">
                        <!-- USER AVATAR BORDER -->
                        <div class="user-avatar-border">
                            <!-- HEXAGON -->
                            <div class="hexagon-34-36"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR BORDER -->

                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/08.jpg"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->
                    </div>
                    <!-- /USER AVATAR -->

                    <!-- USER AVATAR -->
                    <div class="user-avatar smaller no-stats">
                        <!-- USER AVATAR BORDER -->
                        <div class="user-avatar-border">
                            <!-- HEXAGON -->
                            <div class="hexagon-34-36"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR BORDER -->

                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/16.jpg"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->
                    </div>
                    <!-- /USER AVATAR -->

                    <!-- USER AVATAR -->
                    <div class="user-avatar smaller no-stats">
                        <!-- USER AVATAR BORDER -->
                        <div class="user-avatar-border">
                            <!-- HEXAGON -->
                            <div class="hexagon-34-36"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR BORDER -->

                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/23.jpg"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->
                    </div>
                    <!-- /USER AVATAR -->

                    <!-- USER AVATAR -->
                    <a class="user-avatar smaller no-stats" href="group-members.html">
                        <!-- USER AVATAR BORDER -->
                        <div class="user-avatar-border">
                            <!-- HEXAGON -->
                            <div class="hexagon-34-36"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR BORDER -->

                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/11.jpg"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->

                        <!-- USER AVATAR OVERLAY -->
                        <div class="user-avatar-overlay">
                            <!-- HEXAGON -->
                            <div class="hexagon-overlay-30-32"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR OVERLAY -->

                        <!-- USER AVATAR OVERLAY CONTENT -->
                        <div class="user-avatar-overlay-content">
                            <!-- USER AVATAR OVERLAY CONTENT TEXT -->
                            <p class="user-avatar-overlay-content-text">+31</p>
                            <!-- /USER AVATAR OVERLAY CONTENT TEXT -->
                        </div>
                        <!-- /USER AVATAR OVERLAY CONTENT -->
                    </a>
                    <!-- /USER AVATAR -->
                </div>
                <!-- /USER AVATAR LIST -->

                <!-- POPUP EVENT SUBTITLE -->
                <p class="popup-event-subtitle">Map</p>
                <!-- /POPUP EVENT SUBTITLE -->

                <!-- GOOGLE MAP -->
                <div id="g-map" class="g-map"></div>
                <!-- /GOOGLE MAP -->
                @endif
                <div class="centered-on-mobile" style="width: auto; position: absolute; top: -30px; left: 10px; display: flex; width: 100%;">
                <a class="button secondary"  href="{{ URL::previous() }}" style="padding-left: 15px; padding-right: 15px;">
                    <!-- POPUP CLOSE BUTTON ICON -->
                    <svg class="popup-close-button-icon icon-cross" style="margin-top: 100%; margin-bottom: 100%; width: 18px; height: auto;">
                        <use xlink:href="#svg-back-arrow"></use>
                    </svg>
                    <!-- /POPUP CLOSE BUTTON ICON -->
                </a>
                </div>
                <div class="centered-on-mobile" style="width: auto; position: absolute; top: -30px; right: 28px; display: flex;">

                    @if($event->user != $user)
                    @if($event->tagged()->where("tagged_id", $user->id)->first() == null)
                    <a class="button primary"  href="{{route('getEventAdd', ['event' => $event->key])}}" style="margin-left: 10px; padding-left: 10px; padding-right: 10px;"><span style="width: auto; white-space: nowrap ;">Add to Calendar</span></a>
                    @else
                    <a class="button tertiary"  href="{{route('getEventRemove', ['event' => $event->key])}}" style="margin-left: 10px; padding-left: 10px; padding-right: 10px;"><span style="width: auto; white-space: nowrap ;">Remove from Calendar</span></a>
                    @endif
                    @else
                    <a class="button secondary" href="{{route('getViewEventManage', ['event' => $event->key])}}" style="margin-left: 10px; padding-left: 10px; padding-right: 10px;"><span style="width: auto; white-space: nowrap ;">Manage Event</span></a>
                    @endif
                    <!-- /POPUP EVENT BUTTON -->
                </div>
            </div>
            <!-- /POPUP EVENT INFO -->
            @if(false)
            <!-- CONTENT ACTIONS -->
            <div class="content-actions">
                <!-- CONTENT ACTION -->
                <div class="content-action">
                    <!-- META LINE -->
                    <div class="meta-line">
                        <!-- META LINE LIST -->
                        <div class="meta-line-list reaction-item-list">
                            <!-- REACTION ITEM -->
                            <div class="reaction-item">
                                <!-- REACTION IMAGE -->
                                <img class="reaction-image reaction-item-dropdown-trigger" src="/assets/img/reaction/happy.png" alt="reaction-happy">
                                <!-- /REACTION IMAGE -->

                                <!-- SIMPLE DROPDOWN -->
                                <div class="simple-dropdown padded reaction-item-dropdown">
                                    <!-- SIMPLE DROPDOWN TEXT -->
                                    <p class="simple-dropdown-text"><img class="reaction" src="/assets/img/reaction/happy.png" alt="reaction-happy"> <span class="bold">Happy</span></p>
                                    <!-- /SIMPLE DROPDOWN TEXT -->

                                    <!-- SIMPLE DROPDOWN TEXT -->
                                    <p class="simple-dropdown-text">Matt Parker</p>
                                    <!-- /SIMPLE DROPDOWN TEXT -->

                                    <!-- SIMPLE DROPDOWN TEXT -->
                                    <p class="simple-dropdown-text">Destroy Dex</p>
                                    <!-- /SIMPLE DROPDOWN TEXT -->

                                    <!-- SIMPLE DROPDOWN TEXT -->
                                    <p class="simple-dropdown-text">The Green Goo</p>
                                    <!-- /SIMPLE DROPDOWN TEXT -->
                                </div>
                                <!-- /SIMPLE DROPDOWN -->
                            </div>
                            <!-- /REACTION ITEM -->

                            <!-- REACTION ITEM -->
                            <div class="reaction-item">
                                <!-- REACTION IMAGE -->
                                <img class="reaction-image reaction-item-dropdown-trigger" src="/assets/img/reaction/love.png" alt="reaction-love">
                                <!-- /REACTION IMAGE -->

                                <!-- SIMPLE DROPDOWN -->
                                <div class="simple-dropdown padded reaction-item-dropdown">
                                    <!-- SIMPLE DROPDOWN TEXT -->
                                    <p class="simple-dropdown-text"><img class="reaction" src="/assets/img/reaction/love.png" alt="reaction-love"> <span class="bold">Love</span></p>
                                    <!-- /SIMPLE DROPDOWN TEXT -->

                                    <!-- SIMPLE DROPDOWN TEXT -->
                                    <p class="simple-dropdown-text">Sandra Strange</p>
                                    <!-- /SIMPLE DROPDOWN TEXT -->
                                </div>
                                <!-- /SIMPLE DROPDOWN -->
                            </div>
                            <!-- /REACTION ITEM -->

                            <!-- REACTION ITEM -->
                            <div class="reaction-item">
                                <!-- REACTION IMAGE -->
                                <img class="reaction-image reaction-item-dropdown-trigger" src="/assets/img/reaction/like.png" alt="reaction-like">
                                <!-- /REACTION IMAGE -->

                                <!-- SIMPLE DROPDOWN -->
                                <div class="simple-dropdown padded reaction-item-dropdown">
                                    <!-- SIMPLE DROPDOWN TEXT -->
                                    <p class="simple-dropdown-text"><img class="reaction" src="/assets/img/reaction/like.png" alt="reaction-like"> <span class="bold">Like</span></p>
                                    <!-- /SIMPLE DROPDOWN TEXT -->

                                    <!-- SIMPLE DROPDOWN TEXT -->
                                    <p class="simple-dropdown-text">Neko Bebop</p>
                                    <!-- /SIMPLE DROPDOWN TEXT -->

                                    <!-- SIMPLE DROPDOWN TEXT -->
                                    <p class="simple-dropdown-text">Nick Grissom</p>
                                    <!-- /SIMPLE DROPDOWN TEXT -->

                                    <!-- SIMPLE DROPDOWN TEXT -->
                                    <p class="simple-dropdown-text">Sarah Diamond</p>
                                    <!-- /SIMPLE DROPDOWN TEXT -->

                                    <!-- SIMPLE DROPDOWN TEXT -->
                                    <p class="simple-dropdown-text">Jett Spiegel</p>
                                    <!-- /SIMPLE DROPDOWN TEXT -->

                                    <!-- SIMPLE DROPDOWN TEXT -->
                                    <p class="simple-dropdown-text">Marcus Jhonson</p>
                                    <!-- /SIMPLE DROPDOWN TEXT -->

                                    <!-- SIMPLE DROPDOWN TEXT -->
                                    <p class="simple-dropdown-text">Jane Rodgers</p>
                                    <!-- /SIMPLE DROPDOWN TEXT -->

                                    <!-- SIMPLE DROPDOWN TEXT -->
                                    <p class="simple-dropdown-text"><span class="bold">and 2 more...</span></p>
                                    <!-- /SIMPLE DROPDOWN TEXT -->
                                </div>
                                <!-- /SIMPLE DROPDOWN -->
                            </div>
                            <!-- /REACTION ITEM -->
                        </div>
                        <!-- /META LINE LIST -->

                        <!-- META LINE TEXT -->
                        <p class="meta-line-text">12</p>
                        <!-- /META LINE TEXT -->
                    </div>
                    <!-- /META LINE -->

                    <!-- META LINE -->
                    <div class="meta-line">
                        <!-- META LINE LIST -->
                        <div class="meta-line-list user-avatar-list">
                            <!-- USER AVATAR -->
                            <div class="user-avatar micro no-stats">
                                <!-- USER AVATAR BORDER -->
                                <div class="user-avatar-border">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-22-24"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR BORDER -->

                                <!-- USER AVATAR CONTENT -->
                                <div class="user-avatar-content">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-image-18-20" data-src="/assets/img/avatar/09.jpg"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR CONTENT -->
                            </div>
                            <!-- /USER AVATAR -->

                            <!-- USER AVATAR -->
                            <div class="user-avatar micro no-stats">
                                <!-- USER AVATAR BORDER -->
                                <div class="user-avatar-border">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-22-24"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR BORDER -->

                                <!-- USER AVATAR CONTENT -->
                                <div class="user-avatar-content">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-image-18-20" data-src="/assets/img/avatar/08.jpg"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR CONTENT -->
                            </div>
                            <!-- /USER AVATAR -->

                            <!-- USER AVATAR -->
                            <div class="user-avatar micro no-stats">
                                <!-- USER AVATAR BORDER -->
                                <div class="user-avatar-border">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-22-24"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR BORDER -->

                                <!-- USER AVATAR CONTENT -->
                                <div class="user-avatar-content">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-image-18-20" data-src="/assets/img/avatar/12.jpg"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR CONTENT -->
                            </div>
                            <!-- /USER AVATAR -->

                            <!-- USER AVATAR -->
                            <div class="user-avatar micro no-stats">
                                <!-- USER AVATAR BORDER -->
                                <div class="user-avatar-border">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-22-24"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR BORDER -->

                                <!-- USER AVATAR CONTENT -->
                                <div class="user-avatar-content">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-image-18-20" data-src="/assets/img/avatar/16.jpg"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR CONTENT -->
                            </div>
                            <!-- /USER AVATAR -->

                            <!-- USER AVATAR -->
                            <div class="user-avatar micro no-stats">
                                <!-- USER AVATAR BORDER -->
                                <div class="user-avatar-border">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-22-24"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR BORDER -->

                                <!-- USER AVATAR CONTENT -->
                                <div class="user-avatar-content">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-image-18-20" data-src="/assets/img/avatar/06.jpg"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR CONTENT -->
                            </div>
                            <!-- /USER AVATAR -->
                        </div>
                        <!-- /META LINE LIST -->

                        <!-- META LINE TEXT -->
                        <p class="meta-line-text">14 Participants</p>
                        <!-- /META LINE TEXT -->
                    </div>
                    <!-- /META LINE -->
                </div>
                <!-- /CONTENT ACTION -->

                <!-- CONTENT ACTION -->
                <div class="content-action">
                    <!-- META LINE -->
                    <div class="meta-line">
                        <!-- META LINE LINK -->
                        <p class="meta-line-link">1 Comments</p>
                        <!-- /META LINE LINK -->
                    </div>
                    <!-- /META LINE -->

                    <!-- META LINE -->
                    <div class="meta-line">
                        <!-- META LINE TEXT -->
                        <p class="meta-line-text">0 Shares</p>
                        <!-- /META LINE TEXT -->
                    </div>
                    <!-- /META LINE -->
                </div>
                <!-- /CONTENT ACTION -->
            </div>
            <!-- /CONTENT ACTIONS -->

            <!-- POST OPTIONS -->
            <div class="post-options">
                <!-- POST OPTION WRAP -->
                <div class="post-option-wrap">
                    <!-- POST OPTION -->
                    <div class="post-option reaction-options-dropdown-trigger">
                        <!-- POST OPTION ICON -->
                        <svg class="post-option-icon icon-thumbs-up">
                            <use xlink:href="#svg-thumbs-up"></use>
                        </svg>
                        <!-- /POST OPTION ICON -->

                        <!-- POST OPTION TEXT -->
                        <p class="post-option-text">React!</p>
                        <!-- /POST OPTION TEXT -->
                    </div>
                    <!-- /POST OPTION -->

                    <!-- REACTION OPTIONS -->
                    <div class="reaction-options reaction-options-dropdown">
                        <!-- REACTION OPTION -->
                        <div class="reaction-option text-tooltip-tft" data-title="Like">
                            <!-- REACTION OPTION IMAGE -->
                            <img class="reaction-option-image" src="/assets/img/reaction/like.png" alt="reaction-like">
                            <!-- /REACTION OPTION IMAGE -->
                        </div>
                        <!-- /REACTION OPTION -->

                        <!-- REACTION OPTION -->
                        <div class="reaction-option text-tooltip-tft" data-title="Love">
                            <!-- REACTION OPTION IMAGE -->
                            <img class="reaction-option-image" src="/assets/img/reaction/love.png" alt="reaction-love">
                            <!-- /REACTION OPTION IMAGE -->
                        </div>
                        <!-- /REACTION OPTION -->

                        <!-- REACTION OPTION -->
                        <div class="reaction-option text-tooltip-tft" data-title="Dislike">
                            <!-- REACTION OPTION IMAGE -->
                            <img class="reaction-option-image" src="/assets/img/reaction/dislike.png" alt="reaction-dislike">
                            <!-- /REACTION OPTION IMAGE -->
                        </div>
                        <!-- /REACTION OPTION -->

                        <!-- REACTION OPTION -->
                        <div class="reaction-option text-tooltip-tft" data-title="Happy">
                            <!-- REACTION OPTION IMAGE -->
                            <img class="reaction-option-image" src="/assets/img/reaction/happy.png" alt="reaction-happy">
                            <!-- /REACTION OPTION IMAGE -->
                        </div>
                        <!-- /REACTION OPTION -->

                        <!-- REACTION OPTION -->
                        <div class="reaction-option text-tooltip-tft" data-title="Funny">
                            <!-- REACTION OPTION IMAGE -->
                            <img class="reaction-option-image" src="/assets/img/reaction/funny.png" alt="reaction-funny">
                            <!-- /REACTION OPTION IMAGE -->
                        </div>
                        <!-- /REACTION OPTION -->

                        <!-- REACTION OPTION -->
                        <div class="reaction-option text-tooltip-tft" data-title="Wow">
                            <!-- REACTION OPTION IMAGE -->
                            <img class="reaction-option-image" src="/assets/img/reaction/wow.png" alt="reaction-wow">
                            <!-- /REACTION OPTION IMAGE -->
                        </div>
                        <!-- /REACTION OPTION -->

                        <!-- REACTION OPTION -->
                        <div class="reaction-option text-tooltip-tft" data-title="Angry">
                            <!-- REACTION OPTION IMAGE -->
                            <img class="reaction-option-image" src="/assets/img/reaction/angry.png" alt="reaction-angry">
                            <!-- /REACTION OPTION IMAGE -->
                        </div>
                        <!-- /REACTION OPTION -->

                        <!-- REACTION OPTION -->
                        <div class="reaction-option text-tooltip-tft" data-title="Sad">
                            <!-- REACTION OPTION IMAGE -->
                            <img class="reaction-option-image" src="/assets/img/reaction/sad.png" alt="reaction-sad">
                            <!-- /REACTION OPTION IMAGE -->
                        </div>
                        <!-- /REACTION OPTION -->
                    </div>
                    <!-- /REACTION OPTIONS -->
                </div>
                <!-- /POST OPTION WRAP -->

                <!-- POST OPTION -->
                <div class="post-option active">
                    <!-- POST OPTION ICON -->
                    <svg class="post-option-icon icon-comment">
                        <use xlink:href="#svg-comment"></use>
                    </svg>
                    <!-- /POST OPTION ICON -->

                    <!-- POST OPTION TEXT -->
                    <p class="post-option-text">Comment</p>
                    <!-- /POST OPTION TEXT -->
                </div>
                <!-- /POST OPTION -->

                <!-- POST OPTION -->
                <div class="post-option">
                    <!-- POST OPTION ICON -->
                    <svg class="post-option-icon icon-share">
                        <use xlink:href="#svg-share"></use>
                    </svg>
                    <!-- /POST OPTION ICON -->

                    <!-- POST OPTION TEXT -->
                    <p class="post-option-text">Share</p>
                    <!-- /POST OPTION TEXT -->
                </div>
                <!-- /POST OPTION -->
            </div>
            <!-- /POST OPTIONS -->

            <!-- POST COMMENT LIST -->
            <div class="post-comment-list">
                <!-- POST COMMENT -->
                <div class="post-comment">
                    <!-- USER AVATAR -->
                    <a class="user-avatar small no-outline" href="profile-timeline.html">
                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/02.jpg"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->

                        <!-- USER AVATAR PROGRESS -->
                        <div class="user-avatar-progress">
                            <!-- HEXAGON -->
                            <div class="hexagon-progress-40-44"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR PROGRESS -->

                        <!-- USER AVATAR PROGRESS BORDER -->
                        <div class="user-avatar-progress-border">
                            <!-- HEXAGON -->
                            <div class="hexagon-border-40-44"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR PROGRESS BORDER -->

                        <!-- USER AVATAR BADGE -->
                        <div class="user-avatar-badge">
                            <!-- USER AVATAR BADGE BORDER -->
                            <div class="user-avatar-badge-border">
                                <!-- HEXAGON -->
                                <div class="hexagon-22-24"></div>
                                <!-- /HEXAGON -->
                            </div>
                            <!-- /USER AVATAR BADGE BORDER -->

                            <!-- USER AVATAR BADGE CONTENT -->
                            <div class="user-avatar-badge-content">
                                <!-- HEXAGON -->
                                <div class="hexagon-dark-16-18"></div>
                                <!-- /HEXAGON -->
                            </div>
                            <!-- /USER AVATAR BADGE CONTENT -->

                            <!-- USER AVATAR BADGE TEXT -->
                            <p class="user-avatar-badge-text">19</p>
                            <!-- /USER AVATAR BADGE TEXT -->
                        </div>
                        <!-- /USER AVATAR BADGE -->
                    </a>
                    <!-- /USER AVATAR -->

                    <!-- POST COMMENT TEXT -->
                    <p class="post-comment-text"><a class="post-comment-text-author" href="profile-timeline.html">Destroy Dex</a>Can't wait to see everyone at the party! Last year's was incredible and I'm hoping this year will be even better!</p>
                    <!-- /POST COMMENT TEXT -->

                    <!-- CONTENT ACTIONS -->
                    <div class="content-actions">
                        <!-- CONTENT ACTION -->
                        <div class="content-action">
                            <!-- META LINE -->
                            <div class="meta-line">
                                <!-- META LINE LIST -->
                                <div class="meta-line-list reaction-item-list small">
                                    <!-- REACTION ITEM -->
                                    <div class="reaction-item">
                                        <!-- REACTION IMAGE -->
                                        <img class="reaction-image reaction-item-dropdown-trigger" src="/assets/img/reaction/happy.png" alt="reaction-happy">
                                        <!-- /REACTION IMAGE -->

                                        <!-- SIMPLE DROPDOWN -->
                                        <div class="simple-dropdown padded reaction-item-dropdown">
                                            <!-- SIMPLE DROPDOWN TEXT -->
                                            <p class="simple-dropdown-text"><img class="reaction" src="/assets/img/reaction/happy.png" alt="reaction-happy"> <span class="bold">Happy</span></p>
                                            <!-- /SIMPLE DROPDOWN TEXT -->

                                            <!-- SIMPLE DROPDOWN TEXT -->
                                            <p class="simple-dropdown-text">Marcus Jhonson</p>
                                            <!-- /SIMPLE DROPDOWN TEXT -->
                                        </div>
                                        <!-- /SIMPLE DROPDOWN -->
                                    </div>
                                    <!-- /REACTION ITEM -->

                                    <!-- REACTION ITEM -->
                                    <div class="reaction-item">
                                        <!-- REACTION IMAGE -->
                                        <img class="reaction-image reaction-item-dropdown-trigger" src="/assets/img/reaction/like.png" alt="reaction-like">
                                        <!-- /REACTION IMAGE -->

                                        <!-- SIMPLE DROPDOWN -->
                                        <div class="simple-dropdown padded reaction-item-dropdown">
                                            <!-- SIMPLE DROPDOWN TEXT -->
                                            <p class="simple-dropdown-text"><img class="reaction" src="/assets/img/reaction/like.png" alt="reaction-like"> <span class="bold">Like</span></p>
                                            <!-- /SIMPLE DROPDOWN TEXT -->

                                            <!-- SIMPLE DROPDOWN TEXT -->
                                            <p class="simple-dropdown-text">Neko Bebop</p>
                                            <!-- /SIMPLE DROPDOWN TEXT -->

                                            <!-- SIMPLE DROPDOWN TEXT -->
                                            <p class="simple-dropdown-text">Nick Grissom</p>
                                            <!-- /SIMPLE DROPDOWN TEXT -->

                                            <!-- SIMPLE DROPDOWN TEXT -->
                                            <p class="simple-dropdown-text">Sarah Diamond</p>
                                            <!-- /SIMPLE DROPDOWN TEXT -->
                                        </div>
                                        <!-- /SIMPLE DROPDOWN -->
                                    </div>
                                    <!-- /REACTION ITEM -->
                                </div>
                                <!-- /META LINE LIST -->

                                <!-- META LINE TEXT -->
                                <p class="meta-line-text">4</p>
                                <!-- /META LINE TEXT -->
                            </div>
                            <!-- /META LINE -->

                            <!-- META LINE -->
                            <div class="meta-line">
                                <!-- META LINE LINK -->
                                <p class="meta-line-link light reaction-options-small-dropdown-trigger">React!</p>
                                <!-- /META LINE LINK -->

                                <!-- REACTION OPTIONS -->
                                <div class="reaction-options small reaction-options-small-dropdown">
                                    <!-- REACTION OPTION -->
                                    <div class="reaction-option text-tooltip-tft" data-title="Like">
                                        <!-- REACTION OPTION IMAGE -->
                                        <img class="reaction-option-image" src="/assets/img/reaction/like.png" alt="reaction-like">
                                        <!-- /REACTION OPTION IMAGE -->
                                    </div>
                                    <!-- /REACTION OPTION -->

                                    <!-- REACTION OPTION -->
                                    <div class="reaction-option text-tooltip-tft" data-title="Love">
                                        <!-- REACTION OPTION IMAGE -->
                                        <img class="reaction-option-image" src="/assets/img/reaction/love.png" alt="reaction-love">
                                        <!-- /REACTION OPTION IMAGE -->
                                    </div>
                                    <!-- /REACTION OPTION -->

                                    <!-- REACTION OPTION -->
                                    <div class="reaction-option text-tooltip-tft" data-title="Dislike">
                                        <!-- REACTION OPTION IMAGE -->
                                        <img class="reaction-option-image" src="/assets/img/reaction/dislike.png" alt="reaction-dislike">
                                        <!-- /REACTION OPTION IMAGE -->
                                    </div>
                                    <!-- /REACTION OPTION -->

                                    <!-- REACTION OPTION -->
                                    <div class="reaction-option text-tooltip-tft" data-title="Happy">
                                        <!-- REACTION OPTION IMAGE -->
                                        <img class="reaction-option-image" src="/assets/img/reaction/happy.png" alt="reaction-happy">
                                        <!-- /REACTION OPTION IMAGE -->
                                    </div>
                                    <!-- /REACTION OPTION -->

                                    <!-- REACTION OPTION -->
                                    <div class="reaction-option text-tooltip-tft" data-title="Funny">
                                        <!-- REACTION OPTION IMAGE -->
                                        <img class="reaction-option-image" src="/assets/img/reaction/funny.png" alt="reaction-funny">
                                        <!-- /REACTION OPTION IMAGE -->
                                    </div>
                                    <!-- /REACTION OPTION -->

                                    <!-- REACTION OPTION -->
                                    <div class="reaction-option text-tooltip-tft" data-title="Wow">
                                        <!-- REACTION OPTION IMAGE -->
                                        <img class="reaction-option-image" src="/assets/img/reaction/wow.png" alt="reaction-wow">
                                        <!-- /REACTION OPTION IMAGE -->
                                    </div>
                                    <!-- /REACTION OPTION -->

                                    <!-- REACTION OPTION -->
                                    <div class="reaction-option text-tooltip-tft" data-title="Angry">
                                        <!-- REACTION OPTION IMAGE -->
                                        <img class="reaction-option-image" src="/assets/img/reaction/angry.png" alt="reaction-angry">
                                        <!-- /REACTION OPTION IMAGE -->
                                    </div>
                                    <!-- /REACTION OPTION -->

                                    <!-- REACTION OPTION -->
                                    <div class="reaction-option text-tooltip-tft" data-title="Sad">
                                        <!-- REACTION OPTION IMAGE -->
                                        <img class="reaction-option-image" src="/assets/img/reaction/sad.png" alt="reaction-sad">
                                        <!-- /REACTION OPTION IMAGE -->
                                    </div>
                                    <!-- /REACTION OPTION -->
                                </div>
                                <!-- /REACTION OPTIONS -->
                            </div>
                            <!-- /META LINE -->

                            <!-- META LINE -->
                            <div class="meta-line">
                                <!-- META LINE LINK -->
                                <p class="meta-line-link light">Reply</p>
                                <!-- /META LINE LINK -->
                            </div>
                            <!-- /META LINE -->

                            <!-- META LINE -->
                            <div class="meta-line">
                                <!-- META LINE TIMESTAMP -->
                                <p class="meta-line-timestamp">15 minutes ago</p>
                                <!-- /META LINE TIMESTAMP -->
                            </div>
                            <!-- /META LINE -->

                            <!-- META LINE -->
                            <div class="meta-line settings">
                                <!-- POST SETTINGS WRAP -->
                                <div class="post-settings-wrap">
                                    <!-- POST SETTINGS -->
                                    <div class="post-settings post-settings-dropdown-trigger">
                                        <!-- POST SETTINGS ICON -->
                                        <svg class="post-settings-icon icon-more-dots">
                                            <use xlink:href="#svg-more-dots"></use>
                                        </svg>
                                        <!-- /POST SETTINGS ICON -->
                                    </div>
                                    <!-- /POST SETTINGS -->

                                    <!-- SIMPLE DROPDOWN -->
                                    <div class="simple-dropdown post-settings-dropdown">
                                        <!-- SIMPLE DROPDOWN LINK -->
                                        <p class="simple-dropdown-link">Report Post</p>
                                        <!-- /SIMPLE DROPDOWN LINK -->
                                    </div>
                                    <!-- /SIMPLE DROPDOWN -->
                                </div>
                                <!-- /POST SETTINGS WRAP -->
                            </div>
                            <!-- /META LINE -->
                        </div>
                        <!-- /CONTENT ACTION -->
                    </div>
                    <!-- /CONTENT ACTIONS -->
                </div>
                <!-- /POST COMMENT -->

                <!-- POST COMMENT FORM -->
                <div class="post-comment-form">
                    <!-- USER AVATAR -->
                    <div class="user-avatar small no-outline">
                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/01.jpg"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->

                        <!-- USER AVATAR PROGRESS -->
                        <div class="user-avatar-progress">
                            <!-- HEXAGON -->
                            <div class="hexagon-progress-40-44"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR PROGRESS -->

                        <!-- USER AVATAR PROGRESS BORDER -->
                        <div class="user-avatar-progress-border">
                            <!-- HEXAGON -->
                            <div class="hexagon-border-40-44"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR PROGRESS BORDER -->

                        <!-- USER AVATAR BADGE -->
                        <div class="user-avatar-badge">
                            <!-- USER AVATAR BADGE BORDER -->
                            <div class="user-avatar-badge-border">
                                <!-- HEXAGON -->
                                <div class="hexagon-22-24"></div>
                                <!-- /HEXAGON -->
                            </div>
                            <!-- /USER AVATAR BADGE BORDER -->

                            <!-- USER AVATAR BADGE CONTENT -->
                            <div class="user-avatar-badge-content">
                                <!-- HEXAGON -->
                                <div class="hexagon-dark-16-18"></div>
                                <!-- /HEXAGON -->
                            </div>
                            <!-- /USER AVATAR BADGE CONTENT -->

                            <!-- USER AVATAR BADGE TEXT -->
                            <p class="user-avatar-badge-text">24</p>
                            <!-- /USER AVATAR BADGE TEXT -->
                        </div>
                        <!-- /USER AVATAR BADGE -->
                    </div>
                    <!-- /USER AVATAR -->

                    <!-- FORM -->
                    <form class="form">
                        <!-- FORM ROW -->
                        <div class="form-row">
                            <!-- FORM ITEM -->
                            <div class="form-item">
                                <!-- FORM INPUT -->
                                <div class="form-input small">
                                    <label for="event-reply">Your Reply</label>
                                    <input type="text" id="event-reply" name="event_reply">
                                </div>
                                <!-- /FORM INPUT -->
                            </div>
                            <!-- /FORM ITEM -->
                        </div>
                        <!-- /FORM ROW -->
                    </form>
                    <!-- /FORM -->
                </div>
                <!-- /POST COMMENT FORM -->
            </div>
            <!-- /POST COMMENT LIST -->
            @endif

            @if(count($event->images) > 0)
            <div class="popup-event-info">
            <!-- SLIDER PANEL -->
            <div class="slider-panel">
                <!-- SLIDER PANEL SLIDES -->
                <div id="product-box-slider-items" class="slider-panel-slides">
                    @foreach($event->images as $image)
                    <!-- SLIDER PANEL SLIDE -->
                    <div class="slider-panel-slide">
                        <!-- SLIDER PANEL SLIDE IMAGE -->
                        <figure class="slider-panel-slide-image liquid">
                            <img src="{{$image->src}}">
                        </figure>
                        <!-- /SLIDER PANEL SLIDE IMAGE -->
                    </div>
                    <!-- /SLIDER PANEL SLIDE -->
                    @endforeach
                </div>
                <!-- /SLIDER PANEL SLIDES -->

                <!-- SLIDER PANEL ROSTER -->
                <div class="slider-panel-roster">
                    <!-- SLIDER CONTROLS -->
                    <div id="product-box-slider-controls" class="slider-controls">
                        <!-- SLIDER CONTROL -->
                        <div class="slider-control left">
                            <!-- SLIDER CONTROL ICON -->
                            <svg class="slider-control-icon icon-small-arrow">
                                <use xlink:href="#svg-small-arrow"></use>
                            </svg>
                            <!-- /SLIDER CONTROL ICON -->
                        </div>
                        <!-- /SLIDER CONTROL -->

                        <!-- SLIDER CONTROL -->
                        <div class="slider-control right">
                            <!-- SLIDER CONTROL ICON -->
                            <svg class="slider-control-icon icon-small-arrow">
                                <use xlink:href="#svg-small-arrow"></use>
                            </svg>
                            <!-- /SLIDER CONTROL ICON -->
                        </div>
                        <!-- /SLIDER CONTROL -->
                    </div>
                    <!-- /SLIDER CONTROLS -->

                    @if(false)
                    <!-- BUTTON -->
                    <a class="button secondary"
                       href="https://themeforest.net/item/pixel-diamond-html-esports-gaming-magazine-community/23798711"
                       target="_blank">Live Preview</a>
                    <!-- /BUTTON -->
                    @endif
                    <!-- ROSTER PICTURES -->
                    <div id="product-box-slider-roster" class="roster-pictures">
                        @foreach($event->images as $image)
                        <!-- ROSTER PICTURE -->
                        <div class="roster-picture">
                            <!-- ROSTER PICTURE IMAGE -->
                            <figure class="roster-picture-image liquid">
                                <img src="{{$image->src}}">
                            </figure>
                            <!-- /ROSTER PICTURE IMAGE -->
                        </div>
                        <!-- /ROSTER PICTURE -->
                        @endforeach
                    </div>
                    <!-- /ROSTER PICTURES -->
                </div>
                <!-- /SLIDER PANEL ROSTER -->
            </div>
            <!-- /SLIDER PANEL -->
            </div>
            @endif

        </div>
        <!-- /WIDGET BOX -->

</div>
<!-- /GRID -->




@php
$participants = $event->tagged;
@endphp
<!-- SECTION -->
<section class="section">
    <!-- SECTION HEADER -->
    <div class="section-header">
        <!-- SECTION HEADER INFO -->
        <div class="section-header-info">
            <!-- SECTION TITLE -->
            <h2 class="section-title"><span class="highlighted">{{count($participants)}}</span> Attending</h2>
            <!-- /SECTION TITLE -->
        </div>
        <!-- /SECTION HEADER INFO -->
    </div>
    <!-- /SECTION HEADER -->

    @if(count($participants) > 0)
    <!-- GRID -->
    <div class="grid grid-3-3-3-3 centered">
        @foreach($participants as $participant)
        <!-- USER PREVIEW -->
        <div class="user-preview small">
            <!-- USER PREVIEW COVER -->
            <figure class="user-preview-cover liquid">
                <img src="{{$participant->tagged->cover}}" alt="cover">
            </figure>
            <!-- /USER PREVIEW COVER -->

            <!-- USER PREVIEW INFO -->
            <div class="user-preview-info">
                <!-- USER SHORT DESCRIPTION -->
                <div class="user-short-description small">
                    <!-- USER SHORT DESCRIPTION AVATAR -->
                    <a class="user-short-description-avatar user-avatar" href="{{route('userPublicProfileGet', ['user' => $participant->tagged->username])}}">
                        <!-- USER AVATAR BORDER -->
                        <div class="user-avatar-border">
                            <!-- HEXAGON -->
                            <div class="hexagon-100-110"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR BORDER -->

                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-68-74" data-src="{{$participant->tagged->avatar}}"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->

                        <!-- USER AVATAR PROGRESS -->
                        <div class="user-avatar-progress">
                            <!-- HEXAGON -->
                            @if($participant->tagged->gender == "Male")
                            <div class="hexagon-progress-84-92-male"></div>
                            @elseif($participant->tagged->gender == "Female")
                            <div class="hexagon-progress-84-92-female"></div>
                            @elseif($participant->tagged->gender == "Other")
                            <div class="hexagon-progress-84-92-other"></div>
                            @else
                            <div class="hexagon-progress-84-92"></div>
                            @endif
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR PROGRESS -->

                        <!-- USER AVATAR PROGRESS BORDER -->
                        <div class="user-avatar-progress-border">
                            <!-- HEXAGON -->
                            <div class="hexagon-border-84-92"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR PROGRESS BORDER -->

                    </a>
                    <!-- /USER SHORT DESCRIPTION AVATAR -->

                    <!-- USER SHORT DESCRIPTION TITLE -->
                    <p class="user-short-description-title"><a href="{{route('userPublicProfileGet', ['user' => $participant->tagged->username])}}">{{$participant->tagged->full_name}}</a></p>
                    <!-- /USER SHORT DESCRIPTION TITLE -->

                    <!-- USER SHORT DESCRIPTION TEXT -->
                    <p class="user-short-description-text"><a href="{{$participant->tagged->website ?? '#'}}">{{parse_url($participant->tagged->website)['host'] ?? ''}}</a></p>
                    <!-- /USER SHORT DESCRIPTION TEXT -->
                </div>
                <!-- /USER SHORT DESCRIPTION -->

                <!-- USER STATS -->
                <div class="user-stats">
                    <!-- USER STAT -->
                    <div class="user-stat">
                        <!-- USER STAT TITLE -->
                        <p class="user-stat-title">{{$participant->tagged->posts < 1000 ? $participant->tagged->posts : number_format($participant->tagged->posts/1000,1)."K"}}</p>
                        <!-- /USER STAT TITLE -->

                        <!-- USER STAT TEXT -->
                        <p class="user-stat-text">posts</p>
                        <!-- /USER STAT TEXT -->
                    </div>
                    <!-- /USER STAT -->

                    <!-- USER STAT -->
                    <div class="user-stat">
                        <!-- USER STAT TITLE -->
                        <p class="user-stat-title">{{$participant->tagged->friends < 1000 ? $participant->tagged->friends : number_format($participant->tagged->friends/1000,1)."K"}}</p>
                        <!-- /USER STAT TITLE -->

                        <!-- USER STAT TEXT -->
                        <p class="user-stat-text">friends</p>
                        <!-- /USER STAT TEXT -->
                    </div>
                    <!-- /USER STAT -->

                    <!-- USER STAT -->
                    <div class="user-stat">
                        <!-- USER STAT TITLE -->
                        <p class="user-stat-title">{{$participant->tagged->visits < 1000 ? $participant->tagged->visits : number_format($participant->tagged->visits/1000,1)."K"}}</p>
                        <!-- /USER STAT TITLE -->

                        <!-- USER STAT TEXT -->
                        <p class="user-stat-text">visits</p>
                        <!-- /USER STAT TEXT -->
                    </div>
                    <!-- /USER STAT -->
                </div>
                <!-- /USER STATS -->

                <!-- SOCIAL LINKS -->
                @include('home.user.profile.partial.widgets.friends-social', ['user' => $participant->tagged])
                <!-- /SOCIAL LINKS -->
            </div>
            <!-- /USER PREVIEW INFO -->

            <!-- USER PREVIEW FOOTER -->
            <div class="user-preview-footer">
                <!-- USER PREVIEW FOOTER ACTION -->
                <div class="user-preview-footer-action">
                    <!-- BUTTON -->
                    <a href="{{route('userPublicProfileGet', ['user' => $participant->tagged->username])}}" class="button void void-secondary">
                        <!-- BUTTON ICON -->
                        <svg class="button-icon icon-members">
                            <use xlink:href="#svg-members"></use>
                        </svg>
                        <!-- /BUTTON ICON -->
                    </a>
                    <!-- /BUTTON -->
                </div>
                <!-- /USER PREVIEW FOOTER ACTION -->

                <!-- USER PREVIEW FOOTER ACTION -->
                <div class="user-preview-footer-action profile-friend-send-message" data-user="{{$participant->tagged->username}}">
                    <!-- BUTTON -->
                    <div class="button void void-primary">
                        <!-- BUTTON ICON -->
                        <svg class="button-icon icon-comment">
                            <use xlink:href="#svg-comment"></use>
                        </svg>
                        <!-- /BUTTON ICON -->
                    </div>
                    <!-- /BUTTON -->
                </div>
                <!-- /USER PREVIEW FOOTER ACTION -->
            </div>
            <!-- /USER PREVIEW FOOTER -->
        </div>
        <!-- /USER PREVIEW -->
        @endforeach
    </div>
    <!-- /GRID -->
    @else
    @endif


</section>
<!-- /SECTION -->
@endsection

@section('stylesheets')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/css/ol.css" type="text/css">
<style>
    .popup-event-information {
     display: block !important;
      position: unset !important;
     opacity: 1 !important;
     visibility: visible !important;
     top: auto !important;
     bottom: auto !important;
     margin-left: 0px !important;
     width: auto;
     max-width: unset;
    }
     .event-map {
         margin-top: 15px;
         height: 400px !important;
         width: 100% !important;
     }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/build/ol.js"></script>
<script src="https://unpkg.com/elm-pep"></script>
<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=fetch,requestAnimationFrame,Element.prototype.classList,URL"></script>
<script type="text/javascript">
    const address = encodeURI('{{$event->event_location}}');
    const nominatimUrl = 'https://nominatim.openstreetmap.org/search?format=json&q='+address+'&polygon=1&addressdetails=1';
    /*document.addEventListener("DOMContentLoaded", function() {
        fetch('http://nominatim.openstreetmap.org/search?format=json&q={{$event->event_location}}&polygon=1&addressdetails=1')
            .then(function(response) {
                return response.json();
            }).then(function(json) {
            //console.log(json[0]);
            //if(json[0]){
                var iconFeature1 = new ol.Feature({
                    geometry: new ol.geom.Point(ol.proj.fromLonLat([json[0].lon, json[0].lat])),
                    name: 'Somewhere',
                });


                // specific style for that one point
                iconFeature1.setStyle(new ol.style.Style({
                    image: new ol.style.Icon({
                        anchor: [0.5, 46],
                        anchorXUnits: 'fraction',
                        anchorYUnits: 'pixels',
                        src: 'http://alpha.ljltongle.com/assets/img/landing/pin.png',
                    })
                }));




                const iconLayerSource = new ol.source.Vector({
                    features: [iconFeature1]
                });

                const iconLayer = new ol.layer.Vector({
                    source: iconLayerSource,
                    // style for all elements on a layer
                    style: new ol.style.Style({
                        image: new ol.style.Icon({
                            anchor: [0.5, 46],
                            anchorXUnits: 'fraction',
                            anchorYUnits: 'pixels',
                            src: 'https://openlayers.org/en/v4.6.4/examples/data/icon.png'
                        })
                    })
                });


                const map = new ol.Map({
                    target: 'event-map',
                    layers: [
                        new ol.layer.Tile({
                            source: new ol.source.OSM(),
                        }),
                        iconLayer
                    ],
                    view: new ol.View({
                        center: ol.proj.fromLonLat([ json[0].lon, json[0].lat]),
                        zoom: 16
                    })
                });
           // }
        });



    });*/
</script>
<script src="/assets/js/pages/home/events/events-view.js"></script>
@if(count($participants) > 0)
<script>
    @foreach($participants as $participant)
    app.plugins.createSlider({
        container: `#user-preview-social-links-slider-{{$participant->tagged->id}}`,
        items: 4,
        fixedWidth: 32,
        gutter: 8,
        loop: false,
        nav: false,
        controlsContainer: `#user-preview-social-links-slider-controls-{{$participant->tagged->id}}`
    });
    @endforeach
</script>
@endif
@endsection



