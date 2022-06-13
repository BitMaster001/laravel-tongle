<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- bootstrap 4.3.1 -->
    <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
    <!-- styles -->
    <link rel="stylesheet" href="/assets/css/styles.min.css">
    <!-- favicon -->
    <link rel="icon" href="/assets/img/favicon.ico">
    <title>@yield('title') | {{env('APP_NAME')}}</title>
</head>
<body>

<!-- LANDING -->
<div class="landing">
    <!-- LANDING DECORATION -->
    <div class="landing-decoration"></div>
    <!-- /LANDING DECORATION -->

    <!-- LANDING INFO -->
    <div class="landing-info">
        <!-- LOGO -->
        <div class="logo">
            <!-- ICON LOGO VIKINGER -->
            <!--<svg class="icon-logo-vikinger">
                <use xlink:href="#svg-logo-vikinger"></use>
            </svg>-->
            <img src="/assets/img/landing/icon.jpg">
            <!-- /ICON LOGO VIKINGER -->
        </div>
        <!-- /LOGO -->

        <!-- LANDING INFO PRETITLE -->
        <h2 class="landing-info-pretitle">Welcome to</h2>
        <!-- /LANDING INFO PRETITLE -->

        <!-- LANDING INFO TITLE -->
        <h1 class="landing-info-title">{{env('APP_NAME')}}</h1>
        <!-- /LANDING INFO TITLE -->

        <!-- LANDING INFO TEXT -->
        <p class="landing-info-text">In these extraordinary times of uncertainty, anxiety, and stress, taking care of your well-being is more important than ever. </p>
        <p class="landing-info-text">Join us to support your people in the ways that matter most. To less stress and greater resilience. </p>
        <!-- /LANDING INFO TEXT -->
        @if( $actionButton ?? true)
        <!-- TAB SWITCH -->
        <div class="tab-switch">
            <!-- TAB SWITCH BUTTON -->
            <!--<p class="tab-switch-button login-register-form-trigger">Login</p>-->
            <p class="tab-switch-button login-register-form-trigger" id="login-button" >Login</p>
            <!-- /TAB SWITCH BUTTON -->

            <!-- TAB SWITCH BUTTON -->
            <p class="tab-switch-button login-register-form-trigger" id="register-button">Register</p>
            <!-- /TAB SWITCH BUTTON -->
        </div>
        <!-- /TAB SWITCH -->
        @endif
    </div>
    <!-- /LANDING INFO -->

    <!-- LANDING FORM -->
    <div class="landing-form">

        <!-- FORM BOX -->
        @yield('content')
        <!-- /FORM BOX -->

    </div>
    <!-- /LANDING FORM -->
</div>
<!-- /LANDING -->

<!-- app -->
<script src="/assets/js/utils/app.js"></script>
<!-- form.utils -->
<script src="/assets/js/form/form.utils.js"></script>
<!-- landing.tabs -->
<script src="/assets/js/landing/landing.tabs.js"></script>
<!-- SVG icons -->
<script src="/assets/js/utils/svg-loader.js"></script>
<!-- auth.utils -->
<script src="/assets/js/pages/auth/auth.js"></script>
</body>
</html>
