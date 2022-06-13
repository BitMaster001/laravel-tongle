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
            <h2 class="section-title">Events Search</h2>
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
                        <input type="text" id="events-search" name="q" value="{{request()->get('q') ?? ''}}">
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
                    <!-- BUTTON -->
                    <a class="button tertiary" href="{{route('getEvent')}}">
                        <!-- ICON MAGNIFYING GLASS -->
                        <svg class="icon-magnifying-glass">
                            <use xlink:href="#svg-cross-thin"></use>
                        </svg>
                        <!-- /ICON MAGNIFYING GLASS -->
                    </a>
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
            <a class="button secondary popup-event-creation-trigger" href="{{route('getNewEvent')}}">+ Add New Event</a>
            <!-- /BUTTON -->
        </div>
        <!-- /SECTION FILTERS BAR ACTIONS -->
    </div>
    <!-- /SECTION FILTERS BAR -->


<!-- SECTION HEADER -->
<div class="section-header">
    <!-- SECTION HEADER INFO -->
    <div class="section-header-info">

        <!-- SECTION TITLE -->
        <h2 class="section-title">Comming Events <span class="highlighted">{{count($events)}}</span></h2>
        <!-- /SECTION TITLE -->
    </div>
    <!-- /SECTION HEADER INFO -->
</div>
<!-- /SECTION HEADER -->

<!-- GRID -->
<div class="grid grid-3-3-3-3">
    @foreach($events as $event)
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
</div>
<!-- /GRID -->

@endsection

@section('stylesheets')
@endsection

@section('scripts')
@endsection


