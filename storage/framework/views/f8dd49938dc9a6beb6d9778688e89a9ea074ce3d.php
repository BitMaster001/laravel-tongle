<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
    <meta name="request" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0,  minimum-scale=1"> 
    <?php echo $__env->make('layouts.partial.stylesheets', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('stylesheets'); ?>

    <!-- favicon -->
    <link rel="icon" href="/assets/img/favicon.ico">
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(env('APP_NAME')); ?></title>
</head>
<body>

<!-- PAGE LOADER -->
<?php echo $__env->make('layouts.loader.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /PAGE LOADER -->

<!-- NAVIGATION WIDGET -->
<?php echo $__env->make('layouts.sidebar.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /NAVIGATION WIDGET -->

<!-- NAVIGATION WIDGET -->
<?php echo $__env->make('layouts.sidebar.desktop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /NAVIGATION WIDGET -->

<!-- NAVIGATION WIDGET -->
<?php echo $__env->make('layouts.sidebar.mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /NAVIGATION WIDGET -->

<?php if(true): ?>
<!-- CHAT WIDGET -->
<?php echo $__env->make('layouts.message.friends', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /CHAT WIDGET -->
<?php if(true): ?>
<!-- CHAT WIDGET -->
<?php echo $__env->make('layouts.message.chat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /CHAT WIDGET -->
<?php endif; ?>
<?php endif; ?>

<!-- HEADER -->
<?php echo $__env->make('layouts.header.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /HEADER -->

<!-- FLOATY BAR -->
<?php echo $__env->make('layouts.header.mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /FLOATY BAR -->

<!-- CONTENT GRID -->
<div class="content-grid">
<?php echo $__env->make('layouts.partial.top-bar-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
</div>
<!-- /CONTENT GRID -->

<!-- POPUP PICTURE -->
<?php echo $__env->make('layouts.partial.popup-picture', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /POPUP PICTURE -->
<?php echo $__env->make('home.newsfeed.posts.share', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($group ?? false): ?>
<?php if($group->id>0): ?>
<!-- POPUP BOX -->
<div class="popup-box small invite-friends-popup">
    <!-- POPUP CLOSE BUTTON -->
    <div class="popup-close-button group-invite-friend">
        <!-- POPUP CLOSE BUTTON ICON -->
        <svg class="popup-close-button-icon icon-cross">
            <use xlink:href="#svg-cross"></use>
        </svg>
        <!-- /POPUP CLOSE BUTTON ICON -->
    </div>
    <!-- /POPUP CLOSE BUTTON -->

    <!-- POPUP BOX TITLE -->
    <p class="popup-box-title"> Invite Friends</p>
    <!-- /POPUP BOX TITLE -->

    <!-- FORM -->
    <form class="form" method="get" action="<?php echo e(route('userGroupshipInviteGet', ['group' => $group->username])); ?>">
        <!-- FORM ROW -->
        <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
                <!-- FORM INPUT -->
                <div class="new-post-tag-friends new-invite-friends" id="new-invite-friends-block" style="display: none;">
                    <textarea class="new-post-tag-friends-input new-invite-friends" id="new-invite-friends" name="new-invite-friends" placeholder="Invite Friends" required></textarea>
                </div>
                <!-- /FORM INPUT -->
            </div>
            <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->

        <!-- POPUP BOX ACTIONS -->
        <div class="popup-box-actions medium void">
            <!-- POPUP BOX ACTION -->
            <button class="popup-box-action full button secondary">Invite Now!</button>
            <!-- /POPUP BOX ACTION -->
        </div>
        <!-- /POPUP BOX ACTIONS -->
    </form>
    <!-- /FORM -->
</div>
<!-- /POPUP BOX -->
<?php endif; ?>
<?php endif; ?>

<?php echo $__env->make('layouts.partial.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('scripts'); ?>
<?php echo $__env->make('layouts.partial.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH E:\xampp\htdocs\msm\resources\views/layouts/app.blade.php ENDPATH**/ ?>