

<?php $__env->startSection('title'); ?>
Profile Info
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form class="form" method="post" action="<?php echo e(route('settingsProfileInfoPost')); ?>" enctype="multipart/form-data">
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
                    <p class="section-pretitle">My Profile</p>
                    <!-- /SECTION PRETITLE -->

                    <!-- SECTION TITLE -->
                    <h2 class="section-title">Profile Info</h2>
                    <!-- /SECTION TITLE -->
                </div>
                <!-- /SECTION HEADER INFO -->
            </div>
            <!-- /SECTION HEADER -->

            <!-- GRID COLUMN -->
            <div class="grid-column">
                <!-- GRID -->
                <div class="grid grid-3-3-3 centered">
                    <!-- USER PREVIEW -->
                    <div class="user-preview small fixed-height">
                        <!-- USER PREVIEW COVER -->
                        <figure class="user-preview-cover liquid">
                            <img id="cover-preview" src="<?php echo e(Auth::user()->cover ?? '/storage/default/user/profile/cover.jpg'); ?>" alt="cover-01">
                        </figure>
                        <!-- /USER PREVIEW COVER -->

                        <!-- USER PREVIEW INFO -->
                        <div class="user-preview-info">
                            <!-- USER SHORT DESCRIPTION -->
                            <div class="user-short-description small">
                                <!-- USER SHORT DESCRIPTION AVATAR -->
                                <div class="user-short-description-avatar user-avatar">
                                    <!-- USER AVATAR BORDER -->
                                    <div class="user-avatar-border">
                                        <!-- HEXAGON -->
                                        <div class="hexagon-100-110"></div>
                                        <!-- /HEXAGON -->
                                    </div>
                                    <!-- /USER AVATAR BORDER -->

                                    <!-- USER AVATAR CONTENT -->
                                    <div class="user-avatar-content">
                                        <!-- HEXAGON -->
                                        <div id="avatar-preview" class="hexagon-image-68-74" data-src="<?php echo e(Auth::user()->avatar ?? '/storage/default/user/profile/avatar.jpg'); ?>"></div>
                                        <!-- /HEXAGON -->
                                    </div>
                                    <!-- /USER AVATAR CONTENT -->

                                    <!-- USER AVATAR PROGRESS -->
                                    <div class="user-avatar-progress">
                                        <!-- HEXAGON -->
                                        <!--<div class="hexagon-progress-84-92"></div>-->
                                        <?php if(Auth::user()->gender == "Male"): ?>
                                        <div class="hexagon-progress-84-92-male"></div>
                                        <?php elseif(Auth::user()->gender == "Female"): ?>
                                        <div class="hexagon-progress-84-92-female"></div>
                                        <?php elseif(Auth::user()->gender == "Other"): ?>
                                        <div class="hexagon-progress-84-92-other"></div>
                                        <?php else: ?>
                                        <div class="hexagon-progress-84-92"></div>
                                        <?php endif; ?>
                                        <!-- /HEXAGON -->
                                    </div>
                                    <!-- /USER AVATAR PROGRESS -->

                                    <!-- USER AVATAR PROGRESS BORDER -->
                                    <div class="user-avatar-progress-border">
                                        <!-- HEXAGON -->
                                        <div class="hexagon-border-84-92"></div>
                                        <!-- /HEXAGON -->
                                    </div>
                                    <!-- /USER AVATAR PROGRESS BORDER -->
                                </div>
                                <!-- /USER SHORT DESCRIPTION AVATAR -->
                            </div>
                            <!-- /USER SHORT DESCRIPTION -->
                        </div>
                        <!-- /USER PREVIEW INFO -->
                    </div>
                    <!-- /USER PREVIEW -->

                    <!-- UPLOAD BOX -->
                    <div class="upload-box" id="avatar-button">
                        <!-- UPLOAD BOX ICON -->
                        <svg class="upload-box-icon icon-members">
                            <use xlink:href="#svg-members"></use>
                        </svg>
                        <!-- /UPLOAD BOX ICON -->

                        <!-- UPLOAD BOX TITLE -->
                        <p class="upload-box-title">Change Avatar</p>
                        <!-- /UPLOAD BOX TITLE -->

                        <!-- UPLOAD BOX TEXT -->
                        <p class="upload-box-text">110x110px size minimum</p>
                        <!-- /UPLOAD BOX TEXT -->

                        <input type="file" accept="image/*" id="avatar" name="avatar" hidden>
                        <?php $__errorArgs = ['avatar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="upload-box-text error">
                                        <strong><?php echo e($message); ?></strong>
                                    </p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <!-- /UPLOAD BOX -->


                    <!-- UPLOAD BOX -->
                    <div class="upload-box" id="cover-button">
                        <!-- UPLOAD BOX ICON -->
                        <svg class="upload-box-icon icon-photos">
                            <use xlink:href="#svg-photos"></use>
                        </svg>
                        <!-- /UPLOAD BOX ICON -->

                        <!-- UPLOAD BOX TITLE -->
                        <p class="upload-box-title">Change Cover</p>
                        <!-- /UPLOAD BOX TITLE -->

                        <!-- UPLOAD BOX TEXT -->
                        <p class="upload-box-text">1184x300px size minimum</p>
                        <!-- /UPLOAD BOX TEXT -->

                        <input type="file" accept="image/*" id="cover" name="cover" hidden>
                        <?php $__errorArgs = ['cover'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="upload-box-text error">
                                        <strong><?php echo e($message); ?></strong>
                                    </p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <!-- /UPLOAD BOX -->


                </div>
                <!-- /GRID -->

                <!-- WIDGET BOX -->
                <div class="widget-box">
                    <!-- WIDGET BOX TITLE -->
                    <p class="widget-box-title">About Your Profile</p>
                    <!-- /WIDGET BOX TITLE -->

                    <!-- WIDGET BOX CONTENT -->
                    <div class="widget-box-content">
                        <!-- FORM ROW -->
                        <div class="form-row split">
                            <!-- FORM ITEM -->
                            <div class="form-item">
                                <!-- FORM INPUT -->
                                <div class="form-input small">
                                    <label for="first-name">First Name</label>
                                    <input class="<?php $__errorArgs = ['first-name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="first-name" name="first-name" value="<?php echo e(old('first-name') ?? Auth::user()->first_name ?? ''); ?>">
                                    <?php $__errorArgs = ['first-name'];
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
                                    <label for="last-name">Last Name</label>
                                    <input class="<?php $__errorArgs = ['last-name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="last-name" name="last-name" value="<?php echo e(old('last-name') ?? Auth::user()->last_name ?? ''); ?>">
                                    <?php $__errorArgs = ['last-name'];
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
                                <!-- FORM SELECT -->
                                <div class="form-select small">
                                    <label for="gender">Gender</label>
                                    <select class="<?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="gender" name="gender">
                                        <?php echo $__env->make('home.user.profile.settings.partial.data.genders', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </select>
                                    <!-- FORM SELECT ICON -->
                                    <svg class="form-select-icon icon-small-arrow">
                                        <use xlink:href="#svg-small-arrow"></use>
                                    </svg>
                                    <!-- /FORM SELECT ICON -->
                                    <?php $__errorArgs = ['gender'];
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
                                <!-- /FORM SELECT -->

                            </div>
                            <!-- /FORM ITEM -->

                            <!-- FORM ITEM -->
                            <div class="form-item">
                                <!-- FORM INPUT DECORATED -->
                                <div class="form-input-decorated">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small">
                                        <label for="birthday">Birthday</label>
                                        <input class="<?php $__errorArgs = ['birthday'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="birthday" name="birthday" value="<?php echo e(old('birthday') ?? (Auth::user()->birthday ? Auth::user()->birthday->format('d/m/Y') : '') ?? ''); ?>">
                                        <?php $__errorArgs = ['birthday'];
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

                                    <!-- FORM INPUT ICON -->
                                    <svg class="form-input-icon icon-events">
                                        <use xlink:href="#svg-events"></use>
                                    </svg>
                                    <!-- /FORM INPUT ICON -->
                                </div>
                                <!-- /FORM INPUT DECORATED -->
                            </div>
                            <!-- /FORM ITEM -->

                            <!-- FORM ITEM -->
                            <div class="form-item">
                                <!-- FORM INPUT -->
                                <div class="form-input small">
                                    <label for="birthplace">Birthplace</label>
                                    <input class="<?php $__errorArgs = ['birthplace'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="birthplace" name="birthplace" value="<?php echo e(old('birthplace') ?? Auth::user()->birthplace ?? ''); ?>">
                                    <?php $__errorArgs = ['birthplace'];
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
                                    <label for="city">City</label>
                                    <input class="<?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="city" name="city" value="<?php echo e(old('city') ?? Auth::user()->city ?? ''); ?>">
                                    <?php $__errorArgs = ['city'];
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
                            <div class="form-item small">
                                <!-- FORM SELECT -->
                                <div class="form-select">
                                    <label for="country">Country</label>
                                    <select class="<?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="country" name="country">
                                        <?php echo $__env->make('home.user.profile.settings.partial.data.countries', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </select>
                                    <!-- FORM SELECT ICON -->
                                    <svg class="form-select-icon icon-small-arrow">
                                        <use xlink:href="#svg-small-arrow"></use>
                                    </svg>
                                    <!-- /FORM SELECT ICON -->
                                    <?php $__errorArgs = ['country'];
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
                                <!-- /FORM SELECT -->
                            </div>
                            <!-- /FORM ITEM -->
                        </div>
                        <!-- /FORM ROW -->

                        <!-- FORM ROW -->
                        <div class="form-row split">
                            <!-- FORM ITEM -->
                            <div class="form-item">
                                <!-- FORM SELECT -->
                                <div class="form-select small">
                                    <label for="status">Status</label>
                                    <select class="<?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status" name="status">
                                        <?php echo $__env->make('home.user.profile.settings.partial.data.marital-status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </select>
                                    <!-- FORM SELECT ICON -->
                                    <svg class="form-select-icon icon-small-arrow">
                                        <use xlink:href="#svg-small-arrow"></use>
                                    </svg>
                                    <!-- /FORM SELECT ICON -->
                                    <?php $__errorArgs = ['status'];
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
                                <!-- /FORM SELECT -->

                            </div>
                            <!-- /FORM ITEM -->

                            <!-- FORM ITEM -->
                            <div class="form-item">
                                <!-- FORM INPUT -->
                                <div class="form-input small">
                                    <label for="occupation">Occupation</label>
                                    <input class="<?php $__errorArgs = ['occupation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="occupation" name="occupation" value="<?php echo e(old('occupation') ?? Auth::user()->occupation ?? ''); ?>">
                                    <?php $__errorArgs = ['occupation'];
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
                                    <label for="public-email">Public Email</label>
                                    <input class="<?php $__errorArgs = ['public-email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="public-email" name="public-email" value="<?php echo e(old('public-email') ?? Auth::user()->public_email ?? ''); ?>">
                                    <?php $__errorArgs = ['public-email'];
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
                                    <label for="public-phone">Public Phone</label>
                                    <input class="<?php $__errorArgs = ['public-phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="public-phone" name="public-phone" value="<?php echo e(old('public-phone') ?? Auth::user()->public_phone ?? ''); ?>">
                                    <?php $__errorArgs = ['public-phone'];
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
                                    <label for="playstation-id">PlayStation ID</label>
                                    <input class="<?php $__errorArgs = ['playstation-id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="playstation-id" name="playstation-id" value="<?php echo e(old('playstation-id') ?? Auth::user()->playstation_id ?? ''); ?>">
                                    <?php $__errorArgs = ['playstation-id'];
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
                                    <label for="xbox-id">Xbox ID</label>
                                    <input class="<?php $__errorArgs = ['xbox-id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="xbox-id" name="xbox-id" value="<?php echo e(old('xbox-id') ?? Auth::user()->xbox_id ?? ''); ?>">
                                    <?php $__errorArgs = ['xbox-id'];
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
                                <div class="form-input small">
                                    <label for="tagline">Tagline</label>
                                    <input class="<?php $__errorArgs = ['tagline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="tagline" name="tagline" value="<?php echo e(old('tagline') ?? Auth::user()->tagline ?? ''); ?>">
                                    <?php $__errorArgs = ['tagline'];
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
                                <div class="form-input small">
                                    <label for="website">Website</label>
                                    <input class="<?php $__errorArgs = ['website'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="website" name="website" value="<?php echo e(old('website') ?? Auth::user()->website ?? ''); ?>">
                                    <?php $__errorArgs = ['website'];
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
                                <div class="form-input small mid-textarea">
                                    <label for="about">About</label>
                                    <textarea class="<?php $__errorArgs = ['about'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="about" name="about"><?php echo e(old('about') ?? Auth::user()->about ?? ''); ?></textarea>
                                    <?php $__errorArgs = ['about'];
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

                    </div>
                    <!-- WIDGET BOX CONTENT -->
                </div>
                <!-- /WIDGET BOX -->

                <div class="widget-box">
                    <!-- WIDGET BOX TITLE -->
                    <p class="widget-box-title">About Your Location</p>
                    <!-- /WIDGET BOX TITLE -->

                    <!-- WIDGET BOX CONTENT -->
                    <div class="widget-box-content">
                        <div class="form-row split">
                            <!-- FORM ITEM -->
                            <div class="form-item">
                                <!-- FORM INPUT -->
                                <div class="form-input small">
                                    <label for="map-input">Address</label>
                                    <input class="<?php $__errorArgs = ['loc_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php $__errorArgs = ['loc_lat_lng'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="" type="text" id="map-input" name="loc_address" value="<?php echo e(old('loc_address') ?? Auth::user()->loc_address ?? ''); ?>">
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
                                <!-- /FORM INPUT -->
                            </div>
                            <input type="hidden" name="latitude" id="loc_lat" value="<?php echo e(old('latitude') ?? Auth::user()->latitude ?? ''); ?>" />
                            <input type="hidden" name="longitude" id="loc_lng" value="<?php echo e(old('longitude') ?? Auth::user()->longitude ?? ''); ?>" />
                            <!-- /FORM ITEM -->


                        </div>
                    </div>
                </div>

                <?php if(false): ?>
                <!-- WIDGET BOX -->
                <div class="widget-box">
                    <!-- WIDGET BOX TITLE -->
                    <p class="widget-box-title">Manage Badges</p>
                    <!-- /WIDGET BOX TITLE -->

                    <!-- WIDGET BOX CONTENT -->
                    <div class="widget-box-content">
                        <!-- DRAGGABLE ITEMS -->
                        <div class="draggable-items">
                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item">
                                <!-- BADGE ITEM -->
                                <div class="badge-item">
                                    <img src="/assets/img/badge/gold-s.png" alt="badge-gold-s">
                                </div>
                                <!-- /BADGE ITEM -->
                            </div>
                            <!-- /DRAGGABLE ITEM -->

                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item">
                                <!-- BADGE ITEM -->
                                <div class="badge-item">
                                    <img src="/assets/img/badge/age-s.png" alt="badge-age-s">
                                </div>
                                <!-- /BADGE ITEM -->
                            </div>
                            <!-- /DRAGGABLE ITEM -->

                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item">
                                <!-- BADGE ITEM -->
                                <div class="badge-item">
                                    <img src="/assets/img/badge/caffeinated-s.png" alt="badge-caffeinated-s">
                                </div>
                                <!-- /BADGE ITEM -->
                            </div>
                            <!-- /DRAGGABLE ITEM -->

                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item">
                                <!-- BADGE ITEM -->
                                <div class="badge-item">
                                    <img src="/assets/img/badge/warrior-s.png" alt="badge-warrior-s">
                                </div>
                                <!-- /BADGE ITEM -->
                            </div>
                            <!-- /DRAGGABLE ITEM -->

                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item">
                                <!-- BADGE ITEM -->
                                <div class="badge-item">
                                    <img src="/assets/img/badge/traveller-s.png" alt="badge-traveller-s">
                                </div>
                                <!-- /BADGE ITEM -->
                            </div>
                            <!-- /DRAGGABLE ITEM -->

                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item">
                                <!-- BADGE ITEM -->
                                <div class="badge-item">
                                    <img src="/assets/img/badge/scientist-s.png" alt="badge-scientist-s">
                                </div>
                                <!-- /BADGE ITEM -->
                            </div>
                            <!-- /DRAGGABLE ITEM -->

                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item">
                                <!-- BADGE ITEM -->
                                <div class="badge-item">
                                    <img src="/assets/img/badge/ncreature-s.png" alt="badge-ncreature-s">
                                </div>
                                <!-- /BADGE ITEM -->
                            </div>
                            <!-- /DRAGGABLE ITEM -->

                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item">
                                <!-- BADGE ITEM -->
                                <div class="badge-item">
                                    <img src="/assets/img/badge/mightiers-s.png" alt="badge-mightiers-s">
                                </div>
                                <!-- /BADGE ITEM -->
                            </div>
                            <!-- /DRAGGABLE ITEM -->

                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item">
                                <!-- BADGE ITEM -->
                                <div class="badge-item">
                                    <img src="/assets/img/badge/phantom-s.png" alt="badge-phantom-s">
                                </div>
                                <!-- /BADGE ITEM -->
                            </div>
                            <!-- /DRAGGABLE ITEM -->

                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item">
                                <!-- BADGE ITEM -->
                                <div class="badge-item">
                                    <img src="/assets/img/badge/collector-s.png" alt="badge-collector-s">
                                </div>
                                <!-- /BADGE ITEM -->
                            </div>
                            <!-- /DRAGGABLE ITEM -->

                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item">
                                <!-- BADGE ITEM -->
                                <div class="badge-item">
                                    <img src="/assets/img/badge/bronzec-s.png" alt="badge-bronzec-s">
                                </div>
                                <!-- /BADGE ITEM -->
                            </div>
                            <!-- /DRAGGABLE ITEM -->

                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item">
                                <!-- BADGE ITEM -->
                                <div class="badge-item">
                                    <img src="/assets/img/badge/silverc-s.png" alt="badge-silverc-s">
                                </div>
                                <!-- /BADGE ITEM -->
                            </div>
                            <!-- /DRAGGABLE ITEM -->

                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item">
                                <!-- BADGE ITEM -->
                                <div class="badge-item">
                                    <img src="/assets/img/badge/goldc-s.png" alt="badge-goldc-s">
                                </div>
                                <!-- /BADGE ITEM -->
                            </div>
                            <!-- /DRAGGABLE ITEM -->

                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item empty"></div>
                            <!-- /DRAGGABLE ITEM -->

                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item empty"></div>
                            <!-- /DRAGGABLE ITEM -->

                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item empty"></div>
                            <!-- /DRAGGABLE ITEM -->

                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item empty"></div>
                            <!-- /DRAGGABLE ITEM -->

                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item empty"></div>
                            <!-- /DRAGGABLE ITEM -->

                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item empty"></div>
                            <!-- /DRAGGABLE ITEM -->

                            <!-- DRAGGABLE ITEM -->
                            <div class="draggable-item empty"></div>
                            <!-- /DRAGGABLE ITEM -->
                        </div>
                        <!-- /DRAGGABLE ITEMS -->

                        <!-- WIDGET BOX TEXT -->
                        <p class="widget-box-text light">Choose the order in which your badges are shown. Just drag and place them wherever you want!</p>
                        <!-- /WIDGET BOX TEXT -->
                    </div>
                    <!-- WIDGET BOX CONTENT -->
                </div>
                <!-- /WIDGET BOX -->
                <?php endif; ?>

                <!-- WIDGET BOX -->
                <div class="widget-box">
                    <!-- WIDGET BOX TITLE -->
                    <p class="widget-box-title">Interests</p>
                    <!-- /WIDGET BOX TITLE -->

                    <!-- WIDGET BOX CONTENT -->
                    <div class="widget-box-content">
                        <!-- FORM -->
                        <form class="form">
                            <!-- FORM ROW -->
                            <div class="form-row split">
                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small mid-textarea">
                                        <label for="interest-show">Favourite TV Shows</label>
                                        <textarea class="<?php $__errorArgs = ['interest-show'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="interest-show" name="interest-show"><?php echo e(old('interest-show') ?? Auth::user()->interest_show ?? ''); ?></textarea>
                                        <?php $__errorArgs = ['interest-show'];
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
                                    <div class="form-input small mid-textarea">
                                        <label for="interest-music">Favourite Music Bands / Artists</label>
                                        <textarea class="<?php $__errorArgs = ['interest-music'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="interest-music" name="interest-music"><?php echo e(old('interest-music') ?? Auth::user()->interest_music ?? ''); ?></textarea>
                                        <?php $__errorArgs = ['interest-music'];
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
                                    <div class="form-input small mid-textarea active">
                                        <label for="interest-movie">Favourite Movies</label>
                                        <textarea class="<?php $__errorArgs = ['interest-movie'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="interest-movie" name="interest-movie"><?php echo e(old('interest-movie') ?? Auth::user()->interest_movie ?? ''); ?></textarea>
                                        <?php $__errorArgs = ['interest-movie'];
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
                                    <div class="form-input small mid-textarea active">
                                        <label for="interest-book">Favourite Books</label>
                                        <textarea class="<?php $__errorArgs = ['interest-book'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="interest-book" name="interest-book"><?php echo e(old('interest-book') ?? Auth::user()->interest_book ?? ''); ?></textarea>
                                        <?php $__errorArgs = ['interest-book'];
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
                                    <div class="form-input small mid-textarea active">
                                        <label for="interest-game">Favourite Games</label>
                                        <textarea class="<?php $__errorArgs = ['interest-game'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="interest-game" name="interest-game"><?php echo e(old('interest-game') ?? Auth::user()->interest_game ?? ''); ?></textarea>
                                        <?php $__errorArgs = ['interest-game'];
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
                                    <div class="form-input small mid-textarea">
                                        <label for="interest-hobby">Favourite Hobbies</label>
                                        <textarea class="<?php $__errorArgs = ['interest-hobby'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="interest-hobby" name="interest-hobby"><?php echo e(old('interest-hobby') ?? Auth::user()->interest_hobby ?? ''); ?></textarea>
                                        <?php $__errorArgs = ['interest-hobby'];
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
                        </form>
                        <!-- /FORM -->
                    </div>
                    <!-- WIDGET BOX CONTENT -->
                </div>
                <!-- /WIDGET BOX -->
                <?php if(false): ?>
                <!-- WIDGET BOX -->
                <div class="widget-box">
                    <!-- WIDGET BOX TITLE -->
                    <p class="widget-box-title">Jobs &amp; Education</p>
                    <!-- /WIDGET BOX TITLE -->

                    <!-- WIDGET BOX CONTENT -->
                    <div class="widget-box-content">
                        <!-- FORM -->
                        <form class="form">
                            <!-- FORM ROW -->
                            <div class="form-row split">
                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small active">
                                        <label for="profile-job-1-title">Title or Place</label>
                                        <input type="text" id="profile-job-1-title" name="profile_job_1_title" value="Lead Costume Designer">
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->

                                <!-- FORM ROW -->
                                <div class="form-row split">
                                    <!-- FORM ITEM -->
                                    <div class="form-item">
                                        <!-- FORM SELECT -->
                                        <div class="form-select">
                                            <label for="profile-job-1-year-started">Year Started</label>
                                            <select id="profile-job-1-year-started" name="profile_job_1_year_started">
                                                <option value="0">Select Year</option>
                                                <option value="1" selected>2015</option>
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

                                    <!-- FORM ITEM -->
                                    <div class="form-item">
                                        <!-- FORM SELECT -->
                                        <div class="form-select">
                                            <label for="profile-job-1-year-ended">Year Ended</label>
                                            <select id="profile-job-1-year-ended" name="profile_job_1_year_ended">
                                                <option value="0">Select Year</option>
                                                <option value="1" selected>Now</option>
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
                            </div>
                            <!-- /FORM ROW -->

                            <!-- FORM ROW -->
                            <div class="form-row">
                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small mid-textarea active">
                                        <label for="profile-job-1-description">Description</label>
                                        <textarea id="profile-job-1-description" name="profile_job_1_description">Lead Costume Designer for the "Amazzo Costumes" agency. I’m in charge of a ten person group, overseeing all the proyects and talking to potential clients. I also handle some face to face interviews for new candidates.</textarea>
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
                                        <label for="profile-job-2-title">Title or Place</label>
                                        <input type="text" id="profile-job-2-title" name="profile_job_2_title">
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->

                                <!-- FORM ROW -->
                                <div class="form-row split">
                                    <!-- FORM ITEM -->
                                    <div class="form-item">
                                        <!-- FORM SELECT -->
                                        <div class="form-select">
                                            <label for="profile-job-2-year-started">Year Started</label>
                                            <select id="profile-job-2-year-started" name="profile_job_2_year_started">
                                                <option value="0">Select Year</option>
                                                <option value="1" selected>2019</option>
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

                                    <!-- FORM ITEM -->
                                    <div class="form-item">
                                        <!-- FORM SELECT -->
                                        <div class="form-select">
                                            <label for="profile-job-2-year-ended">Year Ended</label>
                                            <select id="profile-job-2-year-ended" name="profile_job_2_year_ended">
                                                <option value="0">Select Year</option>
                                                <option value="1" selected>2019</option>
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
                            </div>
                            <!-- /FORM ROW -->

                            <!-- FORM ROW -->
                            <div class="form-row">
                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small mid-textarea">
                                        <label for="profile-job-2-description">Description</label>
                                        <textarea id="profile-job-2-description" name="profile_job_2_description"></textarea>
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->
                            </div>
                            <!-- /FORM ROW -->
                        </form>
                        <!-- /FORM -->

                        <!-- BUTTON -->
                        <p class="button small white add-field-button">+ Add New Field</p>
                        <!-- /BUTTON -->
                    </div>
                    <!-- WIDGET BOX CONTENT -->
                </div>
                <!-- /WIDGET BOX -->
                <?php endif; ?>
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
<link rel="stylesheet" href="/assets/vendor/DatePickerX/css/DatePickerX.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!-- global.accordions -->
<script src="/assets/js/global/global.accordions.js"></script>
<script src="/assets/js/pages/home/user/profile/settings/profile-info.js"></script>
<script src="/assets/vendor/DatePickerX/js/DatePickerX.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\msm\resources\views/home/user/profile/settings/profile-info.blade.php ENDPATH**/ ?>