<div class="action-item-wrap">
    <!-- ACTION ITEM -->
    <div class="action-item dark header-settings-dropdown-trigger">
        <!-- ACTION ITEM ICON -->
        <svg class="action-item-icon icon-settings">
            <use xlink:href="#svg-settings"></use>
        </svg>
        <!-- /ACTION ITEM ICON -->
    </div>
    <!-- /ACTION ITEM -->

    <!-- DROPDOWN NAVIGATION -->
    <div class="dropdown-navigation header-settings-dropdown">
        <!-- DROPDOWN NAVIGATION HEADER -->
        <div class="dropdown-navigation-header">
            <!-- USER STATUS -->
            <div class="user-status">
                <!-- USER STATUS AVATAR -->
                <a class="user-status-avatar" href="profile-timeline.html">
                    <!-- USER AVATAR -->
                    <div class="user-avatar small no-outline">
                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="{{Auth::user()->avatar ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->

                        <!-- USER AVATAR PROGRESS -->
                        <div class="user-avatar-progress">
                            <!-- HEXAGON -->
                            @if(Auth::user()->gender == "Male")
                            <div class="hexagon-progress-40-44-male"></div>
                            @elseif(Auth::user()->gender == "Female")
                            <div class="hexagon-progress-40-44-female"></div>
                            @elseif(Auth::user()->gender == "Other")
                            <div class="hexagon-progress-40-44-other"></div>
                            @else
                            <div class="hexagon-progress-40-44"></div>
                            @endif
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR PROGRESS -->

                        <!-- USER AVATAR PROGRESS BORDER -->
                        <div class="user-avatar-progress-border">
                            <!-- HEXAGON -->
                            <div class="hexagon-border-40-44"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR PROGRESS BORDER -->

                    </div>
                    <!-- /USER AVATAR -->
                </a>
                <!-- /USER STATUS AVATAR -->

                <!-- USER STATUS TITLE -->
                <p class="user-status-title"><span class="bold">Hi {{Auth::user()->full_name ?? Auth::user()->username}}!</span></p>
                <!-- /USER STATUS TITLE -->

                <!-- USER STATUS TEXT -->
                <p class="user-status-text small"><a href="profile-timeline.html">{{'@'.Auth::user()->username}}</a></p>
                <!-- /USER STATUS TEXT -->
            </div>
            <!-- /USER STATUS -->
        </div>
        <!-- /DROPDOWN NAVIGATION HEADER -->

        <!-- DROPDOWN NAVIGATION CATEGORY -->
        <p class="dropdown-navigation-category">My Profile</p>
        <!-- /DROPDOWN NAVIGATION CATEGORY -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="{{route('settingsProfileInfoGet')}}">Profile Info</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="{{route('settingsSocialStreamGet')}}">Social &amp; Stream</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="{{route('settingsMessagesGet')}}">Messages</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="{{route('settingsFriendRequestsGet')}}">Friend Requests</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION CATEGORY -->
        <p class="dropdown-navigation-category">Account</p>
        <!-- /DROPDOWN NAVIGATION CATEGORY -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="{{route('settingsChangePasswordGet')}}">Change Password</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="{{route('settingsGeneralSettingsGet')}}">General Settings</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION CATEGORY -->
        <p class="dropdown-navigation-category">Groups</p>
        <!-- /DROPDOWN NAVIGATION CATEGORY -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="{{route('settingsManageGroupsGet')}}">Manage Groups</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="{{route('settingsInvitationsGet')}}">Invitations</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION CATEGORY -->
        <p class="dropdown-navigation-category">My Store</p>
        <!-- /DROPDOWN NAVIGATION CATEGORY -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="{{route('settingsManageStoreGet')}}">Manage Store</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        @if(Auth::user()->admin)
        <!-- DROPDOWN NAVIGATION CATEGORY -->
        <p class="dropdown-navigation-category">Admin</p>
        <!-- /DROPDOWN NAVIGATION CATEGORY -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="{{route('getUserManagement')}}">User Management</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="{{route('getAdminMessage')}}">Admin Message</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="{{route('getConversation')}}">Conversation</a>
        <!-- /DROPDOWN NAVIGATION LINK -->
        @endif

        @if(false)
        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="hub-profile-notifications.html">Notifications</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="hub-profile-messages.html">Messages</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="hub-profile-requests.html">Friend Requests</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION CATEGORY -->
        <p class="dropdown-navigation-category">Account</p>
        <!-- /DROPDOWN NAVIGATION CATEGORY -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="hub-account-info.html">Account Info</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="hub-account-password.html">Change Password</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="hub-account-settings.html">General Settings</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION CATEGORY -->
        <p class="dropdown-navigation-category">Groups</p>
        <!-- /DROPDOWN NAVIGATION CATEGORY -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="hub-group-management.html">Manage Groups</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="hub-group-invitations.html">Invitations</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION CATEGORY -->
        <p class="dropdown-navigation-category">My Store</p>
        <!-- /DROPDOWN NAVIGATION CATEGORY -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="hub-store-account.html">My Account <span class="highlighted">$250,32</span></a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="hub-store-statement.html">Sales Statement</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="hub-store-items.html">Manage Items</a>
        <!-- /DROPDOWN NAVIGATION LINK -->

        <!-- DROPDOWN NAVIGATION LINK -->
        <a class="dropdown-navigation-link" href="hub-store-downloads.html">Downloads</a>
        <!-- /DROPDOWN NAVIGATION LINK -->
        @endif

        <!-- DROPDOWN NAVIGATION BUTTON -->
        <a href="{{route('logoutGet')}}">
        <p class="dropdown-navigation-button button small secondary">Logout</p>
        </a>
        <!-- /DROPDOWN NAVIGATION BUTTON -->
    </div>
    <!-- /DROPDOWN NAVIGATION -->
</div>
