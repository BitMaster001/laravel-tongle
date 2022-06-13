<?php
$forums = new App\Http\Controllers\Home\ForumController();
$newestForums = $forums->getNewestForums(5);
$popularForums = $forums->getPopularForums(5);
$activeForums = $forums->getActiveForums(5);
?>

<!-- WIDGET BOX -->
<div class="widget-box">
    <!-- WIDGET BOX SETTINGS -->
    <div class="widget-box-settings">
        <!-- POST SETTINGS WRAP -->
        <div class="post-settings-wrap">
            <!-- POST SETTINGS -->
            <div class="post-settings widget-box-post-settings-dropdown-trigger">
                <!-- POST SETTINGS ICON -->
                <svg class="post-settings-icon icon-more-dots">
                    <use xlink:href="#svg-more-dots"></use>
                </svg>
                <!-- /POST SETTINGS ICON -->
            </div>
            <!-- /POST SETTINGS -->

            <!-- SIMPLE DROPDOWN -->
            <div class="simple-dropdown widget-box-post-settings-dropdown">
                <!-- SIMPLE DROPDOWN LINK -->
                <a class="simple-dropdown-link" href="<?php echo e(route('getForum')); ?>">Forums</a>
                <!-- /SIMPLE DROPDOWN LINK -->
            </div>
            <!-- /SIMPLE DROPDOWN -->
        </div>
        <!-- /POST SETTINGS WRAP -->
    </div>
    <!-- /WIDGET BOX SETTINGS -->

    <!-- WIDGET BOX TITLE -->
    <p class="widget-box-title">Forums</p>
    <!-- /WIDGET BOX TITLE -->

    <!-- WIDGET BOX CONTENT -->
    <div class="widget-box-content">
        <!-- FILTERS -->
        <div class="filters">
            <!-- FILTER -->
            <p class="filter active" onclick="changeForumsTab(this, 'tab-option-forums-1')">Newest</p>
            <!-- /FILTER -->

            <!-- FILTER -->
            <p class="filter" onclick="changeForumsTab(this, 'tab-option-forums-2')">Popular</p>
            <!-- /FILTER -->

            <!-- FILTER -->
            <p class="filter" onclick="changeForumsTab(this, 'tab-option-forums-3')">Active</p>
            <!-- /FILTER -->
        </div>
        <!-- /FILTERS -->

        <!-- TAB BOX -->
        <div class="tab-box">
            <!-- TAB BOX OPTIONS -->
            <div class="tab-box-options" hidden>
                <!-- TAB BOX OPTION -->
                <div class="tab-box-option-forums" id="tab-option-forums-1">
                </div>
                <!-- /TAB BOX OPTION -->

                <!-- TAB BOX OPTION -->
                <div class="tab-box-option-forums" id="tab-option-forums-2">
                </div>
                <!-- /TAB BOX OPTION -->

                <!-- TAB BOX OPTION -->
                <div class="tab-box-option-forums" id="tab-option-forums-3">
                </div>
                <!-- /TAB BOX OPTION -->
            </div>
            <!-- /TAB BOX OPTIONS -->

            <!-- TAB BOX ITEMS -->
            <div class="tab-box-items">
                <!-- TAB BOX ITEM -->
                <div class="tab-box-item-forums">
                    <!-- TAB BOX ITEM CONTENT -->
                    <div class="tab-box-item-content" style="padding: 0;">
                        <br>
                        <!-- USER STATUS LIST -->
                        <div class="user-status-list">
                            <?php $__currentLoopData = $newestForums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- USER STATUS -->
                            <div class="user-status request-small" style="padding: 0;">

                                <!-- USER STATUS TITLE -->
                                <p class="user-status-title"><a class="bold" href="<?php echo e(route('getForumPost', ['categorie' => $topic->model->slag, 'post' => $topic->key ])); ?>"><?php echo e($topic->title); ?></a></p>
                                <!-- /USER STATUS TITLE -->

                                <!-- USER STATUS TEXT -->
                                <p class="user-status-text small"><?php echo e($topic->sincePost()); ?></p>
                                <!-- /USER STATUS TEXT -->
                            </div>
                            <!-- /USER STATUS -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!-- /USER STATUS LIST -->
                    </div>
                    <!-- /TAB BOX ITEM CONTENT -->
                </div>
                <!-- /TAB BOX ITEM -->

                <!-- TAB BOX ITEM -->
                <div class="tab-box-item-forums">
                    <!-- TAB BOX ITEM CONTENT -->
                    <div class="tab-box-item-content" style="padding: 0;">
                        <br>
                        <!-- USER STATUS LIST -->
                        <div class="user-status-list">
                            <?php $__currentLoopData = $popularForums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- USER STATUS -->
                            <div class="user-status request-small" style="padding: 0;">

                                <!-- USER STATUS TITLE -->
                                <p class="user-status-title"><a class="bold" href="<?php echo e(route('getForumPost', ['categorie' => $topic->model->slag, 'post' => $topic->key ])); ?>"><?php echo e($topic->title); ?></a></p>
                                <!-- /USER STATUS TITLE -->

                                <!-- USER STATUS TEXT -->
                                <p class="user-status-text small"><?php echo e($topic->sincePost()); ?></p>
                                <!-- /USER STATUS TEXT -->
                            </div>
                            <!-- /USER STATUS -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!-- /USER STATUS LIST -->
                    </div>
                    <!-- /TAB BOX ITEM CONTENT -->
                </div>
                <!-- /TAB BOX ITEM -->

                <!-- TAB BOX ITEM -->
                <div class="tab-box-item-forums">
                    <!-- TAB BOX ITEM CONTENT -->
                    <div class="tab-box-item-content" style="padding: 0;">
                        <br>
                        <!-- USER STATUS LIST -->
                        <div class="user-status-list">
                            <?php $__currentLoopData = $activeForums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- USER STATUS -->
                            <div class="user-status request-small" style="padding: 0;">

                                <!-- USER STATUS TITLE -->
                                <p class="user-status-title"><a class="bold" href="<?php echo e(route('getForumPost', ['categorie' => $topic->model->slag, 'post' => $topic->key ])); ?>"><?php echo e($topic->title); ?></a></p>
                                <!-- /USER STATUS TITLE -->

                                <!-- USER STATUS TEXT -->
                                <p class="user-status-text small"><?php echo e($topic->sincePost()); ?></p>
                                <!-- /USER STATUS TEXT -->
                            </div>
                            <!-- /USER STATUS -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!-- /USER STATUS LIST -->
                    </div>
                    <!-- /TAB BOX ITEM CONTENT -->
                </div>
                <!-- /TAB BOX ITEM -->
            </div>
            <!-- /TAB BOX ITEMS -->
        </div>
        <!-- /TAB BOX -->

    </div>
    <!-- WIDGET BOX CONTENT -->
</div>
<!-- /WIDGET BOX -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        app.plugins.createTab({
            triggers: '.tab-box-option-forums',
            elements: '.tab-box-item-forums'
        });
    });
    function changeForumsTab(el, target){
        el.closest('.filters').querySelector('.filter.active').classList.remove('active');
        el.classList.add('active');
        document.getElementById(target).click();
    }
</script>
<?php /**PATH E:\xampp\htdocs\msm\resources\views/home/newsfeed/widgets/forums.blade.php ENDPATH**/ ?>