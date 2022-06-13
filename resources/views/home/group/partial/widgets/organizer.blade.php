<div class="widget-box">
    @if(false)
    <!-- WIDGET BOX SETTINGS -->
    <div class="widget-box-settings">
        <!-- POST SETTINGS WRAP -->
        <div class="post-settings-wrap">
            <!-- POST SETTINGS -->
            <div class="post-settings widget-box-post-settings-dropdown-trigger">
                <!-- POST SETTINGS ICON -->
                <svg class="post-settings-icon icon-more-dots">
                    <use xlink:href="#svg-more-dots"></use>
                </svg>
                <!-- /POST SETTINGS ICON -->
            </div>
            <!-- /POST SETTINGS -->

            <!-- SIMPLE DROPDOWN -->
            <div class="simple-dropdown widget-box-post-settings-dropdown">
                <!-- SIMPLE DROPDOWN LINK -->
                <p class="simple-dropdown-link">Widget Settings</p>
                <!-- /SIMPLE DROPDOWN LINK -->
            </div>
            <!-- /SIMPLE DROPDOWN -->
        </div>
        <!-- /POST SETTINGS WRAP -->
    </div>
    <!-- /WIDGET BOX SETTINGS -->
    @endif
    <!-- WIDGET BOX TITLE -->
    <p class="widget-box-title">Group Organizer</p>
    <!-- /WIDGET BOX TITLE -->

    <!-- WIDGET BOX CONTENT -->
    <div class="widget-box-content">
        <!-- USER STATUS LIST -->
        <div class="user-status-list">
            <!-- USER STATUS -->
            <div class="user-status">
                <!-- USER STATUS AVATAR -->
                <a class="user-status-avatar" href="{{route('userPublicProfileGet', ['user' => $group->admin->username])}}">
                    <!-- USER AVATAR -->
                    <div class="user-avatar small no-outline">
                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="{{$group->admin->avatar ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->

                        <!-- USER AVATAR PROGRESS -->
                        <div class="user-avatar-progress">
                            <!-- HEXAGON -->
                            @if($group->admin->gender == "Male")
                            <div class="hexagon-progress-40-44-male"></div>
                            @elseif($group->admin->gender == "Female")
                            <div class="hexagon-progress-40-44-female"></div>
                            @elseif($group->admin->gender == "Other")
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
                <p class="user-status-title"><a class="bold" href="{{route('userPublicProfileGet', ['user' => $group->admin->username])}}">{{$group->admin->full_name}}</a></p>
                <!-- /USER STATUS TITLE -->

                <!-- USER STATUS TEXT -->
                <p class="user-status-text small">{{'@'.$group->admin->username}}</p>
                <!-- /USER STATUS TEXT -->
            </div>
            <!-- /USER STATUS -->

        </div>
        <!-- /USER STATUS LIST -->
    </div>
    <!-- /WIDGET BOX CONTENT -->
</div>
