@extends('layouts.app')

@section('title')
Q & A
@endsection

@section('content')

    <!-- SECTION BANNER -->
    <div class="section-banner section-banner-2">
        <!-- SECTION BANNER ICON -->
        <img class="section-banner-icon" src="/assets/img/banner/forums-icon.png" alt="forums-icon">
        <!-- /SECTION BANNER ICON -->

        <!-- SECTION BANNER TITLE -->
        <p class="section-banner-title">Q & A</p>
        <!-- /SECTION BANNER TITLE -->

        <!-- SECTION BANNER TEXT -->
        <p class="section-banner-text">Talk about anything! Gaming, music, life and more!</p>
        <!-- /SECTION BANNER TEXT -->
    </div>
    <!-- /SECTION BANNER -->

<!-- SECTION HEADER -->
<div class="section-header">
    <!-- SECTION HEADER INFO -->
    <div class="section-header-info">
        <!-- SECTION PRETITLE -->
        <p class="section-pretitle">Q & A</p>
        <!-- /SECTION PRETITLE -->

        <!-- SECTION TITLE -->
        <h2 class="section-title">{{$categorie->name}}</h2>
        <!-- /SECTION TITLE -->
    </div>
    <!-- /SECTION HEADER INFO -->
</div>
<!-- /SECTION HEADER -->

<!-- SECTION FILTERS BAR -->
<div class="section-filters-bar v7">
    <!-- SECTION FILTERS BAR ACTIONS -->
    <div class="section-filters-bar-actions">
        <!-- SECTION FILTERS BAR INFO -->
        <div class="section-filters-bar-info">
            <!-- SECTION FILTERS BAR TITLE -->
            <p class="section-filters-bar-title"><a href="{{route('getForum')}}">Q & A</a><span class="separator"></span><a href="{{route('getForumCategorie', ['categorie' => $categorie->slag])}}">{{$categorie->name}}</a></p>
            <!-- /SECTION FILTERS BAR TITLE -->

            @if(count($topics) > 0)
            @php
            $topic = $topics[0];
            @endphp
            <!-- SECTION FILTERS BAR TEXT -->
            <div class="section-filters-bar-text small-space">
                Last post by
                <!-- USER AVATAR -->
                <a class="user-avatar micro no-stats" href="{{route('userPublicProfileGet', ['user' => $topic->user->username])}}">
                    <!-- USER AVATAR BORDER -->
                    <div class="user-avatar-border">
                        <!-- HEXAGON -->
                        <div class="hexagon-22-24"></div>
                        <!-- /HEXAGON -->
                    </div>
                    <!-- /USER AVATAR BORDER -->

                    <!-- USER AVATAR CONTENT -->
                    <div class="user-avatar-content">
                        <!-- HEXAGON -->
                        <div class="hexagon-image-18-20" data-src="{{$topic->user->avatar}}"></div>
                        <!-- /HEXAGON -->
                    </div>
                    <!-- /USER AVATAR CONTENT -->
                </a>
                <!-- /USER AVATAR -->
                <a class="bold" href="{{route('userPublicProfileGet', ['user' => $topic->user->username])}}">{{$topic->user->full_name}}</a>
                {{$topic->sincePost()}}
            </div>
            <!-- /SECTION FILTERS BAR TEXT -->
            @endif
        </div>
        <!-- /SECTION FILTERS BAR INFO -->
    </div>
    <!-- /SECTION FILTERS BAR ACTIONS -->

    <!-- SECTION FILTERS BAR ACTIONS -->
    <div class="section-filters-bar-actions">
        <!-- FORM -->
        <form class="form">
            <!-- FORM ITEM -->
            <div class="form-item split">
                <!-- FORM INPUT -->
                <div class="form-input small">
                    <label for="forum-search">Search Q & A</label>
                    <input type="text" name="q" value="{{request()->get('q') ?? ''}}">
                </div>
                <!-- /FORM INPUT -->

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
            <!-- /FORM ITEM -->
        </form>
        <!-- /FORM -->

        @if( $categorie->id >0)
        <!-- BUTTON -->
        <a class="button secondary" href="{{route('getForumNewPost', ['categorie' => $categorie->slag])}}">+ Create Discussion</a>
        <!-- /BUTTON -->
        @endif
    </div>
    <!-- /SECTION FILTERS BAR ACTIONS -->
