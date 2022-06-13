<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- app -->
<script src="/assets/js/utils/app.js"></script>
<!-- page loader -->
<script src="/assets/js/utils/page-loader.js"></script>
<!-- simplebar -->
<script src="/assets/js/vendor/simplebar.min.js"></script>
<!-- liquidify -->
<script src="/assets/js/utils/liquidify.js"></script>
<!-- XM_Plugins -->
<script src="/assets/js/vendor/xm_plugins.min.js"></script>
<!-- tiny-slider -->
<script src="/assets/js/vendor/tiny-slider.min.js"></script>
<!-- chartJS -->
<script src="/assets/js/vendor/Chart.bundle.min.js"></script>
<!-- global.hexagons -->
<script src="/assets/js/global/global.hexagons.js"></script>
<!-- global.tooltips -->
<script src="/assets/js/global/global.tooltips.js"></script>
<!-- global.popups -->
<script src="/assets/js/global/global.popups.js"></script>
<!-- global.charts -->
<script src="/assets/js/global/global.charts.js"></script>
<!-- header -->
<script src="/assets/js/header/header.js"></script>
<!-- sidebar -->
<script src="/assets/js/sidebar/sidebar.js"></script>
<!-- content -->
<script src="/assets/js/content/content.js"></script>
<!-- form.utils -->
<script src="/assets/js/form/form.utils.js"></script>
<!-- SVG icons -->
<script src="/assets/js/utils/svg-loader.js"></script>
<!-- toastify js -->
<script src="/assets/vendor/toastify/toastify.js"></script>
<!-- search js -->
<script src="/assets/js/widgets/header-search.js"></script>
<!-- messages js -->
<script src="/assets/js/widgets/messages.js"></script>
<!-- notify js -->
<script src="/assets/js/widgets/notify.js"></script>
<!-- GoogleMap API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5KPKoO7ZP-grfU1aOx2GD1ra1pQMBdAQ&libraries=places" async defer></script>

<script>
    var needLocation = "<?php echo e(auth()->user() && !auth()->user()->latitude ? 1 : 0); ?>";
</script>

<script src="/assets/js/utils/google-map.js"></script>


<?php /**PATH E:\xampp\htdocs\msm\resources\views/layouts/partial/scripts.blade.php ENDPATH**/ ?>