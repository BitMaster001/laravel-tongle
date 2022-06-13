@extends('layouts.app-auth')

@section('title')
{{ __('Reset Password') }}
@endsection

@section('content')
<div class="form-box login-register-form-element">
    <!-- FORM BOX DECORATION -->
    <img class="form-box-decoration overflowing" src="/assets/img/landing/rocket.png" alt="rocket">
    <!-- /FORM BOX DECORATION -->

    <!-- FORM BOX TITLE -->
    <h2 class="form-box-title">{{ __('Reset Password') }}</h2>
    <!-- /FORM BOX TITLE -->

    <!-- FORM -->
    <form class="form" method="POST" action="{{ route('resetPasswordPost') }}">
        @csrf
        @if (session('reset-password-sent'))
        <!-- FORM ROW -->
        <div class="form-row">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span id="alert-close" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                <strong>{{ __('A fresh verification reset password link has been sent to your email address.') }}</strong>
            </div>
        </div>
        <!-- /FORM ROW -->
        @endif

        @if (session('reset-password-error'))
        <!-- FORM ROW -->
        <div class="form-row">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span id="alert-close" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                <strong>{{ __('The username or email you entered did not match our records. Please double-check and try again.') }}</strong>
            </div>
        </div>
        <!-- /FORM ROW -->
        @endif

        @if (session('token-expired'))
        <!-- FORM ROW -->
        <div class="form-row">

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span id="alert-close" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                <strong>{{ __('The reset password link has been expired. Please try to request a new one.') }}</strong>
            </div>
        </div>
        <!-- /FORM ROW -->
        @endif

        <!-- FORM ROW -->
        <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
                <!-- FORM INPUT -->
                <div class="form-input">
                    <label for="login-username">Username or Email</label>
                    <input class="@error('username-email')is-invalid @enderror" type="text" id="username-email" name="username-email" value="{{ old('username-email') }}">
                    @error('username-email')
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
                <!-- BUTTON -->
                <button class="button medium secondary">Send reset link!</button>
                <!-- /BUTTON -->
            </div>
            <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->
    </form>
    <!-- /FORM -->
</div>
@endsection