</div>
<!-- /SECTION FILTERS BAR -->

@if(false)
<!-- TABLE -->
<div class="table table-forum-category">
    <!-- TABLE HEADER -->
    <div class="table-header">
        <!-- TABLE HEADER COLUMN -->
        <div class="table-header-column">
            <!-- TABLE HEADER TITLE -->
            <p class="table-header-title">Category</p>
            <!-- /TABLE HEADER TITLE -->
        </div>
        <!-- /TABLE HEADER COLUMN -->

        <!-- TABLE HEADER COLUMN -->
        <div class="table-header-column centered padded-medium">
            <!-- TABLE HEADER TITLE -->
            <p class="table-header-title">Topics</p>
            <!-- /TABLE HEADER TITLE -->
        </div>
        <!-- /TABLE HEADER COLUMN -->

        <!-- TABLE HEADER COLUMN -->
        <div class="table-header-column centered padded-medium">
            <!-- TABLE HEADER TITLE -->
            <p class="table-header-title">Posts</p>
            <!-- /TABLE HEADER TITLE -->
        </div>
        <!-- /TABLE HEADER COLUMN -->

        <!-- TABLE HEADER COLUMN -->
        <div class="table-header-column padded-big-left">
            <!-- TABLE HEADER TITLE -->
            <p class="table-header-title">Recent Topics</p>
            <!-- /TABLE HEADER TITLE -->
        </div>
        <!-- /TABLE HEADER COLUMN -->
    </div>
    <!-- /TABLE HEADER -->

    <!-- TABLE BODY -->
    <div class="table-body">
        <!-- TABLE ROW -->
        <div class="table-row big">
            <!-- TABLE COLUMN -->
            <div class="table-column">
                <!-- FORUM CATEGORY -->
                <div class="forum-category">
                    <!-- FORUM CATEGORY IMAGE -->
                    <a href="forums-category.html">
                        <img class="forum-category-image" src="/assets/img/forum/category/07.png" alt="category-07">
                    </a>
                    <!-- /FORUM CATEGORY IMAGE -->

                    <!-- FORUM CATEGORY INFO -->
                    <div class="forum-category-info">
                        <!-- FORUM CATEGORY TITLE -->
                        <p class="forum-category-title"><a href="forums-category.html">Comics</a></p>
                        <!-- /FORUM CATEGORY TITLE -->

                        <!-- FORUM CATEGORY TEXT -->
                        <p class="forum-category-text">A place for the community to talk and chat about whatever they want!</p>
                        <!-- /FORUM CATEGORY TEXT -->
                    </div>
                    <!-- /FORUM CATEGORY INFO -->
                </div>
                <!-- /FORUM CATEGORY -->
            </div>
            <!-- /TABLE COLUMN -->

            <!-- TABLE COLUMN -->
            <div class="table-column centered padded-medium">
                <!-- TABLE TITLE -->
                <p class="table-title">44</p>
                <!-- /TABLE TITLE -->
            </div>
            <!-- /TABLE COLUMN -->

            <!-- TABLE COLUMN -->
            <div class="table-column centered padded-medium">
                <!-- TABLE TITLE -->
                <p class="table-title">236</p>
                <!-- /TABLE TITLE -->
            </div>
            <!-- /TABLE COLUMN -->

            <!-- TABLE COLUMN -->
            <div class="table-column padded-big-left">
                <!-- TABLE LINK -->
                <a class="table-link" href="forums-discussion.html">Bebop Publishing will release a limited edition of "Justice"</a>
                <!-- /TABLE LINK -->

                <!-- TABLE LINK -->
                <a class="table-link" href="forums-discussion.html">This is the first image of the new "Multiverse" movie!</a>
                <!-- /TABLE LINK -->

                <!-- TABLE LINK -->
                <a class="table-link" href="forums-discussion.html">What actor do you think should play the new Captain?</a>
                <!-- /TABLE LINK -->
            </div>
            <!-- /TABLE COLUMN -->
        </div>
        <!-- /TABLE ROW -->

        <!-- TABLE ROW -->
        <div class="table-row big">
            <!-- TABLE COLUMN -->
            <div class="table-column">
                <!-- FORUM CATEGORY -->
                <div class="forum-category">
                    <!-- FORUM CATEGORY IMAGE -->
                    <a href="forums-category.html">
                        <img class="forum-category-image" src="/assets/img/forum/category/08.png" alt="category-08">
                    </a>
                    <!-- /FORUM CATEGORY IMAGE -->

                    <!-- FORUM CATEGORY INFO -->
                    <div class="forum-category-info">
                        <!-- FORUM CATEGORY TITLE -->
                        <p class="forum-category-title"><a href="forums-category.html">Anime &amp; Manga</a></p>
                        <!-- /FORUM CATEGORY TITLE -->

                        <!-- FORUM CATEGORY TEXT -->
                        <p class="forum-category-text">Everything about the gaming world! News, reviews, upcoming games and more!</p>
                        <!-- /FORUM CATEGORY TEXT -->
                    </div>
                    <!-- /FORUM CATEGORY INFO -->
                </div>
                <!-- /FORUM CATEGORY -->
            </div>
            <!-- /TABLE COLUMN -->

            <!-- TABLE COLUMN -->
            <div class="table-column centered padded-medium">
                <!-- TABLE TITLE -->
                <p class="table-title">23</p>
                <!-- /TABLE TITLE -->
            </div>
            <!-- /TABLE COLUMN -->

            <!-- TABLE COLUMN -->
            <div class="table-column centered padded-medium">
                <!-- TABLE TITLE -->
                <p class="table-title">109</p>
                <!-- /TABLE TITLE -->
            </div>
            <!-- /TABLE COLUMN -->

            <!-- TABLE COLUMN -->
            <div class="table-column padded-big-left">
                <!-- TABLE LINK -->
                <a class="table-link" href="forums-discussion.html">Come and discuss that new "Power X" transformation</a>
                <!-- /TABLE LINK -->

                <!-- TABLE LINK -->
                <a class="table-link" href="forums-discussion.html">Hunter's manga chapter 526 will release in December</a>
                <!-- /TABLE LINK -->

                <!-- TABLE LINK -->
                <a class="table-link" href="forums-discussion.html">A new animation studio will take over after this month</a>
                <!-- /TABLE LINK -->
            </div>
            <!-- /TABLE COLUMN -->
        </div>
        <!-- /TABLE ROW -->
    </div>
    <!-- /TABLE BODY -->
