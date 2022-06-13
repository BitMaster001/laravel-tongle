@extends('layouts.app-auth')

@section('title')
Create Account
@endsection

@section('content')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
<style>
    body, p, div, span, a, label {
        font-family: 'Titillium Web', sans-serif;
        text-transform:uppercase
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
    label a, a, a:hover, p a {
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
    .bhs_desktop_one_half {
        width:40%
    }
    .bhs_form_input,
    .bhs_form_item {
        width:100%;
        display:flex;
        flex-direction:column
    }
    form, .border-light {
        border: 1px solid #5d858d !important;
    }
    form > div {
        padding: 20px;
        padding-bottom:0
    }
    .border_bottom {
        border-bottom:1px solid #5d858d
    }
    #register-newsletter + label {
        position:relative;
        padding-left:20px
    }
    #register-newsletter {
        display:none
    }
    #register-newsletter + label .icon {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        height: 15px;
        width: 15px;
        background-color: #2d3c41;
        border: 1px solid;
    }
    #register-newsletter + label .icon:before {
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
    #register-newsletter:checked + label .icon:before {
        opacity:1;
    }
    b, strong {
        font-weight: 100;
    }
    @media only screen and (max-width:490px) {
        .bhs_mobile_full_width {
            width:100%
        }
        .bhs_mobile_hidden {
            display:none
        }
    }
</style>
<div class="container" style="height:100vh;align-items:center;justify-content:center;display:flex;flex-direction:row">
    <div class="bhs_row" style="justify-content:center">
        <div class="bhs_desktop_one_half bhs_mobile_hidden bhs_img border-light" style="background-color:#002c33;display:flex;align-items:center;justify-content:center;position:relative">
            <div style="background-image:url('https://alpha.ljltongle.com/assets/img/landing/registration-img.jpg');width:100%;height:100%;background-size:cover;opacity:0.3;position:absolute;top:0;left:0;width:100%;height:100%" style="opacity:0.3">
            </div>
            <p class="bhs_logo">TONGLE</p>
        </div>
        <div class="bhs_desktop_one_half bhs_mobile_full_width">
            <form class="form" method="POST" action="{{ route('registerPost') }}">
                <div class="bhs_row bhs_full_width border_bottom" style="padding-bottom:20px">
                    <span style="color:#FFF">REGISTRAION</span>
                    <a href="https://alpha.ljltongle.com/login" style="color:#56baca;margin-left:auto" id="register-button">BACK TO LOGIN</a>
                </div>
                @csrf
                <div class="bhs_form_row">
                    <div class="bhs_form_item">
                        <div class="bhs_form_input">
                            <label for="username">Username</label>
                            <input class="@error('username') is-invalid @enderror bhs_input" type="text" id="username" name="username" value="{{ old('username') }}">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="bhs_form_row">
                    <div class="bhs_form_item">
                        <div class="bhs_form_input">
                            <label for="email">Email</label>
                            <input class="@error('email') is-invalid @enderror bhs_input" type="text" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="bhs_form_row">
                    <div class="bhs_form_item">
                        <div class="bhs_form_input">
                            <label for="password">Password</label>
                            <input class="@error('password') is-invalid @enderror bhs_input" type="password" id="password" name="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="bhs_form_row">
                    <div class="bhs_form_item">
                        <div class="bhs_form_input">
                            <label for="password-confirmation">Repeat Password</label>
                            <input class="@error('password-confirmation') is-invalid @enderror bhs_input" type="password" id="password-confirmation" name="password-confirmation">
                            @error('password-confirmation')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="bhs_form_row">
                    <div class="bhs_form_item">
                        <input type="checkbox" id="register-newsletter" name="register_newsletter" checked>
                        <label for="register-newsletter"><span class="icon"></span>Send me news and updates via email</label>
                    </div>
                </div>
                <div class="bhs_form_row">
                    <div class="bhs_form_item">
                        <button class="bhs_button">Register Now!</button>
                    </div>
                </div>
            </form>
        </div>
        <p style="margin-top:20px;">You'll receive a confirmation email in your inbox with a link to activate your account. If you have any problems, <a href="mailto:support@ljltongle.com">contact us</a>!</p>
    </div>
</div>
@endsection
