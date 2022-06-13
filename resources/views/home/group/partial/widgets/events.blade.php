@php
$upcomingEvents = $group->getGroupsUpcomingEvent(5);
$pastEvents = $group->getGroupsPastEvent(5);
@endphp

<!-- WIDGET BOX -->
<div class="widget-box">
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
    <p class="widget-box-title">Events</p>
    <!-- /WIDGET BOX TITLE -->

    <!-- WIDGET BOX CONTENT -->
    <div class="widget-box-content">
        <!-- FILTERS -->
        <div class="filters">
            <!-- FILTER -->
            <p class="filter active" onclick="changeGroupsTab(this, 'tab-option-events-1')">Upcoming</p>
            <!-- /FILTER -->

            <!-- FILTER -->
            <p class="filter" onclick="changeGroupsTab(this, 'tab-option-events-2')">Past</p>
            <!-- /FILTER -->
        </div>
        <!-- /FILTERS -->

        <!-- TAB BOX -->
        <div class="tab-box">
            <!-- TAB BOX OPTIONS -->
            <div class="tab-box-options" hidden>
                <!-- TAB BOX OPTION -->
                <div class="tab-box-option-events" id="tab-option-events-1">
                </div>
                <!-- /TAB BOX OPTION -->

                <!-- TAB BOX OPTION -->
                <div class="tab-box-option-events" id="tab-option-events-2">
                </div>
                <!-- /TAB BOX OPTION -->
            </div>
            <!-- /TAB BOX OPTIONS -->

            <!-- TAB BOX ITEMS -->
            <div class="tab-box-items">
                <!-- TAB BOX ITEM -->
                <div class="tab-box-item-events">
                    <!-- TAB BOX ITEM CONTENT -->
                    <div class="tab-box-item-content" style="padding: 0;">
                        <br>
                        <!-- USER STATUS LIST -->
                        <div class="user-status-list">
                            @if(count($upcomingEvents)>0)
                            @foreach($upcomingEvents as $event)
                            <!-- USER STATUS -->
                            <div class="user-status request-small">
                                <!-- USER STATUS AVATAR -->
                                <a class="user-status-avatar" href="{{route('getViewEvent', ['event' => $event->key])}}">
                                    <!-- PICTURE -->
                                    <figure class="picture small round liquid">
                                        <img src="{{$event->cover}}">
                                    </figure>
                                    <!-- /PICTURE -->
                                </a>
                                <!-- /USER STATUS AVATAR -->

                                <!-- USER STATUS TITLE -->
                                <p class="user-status-title"><a class="bold" href="{{route('getViewEvent', ['event' => $event->key])}}">{{$event->title}}</a></p>
                                <!-- /USER STATUS TITLE -->

                                <!-- USER STATUS TEXT -->
                                <p class="user-status-text small">{{$event->getEventStartDatePublic()}}</p>
                                <!-- /USER STATUS TEXT -->
                                @if(false)
                                <!-- ACTION REQUEST LIST -->
                                <div class="action-request-list">
                                    <!-- ACTION REQUEST -->
                                    <a href="{{route('getViewEvent', ['event' => $event->key])}}">
                                        <div class="action-request accept">
                                            <!-- ACTION REQUEST ICON -->
                                            <svg class="action-request-icon icon-add-friend">
                                                <use xlink:href="#svg-events"></use>
                                            </svg>
                                            <!-- /ACTION REQUEST ICON -->
                                        </div>
                                    </a>
                                    <!-- /ACTION REQUEST -->
                                </div>
                                <!-- ACTION REQUEST LIST -->
                                @endif
                            </div>
                            <!-- /USER STATUS -->
                            @endforeach
                            @else
                            <p>No Events.</p>
                            @endif
                        </div>
                        <!-- /USER STATUS LIST -->
                    </div>
                    <!-- /TAB BOX ITEM CONTENT -->
                </div>
                <!-- /TAB BOX ITEM -->

                <!-- TAB BOX ITEM -->
                <div class="tab-box-item-events">
                    <!-- TAB BOX ITEM CONTENT -->
                    <div class="tab-box-item-content" style="padding: 0;">
                        <br>
                        <!-- USER STATUS LIST -->
                        <div class="user-status-list">
                            @if(count($pastEvents)>0)
                            @foreach($pastEvents as $event)
                            <!-- USER STATUS -->
                            <div class="user-status request-small">
                                <!-- USER STATUS AVATAR -->
                                <a class="user-status-avatar" href="{{route('getViewEvent', ['event' => $event->key])}}">
                                    <!-- PICTURE -->
                                    <figure class="picture small round liquid">
                                        <img src="{{$event->cover}}">
                                    </figure>
                                    <!-- /PICTURE -->
                                </a>
                                <!-- /USER STATUS AVATAR -->

                                <!-- USER STATUS TITLE -->
                                <p class="user-status-title"><a class="bold" href="{{route('getViewEvent', ['event' => $event->key])}}">{{$event->title}}</a></p>
                                <!-- /USER STATUS TITLE -->

                                <!-- USER STATUS TEXT -->
                                <p class="user-status-text small">{{$event->getEventStartDatePublic()}}</p>
                                <!-- /USER STATUS TEXT -->
                                @if(false)
                                <!-- ACTION REQUEST LIST -->
                                <div class="action-request-list">
                                    <!-- ACTION REQUEST -->
                                    <a href="{{route('getViewEvent', ['event' => $event->key])}}">
                                        <div class="action-request accept">
                                            <!-- ACTION REQUEST ICON -->
                                            <svg class="action-request-icon icon-add-friend">
                                                <use xlink:href="#svg-events"></use>
                                            </svg>
                                            <!-- /ACTION REQUEST ICON -->
                                        </div>
                                    </a>
                                    <!-- /ACTION REQUEST -->
                                </div>
                                <!-- ACTION REQUEST LIST -->
                                @endif
                            </div>
                            <!-- /USER STATUS -->
                            @endforeach
                            @else
                            <p>No Events.</p>
                            @endif
                        </div>
                        <!-- /USER STATUS LIST -->
                    </div>
                    <!-- /TAB BOX ITEM CONTENT -->
                </div>
                <!-- /TAB BOX ITEM -->

            </div>
            <!-- /TAB BOX ITEMS -->
        </div>
        <!-- /TAB BOX -->

    </div>
    <!-- WIDGET BOX CONTENT -->
</div>
<!-- /WIDGET BOX -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        app.plugins.createTab({
            triggers: '.tab-box-option-events',
            elements: '.tab-box-item-events'
        });
    });
    function changeGroupsTab(el, target){
        el.closest('.filters').querySelector('.filter.active').classList.remove('active');
        el.classList.add('active');
        document.getElementById(target).click();
    }
</script>
