@extends('layouts.app-auth')

@section('title')
Create Account
@endsection

@section('content')
<div class="form-box login-register-form-element">
    <!-- FORM BOX DECORATION -->
    <img class="form-box-decoration overflowing" src="/assets/img/landing/rocket.png" alt="rocket">
    <!-- /FORM BOX DECORATION -->

    <!-- FORM BOX TITLE -->
    <h2 class="form-box-title">Create your Account!</h2>
    <!-- /FORM BOX TITLE -->

    <!-- FORM -->
    <form class="form" method="POST" action="{{ route('registerPost') }}">
        @csrf
        <!-- FORM ROW -->
        <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
                <!-- FORM INPUT -->
                <div class="form-input">
                    <label for="username" style="font-family: poppins; Color: #fff;" >Username</label>
                    <input class="@error('username') is-invalid @enderror" type="text" id="username" name="username" value="{{ old('username') }}" style="background-color: transparent;border-radius:none;border-radius:0px; border:none; border-bottom: 1px solid #D5D5D5;">
                    @error('username')
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
                <div class="form-input">
                    <label for="email" style="font-family: poppins; Color: #fff;" >Email</label>
                    <input class="@error('email') is-invalid @enderror" type="text" id="email" name="email" value="{{ old('email') }}" style="background-color: transparent;border-radius:none;border-radius:0px; border:none; border-bottom: 1px solid #D5D5D5;">
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
                <div class="form-input">
                    <label for="password" style="font-family: poppins; Color: #fff;" >Password</label>
                    <input class="@error('password') is-invalid @enderror" type="password" id="password" name="password" style="background-color: transparent;border-radius:none;border-radius:0px; border:none; border-bottom: 1px solid #D5D5D5;">
                    @error('password')
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
                <div class="form-input">
                    <label for="password-confirmation" style="font-family: poppins; Color: #fff;" >Repeat Password</label>
                    <input class="@error('password-confirmation') is-invalid @enderror" type="password" id="password-confirmation" name="password-confirmation" style="background-color: transparent;border-radius:none;border-radius:0px; border:none; border-bottom: 1px solid #D5D5D5;">
                    @error('password-confirmation')
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

        <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
                <!-- FORM INPUT -->
                <div class="form-input">
                    <label for="map-input" style="font-family: poppins; Color: #fff;" >Location</label>
                    <input class="@error('loc_address') is-invalid @enderror @error('latitude') is-invalid @enderror" type="text" value="{{ old('loc_address') }}" id="map-input" name="loc_address" style="background-color: transparent;border-radius:none;border-radius:0px; border:none; border-bottom: 1px solid #D5D5D5;">
                    @error('loc_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    @error('loc_lat_lng')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <input type="hidden" name="latitude" id="loc_lat" value="{{ old('latitude') ?? Auth::user()->latitude ?? '180' }}" />
                <input type="hidden" name="longitude" id="loc_lng" value="{{ old('longitude') ?? Auth::user()->longitude ?? '38' }}" />
                <!-- /FORM INPUT -->
            </div>
            <!-- /FORM ITEM -->
        </div>

        <!-- FORM ROW -->
        <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
                <!-- CHECKBOX WRAP -->
                <div class="checkbox-wrap">
                    <input type="checkbox" id="register-newsletter" name="register_newsletter" checked>
                    <!-- CHECKBOX BOX -->
                    <div class="checkbox-box">
                        <!-- ICON CROSS -->
                        <svg class="icon-cross">
                            <use xlink:href="#svg-cross"></use>
                        </svg>
                        <!-- /ICON CROSS -->
                    </div>
                    <!-- /CHECKBOX BOX -->
                    <label for="register-newsletter">Send me news and updates via email</label>
                </div>
                <!-- /CHECKBOX WRAP -->
            </div>
            <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->

        <!-- FORM ROW -->
        <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
                <!-- BUTTON -->
                <button class="button medium primary" style="border-radius:50px; background-color:#fff; color:#7750F8; box-shadow:3px 6px 8px  rgba(0,0,0,0.2); font-size:15px">Register Now!</button>
                <!-- /BUTTON -->
            </div>
            <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->
    </form>
    <!-- /FORM -->

    <!-- FORM TEXT -->
    <p class="form-text">You'll receive a confirmation email in your inbox with a link to activate your account. If you have any problems, <a href="mailto:support@ljltongle.com">contact us</a>!</p>
    <!-- /FORM TEXT -->
</div>
@endsection
