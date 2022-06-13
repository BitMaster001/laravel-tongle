<nav id="navigation-widget" class="navigation-widget navigation-widget-desktop sidebar left hidden" data-simplebar>
    <!-- NAVIGATION WIDGET COVER -->
    <figure class="navigation-widget-cover liquid">
        <img src="{{Auth::user()->cover ?? '/storage/default/user/profile/cover.jpg'}}" alt="cover-01">
    </figure>
    <!-- /NAVIGATION WIDGET COVER -->

    <!-- USER SHORT DESCRIPTION -->
    <div class="user-short-description">
        <!-- USER SHORT DESCRIPTION AVATAR -->
        <a class="user-short-description-avatar user-avatar medium" href="{{route('userProfileGet')}}">
            <!-- USER AVATAR BORDER -->
            <div class="user-avatar-border">
                <!-- HEXAGON -->
                <div class="hexagon-120-132"></div>
                <!-- /HEXAGON -->
            </div>
            <!-- /USER AVATAR BORDER -->

            <!-- USER AVATAR CONTENT -->
            <div class="user-avatar-content">
                <!-- HEXAGON -->
                <div class="hexagon-image-82-90" data-src="{{Auth::user()->avatar ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                <!-- /HEXAGON -->
            </div>
            <!-- /USER AVATAR CONTENT -->

            <!-- USER AVATAR PROGRESS -->
            <div class="user-avatar-progress">
                <!-- HEXAGON -->
                @if(Auth::user()->gender == "Male")
                <div class="hexagon-progress-100-110-male"></div>
                @elseif(Auth::user()->gender == "Female")
                <div class="hexagon-progress-100-110-female"></div>
                @elseif(Auth::user()->gender == "Other")
                <div class="hexagon-progress-100-110-other"></div>
                @else
                <div class="hexagon-progress-100-110"></div>
                @endif
                <!-- /HEXAGON -->
            </div>
            <!-- /USER AVATAR PROGRESS -->

            <!-- USER AVATAR PROGRESS BORDER -->
            <div class="user-avatar-progress-border">
                <!-- HEXAGON -->
                <div class="hexagon-border-100-110"></div>
                <!-- /HEXAGON -->
            </div>
            <!-- /USER AVATAR PROGRESS BORDER -->
        </a>
        <!-- /USER SHORT DESCRIPTION AVATAR -->

        <!-- USER SHORT DESCRIPTION TITLE -->
        <p class="user-short-description-title"><a href="{{route('userProfileGet')}}">{{Auth::user()->full_name ?? Auth::user()->username}}</a></p>
        <!-- /USER SHORT DESCRIPTION TITLE -->

        <!-- USER SHORT DESCRIPTION TEXT -->
        <p class="user-short-description-text"><a href="{{Auth::user()->website ?? '#'}}" target="_blank">{{parse_url(Auth::user()->website)['host'] ?? ''}}</a></p>
        <!-- /USER SHORT DESCRIPTION TEXT -->
    </div>
    <!-- /USER SHORT DESCRIPTION -->

    @if(false)
    <!-- BADGE LIST -->
    <div class="badge-list small">
        <!-- BADGE ITEM -->
        <div class="badge-item">
            <img src="/assets/img/badge/gold-s.png" alt="badge-gold-s">
        </div>
        <!-- /BADGE ITEM -->

        <!-- BADGE ITEM -->
        <div class="badge-item">
            <img src="/assets/img/badge/age-s.png" alt="badge-age-s">
        </div>
        <!-- /BADGE ITEM -->

        <!-- BADGE ITEM -->
        <div class="badge-item">
            <img src="/assets/img/badge/caffeinated-s.png" alt="badge-caffeinated-s">
        </div>
        <!-- /BADGE ITEM -->

        <!-- BADGE ITEM -->
        <div class="badge-item">
            <img src="/assets/img/badge/warrior-s.png" alt="badge-warrior-s">
        </div>
        <!-- /BADGE ITEM -->

        <!-- BADGE ITEM -->
        <a class="badge-item" href="profile-badges.html">
            <img src="/assets/img/badge/blank-s.png" alt="badge-blank-s">
            <!-- BADGE ITEM TEXT -->
            <p class="badge-item-text">+9</p>
            <!-- /BADGE ITEM TEXT -->
        </a>
        <!-- /BADGE ITEM -->
    </div>
    <!-- /BADGE LIST -->
    @endif

    @if(false)
    <!-- USER STATS -->
    <div class="user-stats">
        <!-- USER STAT -->
        <div class="user-stat">
            <!-- USER STAT TITLE -->
            <p class="user-stat-title">930</p>
            <!-- /USER STAT TITLE -->

            <!-- USER STAT TEXT -->
            <p class="user-stat-text">posts</p>
            <!-- /USER STAT TEXT -->
        </div>
        <!-- /USER STAT -->

        <!-- USER STAT -->
        <div class="user-stat">
            <!-- USER STAT TITLE -->
            <p class="user-stat-title">82</p>
            <!-- /USER STAT TITLE -->

            <!-- USER STAT TEXT -->
            <p class="user-stat-text">friends</p>
            <!-- /USER STAT TEXT -->
        </div>
        <!-- /USER STAT -->

        <!-- USER STAT -->
        <div class="user-stat">
            <!-- USER STAT TITLE -->
            <p class="user-stat-title">5.7k</p>
            <!-- /USER STAT TITLE -->

            <!-- USER STAT TEXT -->
            <p class="user-stat-text">visits</p>
            <!-- /USER STAT TEXT -->
        </div>
        <!-- /USER STAT -->
    </div>
    <!-- /USER STATS -->
    @endif

    <!-- MENU -->
    <ul class="menu">
        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="{{route('homeGet')}}">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-newsfeed">
                    <use xlink:href="#svg-newsfeed"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Newsfeed
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="{{route('userProfileGet')}}">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-timeline">
                    <use xlink:href="#svg-timeline"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Profile
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="{{route('getGroups')}}">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-group">
                    <use xlink:href="#svg-group"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Groups
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="{{route('getMembers')}}">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-members">
                    <use xlink:href="#svg-members"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Members
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->
        
                <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="{{route('getEventSearch')}}">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-events">
                    <use xlink:href="#svg-events-monthly"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                All Events
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="{{route('getEvent')}}">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-events">
                    <use xlink:href="#svg-events"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                My Events
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="{{route('getForum')}}">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-forums">
                    <use xlink:href="#svg-forums"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Forums
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="{{route('getMarketplace')}}">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-marketplace">
                    <use xlink:href="#svg-marketplace"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Marketplace
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="{{route('getMapSearch')}}">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-marketplace">
                    <use xlink:href="#svg-magnifying-glass"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                3D Map Search
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        @if(false)
        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="overview.html">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-overview">
                    <use xlink:href="#svg-overview"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Overview
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="groups.html">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-group">
                    <use xlink:href="#svg-group"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Groups
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="members.html">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-members">
                    <use xlink:href="#svg-members"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Members
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="badges.html">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-badges">
                    <use xlink:href="#svg-badges"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Badges
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="quests.html">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-quests">
                    <use xlink:href="#svg-quests"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Quests
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="streams.html">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-streams">
                    <use xlink:href="#svg-streams"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Streams
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="events.html">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-events">
                    <use xlink:href="#svg-events"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Events
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="forums.html">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-forums">
                    <use xlink:href="#svg-forums"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Q & A
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->

        <!-- MENU ITEM -->
        <li class="menu-item">
            <!-- MENU ITEM LINK -->
            <a class="menu-item-link" href="marketplace.html">
                <!-- MENU ITEM LINK ICON -->
                <svg class="menu-item-link-icon icon-marketplace">
                    <use xlink:href="#svg-marketplace"></use>
                </svg>
                <!-- /MENU ITEM LINK ICON -->
                Marketplace
            </a>
            <!-- /MENU ITEM LINK -->
        </li>
        <!-- /MENU ITEM -->
        @endif
    </ul>
    <!-- /MENU -->
</nav>
