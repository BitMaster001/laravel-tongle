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
        @include('home.group.partial.widgets.organizer')
        <!-- /WIDGET BOX -->
        <!-- WIDGET BOX -->
        @include('home.group.partial.widgets.social')
        <!-- /WIDGET BOX -->
    </div>
    <!-- /GRID COLUMN -->
    <!-- GRID COLUMN -->
    <div class="grid-column">
        <!-- WIDGET BOX -->
        @include('home.group.partial.widgets.rule')
        <!-- /WIDGET BOX -->
    </div>
    <!-- /GRID COLUMN -->
    <!-- GRID COLUMN -->
    <div class="grid-column">
        <!-- WIDGET BOX -->
        @include('home.group.partial.widgets.about')
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
<link rel="stylesheet" href="/assets/css/custom-tagify.css">
@endif
@endsection

@section('scripts')
@if($public)
<!-- posts js -->
<script src="/assets/vendor/tagify/tagify.min.js"></script>
<!-- posts js -->
<script src="/assets/js/widgets/posts/posts.js"></script>
<!-- group js -->
<script src="/assets/js/pages/home/group/group.js"></script>
@endif
@endsection