</div>
<!-- /TABLE -->
@endif

@if(count($topics) > 0)
<!-- TABLE -->
<div class="table table-forum-discussion">
    <!-- TABLE HEADER -->
    <div class="table-header">
        <!-- TABLE HEADER COLUMN -->
        <div class="table-header-column">
            <!-- TABLE HEADER TITLE -->
            <p class="table-header-title">Discussion</p>
            <!-- /TABLE HEADER TITLE -->
        </div>
        <!-- /TABLE HEADER COLUMN -->

        <!-- TABLE HEADER COLUMN -->
        <div class="table-header-column centered padded-medium">
            <!-- TABLE HEADER TITLE -->
            <p class="table-header-title">Voices</p>
            <!-- /TABLE HEADER TITLE -->
        </div>
        <!-- /TABLE HEADER COLUMN -->

        <!-- TABLE HEADER COLUMN -->
        <div class="table-header-column centered padded-medium">
            <!-- TABLE HEADER TITLE -->
            <p class="table-header-title">Replies</p>
            <!-- /TABLE HEADER TITLE -->
        </div>
        <!-- /TABLE HEADER COLUMN -->

        <!-- TABLE HEADER COLUMN -->
        <div class="table-header-column padded-big-left">
            <!-- TABLE HEADER TITLE -->
            <p class="table-header-title">Activity</p>
            <!-- /TABLE HEADER TITLE -->
        </div>
        <!-- /TABLE HEADER COLUMN -->
    </div>
    <!-- /TABLE HEADER -->

    <!-- TABLE BODY -->
    <div class="table-body">
        @foreach($topics as $topic)
        <!-- TABLE ROW -->
        <div class="table-row medium">
            <!-- TABLE COLUMN -->
            <div class="table-column">
                <!-- DISCUSSION PREVIEW -->
                <div class="discussion-preview">
                    <!-- DISCUSSION PREVIEW TITLE -->
                    <a class="discussion-preview-title" href="{{route('getForumPost', ['categorie' => $topic->model->slag, 'post' => $topic->key ])}}">{{$topic->title}}</a>
                    <!-- /DISCUSSION PREVIEW TITLE -->

                    <!-- DISCUSSION PREVIEW META -->
                    <div class="discussion-preview-meta">
                        <!-- DISCUSSION PREVIEW META TEXT -->
                        <p class="discussion-preview-meta-text">Started by</p>
                        <!-- /DISCUSSION PREVIEW META TEXT -->

                        <!-- USER AVATAR -->
                        <a class="user-avatar micro no-border" href="{{route('getForumPost', ['categorie' => $topic->model->slag, 'post' => $topic->key ])}}">
                            <!-- USER AVATAR CONTENT -->
                            <div class="user-avatar-content">
                                <!-- HEXAGON -->
                                <div class="hexagon-image-18-20" data-src="{{$topic->user->avatar}}"></div>
                                <!-- /HEXAGON -->
                            </div>
                            <!-- /USER AVATAR CONTENT -->
                        </a>
                        <!-- /USER AVATAR -->

                        <!-- DISCUSSION PREVIEW META TEXT -->
                        <p class="discussion-preview-meta-text"><a href="{{route('userPublicProfileGet', ['user' => $topic->user->username])}}">{{$topic->user->full_name}}</a> {{$topic->sincePost()}}</p>
                        <!-- /DISCUSSION PREVIEW META TEXT -->
                    </div>
                    <!-- /DISCUSSION PREVIEW META -->
                </div>
                <!-- /DISCUSSION PREVIEW -->
            </div>
            <!-- /TABLE COLUMN -->

            <!-- TABLE COLUMN -->
            <div class="table-column centered padded-medium">
                <!-- TABLE TITLE -->
                <p class="table-title">{{count($topic->reactions)}}</p>
                <!-- /TABLE TITLE -->
            </div>
            <!-- /TABLE COLUMN -->

            <!-- TABLE COLUMN -->
            <div class="table-column centered padded-medium">
                <!-- TABLE TITLE -->
                <p class="table-title">{{$topic->comments}}</p>
                <!-- /TABLE TITLE -->
            </div>
            <!-- /TABLE COLUMN -->

            <!-- TABLE COLUMN -->
            <div class="table-column padded-big-left">
                @if($topic->comments > 0)
                @php
                $lastComment = $topic->getLastComment();
                @endphp
                <!-- USER STATUS -->
                <div class="user-status">
                    <!-- USER STATUS AVATAR -->
                    <a class="user-status-avatar" href="{{route('userPublicProfileGet', ['user' => $lastComment->user->username])}}">
                        <!-- USER AVATAR -->
                        <div class="user-avatar small no-outline">
                            <!-- USER AVATAR CONTENT -->
                            <div class="user-avatar-content">
                                <!-- HEXAGON -->
                                <div class="hexagon-image-30-32" data-src="{{$lastComment->user->avatar ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                                <!-- /HEXAGON -->
                            </div>
                            <!-- /USER AVATAR CONTENT -->

                            <!-- USER AVATAR PROGRESS -->
                            <div class="user-avatar-progress">
                                <!-- HEXAGON -->
                                @if($lastComment->user->gender == "Male")
                                <div class="hexagon-progress-40-44-male"></div>
                                @elseif($lastComment->user->gender == "Female")
                                <div class="hexagon-progress-40-44-female"></div>
                                @elseif($lastComment->user->gender == "Other")
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
                    <p class="user-status-title"><a class="bold" href="{{route('userPublicProfileGet', ['user' => $lastComment->user->username])}}">{{$lastComment->user->full_name}}</a></p>
                    <!-- /USER STATUS TITLE -->

                    <!-- USER STATUS TEXT -->
                    <p class="user-status-text small">{{$lastComment->sincePost()}}</p>
                    <!-- /USER STATUS TEXT -->
                </div>
                <!-- /USER STATUS -->
                @endif
            </div>
            <!-- /TABLE COLUMN -->
        </div>
        <!-- /TABLE ROW -->
        @endforeach
    </div>
    <!-- /TABLE BODY -->
