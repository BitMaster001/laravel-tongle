@extends('layouts.app')

@section('title')
Q & A
@endsection

@section('content')

    <!-- SECTION BANNER -->
    <div class="section-banner section-banner-1">
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
        <p class="section-pretitle">Q & A Discussion</p>
        <!-- /SECTION PRETITLE -->

        <!-- SECTION TITLE -->
        <h2 class="section-title">{{$topic->title}}</h2>
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
            <p class="section-filters-bar-title"><a href="{{route('getForum')}}">Q & A</a><span class="separator"></span><a href="{{route('getForumCategorie', ['categorie' => $topic->model->slag])}}">{{$topic->model->name}}</a><span class="separator"></span><a href="{{route('getForumPost', ['categorie' => $topic->model->slag, 'post' => $topic->key ])}}">{{$topic->title}}</a></p>
            <!-- /SECTION FILTERS BAR TITLE -->
            @php
            $lastComment = $topic->getLastComment();
            @endphp

            @if($lastComment)
            <!-- SECTION FILTERS BAR TEXT -->
            <div class="section-filters-bar-text small-space">
                Last replay by
                <!-- USER AVATAR -->
                <a class="user-avatar micro no-stats" href="{{route('userPublicProfileGet', ['user' => $lastComment->user->username])}}">
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
                        <div class="hexagon-image-18-20" data-src="{{$lastComment->user->avatar}}"></div>
                        <!-- /HEXAGON -->
                    </div>
                    <!-- /USER AVATAR CONTENT -->
                </a>
                <!-- /USER AVATAR -->
                <a class="bold" href="{{route('userPublicProfileGet', ['user' => $lastComment->user->username])}}">{{$lastComment->user->full_name}}</a>
                {{$lastComment->sincePost()}}
            </div>
            <!-- /SECTION FILTERS BAR TEXT -->
            @endif
        </div>
        <!-- /SECTION FILTERS BAR INFO -->
    </div>
    <!-- /SECTION FILTERS BAR ACTIONS -->
</div>
<!-- /SECTION FILTERS BAR -->

