<?php $__env->startSection('title'); ?>
<?php echo e($user->username); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- PROFILE HEADER -->
<?php echo $__env->make('home.user.profile.partial.profile-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /PROFILE HEADER -->

<!-- SECTION NAVIGATION -->
<?php echo $__env->make('home.user.profile.partial.profile-navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /SECTION NAVIGATION -->

<!-- GRID -->
<div class="grid grid-3-6-3 mobile-prefer-content">
    <!-- GRID COLUMN -->
    <div class="grid-column">
        <!-- WIDGET BOX -->
        <?php echo $__env->make('home.newsfeed.widgets.members', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /WIDGET BOX -->
        <!-- WIDGET BOX -->
        <?php echo $__env->make('home.newsfeed.widgets.groups', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /WIDGET BOX -->
        <!-- WIDGET BOX -->
        <?php echo $__env->make('home.newsfeed.widgets.marketplace', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /WIDGET BOX -->
    </div>
    <!-- /GRID COLUMN -->

    <!-- GRID COLUMN -->
    <div class="grid-column">
        <!-- WIDGET BOX -->
        <?php echo $__env->make('home.newsfeed.newsfeed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /WIDGET BOX -->
    </div>
    <!-- /GRID COLUMN -->

    <!-- GRID COLUMN -->
    <div class="grid-column">
        <!-- WIDGET BOX -->
        <?php echo $__env->make('home.newsfeed.widgets.stats', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /WIDGET BOX -->
        <!-- WIDGET BOX -->
        <?php echo $__env->make('home.newsfeed.widgets.reactions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /WIDGET BOX -->
        <?php if($user == Auth::user()): ?>
        <!-- WIDGET BOX -->
        <?php echo $__env->make('home.newsfeed.widgets.events', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /WIDGET BOX -->
        <?php endif; ?>

        <!-- WIDGET BOX -->
        <?php echo $__env->make('home.newsfeed.widgets.forums', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /WIDGET BOX -->
    </div>
    <!-- /GRID COLUMN -->
</div>
<!-- /GRID -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stylesheets'); ?>
<link rel="stylesheet" href="/assets/vendor/tagify/tagify.css">
<link rel="stylesheet" href="/assets/vendor/quill/quill.css">
<link rel="stylesheet" href="/assets/css/custom-tagify.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!-- posts js -->
<script src="/assets/vendor/tagify/tagify.min.js"></script>
<!-- Quill js -->
<script src="/assets/vendor/quill/quill.js"></script>
<!-- newsfeed js -->
<script src="/assets/js/widgets/newsfeed/newsfeed.js"></script>
<!-- posts js -->
<script src="/assets/js/widgets/posts/posts.js"></script>
<!-- comments js -->
<script src="/assets/js/widgets/newsfeed/comments.js"></script>
<!-- reactions js -->
<script src="/assets/js/widgets/newsfeed/reactions.js"></script>
<?php if($newsfeed && $profileName): ?>
<script>
    newsfeed = '<?php echo e($newsfeed); ?>';
    profileName = '<?php echo e($profileName); ?>';
</script>
<?php endif; ?>
<!-- shares js -->
<script src="/assets/js/widgets/posts/shares.js"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\msm\resources\views/home/user/profile/profile.blade.php ENDPATH**/ ?>