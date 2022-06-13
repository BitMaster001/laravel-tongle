@extends('layouts.app')

@section('title')
{{$group->username}}
@endsection

@if($public)
@php
$groupshipsApproved = $group->getMembers();
@endphp
@endif

@section('content')
<!-- PROFILE HEADER -->
@include('home.group.partial.profile-header')
<!-- /PROFILE HEADER -->

@if($public)
<!-- SECTION NAVIGATION -->
@include('home.group.partial.profile-navigation')
<!-- /SECTION NAVIGATION -->

<!-- SECTION -->
<section class="section">
    <!-- SECTION HEADER -->
    <div class="section-header">
        <!-- SECTION HEADER INFO -->
        <div class="section-header-info">
            <!-- SECTION PRETITLE -->
            <p class="section-pretitle">Browse {{$group->name}}</p>
            <!-- /SECTION PRETITLE -->

            <!-- SECTION TITLE -->
            <h2 class="section-title">Members <span class="highlighted secondary">{{count($groupshipsApproved)}}</span></h2>
            <!-- /SECTION TITLE -->
        </div>
        <!-- /SECTION HEADER INFO -->
    </div>
    <!-- /SECTION HEADER -->

    @if(false)
    <!-- SECTION FILTERS BAR -->
    @include('home.user.profile.partial.friends-navigation')
    <!-- /SECTION FILTERS BAR -->
    @endif

    @if(count($groupshipsApproved) > 0)
    <!-- GRID -->
    <div class="grid grid-3-3-3-3 centered">
        @foreach($groupshipsApproved as $groupshipApproved)
        <!-- USER PREVIEW -->
        <div class="user-preview small">
            <!-- USER PREVIEW COVER -->
            <figure class="user-preview-cover liquid">
                <img src="{{$groupshipApproved->member->cover}}" alt="cover">
            </figure>
            <!-- /USER PREVIEW COVER -->

            <!-- USER PREVIEW INFO -->
            <div class="user-preview-info">
                <!-- USER SHORT DESCRIPTION -->
                <div class="user-short-description small">
                    <!-- USER SHORT DESCRIPTION AVATAR -->
                    <a class="user-short-description-avatar user-avatar" href="{{route('userPublicProfileGet', ['user' => $groupshipApproved->member->username])}}">
                        <!-- USER AVATAR BORDER -->
                        <div class="user-avatar-border">
                            <!-- HEXAGON -->
                            <div class="hexagon-100-110"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR BORDER -->

                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-68-74" data-src="{{$groupshipApproved->member->avatar}}"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->

                        <!-- USER AVATAR PROGRESS -->
                        <div class="user-avatar-progress">
                            <!-- HEXAGON -->
                            @if($groupshipApproved->member->gender == "Male")
                            <div class="hexagon-progress-84-92-male"></div>
                            @elseif($groupshipApproved->member->gender == "Female")
                            <div class="hexagon-progress-84-92-female"></div>
                            @elseif($groupshipApproved->member->gender == "Other")
                            <div class="hexagon-progress-84-92-other"></div>
                            @else
                            <div class="hexagon-progress-84-92"></div>
                            @endif
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR PROGRESS -->

                        <!-- USER AVATAR PROGRESS BORDER -->
                        <div class="user-avatar-progress-border">
                            <!-- HEXAGON -->
                            <div class="hexagon-border-84-92"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR PROGRESS BORDER -->

                    </a>
                    <!-- /USER SHORT DESCRIPTION AVATAR -->

                    <!-- USER SHORT DESCRIPTION TITLE -->
                    <p class="user-short-description-title"><a href="{{route('userPublicProfileGet', ['user' => $groupshipApproved->member->username])}}">{{$groupshipApproved->member->full_name}}</a></p>
                    <!-- /USER SHORT DESCRIPTION TITLE -->

                    <!-- USER SHORT DESCRIPTION TEXT -->
                    <p class="user-short-description-text"><a href="{{$groupshipApproved->member->website ?? '#'}}">{{parse_url($groupshipApproved->member->website)['host'] ?? ''}}</a></p>
                    <!-- /USER SHORT DESCRIPTION TEXT -->
                </div>
                <!-- /USER SHORT DESCRIPTION -->

                <!-- USER STATS -->
                <div class="user-stats">
                    <!-- USER STAT -->
                    <div class="user-stat">
                        <!-- USER STAT TITLE -->
                        <p class="user-stat-title">{{$groupshipApproved->member->posts < 1000 ? $groupshipApproved->member->posts : number_format($groupshipApproved->member->posts/1000,1)."K"}}</p>
                        <!-- /USER STAT TITLE -->

                        <!-- USER STAT TEXT -->
                        <p class="user-stat-text">posts</p>
                        <!-- /USER STAT TEXT -->
                    </div>
                    <!-- /USER STAT -->

                    <!-- USER STAT -->
                    <div class="user-stat">
                        <!-- USER STAT TITLE -->
                        <p class="user-stat-title">{{$groupshipApproved->member->friends < 1000 ? $groupshipApproved->member->friends : number_format($groupshipApproved->member->friends/1000,1)."K"}}</p>
                        <!-- /USER STAT TITLE -->

                        <!-- USER STAT TEXT -->
                        <p class="user-stat-text">friends</p>
                        <!-- /USER STAT TEXT -->
                    </div>
                    <!-- /USER STAT -->

                    <!-- USER STAT -->
                    <div class="user-stat">
                        <!-- USER STAT TITLE -->
                        <p class="user-stat-title">{{$groupshipApproved->member->visits < 1000 ? $groupshipApproved->member->visits : number_format($groupshipApproved->member->visits/1000,1)."K"}}</p>
                        <!-- /USER STAT TITLE -->

                        <!-- USER STAT TEXT -->
                        <p class="user-stat-text">visits</p>
                        <!-- /USER STAT TEXT -->
                    </div>
                    <!-- /USER STAT -->
                </div>
                <!-- /USER STATS -->

                <!-- SOCIAL LINKS -->
                @include('home.user.profile.partial.widgets.friends-social', ['user' => $groupshipApproved->member])
                <!-- /SOCIAL LINKS -->
            </div>
            <!-- /USER PREVIEW INFO -->

            <!-- USER PREVIEW FOOTER -->
            <div class="user-preview-footer">
                <!-- USER PREVIEW FOOTER ACTION -->
                <div class="user-preview-footer-action">
                    <!-- BUTTON -->
                    <a href="{{route('userPublicProfileGet', ['user' => $groupshipApproved->member->username])}}" class="button void void-secondary">
                        <!-- BUTTON ICON -->
                        <svg class="button-icon icon-members">
                            <use xlink:href="#svg-members"></use>
                        </svg>
                        <!-- /BUTTON ICON -->
                    </a>
                    <!-- /BUTTON -->
                </div>
                <!-- /USER PREVIEW FOOTER ACTION -->

                <!-- USER PREVIEW FOOTER ACTION -->
                <div class="user-preview-footer-action">
                    <!-- BUTTON -->
                    <p class="button void void-primary profile-friend-send-message" data-user="{{$groupshipApproved->member->username}}">
                        <!-- BUTTON ICON -->
                        <svg class="button-icon icon-comment">
                            <use xlink:href="#svg-comment"></use>
                        </svg>
                        <!-- /BUTTON ICON -->
                    </p>
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
    <p>No Members.</p>
    @endif


</section>
<!-- /SECTION -->
@endif
@endsection

@section('stylesheets')
@if($public)
<link rel="stylesheet" href="/assets/vendor/tagify/tagify.css">
<link rel="stylesheet" href="/assets/css/custom-tagify.css">
@endif
@endsection

@section('scripts')
@if($public)
<!-- posts js -->
<script src="/assets/vendor/tagify/tagify.min.js"></script>
<!-- posts js -->
<script src="/assets/js/widgets/posts/posts.js"></script>
<!-- group js -->
<script src="/assets/js/pages/home/group/group.js"></script>
@if(count($groupshipsApproved) > 0)
<script>
    @foreach($groupshipsApproved as $groupshipApproved)
    app.plugins.createSlider({
        container: `#user-preview-social-links-slider-{{$groupshipApproved->member->id}}`,
        items: 4,
        fixedWidth: 32,
        gutter: 8,
        loop: false,
        nav: false,
        controlsContainer: `#user-preview-social-links-slider-controls-{{$groupshipApproved->member->id}}`
    });
    @endforeach
</script>
@endif
@endif
@endsection



