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
    <p class="widget-box-title">Group Info</p>
    <!-- /WIDGET BOX TITLE -->

    <!-- WIDGET BOX CONTENT -->
    <div class="widget-box-content">

        @if($group->about)
        <!-- PARAGRAPH -->
        <p class="paragraph">{{$group->about}}</p>
        <!-- /PARAGRAPH -->
        @endif

        <!-- INFORMATION LINE LIST -->
        <div class="information-line-list">
            <!-- INFORMATION LINE -->
            <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Created</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <!--<p class="information-line-text">March 26th, 2017</p>-->
                <p class="information-line-text">{{$group->getJoinedDate()}}</p>
                <!-- /INFORMATION LINE TEXT -->
            </div>
            <!-- /INFORMATION LINE -->

            <!-- INFORMATION LINE -->
            <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Type</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <!--<p class="information-line-text">March 26th, 2017</p>-->
                <p class="information-line-text">{{$group->type}}</p>
                <!-- /INFORMATION LINE TEXT -->
            </div>
            <!-- /INFORMATION LINE -->

            @if($group->website)
            <!-- INFORMATION LINE -->
            <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Email</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <!--<p class="information-line-text">March 26th, 2017</p>-->
                <p class="information-line-text">{{$group->email}}</p>
                <!-- /INFORMATION LINE TEXT -->
            </div>
            <!-- /INFORMATION LINE -->
            @endif

            @if($group->website)
            <!-- INFORMATION LINE -->
            <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Web</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text"><a href="{{parse_url($group->website)['host'] ?? '#'}}" target="_blank">{{parse_url($group->website)['host'] ?? $group->website}}</a></p>
                <!-- /INFORMATION LINE TEXT -->
            </div>
            <!-- /INFORMATION LINE -->
            @endif
        </div>
        <!-- /INFORMATION LINE LIST -->
    </div>
    <!-- /WIDGET BOX CONTENT -->
</div>
