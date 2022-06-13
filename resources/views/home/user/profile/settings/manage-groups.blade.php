@extends('layouts.app')

@section('title')
Manage Groups
@endsection

@section('content')
<dic class="form" method="post" action="{{route('settingsChangePasswordPost')}}">
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
                        <h2 class="section-title">Manage Groups</h2>
                        <!-- /SECTION TITLE -->
                    </div>
                    <!-- /SECTION HEADER INFO -->
                </div>
                <!-- /SECTION HEADER -->

                <!-- GRID -->
                <div class="grid grid-3-3-3 centered-on-mobile">
                    <!-- CREATE ENTITY BOX -->
                    <div class="create-entity-box">
                        <!-- CREATE ENTITY BOX COVER -->
                        <div class="create-entity-box-cover"></div>
                        <!-- /CREATE ENTITY BOX COVER -->

                        <!-- CREATE ENTITY BOX AVATAR -->
                        <div class="create-entity-box-avatar">
                            <!-- CREATE ENTITY BOX AVATAR ICON -->
                            <svg class="create-entity-box-avatar-icon icon-group">
                                <use xlink:href="#svg-group"></use>
                            </svg>
                            <!-- /CREATE ENTITY BOX AVATAR ICON -->
                        </div>
                        <!-- /CREATE ENTITY BOX AVATAR -->

                        <!-- CREATE ENTITY BOX INFO -->
                        <div class="create-entity-box-info">
                            <!-- CREATE ENTITY BOX TITLE -->
                            <p class="create-entity-box-title">Create New Group</p>
                            <!-- /CREATE ENTITY BOX TITLE -->

                            <!-- CREATE ENTITY BOX TEXT -->
                            <p class="create-entity-box-text">Share your passion with others!</p>
                            <!-- /CREATE ENTITY BOX TEXT -->

                            <!-- BUTTON -->
                            <a class="button secondary full" href="{{route('settingsManageGroupsNewGet')}}">Start Creating!</a>
                            <!-- /BUTTON -->
                        </div>
                        <!-- /CREATE ENTITY BOX INFO -->
                    </div>
                    <!-- /CREATE ENTITY BOX -->

                    @php
                    $groups = Auth::user()->ownGroups;
                    @endphp

                    @if(count($groups) > 0)
                        @foreach($groups as $group)
                    <!-- USER PREVIEW -->
                    <div class="user-preview small fixed-height-medium">
                        <!-- USER PREVIEW COVER -->
                        <figure class="user-preview-cover liquid">
                            <img src="{{$group->cover ?? '/storage/default/user/profile/cover.jpg'}}">
                        </figure>
                        <!-- /USER PREVIEW COVER -->

                        <!-- USER PREVIEW INFO -->
                        <div class="user-preview-info">
                            <!-- USER SHORT DESCRIPTION -->
                            <div class="user-short-description small">
                                <!-- USER SHORT DESCRIPTION AVATAR -->
                                <a class="user-short-description-avatar user-avatar no-stats" href="{{route('settingsManageGroupsManageGet', ['group' => $group->username])}}">
                                    <!-- USER AVATAR BORDER -->
                                    <div class="user-avatar-border">
                                        <!-- HEXAGON -->
                                        <div class="hexagon-100-108"></div>
                                        <!-- /HEXAGON -->
                                    </div>
                                    <!-- /USER AVATAR BORDER -->

                                    <!-- USER AVATAR CONTENT -->
                                    <div class="user-avatar-content">
                                        <!-- HEXAGON -->
                                        <div class="hexagon-image-84-92" data-src="{{$group->avatar ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                                        <!-- /HEXAGON -->
                                    </div>
                                    <!-- /USER AVATAR CONTENT -->
                                </a>
                                <!-- /USER SHORT DESCRIPTION AVATAR -->

                                <!-- USER SHORT DESCRIPTION TITLE -->
                                <p class="user-short-description-title small"><a href="{{route('settingsManageGroupsManageGet', ['group' => $group->username])}}">{{$group->name}}</a></p>
                                <!-- /USER SHORT DESCRIPTION TITLE -->

                                <!-- USER SHORT DESCRIPTION TEXT -->
                                <p class="user-short-description-text regular">{{'@'.$group->username}}</p>
                                <!-- /USER SHORT DESCRIPTION TEXT -->
                            </div>
                            <!-- /USER SHORT DESCRIPTION -->

                            <!-- BUTTON -->
                            <a href="{{route('settingsManageGroupsManageGet', ['group' => $group->username])}}" class="button white full popup-manage-group-trigger">Manage Group</a>
                            <!-- /BUTTON -->
                        </div>
                        <!-- /USER PREVIEW INFO -->
                    </div>
                    <!-- /USER PREVIEW -->
                        @endforeach
                    @endif
                </div>
                <!-- /GRID -->
            </div>
            <!-- /GRID COLUMN -->
        </div>
        <!-- /GRID COLUMN -->
    </div>
    <!-- /GRID -->
</dic>
@endsection

@section('stylesheets')
@endsection

@section('scripts')
<!-- global.accordions -->
<script src="/assets/js/global/global.accordions.js"></script>
@endsection
