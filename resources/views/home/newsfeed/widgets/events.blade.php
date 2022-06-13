@php
$date = new \Carbon\Carbon();
$calendar = (new App\Http\Controllers\Home\EventController())->getEventsCalendar($date, true, false);
@endphp
<!-- WIDGET BOX -->
<div class="widget-box no-padding">
    <!-- WIDGET BOX SETTINGS -->
    <div class="widget-box-settings">
        <!-- POST SETTINGS WRAP -->
        <div class="post-settings-wrap">
            <!-- POST SETTINGS -->
            <div class="post-settings widget-box-post-settings-dropdown-trigger">
                <!-- POST SETTINGS ICON -->
                <svg class="post-settings-icon icon-more-dots">
                    <use xlink:href="#svg-more-dots"></use>
                </svg>
                <!-- /POST SETTINGS ICON -->
            </div>
            <!-- /POST SETTINGS -->

            <!-- SIMPLE DROPDOWN -->
            <div class="simple-dropdown widget-box-post-settings-dropdown">
                <!-- SIMPLE DROPDOWN LINK -->
                <a class="simple-dropdown-link" href="{{route('getEvent')}}">Events</a>
                <!-- /SIMPLE DROPDOWN LINK -->
            </div>
            <!-- /SIMPLE DROPDOWN -->
        </div>
        <!-- /POST SETTINGS WRAP -->
    </div>
    <!-- /WIDGET BOX SETTINGS -->

    <!-- WIDGET BOX TITLE -->
    <p class="widget-box-title">{{$date->format('F Y')}}</p>
    <!-- /WIDGET BOX TITLE -->

    <!-- WIDGET BOX CONTENT -->
    <div class="widget-box-content">
        <!-- CALENDAR -->

        {!!$calendar!!}
        <!-- /CALENDAR -->

        @php
        $todayEvents = $user->getDayEvents($date);
        @endphp

        <!-- CALENDAR EVENTS PREVIEW -->
        <div class="calendar-events-preview small">
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
    <!-- /WIDGET BOX CONTENT -->
</div>
<!-- /WIDGET BOX -->
