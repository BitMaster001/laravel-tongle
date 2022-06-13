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
    <p class="widget-box-title">Social Networks</p>
    <!-- /WIDGET BOX TITLE -->

    <!-- WIDGET BOX CONTENT -->
    <div class="widget-box-content">
        <!-- SOCIAL LINKS -->
        <div class="social-links multiline align-left">

            @if($group->facebook)
            <!-- SOCIAL LINK -->
            <a class="social-link small facebook" target="_blank" href="{{$group->facebook}}">
                <!-- ICON FACEBOOK -->
                <svg class="social-link-icon icon-facebook">
                    <use xlink:href="#svg-facebook"></use>
                </svg>
                <!-- /ICON FACEBOOK -->
            </a>
            @endif

            @if($group->twitter)
            <!-- SOCIAL LINK -->
            <a class="social-link small twitter" target="_blank" href="{{$group->twitter}}">
                <!-- ICON TWITTER -->
                <svg class="social-link-icon icon-twitter">
                    <use xlink:href="#svg-twitter"></use>
                </svg>
                <!-- /ICON TWITTER -->
            </a>
            @endif

            @if($group->instagram)
            <!-- SOCIAL LINK -->
            <a class="social-link small instagram" target="_blank" href="{{$group->instagram}}">
                <!-- ICON INSTAGRAM -->
                <svg class="social-link-icon icon-instagram">
                    <use xlink:href="#svg-instagram"></use>
                </svg>
                <!-- /ICON INSTAGRAM -->
            </a>
            @endif

            @if($group->twitch)
            <!-- SOCIAL LINK -->
            <a class="social-link small twitch" target="_blank" href="{{$group->twitch}}">
                <!-- ICON TWITCH -->
                <svg class="social-link-icon icon-twitch">
                    <use xlink:href="#svg-twitch"></use>
                </svg>
                <!-- /ICON TWITCH -->
            </a>
            @endif

            @if($group->google)
            <!-- SOCIAL LINK -->
            <a class="social-link small google" target="_blank" href="{{$group->google}}">
                <!-- ICON TWITCH -->
                <svg class="social-link-icon icon-google">
                    <use xlink:href="#svg-google"></use>
                </svg>
                <!-- /ICON TWITCH -->
            </a>
            @endif

            @if($group->youtube)
            <!-- SOCIAL LINK -->
            <a class="social-link small youtube" target="_blank" href="{{$group->youtube}}">
                <!-- ICON YOUTUBE -->
                <svg class="social-link-icon icon-youtube">
                    <use xlink:href="#svg-youtube"></use>
                </svg>
                <!-- /ICON YOUTUBE -->
            </a>
            @endif

            @if($group->patreon)
            <!-- SOCIAL LINK -->
            <a class="social-link small patreon" target="_blank" href="{{$group->patreon}}">
                <!-- ICON PATREON -->
                <svg class="social-link-icon icon-patreon">
                    <use xlink:href="#svg-patreon"></use>
                </svg>
                <!-- /ICON PATREON -->
            </a>
            @endif

            @if($group->discord)
            <!-- SOCIAL LINK -->
            <a class="social-link small discord" target="_blank" href="{{$group->discord}}">
                <!-- ICON DISCORD -->
                <svg class="social-link-icon icon-discord">
                    <use xlink:href="#svg-discord"></use>
                </svg>
                <!-- /ICON DISCORD -->
            </a>
            @endif

            @if($group->deviantart)
            <!-- SOCIAL LINK -->
            <a class="social-link small deviantart" target="_blank" href="{{$group->deviantart}}">
                <!-- ICON TWITCH -->
                <svg class="social-link-icon icon-deviantart">
                    <use xlink:href="#svg-deviantart"></use>
                </svg>
                <!-- /ICON TWITCH -->
            </a>
            @endif

            @if($group->behance)
            <!-- SOCIAL LINK -->
            <a class="social-link small behance" target="_blank" href="{{$group->behance}}">
                <!-- ICON TWITCH -->
                <svg class="social-link-icon icon-behance">
                    <use xlink:href="#svg-behance"></use>
                </svg>
                <!-- /ICON TWITCH -->
            </a>
            @endif

            @if($group->dribbble)
            <!-- SOCIAL LINK -->
            <a class="social-link small dribbble" target="_blank" href="{{$group->dribbble}}">
                <!-- ICON TWITCH -->
                <svg class="social-link-icon icon-dribbble">
                    <use xlink:href="#svg-dribbble"></use>
                </svg>
                <!-- /ICON TWITCH -->
            </a>
            @endif

            @if($group->artstation)
            <!-- SOCIAL LINK -->
            <a class="social-link small artstation" target="_blank" href="{{$group->artstation}}">
                <!-- ICON TWITCH -->
                <svg class="social-link-icon icon-artstation">
                    <use xlink:href="#svg-artstation"></use>
                </svg>
                <!-- /ICON TWITCH -->
            </a>
            @endif

        </div>
        <!-- /SOCIAL LINKS -->
    </div>
    <!-- /WIDGET BOX CONTENT -->
</div>
