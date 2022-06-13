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
@php
$blogs = $user->getUserBlogs();
@endphp
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
            <h2 class="section-title">Blog Posts <span class="highlighted">{{count($blogs)}}</span></h2>
            <!-- /SECTION TITLE -->
        </div>
        <!-- /SECTION HEADER INFO -->
    </div>
    <!-- /SECTION HEADER -->

    <!-- GRID -->
    <div class="grid grid-4-4-4 centered">
        @foreach($blogs as $blog)
        <!-- POST PREVIEW -->
        <div class="post-preview">
            <!-- POST PREVIEW IMAGE -->
            <a href="{{Auth::user() == $user ? route('getBlog', ['blog' => $blog->key]) : route('getUserBlog', ['user' => $user->username, 'blog' => $blog->key])}}">
            <figure class="post-preview-image liquid">
                <img src="{{$blog->cover}}">
            </figure>
            </a>
            <!-- /POST PREVIEW IMAGE -->

            <!-- POST PREVIEW INFO -->
            <div class="post-preview-info fixed-height">
                <!-- POST PREVIEW INFO TOP -->
                <div class="post-preview-info-top">
                    <!-- POST PREVIEW TIMESTAMP -->
                    <p class="post-preview-timestamp">{{$blog->sincePost()}}</p>
                    <!-- /POST PREVIEW TIMESTAMP -->

                    <!-- POST PREVIEW TITLE -->
                    <a href="{{Auth::user() == $user ? route('getBlog', ['blog' => $blog->key]) : route('getUserBlog', ['user' => $user->username, 'blog' => $blog->key])}}">
                    <p class="post-preview-title">{{$blog->title}}</p>
                    </a>
                    <!-- /POST PREVIEW TITLE -->
                </div>
                <!-- /POST PREVIEW INFO TOP -->

                <!-- POST PREVIEW INFO BOTTOM -->
                <div class="post-preview-info-bottom" style="overflow: hidden;">
                    <!-- POST PREVIEW TEXT -->
                    <a href="{{Auth::user() == $user ? route('getBlog', ['blog' => $blog->key]) : route('getUserBlog', ['user' => $user->username, 'blog' => $blog->key])}}">
                    <p class="post-preview-text">{!!$blog->body!!}</p>
                    </a>
                    <!-- /POST PREVIEW TEXT -->
                </div>
                <!-- /POST PREVIEW INFO BOTTOM -->
            </div>
            <!-- /POST PREVIEW INFO -->
        </div>
        <!-- /POST PREVIEW -->
        @endforeach
    </div>
    <!-- /GRID -->
</section>
<!-- /SECTION -->
@endsection

@section('stylesheets')
@endsection

@section('scripts')
@endsection
