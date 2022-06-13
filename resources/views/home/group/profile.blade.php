@extends('layouts.app')

@section('title')
{{$group->username}}
@endsection

@section('content')
<!-- PROFILE HEADER -->
@include('home.group.partial.profile-header')
<!-- /PROFILE HEADER -->

@if($public)
<!-- SECTION NAVIGATION -->
@include('home.group.partial.profile-navigation')
<!-- /SECTION NAVIGATION -->


<!-- GRID -->
<div class="grid grid-3-6-3">
    <!-- GRID COLUMN -->
    <div class="grid-column">
        <!-- WIDGET BOX -->
        @include('home.group.partial.widgets.social')
        <!-- /WIDGET BOX -->
        <!-- WIDGET BOX -->
        @include('home.group.partial.widgets.about')
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
        @include('home.group.partial.widgets.organizer')
        <!-- /WIDGET BOX -->
        <!-- WIDGET BOX -->
        @include('home.group.partial.widgets.members')
        <!-- /WIDGET BOX -->
        <!-- WIDGET BOX -->
        @include('home.group.partial.widgets.events')
        <!-- /WIDGET BOX -->
    </div>
    <!-- /GRID COLUMN -->
</div>
<!-- /GRID -->
@endif
@endsection

@section('stylesheets')
@if($public)
<link rel="stylesheet" href="/assets/vendor/tagify/tagify.css">
<link rel="stylesheet" href="/assets/vendor/quill/quill.css">
<link rel="stylesheet" href="/assets/css/custom-tagify.css">
@endif
@endsection

@section('scripts')
@if($public)
<!-- Tagify js -->
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
<!-- group js -->
<script src="/assets/js/pages/home/group/group.js?v=1.0.0"></script>
<!-- shares js -->
<script src="/assets/js/widgets/posts/shares.js?v=1.0.0"></script>
@endif
@endsection



