<?php $__env->startSection('title'); ?>
Q & A
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- SECTION BANNER -->
    <div class="section-banner section-banner-3">
        <!-- SECTION BANNER ICON -->
        <img class="section-banner-icon" src="/assets/img/banner/forums-icon.png" alt="forums-icon">
        <!-- /SECTION BANNER ICON -->

        <!-- SECTION BANNER TITLE -->
        <p class="section-banner-title">Q & A</p>
        <!-- /SECTION BANNER TITLE -->

        <!-- SECTION BANNER TEXT -->
        <p class="section-banner-text">Talk about anything! Gaming, music, life and more!</p>
        <!-- /SECTION BANNER TEXT -->
    </div>
    <!-- /SECTION BANNER -->

    <!-- SECTION HEADER -->
    <div class="section-header">
        <!-- SECTION HEADER INFO -->
        <div class="section-header-info">
            <!-- SECTION PRETITLE -->
            <p class="section-pretitle">Welcome to</p>
            <!-- /SECTION PRETITLE -->

            <!-- SECTION TITLE -->
            <h2 class="section-title">TongLe Q & A</h2>
            <!-- /SECTION TITLE -->
        </div>
        <!-- /SECTION HEADER INFO -->
    </div>
    <!-- /SECTION HEADER -->

    <!-- SECTION FILTERS BAR -->
    <div class="section-filters-bar v7">
        <!-- SECTION FILTERS BAR ACTIONS -->
        <div class="section-filters-bar-actions">
            <!-- SECTION FILTERS BAR INFO -->
            <div class="section-filters-bar-info">
                <!-- SECTION FILTERS BAR TITLE -->
                <p class="section-filters-bar-title"><a href="<?php echo e(route('getForum')); ?>">Q & A</a></p>
                <!-- /SECTION FILTERS BAR TITLE -->
                <?php if(false): ?>
                <!-- SECTION FILTERS BAR TEXT -->
                <p class="section-filters-bar-text">Last category added <a class="highlighted" href="#">The Jukebox</a> 2 weeks ago</p>
                <!-- /SECTION FILTERS BAR TEXT -->
                <?php endif; ?>
            </div>
            <!-- /SECTION FILTERS BAR INFO -->
        </div>
        <!-- /SECTION FILTERS BAR ACTIONS -->

        <!-- SECTION FILTERS BAR ACTIONS -->
        <div class="section-filters-bar-actions">
            <!-- FORM -->
            <form class="form" action="/forums/all">
                <!-- FORM ITEM -->
                <div class="form-item split">
                    <!-- FORM INPUT -->
                    <div class="form-input small">
                        <label for="forum-search">Search Forums</label>
                        <input type="text" name="q">
                    </div>
                    <!-- /FORM INPUT -->

                    <!-- BUTTON -->
                    <button class="button primary">
                        <!-- ICON MAGNIFYING GLASS -->
                        <svg class="icon-magnifying-glass">
                            <use xlink:href="#svg-magnifying-glass"></use>
                        </svg>
                        <!-- /ICON MAGNIFYING GLASS -->
                    </button>
                    <!-- /BUTTON -->
                </div>
                <!-- /FORM ITEM -->
            </form>
            <!-- /FORM -->
        </div>
        <!-- /SECTION FILTERS BAR ACTIONS -->
    </div>
    <!-- /SECTION FILTERS BAR -->

    <!-- TABLE -->
    <div class="table table-forum-category">
        <!-- TABLE HEADER -->
        <div class="table-header">
            <!-- TABLE HEADER COLUMN -->
            <div class="table-header-column table-column-main">
                <!-- TABLE HEADER TITLE -->
                <p class="table-header-title">Category</p>
                <!-- /TABLE HEADER TITLE -->
            </div>
            <!-- /TABLE HEADER COLUMN -->

            <!-- TABLE HEADER COLUMN -->
            <div class="table-header-column centered padded-medium">
                <!-- TABLE HEADER TITLE -->
                <p class="table-header-title">Topics</p>
                <!-- /TABLE HEADER TITLE -->
            </div>
            <!-- /TABLE HEADER COLUMN -->
            <?php if(false): ?>
            <!-- TABLE HEADER COLUMN -->
            <div class="table-header-column centered padded-medium">
                <!-- TABLE HEADER TITLE -->
                <p class="table-header-title">Posts</p>
                <!-- /TABLE HEADER TITLE -->
            </div>
            <!-- /TABLE HEADER COLUMN -->
            <?php endif; ?>

            <!-- TABLE HEADER COLUMN -->
            <div class="table-header-column padded-big-left">
                <!-- TABLE HEADER TITLE -->
                <p class="table-header-title">Recent Topics</p>
                <!-- /TABLE HEADER TITLE -->
            </div>
            <!-- /TABLE HEADER COLUMN -->
        </div>
        <!-- /TABLE HEADER -->

        <!-- TABLE BODY -->
        <div class="table-body">
            <?php $__currentLoopData = $forumCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forumCategorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- TABLE ROW -->
            <div class="table-row big">
                <!-- TABLE COLUMN -->
                <div class="table-column table-column-main">
                    <!-- FORUM CATEGORY -->
                    <div class="forum-category">
                        <!-- FORUM CATEGORY IMAGE -->
                        <a href="<?php echo e(route('getForumCategorie', ['categorie' => $forumCategorie->slag])); ?>">
                            <img class="forum-category-image" src="<?php echo e($forumCategorie->cover); ?>" alt="category-01">
                        </a>
                        <!-- /FORUM CATEGORY IMAGE -->

                        <!-- FORUM CATEGORY INFO -->
                        <div class="forum-category-info">
                            <!-- FORUM CATEGORY TITLE -->
                            <p class="forum-category-title"><a href="<?php echo e(route('getForumCategorie', ['categorie' => $forumCategorie->slag])); ?>"><?php echo e($forumCategorie->name); ?></a></p>
                            <!-- /FORUM CATEGORY TITLE -->

                            <!-- FORUM CATEGORY TEXT -->
                            <p class="forum-category-text"><?php echo e($forumCategorie->description); ?></p>
                            <!-- /FORUM CATEGORY TEXT -->
                        </div>
                        <!-- /FORUM CATEGORY INFO -->
                    </div>
                    <!-- /FORUM CATEGORY -->
                </div>
                <!-- /TABLE COLUMN -->

                <!-- TABLE COLUMN -->
                <div class="table-column centered padded-medium">
                    <!-- TABLE TITLE -->
                    <p class="table-title"><?php echo e($forumCategorie->posts); ?></p>
                    <!-- /TABLE TITLE -->
                </div>
                <!-- /TABLE COLUMN -->

                <?php if(false): ?>
                <!-- TABLE COLUMN -->
                <div class="table-column centered padded-medium">
                    <!-- TABLE TITLE -->
                    <p class="table-title">236</p>
                    <!-- /TABLE TITLE -->
                </div>
                <!-- /TABLE COLUMN -->
                <?php endif; ?>

                <!-- TABLE COLUMN -->
                <div class="table-column padded-big-left">
                    <?php
                    $topics = $forumCategorie->getLastPosts(3);
                    ?>
                    <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- TABLE LINK -->
                    <a class="table-link" href="<?php echo e(route('getForumPost', ['categorie' => $topic->model->slag, 'post' => $topic->key ])); ?>"><?php echo e($topic->title); ?></a>
                    <!-- /TABLE LINK -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- /TABLE COLUMN -->
            </div>
            <!-- /TABLE ROW -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- /TABLE BODY -->
    </div>
    <!-- /TABLE -->

    <!-- MOBILE -->
