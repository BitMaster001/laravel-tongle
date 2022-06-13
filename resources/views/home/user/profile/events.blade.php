@extends('layouts.app')

@section('title')
{{$user->username}}
@endsection

@section('content')
<!-- PROFILE HEADER -->
@include('home.user.profile.partial.profile-header')
<!-- /PROFILE HEADER -->

<!-- SECTION NAVIGATION -->
@include('home.user.profile.partial.profile-navigation')
<!-- /SECTION NAVIGATION -->

@php
$date = new \Carbon\Carbon();
$ownedEvents = $user->getUpcomingOwnerEvents($date);
$upcomingEvents = $user->getUpcomingEvents($date);
@endphp

@if(count($ownedEvents) >0)
<!-- SECTION HEADER -->
<div class="section-header">
    <!-- SECTION HEADER INFO -->
    <div class="section-header-info">
        <!-- SECTION PRETITLE -->
        <p class="section-pretitle">This upcoming hosting events!</p>
        <!-- /SECTION PRETITLE -->

        <!-- SECTION TITLE -->
        @if($user == Auth::user())
        <h2 class="section-title">My Events <span class="highlighted">{{count($ownedEvents)}}</span></h2>
        @else
        <h2 class="section-title">Events <span class="highlighted">{{count($ownedEvents)}}</span></h2>
        @endif
        <!-- /SECTION TITLE -->
    </div>
    <!-- /SECTION HEADER INFO -->
</div>
<!-- /SECTION HEADER -->

<!-- GRID -->
<div class="grid grid-3-3-3-3">
    @foreach($ownedEvents as $event)
    <!-- EVENT PREVIEW -->
    <div class="event-preview">
        <!-- EVENT PREVIEW COVER -->
        <figure class="event-preview-cover liquid">
            <img src="{{$event->cover}}">
        </figure>
        <!-- /EVENT PREVIEW COVER -->

        <!-- EVENT PREVIEW INFO -->
        <div class="event-preview-info">
            <!-- EVENT PREVIEW INFO TOP -->
            <div class="event-preview-info-top">
                <!-- DATE STICKER -->
                <div class="date-sticker">
                    <!-- DATE STICKER DAY -->
                    <p class="date-sticker-day">{{$event->getEventStartDateDay()}}</p>
                    <!-- /DATE STICKER DAY -->

                    <!-- DATE STICKER MONTH -->
                    <p class="date-sticker-month @if($event->privacy == 'Closed') closed @endif">{{$event->getEventStartDateMonth()}}</p>
                    <!-- /DATE STICKER MONTH -->
                </div>
                <!-- /DATE STICKER -->

                <!-- EVENT PREVIEW TITLE -->
                <p class="event-preview-title popup-event-information-trigger">{{$event->title}}</p>
                <!-- /EVENT PREVIEW TITLE -->

                <!-- EVENT PREVIEW TIMESTAMP -->
                <p class="event-preview-timestamp"><span class="bold">{{$event->getEventStartTime()}}</span> {{$event->getEventStartTimeAnnotation()}} @if($event->getEventEndDate())- <span class="bold">{{$event->getEventEndTime()}}</span> {{$event->getEventEndTimeAnnotation()}} @endif</p>
                <!-- /EVENT PREVIEW TIMESTAMP -->

                <!-- EVENT PREVIEW TEXT -->
                <p class="event-preview-text">{{$event->body}}</p>
                <!-- /EVENT PREVIEW TEXT -->
            </div>
            <!-- /EVENT PREVIEW INFO TOP -->

            <!-- EVENT PREVIEW INFO BOTTOM -->
            <div class="event-preview-info-bottom">
                <!-- DECORATED TEXT -->
                <div class="decorated-text">
                    <!-- DECORATED TEXT ICON -->
                    <svg class="decorated-text-icon icon-pin">
                        <use xlink:href="#svg-pin"></use>
                    </svg>
                    <!-- /DECORATED TEXT ICON -->

                    <!-- DECORATED TEXT CONTENT -->
                    <p class="decorated-text-content">{{$event->event_location}}</p>
                    <!-- /DECORATED TEXT CONTENT -->
                </div>
                <!-- /DECORATED TEXT -->

                <!-- META LINE -->
                <div class="meta-line">
                    <!-- META LINE TEXT -->
                    <p class="meta-line-text">{{count($event->tagged)}} Attending</p>
                    <!-- /META LINE TEXT -->
                </div>
                <!-- /META LINE -->

                <!-- BUTTON -->
                @if($user == Auth::user())
                <a class="button secondary" href="{{route('getViewEventManage', ['event' => $event->key])}}">Manage Event</a>
                @else
                <a class="button secondary" href="{{route('getViewEvent', ['event' => $event->key])}}">Event</a>
                @endif
                <!-- /BUTTON -->
            </div>
            <!-- /EVENT PREVIEW INFO BOTTOM -->
        </div>
        <!-- /EVENT PREVIEW INFO -->
    </div>
    <!-- /EVENT PREVIEW -->
    @endforeach
