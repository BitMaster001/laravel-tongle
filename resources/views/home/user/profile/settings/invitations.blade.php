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
                        <h2 class="section-title">Invitations <span class="highlighted">{{count($groupshipsInvited)}}</span></h2>
                        <!-- /SECTION TITLE -->
                    </div>
                    <!-- /SECTION HEADER INFO -->
                </div>
                <!-- /SECTION HEADER -->

                <!-- GRID -->
                <div class="grid grid-3-3-3 centered-on-mobile">
                    @if(count($groupshipsInvited) > 0)
                    @foreach($groupshipsInvited as $groupshipInvited)
                    <!-- USER PREVIEW -->
                    <div class="user-preview small">
                        <!-- USER PREVIEW COVER -->
                        <figure class="user-preview-cover liquid">
                            <img src="{{$groupshipInvited->group->cover ?? '/storage/default/user/profile/cover.jpg'}}">
                        </figure>
                        <!-- /USER PREVIEW COVER -->

                        <!-- USER PREVIEW INFO -->
                        <div class="user-preview-info">
                            <!-- TAG STICKER -->
                            <div class="tag-sticker">
                                @if($groupshipInvited->group->type == 'Public')
                                <!-- TAG STICKER ICON -->
                                <svg class="tag-sticker-icon icon-public">
                                    <use xlink:href="#svg-public"></use>
                                </svg>
                                <!-- /TAG STICKER ICON -->
                                @else
                                <!-- ICON PUBLIC -->
                                <svg class="tag-sticker-icon icon-private">
                                    <use xlink:href="#svg-private"></use>
                                </svg>
                                <!-- /ICON PUBLIC -->
                                @endif
                            </div>
                            <!-- /TAG STICKER -->

                            <!-- USER SHORT DESCRIPTION -->
                            <div class="user-short-description small">
                                <!-- USER SHORT DESCRIPTION AVATAR -->
                                <a class="user-short-description-avatar user-avatar no-stats" href="{{route('groupGet', ['group' => $groupshipInvited->group->username])}}">
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
                                        <div class="hexagon-image-84-92" data-src="{{$groupshipInvited->group->avatar ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                                        <!-- /HEXAGON -->
                                    </div>
                                    <!-- /USER AVATAR CONTENT -->
                                </a>
                                <!-- /USER SHORT DESCRIPTION AVATAR -->

                                <!-- USER SHORT DESCRIPTION TITLE -->
                                <p class="user-short-description-title"><a href="{{route('groupGet', ['group' => $groupshipInvited->group->username])}}">{{$groupshipInvited->group->name}}</a></p>
                                <!-- /USER SHORT DESCRIPTION TITLE -->

                                <!-- USER SHORT DESCRIPTION TEXT -->
                                <p class="user-short-description-text">{{$groupshipInvited->group->tagline}}</p>
                                <!-- /USER SHORT DESCRIPTION TEXT -->
                            </div>
                            <!-- /USER SHORT DESCRIPTION -->

                            <!-- USER STATS -->
                            <div class="user-stats">
                                <!-- USER STAT -->
                                <div class="user-stat">
                                    <!-- USER STAT TITLE -->
                                    <p class="user-stat-title">{{$groupshipInvited->group->members < 1000 ? $groupshipInvited->group->members : number_format($groupshipInvited->group->members/1000,1)."K"}}</p>
                                    <!-- /USER STAT TITLE -->

                                    <!-- USER STAT TEXT -->
                                    <p class="user-stat-text">members</p>
                                    <!-- /USER STAT TEXT -->
                                </div>
                                <!-- /USER STAT -->

                                <!-- USER STAT -->
                                <div class="user-stat">
                                    <!-- USER STAT TITLE -->
                                    <p class="user-stat-title">{{$groupshipInvited->group->posts < 1000 ? $groupshipInvited->group->posts : number_format($groupshipInvited->group->posts/1000,1)."K"}}</p>
                                    <!-- /USER STAT TITLE -->

                                    <!-- USER STAT TEXT -->
                                    <p class="user-stat-text">posts</p>
                                    <!-- /USER STAT TEXT -->
                                </div>
                                <!-- /USER STAT -->

                                <!-- USER STAT -->
                                <div class="user-stat">
                                    <!-- USER STAT TITLE -->
                                    <p class="user-stat-title">{{$groupshipInvited->group->visits < 1000 ? $groupshipInvited->group->visits : number_format($groupshipInvited->group->visits/1000,1)."K"}}</p>
                                    <!-- /USER STAT TITLE -->

                                    <!-- USER STAT TEXT -->
                                    <p class="user-stat-text">visits</p>
                                    <!-- /USER STAT TEXT -->
                                </div>
                                <!-- /USER STAT -->
                            </div>
                            <!-- /USER STATS -->

                            <!-- USER PREVIEW ACTIONS -->
                            <div class="user-preview-actions">
                                <!-- BUTTON -->
                                <a class="button secondary" href="{{route('userGroupshipAcceptGet', ['groupship' => $groupshipInvited->key])}}">
                                    <!-- BUTTON ICON -->
                                    <svg class="button-icon icon-join-group">
                                        <use xlink:href="#svg-join-group"></use>
                                    </svg>
                                    <!-- /BUTTON ICON -->
                                </a>
                                <!-- /BUTTON -->

                                <!-- BUTTON -->
                                <a class="button white white-tertiary" href="{{route('userGroupshipDeniedGet', ['groupship' => $groupshipInvited->key])}}">
                                    <!-- BUTTON ICON -->
                                    <svg class="button-icon icon-leave-group">
                                        <use xlink:href="#svg-leave-group"></use>
                                    </svg>
                                    <!-- /BUTTON ICON -->
                                </a>
                                <!-- /BUTTON -->
                            </div>
                            <!-- /USER PREVIEW ACTIONS -->
                        </div>
                        <!-- /USER PREVIEW INFO -->

                        <!-- USER PREVIEW FOOTER -->
                        <div class="user-preview-footer padded">
                            <!-- USER PREVIEW AUTHOR -->
                            <div class="user-preview-author">
                                <!-- USER PREVIEW AUTHOR IMAGE -->
                                <a class="user-preview-author-image user-avatar micro no-border" href="{{route('userPublicProfileGet', ['user' => $groupshipInvited->inviter->username])}}">
                                    <!-- USER AVATAR CONTENT -->
                                    <div class="user-avatar-content">
                                        <!-- HEXAGON -->
                                        <div class="hexagon-image-18-20" data-src="{{$groupshipInvited->inviter->avatar ?? '/storage/default/user/profile/cover.jpg'}}"></div>
                                        <!-- /HEXAGON -->
                                    </div>
                                    <!-- /USER AVATAR CONTENT -->
                                </a>
                                <!-- /USER PREVIEW AUTHOR IMAGE -->

                                <!-- USER PREVIEW AUTHOR TITLE -->
                                <p class="user-preview-author-title">Invited By</p>
                                <!-- /USER PREVIEW AUTHOR TITLE -->

                                <!-- USER PREVIEW AUTHOR TEXT -->
                                <p class="user-preview-author-text"><a href="{{route('userPublicProfileGet', ['user' => $groupshipInvited->inviter->username])}}">{{$groupshipInvited->inviter->full_name}}</a></p>
                                <!-- /USER PREVIEW AUTHOR TEXT -->
                            </div>
                            <!-- /USER PREVIEW AUTHOR -->
                        </div>
                        <!-- /USER PREVIEW FOOTER -->
                    </div>
                    <!-- /USER PREVIEW -->
                    @endforeach
                    @else
                    <p>No Group invitations.</p>
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
