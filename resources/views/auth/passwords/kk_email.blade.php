@extends('layouts.app-auth')

@section('title')
{{ __('Reset Password') }}
@endsection

@section('content')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
<style>
    body, p, div, span, a, label {
        font-family: 'Titillium Web', sans-serif;
    }
    body {
        background-color:#21202e;
        min-height:100vh
    }
    .bhs_logo {
        font-family: Titillium Web,sans-serif;
        font-size: 3rem;
        font-weight: 900;
        color:#56baca
    }
    .bhs_full_width {
        width:100%
    }
    .bhs_row {
        display:flex;
        flex-direction:row;
        flex-wrap:wrap;
    }
    label a, a, a:hover {
        color:#56baca
    }
    .bhs_button {
        background: linear-gradient( 135deg, #343346 30%, #2D3C41 70%);
        border-radius: 0;
        padding: 13px;
        color: #56baca;
        margin-bottom:20px
    }
    .bhs_input, .bhs_input:focus,
    input[type=password],
    input[type=email],
    input[type=text] {
        border:1px solid #56baca;
        outline:none;
        box-shadow:none;
        border-radius:0;
        margin-top:5px;
        font-weight:100
    }
    label {
        color:#5d858d;
        display:flex
    }
    .bhs_desktop_one_third {
        width:31.33%
    }
    .bhs_form_input,
    .bhs_form_item {
        width:100%;
        display:flex;
        flex-direction:column
    }
    form {
        border: 1px solid #5d858d;
        margin-top: 20px;
    }
    form > div {
        padding: 20px;
    }
    .border_bottom {
        border-bottom:1px solid #5d858d
    }
    #remember_me + label {
        position:relative;
        padding-left:20px
    }
    #remember_me {
        display:none
    }
    #remember_me + label .icon {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        height: 15px;
        width: 15px;
        background-color: #2d3c41;
        border: 1px solid;
    }
    #remember_me + label .icon:before {
        content: '';
        display: block;
        margin-left: 5px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid #56baca;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        opacity:0;
        transition:all 0.5s
    }
    #remember_me:checked + label .icon:before {
        opacity:1;
    }
    b, strong {
        font-weight: 100;
    }
    @media only screen and (max-width:490px) {
        .bhs_mobile_full_width {
            width:100%
        }
    }
</style>
<div class="container" style="height:100vh;align-items:center;justify-content:center;display:flex;flex-direction:row">
    <div class="bhs_desktop_one_third bhs_mobile_full_width">
        <div style="text-align:center">
            <p class="bhs_logo">TONGLE</p>
        </div>
        <form class="form" method="POST" action="{{ route('resetPasswordPost') }}">
            <div class="bhs_row bhs_full_width border_bottom">
                <span style="color:#FFF">FORGOT PASSWORD</span>
                <a href="https://alpha.ljltongle.com/login" style="color:#56baca;margin-left:auto" id="register-button">BACK TO LOGIN</a>
            </div>
            @csrf
            @if (session('reset-password-sent'))
            <div class="bhs_form_row">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span id="alert-close" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                    <strong>{{ __('A fresh verification reset password link has been sent to your email address.') }}</strong>
                </div>
            </div>
            @endif

            @if (session('reset-password-error'))
            <div class="bhs_form_row">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span id="alert-close" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                    <strong>{{ __('The username or email you entered did not match our records. Please double-check and try again.') }}</strong>
                </div>
            </div>
            @endif

            @if (session('token-expired'))
            <div class="bhs_form_row">

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span id="alert-close" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                    <strong>{{ __('The reset password link has been expired. Please try to request a new one.') }}</strong>
                </div>
            </div>
            @endif
            <div class="bhs_form_row">
                <div class="bhs_form_item">
                    <div class="bhs_form_input">
                        <label for="login-username">Username or Email</label>
                        <input class="@error('username-email')is-invalid @enderror" type="text" id="username-email" name="username-email" value="{{ old('username-email') }}">
                        @error('username-email')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="bhs_form_row">
                <div class="bhs_form_item">
                    <button class="bhs_button">Send reset link!</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
