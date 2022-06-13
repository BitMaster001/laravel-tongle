@php
$reactionsReceived = $user->getReactionsReceivedDetailed();
@endphp

<!-- WIDGET BOX -->
<div class="widget-box">
    <!-- WIDGET BOX CONTROLS -->
    <div class="widget-box-controls">
        <!-- SLIDER CONTROLS -->
        <div id="reaction-stat-slider-controls" class="slider-controls">
            <!-- SLIDER CONTROL -->
            <div class="slider-control left">
                <!-- SLIDER CONTROL ICON -->
                <svg class="slider-control-icon icon-small-arrow">
                    <use xlink:href="#svg-small-arrow"></use>
                </svg>
                <!-- /SLIDER CONTROL ICON -->
            </div>
            <!-- /SLIDER CONTROL -->

            <!-- SLIDER CONTROL -->
            <div class="slider-control right">
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
    <!-- /WIDGET BOX CONTROLS -->

    <!-- WIDGET BOX TITLE -->
    <p class="widget-box-title">Reactions Received</p>
    <!-- /WIDGET BOX TITLE -->

    <!-- WIDGET BOX CONTENT -->
    <div class="widget-box-content">
        <!-- WIDGET BOX CONTENT SLIDER -->
        <div id="reaction-stat-slider-items" class="widget-box-content-slider">
            <!-- WIDGET BOX CONTENT SLIDER ITEM -->
            <div class="widget-box-content-slider-item">
                <!-- REACTION STATS -->
                <div class="reaction-stats">
                    <!-- REACTION STAT -->
                    <div class="reaction-stat">
                        <!-- REACTION STAT IMAGE -->
                        <img class="reaction-stat-image" src="/assets/img/reaction/like.png" alt="reaction-like">
                        <!-- /REACTION STAT IMAGE -->

                        <!-- REACTION STAT TITLE -->
                        <p class="reaction-stat-title">{{$reactionsReceived['Like'] ?? 0}}</p>
                        <!-- /REACTION STAT TITLE -->

                        <!-- REACTION STAT TEXT -->
                        <p class="reaction-stat-text">Likes</p>
                        <!-- /REACTION STAT TEXT -->
                    </div>
                    <!-- /REACTION STAT -->

                    <!-- REACTION STAT -->
                    <div class="reaction-stat">
                        <!-- REACTION STAT IMAGE -->
                        <img class="reaction-stat-image" src="/assets/img/reaction/love.png" alt="reaction-love">
                        <!-- /REACTION STAT IMAGE -->

                        <!-- REACTION STAT TITLE -->
                        <p class="reaction-stat-title">{{$reactionsReceived['Love'] ?? 0}}</p>
                        <!-- /REACTION STAT TITLE -->

                        <!-- REACTION STAT TEXT -->
                        <p class="reaction-stat-text">Loves</p>
                        <!-- /REACTION STAT TEXT -->
                    </div>
                    <!-- /REACTION STAT -->
                </div>
                <!-- REACTION STATS -->

                <!-- REACTION STATS -->
                <div class="reaction-stats">
                    <!-- REACTION STAT -->
                    <div class="reaction-stat">
                        <!-- REACTION STAT IMAGE -->
                        <img class="reaction-stat-image" src="/assets/img/reaction/dislike.png" alt="reaction-dislike">
                        <!-- /REACTION STAT IMAGE -->

                        <!-- REACTION STAT TITLE -->
                        <p class="reaction-stat-title">{{$reactionsReceived['Dislike'] ?? 0}}</p>
                        <!-- /REACTION STAT TITLE -->

                        <!-- REACTION STAT TEXT -->
                        <p class="reaction-stat-text">Dislikes</p>
                        <!-- /REACTION STAT TEXT -->
                    </div>
                    <!-- /REACTION STAT -->

                    <!-- REACTION STAT -->
                    <div class="reaction-stat">
                        <!-- REACTION STAT IMAGE -->
                        <img class="reaction-stat-image" src="/assets/img/reaction/happy.png" alt="reaction-happy">
                        <!-- /REACTION STAT IMAGE -->

                        <!-- REACTION STAT TITLE -->
                        <p class="reaction-stat-title">{{$reactionsReceived['Happy'] ?? 0}}</p>
                        <!-- /REACTION STAT TITLE -->

                        <!-- REACTION STAT TEXT -->
                        <p class="reaction-stat-text">Happy</p>
                        <!-- /REACTION STAT TEXT -->
                    </div>
                    <!-- /REACTION STAT -->
                </div>
                <!-- REACTION STATS -->
            </div>
            <!-- /WIDGET BOX CONTENT SLIDER ITEM -->

            <!-- WIDGET BOX CONTENT SLIDER ITEM -->
            <div class="widget-box-content-slider-item">
                <!-- REACTION STATS -->
                <div class="reaction-stats">
                    <!-- REACTION STAT -->
                    <div class="reaction-stat">
                        <!-- REACTION STAT IMAGE -->
                        <img class="reaction-stat-image" src="/assets/img/reaction/funny.png" alt="reaction-funny">
                        <!-- /REACTION STAT IMAGE -->

                        <!-- REACTION STAT TITLE -->
                        <p class="reaction-stat-title">{{$reactionsReceived['Funny'] ?? 0}}</p>
                        <!-- /REACTION STAT TITLE -->

                        <!-- REACTION STAT TEXT -->
                        <p class="reaction-stat-text">Funny</p>
                        <!-- /REACTION STAT TEXT -->
                    </div>
                    <!-- /REACTION STAT -->

                    <!-- REACTION STAT -->
                    <div class="reaction-stat">
                        <!-- REACTION STAT IMAGE -->
                        <img class="reaction-stat-image" src="/assets/img/reaction/wow.png" alt="reaction-wow">
                        <!-- /REACTION STAT IMAGE -->

                        <!-- REACTION STAT TITLE -->
                        <p class="reaction-stat-title">{{$reactionsReceived['Wow'] ?? 0}}</p>
                        <!-- /REACTION STAT TITLE -->

                        <!-- REACTION STAT TEXT -->
                        <p class="reaction-stat-text">Wow!</p>
                        <!-- /REACTION STAT TEXT -->
                    </div>
                    <!-- /REACTION STAT -->
                </div>
                <!-- REACTION STATS -->

                <!-- REACTION STATS -->
                <div class="reaction-stats">
                    <!-- REACTION STAT -->
                    <div class="reaction-stat">
                        <!-- REACTION STAT IMAGE -->
                        <img class="reaction-stat-image" src="/assets/img/reaction/angry.png" alt="reaction-angry">
                        <!-- /REACTION STAT IMAGE -->

                        <!-- REACTION STAT TITLE -->
                        <p class="reaction-stat-title">{{$reactionsReceived['Angry'] ?? 0}}</p>
                        <!-- /REACTION STAT TITLE -->

                        <!-- REACTION STAT TEXT -->
                        <p class="reaction-stat-text">Angry</p>
                        <!-- /REACTION STAT TEXT -->
                    </div>
                    <!-- /REACTION STAT -->

                    <!-- REACTION STAT -->
                    <div class="reaction-stat">
                        <!-- REACTION STAT IMAGE -->
                        <img class="reaction-stat-image" src="/assets/img/reaction/sad.png" alt="reaction-sad">
                        <!-- /REACTION STAT IMAGE -->

                        <!-- REACTION STAT TITLE -->
                        <p class="reaction-stat-title">{{$reactionsReceived['Sad'] ?? 0}}</p>
                        <!-- /REACTION STAT TITLE -->

                        <!-- REACTION STAT TEXT -->
                        <p class="reaction-stat-text">Sad</p>
                        <!-- /REACTION STAT TEXT -->
                    </div>
                    <!-- /REACTION STAT -->
                </div>
                <!-- REACTION STATS -->
            </div>
            <!-- /WIDGET BOX CONTENT SLIDER ITEM -->
        </div>
        <!-- /WIDGET BOX CONTENT SLIDER -->
    </div>
    <!-- /WIDGET BOX CONTENT -->
</div>
<!-- /WIDGET BOX -->
