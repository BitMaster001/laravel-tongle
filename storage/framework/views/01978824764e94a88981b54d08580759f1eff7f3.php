<?php $__env->startSection('title', __('errors.server error title')); ?>
<?php $__env->startSection('code', '500'); ?>
<?php $__env->startSection('message', __('errors.server error message')); ?>

<?php echo $__env->make('layouts.errors.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\msm\resources\views/errors/500.blade.php ENDPATH**/ ?>