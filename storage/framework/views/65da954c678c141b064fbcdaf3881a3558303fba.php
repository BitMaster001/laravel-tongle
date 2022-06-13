<?php $__env->startSection('title', __('Newsfeed')); ?>

<?php $__env->startSection('content'); ?>

    <!-- SECTION BANNER -->
    <div class="section-banner section-banner-3">
        <!-- SECTION BANNER ICON -->
        <img class="section-banner-icon" src="/assets/img/banner/newsfeed-icon.png" alt="newsfeed-icon">
        <!-- /SECTION BANNER ICON -->

        <!-- SECTION BANNER TITLE -->
        <p class="section-banner-title">Newsfeed</p>
        <!-- /SECTION BANNER TITLE -->

        <!-- SECTION BANNER TEXT -->
        <p class="section-banner-text">Check what your friends have been up to!</p>
        <!-- /SECTION BANNER TEXT -->
    </div>
    <!-- /SECTION BANNER -->

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
        <!-- WIDGET BOX -->
        <?php echo $__env->make('home.newsfeed.widgets.events', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /WIDGET BOX -->
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
<!-- shares js -->
<script src="/assets/js/widgets/posts/shares.js"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\msm\resources\views/home/home.blade.php ENDPATH**/ ?>