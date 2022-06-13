<?php $__env->startSection('title'); ?>
General Settings
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<form class="form" method="post" action="<?php echo e(route('settingsGeneralSettingsPost')); ?>">
    <?php echo csrf_field(); ?>
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
                    <p class="section-pretitle">Account</p>
                    <!-- /SECTION PRETITLE -->

                    <!-- SECTION TITLE -->
                    <h2 class="section-title">General Settings</h2>
                    <!-- /SECTION TITLE -->
                </div>
                <!-- /SECTION HEADER INFO -->
            </div>
            <!-- /SECTION HEADER -->

            <!-- GRID COLUMN -->
            <div class="grid-column">
                <!-- WIDGET BOX -->
                <div class="widget-box">
                    <!-- WIDGET BOX TITLE -->
                    <p class="widget-box-title">Email Notifications</p>
                    <!-- /WIDGET BOX TITLE -->

                    <!-- WIDGET BOX CONTENT -->
                    <div class="widget-box-content">
                        <!-- SWITCH OPTION LIST -->
                        <div class="switch-option-list">
                            <!-- SWITCH OPTION -->
                            <div class="switch-option">
                                <!-- SWITCH OPTION TITLE -->
                                <p class="switch-option-title">Newsletters</p>
                                <!-- /SWITCH OPTION TITLE -->

                                <!-- SWITCH OPTION TEXT -->
                                <p class="switch-option-text">You'll be notified with TongLe news and updates.</p>
                                <!-- /SWITCH OPTION TEXT -->

                                <!-- FORM SWITCH -->
                                <div class="form-switch<?php echo e(Auth::user()->email_notification_newsletter ? ' active' : ''); ?>">
                                    <!-- FORM SWITCH BUTTON -->
                                    <div class="form-switch-button"></div>
                                    <!-- /FORM SWITCH BUTTON -->
                                    <input name="email-notification-newsletter" type="checkbox" hidden <?php echo e(Auth::user()->email_notification_newsletter ? 'checked' : ''); ?>>
                                </div>
                                <!-- /FORM SWITCH -->
                            </div>
                            <!-- /SWITCH OPTION -->

                            <!-- SWITCH OPTION -->
                            <div class="switch-option">
                                <!-- SWITCH OPTION TITLE -->
                                <p class="switch-option-title">Comments</p>
                                <!-- /SWITCH OPTION TITLE -->

                                <!-- SWITCH OPTION TEXT -->
                                <p class="switch-option-text">You'll be notified when someone comments on your posts and/or replies to your comments</p>
                                <!-- /SWITCH OPTION TEXT -->

                                <!-- FORM SWITCH -->
                                <div class="form-switch<?php echo e(Auth::user()->email_notification_comment ? ' active' : ''); ?>">
                                    <!-- FORM SWITCH BUTTON -->
                                    <div class="form-switch-button"></div>
                                    <!-- /FORM SWITCH BUTTON -->
                                    <input name="email-notification-comment" type="checkbox" hidden <?php echo e(Auth::user()->email_notification_comment ? 'checked' : ''); ?>>
                                </div>
                                <!-- /FORM SWITCH -->
                            </div>
                            <!-- /SWITCH OPTION -->

                            <!-- SWITCH OPTION -->
                            <div class="switch-option">
                                <!-- SWITCH OPTION TITLE -->
                                <p class="switch-option-title">Tags</p>
                                <!-- /SWITCH OPTION TITLE -->

                                <!-- SWITCH OPTION TEXT -->
                                <p class="switch-option-text">These are notifications for when someone tags you in a post of image</p>
                                <!-- /SWITCH OPTION TEXT -->

                                <!-- FORM SWITCH -->
                                <div class="form-switch<?php echo e(Auth::user()->email_notification_tag ? ' active' : ''); ?>">
                                    <!-- FORM SWITCH BUTTON -->
                                    <div class="form-switch-button"></div>
                                    <!-- /FORM SWITCH BUTTON -->
                                    <input name="email-notification-tag" type="checkbox" hidden <?php echo e(Auth::user()->email_notification_tag ? 'checked' : ''); ?>>
                                </div>
                                <!-- /FORM SWITCH -->
                            </div>
                            <!-- /SWITCH OPTION -->

                            <!-- SWITCH OPTION -->
                            <div class="switch-option">
                                <!-- SWITCH OPTION TITLE -->
                                <p class="switch-option-title">Friend Requests</p>
                                <!-- /SWITCH OPTION TITLE -->

                                <!-- SWITCH OPTION TEXT -->
                                <p class="switch-option-text">You'll be notified when someone send you a friend request</p>
                                <!-- /SWITCH OPTION TEXT -->

                                <!-- FORM SWITCH -->
                                <div class="form-switch<?php echo e(Auth::user()->email_notification_friend_request ? ' active' : ''); ?>">
                                    <!-- FORM SWITCH BUTTON -->
                                    <div class="form-switch-button"></div>
                                    <!-- /FORM SWITCH BUTTON -->
                                    <input name="email-notification-friend_request" type="checkbox" hidden <?php echo e(Auth::user()->email_notification_friend_request ? 'checked' : ''); ?>>
                                </div>
                                <!-- /FORM SWITCH -->
                            </div>
                            <!-- /SWITCH OPTION -->

                            <!-- SWITCH OPTION -->
                            <div class="switch-option">
                                <!-- SWITCH OPTION TITLE -->
                                <p class="switch-option-title">Groups</p>
                                <!-- /SWITCH OPTION TITLE -->

                                <!-- SWITCH OPTION TEXT -->
                                <p class="switch-option-text">These are notifications for activity on groups you created or joined</p>
                                <!-- /SWITCH OPTION TEXT -->

                                <!-- FORM SWITCH -->
                                <div class="form-switch<?php echo e(Auth::user()->email_notification_group ? ' active' : ''); ?>">
                                    <!-- FORM SWITCH BUTTON -->
                                    <div class="form-switch-button"></div>
                                    <!-- /FORM SWITCH BUTTON -->
                                    <input name="email-notification-group" type="checkbox" hidden <?php echo e(Auth::user()->email_notification_group ? 'checked' : ''); ?>>
                                </div>
                                <!-- /FORM SWITCH -->
                            </div>
                            <!-- /SWITCH OPTION -->

                            <!-- SWITCH OPTION -->
                            <div class="switch-option">
                                <!-- SWITCH OPTION TITLE -->
                                <p class="switch-option-title">Events</p>
                                <!-- /SWITCH OPTION TITLE -->

                                <!-- SWITCH OPTION TEXT -->
                                <p class="switch-option-text">You'll be notified about events you created or added to your calendar</p>
                                <!-- /SWITCH OPTION TEXT -->

                                <!-- FORM SWITCH -->
                                <div class="form-switch<?php echo e(Auth::user()->email_notification_event ? ' active' : ''); ?>">
                                    <!-- FORM SWITCH BUTTON -->
                                    <div class="form-switch-button"></div>
                                    <!-- /FORM SWITCH BUTTON -->
                                    <input name="email-notification-event" type="checkbox" hidden <?php echo e(Auth::user()->email_notification_event ? 'checked' : ''); ?>>
                                </div>
                                <!-- /FORM SWITCH -->
                            </div>
                            <!-- /SWITCH OPTION -->

                            <!-- SWITCH OPTION -->
                            <div class="switch-option">
                                <!-- SWITCH OPTION TITLE -->
                                <p class="switch-option-title">Marketplace</p>
                                <!-- /SWITCH OPTION TITLE -->

                                <!-- SWITCH OPTION TEXT -->
                                <p class="switch-option-text">These are notifications for marketplace items you posted</p>
                                <!-- /SWITCH OPTION TEXT -->

                                <!-- FORM SWITCH -->
                                <div class="form-switch<?php echo e(Auth::user()->email_notification_marketplace ? ' active' : ''); ?>">
                                    <!-- FORM SWITCH BUTTON -->
                                    <div class="form-switch-button"></div>
                                    <!-- /FORM SWITCH BUTTON -->
                                    <input name="email-notification-marketplace" type="checkbox" hidden <?php echo e(Auth::user()->email_notification_marketplace ? 'checked' : ''); ?>>
                                </div>
                                <!-- /FORM SWITCH -->
                            </div>
                            <!-- /SWITCH OPTION -->
                        </div>
                        <!-- /SWITCH OPTION LIST -->
                    </div>
                    <!-- WIDGET BOX CONTENT -->
                </div>
                <!-- /WIDGET BOX -->

                <!-- WIDGET BOX -->
                <div class="widget-box">
                    <!-- WIDGET BOX TITLE -->
                    <p class="widget-box-title">Privacy Settings</p>
                    <!-- /WIDGET BOX TITLE -->

                    <!-- WIDGET BOX CONTENT -->
                    <div class="widget-box-content">
                        <!-- FORM -->
                        <form class="form">
                            <!-- FORM ROW -->
                            <div class="form-row split">
                                <!-- FORM ITEM -->
                                <div class="form-item centered">
                                    <label class="form-title" for="privacy-see-profile">Who can see your profile?</label>
                                </div>
                                <!-- /FORM ITEM -->

                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM SELECT -->
                                    <div class="form-select">
                                        <select id="privacy-see-profile" name="privacy-see-profile">
                                            <option value="Everyone" <?php echo e(Auth::user()->privacy_see_profile == "Everyone" ? 'selected' : ''); ?>>Everyone (Public)</option>
                                            <option value="Members" <?php echo e(Auth::user()->privacy_see_profile == "Members" ? 'selected' : ''); ?>>Members Only</option>
                                        </select>
                                        <!-- FORM SELECT ICON -->
                                        <svg class="form-select-icon icon-small-arrow">
                                            <use xlink:href="#svg-small-arrow"></use>
                                        </svg>
                                        <!-- /FORM SELECT ICON -->
                                    </div>
                                    <!-- /FORM SELECT -->
                                </div>
                                <!-- /FORM ITEM -->
                            </div>
                            <!-- /FORM ROW -->

                            <!-- FORM ROW -->
                            <div class="form-row split">
                                <!-- FORM ITEM -->
                                <div class="form-item centered">
                                    <label class="form-title" for="privacy-send-friend-request">Who can send you a friend request?</label>
                                </div>
                                <!-- /FORM ITEM -->

                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM SELECT -->
                                    <div class="form-select">
                                        <select id="privacy-send-friend-request" name="privacy-send-friend-request">
                                            <option value="Everyone" <?php echo e(Auth::user()->privacy_send_friend_request == "Online" ? 'selected' : ''); ?>>Everyone (Public)</option>
                                            <option value="Friends Of Friends" <?php echo e(Auth::user()->privacy_send_friend_request == "Friends Of Friends" ? 'selected' : ''); ?>>Friends Of Friends</option>
                                            <option value="No One" <?php echo e(Auth::user()->privacy_send_friend_request == "No One" ? 'selected' : ''); ?>>No One (Private)</option>
                                        </select>
                                        <!-- FORM SELECT ICON -->
                                        <svg class="form-select-icon icon-small-arrow">
                                            <use xlink:href="#svg-small-arrow"></use>
                                        </svg>
                                        <!-- /FORM SELECT ICON -->
                                    </div>
                                    <!-- /FORM SELECT -->
                                </div>
                                <!-- /FORM ITEM -->
                            </div>
                            <!-- /FORM ROW -->

                            <!-- FORM ROW -->
                            <div class="form-row split">
                                <!-- FORM ITEM -->
                                <div class="form-item centered">
                                    <label class="form-title" for="privacy-send-message">Who can send you a message?</label>
                                </div>
                                <!-- /FORM ITEM -->

                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM SELECT -->
                                    <div class="form-select">
                                        <select id="privacy-send-message" name="privacy-send-message">
                                            <option value="Everyone" <?php echo e(Auth::user()->privacy_send_message == "Online" ? 'selected' : ''); ?>>Everyone (Public)</option>
                                            <option value="Friends Of Friends" <?php echo e(Auth::user()->privacy_send_message == "Friends Of Friends" ? 'selected' : ''); ?>>Friends Of Friends</option>
                                            <option value="Only Friends" <?php echo e(Auth::user()->privacy_send_message == "Only Friends" ? 'selected' : ''); ?>>Only Friends (Private)</option>
                                        </select>
                                        <!-- FORM SELECT ICON -->
                                        <svg class="form-select-icon icon-small-arrow">
                                            <use xlink:href="#svg-small-arrow"></use>
                                        </svg>
                                        <!-- /FORM SELECT ICON -->
                                    </div>
                                    <!-- /FORM SELECT -->
                                </div>
                                <!-- /FORM ITEM -->
                            </div>
                            <!-- /FORM ROW -->

                            <!-- FORM ROW -->
                            <div class="form-row split">
                                <!-- FORM ITEM -->
                                <div class="form-item centered">
                                    <label class="form-title" for="privacy-chat-activity">What is your chat activity?</label>
                                </div>
                                <!-- /FORM ITEM -->

                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM SELECT -->
                                    <div class="form-select">
                                        <select id="privacy-chat-activity" name="privacy-chat-activity">
                                            <option value="Online" <?php echo e(Auth::user()->privacy_chat_activity == "Online" ? 'selected' : ''); ?>>Online</option>
                                            <option value="Busy" <?php echo e(Auth::user()->privacy_chat_activity == "Busy" ? 'selected' : ''); ?>>Busy</option>
                                            <option value="Offline" <?php echo e(Auth::user()->privacy_chat_activity == "Offline" ? 'selected' : ''); ?>>Offline</option>
                                        </select>
                                        <!-- FORM SELECT ICON -->
                                        <svg class="form-select-icon icon-small-arrow">
                                            <use xlink:href="#svg-small-arrow"></use>
                                        </svg>
                                        <!-- /FORM SELECT ICON -->
                                    </div>
                                    <!-- /FORM SELECT -->
                                </div>
                                <!-- /FORM ITEM -->
                            </div>
                            <!-- /FORM ROW -->
                        </form>
                        <!-- /FORM -->
                    </div>
                    <!-- WIDGET BOX CONTENT -->
                </div>
                <!-- /WIDGET BOX -->
            </div>
            <!-- /GRID COLUMN -->
        </div>
        <!-- /GRID COLUMN -->

        <!-- GRID COLUMN -->
        <?php echo $__env->make('home.user.profile.settings.partial.sidebar-mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /GRID COLUMN -->
    </div>
    <!-- /GRID -->
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stylesheets'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!-- global.accordions -->
<script src="/assets/js/global/global.accordions.js"></script>
<!-- general settings -->
<script src="/assets/js/pages/home/user/profile/settings/general-settings.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\msm\resources\views/home/user/profile/settings/general-settings.blade.php ENDPATH**/ ?>