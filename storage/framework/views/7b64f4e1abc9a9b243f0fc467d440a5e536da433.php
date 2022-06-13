<?php if(session('success')): ?>
<script>
    Toastify({
        text: "<?php echo e(session('success')); ?>",
        duration: 30000,
        close: true,
        gravity: "bottom", // `top` or `bottom`
        positionLeft: false, // `true` or `false`
        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)"
    }).showToast();
</script>
<?php endif; ?>
<?php if(session('danger')): ?>
<script>
    Toastify({
        text: "<?php echo e(session('danger')); ?>",
        duration: 30000,
        close: true,
        gravity: "bottom", // `top` or `bottom`
        positionLeft: false, // `true` or `false`
        backgroundColor: "linear-gradient(to right, #FF6200, #FD7F2C)"
    }).showToast();
</script>
<?php endif; ?>
<?php if(session('error')): ?>
<script>
    Toastify({
        text: "<?php echo e(session('error')); ?>",
        duration: 30000,
        close: true,
        gravity: "bottom", // `top` or `bottom`
        positionLeft: false, // `true` or `false`
        backgroundColor: "linear-gradient(to right, #DC1C13, #EA4C46)"
    }).showToast();
</script>
<?php endif; ?>


<?php /**PATH E:\xampp\htdocs\msm\resources\views/layouts/partial/notify.blade.php ENDPATH**/ ?>