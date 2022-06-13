@extends('layouts.app')

@section('title')
Social and Stream
@endsection

@section('content')
<form class="form" method="post" action="{{route('settingsSocialStreamPost')}}">
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
            <!-- SECTION HEADER -->
            <div class="section-header">
                <!-- SECTION HEADER INFO -->
                <div class="section-header-info">
                    <!-- SECTION PRETITLE -->
                    <p class="section-pretitle">My Profile</p>
                    <!-- /SECTION PRETITLE -->

                    <!-- SECTION TITLE -->
                    <h2 class="section-title">Social Networks</h2>
                    <!-- /SECTION TITLE -->
                </div>
                <!-- /SECTION HEADER INFO -->
            </div>
            <!-- /SECTION HEADER -->

            <!-- GRID COLUMN -->
            <div class="grid-column">
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
                                        <input class="@error('facebook') is-invalid @enderror" type="text" id="facebook" name="facebook" value="{{old('facebook') ?? Auth::user()->facebook ?? ''}}">
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
                                        <input class="@error('twitter') is-invalid @enderror" type="text" id="twitter" name="twitter" value="{{old('twitter') ?? Auth::user()->twitter ?? ''}}">
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
                                        <input class="@error('twitter') is-invalid @enderror" type="text" id="instagram" name="instagram" value="{{old('instagram') ?? Auth::user()->instagram ?? ''}}">
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
                                        <input class="@error('twitch') is-invalid @enderror" type="text" id="twitch" name="twitch" value="{{old('twitch') ?? Auth::user()->twitch ?? ''}}">
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
                                        <input class="@error('google') is-invalid @enderror" type="text" id="google" name="google" value="{{old('google') ?? Auth::user()->google ?? ''}}">
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
                                        <input class="@error('google') is-invalid @enderror" type="text" id="youtube" name="youtube" value="{{old('youtube') ?? Auth::user()->youtube ?? ''}}">
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
                                        <input class="@error('patreon') is-invalid @enderror" type="text" id="patreon" name="patreon" value="{{old('patreon') ?? Auth::user()->patreon ?? ''}}">
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
                                        <input class="@error('discord') is-invalid @enderror" type="text" id="discord" name="discord" value="{{old('discord') ?? Auth::user()->discord ?? ''}}">
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
                                        <input class="@error('deviantart') is-invalid @enderror" type="text" id="deviantart" name="deviantart" value="{{old('deviantart') ?? Auth::user()->deviantart ?? ''}}">
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
                                        <input class="@error('behance') is-invalid @enderror"  type="text" id="behance" name="behance" value="{{old('behance') ?? Auth::user()->behance ?? ''}}">
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
                                        <input class="@error('dribbble') is-invalid @enderror" type="text" id="dribbble" name="dribbble" value="{{old('dribbble') ?? Auth::user()->dribbble ?? ''}}">
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
                                        <input class="@error('artstation') is-invalid @enderror" type="text" id="artstation" name="artstation" value="{{old('artstation') ?? Auth::user()->artstation ?? ''}}">
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
                @if(false)
                <!-- WIDGET BOX -->
                <div class="widget-box">
                    <!-- WIDGET BOX TITLE -->
                    <p class="widget-box-title">Twitter Feed</p>
                    <!-- /WIDGET BOX TITLE -->

                    <!-- WIDGET BOX CONTENT -->
                    <div class="widget-box-content">
                        <!-- SWITCH OPTION -->
                        <div class="switch-option">
                            <!-- SWITCH OPTION TITLE -->
                            <p class="switch-option-title">Enable Twitter Feed</p>
                            <!-- /SWITCH OPTION TITLE -->

                            <!-- SWITCH OPTION TEXT -->
                            <p class="switch-option-text">Turn on this switch to show your connected twitter account in your profile page</p>
                            <!-- /SWITCH OPTION TEXT -->

                            <!-- FORM SWITCH -->
                            <div class="form-switch active">
                                <!-- FORM SWITCH BUTTON -->
                                <div class="form-switch-button"></div>
                                <!-- /FORM SWITCH BUTTON -->
                            </div>
                            <!-- /FORM SWITCH -->

                            <!-- BUTTON -->
                            <a class="button twitter" href="#">
                                <!-- BUTTON ICON -->
                                <svg class="button-icon spaced icon-twitter">
                                    <use xlink:href="#svg-twitter"></use>
                                </svg>
                                <!-- /BUTTON ICON -->
                                Link your Twitter Account
                            </a>
                            <!-- /BUTTON -->

                            <!-- SWITCH OPTION META -->
                            <p class="switch-option-meta">Linked Account: <span class="bold">@dghuntress</span></p>
                            <!-- /SWITCH OPTION META -->
                        </div>
                        <!-- /SWITCH OPTION -->
                    </div>
                    <!-- WIDGET BOX CONTENT -->
                </div>
                <!-- /WIDGET BOX -->
                @endif
            </div>
            <!-- /GRID COLUMN -->

            <!-- SECTION HEADER -->
            <div class="section-header">
                <!-- SECTION HEADER INFO -->
                <div class="section-header-info">
                    <!-- SECTION PRETITLE -->
                    <p class="section-pretitle">My Profile</p>
                    <!-- /SECTION PRETITLE -->

                    <!-- SECTION TITLE -->
                    <h2 class="section-title">Stream</h2>
                    <!-- /SECTION TITLE -->
                </div>
                <!-- /SECTION HEADER INFO -->
            </div>
            <!-- /SECTION HEADER -->

            <!-- GRID COLUMN -->
            <div class="grid-column">
                @if(false)
                <!-- WIDGET BOX -->
                <div class="widget-box">
                    <!-- WIDGET BOX TITLE -->
                    <p class="widget-box-title">Connect your Account</p>
                    <!-- /WIDGET BOX TITLE -->

                    <!-- WIDGET BOX CONTENT -->
                    <div class="widget-box-content">
                        <!-- SWITCH OPTION -->
                        <div class="switch-option">
                            <!-- SWITCH OPTION TITLE -->
                            <p class="switch-option-title">Enable Stream Profile Section</p>
                            <!-- /SWITCH OPTION TITLE -->

                            <!-- SWITCH OPTION TEXT -->
                            <p class="switch-option-text">Turn on this switch to show your connected stream in your profile for everyone to see!</p>
                            <!-- /SWITCH OPTION TEXT -->

                            <!-- FORM SWITCH -->
                            <div class="form-switch">
                                <!-- FORM SWITCH BUTTON -->
                                <div class="form-switch-button"></div>
                                <!-- /FORM SWITCH BUTTON -->
                            </div>
                            <!-- /FORM SWITCH -->

                            <!-- BUTTON -->
                            <a class="button twitch" href="#">
                                <!-- BUTTON ICON -->
                                <svg class="button-icon spaced icon-twitch">
                                    <use xlink:href="#svg-twitch"></use>
                                </svg>
                                <!-- /BUTTON ICON -->
                                Link your Twitch Account
                            </a>
                            <!-- /BUTTON -->

                            <!-- SWITCH OPTION META -->
                            <p class="switch-option-meta">Linked Account: <span class="bold">@gamehuntress</span></p>
                            <!-- /SWITCH OPTION META -->
                        </div>
                        <!-- /SWITCH OPTION -->
                    </div>
                    <!-- WIDGET BOX CONTENT -->
                </div>
                <!-- /WIDGET BOX -->

                <!-- WIDGET BOX -->
                <div class="widget-box">
                    <!-- WIDGET BOX TITLE -->
                    <p class="widget-box-title">Your Channel FAQs</p>
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
                                    <div class="form-input small active">
                                        <label for="profile-social-question-1">Question</label>
                                        <input type="text" id="profile-social-question-1" name="profile_social_question_1" value="Do I only play new games?">
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->

                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small mid-textarea active">
                                        <label for="profile-social-answer-1">Answer</label>
                                        <textarea id="profile-social-answer-1" name="profile_social_answer_1">Although I play a lot of newer games, I also have a small time on weekends that I use to play some cool retro games.</textarea>
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
                                    <div class="form-input small active">
                                        <label for="profile-social-question-2">Question</label>
                                        <input type="text" id="profile-social-question-2" name="profile_social_question_2" value="Do I take stream requests?">
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->

                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small mid-textarea active">
                                        <label for="profile-social-answer-2">Answer</label>
                                        <textarea id="profile-social-answer-2" name="profile_social_answer_2">Yes! Join me on my channel's chatbox every saturday and I'll be taking game requests for upcoming streams.</textarea>
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
                                        <label for="profile-social-question-3">Question</label>
                                        <input type="text" id="profile-social-question-3" name="profile_social_question_3">
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->

                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small mid-textarea">
                                        <label for="profile-social-answer-3">Answer</label>
                                        <textarea id="profile-social-answer-3" name="profile_social_answer_3"></textarea>
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->
                            </div>
                            <!-- /FORM ROW -->
                        </form>
                        <!-- /FORM -->

                        <!-- BUTTON -->
                        <p class="button small white add-field-button">+ Add New Field</p>
                        <!-- /BUTTON -->
                    </div>
                    <!-- WIDGET BOX CONTENT -->
                </div>
                <!-- /WIDGET BOX -->
                @endif

                <!-- WIDGET BOX -->
                <div class="widget-box">
                    <!-- WIDGET BOX TITLE -->
                    <p class="widget-box-title">Your Streaming Schedule</p>
                    <!-- /WIDGET BOX TITLE -->

                    <!-- WIDGET BOX CONTENT -->
                    <div class="widget-box-content">
                            <!-- FORM ROW -->
                            <div class="form-row">
                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small mid-textarea">
                                        <label for="streaming-description">Description</label>
                                        <textarea class="@error('streaming-description') is-invalid @enderror" id="streaming-description" name="streaming-description">{{old('streaming-description') ?? Auth::user()->streaming_description ?? ''}}</textarea>
                                        @error('streaming-description')
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
                                    <!-- FORM SELECT -->
                                    <div class="form-select small">
                                        <label for="streaming-monday">Monday</label>
                                        <select class="@error('streaming-monday') is-invalid @enderror" id="streaming-monday" name="streaming-monday">
                                            @include('home.user.profile.settings.partial.data.streaming-times',['day' => 'monday'])
                                        </select>
                                        <!-- FORM SELECT ICON -->
                                        <svg class="form-select-icon icon-small-arrow">
                                            <use xlink:href="#svg-small-arrow"></use>
                                        </svg>
                                        <!-- /FORM SELECT ICON -->
                                        @error('streaming-monday')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!-- /FORM SELECT -->
                                </div>
                                <!-- /FORM ITEM -->

                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM SELECT -->
                                    <div class="form-select small" >
                                        <label for="streaming-tuesday">Tuesday</label>
                                        <select class="@error('streaming-tuesday') is-invalid @enderror" id="streaming-tuesday" name="streaming-tuesday">
                                            @include('home.user.profile.settings.partial.data.streaming-times',['day' => 'tuesday'])
                                        </select>
                                        <!-- FORM SELECT ICON -->
                                        <svg class="form-select-icon icon-small-arrow">
                                            <use xlink:href="#svg-small-arrow"></use>
                                        </svg>
                                        <!-- /FORM SELECT ICON -->
                                        @error('streaming-tuesday')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!-- /FORM SELECT -->
                                </div>
                                <!-- /FORM ITEM -->

                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM SELECT -->
                                    <div class="form-select small" >
                                        <label for="streaming-wednesday">Wednesday</label>
                                        <select class="@error('streaming-wednesday') is-invalid @enderror" id="streaming-wednesday" name="streaming-wednesday">
                                            @include('home.user.profile.settings.partial.data.streaming-times',['day' => 'wednesday'])
                                        </select>
                                        <!-- FORM SELECT ICON -->
                                        <svg class="form-select-icon icon-small-arrow">
                                            <use xlink:href="#svg-small-arrow"></use>
                                        </svg>
                                        <!-- /FORM SELECT ICON -->
                                        @error('streaming-wednesday')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!-- /FORM SELECT -->
                                </div>
                                <!-- /FORM ITEM -->

                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM SELECT -->
                                    <div class="form-select small" >
                                        <label for="streaming-thursday">Thursday</label>
                                        <select class="@error('streaming-thursday') is-invalid @enderror" id="streaming-thursday" name="streaming-thursday">
                                            @include('home.user.profile.settings.partial.data.streaming-times',['day' => 'thursday'])
                                        </select>
                                        <!-- FORM SELECT ICON -->
                                        <svg class="form-select-icon icon-small-arrow">
                                            <use xlink:href="#svg-small-arrow"></use>
                                        </svg>
                                        <!-- /FORM SELECT ICON -->
                                        @error('streaming-thursday')
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
                            <div class="form-row split">
                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM SELECT -->
                                    <div class="form-select small" >
                                        <label for="streaming-friday">Friday</label>
                                        <select class="@error('streaming-friday') is-invalid @enderror" id="streaming-friday" name="streaming-friday">
                                            @include('home.user.profile.settings.partial.data.streaming-times',['day' => 'friday'])
                                        </select>
                                        <!-- FORM SELECT ICON -->
                                        <svg class="form-select-icon icon-small-arrow">
                                            <use xlink:href="#svg-small-arrow"></use>
                                        </svg>
                                        <!-- /FORM SELECT ICON -->
                                        @error('streaming-friday')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!-- /FORM SELECT -->
                                </div>
                                <!-- /FORM ITEM -->

                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM SELECT -->
                                    <div class="form-select small" >
                                        <label for="streaming-saturday">Saturday</label>
                                        <select class="@error('streaming-saturday') is-invalid @enderror" id="streaming-saturday" name="streaming-saturday">
                                            @include('home.user.profile.settings.partial.data.streaming-times',['day' => 'saturday'])
                                        </select>
                                        <!-- FORM SELECT ICON -->
                                        <svg class="form-select-icon icon-small-arrow">
                                            <use xlink:href="#svg-small-arrow"></use>
                                        </svg>
                                        <!-- /FORM SELECT ICON -->
                                        @error('streaming-saturday')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!-- /FORM SELECT -->
                                </div>
                                <!-- /FORM ITEM -->

                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM SELECT -->
                                    <div class="form-select small" >
                                        <label for="streaming-sunday">Sunday</label>
                                        <select class="@error('streaming-sunday') is-invalid @enderror" id="streaming-sunday" name="streaming-sunday">
                                            @include('home.user.profile.settings.partial.data.streaming-times',['day' => 'sunday'])
                                        </select>
                                        <!-- FORM SELECT ICON -->
                                        <svg class="form-select-icon icon-small-arrow">
                                            <use xlink:href="#svg-small-arrow"></use>
                                        </svg>
                                        <!-- /FORM SELECT ICON -->
                                        @error('streaming-sunday')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!-- /FORM SELECT -->
                                </div>
                                <!-- /FORM ITEM -->

                                <!-- FORM ITEM -->
                                <div class="form-item"></div>
                                <!-- /FORM ITEM -->
                            </div>
                            <!-- /FORM ROW -->
                    </div>
                    <!-- WIDGET BOX CONTENT -->
                </div>
                <!-- /WIDGET BOX -->
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
@endsection
