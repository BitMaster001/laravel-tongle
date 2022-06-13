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


<!-- GRID -->
<div class="grid grid-3-9">
    <!-- GRID COLUMN -->
    <div class="grid-column">
        <!-- STREAMER BOX -->
        <div class="streamer-box">
            <!-- STREAMER BOX COVER -->
            <figure class="streamer-box-cover liquid">
                <img src="/assets/img/cover/53.png" alt="cover-53">
            </figure>
            <!-- /STREAMER BOX COVER -->

            <!-- STREAMER BOX INFO -->
            <div class="streamer-box-info">
                <!-- STREAMER BOX IMAGE -->
                <div class="streamer-box-image">
                    <!-- PICTURE -->
                    <figure class="picture medium circle liquid">
                        <img src="/assets/img/avatar/01-social.png" alt="avatar-01-social">
                    </figure>
                    <!-- /PICTURE -->
                </div>
                <!-- /STREAMER BOX IMAGE -->

                <!-- STREAMER BOX TITLE -->
                <p class="streamer-box-title">GameHuntress</p>
                <!-- /STREAMER BOX TITLE -->

                <!-- STREAMER BOX STATUS -->
                <p class="streamer-box-status">Offline</p>
                <!-- /STREAMER BOX STATUS -->

                <!-- USER STATS -->
                <div class="user-stats">
                    <!-- USER STAT -->
                    <div class="user-stat">
                        <!-- USER STAT TITLE -->
                        <p class="user-stat-title">149.4k</p>
                        <!-- /USER STAT TITLE -->

                        <!-- USER STAT TEXT -->
                        <p class="user-stat-text">followers</p>
                        <!-- /USER STAT TEXT -->
                    </div>
                    <!-- /USER STAT -->

                    <!-- USER STAT -->
                    <div class="user-stat">
                        <!-- USER STAT TITLE -->
                        <p class="user-stat-title">136.2k</p>
                        <!-- /USER STAT TITLE -->

                        <!-- USER STAT TEXT -->
                        <p class="user-stat-text">following</p>
                        <!-- /USER STAT TEXT -->
                    </div>
                    <!-- /USER STAT -->
                </div>
                <!-- /USER STATS -->

                <!-- BUTTON -->
                <a class="button small twitch" href="https://www.twitch.tv/" target="_blank">Subscribe to my Channel!</a>
                <!-- /BUTTON -->
            </div>
            <!-- /STREAMER BOX INFO -->
        </div>
        <!-- /STREAMER BOX -->

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
                        <p class="simple-dropdown-link">Widget Settings</p>
                        <!-- /SIMPLE DROPDOWN LINK -->
                    </div>
                    <!-- /SIMPLE DROPDOWN -->
                </div>
                <!-- /POST SETTINGS WRAP -->
            </div>
            <!-- /WIDGET BOX SETTINGS -->

            <!-- WIDGET BOX TITLE -->
            <p class="widget-box-title">FAQs</p>
            <!-- /WIDGET BOX TITLE -->

            <!-- WIDGET BOX CONTENT -->
            <div class="widget-box-content">
                <!-- SIMPLE ACCORDION LIST -->
                <div class="simple-accordion-list">
                    <!-- SIMPLE ACCORDION -->
                    <div class="simple-accordion">
                        <!-- SIMPLE ACCORDION HEADER -->
                        <div class="simple-accordion-header accordion-trigger">
                            <!-- SIMPLE ACCORDION TITLE -->
                            <p class="simple-accordion-title">Do I only play new games?</p>
                            <!-- /SIMPLE ACCORDION TITLE -->

                            <!-- SIMPLE ACCORDION ICON -->
                            <div class="simple-accordion-icon">
                                <!-- ICON PLUS SMALL -->
                                <svg class="icon-plus-small">
                                    <use xlink:href="#svg-plus-small"></use>
                                </svg>
                                <!-- /ICON PLUS SMALL -->

                                <!-- ICON MINUS SMALL -->
                                <svg class="icon-minus-small">
                                    <use xlink:href="#svg-minus-small"></use>
                                </svg>
                                <!-- /ICON MINUS SMALL -->
                            </div>
                            <!-- /SIMPLE ACCORDION ICON -->

                            <!-- SIMPLE ACCORDION CONTENT -->
                            <div class="simple-accordion-content accordion-content accordion-open">
                                <!-- SIMPLE ACCORDION TEXT -->
                                <p class="simple-accordion-text">Yes! Join me on my channel's chatbox every saturday and I'll be taking game requests for upcoming streams.</p>
                                <!-- /SIMPLE ACCORDION TEXT -->
                            </div>
                            <!-- /SIMPLE ACCORDION CONTENT -->
                        </div>
                        <!-- /SIMPLE ACCORDION HEADER -->
                    </div>
                    <!-- /SIMPLE ACCORDION -->

                    <!-- SIMPLE ACCORDION -->
                    <div class="simple-accordion">
                        <!-- SIMPLE ACCORDION HEADER -->
                        <div class="simple-accordion-header accordion-trigger">
                            <!-- SIMPLE ACCORDION TITLE -->
                            <p class="simple-accordion-title">Do I take stream requests?</p>
                            <!-- /SIMPLE ACCORDION TITLE -->

                            <!-- SIMPLE ACCORDION ICON -->
                            <div class="simple-accordion-icon">
                                <!-- ICON PLUS SMALL -->
                                <svg class="icon-plus-small">
                                    <use xlink:href="#svg-plus-small"></use>
                                </svg>
                                <!-- /ICON PLUS SMALL -->

                                <!-- ICON MINUS SMALL -->
                                <svg class="icon-minus-small">
                                    <use xlink:href="#svg-minus-small"></use>
                                </svg>
                                <!-- /ICON MINUS SMALL -->
                            </div>
                            <!-- /SIMPLE ACCORDION ICON -->

                            <!-- SIMPLE ACCORDION CONTENT -->
                            <div class="simple-accordion-content accordion-content">
                                <!-- SIMPLE ACCORDION TEXT -->
                                <p class="simple-accordion-text">Yes! Join me on my channel's chatbox every saturday and I'll be taking game requests for upcoming streams.</p>
                                <!-- /SIMPLE ACCORDION TEXT -->
                            </div>
                            <!-- /SIMPLE ACCORDION CONTENT -->
                        </div>
                        <!-- /SIMPLE ACCORDION HEADER -->
                    </div>
                    <!-- /SIMPLE ACCORDION -->

                    <!-- SIMPLE ACCORDION -->
                    <div class="simple-accordion">
                        <!-- SIMPLE ACCORDION HEADER -->
                        <div class="simple-accordion-header accordion-trigger">
                            <!-- SIMPLE ACCORDION TITLE -->
                            <p class="simple-accordion-title">Do I have contacts in the gaming world?</p>
                            <!-- /SIMPLE ACCORDION TITLE -->

                            <!-- SIMPLE ACCORDION ICON -->
                            <div class="simple-accordion-icon">
                                <!-- ICON PLUS SMALL -->
                                <svg class="icon-plus-small">
                                    <use xlink:href="#svg-plus-small"></use>
                                </svg>
                                <!-- /ICON PLUS SMALL -->

                                <!-- ICON MINUS SMALL -->
                                <svg class="icon-minus-small">
                                    <use xlink:href="#svg-minus-small"></use>
                                </svg>
                                <!-- /ICON MINUS SMALL -->
                            </div>
                            <!-- /SIMPLE ACCORDION ICON -->

                            <!-- SIMPLE ACCORDION CONTENT -->
                            <div class="simple-accordion-content accordion-content">
                                <!-- SIMPLE ACCORDION TEXT -->
                                <p class="simple-accordion-text">Yes! Join me on my channel's chatbox every saturday and I'll be taking game requests for upcoming streams.</p>
                                <!-- /SIMPLE ACCORDION TEXT -->
                            </div>
                            <!-- /SIMPLE ACCORDION CONTENT -->
                        </div>
                        <!-- /SIMPLE ACCORDION HEADER -->
                    </div>
                    <!-- /SIMPLE ACCORDION -->

                    <!-- SIMPLE ACCORDION -->
                    <div class="simple-accordion">
                        <!-- SIMPLE ACCORDION HEADER -->
                        <div class="simple-accordion-header accordion-trigger">
                            <!-- SIMPLE ACCORDION TITLE -->
                            <p class="simple-accordion-title">What about speedruns?</p>
                            <!-- /SIMPLE ACCORDION TITLE -->

                            <!-- SIMPLE ACCORDION ICON -->
                            <div class="simple-accordion-icon">
                                <!-- ICON PLUS SMALL -->
                                <svg class="icon-plus-small">
                                    <use xlink:href="#svg-plus-small"></use>
                                </svg>
                                <!-- /ICON PLUS SMALL -->

                                <!-- ICON MINUS SMALL -->
                                <svg class="icon-minus-small">
                                    <use xlink:href="#svg-minus-small"></use>
                                </svg>
                                <!-- /ICON MINUS SMALL -->
                            </div>
                            <!-- /SIMPLE ACCORDION ICON -->

                            <!-- SIMPLE ACCORDION CONTENT -->
                            <div class="simple-accordion-content accordion-content">
                                <!-- SIMPLE ACCORDION TEXT -->
                                <p class="simple-accordion-text">Yes! Join me on my channel's chatbox every saturday and I'll be taking game requests for upcoming streams.</p>
                                <!-- /SIMPLE ACCORDION TEXT -->
                            </div>
                            <!-- /SIMPLE ACCORDION CONTENT -->
                        </div>
                        <!-- /SIMPLE ACCORDION HEADER -->
                    </div>
                    <!-- /SIMPLE ACCORDION -->

                    <!-- SIMPLE ACCORDION -->
                    <div class="simple-accordion">
                        <!-- SIMPLE ACCORDION HEADER -->
                        <div class="simple-accordion-header accordion-trigger">
                            <!-- SIMPLE ACCORDION TITLE -->
                            <p class="simple-accordion-title">What's my donations policy?</p>
                            <!-- /SIMPLE ACCORDION TITLE -->

                            <!-- SIMPLE ACCORDION ICON -->
                            <div class="simple-accordion-icon">
                                <!-- ICON PLUS SMALL -->
                                <svg class="icon-plus-small">
                                    <use xlink:href="#svg-plus-small"></use>
                                </svg>
                                <!-- /ICON PLUS SMALL -->

                                <!-- ICON MINUS SMALL -->
                                <svg class="icon-minus-small">
                                    <use xlink:href="#svg-minus-small"></use>
                                </svg>
                                <!-- /ICON MINUS SMALL -->
                            </div>
                            <!-- /SIMPLE ACCORDION ICON -->

                            <!-- SIMPLE ACCORDION CONTENT -->
                            <div class="simple-accordion-content accordion-content">
                                <!-- SIMPLE ACCORDION TEXT -->
                                <p class="simple-accordion-text">Yes! Join me on my channel's chatbox every saturday and I'll be taking game requests for upcoming streams.</p>
                                <!-- /SIMPLE ACCORDION TEXT -->
                            </div>
                            <!-- /SIMPLE ACCORDION CONTENT -->
                        </div>
                        <!-- /SIMPLE ACCORDION HEADER -->
                    </div>
                    <!-- /SIMPLE ACCORDION -->
                </div>
                <!-- SIMPLE ACCORDION LIST -->
            </div>
            <!-- /WIDGET BOX CONTENT -->
        </div>
        <!-- /WIDGET BOX -->
    </div>
    <!-- /GRID COLUMN -->

    <!-- GRID COLUMN -->
    <div class="grid-column">
        <!-- STREAM BOX -->
        <div class="stream-box big">
            <!-- STREAM BOX VIDEO -->
            <div class="iframe-wrap">
                <!--<iframe src="https://player.twitch.tv/?channel=cohhcarnage" allowfullscreen></iframe>-->
                <div class="iframe-wrap-video">
                <video id="stream-video" width="100%"></video>
                </div>
                <div class="iframe-wrap-video">
                    <video id="stream-video-peer" width="100%"></video>
                </div>
            </div>
            <!-- /STREAM BOX VIDEO -->
            @if(false)
            <!-- STREAM BOX INFO -->
            <div class="stream-box-info">
                <!-- STREAM BOX GAME IMAGE -->
                <a href="https://www.twitch.tv/" target="_blank">
                    <figure class="stream-box-game-image liquid">
                        <img src="/assets/img/cover/15.jpg" alt="cover-15">
                    </figure>
                </a>
                <!-- /STREAM BOX GAME IMAGE -->

                <!-- STREAM BOX TITLE -->
                <p class="stream-box-title">I'm Playing Athena's Goddess Story - Join me to see all the 12 Goddess' Powers</p>
                <!-- /STREAM BOX TITLE -->

                <!-- STREAM BOX CATEGORY -->
                <p class="stream-box-category">Category: <a href="https://www.twitch.tv/" target="_blank">Zodiac Goddess</a></p>
                <!-- /STREAM BOX CATEGORY -->

                <!-- STREAM BOX VIEWS -->
                <p class="stream-box-views">13.6235 Total Views</p>
                <!-- /STREAM BOX VIEWS -->
            </div>
            <!-- /STREAM BOX INFO -->
            @endif

            <!-- STREAM BOX INFO -->
            <div class="stream-box-info" style="text-align: end;">
                <p class="button small twitch" id="stream-go-live" target="_blank"><span style="padding: 10px;">Go Live</span></p>
                <p class="button small tertiary" id="stream-end-live" target="_blank" style="display: none;"><span style="padding: 10px;">End Live</span></p>
            </div>
            <!-- /STREAM BOX INFO -->
        </div>
        <!-- /STREAM BOX -->

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
                        <p class="simple-dropdown-link">Widget Settings</p>
                        <!-- /SIMPLE DROPDOWN LINK -->
                    </div>
                    <!-- /SIMPLE DROPDOWN -->
                </div>
                <!-- /POST SETTINGS WRAP -->
            </div>
            <!-- /WIDGET BOX SETTINGS -->

            <!-- WIDGET BOX TITLE -->
            <p class="widget-box-title">Schedule</p>
            <!-- /WIDGET BOX TITLE -->

            <!-- WIDGET BOX CONTENT -->
            <div class="widget-box-content">
                <!-- WIDGET BOX TEXT -->
                <p class="widget-box-text">My main stream is Saturday at 9PM but I also make "Let's Play" streams on weekdays. In addition I make special morning streams at 10AM all 1st's, 15th's and 30th's of every month with the lastest gaming news. All times are EDT Eastern Daylight Time</p>
                <!-- /WIDGET BOX TEXT -->

                <!-- WEEK BOX -->
                <div class="week-box">
                    <!-- WEEK BOX ITEM -->
                    <div class="week-box-item">
                        <!-- WEEK BOX ITEM TITLE -->
                        <p class="week-box-item-title">10PM</p>
                        <!-- /WEEK BOX ITEM TITLE -->

                        <!-- WEEK BOX ITEM TEXT -->
                        <p class="week-box-item-text">Mondays</p>
                        <!-- /WEEK BOX ITEM TEXT -->
                    </div>
                    <!-- /WEEK BOX ITEM -->

                    <!-- WEEK BOX ITEM -->
                    <div class="week-box-item">
                        <!-- WEEK BOX ITEM TITLE -->
                        <p class="week-box-item-title">-</p>
                        <!-- /WEEK BOX ITEM TITLE -->

                        <!-- WEEK BOX ITEM TEXT -->
                        <p class="week-box-item-text">Tuesdays</p>
                        <!-- /WEEK BOX ITEM TEXT -->
                    </div>
                    <!-- /WEEK BOX ITEM -->

                    <!-- WEEK BOX ITEM -->
                    <div class="week-box-item">
                        <!-- WEEK BOX ITEM TITLE -->
                        <p class="week-box-item-title">9PM</p>
                        <!-- /WEEK BOX ITEM TITLE -->

                        <!-- WEEK BOX ITEM TEXT -->
                        <p class="week-box-item-text">Wednesdays</p>
                        <!-- /WEEK BOX ITEM TEXT -->
                    </div>
                    <!-- /WEEK BOX ITEM -->

                    <!-- WEEK BOX ITEM -->
                    <div class="week-box-item">
                        <!-- WEEK BOX ITEM TITLE -->
                        <p class="week-box-item-title">10PM</p>
                        <!-- /WEEK BOX ITEM TITLE -->

                        <!-- WEEK BOX ITEM TEXT -->
                        <p class="week-box-item-text">Thursdays</p>
                        <!-- /WEEK BOX ITEM TEXT -->
                    </div>
                    <!-- /WEEK BOX ITEM -->

                    <!-- WEEK BOX ITEM -->
                    <div class="week-box-item active">
                        <!-- WEEK BOX ITEM TITLE -->
                        <p class="week-box-item-title">9PM</p>
                        <!-- /WEEK BOX ITEM TITLE -->

                        <!-- WEEK BOX ITEM TEXT -->
                        <p class="week-box-item-text">Fridays</p>
                        <!-- /WEEK BOX ITEM TEXT -->
                    </div>
                    <!-- /WEEK BOX ITEM -->

                    <!-- WEEK BOX ITEM -->
                    <div class="week-box-item">
                        <!-- WEEK BOX ITEM TITLE -->
                        <p class="week-box-item-title">9PM</p>
                        <!-- /WEEK BOX ITEM TITLE -->

                        <!-- WEEK BOX ITEM TEXT -->
                        <p class="week-box-item-text">Saturdays</p>
                        <!-- /WEEK BOX ITEM TEXT -->
                    </div>
                    <!-- /WEEK BOX ITEM -->

                    <!-- WEEK BOX ITEM -->
                    <div class="week-box-item">
                        <!-- WEEK BOX ITEM TITLE -->
                        <p class="week-box-item-title">-</p>
                        <!-- /WEEK BOX ITEM TITLE -->

                        <!-- WEEK BOX ITEM TEXT -->
                        <p class="week-box-item-text">Sundays</p>
                        <!-- /WEEK BOX ITEM TEXT -->
                    </div>
                    <!-- /WEEK BOX ITEM -->
                </div>
                <!-- /WEEK BOX -->
            </div>
            <!-- /WIDGET BOX CONTENT -->
        </div>
        <!-- /WIDGET BOX -->
    </div>
    <!-- /GRID COLUMN -->
</div>
<!-- /GRID -->
@endsection

@section('stylesheets')
@endsection

@section('scripts')
<script>
    window.user = {
        id: {{Auth::user()->id}},
    name: "{{Auth::user()->full_name}}",
    };
    window.csrfToken = "{{csrf_token()}}";
</script>
<script src="/js/app.js"></script>
<!-- shares js -->
<script src="/assets/js/widgets/stream/stream.js"></script>
@endsection
