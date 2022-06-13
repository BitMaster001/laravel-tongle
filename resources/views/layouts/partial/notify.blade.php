@if(session('success'))
<script>
    Toastify({
        text: "{{ session('success') }}",
        duration: 30000,
        close: true,
        gravity: "bottom", // `top` or `bottom`
        positionLeft: false, // `true` or `false`
        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)"
    }).showToast();
</script>
@endif
@if(session('danger'))
<script>
    Toastify({
        text: "{{ session('danger') }}",
        duration: 30000,
        close: true,
        gravity: "bottom", // `top` or `bottom`
        positionLeft: false, // `true` or `false`
        backgroundColor: "linear-gradient(to right, #FF6200, #FD7F2C)"
    }).showToast();
</script>
@endif
@if(session('error'))
<script>
    Toastify({
        text: "{{ session('error') }}",
        duration: 30000,
        close: true,
        gravity: "bottom", // `top` or `bottom`
        positionLeft: false, // `true` or `false`
        backgroundColor: "linear-gradient(to right, #DC1C13, #EA4C46)"
    }).showToast();
</script>
@endif


