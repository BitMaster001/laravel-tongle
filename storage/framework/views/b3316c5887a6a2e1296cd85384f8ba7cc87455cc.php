<div class="profile-header-social-links-wrap">
    <!-- PROFILE HEADER SOCIAL LINKS -->
    <div id="profile-header-social-links-slider" class="profile-header-social-links">
        <?php if($user->facebook): ?>
        <div class="profile-header-social-link">
            <!-- SOCIAL LINK -->
            <a class="social-link facebook" target="_blank" href="<?php echo e($user->facebook); ?>">
                <!-- ICON FACEBOOK -->
                <svg class="icon-facebook">
                    <use xlink:href="#svg-facebook"></use>
                </svg>
                <!-- /ICON FACEBOOK -->
            </a>
            <!-- /SOCIAL LINK -->
        </div>
        <?php endif; ?>

        <?php if($user->twitter): ?>
        <div class="profile-header-social-link">
            <!-- SOCIAL LINK -->
            <a class="social-link twitter" target="_blank" href="<?php echo e($user->twitter); ?>">
                <!-- ICON TWITTER -->
                <svg class="icon-twitter">
                    <use xlink:href="#svg-twitter"></use>
                </svg>
                <!-- /ICON TWITTER -->
            </a>
            <!-- /SOCIAL LINK -->
        </div>
        <?php endif; ?>

        <?php if($user->instagram): ?>
        <div class="profile-header-social-link">
            <!-- SOCIAL LINK -->
            <a class="social-link instagram" target="_blank" href="<?php echo e($user->instagram); ?>">
                <!-- ICON INSTAGRAM -->
                <svg class="icon-instagram">
                    <use xlink:href="#svg-instagram"></use>
                </svg>
                <!-- /ICON INSTAGRAM -->
            </a>
            <!-- /SOCIAL LINK -->
        </div>
        <?php endif; ?>

        <?php if($user->twitch): ?>
        <div class="profile-header-social-link">
            <!-- SOCIAL LINK -->
            <a class="social-link twitch" target="_blank" href="<?php echo e($user->twitch); ?>">
                <!-- ICON TWITCH -->
                <svg class="icon-twitch">
                    <use xlink:href="#svg-twitch"></use>
                </svg>
                <!-- /ICON TWITCH -->
            </a>
            <!-- /SOCIAL LINK -->
        </div>
        <?php endif; ?>

        <?php if($user->google): ?>
        <div class="profile-header-social-link">
            <!-- SOCIAL LINK -->
            <a class="social-link google" target="_blank" href="<?php echo e($user->google); ?>">
                <!-- ICON TWITCH -->
                <svg class="icon-google">
                    <use xlink:href="#svg-google"></use>
                </svg>
                <!-- /ICON TWITCH -->
            </a>
            <!-- /SOCIAL LINK -->
        </div>
        <?php endif; ?>

        <?php if($user->youtube): ?>
        <div class="profile-header-social-link">
            <!-- SOCIAL LINK -->
            <a class="social-link youtube" target="_blank" href="<?php echo e($user->youtube); ?>">
                <!-- ICON YOUTUBE -->
                <svg class="icon-youtube">
                    <use xlink:href="#svg-youtube"></use>
                </svg>
                <!-- /ICON YOUTUBE -->
            </a>
            <!-- /SOCIAL LINK -->
        </div>
        <?php endif; ?>

        <?php if($user->patreon): ?>
        <div class="profile-header-social-link">
            <!-- SOCIAL LINK -->
            <a class="social-link patreon" target="_blank" href="<?php echo e($user->patreon); ?>">
                <!-- ICON PATREON -->
                <svg class="icon-patreon">
                    <use xlink:href="#svg-patreon"></use>
                </svg>
                <!-- /ICON PATREON -->
            </a>
            <!-- /SOCIAL LINK -->
        </div>
        <?php endif; ?>

        <?php if($user->discord): ?>
        <div class="profile-header-social-link">
            <!-- SOCIAL LINK -->
            <a class="social-link discord" target="_blank" href="<?php echo e($user->discord); ?>">
                <!-- ICON DISCORD -->
                <svg class="icon-discord">
                    <use xlink:href="#svg-discord"></use>
                </svg>
                <!-- /ICON DISCORD -->
            </a>
            <!-- /SOCIAL LINK -->
        </div>
        <?php endif; ?>

        <?php if($user->deviantart): ?>
        <div class="profile-header-social-link">
            <!-- SOCIAL LINK -->
            <a class="social-link deviantart" target="_blank" href="<?php echo e($user->deviantart); ?>">
                <!-- ICON TWITCH -->
                <svg class="icon-deviantart">
                    <use xlink:href="#svg-deviantart"></use>
                </svg>
                <!-- /ICON TWITCH -->
            </a>
            <!-- /SOCIAL LINK -->
        </div>
        <?php endif; ?>

        <?php if($user->behance): ?>
        <div class="profile-header-social-link">
            <!-- SOCIAL LINK -->
            <a class="social-link behance" target="_blank" href="<?php echo e($user->behance); ?>">
                <!-- ICON TWITCH -->
                <svg class="icon-behance">
                    <use xlink:href="#svg-behance"></use>
                </svg>
                <!-- /ICON TWITCH -->
            </a>
            <!-- /SOCIAL LINK -->
        </div>
        <?php endif; ?>

        <?php if($user->dribbble): ?>
        <div class="profile-header-social-link">
            <!-- SOCIAL LINK -->
            <a class="social-link dribbble" target="_blank" href="<?php echo e($user->dribbble); ?>">
                <!-- ICON TWITCH -->
                <svg class="icon-dribbble">
                    <use xlink:href="#svg-dribbble"></use>
                </svg>
                <!-- /ICON TWITCH -->
            </a>
            <!-- /SOCIAL LINK -->
        </div>
        <?php endif; ?>

        <?php if($user->artstation): ?>
        <div class="profile-header-social-link">
            <!-- SOCIAL LINK -->
            <a class="social-link artstation" target="_blank" href="<?php echo e($user->artstation); ?>">
                <!-- ICON TWITCH -->
                <svg class="icon-artstation">
                    <use xlink:href="#svg-artstation"></use>
                </svg>
                <!-- /ICON TWITCH -->
            </a>
            <!-- /SOCIAL LINK -->
        </div>
        <?php endif; ?>
    </div>
    <!-- /PROFILE HEADER SOCIAL LINKS -->

    <!-- SLIDER CONTROLS -->
    <div id="profile-header-social-links-slider-controls" class="slider-controls">
        <!-- SLIDER CONTROL -->
        <div class="slider-control left">
            <!-- SLIDER CONTROL ICON -->
            <svg class="slider-control-icon icon-small-arrow">
                <use xlink:href="#svg-small-arrow"></use>
            </svg>
            <!-- /SLIDER CONTROL ICON -->
        </div>
        <!-- /SLIDER CONTROL -->

        <!-- SLIDER CONTROL -->
        <div class="slider-control right">
            <!-- SLIDER CONTROL ICON -->
            <svg class="slider-control-icon icon-small-arrow">
                <use xlink:href="#svg-small-arrow"></use>
            </svg>
            <!-- /SLIDER CONTROL ICON -->
        </div>
        <!-- /SLIDER CONTROL -->
    </div>
    <!-- /SLIDER CONTROLS -->
</div>
<?php /**PATH E:\xampp\htdocs\msm\resources\views/home/user/profile/partial/widgets/profile-header-social.blade.php ENDPATH**/ ?>