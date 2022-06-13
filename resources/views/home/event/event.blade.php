@extends('layouts.app')

@section('title')
Events
@endsection

@section('content')
    <!-- SECTION BANNER -->
    <div class="section-banner section-banner-3">
        <!-- SECTION BANNER ICON -->
        <img class="section-banner-icon" src="/assets/img/banner/events-icon.png" alt="events-icon">
        <!-- /SECTION BANNER ICON -->

        <!-- SECTION BANNER TITLE -->
        <p class="section-banner-title">Events</p>
        <!-- /SECTION BANNER TITLE -->

        <!-- SECTION BANNER TEXT -->
        <p class="section-banner-text">Easily manage and create events or search!</p>
        <!-- /SECTION BANNER TEXT -->
    </div>
    <!-- /SECTION BANNER -->

    <!-- SECTION HEADER -->
    <div class="section-header">
        <!-- SECTION HEADER INFO -->
        <div class="section-header-info">
            <!-- SECTION PRETITLE -->
            <p class="section-pretitle">Get a quick look!</p>
            <!-- /SECTION PRETITLE -->

            <!-- SECTION TITLE -->
            <h2 class="section-title">Events Calendar</h2>
            <!-- /SECTION TITLE -->
        </div>
        <!-- /SECTION HEADER INFO -->
    </div>
    <!-- /SECTION HEADER -->

    <!-- SECTION FILTERS BAR -->
    <div class="section-filters-bar v6">
        <!-- SECTION FILTERS BAR ACTIONS -->
        <div class="section-filters-bar-actions">
            <!-- FORM -->
            <form class="form" method="get" action="{{route('getEventSearch')}}">
                <!-- FORM ITEM -->
                <div class="form-item split">
                    <!-- FORM INPUT -->
                    <div class="form-input small">
                        <label for="events-search">Search Events</label>
                        <input type="text" id="events-search" name="q">
                    </div>
                    <!-- /FORM INPUT -->

                    <!-- BUTTON -->
                    <button class="button primary">
                        <!-- ICON MAGNIFYING GLASS -->
                        <svg class="icon-magnifying-glass">
                            <use xlink:href="#svg-magnifying-glass"></use>
                        </svg>
                        <!-- /ICON MAGNIFYING GLASS -->
                    </button>
                    <!-- /BUTTON -->
                </div>
                <!-- /FORM ITEM -->
            </form>
            <!-- /FORM -->
        </div>
        <!-- /SECTION FILTERS BAR ACTIONS -->

        <!-- SECTION FILTERS BAR ACTIONS -->
        <div class="section-filters-bar-actions">
            <!-- BUTTON -->
            <a class="button secondary popup-event-creation-trigger" href="{{route('getNewEvent')}}" style="margin-left: 10px;">+ Add New Event</a>
            <a class="button primary" href="{{route('getUserEvent')}}" style="margin-left: 10px;">Browse All</a>
            <!-- /BUTTON -->
        </div>
        <!-- /SECTION FILTERS BAR ACTIONS -->
    </div>
    <!-- /SECTION FILTERS BAR -->

    <!-- CALENDAR WIDGET -->
    <div class="calendar-widget">
        <!-- CALENDAR WIDGET HEADER -->
        <div class="calendar-widget-header">
            <!-- CALENDAR WIDGET HEADER ACTIONS -->
            <div class="calendar-widget-header-actions">
                <!-- SLIDER CONTROLS -->
                <div class="slider-controls">

                    <!-- SLIDER CONTROL -->
                    <a class="slider-control left" href="?date={{$date->subMonth()->format('Y-m')}}">
                        <!-- SLIDER CONTROL ICON -->
                        <svg class="slider-control-icon icon-big-arrow">
                            <use xlink:href="#svg-big-arrow"></use>
                        </svg>
                        <!-- /SLIDER CONTROL ICON -->
                    </a>
                    <!-- /SLIDER CONTROL -->

                    <!-- SLIDER CONTROL -->
                    <a class="slider-control right" href="?date={{$date->addMonth()->addMonth()->format('Y-m')}}">
                        @php
                        $date->subMonth()
                        @endphp
                        <!-- SLIDER CONTROL ICON -->
                        <svg class="slider-control-icon icon-big-arrow">
                            <use xlink:href="#svg-big-arrow"></use>
                        </svg>
                        <!-- /SLIDER CONTROL ICON -->
                    </a>
                    <!-- /SLIDER CONTROL -->
                </div>
                <!-- /SLIDER CONTROLS -->

                <!-- CALENDAR WIDGET TITLE -->
                <p class="calendar-widget-title">{{$date->format('F Y')}}</p>
                <!-- /CALENDAR WIDGET TITLE -->
            </div>
            <!-- /CALENDAR WIDGET HEADER ACTIONS -->
            @if(false)
            <!-- CALENDAR WIDGET HEADER ACTIONS -->
            <div class="calendar-widget-header-actions">
                <!-- VIEW ACTIONS -->
                <div class="view-actions">
                    <!-- VIEW ACTION -->
                    <a class="view-action text-tooltip-tft-medium active" href="events.html" data-title="Monthly">
                        <!-- VIEW ACTION ICON -->
                        <svg class="view-action-icon icon-events-monthly">
                            <use xlink:href="#svg-events-monthly"></use>
                        </svg>
                        <!-- /VIEW ACTION ICON -->
                    </a>
                    <!-- /VIEW ACTION -->

                    <!-- VIEW ACTION -->
                    <a class="view-action text-tooltip-tft-medium" href="events-weekly.html" data-title="Weekly">
                        <!-- VIEW ACTION ICON -->
                        <svg class="view-action-icon icon-events-weekly">
                            <use xlink:href="#svg-events-weekly"></use>
                        </svg>
                        <!-- /VIEW ACTION ICON -->
                    </a>
                    <!-- /VIEW ACTION -->

                    <!-- VIEW ACTION -->
                    <a class="view-action text-tooltip-tft-medium" href="events-daily.html" data-title="Daily">
                        <!-- VIEW ACTION ICON -->
                        <svg class="view-action-icon icon-events-daily">
                            <use xlink:href="#svg-events-daily"></use>
                        </svg>
                        <!-- /VIEW ACTION ICON -->
                    </a>
                    <!-- /VIEW ACTION -->
                </div>
                <!-- /VIEW ACTIONS -->
            </div>
            <!-- /CALENDAR WIDGET HEADER ACTIONS -->
            @endif
        </div>
        <!-- /CALENDAR WIDGET HEADER -->


        <!-- CALENDAR -->
        @if(false)
        <div class="calendar full">
            <!-- CALENDAR WEEK -->
            <div class="calendar-week">
                <!-- CALENDAR WEEK DAY -->
                <p class="calendar-week-day"><span class="week-day-short">Sun</span><span class="week-day-long">Sunday</span></p>
                <!-- /CALENDAR WEEK DAY -->

                <!-- CALENDAR WEEK DAY -->
                <p class="calendar-week-day"><span class="week-day-short">Mon</span><span class="week-day-long">Monday</span></p>
                <!-- /CALENDAR WEEK DAY -->

                <!-- CALENDAR WEEK DAY -->
                <p class="calendar-week-day"><span class="week-day-short">Tue</span><span class="week-day-long">Tuesday</span></p>
                <!-- /CALENDAR WEEK DAY -->

                <!-- CALENDAR WEEK DAY -->
                <p class="calendar-week-day"><span class="week-day-short">Wed</span><span class="week-day-long">Wednesday</span></p>
                <!-- /CALENDAR WEEK DAY -->

                <!-- CALENDAR WEEK DAY -->
                <p class="calendar-week-day"><span class="week-day-short">Thu</span><span class="week-day-long">Thursday</span></p>
                <!-- /CALENDAR WEEK DAY -->

                <!-- CALENDAR WEEK DAY -->
                <p class="calendar-week-day"><span class="week-day-short">Fri</span><span class="week-day-long">Friday</span></p>
                <!-- /CALENDAR WEEK DAY -->

                <!-- CALENDAR WEEK DAY -->
                <p class="calendar-week-day"><span class="week-day-short">Sat</span><span class="week-day-long">Saturday</span></p>
                <!-- /CALENDAR WEEK DAY -->
            </div>
            <!-- /CALENDAR WEEK -->

            <!-- CALENDAR DAYS -->
            <div class="calendar-days">
                <!-- CALENDAR DAY ROW -->
                <div class="calendar-day-row">
                    <!-- CALENDAR DAY -->
                    <div class="calendar-day inactive">
                        <!-- CALENDAR DAY NUMBER -->
                        <p class="calendar-day-number">29</p>
                        <!-- /CALENDAR DAY NUMBER -->
                    </div>
                    <!-- /CALENDAR DAY -->

                    <!-- CALENDAR DAY -->
                    <div class="calendar-day inactive">
                        <!-- CALENDAR DAY NUMBER -->
                        <p class="calendar-day-number">30</p>
                        <!-- /CALENDAR DAY NUMBER -->
                    </div>
                    <!-- /CALENDAR DAY -->

                    <!-- CALENDAR DAY -->
                    <div class="calendar-day inactive">
                        <!-- CALENDAR DAY NUMBER -->
                        <p class="calendar-day-number">31</p>
                        <!-- /CALENDAR DAY NUMBER -->
                    </div>
                    <!-- /CALENDAR DAY -->

                    <!-- CALENDAR DAY -->
                    <div class="calendar-day">
                        <!-- CALENDAR DAY NUMBER -->
                        <p class="calendar-day-number">1</p>
                        <!-- /CALENDAR DAY NUMBER -->
                    </div>
                    <!-- /CALENDAR DAY -->

                    <!-- CALENDAR DAY -->
                    <div class="calendar-day">
                        <!-- CALENDAR DAY NUMBER -->
                        <p class="calendar-day-number">2</p>
                        <!-- /CALENDAR DAY NUMBER -->

                        <!-- CALENDARY DAY EVENTS -->
                        <div class="calendar-day-events">
                            <!-- CALENDAR DAY EVENT -->
                            <p class="calendar-day-event primary popup-event-information-trigger"><span class="calendar-day-event-text">Dex's Birthday</span></p>
                            <!-- /CALENDAR DAY EVENT -->

                            <!-- CALENDAR DAY EVENT -->
                            <p class="calendar-day-event secondary popup-event-information-trigger"><span class="calendar-day-event-text">Sara's Big Stream</span></p>
                            <!-- /CALENDAR DAY EVENT -->

                            <!-- CALENDAR DAY EVENT -->
                            <p class="calendar-day-event secondary popup-event-information-trigger"><span class="calendar-day-event-text">Striker GO Release</span></p>
                            <!-- /CALENDAR DAY EVENT -->
                        </div>
                        <!-- /CALENDARY DAY EVENTS -->
                    </div>
                    <!-- /CALENDAR DAY -->

                    <!-- CALENDAR DAY -->
                    <div class="calendar-day">
                        <!-- CALENDAR DAY NUMBER -->
                        <p class="calendar-day-number">3</p>
                        <!-- /CALENDAR DAY NUMBER -->
                    </div>
                    <!-- /CALENDAR DAY -->

                    <!-- CALENDAR DAY -->
                    <div class="calendar-day">
                        <!-- CALENDAR DAY NUMBER -->
                        <p class="calendar-day-number">4</p>
                        <!-- /CALENDAR DAY NUMBER -->
                    </div>
                    <!-- /CALENDAR DAY -->
                </div>
                <!-- /CALENDAR DAY ROW -->
            </div>
            <!-- /CALENDAR DAYS -->
        </div>
        @endif
        {!!$calendar!!}
        <!-- /CALENDAR -->

        @php
        $todayEvents = $user->getDayEvents($date);
        @endphp


        <!-- CALENDAR EVENTS PREVIEW -->
        <div class="calendar-events-preview">
            @if(count($todayEvents)>0)
            <!-- CALENDAR EVENTS PREVIEW TITLE Monday, August 13th - 2019 -->
            <p class="calendar-events-preview-title">{{$date->format('l, F dS, Y')}}</p>
            <!-- /CALENDAR EVENTS PREVIEW TITLE -->

            <!-- CALENDAR EVENT PREVIEW LIST -->
            <div class="calendar-event-preview-list">
                @foreach($todayEvents as $event)
                <!-- CALENDAR EVENT PREVIEW -->
                <div class="calendar-event-preview @if($event->privacy == 'Public') primary @else secondary @endif">
                    <!-- CALENDAR EVENT PREVIEW START TIME -->
                    <div class="calendar-event-preview-start-time">
                        <!-- CALENDAR EVENT PREVIEW START TIME TITLE -->
                        <p class="calendar-event-preview-start-time-title">{{$event->getEventStartTime()}}</p>
                        <!-- /CALENDAR EVENT PREVIEW START TIME TITLE -->

                        <!-- CALENDAR EVENT PREVIEW START TIME TEXT -->
                        <p class="calendar-event-preview-start-time-text">{{$event->getEventStartTimeAnnotation()}}</p>
                        <!-- /CALENDAR EVENT PREVIEW START TIME TEXT -->
                    </div>
                    <!-- /CALENDAR EVENT PREVIEW START TIME -->

                    <!-- CALENDAR EVENT PREVIEW INFO -->
                    <div class="calendar-event-preview-info">
                        <!-- CALENDAR EVENT PREVIEW TITLE -->
                        <p class="calendar-event-preview-title popup-event-information-trigger"><a href="{{route('getViewEvent', ['event' => $event->key])}}" style="color: unset;">{{$event->title}}</a></p>
                        <!-- /CALENDAR EVENT PREVIEW TITLE -->

                        <!-- CALENDAR EVENT PREVIEW TEXT -->
                        <p class="calendar-event-preview-text">{{$event->body}}</p>
                        <!-- /CALENDAR EVENT PREVIEW TEXT -->

                        <!-- CALENDAR EVENT PREVIEW TITLE -->
                        <p class="calendar-event-preview-time"><span class="bold">{{$event->getEventStartTime()}}</span> {{$event->getEventStartTimeAnnotation()}} @if($event->getEventEndDate())- <span class="bold">{{$event->getEventEndTime()}}</span> {{$event->getEventEndTimeAnnotation()}} @endif</p>
                        <!-- /CALENDAR EVENT PREVIEW TITLE -->
                    </div>
                    <!-- /CALENDAR EVENT PREVIEW INFO -->
                </div>
                <!-- /CALENDAR EVENT PREVIEW -->
                @endforeach
            </div>
            <!-- /CALENDAR EVENT PREVIEW LIST -->
            @endif
        </div>
        <!-- /CALENDAR EVENTS PREVIEW -->

    </div>
    <!-- /CALENDAR WIDGET -->
    @php
    $ownedEvents = $user->getMonthOwnerEvents($date);
    @endphp
    @if(count($ownedEvents) >0)
    <!-- SECTION HEADER -->
    <div class="section-header">
        <!-- SECTION HEADER INFO -->
        <div class="section-header-info">
            <!-- SECTION PRETITLE -->
            <p class="section-pretitle">This month hosting events!</p>
            <!-- /SECTION PRETITLE -->

            <!-- SECTION TITLE -->
            <h2 class="section-title">Manage Your Events</h2>
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
                    <a class="button secondary" href="{{route('getViewEventManage', ['event' => $event->key])}}">Manage Event</a>
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

    @php
    $upcomingEvents = $user->getUpcomingEvents($today);
    @endphp

    @if(count($upcomingEvents)>0)
    <!-- SECTION HEADER -->
    <div class="section-header">
        <!-- SECTION HEADER INFO -->
        <div class="section-header-info">
            <!-- SECTION PRETITLE -->
            <p class="section-pretitle">See what's next!</p>
            <!-- /SECTION PRETITLE -->

            <!-- SECTION TITLE -->
            <h2 class="section-title">Upcoming Events</h2>
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

@php
$pastEvents = $user->getPastEvents($today);
@endphp

@if(count($pastEvents)>0)
<!-- SECTION HEADER -->
<div class="section-header">
    <!-- SECTION HEADER INFO -->
    <div class="section-header-info">

        <!-- SECTION TITLE -->
        <h2 class="section-title">Past Events</h2>
        <!-- /SECTION TITLE -->
    </div>
    <!-- /SECTION HEADER INFO -->
</div>
<!-- /SECTION HEADER -->

<!-- GRID -->
<div class="grid grid-3-3-3-3">
    @foreach($pastEvents as $event)
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

@endsection

@section('stylesheets')
<style>
    @media screen and (max-width: 680px) {
        .content-grid {
            width: 95%;
            padding: 25px 0 200px;
        }
        .grid {
            grid-template-columns: 100% !important;
        }
        .user-preview {
            width: 100%;
        }
    }
</style>
@endsection

@section('scripts')
@endsection


