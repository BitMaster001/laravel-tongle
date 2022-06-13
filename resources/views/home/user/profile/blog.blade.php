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
<br>
    <!-- POST OPEN -->
    <article class="post-open">
        <!-- POST OPEN COVER -->
        <figure class="post-open-cover liquid">
            <img src="{{$blog->cover}}">
        </figure>
        <!-- /POST OPEN COVER -->

        <!-- POST OPEN BODY -->
        <div class="post-open-body">
            <!-- POST OPEN HEADING -->
            <div class="post-open-heading">
                <!-- POST OPEN TIMESTAMP -->
                <p class="post-open-timestamp"><span class="highlighted">{{$blog->sincePost()}}</span>{{$blog->time_to_read}} mins read</p>
                <!-- /POST OPEN TIMESTAMP -->

                <!-- POST OPEN TITLE -->
                <h2 class="post-open-title">{{$blog->title}}</h2>
                <!-- /POST OPEN TITLE -->
            </div>
            <!-- /POST OPEN HEADING -->

            <!-- POST OPEN CONTENT -->
            <div class="post-open-content">
                <!-- POST OPEN CONTENT BODY -->
                <div class="post-open-content-body post-preview-text post-preview-info" style="width: 100%;">
                   {!!$blog->body!!}
                </div>
                <!-- /POST OPEN CONTENT BODY -->
            </div>
            <!-- /POST OPEN CONTENT -->
        </div>
        <!-- /POST OPEN BODY -->
    </article>
    <!-- /POST OPEN -->
@endsection

@section('stylesheets')
@endsection

@section('scripts')
@endsection
