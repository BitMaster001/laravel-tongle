<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- bootstrap 4.3.1 -->
    <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
    <!-- styles -->
    <link rel="stylesheet" href="/assets/css/styles.min.css">
    <!-- favicon -->
    <link rel="icon" href="/assets/img/favicon.ico">
    <title>@yield('title') | {{env('APP_NAME')}}</title>
</head>
<body>

<!-- ERROR SECTION -->
<div class="error-section">
    <!-- ERROR SECTION TITLE -->
    <p class="error-section-title">@yield('code')</p>
    <!-- /ERROR SECTION TITLE -->

    <!-- ERROR SECTION INFO -->
    <div class="error-section-info">
        <!-- ERROR SECTION SUBTITLE -->
        <p class="error-section-subtitle">Oops!!...</p>
        <!-- /ERROR SECTION SUBTITLE -->

        <!-- ERROR SECTION TEXT -->
        <p class="error-section-text">@yield('message')</p>
        <!-- /ERROR SECTION TEXT -->

        <!-- ERROR SECTION TEXT -->
        <p class="error-section-text">If the problem persists, please send us an email to our support team at <a href="mailto:support@ljltongle.com" target="_blank">support@ljltongle.com</a></p>
        <!-- /ERROR SECTION TEXT -->

        <!-- BUTTON -->
        <a class="button medium primary" href="{{ route('homeGet') }}">Go Back</a>
        <!-- /BUTTON -->
    </div>
    <!-- /ERROR SECTION INFO -->
</div>
<!-- /ERROR SECTION -->

</body>
</html>
