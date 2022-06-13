<!-- TAB BOX ITEM TITLE -->
<!--<p class="tab-box-item-title">Blog</p>-->
<!-- /TAB BOX ITEM TITLE -->
<!-- FORM -->
<form class="form">
    <!-- FORM ROW -->
    <div class="form-row">
        <!-- FORM ITEM -->
        <div class="form-item form-item-new-post">
            <!-- FORM INPUT -->
            <div class="form-input small">
                <label for="profile-name">Title</label>
                <input class="from-input-new-post" type="text" id="new-post-blog-title" name="new-post-blog-title" value="">
            </div>
            <!-- /FORM INPUT -->
        </div>
        <!-- /FORM ITEM -->
        <!-- FORM ITEM -->
        <div class="form-item form-item-new-post">
            <!-- FORM SELECT -->
            <div class="form-select small">
                <label for="new-post-blog-time-to-read">Time to read</label>
                <select class="" id="new-post-blog-time-to-read" name="new-post-blog-time-to-read">
                    <option value="1" >01 Min</option>
                    <option value="2">02 Mins</option>
                    <option value="3">03 Mins</option>
                    <option value="4">04 Mins</option>
                    <option value="5">05 Mins</option>
                    <option value="10">10 Mins</option>
                    <option value="15">15 Mins</option>
                    <option value="20">20 Mins</option>
                    <option value="25">25 Mins</option>
                    <option value="30">30 Mins</option>
                    <option value="35">35 Mins</option>
                    <option value="40">40 Mins</option>
                    <option value="45">45 Mins</option>
                    <option value="50">50 Mins</option>
                    <option value="55">55 Mins</option>
                    <option value="60">60 Mins</option>
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

        <!-- FORM ROW -->
        <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item form-item-new-post split join-on-mobile medium">
                <div class="new-post-blog-image-preview" id="new-post-blog-image-preview">
                </div>
                <input type="file" accept="image/*" id="new-post-blog-cover" name="new-post-images" hidden>

               <!-- <p class="button small secondary" >Blog Cover</p>-->
                <div class="action-request-list action-request-list-new-post" id="new-post-blog-image-button">
                <div class="action-request accept">
                    <!-- ACTION REQUEST ICON -->
                    <svg class="action-request-icon icon-photos">
                        <use xlink:href="#svg-photos"></use>
                    </svg>
                    <!-- /ACTION REQUEST ICON -->
                </div>
                </div>
            </div>
            <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->


        <!-- FORM ITEM -->
        <div class="form-item form-item-new-post-blog">
            <div class="form-textarea form-textarea-new-post-blog">
                <div id="new-post-blog-body" name="new-post-blog-body" placeholder=""></div>
            </div>
            <!-- /FORM TEXTAREA -->
        </div>
        <!-- /FORM ITEM -->
    </div>
    <!-- /FORM ROW -->
</form>
<!-- /FORM -->
