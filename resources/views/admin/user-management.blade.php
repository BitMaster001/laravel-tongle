@extends('layouts.app')

@section('title')
User Management
@endsection

@section('content')
<form class="form">
    <!-- SECTION BANNER -->
    <div class="section-banner section-banner-1">
        <!-- SECTION BANNER ICON -->
        <img class="section-banner-icon" src="/assets/img/banner/members-icon.png" alt="accounthub-icon">
        <!-- /SECTION BANNER ICON -->

        <!-- SECTION BANNER TITLE -->
        <p class="section-banner-title">Admin</p>
        <!-- /SECTION BANNER TITLE -->

        <!-- SECTION BANNER TEXT -->
        <p class="section-banner-text">User Managment</p>
        <!-- /SECTION BANNER TEXT -->
    </div>

    <!-- /SECTION BANNER -->

    <!-- GRID -->
    <div class="grid medium-space">

        <!-- GRID COLUMN -->
        <div class="account-hub-content">
            <!-- SECTION FILTERS BAR -->
            <div class="section-filters-bar v1">
                <!-- SECTION FILTERS BAR ACTIONS -->
                <div class="section-filters-bar-actions" style="width: 100%;">
                    <div class="section-filters-bar-title" style="width: 100%;">
                        <!-- SECTION PRETITLE -->
                        <p class="section-pretitle">Admin</p>
                        <!-- /SECTION PRETITLE -->

                        <!-- SECTION TITLE -->
                        <h3 class="section-title">User Management</h3>
                        <!-- /SECTION TITLE -->
                    </div>
                    <div class="section-filters-bar-action" style="width: 50%; display: flex;">
                    <!-- FORM -->
                    <form class="form">
                            <!-- FORM INPUT -->
                            <div class="form-input" style="margin-right: 10px; width: 50%;">
                                <!-- FORM SELECT -->
                                <div class="form-select small">
                                    <label for="items-filter">Filter By</label>
                                    <select id="filter" name="filter">
                                        <option value="0" @if(request()->get('filter') == 0) selected @endif>All</option>
                                        <option value="1" @if(request()->get('filter') == 1) selected @endif>Blocked</option>
                                        <option value="2" @if(request()->get('filter') == 2) selected @endif>Admins</option>
                                    </select>
                                    <!-- FORM SELECT ICON -->
                                    <svg class="form-select-icon icon-small-arrow">
                                        <use xlink:href="#svg-small-arrow"></use>
                                    </svg>
                                    <!-- /FORM SELECT ICON -->
                                </div>
                                <!-- /FORM SELECT -->
                            </div>
                            <!-- /FORM INPUT -->
                        <!-- FORM INPUT -->
                        <div class="form-input small with-button" style="margin-left: auto; width: 50%;">
                            <label for="groups-search">Search Users</label>
                            <input type="text" name="q" value="{{request()->get('q') ?? ''}}">
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
                        <!-- /FORM INPUT -->
                    </form>
                    <!-- /FORM -->
                    </div>
                </div>
                <!-- /SECTION FILTERS BAR ACTIONS -->
            </div>
            <!-- /SECTION FILTERS BAR -->

            <br>
            <!-- NOTIFICATION BOX LIST -->
            <div class="notification-box-list">
                @if(count($users) > 0)
                @foreach($users as $user)
                <!-- NOTIFICATION BOX -->
                <div class="notification-box">
                    <!-- USER STATUS -->
                    <div class="user-status request">
                        <!-- USER STATUS AVATAR -->
                        <a class="user-status-avatar" href="{{route('userPublicProfileGet', ['user' => $user->username])}}" target="_blank">
                            <!-- USER AVATAR -->
                            <div class="user-avatar small no-outline">
                                <!-- USER AVATAR CONTENT -->
                                <div class="user-avatar-content">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-image-30-32" data-src="{{$user->avatar ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR CONTENT -->

                                <!-- USER AVATAR PROGRESS -->
                                <div class="user-avatar-progress">
                                    <!-- HEXAGON -->
                                    @if($user->gender == "Male")
                                    <div class="hexagon-progress-40-44-male"></div>
                                    @elseif($user->gender == "Female")
                                    <div class="hexagon-progress-40-44-female"></div>
                                    @elseif($user->gender == "Other")
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
                        <p class="user-status-title"><a class="bold" href="{{route('userPublicProfileGet', ['user' => $user->username])}}" target="_blank">{{$user->full_name}}</a></p>
                        <!-- /USER STATUS TITLE -->

                        <!-- USER STATUS TEXT -->
                        <p class="user-status-text small-space">{{'@'.$user->username}} <span class="hide-text-mobile">| Joind: {{$user->getJoinedDate()}} | Last seen: {{$user->getSinceSeen()}}</span></p>
                        <!-- /USER STATUS TEXT -->

                        <!-- ACTION REQUEST LIST -->
                        <div class="action-request-list">
                            @if($user->admin)
                            <!-- ACTION REQUEST -->
                            <a href="{{route('getUserManagementRemoveAdmin', ['user' => $user->username])}}" class="action-request decline with-text" onclick="return confirm('Are you sure you want to remove this user from administration?')">
                                <!-- ACTION REQUEST ICON -->
                                <svg class="action-request-icon icon-add-friend">
                                    <use xlink:href="#svg-remove-friend"></use>
                                </svg>
                                <!-- /ACTION REQUEST ICON -->

                                <!-- ACTION REQUEST TEXT -->
                                <span class="action-request-text">Admin</span>
                                <!-- /ACTION REQUEST TEXT -->
                            </a>
                            <!-- /ACTION REQUEST -->
                            @else
                            <!-- ACTION REQUEST -->
                            <a href="{{route('getUserManagementAddAdmin', ['user' => $user->username])}}" class="action-request accept with-text" onclick="return confirm('Are you sure you want to add this user to administration?')">
                                <!-- ACTION REQUEST ICON -->
                                <svg class="action-request-icon icon-add-friend">
                                    <use xlink:href="#svg-add-friend"></use>
                                </svg>
                                <!-- /ACTION REQUEST ICON -->

                                <!-- ACTION REQUEST TEXT -->
                                <span class="action-request-text">Admin</span>
                                <!-- /ACTION REQUEST TEXT -->
                            </a>
                            <!-- /ACTION REQUEST -->
                            @endif

                            @if(!$user->blocked_at)
                            <!-- ACTION REQUEST -->
                            <a href="{{route('getUserManagementBlock', ['user' => $user->username])}}" class="action-request decline with-text" onclick="return confirm('Are you sure you want to block this user?')">

                                    <!-- ACTION REQUEST ICON -->
                                    <svg class="action-request-icon icon-remove-friend">
                                        <use xlink:href="#svg-remove-friend"></use>
                                    </svg>
                                <!-- ACTION REQUEST TEXT -->
                                <span class="action-request-text">Block</span>
                                <!-- /ACTION REQUEST TEXT -->

                            </a>
                            <!-- /ACTION REQUEST -->
                            @else
                            <!-- ACTION REQUEST -->
                            <a href="{{route('getUserManagementUnblock', ['user' => $user->username])}}" class="action-request accept with-text">
                                <!-- ACTION REQUEST ICON -->
                                <svg class="action-request-icon icon-add-friend">
                                    <use xlink:href="#svg-add-friend"></use>
                                </svg>
                                <!-- /ACTION REQUEST ICON -->
                                <!-- ACTION REQUEST TEXT -->
                                <span class="action-request-text">Unblock</span>
                                <!-- /ACTION REQUEST TEXT -->
                            </a>
                            <!-- /ACTION REQUEST -->
                            @endif


                        <!-- ACTION REQUEST -->
                        <a href="{{route('getUserManagementDelete', ['user' => $user->username])}}" class="action-request decline with-text" onclick="return confirm('Are you sure you want to permanently delete this user?')">
                            <!-- ACTION REQUEST ICON -->
                            <svg class="action-request-icon icon-remove-friend">
                                <use xlink:href="#svg-remove-friend"></use>
                            </svg>
                            <!-- /ACTION REQUEST ICON -->

                            <!-- ACTION REQUEST TEXT -->
                            <span class="action-request-text">Delete</span>
                            <!-- /ACTION REQUEST TEXT -->
                        </a>
                        <!-- /ACTION REQUEST -->
                        </div>
                        <!-- ACTION REQUEST LIST -->
                    </div>
                    <!-- /USER STATUS -->
                </div>
                <!-- /NOTIFICATION BOX -->
                @endforeach
                @else
                <p>No Users.</p>
                @endif
            </div>
            <!-- /NOTIFICATION BOX LIST -->

            <!-- SECTION PAGER BAR WRAP -->
            <div class="section-pager-bar-wrap align-right">
                <!-- SECTION PAGER BAR -->
                <div class="section-pager-bar">
                    <!-- SECTION PAGER -->
                    <div class="section-pager" id="user-preview-social-links-slider">
                        @for($index = 1; $index <= $users->lastPage(); $index ++)
                        <!-- SECTION PAGER ITEM -->
                        <a class="section-pager-item @if($index == $users->currentPage()) active @endif" href="@if(request()->get('filter') || request()->get('q')) ?filter={{request()->get('filter')}}&q={{request()->get('q')}}&page={{$index}} @else ?page={{$index}} @endif">
                            <!-- SECTION PAGER ITEM TEXT -->
                            <p class="section-pager-item-text">{{$index}}</p>
                            <!-- /SECTION PAGER ITEM TEXT -->
                        </a>
                        <!-- /SECTION PAGER ITEM -->
                        @endfor

                    </div>
                    <!-- /SECTION PAGER -->

                    <!-- SECTION PAGER CONTROLS -->
                    <div class="section-pager-controls" id="user-preview-social-links-slider-controls">
                        <!-- SLIDER CONTROL -->
                        <!--<a class="slider-control left disabled" href="@if(request()->get('filter') || request()->get('q')) ?filter={{request()->get('filter')}}&q={{request()->get('q')}}&page=1 @else ?page=1 @endif">-->
                        <p class="slider-control left">
                            <!-- SLIDER CONTROL ICON -->
                            <svg class="slider-control-icon icon-small-arrow">
                                <use xlink:href="#svg-small-arrow"></use>
                            </svg>
                            <!-- /SLIDER CONTROL ICON -->
                        </p>
                        <!-- /SLIDER CONTROL -->

                        <!-- SLIDER CONTROL -->
                        <!--<a class="slider-control right" href="@if(request()->get('filter') || request()->get('q')) ?filter={{request()->get('filter')}}&q={{request()->get('q')}}&page={{$users->lastPage()}} @else ?page={{$users->lastPage()}} @endif">-->
                        <p class="slider-control right">
                            <!-- SLIDER CONTROL ICON -->
                            <svg class="slider-control-icon icon-small-arrow">
                                <use xlink:href="#svg-small-arrow"></use>
                            </svg>
                            <!-- /SLIDER CONTROL ICON -->
                        </p>
                        <!-- /SLIDER CONTROL -->
                    </div>
                    <!-- /SECTION PAGER CONTROLS -->
                </div>
                <!-- /SECTION PAGER BAR -->
            </div>
            <!-- /SECTION PAGER BAR WRAP -->

        </div>
        <!-- /GRID COLUMN -->
    </div>
    <!-- /GRID -->
</form>
@endsection

@section('stylesheets')
<style>
    @media screen and (max-width: 960px){
        .section-filters-bar.v1 .section-filters-bar-actions{
            width: 100% !important;
            display: block;
        }
        .section-filters-bar.v1 .section-filters-bar-actions .section-filters-bar-title{
            width: 100% !important;
            margin-bottom: 25px;
        }
        .section-filters-bar.v1 .section-filters-bar-actions .section-filters-bar-action{
            width: 100% !important;
        }
    }
    .section-pager-bar {
        width: 100%;
    }
        #user-preview-social-links-slider > .tns-item {
       padding-right: 0px;
    }
</style>
@endsection

@section('scripts')
<!-- global.accordions -->
<script src="/assets/js/global/global.accordions.js"></script>
<script>

    app.plugins.createSlider({
        container: `#user-preview-social-links-slider`,
        items: 4,
        fixedWidth: 32,
        gutter: 20,
        loop: false,
        nav: false,
        mouseDrag: true,
        controlsContainer: `#user-preview-social-links-slider-controls`
    });

</script>
@endsection