<!-- GRID -->
<div class="grid grid-9-3">
    <!-- FORUM CONTENT -->
    <div class="forum-content">
        <!-- FORUM POST HEADER -->
        <div class="forum-post-header">
            <!-- FORUM POST HEADER TITLE -->
            <p class="forum-post-header-title">Author</p>
            <!-- /FORUM POST HEADER TITLE -->

            <!-- FORUM POST HEADER TITLE -->
            <p class="forum-post-header-title">Post</p>
            <!-- /FORUM POST HEADER TITLE -->
        </div>
        <!-- /FORUM POST HEADER -->

        <!-- FORUM POST LIST -->
        <div class="forum-post-list">
            <!-- FORUM POST -->
            <div class="forum-post">
                <!-- FORUM POST META -->
                <div class="forum-post-meta">
                    <!-- FORUM POST TIMESTAMP -->
                    <p class="forum-post-timestamp">{{$topic->sincePost()}}</p>
                    <!-- /FORUM POST TIMESTAMP -->

                    <!-- FORUM POST ACTIONS -->
                    <div class="forum-post-actions">
                        @if(Auth::user() == $topic->user)
                        <!-- FORUM POST ACTION -->
                        <a class="forum-post-action light" href="{{route('getForumManagePost', ['categorie' => $topic->model->slag, 'post' => $topic->key])}}">Edit</a>
                        <!-- /FORUM POST ACTION -->
                        @endif
                        @if(false)
                        <!-- FORUM POST ACTION -->
                        <p class="forum-post-action">Reply</p>
                        <!-- /FORUM POST ACTION -->
                        @endif
                    </div>
                    <!-- /FORUM POST ACTIONS -->
                </div>
                <!-- /FORUM POST META -->

                <!-- FORUM POST CONTENT -->
                <div class="forum-post-content">
                    <!-- FORUM POST USER -->
                    <div class="forum-post-user">
                        <!-- USER AVATAR -->
                        <a class="user-avatar no-outline" href="{{route('userPublicProfileGet', ['user' => $topic->user->username])}}">
                            <!-- USER AVATAR CONTENT -->
                            <div class="user-avatar-content">
                                <!-- HEXAGON -->
                                <div class="hexagon-image-68-74" data-src="{{$topic->user->avatar}}"></div>
                                <!-- /HEXAGON -->
                            </div>
                            <!-- /USER AVATAR CONTENT -->

                            <!-- USER AVATAR PROGRESS -->
                            <div class="user-avatar-progress">
                                <!-- HEXAGON -->
                                @if($topic->user->gender == "Male")
                                <div class="hexagon-progress-84-92-male"></div>
                                @elseif($topic->user->gender == "Female")
                                <div class="hexagon-progress-84-92-female"></div>
                                @elseif($topic->user->gender == "Other")
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
                        <!-- /USER AVATAR -->

                        <!-- USER AVATAR -->
                        <a class="user-avatar small no-outline" href="{{route('userPublicProfileGet', ['user' => $topic->user->username])}}">
                            <!-- USER AVATAR CONTENT -->
                            <div class="user-avatar-content">
                                <!-- HEXAGON -->
                                <div class="hexagon-image-30-32" data-src="{{$topic->user->avatar}}"></div>
                                <!-- /HEXAGON -->
                            </div>
                            <!-- /USER AVATAR CONTENT -->

                            <!-- USER AVATAR PROGRESS -->
                            <div class="user-avatar-progress">
                                <!-- HEXAGON -->
                                @if($topic->user->gender == "Male")
                                <div class="hexagon-progress-40-44-male"></div>
                                @elseif($topic->user->gender == "Female")
                                <div class="hexagon-progress-40-44-female"></div>
                                @elseif($topic->user->gender == "Other")
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
                        </a>
                        <!-- /USER AVATAR -->

                        <!-- FORUM POST USER TITLE -->
                        <p class="forum-post-user-title"><a href="{{route('userPublicProfileGet', ['user' => $topic->user->username])}}">{{$topic->user->full_name}}</a></p>
                        <!-- /FORUM POST USER TITLE -->

                        <!-- FORUM POST USER TITLE -->
                        <p class="forum-post-user-text"><a href="{{route('userPublicProfileGet', ['user' => $topic->user->username])}}">{{'@'.$topic->user->username}}</a></p>
                        <!-- /FORUM POST USER TITLE -->

                        <!-- FORUM POST USER TAG -->
                        <p class="forum-post-user-tag organizer">AUTHOR</p>
                        <!-- /FORUM POST USER TAG -->
                    </div>
                    <!-- /FORUM POST USER -->

                    <!-- FORUM POST INFO -->
                    <div class="forum-post-info">
                        <!-- FORUM POST PARAGRAPH -->
                            {!!$topic->body!!}
                        <!-- /FORUM POST PARAGRAPH -->
                    </div>
                    <!-- /FORUM POST INFO -->
                </div>
                <!-- /FORUM POST CONTENT -->
            </div>
            <!-- /FORUM POST -->
        @if($topic->comments != null)
            @foreach($topic->comments()->get() as $comment)
            <!-- FORUM POST -->
            <div class="forum-post">
                <!-- FORUM POST META -->
                <div class="forum-post-meta">
                    <!-- FORUM POST TIMESTAMP -->
                    <p class="forum-post-timestamp">{{$comment->sincePost()}}</p>
                    <!-- /FORUM POST TIMESTAMP -->

                    <!-- FORUM POST ACTIONS -->
                    <div class="forum-post-actions">
                        @if($comment->user == Auth::user())
                        <!-- FORUM POST ACTION -->
                        <a class="forum-post-action light" href="{{route('getForumDeleteComment', ['categorie' => $topic->model->slag, 'post' => $topic->key, 'comment' => $comment->key ])}}">Delete</a>
                        <!-- /FORUM POST ACTION -->
                        @endif
                        @if(false)
                        <!-- FORUM POST ACTION -->
                        <p class="forum-post-action">Reply</p>
                        <!-- /FORUM POST ACTION -->
                        @endif
                    </div>
                    <!-- /FORUM POST ACTIONS -->
                </div>
                <!-- /FORUM POST META -->

                <!-- FORUM POST CONTENT -->
                <div class="forum-post-content">
                    <!-- FORUM POST USER -->
                    <div class="forum-post-user">
                        <!-- USER AVATAR -->
                        <a class="user-avatar no-outline" href="{{route('userPublicProfileGet', ['user' => $comment->user->username])}}">
                            <!-- USER AVATAR CONTENT -->
                            <div class="user-avatar-content">
                                <!-- HEXAGON -->
                                <div class="hexagon-image-68-74" data-src="{{$comment->user->avatar}}"></div>
                                <!-- /HEXAGON -->
                            </div>
                            <!-- /USER AVATAR CONTENT -->

                            <!-- USER AVATAR PROGRESS -->
                            <div class="user-avatar-progress">
                                <!-- HEXAGON -->
                                @if($comment->user->gender == "Male")
                                <div class="hexagon-progress-84-92-male"></div>
                                @elseif($comment->user->gender == "Female")
                                <div class="hexagon-progress-84-92-female"></div>
                                @elseif($comment->user->gender == "Other")
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
                        <!-- /USER AVATAR -->

                        <!-- USER AVATAR -->
                        <a class="user-avatar small no-outline" href="{{route('userPublicProfileGet', ['user' => $comment->user->username])}}">
                            <!-- USER AVATAR CONTENT -->
                            <div class="user-avatar-content">
                                <!-- HEXAGON -->
                                <div class="hexagon-image-30-32" data-src="{{$comment->user->avatar}}"></div>
                                <!-- /HEXAGON -->
                            </div>
                            <!-- /USER AVATAR CONTENT -->

                            <!-- USER AVATAR PROGRESS -->
                            <div class="user-avatar-progress">
                                <!-- HEXAGON -->
                                @if($comment->user->gender == "Male")
                                <div class="hexagon-progress-40-44-male"></div>
                                @elseif($comment->user->gender == "Female")
                                <div class="hexagon-progress-40-44-female"></div>
                                @elseif($comment->user->gender == "Other")
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

                        </a>
                        <!-- /USER AVATAR -->

                        <!-- FORUM POST USER TITLE -->
                        <p class="forum-post-user-title"><a href="{{route('userPublicProfileGet', ['user' => $comment->user->username])}}">{{$comment->user->full_name}}</a></p>
                        <!-- /FORUM POST USER TITLE -->

                        <!-- FORUM POST USER TITLE -->
                        <p class="forum-post-user-text"><a href="{{route('userPublicProfileGet', ['user' => $comment->user->username])}}">{{'@'.$comment->user->username}}</a></p>
                        <!-- /FORUM POST USER TITLE -->

                        <!-- FORUM POST USER TAG -->
                        @if($comment->user == $topic->user)
                        <p class="forum-post-user-tag organizer">AUTHOR</p>
                        @else
                        <p class="forum-post-user-tag">Participant</p>
                        @endif
                        <!-- /FORUM POST USER TAG -->
                    </div>
                    <!-- /FORUM POST USER -->

                    <!-- FORUM POST INFO -->
                    <div class="forum-post-info">
                        <!-- FORUM POST PARAGRAPH -->
                        <p class="forum-post-paragraph">{{$comment->body}}</p>
                        <!-- /FORUM POST PARAGRAPH -->
                    </div>
                    <!-- /FORUM POST INFO -->
                </div>
                <!-- /FORUM POST CONTENT -->
            </div>
            <!-- /FORUM POST -->
            @endforeach
        @endif

        </div>
        <!-- /FORUM POST LIST -->

        @if(false)
        <!-- SECTION PAGER BAR WRAP -->
        <div class="section-pager-bar-wrap align-right">
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
        </div>
        <!-- /SECTION PAGER BAR WRAP -->
        @endif

        <!-- QUICK POST -->
        <div class="quick-post medium">
            <!-- FORM -->
            <form class="form" method="post" action="{{route('getForumPostComment', ['categorie' => $topic->model->slag, 'post' => $topic->key ])}}">
                @csrf
            <!-- QUICK POST HEADER -->
            <div class="quick-post-header">
                <!-- QUICK POST HEADER TITLE -->
                <p class="quick-post-header-title">Leave a Reply</p>
                <!-- /QUICK POST HEADER TITLE -->
            </div>
            <!-- /QUICK POST HEADER -->

            <!-- QUICK POST BODY -->
            <div class="quick-post-body">

                    <!-- FORM ROW -->
                    <div class="form-row">
                        <!-- FORM ITEM -->
                        <div class="form-item">
                            <!-- FORM TEXTAREA -->
                            <div class="form-textarea">
                                <textarea id="forum-post-text" name="body" placeholder="Reply..."></textarea>
                            </div>
                            <!-- /FORM TEXTAREA -->
                        </div>
                        <!-- /FORM ITEM -->
                    </div>
                    <!-- /FORM ROW -->
            </div>
            <!-- /QUICK POST BODY -->

            <!-- QUICK POST FOOTER -->
            <div class="quick-post-footer">
                <!-- QUICK POST FOOTER ACTIONS -->
                <div class="quick-post-footer-actions">
                    <a href="{{route('getForumPostVote', ['categorie' => $topic->model->slag, 'post' => $topic->key ])}}">
                    <!-- QUICK POST FOOTER ACTION -->
                    <div class="quick-post-footer-action text-tooltip-tft-medium" data-title="Add your voice">
                        <!-- QUICK POST FOOTER ACTION ICON -->
                        <svg class="quick-post-footer-action-icon icon-camera">
                            <use xlink:href="#svg-thumbs-up"></use>
                        </svg>
                        <!-- /QUICK POST FOOTER ACTION ICON -->
                    </div>
                    <!-- /QUICK POST FOOTER ACTION -->
                    </a>
                </div>
                <!-- /QUICK POST FOOTER ACTIONS -->

                <!-- QUICK POST FOOTER ACTIONS -->
                <div class="quick-post-footer-actions">
                    <!-- BUTTON -->
                    <a class="button void" href="">Discard</a>
                    <!-- /BUTTON -->

                    <!-- BUTTON -->
                    <button class="button secondary">Post Reply</button>
                    <!-- /BUTTON -->
                </div>
                <!-- /QUICK POST FOOTER ACTIONS -->
            </div>
            <!-- /QUICK POST FOOTER -->
            </form>
            <!-- FORM -->
        </div>
        <!-- /QUICK POST -->
    </div>
    <!-- /FORUM CONTENT -->

    <!-- FORUM SIDEBAR -->
    <div class="forum-sidebar grid-column">
        <!-- STATS DECORATION -->
        <div class="stats-decoration secondary">
            <!-- STATS DECORATION ICON WRAP -->
            <div class="stats-decoration-icon-wrap">
                <!-- STATS DECORATION ICON -->
                <svg class="stats-decoration-icon icon-thumbs-up">
                    <use xlink:href="#svg-thumbs-up"></use>
                </svg>
                <!-- /STATS DECORATION ICON -->
            </div>
            <!-- /STATS DECORATION ICON WRAP -->

            <!-- STATS DECORATION TITLE -->
            <p class="stats-decoration-title">{{count($topic->reactions ?? [])}}</p>
            <!-- /STATS DECORATION TITLE -->

            <!-- STATS DECORATION TEXT -->
            <p class="stats-decoration-text">Voices</p>
            <!-- /STATS DECORATION TEXT -->
        </div>
        <!-- /STATS DECORATION -->

        <!-- STATS DECORATION -->
        <div class="stats-decoration primary">
            <!-- STATS DECORATION ICON WRAP -->
            <div class="stats-decoration-icon-wrap">
                <!-- STATS DECORATION ICON -->
                <svg class="stats-decoration-icon icon-members">
                    <use xlink:href="#svg-members"></use>
                </svg>
                <!-- /STATS DECORATION ICON -->
            </div>
            <!-- /STATS DECORATION ICON WRAP -->

            <!-- STATS DECORATION TITLE -->
            <p class="stats-decoration-title">{{$topic->comments}}</p>
            <!-- /STATS DECORATION TITLE -->

            <!-- STATS DECORATION TEXT -->
            <p class="stats-decoration-text">Replies</p>
            <!-- /STATS DECORATION TEXT -->
        </div>
        <!-- /STATS DECORATION -->
    </div>
    <!-- /FORUM SIDEBAR -->
</div>
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