<!-- GRID -->
<div class="grid grid-3-3-3-3 centered mobile-forum-category">
    <?php $__currentLoopData = $forumCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forumCategorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- BADGE ITEM STAT -->
    <a href="<?php echo e(route('getForumCategorie', ['categorie' => $forumCategorie->slag])); ?>">
    <div class="badge-item-stat">
        <!-- BADGE ITEM STAT IMAGE -->
        <img class="badge-item-stat-image" src="<?php echo e($forumCategorie->cover); ?>">
        <!-- /BADGE ITEM STAT IMAGE -->

        <!-- BADGE ITEM STAT TITLE -->
        <p class="badge-item-stat-title"><?php echo e($forumCategorie->name); ?></p>
        <!-- /BADGE ITEM STAT TITLE -->

        <!-- BADGE ITEM STAT TEXT -->
        <p class="badge-item-stat-text"><?php echo e($forumCategorie->description); ?></p>
        <!-- /BADGE ITEM STAT TEXT -->
    </div>
    </a>
    <!-- /BADGE ITEM STAT -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<!-- /GRID -->
    <!-- /MOBILE -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('stylesheets'); ?>
<style>
    .mobile-forum-category{
        display: none;
    }
    @media  screen and (max-width: 680px) {
        .content-grid {
            width: 95%;
            padding: 25px 0 200px;
        }
        .grid {
            grid-template-columns: 100% !important;
        }
        .user-preview {
            width: 100%;
        }
        .table-forum-category{
            display: none !important;
        }
        .mobile-forum-category{
            display: grid;
        }
        .grid.grid-3-3-3, .grid.grid-3-3-3-3 {
            grid-template-columns: repeat(auto-fit,166px) !important;
        }
        .badge-item-stat {
            padding: 32px 0px !important;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\msm\resources\views/home/forum/forum.blade.php ENDPATH**/ ?>