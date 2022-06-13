
<!-- STATS BOX SLIDER -->
<div class="stats-box-slider">
    <!-- STATS BOX SLIDER CONTROLS -->
    <div class="stats-box-slider-controls">
        <!-- STATS BOX SLIDER CONTROLS TITLE -->
        <p class="stats-box-slider-controls-title">Stats Box</p>
        <!-- /STATS BOX SLIDER CONTROLS TITLE -->

        <!-- SLIDER CONTROLS -->
        <div id="stats-box-slider-controls" class="slider-controls">
            <!-- SLIDER CONTROL -->
            <div class="slider-control negative left">
                <!-- SLIDER CONTROL ICON -->
                <svg class="slider-control-icon icon-small-arrow">
                    <use xlink:href="#svg-small-arrow"></use>
                </svg>
                <!-- /SLIDER CONTROL ICON -->
            </div>
            <!-- /SLIDER CONTROL -->

            <!-- SLIDER CONTROL -->
            <div class="slider-control negative right">
                <!-- SLIDER CONTROL ICON -->
                <svg class="slider-control-icon icon-small-arrow">
                    <use xlink:href="#svg-small-arrow"></use>
                </svg>
                <!-- /SLIDER CONTROL ICON -->
            </div>
            <!-- /SLIDER CONTROL -->
        </div>
        <!-- /SLIDER CONTROLS -->
    </div>
    <!-- /STATS BOX SLIDER CONTROLS -->

    <!-- STATS BOX SLIDER ITEMS -->
    <div id="stats-box-slider-items" class="stats-box-slider-items">
        <!-- STATS BOX -->
        <div class="stats-box stat-profile-views">
            <!-- STATS BOX VALUE WRAP -->
            <div class="stats-box-value-wrap">
                <!-- STATS BOX VALUE -->
                <p class="stats-box-value">{{$user->visits}}</p>
                <!-- /STATS BOX VALUE -->

                @if(false)
                <!-- STATS BOX DIFF -->
                <div class="stats-box-diff">
                    <!-- STATS BOX DIFF ICON -->
                    <div class="stats-box-diff-icon positive">
                        <!-- ICON PLUS SMALL -->
                        <svg class="icon-plus-small">
                            <use xlink:href="#svg-plus-small"></use>
                        </svg>
                        <!-- /ICON PLUS SMALL -->
                    </div>
                    <!-- /STATS BOX DIFF ICON -->

                    <!-- STATS BOX DIFF VALUE -->
                    <p class="stats-box-diff-value">3.2%</p>
                    <!-- /STATS BOX DIFF VALUE -->

                </div>
                <!-- /STATS BOX DIFF -->
                @endif
            </div>
            <!-- /STATS BOX VALUE WRAP -->

            <!-- STATS BOX TITLE -->
            <p class="stats-box-title">Profile Views</p>
            <!-- /STATS BOX TITLE -->
            @if(false)
            <!-- STATS BOX TEXT -->
            <p class="stats-box-text">In the last month</p>
            <!-- /STATS BOX TEXT -->
            @endif
        </div>
        <!-- /STATS BOX -->

        <!-- STATS BOX -->
        <div class="stats-box stat-posts-created">
            <!-- STATS BOX VALUE WRAP -->
            <div class="stats-box-value-wrap">
                <!-- STATS BOX VALUE -->
                <p class="stats-box-value">{{$user->posts}}</p>
                <!-- /STATS BOX VALUE -->

                @if(false)
                <!-- STATS BOX DIFF -->
                <div class="stats-box-diff">
                    <!-- STATS BOX DIFF ICON -->
                    <div class="stats-box-diff-icon positive">
                        <!-- ICON PLUS SMALL -->
                        <svg class="icon-plus-small">
                            <use xlink:href="#svg-plus-small"></use>
                        </svg>
                        <!-- /ICON PLUS SMALL -->
                    </div>
                    <!-- /STATS BOX DIFF ICON -->

                    <!-- STATS BOX DIFF VALUE -->
                    <p class="stats-box-diff-value">0.4%</p>
                    <!-- /STATS BOX DIFF VALUE -->

                </div>
                <!-- /STATS BOX DIFF -->
                @endif
            </div>
            <!-- /STATS BOX VALUE WRAP -->

            <!-- STATS BOX TITLE -->
            <p class="stats-box-title">Posts Created</p>
            <!-- /STATS BOX TITLE -->
            @if(false)
            <!-- STATS BOX TEXT -->
            <p class="stats-box-text">In the last month</p>
            <!-- /STATS BOX TEXT -->
            @endif
        </div>
        <!-- /STATS BOX -->

        @php
        $reactionsReceived = $user->getReactionsReceived();
        @endphp

        <!-- STATS BOX -->
        <div class="stats-box stat-reactions-received">
            <!-- STATS BOX VALUE WRAP -->
            <div class="stats-box-value-wrap">
                <!-- STATS BOX VALUE -->
                <p class="stats-box-value">{{$reactionsReceived}}</p>
                <!-- /STATS BOX VALUE -->

                @if(false)
                <!-- STATS BOX DIFF -->
                <div class="stats-box-diff">
                    <!-- STATS BOX DIFF ICON -->
                    <div class="stats-box-diff-icon negative">
                        <!-- ICON MINUS SMALL -->
                        <svg class="icon-minus-small">
                            <use xlink:href="#svg-minus-small"></use>
                        </svg>
                        <!-- /ICON MINUS SMALL -->
                    </div>
                    <!-- /STATS BOX DIFF ICON -->
                    <!-- STATS BOX DIFF VALUE -->
                    <p class="stats-box-diff-value">1.8%</p>
                    <!-- /STATS BOX DIFF VALUE -->

                </div>
                <!-- /STATS BOX DIFF -->
                @endif
            </div>
            <!-- /STATS BOX VALUE WRAP -->

            <!-- STATS BOX TITLE -->
            <p class="stats-box-title">Reactions Received</p>
            <!-- /STATS BOX TITLE -->
            @if(false)
            <!-- STATS BOX TEXT -->
            <p class="stats-box-text">In the last month</p>
            <!-- /STATS BOX TEXT -->
            @endif
        </div>
        <!-- /STATS BOX -->

        @php
        $commentsReceived = $user->getCommentsReceived();
        @endphp

        <!-- STATS BOX -->
        <div class="stats-box stat-comments-received">
            <!-- STATS BOX VALUE WRAP -->
            <div class="stats-box-value-wrap">
                <!-- STATS BOX VALUE -->
                <p class="stats-box-value">{{$commentsReceived}}</p>
                <!-- /STATS BOX VALUE -->
                @if(false)
                <!-- STATS BOX DIFF -->
                <div class="stats-box-diff">
                    <!-- STATS BOX DIFF ICON -->
                    <div class="stats-box-diff-icon positive">
                        <!-- ICON PLUS SMALL -->
                        <svg class="icon-plus-small">
                            <use xlink:href="#svg-plus-small"></use>
                        </svg>
                        <!-- /ICON PLUS SMALL -->
                    </div>
                    <!-- /STATS BOX DIFF ICON -->

                    <!-- STATS BOX DIFF VALUE -->
                    <p class="stats-box-diff-value">4.5%</p>
                    <!-- /STATS BOX DIFF VALUE -->

                </div>
                <!-- /STATS BOX DIFF -->
                @endif
            </div>
            <!-- /STATS BOX VALUE WRAP -->

            <!-- STATS BOX TITLE -->
            <p class="stats-box-title">Comments Received</p>
            <!-- /STATS BOX TITLE -->
            @if(false)
            <!-- STATS BOX TEXT -->
            <p class="stats-box-text">In the last month</p>
            <!-- /STATS BOX TEXT -->
            @endif
        </div>
        <!-- /STATS BOX -->
    </div>
    <!-- /STATS BOX SLIDER ITEMS -->
</div>
<!-- /STATS BOX SLIDER -->
