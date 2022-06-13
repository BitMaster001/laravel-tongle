@extends('layouts.app')
@section('title', __('Newsfeed'))

@section('content')

    <!-- SECTION BANNER -->
    <div class="section-banner section-banner-3">
        <!-- SECTION BANNER ICON -->
        <img class="section-banner-icon" src="/assets/img/banner/newsfeed-icon.png" alt="newsfeed-icon">
        <!-- /SECTION BANNER ICON -->

        <!-- SECTION BANNER TITLE -->
        <p class="section-banner-title">Newsfeed</p>
        <!-- /SECTION BANNER TITLE -->

        <!-- SECTION BANNER TEXT -->
        <p class="section-banner-text">Check what your friends have been up to!</p>
        <!-- /SECTION BANNER TEXT -->
    </div>
    <!-- /SECTION BANNER -->

<!-- GRID -->
<div class="grid grid-3-6-3 mobile-prefer-content">
    <!-- GRID COLUMN -->
    <div class="grid-column">
        <!-- WIDGET BOX -->
        @include('home.newsfeed.widgets.members')
        <!-- /WIDGET BOX -->
        <!-- WIDGET BOX -->
        @include('home.newsfeed.widgets.groups')
        <!-- /WIDGET BOX -->
        <!-- WIDGET BOX -->
        @include('home.newsfeed.widgets.marketplace')
        <!-- /WIDGET BOX -->
    </div>
    <!-- /GRID COLUMN -->
    <!-- GRID COLUMN -->
    <div class="grid-column">
        <!-- WIDGET BOX -->
        @include('home.newsfeed.newsfeed')
        <!-- /WIDGET BOX -->
    </div>
    <!-- /GRID COLUMN -->
    <!-- GRID COLUMN -->
    <div class="grid-column">
        <!-- WIDGET BOX -->
        @include('home.newsfeed.widgets.stats')
        <!-- /WIDGET BOX -->
        <!-- WIDGET BOX -->
        @include('home.newsfeed.widgets.reactions')
        <!-- /WIDGET BOX -->
        <!-- WIDGET BOX -->
        @include('home.newsfeed.widgets.events')
        <!-- /WIDGET BOX -->
        <!-- WIDGET BOX -->
        @include('home.newsfeed.widgets.forums')
        <!-- /WIDGET BOX -->
    </div>
    <!-- /GRID COLUMN -->
</div>
<!-- /GRID -->
@endsection

@section('stylesheets')
<link rel="stylesheet" href="/assets/vendor/tagify/tagify.css">
<link rel="stylesheet" href="/assets/vendor/quill/quill.css">
<link rel="stylesheet" href="/assets/css/custom-tagify.css">
@endsection

@section('scripts')
<!-- posts js -->
<script src="/assets/vendor/tagify/tagify.min.js"></script>
<!-- Quill js -->
<script src="/assets/vendor/quill/quill.js"></script>
<!-- newsfeed js -->
<script src="/assets/js/widgets/newsfeed/newsfeed.js"></script>
<!-- posts js -->
<script src="/assets/js/widgets/posts/posts.js"></script>
<!-- comments js -->
<script src="/assets/js/widgets/newsfeed/comments.js"></script>
<!-- reactions js -->
<script src="/assets/js/widgets/newsfeed/reactions.js"></script>
<!-- shares js -->
<script src="/assets/js/widgets/posts/shares.js"></script>
@endsection


