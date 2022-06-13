<?php $__env->startSection('title'); ?>
Change Password
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<form class="form" method="post" action="<?php echo e(route('settingsChangePasswordPost')); ?>">
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
                    <h2 class="section-title">Change Password</h2>
                    <!-- /SECTION TITLE -->
                </div>
                <!-- /SECTION HEADER INFO -->
            </div>
            <!-- /SECTION HEADER -->

            <!-- GRID COLUMN -->
            <div class="grid-column">
                <!-- WIDGET BOX -->
                <div class="widget-box">
                    <!-- WIDGET BOX CONTENT -->
                    <div class="widget-box-content">
                        <!-- FORM -->
                        <form class="form">
                            <!-- FORM ROW -->
                            <div class="form-row">
                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small">
                                        <label for="current-password">Confirm your Current Password</label>
                                        <input class="<?php $__errorArgs = ['current-password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="password" id="current-password" name="current-password" value="<?php echo e(old('current-password')); ?>">
                                        <?php $__errorArgs = ['current-password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->
                            </div>
                            <!-- /FORM ROW -->

                            <!-- FORM ROW -->
                            <div class="form-row split">
                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small">
                                        <label for="new-password">Your New Password</label>
                                        <input class="<?php $__errorArgs = ['new-password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="password" id="new-password" name="new-password" value="<?php echo e(old('new-password')); ?>">
                                        <?php $__errorArgs = ['new-password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->

                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small">
                                        <label for="password-confirmation">Confirm New Password</label>
                                        <input class="<?php $__errorArgs = ['password-confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="password" id="password-confirmation" name="password-confirmation" value="<?php echo e(old('password-confirmation')); ?>">
                                        <?php $__errorArgs = ['password-confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->
                            </div>
                            <!-- /FORM ROW -->

                            <!-- FORM ROW -->
                            <div class="form-row split">
                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- BUTTON -->
                                    <a class="button full secondary" href="<?php echo e(route('settingsChangePasswordResetGet')); ?>">Forgot your Password?</a>
                                    <!-- /BUTTON -->
                                </div>
                                <!-- /FORM ITEM -->

                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- BUTTON -->
                                    <button class="button full primary">Change Password Now!</button>
                                    <!-- /BUTTON -->
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
    </div>
    <!-- /GRID -->
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stylesheets'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!-- global.accordions -->
<script src="/assets/js/global/global.accordions.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\msm\resources\views/home/user/profile/settings/change-password.blade.php ENDPATH**/ ?>