</div>
<!-- /GRID -->

@endif

@if(count($upcomingEvents)>0)
<!-- SECTION HEADER -->
<div class="section-header">
    <!-- SECTION HEADER INFO -->
    <div class="section-header-info">
        <!-- SECTION PRETITLE -->
        <p class="section-pretitle">See what's upcoming next!</p>
        <!-- /SECTION PRETITLE -->

        <!-- SECTION TITLE -->
        <h2 class="section-title">Events <span class="highlighted">{{count($upcomingEvents)}}</span></h2>
        <!-- /SECTION TITLE -->
    </div>
    <!-- /SECTION HEADER INFO -->
</div>
<!-- /SECTION HEADER -->

<!-- GRID -->
<div class="grid grid-3-3-3-3">
    @foreach($upcomingEvents as $event)
    <!-- EVENT PREVIEW -->
    <div class="event-preview">
        <!-- EVENT PREVIEW COVER -->
        <figure class="event-preview-cover liquid">
            <img src="{{$event->cover}}">
        </figure>
        <!-- /EVENT PREVIEW COVER -->

        <!-- EVENT PREVIEW INFO -->
        <div class="event-preview-info">
            <!-- EVENT PREVIEW INFO TOP -->
            <div class="event-preview-info-top">
                <!-- DATE STICKER -->
                <div class="date-sticker">
                    <!-- DATE STICKER DAY -->
                    <p class="date-sticker-day">{{$event->getEventStartDateDay()}}</p>
                    <!-- /DATE STICKER DAY -->

                    <!-- DATE STICKER MONTH -->
                    <p class="date-sticker-month @if($event->privacy == 'Closed') closed @endif">{{$event->getEventStartDateMonth()}}</p>
                    <!-- /DATE STICKER MONTH -->
                </div>
                <!-- /DATE STICKER -->

                <!-- EVENT PREVIEW TITLE -->
                <a class="event-preview-title popup-event-information-trigger" href="{{route('getViewEvent', ['event' => $event->key])}}">{{$event->title}}</a>
                <!-- /EVENT PREVIEW TITLE -->

                <!-- EVENT PREVIEW TIMESTAMP -->
                <p class="event-preview-timestamp"><span class="bold">{{$event->getEventStartTime()}}</span> {{$event->getEventStartTimeAnnotation()}} @if($event->getEventEndDate())- <span class="bold">{{$event->getEventEndTime()}}</span> {{$event->getEventEndTimeAnnotation()}} @endif</p>
                <!-- /EVENT PREVIEW TIMESTAMP -->

                <!-- EVENT PREVIEW TEXT -->
                <p class="event-preview-text">{{$event->body}}</p>
                <!-- /EVENT PREVIEW TEXT -->
            </div>
            <!-- /EVENT PREVIEW INFO TOP -->

            <!-- EVENT PREVIEW INFO BOTTOM -->
            <div class="event-preview-info-bottom">
                <!-- DECORATED TEXT -->
                <div class="decorated-text">
                    <!-- DECORATED TEXT ICON -->
                    <svg class="decorated-text-icon icon-pin">
                        <use xlink:href="#svg-pin"></use>
                    </svg>
                    <!-- /DECORATED TEXT ICON -->

                    <!-- DECORATED TEXT CONTENT -->
                    <p class="decorated-text-content">{{$event->event_location}}</p>
                    <!-- /DECORATED TEXT CONTENT -->
                </div>
                <!-- /DECORATED TEXT -->

                <!-- META LINE -->
                <div class="meta-line">
                    <!-- META LINE TEXT -->
                    <p class="meta-line-text">{{count($event->tagged)}} Attending</p>
                    <!-- /META LINE TEXT -->
                </div>
                <!-- /META LINE -->

                <!-- BUTTON -->
                <a class="button secondary" href="{{route('getViewEvent', ['event' => $event->key])}}">Event</a>
                <!-- /BUTTON -->
            </div>
            <!-- /EVENT PREVIEW INFO BOTTOM -->
        </div>
        <!-- /EVENT PREVIEW INFO -->
    </div>
    <!-- /EVENT PREVIEW -->
    @endforeach

    @if(false)
    <!-- EVENT PREVIEW -->
    <div class="event-preview">
        <!-- EVENT PREVIEW COVER -->
        <figure class="event-preview-cover liquid">
            <img src="/assets/img/cover/47.jpg" alt="cover-47">
        </figure>
        <!-- /EVENT PREVIEW COVER -->

        <!-- EVENT PREVIEW INFO -->
        <div class="event-preview-info">
            <!-- EVENT PREVIEW INFO TOP -->
            <div class="event-preview-info-top">
                <!-- DATE STICKER -->
                <div class="date-sticker">
                    <!-- DATE STICKER DAY -->
                    <p class="date-sticker-day">{{$event->getEventStartDateDay()}}</p>
                    <!-- /DATE STICKER DAY -->

                    <!-- DATE STICKER MONTH -->
                    <p class="date-sticker-month">{{$event->getEventStartDateMonth()}}</p>
                    <!-- /DATE STICKER MONTH -->
                </div>
                <!-- /DATE STICKER -->

                <!-- EVENT PREVIEW TITLE -->
                <p class="event-preview-title popup-event-information-trigger">Breakfast with Neko</p>
                <!-- /EVENT PREVIEW TITLE -->

                <!-- EVENT PREVIEW TIMESTAMP -->
                <p class="event-preview-timestamp"><span class="bold">8:30</span> AM</p>
                <!-- /EVENT PREVIEW TIMESTAMP -->

                <!-- EVENT PREVIEW TEXT -->
                <p class="event-preview-text">Hi Neko! I'm creating this event to invite you to have breakfast before work. Meet me at Coffebucks.</p>
                <!-- /EVENT PREVIEW TEXT -->
            </div>
            <!-- /EVENT PREVIEW INFO TOP -->

            <!-- EVENT PREVIEW INFO BOTTOM -->
            <div class="event-preview-info-bottom">
                <!-- DECORATED TEXT -->
                <div class="decorated-text">
                    <!-- DECORATED TEXT ICON -->
                    <svg class="decorated-text-icon icon-pin">
                        <use xlink:href="#svg-pin"></use>
                    </svg>
                    <!-- /DECORATED TEXT ICON -->

                    <!-- DECORATED TEXT CONTENT -->
                    <p class="decorated-text-content">Downtown Coffeebucks</p>
                    <!-- /DECORATED TEXT CONTENT -->
                </div>
                <!-- /DECORATED TEXT -->

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
                                <div class="hexagon-image-18-20" data-src="/assets/img/avatar/05.jpg"></div>
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
                                <div class="hexagon-image-18-20" data-src="/assets/img/avatar/01.jpg"></div>
                                <!-- /HEXAGON -->
                            </div>
                            <!-- /USER AVATAR CONTENT -->
                        </div>
                        <!-- /USER AVATAR -->
                    </div>
                    <!-- /META LINE LIST -->

                    <!-- META LINE TEXT -->
                    <p class="meta-line-text">Attending</p>
                    <!-- /META LINE TEXT -->
                </div>
                <!-- /META LINE -->

                <!-- BUTTON -->
                <p class="button white white-tertiary">Remove from Calendar</p>
                <!-- /BUTTON -->
            </div>
            <!-- /EVENT PREVIEW INFO BOTTOM -->
        </div>
        <!-- /EVENT PREVIEW INFO -->
    </div>
    <!-- /EVENT PREVIEW -->
    @endif
</div>
<!-- /GRID -->
@endif

@if(count($upcomingEvents)+count($ownedEvents)==0)
<br>
<!-- SECTION HEADER -->
<div class="section-header">
    <!-- SECTION HEADER INFO -->
    <div class="section-header-info">
        <!-- SECTION PRETITLE -->
        <p class="section-pretitle">Browse {{$user->full_name}}</p>
        <!-- /SECTION PRETITLE -->

        <!-- SECTION TITLE -->
        <h2 class="section-title">Events <span class="highlighted">0</span></h2>
        <!-- /SECTION TITLE -->
    </div>
    <!-- /SECTION HEADER INFO -->
</div>
<!-- /SECTION HEADER -->
<br>
<p>No Events.</p>
@endif

@endsection

@section('stylesheets')
@endsection

@section('scripts')
@endsection
