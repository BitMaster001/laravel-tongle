@extends('layouts.app')
@section('title')
Groups
@endsection

@section('content')

<!-- SECTION BANNER -->
<div class="section-banner section-banner-3">
    <!-- SECTION BANNER ICON -->
    <img class="section-banner-icon" src="/assets/img/banner/groups-icon.png" alt="groups-icon">
    <!-- /SECTION BANNER ICON -->

    <!-- SECTION BANNER TITLE -->
    <p class="section-banner-title">Groups</p>
    <!-- /SECTION BANNER TITLE -->

    <!-- SECTION BANNER TEXT -->
    <p class="section-banner-text">Browse all the groups of the community!</p>
    <!-- /SECTION BANNER TEXT -->
</div>
<!-- /SECTION BANNER -->

<!-- SECTION FILTERS BAR -->
<div class="section-filters-bar v1">
    <!-- SECTION FILTERS BAR ACTIONS -->
    <div class="section-filters-bar-actions" style="width: 100%;">
        <div class="section-filters-bar-title" style="width: 100%;">
            <h3 class="section-title">Groups <span class="highlighted">({{count($groups)}})</span></h3>
        </div>
        <!-- FORM -->
        <form class="form">
            <!-- FORM INPUT -->
            <div class="form-input small with-button" style="margin-left: auto;">
                <label for="groups-search">Search Groups</label>
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
@if(count($groups) > 0)
<!-- GRID -->
<div class="grid grid-3-3-3-3">
    @foreach($groups as $group)
    <!-- USER PREVIEW -->
    <div class="user-preview small">
        <!-- USER PREVIEW COVER -->
        <figure class="user-preview-cover liquid">
            <img src="{{$group->cover ?? '/storage/default/user/profile/cover.jpg'}}">
        </figure>
        <!-- /USER PREVIEW COVER -->

        <!-- USER PREVIEW INFO -->
        <div class="user-preview-info">
            <!-- TAG STICKER -->
            <div class="tag-sticker">
                @if($group->type == 'Public')
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
                <a class="user-short-description-avatar user-avatar no-stats" href="{{route('groupGet', ['group' => $group->username])}}">
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
                <p class="user-short-description-title"><a href="{{route('groupGet', ['group' => $group->username])}}">{{$group->name}}</a></p>
                <!-- /USER SHORT DESCRIPTION TITLE -->

                <!-- USER SHORT DESCRIPTION TEXT -->
                <p class="user-short-description-text">{!!$group->tagline ?? "&nbsp;"!!}</p>
                <!-- /USER SHORT DESCRIPTION TEXT -->
            </div>
            <!-- /USER SHORT DESCRIPTION -->

            <!-- USER STATS -->
            <div class="user-stats">
                <!-- USER STAT -->
                <div class="user-stat">
                    <!-- USER STAT TITLE -->
                    <p class="user-stat-title">{{$group->members < 1000 ? $group->members : number_format($group->members/1000,1)."K"}}</p>
                    <!-- /USER STAT TITLE -->

                    <!-- USER STAT TEXT -->
                    <p class="user-stat-text">members</p>
                    <!-- /USER STAT TEXT -->
                </div>
                <!-- /USER STAT -->

                <!-- USER STAT -->
                <div class="user-stat">
                    <!-- USER STAT TITLE -->
                    <p class="user-stat-title">{{$group->posts < 1000 ? $group->posts : number_format($group->posts/1000,1)."K"}}</p>
                    <!-- /USER STAT TITLE -->

                    <!-- USER STAT TEXT -->
                    <p class="user-stat-text">posts</p>
                    <!-- /USER STAT TEXT -->
                </div>
                <!-- /USER STAT -->

                <!-- USER STAT -->
                <div class="user-stat">
                    <!-- USER STAT TITLE -->
                    <p class="user-stat-title">{{$group->visits < 1000 ? $group->visits : number_format($group->visits/1000,1)."K"}}</p>
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
                <a class="button void void-secondary" href="{{route('groupGet', ['group' => $group->username])}}">
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
@endsection


