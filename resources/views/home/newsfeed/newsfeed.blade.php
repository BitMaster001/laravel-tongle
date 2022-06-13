        @if($canPost ?? false)
        <!-- QUICK POST -->
        @include('home.newsfeed.posts.posts')
        <!-- /QUICK POST -->
        @else
        <div class="quick-post">
        </div>
        @endif

        <!-- NEWSFEED POSTS -->
        <div class="grid-column" id="newsfeed-post">
        </div>
        <!-- /NEWSFEED POSTS -->

        <!-- LOADER BARS -->
        <div class="loader-bars" id="newsfeed-post-loader">
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
        </div>
        <!-- /LOADER BARS -->
