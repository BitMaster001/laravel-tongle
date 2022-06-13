<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
    <meta name="request" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0,  minimum-scale=1"> 
    @include('layouts.partial.stylesheets')
    @yield('stylesheets')

    <!-- favicon -->
    <link rel="icon" href="/assets/img/favicon.ico">
    <title>@yield('title') | {{env('APP_NAME')}}</title>
</head>
<body>

<!-- PAGE LOADER -->
@include('layouts.loader.loader')
<!-- /PAGE LOADER -->

<!-- NAVIGATION WIDGET -->
@include('layouts.sidebar.sidebar')
<!-- /NAVIGATION WIDGET -->

<!-- NAVIGATION WIDGET -->
@include('layouts.sidebar.desktop')
<!-- /NAVIGATION WIDGET -->

<!-- NAVIGATION WIDGET -->
@include('layouts.sidebar.mobile')
<!-- /NAVIGATION WIDGET -->

@if(true)
<!-- CHAT WIDGET -->
@include('layouts.message.friends')
<!-- /CHAT WIDGET -->
@if(true)
<!-- CHAT WIDGET -->
@include('layouts.message.chat')
<!-- /CHAT WIDGET -->
@endif
@endif

<!-- HEADER -->
@include('layouts.header.header')
<!-- /HEADER -->

<!-- FLOATY BAR -->
@include('layouts.header.mobile')
<!-- /FLOATY BAR -->

<!-- CONTENT GRID -->
<div class="content-grid">
@include('layouts.partial.top-bar-message')
@yield('content')
</div>
<!-- /CONTENT GRID -->

<!-- POPUP PICTURE -->
@include('layouts.partial.popup-picture')
<!-- /POPUP PICTURE -->
@include('home.newsfeed.posts.share')
@if($group ?? false)
@if($group->id>0)
<!-- POPUP BOX -->
<div class="popup-box small invite-friends-popup">
    <!-- POPUP CLOSE BUTTON -->
    <div class="popup-close-button group-invite-friend">
        <!-- POPUP CLOSE BUTTON ICON -->
        <svg class="popup-close-button-icon icon-cross">
            <use xlink:href="#svg-cross"></use>
        </svg>
        <!-- /POPUP CLOSE BUTTON ICON -->
    </div>
    <!-- /POPUP CLOSE BUTTON -->

    <!-- POPUP BOX TITLE -->
    <p class="popup-box-title"> Invite Friends</p>
    <!-- /POPUP BOX TITLE -->

    <!-- FORM -->
    <form class="form" method="get" action="{{route('userGroupshipInviteGet', ['group' => $group->username])}}">
        <!-- FORM ROW -->
        <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
                <!-- FORM INPUT -->
                <div class="new-post-tag-friends new-invite-friends" id="new-invite-friends-block" style="display: none;">
                    <textarea class="new-post-tag-friends-input new-invite-friends" id="new-invite-friends" name="new-invite-friends" placeholder="Invite Friends" required></textarea>
                </div>
                <!-- /FORM INPUT -->
            </div>
            <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->

        <!-- POPUP BOX ACTIONS -->
        <div class="popup-box-actions medium void">
            <!-- POPUP BOX ACTION -->
            <button class="popup-box-action full button secondary">Invite Now!</button>
            <!-- /POPUP BOX ACTION -->
        </div>
        <!-- /POPUP BOX ACTIONS -->
    </form>
    <!-- /FORM -->
</div>
<!-- /POPUP BOX -->
@endif
@endif

@include('layouts.partial.scripts')
@yield('scripts')
@include('layouts.partial.notify')
</body>
</html>
