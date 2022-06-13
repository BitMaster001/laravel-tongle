<?php $__env->startSection('title'); ?>
Messages
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- SECTION BANNER -->
    <?php echo $__env->make('home.user.profile.settings.partial.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /SECTION BANNER -->

    <!-- GRID -->
    <div class="grid grid-3-9 medium-space">
        <!-- GRID COLUMN -->
        <?php echo $__env->make('home.user.profile.settings.partial.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /GRID COLUMN -->

        <!-- GRID COLUMN -->
        <div class="account-hub-content">
            <!-- SECTION HEADER -->
            <div class="section-header">
                <!-- SECTION HEADER INFO -->
                <div class="section-header-info">
                    <!-- SECTION PRETITLE -->
                    <p class="section-pretitle">My Profile</p>
                    <!-- /SECTION PRETITLE -->

                    <!-- SECTION TITLE -->
                    <h2 class="section-title">Messages</h2>
                    <!-- /SECTION TITLE -->
                </div>
                <!-- /SECTION HEADER INFO -->

                <!-- SECTION HEADER ACTIONS -->
                <div class="section-header-actions">
                    <?php if(false): ?>
                    <!-- SECTION HEADER ACTION -->
                    <p class="section-header-action">Mark all as Read</p>
                    <!-- /SECTION HEADER ACTION -->

                    <!-- SECTION HEADER ACTION -->
                    <p class="section-header-action">Settings</p>
                    <!-- /SECTION HEADER ACTION -->
                    <?php endif; ?>
                </div>
                <!-- /SECTION HEADER ACTIONS -->
            </div>
            <!-- /SECTION HEADER -->

            <!-- CHAT WIDGET WRAP -->
            <div class="chat-widget-wrap">
                <!-- CHAT WIDGET -->
                <div class="chat-widget static">
                    <!-- CHAT WIDGET MESSAGES -->
                    <div class="chat-widget-messages" id="friends-chat-full-messages" data-simplebar>
                        <?php if(false): ?>
                        <!-- CHAT WIDGET MESSAGE -->
                        <div class="chat-widget-message">
                            <!-- USER STATUS -->
                            <div class="user-status">
                                <!-- USER STATUS AVATAR -->
                                <div class="user-status-avatar">
                                    <!-- USER AVATAR -->
                                    <div class="user-avatar small no-outline">
                                        <!-- USER AVATAR CONTENT -->
                                        <div class="user-avatar-content">
                                            <!-- HEXAGON -->
                                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/04.jpg"></div>
                                            <!-- /HEXAGON -->
                                        </div>
                                        <!-- /USER AVATAR CONTENT -->

                                        <!-- USER AVATAR PROGRESS -->
                                        <div class="user-avatar-progress">
                                            <!-- HEXAGON -->
                                            <div class="hexagon-progress-40-44"></div>
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

                                        <!-- USER AVATAR BADGE -->
                                        <div class="user-avatar-badge">
                                            <!-- USER AVATAR BADGE BORDER -->
                                            <div class="user-avatar-badge-border">
                                                <!-- HEXAGON -->
                                                <div class="hexagon-22-24"></div>
                                                <!-- /HEXAGON -->
                                            </div>
                                            <!-- /USER AVATAR BADGE BORDER -->

                                            <!-- USER AVATAR BADGE CONTENT -->
                                            <div class="user-avatar-badge-content">
                                                <!-- HEXAGON -->
                                                <div class="hexagon-dark-16-18"></div>
                                                <!-- /HEXAGON -->
                                            </div>
                                            <!-- /USER AVATAR BADGE CONTENT -->

                                            <!-- USER AVATAR BADGE TEXT -->
                                            <p class="user-avatar-badge-text">6</p>
                                            <!-- /USER AVATAR BADGE TEXT -->
                                        </div>
                                        <!-- /USER AVATAR BADGE -->
                                    </div>
                                    <!-- /USER AVATAR -->
                                </div>
                                <!-- /USER STATUS AVATAR -->

                                <!-- USER STATUS TITLE -->
                                <p class="user-status-title"><span class="bold">Bearded Wonder</span></p>
                                <!-- /USER STATUS TITLE -->

                                <!-- USER STATUS TEXT -->
                                <p class="user-status-text">Great! Then we'll meet with them at the party...</p>
                                <!-- /USER STATUS TEXT -->

                                <!-- USER STATUS TIMESTAMP -->
                                <p class="user-status-timestamp floaty">2 hours ago</p>
                                <!-- /USER STATUS TIMESTAMP -->
                            </div>
                            <!-- /USER STATUS -->
                        </div>
                        <!-- /CHAT WIDGET MESSAGE -->

                        <!-- CHAT WIDGET MESSAGE -->
                        <div class="chat-widget-message active">
                            <!-- USER STATUS -->
                            <div class="user-status">
                                <!-- USER STATUS AVATAR -->
                                <div class="user-status-avatar">
                                    <!-- USER AVATAR -->
                                    <div class="user-avatar small no-outline">
                                        <!-- USER AVATAR CONTENT -->
                                        <div class="user-avatar-content">
                                            <!-- HEXAGON -->
                                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/03.jpg"></div>
                                            <!-- /HEXAGON -->
                                        </div>
                                        <!-- /USER AVATAR CONTENT -->

                                        <!-- USER AVATAR PROGRESS -->
                                        <div class="user-avatar-progress">
                                            <!-- HEXAGON -->
                                            <div class="hexagon-progress-40-44"></div>
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

                                        <!-- USER AVATAR BADGE -->
                                        <div class="user-avatar-badge">
                                            <!-- USER AVATAR BADGE BORDER -->
                                            <div class="user-avatar-badge-border">
                                                <!-- HEXAGON -->
                                                <div class="hexagon-22-24"></div>
                                                <!-- /HEXAGON -->
                                            </div>
                                            <!-- /USER AVATAR BADGE BORDER -->

                                            <!-- USER AVATAR BADGE CONTENT -->
                                            <div class="user-avatar-badge-content">
                                                <!-- HEXAGON -->
                                                <div class="hexagon-dark-16-18"></div>
                                                <!-- /HEXAGON -->
                                            </div>
                                            <!-- /USER AVATAR BADGE CONTENT -->

                                            <!-- USER AVATAR BADGE TEXT -->
                                            <p class="user-avatar-badge-text">16</p>
                                            <!-- /USER AVATAR BADGE TEXT -->
                                        </div>
                                        <!-- /USER AVATAR BADGE -->
                                    </div>
                                    <!-- /USER AVATAR -->
                                </div>
                                <!-- /USER STATUS AVATAR -->

                                <!-- USER STATUS TITLE -->
                                <p class="user-status-title"><span class="bold">Nick Grissom</span></p>
                                <!-- /USER STATUS TITLE -->

                                <!-- USER STATUS TEXT -->
                                <p class="user-status-text">Can you stream the new game?</p>
                                <!-- /USER STATUS TEXT -->

                                <!-- USER STATUS TIMESTAMP -->
                                <p class="user-status-timestamp floaty">2 hours ago</p>
                                <!-- /USER STATUS TIMESTAMP -->
                            </div>
                            <!-- /USER STATUS -->
                        </div>
                        <!-- /CHAT WIDGET MESSAGE -->
                        <?php endif; ?>

                    </div>
                    <!-- /CHAT WIDGET MESSAGES -->

                    <!-- CHAT WIDGET FORM -->
                    <div class="chat-widget-form">
                        <!-- INTERACTIVE INPUT -->
                        <div class="interactive-input small">
                            <input type="text" id="chat-full-search" name="chat_widget_search_2" placeholder="Search Messages...">
                            <!-- INTERACTIVE INPUT ICON WRAP -->
                            <div class="interactive-input-icon-wrap">
                                <!-- INTERACTIVE INPUT ICON -->
                                <svg class="interactive-input-icon icon-magnifying-glass">
                                    <use xlink:href="#svg-magnifying-glass"></use>
                                </svg>
                                <!-- /INTERACTIVE INPUT ICON -->
                            </div>
                            <!-- /INTERACTIVE INPUT ICON WRAP -->

                            <!-- INTERACTIVE INPUT ACTION -->
                            <div class="interactive-input-action" id="chat-full-search-clear">
                                <!-- INTERACTIVE INPUT ACTION ICON -->
                                <svg class="interactive-input-action-icon icon-cross-thin">
                                    <use xlink:href="#svg-cross-thin"></use>
                                </svg>
                                <!-- /INTERACTIVE INPUT ACTION ICON -->
                            </div>
                            <!-- /INTERACTIVE INPUT ACTION -->
                        </div>
                        <!-- /INTERACTIVE INPUT -->
                    </div>
                    <!-- /CHAT WIDGET FORM -->
                </div>
                <!-- /CHAT WIDGET -->

                <!-- CHAT WIDGET -->
                <div class="chat-widget" id="chat-full-message" hidden>
                    <!-- CHAT WIDGET HEADER -->
                    <div class="chat-widget-header">

                        <!-- CHAT WIDGET SETTINGS -->
                        <div class="chat-widget-settings">
                            <!-- POST SETTINGS WRAP -->
                            <div class="post-settings-wrap">
                                <!-- POST SETTINGS -->
                                <div class="post-settings widget-box-post-settings-dropdown-trigger">
                                    <!-- POST SETTINGS ICON -->
                                    <svg class="post-settings-icon icon-more-dots">
                                        <use xlink:href="#svg-more-dots"></use>
                                    </svg>
                                    <!-- /POST SETTINGS ICON -->
                                </div>
                                <!-- /POST SETTINGS -->

                                <!-- SIMPLE DROPDOWN -->
                                <div class="simple-dropdown widget-box-post-settings-dropdown">
                                    <!-- SIMPLE DROPDOWN LINK -->
                                    <a  href="#" class="simple-dropdown-link" id="chat-widget-delete">Delete</a>
                                    <!-- /SIMPLE DROPDOWN LINK -->
                                    <?php if(false): ?>
                                    <!-- SIMPLE DROPDOWN LINK -->
                                    <p class="simple-dropdown-link">Block</p>
                                    <!-- /SIMPLE DROPDOWN LINK -->

                                    <!-- SIMPLE DROPDOWN LINK -->
                                    <p class="simple-dropdown-link">Mute</p>
                                    <!-- /SIMPLE DROPDOWN LINK -->
                                    <?php endif; ?>
                                </div>
                                <!-- /SIMPLE DROPDOWN -->
                            </div>
                            <!-- /POST SETTINGS WRAP -->
                        </div>
                        <!-- CHAT WIDGET SETTINGS -->

                        <!-- USER STATUS -->
                        <div class="user-status">
                            <!-- USER STATUS AVATAR -->
                            <div class="user-status-avatar">
                                <!-- USER AVATAR -->
                                <div class="user-avatar small no-outline online" id="chat-full-avatar-status">
                                    <!-- USER AVATAR CONTENT -->
                                    <div class="user-avatar-content">
                                        <!-- HEXAGON -->
                                        <div class="hexagon-image-30-32" id="chat-full-avatar" data-src=""></div>
                                        <!-- /HEXAGON -->
                                    </div>
                                    <!-- /USER AVATAR CONTENT -->

                                    <!-- USER AVATAR PROGRESS -->
                                    <div class="user-avatar-progress">
                                        <!-- HEXAGON -->
                                        <div class="hexagon-progress-40-44" id="chat-full-gender"></div>
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

                                </div>
                                <!-- /USER AVATAR -->
                            </div>
                            <!-- /USER STATUS AVATAR -->

                            <!-- USER STATUS TITLE -->
                            <p class="user-status-title"><span id="chat-full-name" class="bold"></span></p>
                            <!-- /USER STATUS TITLE -->

                            <!-- USER STATUS TAG -->
                            <p class="" id="chat-full-status"></p>
                            <!-- /USER STATUS TAG -->
                        </div>
                        <!-- /USER STATUS -->
                    </div>
                    <!-- /CHAT WIDGET HEADER -->

                    <!-- CHAT WIDGET CONVERSATION -->
                    <div class="chat-widget-conversation" id="chat-full-conversation" data-simplebar>
                        <?php if(false): ?>
                        <!-- CHAT WIDGET SPEAKER -->
                        <div class="chat-widget-speaker left">
                            <!-- CHAT WIDGET SPEAKER AVATAR -->
                            <div class="chat-widget-speaker-avatar">
                                <!-- USER AVATAR -->
                                <div class="user-avatar tiny no-border">
                                    <!-- USER AVATAR CONTENT -->
                                    <div class="user-avatar-content">
                                        <!-- HEXAGON -->
                                        <div class="hexagon-image-24-26" data-src=""></div>
                                        <!-- /HEXAGON -->
                                    </div>
                                    <!-- /USER AVATAR CONTENT -->
                                </div>
                                <!-- /USER AVATAR -->
                            </div>
                            <!-- /CHAT WIDGET SPEAKER AVATAR -->

                            <!-- CHAT WIDGET SPEAKER MESSAGE -->
                            <p class="chat-widget-speaker-message">Hi Marina! It's been a long time!</p>
                            <!-- /CHAT WIDGET SPEAKER MESSAGE -->

                            <!-- CHAT WIDGET SPEAKER TIMESTAMP -->
                            <p class="chat-widget-speaker-timestamp">Yesterday at 8:36PM</p>
                            <!-- /CHAT WIDGET SPEAKER TIMESTAMP -->
                        </div>
                        <!-- /CHAT WIDGET SPEAKER -->

                        <!-- CHAT WIDGET SPEAKER -->
                        <div class="chat-widget-speaker right">
                            <!-- CHAT WIDGET SPEAKER MESSAGE -->
                            <p class="chat-widget-speaker-message">Hey Nick!</p>
                            <!-- /CHAT WIDGET SPEAKER MESSAGE -->

                            <!-- CHAT WIDGET SPEAKER MESSAGE -->
                            <p class="chat-widget-speaker-message">You're right, it's been a really long time! I think the last time we saw was at Neko's party</p>
                            <!-- /CHAT WIDGET SPEAKER MESSAGE -->

                            <!-- CHAT WIDGET SPEAKER TIMESTAMP -->
                            <p class="chat-widget-speaker-timestamp">10:05AM</p>
                            <!-- /CHAT WIDGET SPEAKER TIMESTAMP -->
                        </div>
                        <!-- /CHAT WIDGET SPEAKER -->

                        <!-- CHAT WIDGET SPEAKER -->
                        <div class="chat-widget-speaker left">
                            <!-- CHAT WIDGET SPEAKER AVATAR -->
                            <div class="chat-widget-speaker-avatar">
                                <!-- USER AVATAR -->
                                <div class="user-avatar tiny no-border">
                                    <!-- USER AVATAR CONTENT -->
                                    <div class="user-avatar-content">
                                        <!-- HEXAGON -->
                                        <div class="hexagon-image-24-26" data-src="/assets/img/avatar/03.jpg"></div>
                                        <!-- /HEXAGON -->
                                    </div>
                                    <!-- /USER AVATAR CONTENT -->
                                </div>
                                <!-- /USER AVATAR -->
                            </div>
                            <!-- /CHAT WIDGET SPEAKER AVATAR -->

                            <!-- CHAT WIDGET SPEAKER MESSAGE -->
                            <p class="chat-widget-speaker-message">Yeah! I remember now! The stream launch party</p>
                            <!-- /CHAT WIDGET SPEAKER MESSAGE -->

                            <!-- CHAT WIDGET SPEAKER MESSAGE -->
                            <p class="chat-widget-speaker-message">That reminds me that I wanted to ask you something</p>
                            <!-- /CHAT WIDGET SPEAKER MESSAGE -->

                            <!-- CHAT WIDGET SPEAKER MESSAGE -->
                            <p class="chat-widget-speaker-message">Can you stream the new game?</p>
                            <!-- /CHAT WIDGET SPEAKER MESSAGE -->
                        </div>
                        <!-- /CHAT WIDGET SPEAKER -->
                        <?php endif; ?>
                    </div>
                    <!-- /CHAT WIDGET CONVERSATION -->

                    <!-- CHAT WIDGET FORM -->
                    <div class="chat-widget-form">
                        <!-- FORM ROW -->
                        <div class="form-row split">
                            <!-- FORM ITEM -->
                            <div class="form-item">


                                <!-- INTERACTIVE INPUT -->
                                <div class="interactive-input small">
                                    <input type="text" id="chat-full-message-text" name="chat_widget_message_text_2" placeholder="Write a message...">
                                    <?php if(false): ?>
                                    <!-- INTERACTIVE INPUT ICON WRAP -->
                                    <div class="interactive-input-icon-wrap actionable">
                                        <!-- TOOLTIP WRAP -->
                                        <div class="tooltip-wrap text-tooltip-tft" data-title="Send Photo">
                                            <!-- INTERACTIVE INPUT ICON -->
                                            <svg class="interactive-input-icon icon-camera">
                                                <use xlink:href="#svg-camera"></use>
                                            </svg>
                                            <!-- /INTERACTIVE INPUT ICON -->
                                        </div>
                                        <!-- /TOOLTIP WRAP -->
                                    </div>
                                    <!-- /INTERACTIVE INPUT ICON WRAP -->
                                    <?php endif; ?>
                                    <!-- INTERACTIVE INPUT ICON WRAP -->
                                    <div class="interactive-input-icon-wrap">
                                        <!-- INTERACTIVE INPUT ICON -->
                                        <svg class="interactive-input-icon icon-send-message" id="chat-widget-message-send">
                                            <use xlink:href="#svg-send-message"></use>
                                        </svg>
                                        <!-- /INTERACTIVE INPUT ICON -->
                                    </div>
                                    <!-- /INTERACTIVE INPUT ICON WRAP -->

                                    <!-- INTERACTIVE INPUT ACTION -->
                                    <div class="interactive-input-action" id="chat-full-message-clear">
                                        <!-- INTERACTIVE INPUT ACTION ICON -->
                                        <svg class="interactive-input-action-icon icon-cross-thin">
                                            <use xlink:href="#svg-cross-thin"></use>
                                        </svg>
                                        <!-- /INTERACTIVE INPUT ACTION ICON -->
                                    </div>
                                    <!-- /INTERACTIVE INPUT ACTION -->
                                </div>
                                <!-- /INTERACTIVE INPUT -->

                            </div>
                            <!-- /FORM ITEM -->

                            <!-- FORM ITEM -->
                            <div class="form-item auto-width" id="chat-widget-conversation-send">
                                <!-- BUTTON -->
                                <p class="button primary padded">
                                    <!-- BUTTON ICON -->
                                    <svg class="button-icon no-space icon-send-message">
                                        <use xlink:href="#svg-send-message"></use>
                                    </svg>
                                    <!-- /BUTTON ICON -->
                                </p>
                                <!-- /BUTTON -->
                            </div>
                            <!-- /FORM ITEM -->
                        </div>
                        <!-- /FORM ROW -->
                    </div>
                    <!-- /CHAT WIDGET FORM -->
                </div>
                <!-- /CHAT WIDGET -->
            </div>
            <!-- /CHAT WIDGET WRAP -->
        </div>
        <!-- /GRID COLUMN -->
    </div>
    <!-- /GRID -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stylesheets'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!-- global.accordions -->
<script src="/assets/js/global/global.accordions.js"></script>
<script>
fullMessage = true;
document.getElementById("chat-widget-messages").style.display = 'none';
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\msm\resources\views/home/user/profile/settings/messages.blade.php ENDPATH**/ ?>