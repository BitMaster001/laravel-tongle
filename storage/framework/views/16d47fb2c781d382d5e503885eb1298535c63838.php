<nav id="navigation-widget-mobile" class="navigation-widget navigation-widget-mobile sidebar left hidden" data-simplebar>
    <!-- NAVIGATION WIDGET CLOSE BUTTON -->
    <div class="navigation-widget-close-button">
        <!-- NAVIGATION WIDGET CLOSE BUTTON ICON -->
        <svg class="navigation-widget-close-button-icon icon-back-arrow">
            <use xlink:href="#svg-back-arrow"></use>
        </svg>
        <!-- NAVIGATION WIDGET CLOSE BUTTON ICON -->
    </div>
    <!-- /NAVIGATION WIDGET CLOSE BUTTON -->

    <!-- NAVIGATION WIDGET INFO WRAP -->
    <div class="navigation-widget-info-wrap">
        <!-- NAVIGATION WIDGET INFO -->
        <div class="navigation-widget-info">
            <!-- USER AVATAR -->
            <a class="user-avatar small no-outline" href="<?php echo e(route('userProfileGet')); ?>">
                <!-- USER AVATAR CONTENT -->
                <div class="user-avatar-content">
                    <!-- HEXAGON -->
                    <div class="hexagon-image-30-32" data-src="<?php echo e(Auth::user()->avatar ?? '/storage/default/user/profile/avatar.jpg'); ?>"></div>
                    <!-- /HEXAGON -->
                </div>
                <!-- /USER AVATAR CONTENT -->

                <!-- USER AVATAR PROGRESS -->
                <div class="user-avatar-progress">
                    <!-- HEXAGON -->
                    <?php if(Auth::user()->gender == "Male"): ?>
                    <div class="hexagon-progress-40-44-male"></div>
                    <?php elseif(Auth::user()->gender == "Female"): ?>
                    <div class="hexagon-progress-40-44-female"></div>
                    <?php elseif(Auth::user()->gender == "Other"): ?>
                    <div class="hexagon-progress-40-44-other"></div>
                    <?php else: ?>
                    <div class="hexagon-progress-40-44"></div>
                    <?php endif; ?>
                    <!-- /HEXAGON -->
                </div>
                <!-- /USER AVATAR PROGRESS -->

                <!-- USER AVATAR PROGRESS BORDER -->
                <div class="user-avatar-progress-border">
                    <!-- HEXAGON -->
                    <div class="hexagon-border-40-44"></div>
                    <!-- /HEXAGON -->
                </div>
                <!-- /USER AVATAR PROGRESS BORDER -->
            </a>
            <!-- /USER AVATAR -->

            <!-- NAVIGATION WIDGET INFO TITLE -->
            <p class="navigation-widget-info-title"><a href="<?php echo e(route('userProfileGet')); ?>"><?php echo e(Auth::user()->full_name ?? Auth::user()->username); ?></a></p>
            <!-- /NAVIGATION WIDGET INFO TITLE -->

            <!-- NAVIGATION WIDGET INFO TEXT -->
            <p class="navigation-widget-info-text">Welcome Back!</p>
            <!-- /NAVIGATION WIDGET INFO TEXT -->
        </div>
        <!-- /NAVIGATION WIDGET INFO -->

        <!-- NAVIGATION WIDGET BUTTON -->
        <a href="<?php echo e(route('logoutGet')); ?>">
        <p class="navigation-widget-info-button button small secondary">Logout</p>
        </a>
        <!-- /NAVIGATION WIDGET BUTTON -->
    </div>
    <!-- /NAVIGATION WIDGET INFO WRAP -->

    <!-- NAVIGATION WIDGET SECTION TITLE -->
    <p class="navigation-widget-section-title">Sections</p>
    <!-- /NAVIGATION WIDGET SECTION TITLE -->

    <!-- MENU -->
    <ul class="menu">
        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="<?php echo e(route('homeGet')); ?>">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-newsfeed">
                    <use xlink:href="#svg-newsfeed"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Newsfeed
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="<?php echo e(route('userProfileGet')); ?>">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-timeline">
                    <use xlink:href="#svg-timeline"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Profile
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="<?php echo e(route('getGroups')); ?>">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-group">
                    <use xlink:href="#svg-group"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Groups
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="<?php echo e(route('getMembers')); ?>">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-members">
                    <use xlink:href="#svg-members"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Members
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->
        
                <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="<?php echo e(route('getEventSearch')); ?>">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-events">
                    <use xlink:href="#svg-events-monthly"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                All Events
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="<?php echo e(route('getEvent')); ?>">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-events">
                    <use xlink:href="#svg-events"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                My Events
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="<?php echo e(route('getForum')); ?>">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-forums">
                    <use xlink:href="#svg-forums"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Q & A
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="<?php echo e(route('getMarketplace')); ?>">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-marketplace">
                    <use xlink:href="#svg-marketplace"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Marketplace
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="<?php echo e(route('getMapSearch')); ?>">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-marketplace">
                    <use xlink:href="#svg-magnifying-glass"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                3D Map Search
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->
    </ul>
    <!-- /MENU -->

    <!-- NAVIGATION WIDGET SECTION TITLE -->
    <p class="navigation-widget-section-title">My Profile</p>
    <!-- /NAVIGATION WIDGET SECTION TITLE -->

    <!-- NAVIGATION WIDGET SECTION LINK -->
    <a class="navigation-widget-section-link" href="<?php echo e(route('settingsProfileInfoGet')); ?>">Profile Info</a>
    <!-- /NAVIGATION WIDGET SECTION LINK -->

    <!-- NAVIGATION WIDGET SECTION LINK -->
    <a class="navigation-widget-section-link" href="<?php echo e(route('settingsSocialStreamGet')); ?>">Social &amp; Stream</a>
    <!-- /NAVIGATION WIDGET SECTION LINK -->

    <!-- NAVIGATION WIDGET SECTION LINK -->
    <a class="navigation-widget-section-link" href="<?php echo e(route('settingsMessagesGet')); ?>">Messages</a>
    <!-- /NAVIGATION WIDGET SECTION LINK -->

    <!-- NAVIGATION WIDGET SECTION LINK -->
    <a class="navigation-widget-section-link" href="<?php echo e(route('settingsFriendRequestsGet')); ?>">Friend Requests</a>
    <!-- /NAVIGATION WIDGET SECTION LINK -->

    <!-- NAVIGATION WIDGET SECTION TITLE -->
    <p class="navigation-widget-section-title">Account</p>
    <!-- /NAVIGATION WIDGET SECTION TITLE -->

    <!-- NAVIGATION WIDGET SECTION LINK -->
    <a class="navigation-widget-section-link" href="<?php echo e(route('settingsChangePasswordGet')); ?>">Change Password</a>
    <!-- /NAVIGATION WIDGET SECTION LINK -->

    <!-- NAVIGATION WIDGET SECTION LINK -->
    <a class="navigation-widget-section-link" href="<?php echo e(route('settingsGeneralSettingsGet')); ?>">General Settings</a>
    <!-- /NAVIGATION WIDGET SECTION LINK -->

    <!-- NAVIGATION WIDGET SECTION TITLE -->
    <p class="navigation-widget-section-title">Groups</p>
    <!-- /NAVIGATION WIDGET SECTION TITLE -->

    <!-- NAVIGATION WIDGET SECTION LINK -->
    <a class="navigation-widget-section-link" href="<?php echo e(route('settingsManageGroupsGet')); ?>">Manage Groups</a>
    <!-- /NAVIGATION WIDGET SECTION LINK -->

    <!-- NAVIGATION WIDGET SECTION LINK -->
    <a class="navigation-widget-section-link" href="<?php echo e(route('settingsInvitationsGet')); ?>">Invitations</a>
    <!-- /NAVIGATION WIDGET SECTION LINK -->

    <!-- NAVIGATION WIDGET SECTION TITLE -->
    <p class="navigation-widget-section-title">My Store</p>
    <!-- /NAVIGATION WIDGET SECTION TITLE -->

    <!-- NAVIGATION WIDGET SECTION LINK -->
    <a class="navigation-widget-section-link" href="<?php echo e(route('settingsManageStoreGet')); ?>">Manage Store</a>
    <!-- /NAVIGATION WIDGET SECTION LINK -->

    <?php if(Auth::user()->admin): ?>
    <!-- DROPDOWN NAVIGATION CATEGORY -->
    <p class="navigation-widget-section-title">Admin</p>
    <!-- /DROPDOWN NAVIGATION CATEGORY -->

    <!-- DROPDOWN NAVIGATION LINK -->
    <a class="navigation-widget-section-link" href="<?php echo e(route('getUserManagement')); ?>">User Management</a>
    <!-- /DROPDOWN NAVIGATION LINK -->

    <!-- DROPDOWN NAVIGATION LINK -->
    <a class="navigation-widget-section-link" href="<?php echo e(route('getAdminMessage')); ?>">Admin Message</a>
    <!-- /DROPDOWN NAVIGATION LINK -->

    <!-- DROPDOWN NAVIGATION LINK -->
    <a class="navigation-widget-section-link" href="<?php echo e(route('getConversation')); ?>">Conversation</a>
    <!-- /DROPDOWN NAVIGATION LINK -->
    <?php endif; ?>

</nav>
<?php /**PATH E:\xampp\htdocs\msm\resources\views/layouts/sidebar/mobile.blade.php ENDPATH**/ ?>