@php
$pendingFriends = Auth::user()->getPendingFriends();
@endphp
<div class="action-list-item-wrap">
    <!-- ACTION LIST ITEM -->
    <div class="action-list-item header-dropdown-trigger {{count($pendingFriends) > 0 ? 'unread' : ''}}">
        <!-- ACTION LIST ITEM ICON -->
        <svg class="action-list-item-icon icon-friend">
            <use xlink:href="#svg-friend"></use>
        </svg>
        <!-- /ACTION LIST ITEM ICON -->
    </div>
    <!-- /ACTION LIST ITEM -->

    <!-- DROPDOWN BOX -->
    <div class="dropdown-box header-dropdown">
        <!-- DROPDOWN BOX HEADER -->
        <div class="dropdown-box-header">
            <!-- DROPDOWN BOX HEADER TITLE -->
            <p class="dropdown-box-header-title">Friend Requests</p>
            <!-- /DROPDOWN BOX HEADER TITLE -->

            <!-- DROPDOWN BOX HEADER ACTIONS -->
            <div class="dropdown-box-header-actions">
                <!-- DROPDOWN BOX HEADER ACTION -->
                <a href="{{route('userFriendsGet')}}" class="dropdown-box-header-action">Find Friends</a>
                <!-- /DROPDOWN BOX HEADER ACTION -->

                <!-- DROPDOWN BOX HEADER ACTION -->
                <a href="{{route('settingsGeneralSettingsGet')}}" class="dropdown-box-header-action">Settings</a>
                <!-- /DROPDOWN BOX HEADER ACTION -->
            </div>
            <!-- /DROPDOWN BOX HEADER ACTIONS -->
        </div>
        <!-- /DROPDOWN BOX HEADER -->

        <!-- DROPDOWN BOX LIST -->
        <div class="dropdown-box-list no-hover" data-simplebar>
            <!-- DROPDOWN BOX LIST ITEM -->
            <div class="dropdown-box-list-item">
                @if(count($pendingFriends) > 0)
                @foreach($pendingFriends as $pendingFriend)
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
                        <a href="{{route('userFriendshipAcceptGet', ['user' => $pendingFriend->username])}}" class="action-request accept">
                            <!-- ACTION REQUEST ICON -->
                            <svg class="action-request-icon icon-add-friend">
                                <use xlink:href="#svg-add-friend"></use>
                            </svg>
                            <!-- /ACTION REQUEST ICON -->
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
                @endforeach
                @else
                <p>No Friend requests.</p>
                @endif
            </div>
            <!-- /DROPDOWN BOX LIST ITEM -->

        </div>
        <!-- /DROPDOWN BOX LIST -->

        <!-- DROPDOWN BOX BUTTON -->
        <a class="dropdown-box-button secondary" href="{{route('settingsFriendRequestsGet')}}">View all Requests</a>
        <!-- /DROPDOWN BOX BUTTON -->
    </div>
    <!-- /DROPDOWN BOX -->
</div>
