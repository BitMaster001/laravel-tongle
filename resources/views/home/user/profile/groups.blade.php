@extends('layouts.app')

@section('title')
{{$user->username}}
@endsection

@php
$groupshipsApproved = $user->getGroups();
@endphp

@section('content')
<!-- PROFILE HEADER -->
@include('home.user.profile.partial.profile-header')
<!-- /PROFILE HEADER -->

<!-- SECTION NAVIGATION -->
@include('home.user.profile.partial.profile-navigation')
<!-- /SECTION NAVIGATION -->

<!-- SECTION -->
<section class="section">
    <!-- SECTION HEADER -->
    <div class="section-header">
        <!-- SECTION HEADER INFO -->
        <div class="section-header-info">
            <!-- SECTION PRETITLE -->
            <p class="section-pretitle">Browse {{$user->full_name}}</p>
            <!-- /SECTION PRETITLE -->

            <!-- SECTION TITLE -->
            <h2 class="section-title">Groups <span class="highlighted">{{count($groupshipsApproved)}}</span></h2>
            <!-- /SECTION TITLE -->
        </div>
        <!-- /SECTION HEADER INFO -->
    </div>
    <!-- /SECTION HEADER -->

    @if(count($groupshipsApproved) > 0)
    <!-- GRID -->
    <div class="grid grid-3-3-3-3 centered">
        @foreach($groupshipsApproved as $groupshipApproved)
        <!-- USER PREVIEW -->
        <div class="user-preview small">
            <!-- USER PREVIEW COVER -->
            <figure class="user-preview-cover liquid">
                <img src="{{$groupshipApproved->group->cover ?? '/storage/default/user/profile/cover.jpg'}}">
            </figure>
            <!-- /USER PREVIEW COVER -->

            <!-- USER PREVIEW INFO -->
            <div class="user-preview-info">
                <!-- TAG STICKER -->
                <div class="tag-sticker">
                    @if($groupshipApproved->group->type == 'Public')
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
                    <a class="user-short-description-avatar user-avatar no-stats" href="{{route('groupGet', ['group' => $groupshipApproved->group->username])}}">
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
                            <div class="hexagon-image-84-92" data-src="{{$groupshipApproved->group->avatar ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->
                    </a>
                    <!-- /USER SHORT DESCRIPTION AVATAR -->

                    <!-- USER SHORT DESCRIPTION TITLE -->
                    <p class="user-short-description-title"><a href="{{route('groupGet', ['group' => $groupshipApproved->group->username])}}">{{$groupshipApproved->group->name}}</a></p>
                    <!-- /USER SHORT DESCRIPTION TITLE -->

                    <!-- USER SHORT DESCRIPTION TEXT -->
                    <p class="user-short-description-text">{{$groupshipApproved->group->tagline}}</p>
                    <!-- /USER SHORT DESCRIPTION TEXT -->
                </div>
                <!-- /USER SHORT DESCRIPTION -->

                <!-- USER STATS -->
                <div class="user-stats">
                    <!-- USER STAT -->
                    <div class="user-stat">
                        <!-- USER STAT TITLE -->
                        <p class="user-stat-title">{{$groupshipApproved->group->members < 1000 ? $groupshipApproved->group->members : number_format($groupshipApproved->group->members/1000,1)."K"}}</p>
                        <!-- /USER STAT TITLE -->

                        <!-- USER STAT TEXT -->
                        <p class="user-stat-text">members</p>
                        <!-- /USER STAT TEXT -->
                    </div>
                    <!-- /USER STAT -->

                    <!-- USER STAT -->
                    <div class="user-stat">
                        <!-- USER STAT TITLE -->
                        <p class="user-stat-title">{{$groupshipApproved->group->posts < 1000 ? $groupshipApproved->group->posts : number_format($groupshipApproved->group->posts/1000,1)."K"}}</p>
                        <!-- /USER STAT TITLE -->

                        <!-- USER STAT TEXT -->
                        <p class="user-stat-text">posts</p>
                        <!-- /USER STAT TEXT -->
                    </div>
                    <!-- /USER STAT -->

                    <!-- USER STAT -->
                    <div class="user-stat">
                        <!-- USER STAT TITLE -->
                        <p class="user-stat-title">{{$groupshipApproved->group->visits < 1000 ? $groupshipApproved->group->visits : number_format($groupshipApproved->group->visits/1000,1)."K"}}</p>
                        <!-- /USER STAT TITLE -->

                        <!-- USER STAT TEXT -->
                        <p class="user-stat-text">visits</p>
                        <!-- /USER STAT TEXT -->
                    </div>
                    <!-- /USER STAT -->
                </div>
                <!-- /USER STATS -->
            </div>
            <!-- /USER PREVIEW INFO -->

            <!-- USER PREVIEW FOOTER -->
            <div class="user-preview-footer">
                <!-- USER PREVIEW FOOTER ACTION -->
                <div class="user-preview-footer-action full">
                    <!-- BUTTON -->
                    <a class="button void void-secondary" href="{{route('groupGet', ['group' => $groupshipApproved->group->username])}}">
                        <!-- BUTTON ICON -->
                        <svg class="button-icon icon-join-group">
                            <use xlink:href="#svg-timeline"></use>
                        </svg>
                        <!-- /BUTTON ICON -->
                    </a>
                    <!-- /BUTTON -->
                </div>
                <!-- /USER PREVIEW FOOTER ACTION -->
            </div>
            <!-- /USER PREVIEW FOOTER -->
        </div>
        <!-- /USER PREVIEW -->
        @endforeach
    </div>
    <!-- /GRID -->
    @else
    <br>
    <p>No Groups.</p>
    @endif


</section>
<!-- /SECTION -->

@endsection

@section('stylesheets')
@endsection

@section('scripts')
@endsection
