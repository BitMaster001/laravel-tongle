<?php $__env->startSection('title'); ?>
Manage Store
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<dic class="form" method="post" action="<?php echo e(route('settingsChangePasswordPost')); ?>">
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
                    <p class="section-pretitle">My Store</p>
                    <!-- /SECTION PRETITLE -->

                    <!-- SECTION TITLE -->
                    <h2 class="section-title">Manage Store</h2>
                    <!-- /SECTION TITLE -->
                </div>
                <!-- /SECTION HEADER INFO -->
            </div>
            <!-- /SECTION HEADER -->

            <!-- GRID -->
            <div class="grid grid-3-3-3 centered-on-mobile">
                <!-- CREATE ENTITY BOX -->
                <div class="create-entity-box v2">
                    <!-- CREATE ENTITY BOX COVER -->
                    <div class="create-entity-box-cover"></div>
                    <!-- /CREATE ENTITY BOX COVER -->

                    <!-- CREATE ENTITY BOX AVATAR -->
                    <div class="create-entity-box-avatar primary">
                        <!-- CREATE ENTITY BOX AVATAR ICON -->
                        <svg class="create-entity-box-avatar-icon icon-item">
                            <use xlink:href="#svg-item"></use>
                        </svg>
                        <!-- /CREATE ENTITY BOX AVATAR ICON -->
                    </div>
                    <!-- /CREATE ENTITY BOX AVATAR -->

                    <!-- CREATE ENTITY BOX INFO -->
                    <div class="create-entity-box-info">
                        <!-- CREATE ENTITY BOX TITLE -->
                        <p class="create-entity-box-title" style="text-align: center;">Sell Items On Marketplace</p>
                        <!-- /CREATE ENTITY BOX TITLE -->

                        <!-- BUTTON -->
                        <a class="button primary full popup-manage-item-trigger" href="<?php echo e(route('settingsManageStoreNewGet')); ?>">Create New Item!</a>
                        <!-- /BUTTON -->
                    </div>
                    <!-- /CREATE ENTITY BOX INFO -->
                </div>
                <!-- /CREATE ENTITY BOX -->

                <?php
                $items = Auth::user()->items();
                ?>

                <?php if(count($items) > 0): ?>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- PRODUCT PREVIEW -->
                <div class="product-preview fixed-height">
                    <!-- PRODUCT PREVIEW IMAGE -->
                    <a href="<?php echo e(route('settingsManageStoreManageGet', ['item' => $item->key])); ?>">
                        <figure class="product-preview-image liquid">
                            <img src="<?php echo e($item->images[0]->src); ?>">
                        </figure>
                    </a>
                    <!-- /PRODUCT PREVIEW IMAGE -->

                    <!-- PRODUCT PREVIEW INFO -->
                    <div class="product-preview-info">
                        <!-- TEXT STICKER -->
                        <p class="text-sticker"><span class="highlighted">$</span> <?php echo e($item->price); ?></p>
                        <!-- /TEXT STICKER -->

                        <!-- PRODUCT PREVIEW TITLE -->
                        <p class="product-preview-title"><a href="<?php echo e(route('settingsManageStoreManageGet', ['item' => $item->key])); ?>"><?php echo e($item->title); ?></a></p>
                        <!-- /PRODUCT PREVIEW TITLE -->

                        <!-- PRODUCT PREVIEW CATEGORY -->
                        <p class="product-preview-category digital"><a href="<?php echo e(route('getMarketplaceCategorie', ['categorie' => $item->model->slag])); ?>"><?php echo e($item->model->name); ?></a></p>
                        <!-- /PRODUCT PREVIEW CATEGORY -->

                        <!-- BUTTON -->
                        <a class="button white full popup-manage-item-trigger" href="<?php echo e(route('settingsManageStoreManageGet', ['item' => $item->key])); ?>">Edit Item</a>
                        <!-- /BUTTON -->
                    </div>
                    <!-- /PRODUCT PREVIEW INFO -->
                </div>
                <!-- /PRODUCT PREVIEW -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <!-- /GRID -->
        </div>
        <!-- /GRID COLUMN -->
    </div>
    <!-- /GRID -->
</dic>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stylesheets'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!-- global.accordions -->
<script src="/assets/js/global/global.accordions.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\msm\resources\views/home/user/profile/settings/manage-store.blade.php ENDPATH**/ ?>