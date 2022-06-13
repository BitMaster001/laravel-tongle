@extends('layouts.app')
@section('title')
Members
@endsection

@section('content')

<!-- SECTION BANNER -->
<div class="section-banner section-banner-3">
    <!-- SECTION BANNER ICON -->
    <img class="section-banner-icon" src="/assets/img/banner/members-icon.png" alt="groups-icon">
    <!-- /SECTION BANNER ICON -->

    <!-- SECTION BANNER TITLE -->
    <p class="section-banner-title">Members</p>
    <!-- /SECTION BANNER TITLE -->

    <!-- SECTION BANNER TEXT -->
    <p class="section-banner-text">Browse all the members of the community!</p>
    <!-- /SECTION BANNER TEXT -->
</div>
<!-- /SECTION BANNER -->

<!-- SECTION FILTERS BAR -->
<div class="section-filters-bar v1">
    <!-- SECTION FILTERS BAR ACTIONS -->
    <div class="section-filters-bar-actions" style="width: 100%;">
        <div class="section-filters-bar-title" style="width: 100%;">
            <h3 class="section-title">Members <span class="highlighted">({{$membersCount+4000}})</span></h3>
        </div>
        <!-- FORM -->
        <form class="form">
            <!-- FORM INPUT -->
            <div class="form-input small with-button" style="margin-left: auto;">
                <label for="groups-search">Search Members</label>
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
    <!-- /SECTION FILTERS BAR ACTIONS -->
</div>
<!-- /SECTION FILTERS BAR -->

<!-- GRID -->
@if(count($members) > 0)
<!-- GRID -->
<div class="grid grid-3-3-3-3">
    @foreach($members as $member)
    <!-- USER PREVIEW -->
    <div class="user-preview small">
        <!-- USER PREVIEW COVER -->
        <figure class="user-preview-cover liquid">
            <img src="{{$member->cover ?? '/storage/default/user/profile/cover.jpg'}}" alt="cover">
        </figure>
        <!-- /USER PREVIEW COVER -->

        <!-- USER PREVIEW INFO -->
        <div class="user-preview-info">
            <!-- USER SHORT DESCRIPTION -->
            <div class="user-short-description small">
                <!-- USER SHORT DESCRIPTION AVATAR -->
                <a class="user-short-description-avatar user-avatar" href="{{route('userPublicProfileGet', ['user' => $member->username])}}">
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
                        <div class="hexagon-image-68-74" data-src="{{$member->avatar ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                        <!-- /HEXAGON -->
                    </div>
                    <!-- /USER AVATAR CONTENT -->

                    <!-- USER AVATAR PROGRESS -->
                    <div class="user-avatar-progress">
                        <!-- HEXAGON -->
                        @if($member->gender == "Male")
                        <div class="hexagon-progress-84-92-male"></div>
                        @elseif($member->gender == "Female")
                        <div class="hexagon-progress-84-92-female"></div>
                        @elseif($member->gender == "Other")
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
                <p class="user-short-description-title"><a href="{{route('userPublicProfileGet', ['user' => $member->username])}}">{{$member->full_name}}</a></p>
                <!-- /USER SHORT DESCRIPTION TITLE -->

                <!-- USER SHORT DESCRIPTION TEXT -->
                <p class="user-short-description-text"><a href="{{$member->website ?? '#'}}">{!!parse_url($member->website)['host'] ?? "&nbsp;"!!}</a></p>
                <!-- /USER SHORT DESCRIPTION TEXT -->
            </div>
            <!-- /USER SHORT DESCRIPTION -->

            <!-- USER STATS -->
            <div class="user-stats">
                <!-- USER STAT -->
                <div class="user-stat">
                    <!-- USER STAT TITLE -->
                    <p class="user-stat-title">{{$member->posts < 1000 ? $member->posts : number_format($member->posts/1000,1)."K"}}</p>
                    <!-- /USER STAT TITLE -->

                    <!-- USER STAT TEXT -->
                    <p class="user-stat-text">posts</p>
                    <!-- /USER STAT TEXT -->
                </div>
                <!-- /USER STAT -->

                <!-- USER STAT -->
                <div class="user-stat">
                    <!-- USER STAT TITLE -->
                    <p class="user-stat-title">{{$member->friends < 1000 ? $member->friends : number_format($member->friends/1000,1)."K"}}</p>
                    <!-- /USER STAT TITLE -->

                    <!-- USER STAT TEXT -->
                    <p class="user-stat-text">friends</p>
                    <!-- /USER STAT TEXT -->
                </div>
                <!-- /USER STAT -->

                <!-- USER STAT -->
                <div class="user-stat">
                    <!-- USER STAT TITLE -->
                    <p class="user-stat-title">{{$member->visits < 1000 ? $member->visits : number_format($member->visits/1000,1)."K"}}</p>
                    <!-- /USER STAT TITLE -->

                    <!-- USER STAT TEXT -->
                    <p class="user-stat-text">visits</p>
                    <!-- /USER STAT TEXT -->
                </div>
                <!-- /USER STAT -->
            </div>
            <!-- /USER STATS -->

            <!-- SOCIAL LINKS -->
            @include('home.user.profile.partial.widgets.friends-social', ['user' => $member])
            <!-- /SOCIAL LINKS -->
        </div>
        <!-- /USER PREVIEW INFO -->

        <!-- USER PREVIEW FOOTER -->
        <div class="user-preview-footer">
            <!-- USER PREVIEW FOOTER ACTION -->
            <div class="user-preview-footer-action">
                <!-- BUTTON -->
                <a href="{{route('userPublicProfileGet', ['user' => $member->username])}}" class="button void void-secondary">
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
                <p class="button void void-primary profile-friend-send-message" data-user="{{$member->username}}">
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
<!-- /GRID -->

@endsection

@section('stylesheets')
<style>
    @media screen and (max-width: 680px) {
        .content-grid {
            width: 95%;
            padding: 25px 0 200px;
        }
        .grid {
            grid-template-columns: 100% !important;
        }
        .user-preview {
            width: 100%;
        }
    }
</style>
@endsection

@section('scripts')
@if(count($members) > 0)
<script>
    @foreach($members as $friend)
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


