@php
$groupshipsApproved = $group->getMembers();
$groupships = $groupshipsApproved->take(16);
@endphp
<div class="widget-box">
    <!-- WIDGET BOX SETTINGS -->
    <div class="widget-box-settings">
        <!-- POST SETTINGS WRAP -->
        <div class="post-settings-wrap">
            <!-- POST SETTINGS -->
            <div class="post-settings">
                <!-- SIMPLE DROPDOWN LINK -->
                <p class="simple-dropdown-link"><a  style="white-space: nowrap; font-size: 12px; color: #fff;" href="{{route('groupMembersGet', ['group' => $group->username])}}">See All</a></p>
                <!-- /SIMPLE DROPDOWN LINK -->
            </div>
            <!-- /POST SETTINGS -->

        </div>
        <!-- /POST SETTINGS WRAP -->
    </div>
    <!-- /WIDGET BOX SETTINGS -->
    <!-- WIDGET BOX TITLE -->
    <p class="widget-box-title">Members ({{count($groupshipsApproved)}})</p>
    <!-- /WIDGET BOX TITLE -->

    <!-- WIDGET BOX CONTENT -->
    <div class="widget-box-content">
        <!-- USER STATUS LIST -->
        <div class="user-status-list members-list" style="display: flex; flex-wrap: wrap;">
            @foreach($groupships as $groupshipApproved)
            <!-- USER STATUS -->
            <div class="user-status">
                <!-- USER STATUS AVATAR -->
                <a class="user-status-avatar" href="{{route('userPublicProfileGet', ['user' => $groupshipApproved->member->username])}}">
                    <!-- USER AVATAR -->
                    <div class="user-avatar small no-outline">
                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="{{$groupshipApproved->member->avatar ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->

                        <!-- USER AVATAR PROGRESS -->
                        <div class="user-avatar-progress">
                            <!-- HEXAGON -->
                            @if($groupshipApproved->member->gender == "Male")
                            <div class="hexagon-progress-40-44-male"></div>
                            @elseif($groupshipApproved->member->gender == "Female")
                            <div class="hexagon-progress-40-44-female"></div>
                            @elseif($groupshipApproved->member->gender == "Other")
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
            </div>
            <!-- /USER STATUS -->
            @endforeach

        </div>
        <!-- /USER STATUS LIST -->
    </div>
    <!-- /WIDGET BOX CONTENT -->
</div>
