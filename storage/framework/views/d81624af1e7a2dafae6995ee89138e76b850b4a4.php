        <?php if($canPost ?? false): ?>
        <!-- QUICK POST -->
        <?php echo $__env->make('home.newsfeed.posts.posts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /QUICK POST -->
        <?php else: ?>
        <div class="quick-post">
        </div>
        <?php endif; ?>

        <!-- NEWSFEED POSTS -->
        <div class="grid-column" id="newsfeed-post">
        </div>
        <!-- /NEWSFEED POSTS -->

        <!-- LOADER BARS -->
        <div class="loader-bars" id="newsfeed-post-loader">
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
        </div>
        <!-- /LOADER BARS -->
<?php /**PATH E:\xampp\htdocs\msm\resources\views/home/newsfeed/newsfeed.blade.php ENDPATH**/ ?>