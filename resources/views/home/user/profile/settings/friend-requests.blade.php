@extends('layouts.app')

@section('title')
Friend Requests
@endsection

@section('content')
<form class="form" method="post" action="{{route('settingsChangePasswordPost')}}">
    @csrf
    <!-- SECTION BANNER -->
    @include('home.user.profile.settings.partial.banner')
    <!-- /SECTION BANNER -->
    @php
    $pendingFriends = Auth::user()->getPendingFriends();
    $requestingFriends = Auth::user()->getRequestingFriends();
    $blockedFriends = Auth::user()->getBlockedFriends();
    @endphp

    <!-- GRID -->
    <div class="grid grid-3-9 medium-space">
        <!-- GRID COLUMN -->
        @include('home.user.profile.settings.partial.sidebar')
        <!-- /GRID COLUMN -->

        <!-- GRID COLUMN -->
        <div class="account-hub-content">
            <!-- SECTION HEADER -->
            <div class="section-header">
                <!-- SECTION HEADER INFO -->
                <div class="section-header-info">
                    <!-- SECTION PRETITLE -->
                    <p class="section-pretitle">My Profile</p>
                    <!-- /SECTION PRETITLE -->

                    <!-- SECTION TITLE -->
                    <h2 class="section-title">Friend Requests <span class="highlighted">{{count($pendingFriends)}}</span></h2>
                    <!-- /SECTION TITLE -->
                </div>
                <!-- /SECTION HEADER INFO -->

                <!-- SECTION HEADER ACTIONS -->
                <div class="section-header-actions">
                    <!-- SECTION HEADER ACTION -->
                    <a href="{{route('userFriendsGet')}}" class="section-header-action">Find Friends</a>
                    <!-- /SECTION HEADER ACTION -->

                    <!-- SECTION HEADER ACTION -->
                    <a href="{{route('settingsGeneralSettingsGet')}}" class="section-header-action">General Settings</a>
                    <!-- /SECTION HEADER ACTION -->
                </div>
                <!-- /SECTION HEADER ACTIONS -->
            </div>
            <!-- /SECTION HEADER -->

            <!-- NOTIFICATION BOX LIST -->
            <div class="notification-box-list">
            @if(count($pendingFriends) > 0)
            @foreach($pendingFriends as $pendingFriend)
                <!-- NOTIFICATION BOX -->
                <div class="notification-box">
                    <!-- USER STATUS -->
                    <div class="user-status request">
                        <!-- USER STATUS AVATAR -->
                        <a class="user-status-avatar" href="{{route('userPublicProfileGet', ['user' => $pendingFriend->username])}}">
                            <!-- USER AVATAR -->
                            <div class="user-avatar small no-outline">
                                <!-- USER AVATAR CONTENT -->
                                <div class="user-avatar-content">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-image-30-32" data-src="{{$pendingFriend->avatar}}"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR CONTENT -->

                                <!-- USER AVATAR PROGRESS -->
                                <div class="user-avatar-progress">
                                    <!-- HEXAGON -->
                                    @if($pendingFriend->gender == "Male")
                                    <div class="hexagon-progress-40-44-male"></div>
                                    @elseif($pendingFriend->gender == "Female")
                                    <div class="hexagon-progress-40-44-female"></div>
                                    @elseif($pendingFriend->gender == "Other")
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
                        <p class="user-status-title"><a class="bold" href="{{route('userPublicProfileGet', ['user' => $pendingFriend->username])}}">{{$pendingFriend->full_name}}</a></p>
                        <!-- /USER STATUS TITLE -->

                        <!-- USER STATUS TEXT -->
                        <p class="user-status-text small-space">{{'@'.$pendingFriend->username}}</p>
                        <!-- /USER STATUS TEXT -->

                        <!-- ACTION REQUEST LIST -->
                        <div class="action-request-list">
                            <!-- ACTION REQUEST -->
                            <a href="{{route('userFriendshipAcceptGet', ['user' => $pendingFriend->username])}}" class="action-request accept with-text">
                                <!-- ACTION REQUEST ICON -->
                                <svg class="action-request-icon icon-add-friend">
                                    <use xlink:href="#svg-add-friend"></use>
                                </svg>
                                <!-- /ACTION REQUEST ICON -->

                                <!-- ACTION REQUEST TEXT -->
                                <span class="action-request-text">Add Friend</span>
                                <!-- /ACTION REQUEST TEXT -->
                            </a>
                            <!-- /ACTION REQUEST -->

                            <!-- ACTION REQUEST -->
                            <a href="{{route('userFriendshipDeniedGet', ['user' => $pendingFriend->username])}}">
                            <div class="action-request decline">
                                <!-- ACTION REQUEST ICON -->
                                <svg class="action-request-icon icon-remove-friend">
                                    <use xlink:href="#svg-remove-friend"></use>
                                </svg>
                                <!-- /ACTION REQUEST ICON -->
                            </div>
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
            <p>No Friend requests.</p>
            @endif
            </div>
            <!-- /NOTIFICATION BOX LIST -->

            @if(count($requestingFriends) > 0)
            <!-- SECTION HEADER -->
            <div class="section-header-second">
                <!-- SECTION HEADER INFO -->
                <div class="section-header-info">
                    <!-- SECTION TITLE -->
                    <h2 class="section-title">Pending Requests <span class="highlighted">{{count($requestingFriends)}}</span></h2>
                    <!-- /SECTION TITLE -->
                </div>
                <!-- /SECTION HEADER INFO -->
            </div>
            <!-- /SECTION HEADER -->
            <!-- NOTIFICATION BOX LIST -->
            <div class="notification-box-list">
            @foreach($requestingFriends as $requestingFriend)
                <!-- NOTIFICATION BOX -->
                <div class="notification-box">
                    <!-- USER STATUS -->
                    <div class="user-status request">
                        <!-- USER STATUS AVATAR -->
                        <a class="user-status-avatar" href="{{route('userPublicProfileGet', ['user' => $requestingFriend->username])}}">
                            <!-- USER AVATAR -->
                            <div class="user-avatar small no-outline">
                                <!-- USER AVATAR CONTENT -->
                                <div class="user-avatar-content">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-image-30-32" data-src="{{$requestingFriend->avatar}}"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR CONTENT -->

                                <!-- USER AVATAR PROGRESS -->
                                <div class="user-avatar-progress">
                                    <!-- HEXAGON -->
                                    @if($requestingFriend->gender == "Male")
                                    <div class="hexagon-progress-40-44-male"></div>
                                    @elseif($requestingFriend->gender == "Female")
                                    <div class="hexagon-progress-40-44-female"></div>
                                    @elseif($requestingFriend->gender == "Other")
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
                        <p class="user-status-title"><a class="bold" href="{{route('userPublicProfileGet', ['user' => $requestingFriend->username])}}">{{$requestingFriend->full_name}}</a></p>
                        <!-- /USER STATUS TITLE -->

                        <!-- USER STATUS TEXT -->
                        <p class="user-status-text small-space">{{'@'.$requestingFriend->username}}</p>
                        <!-- /USER STATUS TEXT -->

                        <!-- ACTION REQUEST LIST -->
                        <div class="action-request-list">
                            <!-- ACTION REQUEST -->
                            <a href="{{route('userFriendshipCancelGet', ['user' => $requestingFriend->username])}}" class="action-request decline with-text">
                                <!-- ACTION REQUEST ICON -->
                                <svg class="action-request-icon icon-remove-friend">
                                    <use xlink:href="#svg-remove-friend"></use>
                                </svg>
                                <!-- /ACTION REQUEST ICON -->

                                <!-- ACTION REQUEST TEXT -->
                                <span class="action-request-text">Cancel Request</span>
                                <!-- /ACTION REQUEST TEXT -->
                            </a>
                            <!-- /ACTION REQUEST -->
                            @if(false)
                            <!-- ACTION REQUEST -->
                            <a href="{{route('userFriendshipDeniedGet', ['user' => $requestingFriend->username])}}">
                                <div class="action-request decline">
                                    <!-- ACTION REQUEST ICON -->
                                    <svg class="action-request-icon icon-remove-friend">
                                        <use xlink:href="#svg-remove-friend"></use>
                                    </svg>
                                    <!-- /ACTION REQUEST ICON -->
                                </div>
                            </a>
                            <!-- /ACTION REQUEST -->
                            @endif
                        </div>
                        <!-- ACTION REQUEST LIST -->
                    </div>
                    <!-- /USER STATUS -->
                </div>
                <!-- /NOTIFICATION BOX -->
            @endforeach
            </div>
            <!-- /NOTIFICATION BOX LIST -->
            @endif

            @if(count($blockedFriends) > 0)
            <!-- SECTION HEADER -->
            <div class="section-header-second">
                <!-- SECTION HEADER INFO -->
                <div class="section-header-info">
                    <!-- SECTION TITLE -->
                    <h2 class="section-title">Friends Blocked <span class="highlighted">{{count($blockedFriends)}}</span></h2>
                    <!-- /SECTION TITLE -->
                </div>
                <!-- /SECTION HEADER INFO -->
            </div>
            <!-- /SECTION HEADER -->
            <!-- NOTIFICATION BOX LIST -->
            <div class="notification-box-list">
            @foreach($blockedFriends as $blockedFriend)
                <!-- NOTIFICATION BOX -->
                <div class="notification-box">
                    <!-- USER STATUS -->
                    <div class="user-status request">
                        <!-- USER STATUS AVATAR -->
                        <a class="user-status-avatar" href="{{route('userPublicProfileGet', ['user' => $blockedFriend->username])}}">
                            <!-- USER AVATAR -->
                            <div class="user-avatar small no-outline">
                                <!-- USER AVATAR CONTENT -->
                                <div class="user-avatar-content">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-image-30-32" data-src="{{$blockedFriend->avatar}}"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR CONTENT -->

                                <!-- USER AVATAR PROGRESS -->
                                <div class="user-avatar-progress">
                                    <!-- HEXAGON -->
                                    @if($blockedFriend->gender == "Male")
                                    <div class="hexagon-progress-40-44-male"></div>
                                    @elseif($blockedFriend->gender == "Female")
                                    <div class="hexagon-progress-40-44-female"></div>
                                    @elseif($blockedFriend->gender == "Other")
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
                        <p class="user-status-title"><a class="bold" href="{{route('userPublicProfileGet', ['user' => $blockedFriend->username])}}">{{$blockedFriend->full_name}}</a></p>
                        <!-- /USER STATUS TITLE -->

                        <!-- USER STATUS TEXT -->
                        <p class="user-status-text small-space">{{'@'.$blockedFriend->username}}</p>
                        <!-- /USER STATUS TEXT -->

                        <!-- ACTION REQUEST LIST -->
                        <div class="action-request-list">
                            <!-- ACTION REQUEST -->
                            <a href="{{route('userFriendshipUnblockGet', ['user' => $blockedFriend->username])}}" class="action-request accept with-text">
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
                            @if(false)
                            <!-- ACTION REQUEST -->
                            <a href="{{route('userFriendshipDeniedGet', ['user' => $blockedFriend->username])}}">
                                <div class="action-request decline">
                                    <!-- ACTION REQUEST ICON -->
                                    <svg class="action-request-icon icon-remove-friend">
                                        <use xlink:href="#svg-remove-friend"></use>
                                    </svg>
                                    <!-- /ACTION REQUEST ICON -->
                                </div>
                            </a>
                            <!-- /ACTION REQUEST -->
                            @endif
                        </div>
                        <!-- ACTION REQUEST LIST -->
                    </div>
                    <!-- /USER STATUS -->
                </div>
                <!-- /NOTIFICATION BOX -->
            @endforeach
            </div>
            <!-- /NOTIFICATION BOX LIST -->
            @endif
        </div>
        <!-- /GRID COLUMN -->
    </div>
    <!-- /GRID -->
</form>
@endsection

@section('stylesheets')
@endsection

@section('scripts')
<!-- global.accordions -->
<script src="/assets/js/global/global.accordions.js"></script>
@endsection

