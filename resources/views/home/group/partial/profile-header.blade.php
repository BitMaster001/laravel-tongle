<div class="profile-header v2">
    <!-- PROFILE HEADER COVER -->
    <figure class="profile-header-cover liquid">
        <img src="{{$group->cover ?? '/storage/default/user/profile/cover.jpg'}}">
    </figure>
    <!-- /PROFILE HEADER COVER -->

    <!-- PROFILE HEADER INFO -->
    <div class="profile-header-info">
        <!-- USER SHORT DESCRIPTION -->
        <div class="user-short-description big">
            <!-- USER SHORT DESCRIPTION AVATAR -->
            <a class="user-short-description-avatar user-avatar big no-stats" href="{{route('groupGet', ['group' => $group->username])}}">
                <!-- USER AVATAR BORDER -->
                <div class="user-avatar-border">
                    <!-- HEXAGON -->
                    <div class="hexagon-148-164"></div>
                    <!-- /HEXAGON -->
                </div>
                <!-- /USER AVATAR BORDER -->

                <!-- USER AVATAR CONTENT -->
                <div class="user-avatar-content">
                    <!-- HEXAGON -->
                    <div class="hexagon-image-124-136" data-src="{{$group->avatar ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                    <!-- /HEXAGON -->
                </div>
                <!-- /USER AVATAR CONTENT -->
            </a>
            <!-- /USER SHORT DESCRIPTION AVATAR -->

            <!-- USER SHORT DESCRIPTION AVATAR -->
            <a class="user-short-description-avatar user-short-description-avatar-mobile user-avatar medium no-stats" href="{{route('groupGet', ['group' => $group->username])}}">
                <!-- USER AVATAR BORDER -->
                <div class="user-avatar-border">
                    <!-- HEXAGON -->
                    <div class="hexagon-120-130"></div>
                    <!-- /HEXAGON -->
                </div>
                <!-- /USER AVATAR BORDER -->

                <!-- USER AVATAR CONTENT -->
                <div class="user-avatar-content">
                    <!-- HEXAGON -->
                    <div class="hexagon-image-100-110" data-src="{{$group->avatar ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                    <!-- /HEXAGON -->
                </div>
                <!-- /USER AVATAR CONTENT -->
            </a>
            <!-- /USER SHORT DESCRIPTION AVATAR -->

            <!-- USER SHORT DESCRIPTION TITLE -->
            <p class="user-short-description-title"><a href="{{route('groupGet', ['group' => $group->username])}}">{{$group->name}}</a></p>
            <!-- /USER SHORT DESCRIPTION TITLE -->

            <!-- USER SHORT DESCRIPTION TEXT -->
            <p class="user-short-description-text">{{$group->tagline}}</p>
            <!-- /USER SHORT DESCRIPTION TEXT -->
        </div>
        <!-- /USER SHORT DESCRIPTION -->

        <!-- USER STATS -->
        <div class="user-stats">
            @if($group->type == "Public")
            <!-- USER STAT -->
            <div class="user-stat big">
                <!-- USER STAT ICON -->
                <div class="user-stat-icon">
                    <!-- ICON PUBLIC -->
                    <svg class="icon-public">
                        <use xlink:href="#svg-public"></use>
                    </svg>
                    <!-- /ICON PUBLIC -->
                </div>
                <!-- /USER STAT ICON -->

                <!-- USER STAT TEXT -->
                <p class="user-stat-text">public</p>
                <!-- /USER STAT TEXT -->
            </div>
            <!-- /USER STAT -->
            @else
            <!-- USER STAT -->
            <div class="user-stat big">
                <!-- USER STAT ICON -->
                <div class="user-stat-icon">
                    <!-- ICON PUBLIC -->
                    <svg class="icon-private">
                        <use xlink:href="#svg-private"></use>
                    </svg>
                    <!-- /ICON PUBLIC -->
                </div>
                <!-- /USER STAT ICON -->

                <!-- USER STAT TEXT -->
                <p class="user-stat-text">closed</p>
                <!-- /USER STAT TEXT -->
            </div>
            <!-- /USER STAT -->
            @endif
            @if($public)
            <!-- USER STAT -->
            <div class="user-stat big">
                <!-- USER STAT TITLE -->
                <p class="user-stat-title">{{$group->members < 1000 ? $group->members : number_format($group->members/1000,1)."K"}}</p>
                <!-- /USER STAT TITLE -->

                <!-- USER STAT TEXT -->
                <p class="user-stat-text">members</p>
                <!-- /USER STAT TEXT -->
            </div>
            <!-- /USER STAT -->

            <!-- USER STAT -->
            <div class="user-stat big">
                <!-- USER STAT TITLE -->
                <p class="user-stat-title">{{$group->posts < 1000 ? $group->posts : number_format($group->posts/1000,1)."K"}}</p>
                <!-- /USER STAT TITLE -->

                <!-- USER STAT TEXT -->
                <p class="user-stat-text">posts</p>
                <!-- /USER STAT TEXT -->
            </div>
            <!-- /USER STAT -->

            <!-- USER STAT -->
            <div class="user-stat big">
                <!-- USER STAT TITLE -->
                <p class="user-stat-title">{{$group->visits < 1000 ? $group->visits : number_format($group->visits/1000,1)."K"}}</p>
                <!-- /USER STAT TITLE -->

                <!-- USER STAT TEXT -->
                <p class="user-stat-text">visits</p>
                <!-- /USER STAT TEXT -->
            </div>
            <!-- /USER STAT -->
            @endif
        </div>
        <!-- /USER STATS -->

        <!-- TAG STICKER -->
        <div class="tag-sticker">
            <!-- TAG STICKER ICON -->
            <svg class="tag-sticker-icon icon-public">
                <use xlink:href="#svg-public"></use>
            </svg>
            <!-- /TAG STICKER ICON -->
        </div>
        <!-- /TAG STICKER -->

        <!-- PROFILE HEADER INFO ACTIONS -->
        <div class="profile-header-info-actions">
            @if($inviteGroupButton)
            <!-- PROFILE HEADER INFO ACTION -->
            <p class="profile-header-info-action button primary group-invite-friend" id="group-invite-friend">
                <!-- ICON JOIN GROUP -->
                <svg class="icon-add-friend">
                    <use xlink:href="#svg-add-friend"></use>
                </svg>
                <!-- /ICON JOIN GROUP -->
            </p>
            <!-- /PROFILE HEADER INFO ACTION -->
            @endif

            @if($addGroupButton)
            <!-- PROFILE HEADER INFO ACTION -->
            <a class="profile-header-info-action button secondary" href="{{route('userGroupshipAddGet', ['group' => $group->username])}}">
                <!-- ICON JOIN GROUP -->
                <svg class="icon-join-group">
                    <use xlink:href="#svg-join-group"></use>
                </svg>
                <!-- /ICON JOIN GROUP -->
            </a>
            <!-- /PROFILE HEADER INFO ACTION -->
            @endif

            @if($cancelGroupButton)
            <!-- PROFILE HEADER INFO ACTION -->
            <a class="profile-header-info-action button tertiary" href="{{route('userGroupshipCancelGet', ['groupship' => $groupship->key])}}">
                <!-- ICON LEAVE GROUP -->
                <svg class="icon-leave-group">
                    <use xlink:href="#svg-leave-group"></use>
                </svg>
                <!-- /ICON JOIN GROUP -->
            </a>
            <!-- /PROFILE HEADER INFO ACTION -->
            @endif
            @if($acceptGroupButton)
            <!-- PROFILE HEADER INFO ACTION -->
            <a class="profile-header-info-action button secondary" href="{{route('userGroupshipAcceptGet', ['groupship' => $groupship->key])}}">
                <!-- ICON JOIN GROUP -->
                <svg class="icon-join-group">
                    <use xlink:href="#svg-join-group"></use>
                </svg>
                <!-- /ICON JOIN GROUP -->
            </a>
            <!-- /PROFILE HEADER INFO ACTION -->
            @endif
            @if($deniedGroupButton)
            <!-- PROFILE HEADER INFO ACTION -->
            <a class="profile-header-info-action button tertiary" href="{{route('userGroupshipDeniedGet', ['groupship' => $groupship->key])}}">
                <!-- ICON LEAVE GROUP -->
                <svg class="icon-leave-group">
                    <use xlink:href="#svg-leave-group"></use>
                </svg>
                <!-- /ICON JOIN GROUP -->
            </a>
            <!-- /PROFILE HEADER INFO ACTION -->
            @endif
            @if($leaveGroupButton)
            <!-- PROFILE HEADER INFO ACTION -->
            <a class="profile-header-info-action button tertiary" href="{{route('userGroupshipLeaveGet', ['groupship' => $groupship->key])}}">
                <!-- ICON LEAVE GROUP -->
                <svg class="icon-leave-group">
                    <use xlink:href="#svg-leave-group"></use>
                </svg>
                <!-- /ICON JOIN GROUP -->
            </a>
            <!-- /PROFILE HEADER INFO ACTION -->
            @endif

            @if(Auth::user() && Auth::user()->id == $group->user_id)
            <!-- PROFILE HEADER INFO ACTION -->
            <a class="profile-header-info-action button" href="{{route('getGroupNewEvent', ['group' => $group->username])}}">
                <!-- ICON MORE DOTS -->
                <svg class="icon-settings">
                    <use xlink:href="#svg-events"></use>
                </svg>
                <!-- /ICON MORE DOTS -->
            </a>
            <!-- /PROFILE HEADER INFO ACTION -->
            <!-- PROFILE HEADER INFO ACTION -->
            <a class="profile-header-info-action button" href="{{route('settingsManageGroupsManageGet', ['group' => $group->username])}}">
                <!-- ICON MORE DOTS -->
                <svg class="icon-settings">
                    <use xlink:href="#svg-settings"></use>
                </svg>
                <!-- /ICON MORE DOTS -->
            </a>
            <!-- /PROFILE HEADER INFO ACTION -->
            @endif
        </div>
        <!-- /PROFILE HEADER INFO ACTIONS -->
    </div>
    <!-- /PROFILE HEADER INFO -->
</div>
