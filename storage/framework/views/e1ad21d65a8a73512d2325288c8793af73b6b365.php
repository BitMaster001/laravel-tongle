

<?php $__env->startSection('title'); ?>
Admin Message Management
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<form class="form">
    <!-- SECTION BANNER -->
    <div class="section-banner section-banner-1">
        <!-- SECTION BANNER ICON -->
        <img class="section-banner-icon" src="/assets/img/banner/members-icon.png" alt="accounthub-icon">
        <!-- /SECTION BANNER ICON -->

        <!-- SECTION BANNER TITLE -->
        <p class="section-banner-title">Admin</p>
        <!-- /SECTION BANNER TITLE -->

        <!-- SECTION BANNER TEXT -->
        <p class="section-banner-text">Administrator Message Managment</p>
        <!-- /SECTION BANNER TEXT -->
    </div>

    <!-- /SECTION BANNER -->

<!-- GRID -->
<div class="grid medium-space">

    <!-- GRID COLUMN -->
    <div class="account-hub-content">
        <div class="chat-widget-messages">
            <textarea id="admin-message" name="admin-message" placeholder="" rows="10"><?php echo e($message); ?></textarea>
            <p class="button small secondary" style="width:20%; float:right;" id="save-admin-message">Save</p>
        </div>
    </div>
    <!-- /GRID COLUMN -->
</div>
<!-- /GRID -->
</form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>

    const saveAdminMessageButton = document.getElementById('save-admin-message');
    if (saveAdminMessageButton != null) {
        saveAdminMessageButton.addEventListener('click', function() {
            let data = {};
            data['message'] = document.getElementById('admin-message').value;

            fetchApi("/admin/admin-message/save", "post", data, function(xhr) {
                if (JSON.parse(xhr.response) == "success") {
                    ShowSuccess("Administrator message saved successfully!");
                } else {
                    ShowDanger("Administrator message saving failed.");
                }
            });
        });
    }

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\msm\resources\views/admin/admin-message.blade.php ENDPATH**/ ?>