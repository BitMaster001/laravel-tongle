<div class="profile-header">
    <!-- PROFILE HEADER COVER -->
    <figure class="profile-header-cover liquid">
        <img src="<?php echo e($user->cover ?? '/storage/default/user/profile/cover.jpg'); ?>" alt="cover-01">
    </figure>
    <!-- /PROFILE HEADER COVER -->

    <!-- PROFILE HEADER INFO -->
    <div class="profile-header-info">
        <!-- USER SHORT DESCRIPTION -->
        <div class="user-short-description big">
            <!-- USER SHORT DESCRIPTION AVATAR -->
            <a class="user-short-description-avatar user-avatar big"  <?php if($user->username != 'soulite'): ?> href="<?php echo e(Auth::user() == $user ? route('userProfileGet') : route('userPublicProfileGet', ['user' => $user->username])); ?>" <?php endif; ?>>
                <!-- USER AVATAR BORDER -->
                <div class="user-avatar-border">
                    <!-- HEXAGON -->
                    <?php if($user->username == 'soulite'): ?>
                    <style>
                        particle {
                          position: absolute;
                          left: 0;
                          top: 0;
                          border-radius: 50%;
                          pointer-events: none;
                          opacity: 0;
                        }
                        .user-avatar-content {
                            position:relative;
                        }
                        .lit_bg, .lit_profile, .lit_lights {
                            position:absolute;
                        }
                        .user-avatar.big .user-avatar-content {
                            top: 10px;
                            left: 5px;
                        }
                        .lit_bg {
                            width:130px;
                            animation-name:tigerBlink;
                            animation-duration: 5s;
                            animation-iteration-count: infinite;
                            top: 13px;
                            left: 6px;
                        }
                        .lit_profile {
                            width:90px;
                            top:32px;
                            left:28px;
                            border-radius:50%;
                            z-index:2;
                        }
                        
                        .lit_lights {
                            width:150px;
                            animation-name:ciclesBlink;
                            animation-duration: 5s;
                            animation-iteration-count: infinite;
                        }
                        #particle-container {
                            position:relative;
                            top:-30px;
                            left:-30px;
                            width:210px;
                            height:210px;
                        }
                        #particle-container-mobile {
                            position:relative;
                            top:-5px;
                            left:-5px;
                            width:160px;
                            height:160px;
                        }
                        @keyframes  tigerBlink {
                            0% { opacity:0; }
                            14% { opacity:0; }
                            20% { opacity:0.5; }
                            50% { opacity:0.2; }
                            80% { opacity:0.7; }
                            100% { opacity:0; }
                        }
                        @keyframes  ciclesBlink {
                            0% { opacity:0; }
                            10% { opacity:1; }
                            12% { opacity:0; }
                            14% { opacity:1; }
                            80% { opacity:1; }
                            100% { opacity:0; }
                        }
                        @media  only screen and (max-width:480px) {
                            .user-avatar.medium .user-avatar-content {
                                top: -20px;
                                left: -10px;
                            }
                        }
                    </style>
                    <?php else: ?>
                    <div class="hexagon-148-164"></div>
                    <?php endif; ?>
                    <!-- /HEXAGON -->
                </div>
                <!-- /USER AVATAR BORDER -->

                <!-- USER AVATAR CONTENT -->
                <div class="user-avatar-content" id="user-avatar-content">
                    <!-- HEXAGON -->
                    <?php if($user->username != 'soulite'): ?>
                    <div class="hexagon-image-100-110" data-src="<?php echo e($user->avatar ?? '/storage/default/user/profile/avatar.jpg'); ?>"></div>
                    <?php else: ?>
                    <img src="/assets/img/svg/tiger.svg" class="lit_bg">
                    <img src="/assets/img/svg/circles.svg" class="lit_lights">
                    <img src="<?php echo e($user->avatar ?? '/storage/default/user/profile/avatar.jpg'); ?>" class="lit_profile">
                    <div id="particle-container" style="z-index:1"></div>
                    <script>
                        setInterval( function() {pop('particle-container');}, 5000);
                        setInterval( function() {pop('particle-container-mobile');}, 5000);

                        function pop (elem) {
                            const bbox = document.querySelector('#' + elem).getBoundingClientRect();
                            const x = bbox.width / 2;
                            const y = bbox.height / 2;
                            for (let i = 0; i < 30; i++) {
                              createParticle(x, y, elem, 105);
                            }
                        }
                        
                        function createParticle (x, y, parentID, distance) {
                          const particle = document.createElement('particle');
                          document.getElementById(parentID).appendChild(particle);
                          
                          // Calculate a random size from 5px to 25px
                          const size = Math.floor(Math.random() * 3 + 3);
                          particle.style.width = `${size}px`;
                          particle.style.height = `${size}px`;
                          particle.style.background = `radial-gradient( hsl(${Math.random() * 90 + 180}, 20%, ${Math.random() * 5 + 95}%), hsl(${Math.random() * 90 + 180}, 70%, 30%) )`;

                          const destinationX = x + (Math.random() - 0.5) * 2 * distance;
                          const destinationY = y + (Math.random() - 0.5) * 2 * distance;

                          const animation = particle.animate([
                            {
                              transform: `translate(-50%, -50%) translate(${x}px, ${y}px)`,
                              opacity: 1
                            },
                            {
                              transform: `translate(${destinationX}px, ${destinationY}px)`,
                              opacity: 0
                            }
                          ], {
                            duration: Math.random() * 2000 + 3000,
                            easing: 'cubic-bezier(0, .9, .8, 1)',
                            delay: Math.random() * 2000
                          });

                          animation.onfinish = () => {
                            particle.remove();
                          };
                        }
                    </script>
                    <?php endif; ?>
                    <!-- /HEXAGON -->
                </div>
                <!-- /USER AVATAR CONTENT -->

                <?php if($user->username != 'soulite'): ?>
                <!-- USER AVATAR PROGRESS -->
                <div class="user-avatar-progress">
                    <!-- HEXAGON -->
                    <?php if($user->gender == "Male"): ?>
                    <div class="hexagon-progress-124-136-male"></div>
                    <?php elseif($user->gender == "Female"): ?>
                    <div class="hexagon-progress-124-136-female"></div>
                    <?php elseif($user->gender == "Other"): ?>
                    <div class="hexagon-progress-124-136-other"></div>
                    <?php else: ?>
                    <div class="hexagon-progress-124-136"></div>
                    <?php endif; ?>
                    <!-- /HEXAGON -->
                </div>
                <!-- /USER AVATAR PROGRESS -->

                <!-- USER AVATAR PROGRESS BORDER -->
                <div class="user-avatar-progress-border">
                    <!-- HEXAGON -->
                    <div class="hexagon-border-124-136"></div>
                    <!-- /HEXAGON -->
                </div>
                <!-- /USER AVATAR PROGRESS BORDER -->
                <?php endif; ?>
            </a>
            <!-- /USER SHORT DESCRIPTION AVATAR -->

            <!-- USER SHORT DESCRIPTION AVATAR MOBILE-->
            <a class="user-short-description-avatar user-short-description-avatar-mobile user-avatar medium" <?php if($user->username != 'soulite'): ?> href="<?php echo e(Auth::user() == $user ? route('userProfileGet') : route('userPublicProfileGet', ['user' => $user->username])); ?>" <?php endif; ?>>
                <!-- USER AVATAR BORDER -->
                <div class="user-avatar-border">
                    <!-- HEXAGON -->
                    <?php if($user->username == 'soulite'): ?>
                     
                    <?php else: ?>
                    <div class="hexagon-120-132"></div>
                    <?php endif; ?>
                    <!-- /HEXAGON -->
                </div>
                <!-- /USER AVATAR BORDER -->

                <!-- USER AVATAR CONTENT -->
                <div class="user-avatar-content">
                    <!-- HEXAGON -->
                    <?php if($user->username == 'soulite'): ?>
                        <img src="/assets/img/svg/tiger.svg" class="lit_bg">
                        <img src="/assets/img/svg/circles.svg" class="lit_lights">
                        <img src="<?php echo e($user->avatar ?? '/storage/default/user/profile/avatar.jpg'); ?>" class="lit_profile">
                        <div id="particle-container-mobile" style="z-index:1"></div>
                    <?php else: ?>
                        <div class="hexagon-image-82-90" data-src="<?php echo e($user->avatar ?? '/storage/default/user/profile/avatar.jpg'); ?>"></div>
                    <?php endif; ?>
                    <!-- /HEXAGON -->
                </div>
                <!-- /USER AVATAR CONTENT -->
                <?php if($user->username != 'soulite'): ?>
                <!-- USER AVATAR PROGRESS -->
                <div class="user-avatar-progress">
                    <!-- HEXAGON -->
                    <?php if($user->gender == "Male"): ?>
                    <div class="hexagon-progress-100-110-male"></div>
                    <?php elseif($user->gender == "Female"): ?>
                    <div class="hexagon-progress-100-110-female"></div>
                    <?php elseif($user->gender == "Other"): ?>
                    <div class="hexagon-progress-100-110-other"></div>
                    <?php else: ?>
                    <div class="hexagon-progress-100-110"></div>
                    <?php endif; ?>
                    <!-- /HEXAGON -->
                </div>
                <!-- /USER AVATAR PROGRESS -->

                <!-- USER AVATAR PROGRESS BORDER -->
                <div class="user-avatar-progress-border">
                    <!-- HEXAGON -->
                    <div class="hexagon-border-100-110"></div>
                    <!-- /HEXAGON -->
                </div>
                <?php endif; ?>
                <!-- /USER AVATAR PROGRESS BORDER -->
            </a>
            <!-- /USER SHORT DESCRIPTION AVATAR MOBILE-->

            <!-- USER SHORT DESCRIPTION TITLE -->
            <p class="user-short-description-title"><a href="<?php echo e(Auth::user() == $user ? route('userProfileGet') : route('userPublicProfileGet', ['user' => $user->username])); ?>"><?php echo e($user->full_name ?? $user->username); ?></a></p>
            <!-- /USER SHORT DESCRIPTION TITLE -->

            <!-- USER SHORT DESCRIPTION TEXT -->
            <p class="user-short-description-text"><a href="<?php echo e($user->website ?? '#'); ?>" target="_blank"><?php echo e(parse_url($user->website)['host'] ?? ''); ?></a></p>
            <!-- /USER SHORT DESCRIPTION TEXT -->
        </div>
        <!-- /USER SHORT DESCRIPTION -->

        <!-- PROFILE HEADER SOCIAL LINKS WRAP -->
        <?php echo $__env->make('home.user.profile.partial.widgets.profile-header-social', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /PROFILE HEADER SOCIAL LINKS WRAP -->

        <!-- USER STATS -->
        <div class="user-stats">
            <!-- USER STAT -->
            <div class="user-stat big">
                <!-- USER STAT TITLE -->
                <p class="user-stat-title"><?php echo e($user->posts < 1000 ? $user->posts : number_format($user->posts/1000,1)."K"); ?></p>
                <!-- /USER STAT TITLE -->

                <!-- USER STAT TEXT -->
                <p class="user-stat-text">posts</p>
                <!-- /USER STAT TEXT -->
            </div>
            <!-- /USER STAT -->

            <!-- USER STAT -->
            <div class="user-stat big">
                <!-- USER STAT TITLE -->
                <p class="user-stat-title"><?php echo e($user->friends < 1000 ? $user->friends : number_format($user->friends/1000,1)."K"); ?></p>
                <!-- /USER STAT TITLE -->

                <!-- USER STAT TEXT -->
                <p class="user-stat-text">friends</p>
                <!-- /USER STAT TEXT -->
            </div>
            <!-- /USER STAT -->

            <!-- USER STAT -->
            <div class="user-stat big">
                <!-- USER STAT TITLE -->
                <p class="user-stat-title"><?php echo e($user->visits < 1000 ? $user->visits : number_format($user->visits/1000,1)."K"); ?></p>
                <!-- /USER STAT TITLE -->

                <!-- USER STAT TEXT -->
                <p class="user-stat-text">visits</p>
                <!-- /USER STAT TEXT -->
            </div>
            <!-- /USER STAT -->

            <?php if($user->country): ?>
            <!-- USER STAT -->
            <div class="user-stat big">
                <!-- USER STAT IMAGE -->
                <!--<img class="user-stat-image" src="/assets/img/flag/usa.png" alt="flag-usa">-->
                <img class="user-stat-image" src="<?php echo e('/assets/img/flags/'.$user->country.'.png'); ?>" alt="flag <?php echo e($user->country); ?>">
                <!-- /USER STAT IMAGE -->

                <!-- USER STAT TEXT -->
                <p class="user-stat-text"><?php echo e($user->country); ?></p>
                <!-- /USER STAT TEXT -->
            </div>
            <!-- /USER STAT -->
            <?php endif; ?>
        </div>
        <!-- /USER STATS -->

        <!-- PROFILE HEADER INFO ACTIONS -->
        <div class="profile-header-info-actions">
            <?php if( $addFriendButton ?? false): ?>
            <!-- PROFILE HEADER INFO ACTION -->
            <!--<a href="<?php echo e(route('userFriendshipAddGet', ['user' => $user->username])); ?>">
            <p class="profile-header-info-action button secondary"><span class="hide-text-mobile">Add</span> Friend +</p>
            </a>-->
                <a href="<?php echo e(route('userFriendshipAddGet', ['user' => $user->username])); ?>" class="profile-header-info-action button secondary"><span class="hide-text-mobile">Add</span> Friend +</a>
            <!-- /PROFILE HEADER INFO ACTION -->
            <?php endif; ?>

            <?php if( $cancelFriendButton ?? false): ?>
            <!-- PROFILE HEADER INFO ACTION -->

            <a href="<?php echo e(route('userFriendshipCancelGet', ['user' => $user->username])); ?>" class="profile-header-info-action button tertiary"><span class="hide-text-mobile">Cancel</span> Friend +</a>

            <!-- /PROFILE HEADER INFO ACTION -->
            <?php endif; ?>

            <?php if( $acceptFriendButton ?? false): ?>
            <!-- PROFILE HEADER INFO ACTION -->

            <a href="<?php echo e(route('userFriendshipAcceptGet', ['user' => $user->username])); ?>" class="profile-header-info-action button secondary"><span class="hide-text-mobile">Accept</span> Friend +</a>

            <!-- /PROFILE HEADER INFO ACTION -->
            <?php endif; ?>

            <?php if(($deniedFriendButton ?? false) || ($blockFriendButton ?? false) || ($unblockFriendButton ?? false) || ($unfriendButton ?? false)): ?>
            <!-- PROFILE HEADER INFO ACTION -->
            <!--<p class="profile-header-info-action button tertiary"><span class="hide-text-mobile">Unfriend</p>-->
            <!-- WIDGET BOX SETTINGS -->
            <div class="widget-box-settings">
                <!-- POST SETTINGS WRAP -->
                <div class="post-settings-wrap">
                    <!-- POST SETTINGS -->
                    <!--<div class="post-settings widget-box-post-settings-dropdown-trigger">-->
                        <!-- POST SETTINGS ICON -->
                        <p class="profile-header-info-action-dropdown button tertiary widget-box-post-settings-dropdown-trigger">
                        <svg class="post-settings-icon icon-members icon-white">
                            <use xlink:href="#svg-members"></use>
                        </svg>
                        </p>
                        <!-- /POST SETTINGS ICON -->
                    <!--</div>-->
                    <!-- /POST SETTINGS -->

                    <!-- SIMPLE DROPDOWN -->
                    <div class="simple-dropdown widget-box-post-settings-dropdown profile-header-info-action-dropdown-widget">
                        <?php if($unfriendButton ?? false): ?>
                        <!-- SIMPLE DROPDOWN LINK -->

                        <a href="<?php echo e(route('userFriendshipUnfriendGet', ['user' => $user->username])); ?>" class="simple-dropdown-link">Unfriend</a>
                        <br>

                        <!-- /SIMPLE DROPDOWN LINK -->
                        <?php endif; ?>

                        <?php if($deniedFriendButton ?? false): ?>
                        <!-- SIMPLE DROPDOWN LINK -->

                        <a href="<?php echo e(route('userFriendshipDeniedGet', ['user' => $user->username])); ?>" class="simple-dropdown-link">Denied friend +</a>

                        <!-- /SIMPLE DROPDOWN LINK -->
                        <?php endif; ?>

                        <?php if($blockFriendButton ?? false): ?>
                        <!-- SIMPLE DROPDOWN LINK -->

                        <a href="<?php echo e(route('userFriendshipBlockGet', ['user' => $user->username])); ?>" class="simple-dropdown-link">Block</a>

                        <!-- /SIMPLE DROPDOWN LINK -->
                        <?php endif; ?>

                        <?php if($unblockFriendButton ?? false): ?>
                        <!-- SIMPLE DROPDOWN LINK -->

                        <a href="<?php echo e(route('userFriendshipUnblockGet', ['user' => $user->username])); ?>" class="simple-dropdown-link">Unblock</a>

                        <!-- /SIMPLE DROPDOWN LINK -->
                        <?php endif; ?>
                    </div>
                    <!-- /SIMPLE DROPDOWN -->
                </div>
                <!-- /POST SETTINGS WRAP -->
            </div>
            <!-- /WIDGET BOX SETTINGS -->
            <!-- /PROFILE HEADER INFO ACTION -->
            <?php endif; ?>


            <?php if( $sendMessageButton ?? false): ?>
            <!-- PROFILE HEADER INFO ACTION -->
            <p class="profile-header-info-action button primary" id="profile-header-send-message" data-user="<?php echo e($user->username); ?>"><span class="hide-text-mobile">Send</span> Message</p>
            <!-- /PROFILE HEADER INFO ACTION -->
            <?php endif; ?>
        </div>
        <!-- /PROFILE HEADER INFO ACTIONS -->
    </div>
    <!-- /PROFILE HEADER INFO -->
</div>
<?php if( Auth::user() ): ?>
<?php
    if ( empty( $_COOKIE[ 'welcomed' ] ) ) {
    setcookie('welcomed', 'yes', time() + (86400 * 365 * 5), "/");
?>
<div id="welcome_msg" style="display:flex;position:fixed;top:0;left:0;width:100%;height:100vh;background-color:rgba(0,0,0,0.5);align-items:center;justify-content:center;z-index:999" onclick="if(event.target == this)this.style.display='none';">
    <div class="gradient-border" id="box">
        <div style="width:100%;">
            <h2 style="color:#f8468d"><strong>Welcome to Tongle</strong></h2>
            <p>If you need someone to talk to, all the advisors have been added to your chat room.</p>
            <p>Don't feel shy, add any friends who interest you.<br>At Tongle, we are 24/7 by your side.</p>
        </div>
    </div>
</div>
<audio id="welcome_sound" autoplay style="display:none">
    <source src="https://alpha.ljltongle.com/assets/audio/tonggle.mp3">
</audio>
<script>
    document.getElementById('welcome_sound').onended = function() {
        document.getElementById('welcome_msg').style.display = 'none'
    }
</script>
<style>
    #box {
      display:flex;
      align-items:center;
      justify-content:center;
      text-align:center;
      width: 400px;
      color: white;
      font-size:1.5em;
      max-width:90%;
      padding:5%;
    }
    #box p {
        margin:20px 0;
        color:#c4ebfb;
    }
    .gradient-border {
      --borderWidth: 3px;
      background: #1D1F20;
      position: relative;
      border-radius: var(--borderWidth);
    }
    .gradient-border:after {
      content: '';
      position: absolute;
      top: calc(-1 * var(--borderWidth));
      left: calc(-1 * var(--borderWidth));
      height: calc(100% + var(--borderWidth) * 2);
      width: calc(100% + var(--borderWidth) * 2);
      background: linear-gradient(60deg, #f79533, #f37055, #ef4e7b, #a166ab, #5073b8, #1098ad, #07b39b, #6fba82);
      border-radius: calc(2 * var(--borderWidth));
      z-index: -1;
      animation: animatedgradient 3s ease alternate infinite;
      background-size: 300% 300%;
    }
    
    
    @keyframes  animatedgradient {
    	0% {
    		background-position: 0% 50%;
    	}
    	50% {
    		background-position: 100% 50%;
    	}
    	100% {
    		background-position: 0% 50%;
    	}
    }
</style>
<?php
}
?>
<?php endif; ?><?php /**PATH E:\xampp\htdocs\msm\resources\views/home/user/profile/partial/profile-header.blade.php ENDPATH**/ ?>