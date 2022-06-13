@extends('layouts.app-auth')

@section('title')
Verify Your Email Address
@endsection

@section('content')
<div class="form-box login-register-form-element">
    <!-- FORM BOX DECORATION -->
    <img class="form-box-decoration overflowing" src="/assets/img/landing/rocket.png" alt="rocket">
    <!-- /FORM BOX DECORATION -->

    <!-- FORM BOX TITLE -->
    <h2 class="form-box-title">{{ __('Verify Your Email Address') }}</h2>
    <!-- /FORM BOX TITLE -->

    <!-- FORM -->
    <form class="form" method="POST" action="{{ route('verification.send') }}">
        @csrf
        @if (session('resent'))
        <!-- FORM ROW -->
        <div class="form-row">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span id="alert-close" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                <strong>{{ __('A fresh verification link has been sent to your email address.') }}</strong>
            </div>

        </div>
        <!-- /FORM ROW -->
        @endif

        <!-- FORM ROW -->
        <div class="form-row">
            <!-- FORM ITEM -->

                <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>

            <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->

        <!-- FORM ROW -->
        <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
                <!-- BUTTON -->
                <button class="button medium secondary">{{ __('click here to request another') }}</button>
                <!-- /BUTTON -->
            </div>
            <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->
    </form>
    <!-- /FORM -->
</div>

@endsection
