

<?php $__env->startSection('title'); ?>
Create Account
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="form-box login-register-form-element">
    <!-- FORM BOX DECORATION -->
    <img class="form-box-decoration overflowing" src="/assets/img/landing/rocket.png" alt="rocket">
    <!-- /FORM BOX DECORATION -->

    <!-- FORM BOX TITLE -->
    <h2 class="form-box-title">Create your Account!</h2>
    <!-- /FORM BOX TITLE -->

    <!-- FORM -->
    <form class="form" method="POST" action="<?php echo e(route('registerPost')); ?>">
        <?php echo csrf_field(); ?>
        <!-- FORM ROW -->
        <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
                <!-- FORM INPUT -->
                <div class="form-input">
                    <label for="username" style="font-family: poppins; Color: #fff;" >Username</label>
                    <input class="<?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="username" name="username" value="<?php echo e(old('username')); ?>" style="background-color: transparent;border-radius:none;border-radius:0px; border:none; border-bottom: 1px solid #D5D5D5;">
                    <?php $__errorArgs = ['username'];
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
        <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
                <!-- FORM INPUT -->
                <div class="form-input">
                    <label for="email" style="font-family: poppins; Color: #fff;" >Email</label>
                    <input class="<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="email" name="email" value="<?php echo e(old('email')); ?>" style="background-color: transparent;border-radius:none;border-radius:0px; border:none; border-bottom: 1px solid #D5D5D5;">
                    <?php $__errorArgs = ['email'];
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
        <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
                <!-- FORM INPUT -->
                <div class="form-input">
                    <label for="password" style="font-family: poppins; Color: #fff;" >Password</label>
                    <input class="<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="password" id="password" name="password" style="background-color: transparent;border-radius:none;border-radius:0px; border:none; border-bottom: 1px solid #D5D5D5;">
                    <?php $__errorArgs = ['password'];
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
        <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
                <!-- FORM INPUT -->
                <div class="form-input">
                    <label for="password-confirmation" style="font-family: poppins; Color: #fff;" >Repeat Password</label>
                    <input class="<?php $__errorArgs = ['password-confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="password" id="password-confirmation" name="password-confirmation" style="background-color: transparent;border-radius:none;border-radius:0px; border:none; border-bottom: 1px solid #D5D5D5;">
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

        <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
                <!-- FORM INPUT -->
                <div class="form-input">
                    <label for="map-input" style="font-family: poppins; Color: #fff;" >Location</label>
                    <input class="<?php $__errorArgs = ['loc_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php $__errorArgs = ['latitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" value="<?php echo e(old('loc_address')); ?>" id="map-input" name="loc_address" style="background-color: transparent;border-radius:none;border-radius:0px; border:none; border-bottom: 1px solid #D5D5D5;">
                    <?php $__errorArgs = ['loc_address'];
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
                    <?php $__errorArgs = ['loc_lat_lng'];
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
                <input type="hidden" name="latitude" id="loc_lat" value="<?php echo e(old('latitude') ?? Auth::user()->latitude ?? '180'); ?>" />
                <input type="hidden" name="longitude" id="loc_lng" value="<?php echo e(old('longitude') ?? Auth::user()->longitude ?? '38'); ?>" />
                <!-- /FORM INPUT -->
            </div>
            <!-- /FORM ITEM -->
        </div>

        <!-- FORM ROW -->
        <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
                <!-- CHECKBOX WRAP -->
                <div class="checkbox-wrap">
                    <input type="checkbox" id="register-newsletter" name="register_newsletter" checked>
                    <!-- CHECKBOX BOX -->
                    <div class="checkbox-box">
                        <!-- ICON CROSS -->
                        <svg class="icon-cross">
                            <use xlink:href="#svg-cross"></use>
                        </svg>
                        <!-- /ICON CROSS -->
                    </div>
                    <!-- /CHECKBOX BOX -->
                    <label for="register-newsletter">Send me news and updates via email</label>
                </div>
                <!-- /CHECKBOX WRAP -->
            </div>
            <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->

        <!-- FORM ROW -->
        <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
                <!-- BUTTON -->
                <button class="button medium primary" style="border-radius:50px; background-color:#fff; color:#7750F8; box-shadow:3px 6px 8px  rgba(0,0,0,0.2); font-size:15px">Register Now!</button>
                <!-- /BUTTON -->
            </div>
            <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->
    </form>
    <!-- /FORM -->

    <!-- FORM TEXT -->
    <p class="form-text">You'll receive a confirmation email in your inbox with a link to activate your account. If you have any problems, <a href="mailto:support@ljltongle.com">contact us</a>!</p>
    <!-- /FORM TEXT -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\msm\resources\views/auth/register.blade.php ENDPATH**/ ?>