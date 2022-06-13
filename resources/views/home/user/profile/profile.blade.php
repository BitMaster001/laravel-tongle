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
        @if($user == Auth::user())
        <!-- WIDGET BOX -->
        @include('home.newsfeed.widgets.events')
        <!-- /WIDGET BOX -->
        @endif

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
@if($newsfeed && $profileName)
<script>
    newsfeed = '{{$newsfeed}}';
    profileName = '{{$profileName}}';
</script>
@endif
<!-- shares js -->
<script src="/assets/js/widgets/posts/shares.js"></script>
@endsection


