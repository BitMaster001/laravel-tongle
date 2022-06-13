@extends('layouts.app')

@section('title')
Manage Groups
@endsection

@section('content')
<form class="form" method="post" action="{{route('settingsManageGroupsEditPost')}}" enctype="multipart/form-data">
    @csrf
    <!-- SECTION BANNER -->
    @include('home.user.profile.settings.partial.banner')
    <!-- /SECTION BANNER -->

    <!-- GRID -->
    <div class="grid grid-3-9 medium-space">
        <!-- GRID COLUMN -->
        @include('home.user.profile.settings.partial.sidebar')
        <!-- /GRID COLUMN -->

        <!-- GRID COLUMN -->
        <div class="account-hub-content">
            <!-- GRID COLUMN -->
            <div class="account-hub-content">
                <!-- SECTION HEADER -->
                <div class="section-header">
                    <!-- SECTION HEADER INFO -->
                    <div class="section-header-info">
                        <!-- SECTION PRETITLE -->
                        <p class="section-pretitle">Groups</p>
                        <!-- /SECTION PRETITLE -->

                        <!-- SECTION TITLE -->
                        <h2 class="section-title">{{$title}}</h2>
                        <!-- /SECTION TITLE -->
                    </div>
                    <!-- /SECTION HEADER INFO -->
                    @if($group->id)
                    <!-- SECTION HEADER ACTIONS -->
                    <div class="section-header-actions">
                        <!-- SECTION HEADER ACTION -->
                        <a href="{{route('groupGet', ['group' => $group->username])}}" class="section-header-action">Go to Group</a>
                        <!-- /SECTION HEADER ACTION -->

                        <!-- SECTION HEADER ACTION -->
                        <a href="{{route('settingsManageGroupsMembersGet', ['group' => $group->username])}}" class="section-header-action">Manage Members</a>
                        <!-- /SECTION HEADER ACTION -->
                    </div>
                    <!-- /SECTION HEADER ACTIONS -->
                    @endif
                </div>
                <!-- /SECTION HEADER -->

                <!-- GRID COLUMN -->
                <div class="grid-column">
                    <!-- GRID -->
                    <div class="grid grid-3-3-3 centered">
                        <!-- USER PREVIEW -->
                        <div class="user-preview small fixed-height">
                            <!-- USER PREVIEW COVER -->
                            <figure class="user-preview-cover liquid">
                                <img id="cover-preview" src="{{$group->cover ?? '/storage/default/user/profile/cover.jpg'}}" alt="cover-01">
                            </figure>
                            <!-- /USER PREVIEW COVER -->

                            <!-- USER PREVIEW INFO -->
                            <div class="user-preview-info">
                                <!-- USER SHORT DESCRIPTION -->
                                <div class="user-short-description small">
                                    <!-- USER SHORT DESCRIPTION AVATAR -->
                                    <div class="user-short-description-avatar user-short-description-avatar-v2 user-avatar">
                                        <!-- USER AVATAR BORDER -->
                                        <div class="user-avatar-border">
                                            <!-- HEXAGON -->
                                            <div class="hexagon-100-110"></div>
                                            <!-- /HEXAGON -->
                                        </div>
                                        <!-- /USER AVATAR BORDER -->

                                        <!-- USER AVATAR CONTENT -->
                                        <div class="user-avatar-content">
                                            <!-- HEXAGON -->
                                            <div id="avatar-preview" class="hexagon-image-68-74" data-src="{{$group->avatar ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                                            <!-- /HEXAGON -->
                                        </div>
                                        <!-- /USER AVATAR CONTENT -->


                                        <!-- USER AVATAR PROGRESS BORDER -->
                                        <div class="user-avatar-progress-border">
                                            <!-- HEXAGON -->
                                            <div class="hexagon-border-84-92"></div>
                                            <!-- /HEXAGON -->
                                        </div>
                                        <!-- /USER AVATAR PROGRESS BORDER -->
                                    </div>
                                    <!-- /USER SHORT DESCRIPTION AVATAR -->
                                </div>
                                <!-- /USER SHORT DESCRIPTION -->
                            </div>
                            <!-- /USER PREVIEW INFO -->
                        </div>
                        <!-- /USER PREVIEW -->

                        <!-- UPLOAD BOX -->
                        <div class="upload-box" id="avatar-button">
                            <!-- UPLOAD BOX ICON -->
                            <svg class="upload-box-icon icon-members">
                                <use xlink:href="#svg-members"></use>
                            </svg>
                            <!-- /UPLOAD BOX ICON -->

                            <!-- UPLOAD BOX TITLE -->
                            <p class="upload-box-title">Change Avatar</p>
                            <!-- /UPLOAD BOX TITLE -->

                            <!-- UPLOAD BOX TEXT -->
                            <p class="upload-box-text">110x110px size minimum</p>
                            <!-- /UPLOAD BOX TEXT -->

                            <input type="file" accept="image/*" id="avatar" name="avatar" hidden>
                            @error('avatar')
                            <p class="upload-box-text error">
                                <strong>{{ $message }}</strong>
                            </p>
                            @enderror
                        </div>
                        <!-- /UPLOAD BOX -->


                        <!-- UPLOAD BOX -->
                        <div class="upload-box" id="cover-button">
                            <!-- UPLOAD BOX ICON -->
                            <svg class="upload-box-icon icon-photos">
                                <use xlink:href="#svg-photos"></use>
                            </svg>
                            <!-- /UPLOAD BOX ICON -->

                            <!-- UPLOAD BOX TITLE -->
                            <p class="upload-box-title">Change Cover</p>
                            <!-- /UPLOAD BOX TITLE -->

                            <!-- UPLOAD BOX TEXT -->
                            <p class="upload-box-text">1184x300px size minimum</p>
                            <!-- /UPLOAD BOX TEXT -->

                            <input type="file" accept="image/*" id="cover" name="cover" hidden>
                            @error('cover')
                            <p class="upload-box-text error">
                                <strong>{{ $message }}</strong>
                            </p>
                            @enderror
                        </div>
                        <!-- /UPLOAD BOX -->


                    </div>
                    <!-- /GRID -->

                    <!-- WIDGET BOX -->
                    <div class="widget-box">
                        <!-- WIDGET BOX TITLE -->
                        <p class="widget-box-title">About Your Group</p>
                        <!-- /WIDGET BOX TITLE -->
                        <input hidden name="id" value="{{$group->id ?? 0}}">
                        <!-- WIDGET BOX CONTENT -->
                        <div class="widget-box-content">
                            <!-- FORM ROW -->
                            <div class="form-row split">
                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small">
                                        <label for="name">Name</label>
                                        <input class="@error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{old('name') ?? $group->name ?? ''}}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->

                            </div>
                            <!-- /FORM ROW -->

                            <!-- FORM ROW -->
                            <div class="form-row split">

                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small">
                                        <label for="last-name">Userame</label>
                                        <input class="@error('username') is-invalid @enderror" type="text" id="username" name="username" value="{{old('username') ?? $group->username ?? ''}}">
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->

                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM SELECT -->
                                    <div class="form-select small">
                                        <label for="gender">Type</label>
                                        <select class="@error('type') is-invalid @enderror" id="type" name="type">
                                            <option value="Public"{{$group->type == 'Public' ? ' selected' : ''}}>Public</option>
                                            <option value="Closed"{{$group->type == 'Closed' ? ' selected' : ''}}>Closed</option>
                                        </select>
                                        <!-- FORM SELECT ICON -->
                                        <svg class="form-select-icon icon-small-arrow">
                                            <use xlink:href="#svg-small-arrow"></use>
                                        </svg>
                                        <!-- /FORM SELECT ICON -->
                                        @error('type')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <!-- /FORM SELECT -->

                                </div>
                                <!-- /FORM ITEM -->
                            </div>
                            <!-- /FORM ROW -->

                            <!-- FORM ROW -->
                            <div class="form-row">
                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small">
                                        <label for="tagline">Tagline</label>
                                        <input class="@error('tagline') is-invalid @enderror" type="text" id="tagline" name="tagline" value="{{old('tagline') ?? $group->tagline ?? ''}}">
                                        @error('tagline')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->
                            </div>
                            <!-- /FORM ROW -->

                            <!-- FORM ROW -->
                            <div class="form-row">
                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small">
                                        <label for="website">Website</label>
                                        <input class="@error('website') is-invalid @enderror" type="text" id="website" name="website" value="{{old('website') ?? $group->website ?? ''}}">
                                        @error('website')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->
                            </div>
                            <!-- /FORM ROW -->

                            <!-- FORM ROW -->
                            <div class="form-row">

                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small">
                                        <label for="email">Email</label>
                                        <input class="@error('email') is-invalid @enderror" type="text" id="email" name="email" value="{{old('email') ?? $group->email ?? ''}}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->

                            </div>
                            <!-- /FORM ROW -->

                            <!-- FORM ROW -->
                            <div class="form-row">
                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small mid-textarea">
                                        <label for="about">About</label>
                                        <textarea class="@error('about') is-invalid @enderror" id="about" name="about">{{old('about') ?? $group->about ?? ''}}</textarea>
                                        @error('about')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->
                            </div>
                            <!-- /FORM ROW -->

                            <!-- FORM ROW -->
                            <div class="form-row">
                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small mid-textarea">
                                        <label for="about">Rules</label>
                                        <textarea class="@error('rule') is-invalid @enderror" id="rule" name="rule">{{old('rule') ?? $group->rule ?? ''}}</textarea>
                                        @error('rule')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->
                            </div>
                            <!-- /FORM ROW -->

                            @if($group->id >0)
                            <!-- FORM ROW -->
                            <div class="form-row">
                                <!-- FORM ITEM -->
                                <div class="form-item split">
                                    <div></div>
                                    <div></div>
                                    <!-- BUTTON -->
                                    <a class="button full white white-tertiary" href="{{route('settingsManageGroupsDeleteGet', ['group' => $group->username])}}" onclick="return confirm('Are you sure you want to permanently remove this group?')">Delete Group</a>
                                    <!-- /BUTTON -->
                                </div>
                                <!-- /FORM ITEM -->
                            </div>
                            <!-- /FORM ROW -->
                            @endif

                        </div>
                        <!-- WIDGET BOX CONTENT -->
                    </div>
                    <!-- /WIDGET BOX -->

                    <!-- WIDGET BOX -->
                    <div class="widget-box">
                        <!-- WIDGET BOX TITLE -->
                        <p class="widget-box-title">Your Social Accounts</p>
                        <!-- /WIDGET BOX TITLE -->

                        <!-- WIDGET BOX CONTENT -->
                        <div class="widget-box-content">
                            <!-- FORM -->
                            <form class="form">
                                <!-- FORM ROW -->
                                <div class="form-row split">
                                    <!-- FORM ITEM -->
                                    <div class="form-item">
                                        <!-- FORM INPUT -->
                                        <div class="form-input social-input small">
                                            <!-- SOCIAL LINK -->
                                            <div class="social-link no-hover facebook">
                                                <!-- ICON FACEBOOK -->
                                                <svg class="icon-facebook">
                                                    <use xlink:href="#svg-facebook"></use>
                                                </svg>
                                                <!-- /ICON FACEBOOK -->
                                            </div>
                                            <!-- /SOCIAL LINK -->

                                            <label for="facebook">Facebook</label>
                                            <input class="@error('facebook') is-invalid @enderror" type="text" id="facebook" name="facebook" value="{{old('facebook') ?? $group->facebook ?? ''}}">
                                            @error('facebook')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <!-- /FORM INPUT -->
                                    </div>
                                    <!-- /FORM ITEM -->

                                    <!-- FORM ITEM -->
                                    <div class="form-item">
                                        <!-- FORM INPUT -->
                                        <div class="form-input social-input small">
                                            <!-- SOCIAL LINK -->
                                            <div class="social-link no-hover twitter">
                                                <!-- ICON TWITTER -->
                                                <svg class="icon-twitter">
                                                    <use xlink:href="#svg-twitter"></use>
                                                </svg>
                                                <!-- /ICON TWITTER -->
                                            </div>
                                            <!-- /SOCIAL LINK -->

                                            <label for="twitter">Twitter</label>
                                            <input class="@error('twitter') is-invalid @enderror" type="text" id="twitter" name="twitter" value="{{old('twitter') ?? $group->twitter ?? ''}}">
                                            @error('twitter')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <!-- /FORM INPUT -->
                                    </div>
                                    <!-- /FORM ITEM -->
                                </div>
                                <!-- /FORM ROW -->

                                <!-- FORM ROW -->
                                <div class="form-row split">
                                    <!-- FORM ITEM -->
                                    <div class="form-item">
                                        <!-- FORM INPUT -->
                                        <div class="form-input social-input small">
                                            <!-- SOCIAL LINK -->
                                            <div class="social-link no-hover instagram">
                                                <!-- ICON INSTAGRAM -->
                                                <svg class="icon-instagram">
                                                    <use xlink:href="#svg-instagram"></use>
                                                </svg>
                                                <!-- /ICON INSTAGRAM -->
                                            </div>
                                            <!-- /SOCIAL LINK -->

                                            <label for="instagram">Instagram</label>
                                            <input class="@error('twitter') is-invalid @enderror" type="text" id="instagram" name="instagram" value="{{old('instagram') ?? $group->instagram ?? ''}}">
                                            @error('instagram')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <!-- /FORM INPUT -->
                                    </div>
                                    <!-- /FORM ITEM -->

                                    <!-- FORM ITEM -->
                                    <div class="form-item">
                                        <!-- FORM INPUT -->
                                        <div class="form-input social-input small">
                                            <!-- SOCIAL LINK -->
                                            <div class="social-link no-hover twitch">
                                                <!-- ICON TWITCH -->
                                                <svg class="icon-twitch">
                                                    <use xlink:href="#svg-twitch"></use>
                                                </svg>
                                                <!-- /ICON TWITCH -->
                                            </div>
                                            <!-- /SOCIAL LINK -->

                                            <label for="twitch">Twitch</label>
                                            <input class="@error('twitch') is-invalid @enderror" type="text" id="twitch" name="twitch" value="{{old('twitch') ?? $group->twitch ?? ''}}">
                                            @error('twitch')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <!-- /FORM INPUT -->
                                    </div>
                                    <!-- /FORM ITEM -->
                                </div>
                                <!-- /FORM ROW -->

                                <!-- FORM ROW -->
                                <div class="form-row split">
                                    <!-- FORM ITEM -->
                                    <div class="form-item">
                                        <!-- FORM INPUT -->
                                        <div class="form-input social-input small">
                                            <!-- SOCIAL LINK -->
                                            <div class="social-link no-hover google">
                                                <!-- ICON GOOGLE -->
                                                <svg class="icon-google">
                                                    <use xlink:href="#svg-google"></use>
                                                </svg>
                                                <!-- /ICON GOOGLE -->
                                            </div>
                                            <!-- /SOCIAL LINK -->

                                            <label for="google">Google</label>
                                            <input class="@error('google') is-invalid @enderror" type="text" id="google" name="google" value="{{old('google') ?? $group->google ?? ''}}">
                                            @error('google')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <!-- /FORM INPUT -->
                                    </div>
                                    <!-- /FORM ITEM -->

                                    <!-- FORM ITEM -->
                                    <div class="form-item">
                                        <!-- FORM INPUT -->
                                        <div class="form-input social-input small">
                                            <!-- SOCIAL LINK -->
                                            <div class="social-link no-hover youtube">
                                                <!-- ICON YOUTUBE -->
                                                <svg class="icon-youtube">
                                                    <use xlink:href="#svg-youtube"></use>
                                                </svg>
                                                <!-- /ICON YOUTUBE -->
                                            </div>
                                            <!-- /SOCIAL LINK -->

                                            <label for="youtube">Youtube</label>
                                            <input class="@error('google') is-invalid @enderror" type="text" id="youtube" name="youtube" value="{{old('youtube') ?? $group->youtube ?? ''}}">
                                            @error('youtube')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <!-- /FORM INPUT -->
                                    </div>
                                    <!-- /FORM ITEM -->
                                </div>
                                <!-- /FORM ROW -->

                                <!-- FORM ROW -->
                                <div class="form-row split">
                                    <!-- FORM ITEM -->
                                    <div class="form-item">
                                        <!-- FORM INPUT -->
                                        <div class="form-input social-input small">
                                            <!-- SOCIAL LINK -->
                                            <div class="social-link no-hover patreon">
                                                <!-- ICON PATREON -->
                                                <svg class="icon-patreon">
                                                    <use xlink:href="#svg-patreon"></use>
                                                </svg>
                                                <!-- /ICON PATREON -->
                                            </div>
                                            <!-- /SOCIAL LINK -->

                                            <label for="patreon">Patreon</label>
                                            <input class="@error('patreon') is-invalid @enderror" type="text" id="patreon" name="patreon" value="{{old('patreon') ?? $group->patreon ?? ''}}">
                                            @error('patreon')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <!-- /FORM INPUT -->
                                    </div>
                                    <!-- /FORM ITEM -->

                                    <!-- FORM ITEM -->
                                    <div class="form-item">
                                        <!-- FORM INPUT -->
                                        <div class="form-input social-input small">
                                            <!-- SOCIAL LINK -->
                                            <div class="social-link no-hover discord">
                                                <!-- ICON DISCORD -->
                                                <svg class="icon-discord">
                                                    <use xlink:href="#svg-discord"></use>
                                                </svg>
                                                <!-- /ICON DISCORD -->
                                            </div>
                                            <!-- /SOCIAL LINK -->

                                            <label for="discord">Discord</label>
                                            <input class="@error('discord') is-invalid @enderror" type="text" id="discord" name="discord" value="{{old('discord') ?? $group->discord ?? ''}}">
                                            @error('discord')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <!-- /FORM INPUT -->
                                    </div>
                                    <!-- /FORM ITEM -->
                                </div>
                                <!-- /FORM ROW -->

                                <!-- FORM ROW -->
                                <div class="form-row split">
                                    <!-- FORM ITEM -->
                                    <div class="form-item">
                                        <!-- FORM INPUT -->
                                        <div class="form-input social-input small">
                                            <!-- SOCIAL LINK -->
                                            <div class="social-link no-hover deviantart">
                                                <!-- ICON DEVIANTART -->
                                                <svg class="icon-deviantart">
                                                    <use xlink:href="#svg-deviantart"></use>
                                                </svg>
                                                <!-- /ICON DEVIANTART -->
                                            </div>
                                            <!-- /SOCIAL LINK -->

                                            <label for="deviantart">DeviantArt</label>
                                            <input class="@error('deviantart') is-invalid @enderror" type="text" id="deviantart" name="deviantart" value="{{old('deviantart') ?? $group->deviantart ?? ''}}">
                                            @error('deviantart')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <!-- /FORM INPUT -->
                                    </div>
                                    <!-- /FORM ITEM -->

                                    <!-- FORM ITEM -->
                                    <div class="form-item">
                                        <!-- FORM INPUT -->
                                        <div class="form-input social-input small">
                                            <!-- SOCIAL LINK -->
                                            <div class="social-link no-hover behance">
                                                <!-- ICON BEHANCE -->
                                                <svg class="icon-behance">
                                                    <use xlink:href="#svg-behance"></use>
                                                </svg>
                                                <!-- /ICON BEHANCE -->
                                            </div>
                                            <!-- /SOCIAL LINK -->

                                            <label for="behance">Behance</label>
                                            <input class="@error('behance') is-invalid @enderror"  type="text" id="behance" name="behance" value="{{old('behance') ?? $group->behance ?? ''}}">
                                            @error('behance')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <!-- /FORM INPUT -->
                                    </div>
                                    <!-- /FORM ITEM -->
                                </div>
                                <!-- /FORM ROW -->

                                <!-- FORM ROW -->
                                <div class="form-row split">
                                    <!-- FORM ITEM -->
                                    <div class="form-item">
                                        <!-- FORM INPUT -->
                                        <div class="form-input social-input small">
                                            <!-- SOCIAL LINK -->
                                            <div class="social-link no-hover dribbble">
                                                <!-- ICON DRIBBBLE -->
                                                <svg class="icon-dribbble">
                                                    <use xlink:href="#svg-dribbble"></use>
                                                </svg>
                                                <!-- /ICON DRIBBBLE -->
                                            </div>
                                            <!-- /SOCIAL LINK -->

                                            <label for="dribbble">Dribbble</label>
                                            <input class="@error('dribbble') is-invalid @enderror" type="text" id="dribbble" name="dribbble" value="{{old('dribbble') ?? $group->dribbble ?? ''}}">
                                            @error('dribbble')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <!-- /FORM INPUT -->
                                    </div>
                                    <!-- /FORM ITEM -->

                                    <!-- FORM ITEM -->
                                    <div class="form-item">
                                        <!-- FORM INPUT -->
                                        <div class="form-input social-input small">
                                            <!-- SOCIAL LINK -->
                                            <div class="social-link no-hover artstation">
                                                <!-- ICON ARTSTATION -->
                                                <svg class="icon-artstation">
                                                    <use xlink:href="#svg-artstation"></use>
                                                </svg>
                                                <!-- /ICON ARTSTATION -->
                                            </div>
                                            <!-- /SOCIAL LINK -->

                                            <label for="artstation">ArtStation</label>
                                            <input class="@error('artstation') is-invalid @enderror" type="text" id="artstation" name="artstation" value="{{old('artstation') ?? $group->artstation ?? ''}}">
                                            @error('artstation')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <!-- /FORM INPUT -->
                                    </div>
                                    <!-- /FORM ITEM -->
                                </div>
                                <!-- /FORM ROW -->
                            </form>
                            <!-- /FORM -->
                        </div>
                        <!-- WIDGET BOX CONTENT -->
                    </div>
                    <!-- /WIDGET BOX -->
                </div>
                <!-- /GRID COLUMN -->


            </div>
            <!-- /GRID COLUMN -->
        </div>
        <!-- /GRID COLUMN -->

        <!-- GRID COLUMN -->
        @include('home.user.profile.settings.partial.sidebar-mobile')
        <!-- /GRID COLUMN -->
    </div>
    <!-- /GRID -->
</form>
@endsection

@section('stylesheets')
@endsection

@section('scripts')
<!-- global.accordions -->
<script src="/assets/js/global/global.accordions.js"></script>
<script src="/assets/js/pages/home/user/profile/settings/profile-info.js"></script>
@endsection
