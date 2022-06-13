@extends('layouts.app')

@section('title')
Manage Groups
@endsection

@section('content')
<form class="form" method="post" action="{{route('settingsManageGroupsEditPost')}}" enctype="multipart/form-data">
    @csrf
    <!-- SECTION BANNER -->
    @include('home.user.profile.settings.partial.banner')
    <!-- /SECTION BANNER -->

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
                    <p class="section-pretitle">Groups</p>
                    <!-- /SECTION PRETITLE -->

                    <!-- SECTION TITLE -->
                    <h2 class="section-title">Manage Members</h2>
                    <!-- /SECTION TITLE -->
                </div>
                <!-- /SECTION HEADER INFO -->

                <!-- SECTION HEADER ACTIONS -->
                <div class="section-header-actions">
                    <!-- SECTION HEADER ACTION -->
                    <a href="{{route('groupGet', ['group' => $group->username])}}" class="section-header-action">Go to Group</a>
                    <!-- /SECTION HEADER ACTION -->

                    <!-- SECTION HEADER ACTION -->
                    <a href="{{route('settingsManageGroupsManageGet', ['group' => $group->username])}}" class="section-header-action">Manage Group</a>
                    <!-- /SECTION HEADER ACTION -->
                </div>
                <!-- /SECTION HEADER ACTIONS -->
            </div>
            <!-- /SECTION HEADER -->

        @if(count($groupshipsUnapproved) > 0)
        <!-- SECTION HEADER -->
        <div class="section-header-second">
            <!-- SECTION HEADER INFO -->
            <div class="section-header-info">
                <!-- SECTION TITLE -->
                <h2 class="section-title">Pending Approval Requests <span class="highlighted">{{count($groupshipsUnapproved)}}</span></h2>
                <!-- /SECTION TITLE -->
            </div>
            <!-- /SECTION HEADER INFO -->
        </div>
        <!-- /SECTION HEADER -->
        <!-- NOTIFICATION BOX LIST -->
        <div class="notification-box-list">
            @foreach($groupshipsUnapproved as $groupshipUnapproved)
            <!-- NOTIFICATION BOX -->
            <div class="notification-box">
                <!-- USER STATUS -->
                <div class="user-status request">
                    <!-- USER STATUS AVATAR -->
                    <a class="user-status-avatar" href="{{route('userPublicProfileGet', ['user' => $groupshipUnapproved->member->username])}}">
                        <!-- USER AVATAR -->
                        <div class="user-avatar small no-outline">
                            <!-- USER AVATAR CONTENT -->
                            <div class="user-avatar-content">
                                <!-- HEXAGON -->
                                <div class="hexagon-image-30-32" data-src="{{$groupshipUnapproved->member->avatar}}"></div>
                                <!-- /HEXAGON -->
                            </div>
                            <!-- /USER AVATAR CONTENT -->

                            <!-- USER AVATAR PROGRESS -->
                            <div class="user-avatar-progress">
                                <!-- HEXAGON -->
                                @if($groupshipUnapproved->member->gender == "Male")
                                <div class="hexagon-progress-40-44-male"></div>
                                @elseif($groupshipUnapproved->member->gender == "Female")
                                <div class="hexagon-progress-40-44-female"></div>
                                @elseif($groupshipUnapproved->member->gender == "Other")
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
                    <p class="user-status-title"><a class="bold" href="{{route('userPublicProfileGet', ['user' => $groupshipUnapproved->member->username])}}">{{$groupshipUnapproved->member->full_name}}</a></p>
                    <!-- /USER STATUS TITLE -->

                    <!-- USER STATUS TEXT -->
                    <p class="user-status-text small-space">{{'@'.$groupshipUnapproved->member->username}}</p>
                    <!-- /USER STATUS TEXT -->

                    <!-- ACTION REQUEST LIST -->
                    <div class="action-request-list">
                        <!-- ACTION REQUEST -->
                        <a href="{{route('userGroupshipApproveGet', ['groupship' => $groupshipUnapproved->key])}}" class="action-request accept with-text">
                            <!-- ACTION REQUEST ICON -->
                            <svg class="action-request-icon icon-add-friend">
                                <use xlink:href="#svg-add-friend"></use>
                            </svg>
                            <!-- /ACTION REQUEST ICON -->

                            <!-- ACTION REQUEST TEXT -->
                            <span class="action-request-text">Approved</span>
                            <!-- /ACTION REQUEST TEXT -->
                        </a>
                        <!-- /ACTION REQUEST -->
                        <!-- ACTION REQUEST -->
                        <a href="{{route('userGroupshipDeleteGet', ['groupship' => $groupshipUnapproved->key])}}" class="action-request decline with-text">
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

        </div>
        <!-- /NOTIFICATION BOX LIST -->
        @endif

        @if(count($groupshipsBlocked) > 0)
        <!-- SECTION HEADER -->
        <div class="section-header-second">
            <!-- SECTION HEADER INFO -->
            <div class="section-header-info">
                <!-- SECTION TITLE -->
                <h2 class="section-title">Blocked Members <span class="highlighted">{{count($groupshipsBlocked)}}</span></h2>
                <!-- /SECTION TITLE -->
            </div>
            <!-- /SECTION HEADER INFO -->
        </div>
        <!-- /SECTION HEADER -->
        <!-- NOTIFICATION BOX LIST -->
        <div class="notification-box-list">
            @foreach($groupshipsBlocked as $groupshipBlocked)
            <!-- NOTIFICATION BOX -->
            <div class="notification-box">
                <!-- USER STATUS -->
                <div class="user-status request">
                    <!-- USER STATUS AVATAR -->
                    <a class="user-status-avatar" href="{{route('userPublicProfileGet', ['user' => $groupshipBlocked->member->username])}}">
                        <!-- USER AVATAR -->
                        <div class="user-avatar small no-outline">
                            <!-- USER AVATAR CONTENT -->
                            <div class="user-avatar-content">
                                <!-- HEXAGON -->
                                <div class="hexagon-image-30-32" data-src="{{$groupshipBlocked->member->avatar}}"></div>
                                <!-- /HEXAGON -->
                            </div>
                            <!-- /USER AVATAR CONTENT -->

                            <!-- USER AVATAR PROGRESS -->
                            <div class="user-avatar-progress">
                                <!-- HEXAGON -->
                                @if($groupshipBlocked->member->gender == "Male")
                                <div class="hexagon-progress-40-44-male"></div>
                                @elseif($groupshipBlocked->member->gender == "Female")
                                <div class="hexagon-progress-40-44-female"></div>
                                @elseif($groupshipBlocked->member->gender == "Other")
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
                    <p class="user-status-title"><a class="bold" href="{{route('userPublicProfileGet', ['user' => $groupshipBlocked->member->username])}}">{{$groupshipBlocked->member->full_name}}</a></p>
                    <!-- /USER STATUS TITLE -->

                    <!-- USER STATUS TEXT -->
                    <p class="user-status-text small-space">{{'@'.$groupshipBlocked->member->username}}</p>
                    <!-- /USER STATUS TEXT -->

                    <!-- ACTION REQUEST LIST -->
                    <div class="action-request-list">
                        <!-- ACTION REQUEST -->
                        <a href="{{route('userGroupshipUnblockGet', ['groupship' => $groupshipBlocked->key])}}" class="action-request accept with-text">
                            <!-- ACTION REQUEST ICON -->
                            <svg class="action-request-icon icon-remove-friend">
                                <use xlink:href="#svg-add-friend"></use>
                            </svg>
                            <!-- /ACTION REQUEST ICON -->

                            <!-- ACTION REQUEST TEXT -->
                            <span class="action-request-text">Unblock</span>
                            <!-- /ACTION REQUEST TEXT -->
                        </a>
                        <!-- /ACTION REQUEST -->
                        <!-- ACTION REQUEST -->
                        <a href="{{route('userGroupshipDeleteGet', ['groupship' => $groupshipBlocked->key])}}" class="action-request decline with-text">
                            <!-- ACTION REQUEST ICON -->
                            <svg class="action-request-icon icon-add-friend">
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
        </div>
        <!-- /NOTIFICATION BOX LIST -->
        @endif


        <!-- SECTION HEADER -->
        <div class="section-header-second">
            <!-- SECTION HEADER INFO -->
            <div class="section-header-info">
                <!-- SECTION TITLE -->
                <h2 class="section-title">Approved Members <span class="highlighted">{{count($groupshipsApproved)}}</span></h2>
                <!-- /SECTION TITLE -->
            </div>
            <!-- /SECTION HEADER INFO -->
        </div>
        <!-- /SECTION HEADER -->
        @if(count($groupshipsApproved) > 0)
        <!-- NOTIFICATION BOX LIST -->
        <div class="notification-box-list">
            @foreach($groupshipsApproved as $groupshipApproved)
            <!-- NOTIFICATION BOX -->
            <div class="notification-box">
                <!-- USER STATUS -->
                <div class="user-status request">
                    <!-- USER STATUS AVATAR -->
                    <a class="user-status-avatar" href="{{route('userPublicProfileGet', ['user' => $groupshipApproved->member->username])}}">
                        <!-- USER AVATAR -->
                        <div class="user-avatar small no-outline">
                            <!-- USER AVATAR CONTENT -->
                            <div class="user-avatar-content">
                                <!-- HEXAGON -->
                                <div class="hexagon-image-30-32" data-src="{{$groupshipApproved->member->avatar}}"></div>
                                <!-- /HEXAGON -->
                            </div>
                            <!-- /USER AVATAR CONTENT -->

                            <!-- USER AVATAR PROGRESS -->
                            <div class="user-avatar-progress">
                                <!-- HEXAGON -->
                                @if($groupshipApproved->member->gender == "Male")
                                <div class="hexagon-progress-40-44-male"></div>
                                @elseif($groupshipApproved->member->gender == "Female")
                                <div class="hexagon-progress-40-44-female"></div>
                                @elseif($groupshipApproved->member->gender == "Other")
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
                    <p class="user-status-title"><a class="bold" href="{{route('userPublicProfileGet', ['user' => $groupshipApproved->member->username])}}">{{$groupshipApproved->member->full_name}}</a></p>
                    <!-- /USER STATUS TITLE -->

                    <!-- USER STATUS TEXT -->
                    <p class="user-status-text small-space">{{'@'.$groupshipApproved->member->username}}</p>
                    <!-- /USER STATUS TEXT -->

                    <!-- ACTION REQUEST LIST -->
                    <div class="action-request-list">
                        <!-- ACTION REQUEST -->
                        <a href="{{route('userGroupshipBlockGet', ['groupship' => $groupshipApproved->key])}}" class="action-request decline with-text">
                            <!-- ACTION REQUEST ICON -->
                            <svg class="action-request-icon icon-remove-friend">
                                <use xlink:href="#svg-remove-friend"></use>
                            </svg>
                            <!-- /ACTION REQUEST ICON -->

                            <!-- ACTION REQUEST TEXT -->
                            <span class="action-request-text">Block</span>
                            <!-- /ACTION REQUEST TEXT -->
                        </a>
                        <!-- /ACTION REQUEST -->

                        <!-- ACTION REQUEST -->
                        <a href="{{route('userGroupshipDeleteGet', ['groupship' => $groupshipApproved->key])}}" class="action-request decline with-text">
                            <!-- ACTION REQUEST ICON -->
                            <svg class="action-request-icon icon-add-friend">
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
        </div>
        <!-- /NOTIFICATION BOX LIST -->
        @else
        <p>No Members.</p>
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
