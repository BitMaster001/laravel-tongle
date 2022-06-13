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
            <h2 class="section-title">Friends <span class="highlighted">{{$user->friends}}</span></h2>
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

    @php
    $friends = $user->getFriends();
    @endphp

    @if(count($friends) > 0)
    <!-- GRID -->
    <div class="grid grid-3-3-3-3 centered">
        @foreach($friends as $friend)
        <!-- USER PREVIEW -->
        <div class="user-preview small">
            <!-- USER PREVIEW COVER -->
            <figure class="user-preview-cover liquid">
                <img src="{{$friend->cover}}" alt="cover">
            </figure>
            <!-- /USER PREVIEW COVER -->

            <!-- USER PREVIEW INFO -->
            <div class="user-preview-info">
                <!-- USER SHORT DESCRIPTION -->
                <div class="user-short-description small">
                    <!-- USER SHORT DESCRIPTION AVATAR -->
                    <a class="user-short-description-avatar user-avatar" href="{{route('userPublicProfileGet', ['user' => $friend->username])}}">
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
                            <div class="hexagon-image-68-74" data-src="{{$friend->avatar}}"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->

                        <!-- USER AVATAR PROGRESS -->
                        <div class="user-avatar-progress">
                            <!-- HEXAGON -->
                            @if($friend->gender == "Male")
                            <div class="hexagon-progress-84-92-male"></div>
                            @elseif($friend->gender == "Female")
                            <div class="hexagon-progress-84-92-female"></div>
                            @elseif($friend->gender == "Other")
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
                    <p class="user-short-description-title"><a href="{{route('userPublicProfileGet', ['user' => $friend->username])}}">{{$friend->full_name}}</a></p>
                    <!-- /USER SHORT DESCRIPTION TITLE -->

                    <!-- USER SHORT DESCRIPTION TEXT -->
                    <p class="user-short-description-text"><a href="{{$friend->website ?? '#'}}">{{parse_url($friend->website)['host'] ?? ''}}</a></p>
                    <!-- /USER SHORT DESCRIPTION TEXT -->
                </div>
                <!-- /USER SHORT DESCRIPTION -->

                <!-- USER STATS -->
                <div class="user-stats">
                    <!-- USER STAT -->
                    <div class="user-stat">
                        <!-- USER STAT TITLE -->
                        <p class="user-stat-title">{{$friend->posts < 1000 ? $friend->posts : number_format($friend->posts/1000,1)."K"}}</p>
                        <!-- /USER STAT TITLE -->

                        <!-- USER STAT TEXT -->
                        <p class="user-stat-text">posts</p>
                        <!-- /USER STAT TEXT -->
                    </div>
                    <!-- /USER STAT -->

                    <!-- USER STAT -->
                    <div class="user-stat">
                        <!-- USER STAT TITLE -->
                        <p class="user-stat-title">{{$friend->friends < 1000 ? $friend->friends : number_format($friend->friends/1000,1)."K"}}</p>
                        <!-- /USER STAT TITLE -->

                        <!-- USER STAT TEXT -->
                        <p class="user-stat-text">friends</p>
                        <!-- /USER STAT TEXT -->
                    </div>
                    <!-- /USER STAT -->

                    <!-- USER STAT -->
                    <div class="user-stat">
                        <!-- USER STAT TITLE -->
                        <p class="user-stat-title">{{$friend->visits < 1000 ? $friend->visits : number_format($friend->visits/1000,1)."K"}}</p>
                        <!-- /USER STAT TITLE -->

                        <!-- USER STAT TEXT -->
                        <p class="user-stat-text">visits</p>
                        <!-- /USER STAT TEXT -->
                    </div>
                    <!-- /USER STAT -->
                </div>
                <!-- /USER STATS -->

                <!-- SOCIAL LINKS -->
                @include('home.user.profile.partial.widgets.friends-social', ['user' => $friend])
                <!-- /SOCIAL LINKS -->
            </div>
            <!-- /USER PREVIEW INFO -->

            <!-- USER PREVIEW FOOTER -->
            <div class="user-preview-footer">
                <!-- USER PREVIEW FOOTER ACTION -->
                <div class="user-preview-footer-action">
                    <!-- BUTTON -->
                    <a href="{{route('userPublicProfileGet', ['user' => $friend->username])}}" class="button void void-secondary">
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
                    <p class="button void void-primary profile-friend-send-message" data-user="{{$friend->username}}">
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
    <p>No Friends.</p>
    @endif


</section>
<!-- /SECTION -->

@endsection

@section('stylesheets')
@endsection

@section('scripts')
@if(count($friends) > 0)
<script>
    @foreach($friends as $friend)
           app.plugins.createSlider({
                container: `#user-preview-social-links-slider-{{$friend->id}}`,
                items: 4,
                fixedWidth: 32,
                gutter: 8,
                loop: false,
                nav: false,
                controlsContainer: `#user-preview-social-links-slider-controls-{{$friend->id}}`
            });
    @endforeach
</script>
@endif
@endsection
