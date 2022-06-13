@php
$members = new App\Http\Controllers\Home\MemberController();
$newestMembers = $members->getNewestMembers(5);
$popularMembers = $members->getPopularMembers(5);
$activeMembers = $members->getActiveMembers(5);
@endphp

<!-- WIDGET BOX -->
<div class="widget-box">
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
                <a class="simple-dropdown-link" href="{{route('getMembers')}}">Members</a>
                <!-- /SIMPLE DROPDOWN LINK -->
            </div>
            <!-- /SIMPLE DROPDOWN -->
        </div>
        <!-- /POST SETTINGS WRAP -->
    </div>
    <!-- /WIDGET BOX SETTINGS -->

    <!-- WIDGET BOX TITLE -->
    <p class="widget-box-title">Members</p>
    <!-- /WIDGET BOX TITLE -->

    <!-- WIDGET BOX CONTENT -->
    <div class="widget-box-content">
        <!-- FILTERS -->
        <div class="filters">
            <!-- FILTER -->
            <p class="filter active" onclick="changeMembersTab(this, 'tab-option-members-1')">Newest</p>
            <!-- /FILTER -->

            <!-- FILTER -->
            <p class="filter" onclick="changeMembersTab(this, 'tab-option-members-2')">Popular</p>
            <!-- /FILTER -->

            <!-- FILTER -->
            <p class="filter" onclick="changeMembersTab(this, 'tab-option-members-3')">Active</p>
            <!-- /FILTER -->
        </div>
        <!-- /FILTERS -->

        <!-- TAB BOX -->
        <div class="tab-box">
            <!-- TAB BOX OPTIONS -->
            <div class="tab-box-options" hidden>
                <!-- TAB BOX OPTION -->
                <div class="tab-box-option-members" id="tab-option-members-1">
                </div>
                <!-- /TAB BOX OPTION -->

                <!-- TAB BOX OPTION -->
                <div class="tab-box-option-members" id="tab-option-members-2">
                </div>
                <!-- /TAB BOX OPTION -->

                <!-- TAB BOX OPTION -->
                <div class="tab-box-option-members" id="tab-option-members-3">
                </div>
                <!-- /TAB BOX OPTION -->
            </div>
            <!-- /TAB BOX OPTIONS -->

            <!-- TAB BOX ITEMS -->
            <div class="tab-box-items">
                <!-- TAB BOX ITEM -->
                <div class="tab-box-item-members">
                    <!-- TAB BOX ITEM CONTENT -->
                    <div class="tab-box-item-content" style="padding: 0;">
                        <br>
                        <!-- USER STATUS LIST -->
                        <div class="user-status-list">
                            @foreach($newestMembers as $member)
                            <!-- USER STATUS -->
                            <div class="user-status request-small">
                                <!-- USER STATUS AVATAR -->
                                <a class="user-status-avatar" href="{{route('userPublicProfileGet', ['user' => $member->username])}}">
                                    <!-- USER AVATAR -->
                                    <div class="user-avatar small no-outline">
                                        <!-- USER AVATAR CONTENT -->
                                        <div class="user-avatar-content">
                                            <!-- HEXAGON -->
                                            <div class="hexagon-image-30-32" data-src="{{$member->avatar  ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                                            <!-- /HEXAGON -->
                                        </div>
                                        <!-- /USER AVATAR CONTENT -->

                                        <!-- USER AVATAR PROGRESS -->
                                        <div class="user-avatar-progress">
                                            <!-- HEXAGON -->
                                            @if($member->gender == "Male")
                                            <div class="hexagon-progress-40-44-male"></div>
                                            @elseif($member->gender == "Female")
                                            <div class="hexagon-progress-40-44-female"></div>
                                            @elseif($member->gender == "Other")
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
                                <p class="user-status-title"><a class="bold" href="{{route('userPublicProfileGet', ['user' => $member->username])}}">{{$member->full_name}}</a></p>
                                <!-- /USER STATUS TITLE -->

                                <!-- USER STATUS TEXT -->
                                <p class="user-status-text small">{{$member->getJoinedDate()}}</p>
                                <!-- /USER STATUS TEXT -->

                                <!-- ACTION REQUEST LIST -->
                                <div class="action-request-list">
                                    <!-- ACTION REQUEST -->
                                    <a href="{{route('userPublicProfileGet', ['user' => $member->username])}}">
                                    <div class="action-request accept">
                                        <!-- ACTION REQUEST ICON -->
                                        <svg class="action-request-icon icon-add-friend">
                                            <use xlink:href="#svg-members"></use>
                                        </svg>
                                        <!-- /ACTION REQUEST ICON -->
                                    </div>
                                    </a>
                                    <!-- /ACTION REQUEST -->
                                </div>
                                <!-- ACTION REQUEST LIST -->
                            </div>
                            <!-- /USER STATUS -->
                            @endforeach
                        </div>
                        <!-- /USER STATUS LIST -->
                    </div>
                    <!-- /TAB BOX ITEM CONTENT -->
                </div>
                <!-- /TAB BOX ITEM -->

                <!-- TAB BOX ITEM -->
                <div class="tab-box-item-members">
                    <!-- TAB BOX ITEM CONTENT -->
                    <div class="tab-box-item-content" style="padding: 0;">
                        <br>
                        <!-- USER STATUS LIST -->
                        <div class="user-status-list">
                            @foreach($popularMembers as $member)
                            <!-- USER STATUS -->
                            <div class="user-status request-small">
                                <!-- USER STATUS AVATAR -->
                                <a class="user-status-avatar" href="{{route('userPublicProfileGet', ['user' => $member->username])}}">
                                    <!-- USER AVATAR -->
                                    <div class="user-avatar small no-outline">
                                        <!-- USER AVATAR CONTENT -->
                                        <div class="user-avatar-content">
                                            <!-- HEXAGON -->
                                            <div class="hexagon-image-30-32" data-src="{{$member->avatar  ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                                            <!-- /HEXAGON -->
                                        </div>
                                        <!-- /USER AVATAR CONTENT -->

                                        <!-- USER AVATAR PROGRESS -->
                                        <div class="user-avatar-progress">
                                            <!-- HEXAGON -->
                                            @if($member->gender == "Male")
                                            <div class="hexagon-progress-40-44-male"></div>
                                            @elseif($member->gender == "Female")
                                            <div class="hexagon-progress-40-44-female"></div>
                                            @elseif($member->gender == "Other")
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
                                <p class="user-status-title"><a class="bold" href="{{route('userPublicProfileGet', ['user' => $member->username])}}">{{$member->full_name}}</a></p>
                                <!-- /USER STATUS TITLE -->

                                <!-- USER STATUS TEXT -->
                                <p class="user-status-text small">{{$member->visits < 1000 ? $member->visits : number_format($member->visits/1000,1)."K"}} profile views</p>
                                <!-- /USER STATUS TEXT -->

                                <!-- ACTION REQUEST LIST -->
                                <div class="action-request-list">
                                    <!-- ACTION REQUEST -->
                                    <a href="{{route('userPublicProfileGet', ['user' => $member->username])}}">
                                        <div class="action-request accept">
                                            <!-- ACTION REQUEST ICON -->
                                            <svg class="action-request-icon icon-add-friend">
                                                <use xlink:href="#svg-members"></use>
                                            </svg>
                                            <!-- /ACTION REQUEST ICON -->
                                        </div>
                                    </a>
                                    <!-- /ACTION REQUEST -->
                                </div>
                                <!-- ACTION REQUEST LIST -->
                            </div>
                            <!-- /USER STATUS -->
                            @endforeach
                        </div>
                        <!-- /USER STATUS LIST -->
                    </div>
                    <!-- /TAB BOX ITEM CONTENT -->
                </div>
                <!-- /TAB BOX ITEM -->

                <!-- TAB BOX ITEM -->
                <div class="tab-box-item-members">
                    <!-- TAB BOX ITEM CONTENT -->
                    <div class="tab-box-item-content" style="padding: 0;">
                        <br>
                        <!-- USER STATUS LIST -->
                        <div class="user-status-list">
                            @foreach($activeMembers as $member)
                            <!-- USER STATUS -->
                            <div class="user-status request-small">
                                <!-- USER STATUS AVATAR -->
                                <a class="user-status-avatar" href="{{route('userPublicProfileGet', ['user' => $member->username])}}">
                                    <!-- USER AVATAR -->
                                    <div class="user-avatar small no-outline">
                                        <!-- USER AVATAR CONTENT -->
                                        <div class="user-avatar-content">
                                            <!-- HEXAGON -->
                                            <div class="hexagon-image-30-32" data-src="{{$member->avatar  ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                                            <!-- /HEXAGON -->
                                        </div>
                                        <!-- /USER AVATAR CONTENT -->

                                        <!-- USER AVATAR PROGRESS -->
                                        <div class="user-avatar-progress">
                                            <!-- HEXAGON -->
                                            @if($member->gender == "Male")
                                            <div class="hexagon-progress-40-44-male"></div>
                                            @elseif($member->gender == "Female")
                                            <div class="hexagon-progress-40-44-female"></div>
                                            @elseif($member->gender == "Other")
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
                                <p class="user-status-title"><a class="bold" href="{{route('userPublicProfileGet', ['user' => $member->username])}}">{{$member->full_name}}</a></p>
                                <!-- /USER STATUS TITLE -->

                                <!-- USER STATUS TEXT -->
                                <p class="user-status-text small">{{$member->getSinceSeen()}}</p>
                                <!-- /USER STATUS TEXT -->

                                <!-- ACTION REQUEST LIST -->
                                <div class="action-request-list">
                                    <!-- ACTION REQUEST -->
                                    <a href="{{route('userPublicProfileGet', ['user' => $member->username])}}">
                                        <div class="action-request accept">
                                            <!-- ACTION REQUEST ICON -->
                                            <svg class="action-request-icon icon-add-friend">
                                                <use xlink:href="#svg-members"></use>
                                            </svg>
                                            <!-- /ACTION REQUEST ICON -->
                                        </div>
                                    </a>
                                    <!-- /ACTION REQUEST -->
                                </div>
                                <!-- ACTION REQUEST LIST -->
                            </div>
                            <!-- /USER STATUS -->
                            @endforeach
                        </div>
                        <!-- /USER STATUS LIST -->
                    </div>
                    <!-- /TAB BOX ITEM CONTENT -->
                </div>
                <!-- /TAB BOX ITEM -->
            </div>
            <!-- /TAB BOX ITEMS -->
        </div>
        <!-- /TAB BOX -->

    </div>
    <!-- WIDGET BOX CONTENT -->
</div>
<!-- /WIDGET BOX -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        app.plugins.createTab({
            triggers: '.tab-box-option-members',
            elements: '.tab-box-item-members'
        });
    });
    function changeMembersTab(el, target){
        el.closest('.filters').querySelector('.filter.active').classList.remove('active');
        el.classList.add('active');
        document.getElementById(target).click();
    }
</script>
