<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/styles.min.css">
    <link rel="icon" href="/assets/img/favicon.ico">
    <title>@yield('title') | {{env('APP_NAME')}}</title>
</head>
<body>
    @yield('content')
</div>

<script src="/assets/js/utils/app.js"></script>
<script src="/assets/js/form/form.utils.js"></script>
<script src="/assets/js/landing/landing.tabs.js"></script>
<script src="/assets/js/utils/svg-loader.js"></script>
<script src="/assets/js/pages/auth/auth.js"></script>
</body>
</html>
