<nav class="section-navigation">
    <!-- SECTION MENU -->
    <div id="section-navigation-slider" class="section-menu">
        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="{{Auth::user() == $user ? route('userAboutGet') : route('userPublicAboutGet', ['user' => $user->username])}}">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-profile">
                <use xlink:href="#svg-profile"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">About</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="{{Auth::user() == $user ? route('userProfileGet') : route('userPublicProfileGet', ['user' => $user->username])}}">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-timeline">
                <use xlink:href="#svg-timeline"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Profile</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="{{Auth::user() == $user ? route('userFriendsGet') : route('userPublicFriendsGet', ['user' => $user->username])}}">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-friend">
                <use xlink:href="#svg-friend"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Friends</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="{{Auth::user() == $user ? route('userGroupsGet') : route('userPublicGroupsGet', ['user' => $user->username])}}">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-group">
                <use xlink:href="#svg-group"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Groups</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        @if(false)
        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="{{Auth::user() == $user ? route('stream') : route('userStream', ['user' => $user->username])}}">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-streams">
                <use xlink:href="#svg-streams"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Streams</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->
        @endif

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="{{Auth::user() == $user ? route('getBlogs') : route('getUserBlogs', ['user' => $user->username])}}">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-blog-posts">
                <use xlink:href="#svg-blog-posts"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Blog</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="{{Auth::user() == $user ? route('getUserEvent') : route('getPublicUserEvent', ['user' => $user->username])}}">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-events">
                <use xlink:href="#svg-events"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Events</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="{{Auth::user() == $user ? route('userStoreGet') : route('userPublicStoreGet', ['user' => $user->username])}}">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-marketplace">
                <use xlink:href="#svg-marketplace"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Store</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->


        @if(false)

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="profile-groups.html">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-group">
                <use xlink:href="#svg-group"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Groups</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="profile-photos.html">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-photos">
                <use xlink:href="#svg-photos"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Photos</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="profile-videos.html">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-videos">
                <use xlink:href="#svg-videos"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Videos</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="profile-badges.html">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-badges">
                <use xlink:href="#svg-badges"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Badges</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="profile-stream.html">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-streams">
                <use xlink:href="#svg-streams"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Streams</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="profile-blog.html">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-blog-posts">
                <use xlink:href="#svg-blog-posts"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Blog</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="profile-forum.html">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-forum">
                <use xlink:href="#svg-forum"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Forum</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="profile-store.html">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-store">
                <use xlink:href="#svg-store"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Store</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->
        @endif
    </div>
    <!-- /SECTION MENU -->

    <!-- SLIDER CONTROLS -->
    <div id="section-navigation-slider-controls" class="slider-controls">
        <!-- SLIDER CONTROL -->
        <div class="slider-control left">
            <!-- SLIDER CONTROL ICON -->
            <svg class="slider-control-icon icon-small-arrow">
                <use xlink:href="#svg-small-arrow"></use>
            </svg>
            <!-- /SLIDER CONTROL ICON -->
        </div>
        <!-- /SLIDER CONTROL -->

        <!-- SLIDER CONTROL -->
        <div class="slider-control right">
            <!-- SLIDER CONTROL ICON -->
            <svg class="slider-control-icon icon-small-arrow">
                <use xlink:href="#svg-small-arrow"></use>
            </svg>
            <!-- /SLIDER CONTROL ICON -->
        </div>
        <!-- /SLIDER CONTROL -->
    </div>
    <!-- /SLIDER CONTROLS -->
</nav>
