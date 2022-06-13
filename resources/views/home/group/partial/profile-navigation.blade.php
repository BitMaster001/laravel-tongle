<nav class="section-navigation">
    <!-- SECTION MENU -->
    <div id="section-navigation-medium-slider" class="section-menu secondary">
        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="{{route('groupGet', ['group' => $group->username])}}">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-timeline">
                <use xlink:href="#svg-timeline"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Timeline</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="{{route('groupInfoGet', ['group' => $group->username])}}">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-info">
                <use xlink:href="#svg-info"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Info</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="{{route('groupMembersGet', ['group' => $group->username])}}">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-members">
                <use xlink:href="#svg-members"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Members</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="{{route('groupEventsGet', ['group' => $group->username])}}">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-members">
                <use xlink:href="#svg-events"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Events</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        @if(false)
        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item active" href="group-timeline.html">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-timeline">
                <use xlink:href="#svg-timeline"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Timeline</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="group-info.html">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-info">
                <use xlink:href="#svg-info"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Info</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="group-members.html">
            <!-- SECTION MENU ITEM ICON -->
            <svg class="section-menu-item-icon icon-members">
                <use xlink:href="#svg-members"></use>
            </svg>
            <!-- /SECTION MENU ITEM ICON -->

            <!-- SECTION MENU ITEM TEXT -->
            <p class="section-menu-item-text">Members</p>
            <!-- /SECTION MENU ITEM TEXT -->
        </a>
        <!-- /SECTION MENU ITEM -->

        <!-- SECTION MENU ITEM -->
        <a class="section-menu-item" href="#">
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
        <a class="section-menu-item" href="#">
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
        <a class="section-menu-item" href="#">
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
        <a class="section-menu-item" href="group-events.html">
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
        @endif
    </div>
    <!-- /SECTION MENU -->

    <!-- SLIDER CONTROLS -->
    <div id="section-navigation-medium-slider-controls" class="slider-controls">
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
