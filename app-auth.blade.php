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
    <style>
        .bhs_shadowed {
            -webkit-filter: drop-shadow(2px 2px 3px rgba(255,255,255,0.5));
            -ms-filter: "progid:DXImageTransform.Microsoft.Dropshadow(OffX=12, OffY=12, Color='#444')";
            filter: "progid:DXImageTransform.Microsoft.Dropshadow(OffX=12, OffY=12, Color='#444')";
        }
        .form-box {
            max-width:400px;
        }
        .tab-switch-button {
            border-color:#FFF;
        }
        .bhs_box {
            background-color: rgba(98, 30, 149, 0.45);padding: 2%;border-radius: 9px;margin:auto;margin-top: 10px;display:inline-block;
        }
        .landing-info {
            text-align:center;
        }
        .lined-text:after, .lined-text:before {
            width:20px;
        }
        @media only screen and (max-width:480px) {
            .bhs_box {
                display:none;
            }
            .landing-form {
                margin-top: 20px;
            }
            .tab-switch-button {
                height:45px;
                line-height:45px;
            }
            .landing {
                padding-top:20px;
            }
        }
    </style>
</head>
<body>

<div class="landing">
    <div class="landing-decoration" style="background-size:cover"></div>
    
    <div class="landing-info">

        <div class="logo">

            <img class="bhs_shadowed" src="/assets/img/landing/icon.png">

        </div>
            
        <div class="bhs_box">
            <p class="landing-info-text">In these extraordinary times of uncertainty, anxiety, and stress, taking care of your well-being is more important than ever. </p>
            <p class="landing-info-text">Join us to support your people in the ways that matter most. To less stress and greater resilience. </p>
        </div>

        @if( $actionButton ?? true)

        <div class="tab-switch">

            <p class="tab-switch-button login-register-form-trigger" id="login-button" >Login</p>

            <p class="tab-switch-button login-register-form-trigger" id="register-button">Register</p>
        </div>
        @endif
    </div>
    <div class="landing-form">

        @yield('content')

    </div>
</div>

<script src="/assets/js/utils/app.js"></script>
<script src="/assets/js/form/form.utils.js"></script>
<script src="/assets/js/landing/landing.tabs.js"></script>
<script src="/assets/js/utils/svg-loader.js"></script>
<script src="/assets/js/pages/auth/auth.js"></script>
</body>
</html>
