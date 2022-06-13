<aside class="floaty-bar">
    @if(false)
    <!-- BAR ACTIONS -->
    <div class="bar-actions">
        <!-- PROGRESS STAT -->
        <div class="progress-stat">
            <!-- BAR PROGRESS WRAP -->
            <div class="bar-progress-wrap">
                <!-- BAR PROGRESS INFO -->
                <p class="bar-progress-info">Next: <span class="bar-progress-text"></span></p>
                <!-- /BAR PROGRESS INFO -->
            </div>
            <!-- /BAR PROGRESS WRAP -->

            <!-- PROGRESS STAT BAR -->
            <div id="logged-user-level-cp" class="progress-stat-bar"></div>
            <!-- /PROGRESS STAT BAR -->
        </div>
        <!-- /PROGRESS STAT -->
    </div>
    <!-- /BAR ACTIONS -->
    @endif

    <!-- BAR ACTIONS -->
    <div class="bar-actions">

        <!-- ACTION LIST -->
        <div class="action-list dark">
            @if(false)
            <!-- ACTION LIST ITEM -->
            <a class="action-list-item" href="marketplace-cart.html">
                <!-- ACTION LIST ITEM ICON -->
                <svg class="action-list-item-icon icon-shopping-bag">
                    <use xlink:href="#svg-shopping-bag"></use>
                </svg>
                <!-- /ACTION LIST ITEM ICON -->
            </a>
            <!-- /ACTION LIST ITEM -->

            <!-- ACTION LIST ITEM -->
            <a class="action-list-item" href="hub-profile-requests.html">
                <!-- ACTION LIST ITEM ICON -->
                <svg class="action-list-item-icon icon-friend">
                    <use xlink:href="#svg-friend"></use>
                </svg>
                <!-- /ACTION LIST ITEM ICON -->
            </a>
            <!-- /ACTION LIST ITEM -->

            <!-- ACTION LIST ITEM -->
            <a class="action-list-item" href="hub-profile-messages.html">
                <!-- ACTION LIST ITEM ICON -->
                <svg class="action-list-item-icon icon-messages">
                    <use xlink:href="#svg-messages"></use>
                </svg>
                <!-- /ACTION LIST ITEM ICON -->
            </a>
            <!-- /ACTION LIST ITEM -->

            <!-- ACTION LIST ITEM -->
            <a class="action-list-item unread" href="hub-profile-notifications.html">
                <!-- ACTION LIST ITEM ICON -->
                <svg class="action-list-item-icon icon-notification">
                    <use xlink:href="#svg-notification"></use>
                </svg>
                <!-- /ACTION LIST ITEM ICON -->
            </a>
            <!-- /ACTION LIST ITEM -->
            @endif


            <!-- ACTION LIST ITEM -->
            <a class="action-list-item" href="{{route('settingsMessagesGet')}}">
                <!-- ACTION LIST ITEM ICON -->
                <svg class="action-list-item-icon icon-messages">
                    <use xlink:href="#svg-messages"></use>
                </svg>
                <!-- /ACTION LIST ITEM ICON -->
            </a>
            <!-- /ACTION LIST ITEM -->

            <!-- ACTION LIST ITEM -->
            <a class="action-list-item" href="{{route('settingsFriendRequestsGet')}}">
                <!-- ACTION LIST ITEM ICON -->
                <svg class="action-list-item-icon icon-friend">
                    <use xlink:href="#svg-friend"></use>
                </svg>
                <!-- /ACTION LIST ITEM ICON -->
            </a>
            <!-- /ACTION LIST ITEM -->
        </div>
        <!-- /ACTION LIST -->


        <!-- ACTION ITEM WRAP -->
        <a class="action-item-wrap" href="{{route('settingsProfileInfoGet')}}">
            <!-- ACTION ITEM -->
            <div class="action-item dark">
                <!-- ACTION ITEM ICON -->
                <svg class="action-item-icon icon-settings">
                    <use xlink:href="#svg-settings"></use>
                </svg>
                <!-- /ACTION ITEM ICON -->
            </div>
            <!-- /ACTION ITEM -->
        </a>
        <!-- /ACTION ITEM WRAP -->
    </div>
    <!-- /BAR ACTIONS -->
</aside>
