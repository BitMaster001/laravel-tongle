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
    <p class="widget-box-title">About</p>
    <!-- /WIDGET BOX TITLE -->

    <!-- WIDGET BOX CONTENT -->
    <div class="widget-box-content">

        @if($user->tagline)
        <!-- PARAGRAPH -->
        <h6 class="title">{{$user->tagline}}</h6>
        <!-- /PARAGRAPH -->
        <br>
        @endif

        @if($user->about)
        <!-- PARAGRAPH -->
        <p class="paragraph">{{$user->about}}</p>
        <!-- /PARAGRAPH -->
        @endif

        <!-- INFORMATION LINE LIST -->
        <div class="information-line-list">
            <!-- INFORMATION LINE -->
            <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Joined</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <!--<p class="information-line-text">March 26th, 2017</p>-->
                <p class="information-line-text">{{$user->getJoinedDate()}}</p>
                <!-- /INFORMATION LINE TEXT -->
            </div>
            <!-- /INFORMATION LINE -->

            @if($user->city)
            <!-- INFORMATION LINE -->
            <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">City</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text">{{$user->city}}</p>
                <!-- /INFORMATION LINE TEXT -->
            </div>
            <!-- /INFORMATION LINE -->
            @endif

            @if($user->country)
            <!-- INFORMATION LINE -->
            <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Country</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text">{{$user->country}}</p>
                <!-- /INFORMATION LINE TEXT -->
            </div>
            <!-- /INFORMATION LINE -->
            @endif

            @if($user->getAgeInYears())
            <!-- INFORMATION LINE -->
            <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Age</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text">{{$user->getAgeInYears()}} Years</p>
                <!-- /INFORMATION LINE TEXT -->
            </div>
            <!-- /INFORMATION LINE -->
            @endif

            @if($user->website)
            <!-- INFORMATION LINE -->
            <div class="information-line">
                <!-- INFORMATION LINE TITLE -->
                <p class="information-line-title">Web</p>
                <!-- /INFORMATION LINE TITLE -->

                <!-- INFORMATION LINE TEXT -->
                <p class="information-line-text"><a href="{{$user->website ?? '#'}}" target="_blank">{{parse_url($user->website)['host'] ?? ''}}</a></p>
                <!-- /INFORMATION LINE TEXT -->
            </div>
            <!-- /INFORMATION LINE -->
            @endif
        </div>
        <!-- /INFORMATION LINE LIST -->
    </div>
    <!-- /WIDGET BOX CONTENT -->
</div>
