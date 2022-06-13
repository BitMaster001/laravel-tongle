<div class="quick-post">
    <!-- QUICK POST HEADER -->
    <div class="quick-post-header">
        <!-- OPTION ITEMS -->
        <div class="option-items">
            <!-- OPTION ITEM -->
            <div class="option-item active new-post-tab-option" data-tab="post">
                <!-- OPTION ITEM ICON -->
                <svg class="option-item-icon icon-status">
                    <use xlink:href="#svg-status"></use>
                </svg>
                <!-- /OPTION ITEM ICON -->

                <!-- OPTION ITEM TITLE -->
                <p class="option-item-title">Post</p>
                <!-- /OPTION ITEM TITLE -->
            </div>
            <!-- /OPTION ITEM -->

            <!-- OPTION ITEM -->
            <div class="option-item new-post-tab-option" data-tab="blog">
                <!-- OPTION ITEM ICON -->
                <svg class="option-item-icon icon-blog-posts">
                    <use xlink:href="#svg-blog-posts"></use>
                </svg>
                <!-- /OPTION ITEM ICON -->

                <!-- OPTION ITEM TITLE -->
                <p class="option-item-title">Blog</p>
                <!-- /OPTION ITEM TITLE -->
            </div>
            <!-- /OPTION ITEM -->

            <!-- OPTION ITEM -->
            <div class="option-item new-post-tab-option" data-tab="poll">
                <!-- OPTION ITEM ICON -->
                <svg class="option-item-icon icon-poll">
                    <use xlink:href="#svg-poll"></use>
                </svg>
                <!-- /OPTION ITEM ICON -->

                <!-- OPTION ITEM TITLE -->
                <p class="option-item-title">Poll</p>
                <!-- /OPTION ITEM TITLE -->
            </div>
            <!-- /OPTION ITEM -->
        </div>
        <!-- /OPTION ITEMS -->
    </div>
    <!-- /QUICK POST HEADER -->

    <!-- QUICK POST BODY -->
    <div class="quick-post-body">
        <!-- TAB BOX -->
        <div class="tab-box">
            <!-- TAB BOX OPTIONS -->
            <div class="tab-box-options" hidden>
                <!-- TAB BOX OPTION -->
                <div class="tab-box-option" id="new-post-post-tab-option">
                </div>
                <!-- /TAB BOX OPTION -->

                <!-- TAB BOX OPTION -->
                <div class="tab-box-option" id="new-post-blog-tab-option">
                </div>
                <!-- /TAB BOX OPTION -->

                <!-- TAB BOX OPTION -->
                <div class="tab-box-option" id="new-post-poll-tab-option">
                </div>
                <!-- /TAB BOX OPTION -->
            </div>
            <!-- /TAB BOX OPTIONS -->

            <!-- TAB BOX ITEMS -->
            <div class="tab-box-items">
                <!-- TAB BOX ITEM -->
                <div class="tab-box-item">
                    <!-- TAB BOX ITEM CONTENT -->
                    <div class="tab-box-item-content new-post">
                        <?php echo $__env->make('home.newsfeed.posts.partial.post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- /TAB BOX ITEM CONTENT -->
                </div>
                <!-- /TAB BOX ITEM -->

                <!-- TAB BOX ITEM -->
                <div class="tab-box-item">
                    <!-- TAB BOX ITEM CONTENT -->
                    <div class="tab-box-item-content new-post">
                        <?php echo $__env->make('home.newsfeed.posts.partial.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- /TAB BOX ITEM CONTENT -->
                </div>
                <!-- /TAB BOX ITEM -->

                <!-- TAB BOX ITEM -->
                <div class="tab-box-item">
                    <!-- TAB BOX ITEM CONTENT -->
                    <div class="tab-box-item-content new-post">
                        <?php echo $__env->make('home.newsfeed.posts.partial.poll', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- /TAB BOX ITEM CONTENT -->
                </div>
                <!-- /TAB BOX ITEM -->
            </div>
            <!-- /TAB BOX ITEMS -->
        </div>
        <!-- /TAB BOX -->
        <input type="file" accept="image/*" multiple id="new-post-images" name="new-post-images" hidden>
        <div class="new-post-images-preview" id="new-post-images-preview">
        </div>
        <input type="file" accept="video/*" id="new-post-videos" name="new-post-videos" hidden>
        <div class="new-post-videos-preview" id="new-post-videos-preview">
        </div>
        <div class="new-post-tag-friends" id="new-post-tag-friends-block" style="display: none;">
            <textarea class="new-post-tag-friends-input" id="new-post-tag-friends-input" name="new-post-tag-friends" placeholder="Tag Friends"></textarea>
        </div>
    </div>
    <!-- /QUICK POST BODY -->

    <!-- QUICK POST FOOTER -->
    <div class="quick-post-footer">
        <!-- QUICK POST FOOTER ACTIONS -->
        <div class="quick-post-footer-actions">
            <!-- QUICK POST FOOTER ACTION -->
            <div class="quick-post-footer-action text-tooltip-tft-medium" id="new-post-add-images" data-title="Photo">
                <!-- QUICK POST FOOTER ACTION ICON -->
                <svg class="quick-post-footer-action-icon icon-camera">
                    <use xlink:href="#svg-camera"></use>
                </svg>
                <!-- /QUICK POST FOOTER ACTION ICON -->
            </div>
            <!-- /QUICK POST FOOTER ACTION -->

            <!-- QUICK POST FOOTER ACTION -->
            <div class="quick-post-footer-action text-tooltip-tft-medium" id="new-post-add-videos" data-title="Video">
                <!-- QUICK POST FOOTER ACTION ICON -->
                <svg class="quick-post-footer-action-icon icon-gif">
                    <use xlink:href="#svg-videos"></use>
                </svg>
                <!-- /QUICK POST FOOTER ACTION ICON -->
            </div>
            <!-- /QUICK POST FOOTER ACTION -->

            <!-- QUICK POST FOOTER ACTION -->
            <div class="quick-post-footer-action text-tooltip-tft-medium" id="new-post-tag-friends" data-title="Tag Friend">
                <!-- QUICK POST FOOTER ACTION ICON -->
                <svg class="quick-post-footer-action-icon icon-tags">
                    <use xlink:href="#svg-tags"></use>
                </svg>
                <!-- /QUICK POST FOOTER ACTION ICON -->
            </div>
            <!-- /QUICK POST FOOTER ACTION -->

        </div>
        <!-- /QUICK POST FOOTER ACTIONS -->

        <!-- QUICK POST FOOTER ACTIONS -->
        <div class="quick-post-footer-actions">
            <!-- BUTTON -->
            <p class="button small void" id="new-post-clear">Discard</p>
            <!-- /BUTTON -->

            <!-- BUTTON -->
            <p class="button small secondary" id="new-post-send">Post</p>
            <!-- /BUTTON -->
        </div>
        <!-- /QUICK POST FOOTER ACTIONS -->
    </div>
    <!-- /QUICK POST FOOTER -->
</div>
<?php /**PATH E:\xampp\htdocs\msm\resources\views/home/newsfeed/posts/posts.blade.php ENDPATH**/ ?>