</div>
<!-- /TABLE -->
@else
<p><br>No discussions.</p>
@endif

@if(false)
<!-- SECTION PAGER BAR -->
<div class="section-pager-bar">
    <!-- SECTION PAGER -->
    <div class="section-pager">
        <!-- SECTION PAGER ITEM -->
        <div class="section-pager-item active">
            <!-- SECTION PAGER ITEM TEXT -->
            <p class="section-pager-item-text">01</p>
            <!-- /SECTION PAGER ITEM TEXT -->
        </div>
        <!-- /SECTION PAGER ITEM -->

        <!-- SECTION PAGER ITEM -->
        <div class="section-pager-item">
            <!-- SECTION PAGER ITEM TEXT -->
            <p class="section-pager-item-text">02</p>
            <!-- /SECTION PAGER ITEM TEXT -->
        </div>
        <!-- /SECTION PAGER ITEM -->

        <!-- SECTION PAGER ITEM -->
        <div class="section-pager-item">
            <!-- SECTION PAGER ITEM TEXT -->
            <p class="section-pager-item-text">03</p>
            <!-- /SECTION PAGER ITEM TEXT -->
        </div>
        <!-- /SECTION PAGER ITEM -->

        <!-- SECTION PAGER ITEM -->
        <div class="section-pager-item">
            <!-- SECTION PAGER ITEM TEXT -->
            <p class="section-pager-item-text">04</p>
            <!-- /SECTION PAGER ITEM TEXT -->
        </div>
        <!-- /SECTION PAGER ITEM -->

        <!-- SECTION PAGER ITEM -->
        <div class="section-pager-item">
            <!-- SECTION PAGER ITEM TEXT -->
            <p class="section-pager-item-text">05</p>
            <!-- /SECTION PAGER ITEM TEXT -->
        </div>
        <!-- /SECTION PAGER ITEM -->

        <!-- SECTION PAGER ITEM -->
        <div class="section-pager-item">
            <!-- SECTION PAGER ITEM TEXT -->
            <p class="section-pager-item-text">06</p>
            <!-- /SECTION PAGER ITEM TEXT -->
        </div>
        <!-- /SECTION PAGER ITEM -->
    </div>
    <!-- /SECTION PAGER -->

    <!-- SECTION PAGER CONTROLS -->
    <div class="section-pager-controls">
        <!-- SLIDER CONTROL -->
        <div class="slider-control left disabled">
            <!-- SLIDER CONTROL ICON -->
            <svg class="slider-control-icon icon-small-arrow">
                <use xlink:href="#svg-small-arrow"></use>
            </svg>
            <!-- /SLIDER CONTROL ICON -->
        </div>
        <!-- /SLIDER CONTROL -->

        <!-- SLIDER CONTROL -->
        <div class="slider-control right">
            <!-- SLIDER CONTROL ICON -->
            <svg class="slider-control-icon icon-small-arrow">
                <use xlink:href="#svg-small-arrow"></use>
            </svg>
            <!-- /SLIDER CONTROL ICON -->
        </div>
        <!-- /SLIDER CONTROL -->
    </div>
    <!-- /SECTION PAGER CONTROLS -->
</div>
<!-- /SECTION PAGER BAR -->
@endif

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


