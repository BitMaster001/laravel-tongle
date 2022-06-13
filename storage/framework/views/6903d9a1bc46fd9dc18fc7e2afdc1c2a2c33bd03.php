<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- bootstrap 4.3.1 -->
    <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
    <!-- styles -->
    <link rel="stylesheet" href="/assets/css/styles.min.css">
    <!-- favicon -->
    <link rel="icon" href="/assets/img/favicon.ico">
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(env('APP_NAME')); ?></title>
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
        @media  only screen and (max-width: 1365px) {
            body .bhs_box {
                display:none;
            }
            
            body .landing-form {
                margin-top:50px;
            }
            
            body .landing {
                min-height:100vh;
            }
        }
        @media  only screen and (max-width:480px) {
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

            <img src="/assets/img/landing/icon.png">

        </div>
            
        <div class="bhs_box">
            <p class="landing-info-text">In these extraordinary times of uncertainty, anxiety, and stress, taking care of your well-being is more important than ever. </p>
            <p class="landing-info-text">Join us to support your people in the ways that matter most. To less stress and greater resilience. </p>
            <p class="landing-info-text">在这些充满不确定性，焦虑和压力的非凡时期，关爱自己比以往任何时候都更加重要 </p>
            <p class="landing-info-text">加入我们，以最重温暖的方式支持您身边的人。 减轻压力，增强弹性。 </p>
        </div>

        <?php if( $actionButton ?? true): ?>

        <div class="tab-switch">

            <p class="tab-switch-button login-register-form-trigger" id="login-button" >Login</p>

            <p class="tab-switch-button login-register-form-trigger" id="register-button">Register</p>
        </div>
        <?php endif; ?>
    </div>
    <div class="landing-form">

        <?php echo $__env->yieldContent('content'); ?>

    </div>
</div>

<script src="/assets/js/utils/app.js"></script>
<script src="/assets/js/form/form.utils.js"></script>
<script src="/assets/js/landing/landing.tabs.js"></script>
<script src="/assets/js/utils/svg-loader.js"></script>
<script src="/assets/js/pages/auth/auth.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5KPKoO7ZP-grfU1aOx2GD1ra1pQMBdAQ&libraries=places" async defer></script>
<script src="/assets/js/utils/google-map.js"></script>
</body>
</html>
<?php /**PATH E:\xampp\htdocs\msm\resources\views/layouts/app-auth.blade.php ENDPATH**/ ?>