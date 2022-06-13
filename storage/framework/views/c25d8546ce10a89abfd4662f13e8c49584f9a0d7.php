<!-- FORM -->
<form class="form">
    <!-- FORM ROW -->
    <div class="form-row">
        <!-- FORM ITEM -->
        <div class="form-item">
            <!-- FORM TEXTAREA -->
            <div class="form-textarea">
                <textarea id="new-post-poll-text" name="new-post-poll-text" placeholder="What's this poll about?"></textarea>
            </div>
            <!-- /FORM TEXTAREA -->
        </div>
        <!-- /FORM ITEM -->
        <!-- FORM ITEM -->
        <div class="form-item form-item-new-post">
            <!-- FORM INPUT -->
            <div class="form-input small">
                <label for="new-post-poll-title">Title</label>
                <input class="from-input-new-post" type="text" id="new-post-poll-title" name="new-post-poll-title" value="">
            </div>
            <!-- /FORM INPUT -->
        </div>
        <!-- /FORM ITEM -->
        <!-- FORM ITEM -->
        <div class="form-item form-item-new-post">
            <!-- FORM SELECT -->
            <div class="form-select small">
                <label for="new-post-poll-time-to-end">Time to ends</label>
                <select class="" id="new-post-poll-time-to-end" name="new-post-poll-time-to-end">
                    <option value="1" >01 Day</option>
                    <option value="2">02 Days</option>
                    <option value="3">03 Days</option>
                    <option value="4">04 Days</option>
                    <option value="5">05 Days</option>
                    <option value="6">06 Days</option>
                    <option value="7">07 Days</option>
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
        <div class="form-item form-item-new-post">
            <p>Questions:</p>
        </div>
        <div class="new-post-poll-add-questions" id="new-post-poll-add-questions">
        </div>
        <!-- /FORM ITEM -->
        <!-- FORM ROW -->
        <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item form-item-new-post split join-on-mobile medium">
                <div>
                </div>

                <!-- <p class="button small secondary" >Blog Cover</p>-->
                <div class="action-request-list action-request-list-new-post" id="new-post-poll-add-question-button">
                    <div class="action-request accept">
                        <!-- ACTION REQUEST ICON -->
                        <svg class="action-request-icon icon-plus">
                            <use xlink:href="#svg-plus"></use>
                        </svg>
                        <!-- /ACTION REQUEST ICON -->
                    </div>
                </div>
            </div>
            <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->
    </div>
    <!-- /FORM ROW -->
</form>
<!-- /FORM -->
<?php /**PATH E:\xampp\htdocs\msm\resources\views/home/newsfeed/posts/partial/poll.blade.php ENDPATH**/ ?>