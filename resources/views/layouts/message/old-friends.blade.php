@php
$friends = Auth::user()->getMessageableFriends()

@endphp
@if(count($friends) > 0)
<aside id="chat-widget-messages" class="chat-widget closed sidebar right">
    <!-- CHAT WIDGET MESSAGES -->
    <div class="chat-widget-messages" data-simplebar>
        @foreach($friends as $friend)
        <!-- CHAT WIDGET MESSAGE -->
        <div class="chat-widget-message" data-user="{{$friend->name}}">
            <!-- USER STATUS -->
            <div class="user-status">
                <!-- USER STATUS AVATAR -->
                <div class="user-status-avatar">
                    <!-- USER AVATAR -->
                    <div class="user-avatar small no-outline {{$friend->getMessageableStatus()}}">
                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-30-32" data-src="{{$friend->avatar}}"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->

                        <!-- USER AVATAR PROGRESS -->
                        <div class="user-avatar-progress">
                            <!-- HEXAGON -->
                            @if($friend->gender == "Male")
                            <div class="hexagon-progress-40-44-male"></div>
                            @elseif($friend->gender == "Female")
                            <div class="hexagon-progress-40-44-female"></div>
                            @elseif($friend->gender == "Other")
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
                </div>
                <!-- /USER STATUS AVATAR -->

                <!-- USER STATUS TITLE -->
                <p class="user-status-title"><span class="bold">{{$friend->full_name}}</span></p>
                <!-- /USER STATUS TITLE -->

                <!-- USER STATUS TEXT -->
                <p class="user-status-text small">Can you stream the new game?</p>
                <!-- /USER STATUS TEXT -->

                <!-- USER STATUS TIMESTAMP -->
                <p class="user-status-timestamp floaty">{{$friend->last_seen}}</p>
                <!-- /USER STATUS TIMESTAMP -->
            </div>
            <!-- /USER STATUS -->
        </div>
        <!-- /CHAT WIDGET MESSAGE -->
        @endforeach
    </div>
    <!-- /CHAT WIDGET MESSAGES -->

    <!-- CHAT WIDGET FORM -->
    <form class="chat-widget-form">
        <!-- INTERACTIVE INPUT -->
        <div class="interactive-input small">
            <input type="text" id="chat-widget-search" name="chat_widget_search" placeholder="Search Messages...">
            <!-- INTERACTIVE INPUT ICON WRAP -->
            <div class="interactive-input-icon-wrap">
                <!-- INTERACTIVE INPUT ICON -->
                <svg class="interactive-input-icon icon-magnifying-glass">
                    <use xlink:href="#svg-magnifying-glass"></use>
                </svg>
                <!-- /INTERACTIVE INPUT ICON -->
            </div>
            <!-- /INTERACTIVE INPUT ICON WRAP -->

            <!-- INTERACTIVE INPUT ACTION -->
            <div class="interactive-input-action">
                <!-- INTERACTIVE INPUT ACTION ICON -->
                <svg class="interactive-input-action-icon icon-cross-thin">
                    <use xlink:href="#svg-cross-thin"></use>
                </svg>
                <!-- /INTERACTIVE INPUT ACTION ICON -->
            </div>
            <!-- /INTERACTIVE INPUT ACTION -->
        </div>
        <!-- /INTERACTIVE INPUT -->
    </form>
    <!-- /CHAT WIDGET FORM -->

    <!-- CHAT WIDGET BUTTON -->
    <div class="chat-widget-button">
        <!-- CHAT WIDGET BUTTON ICON -->
        <div class="chat-widget-button-icon">
            <!-- BURGER ICON -->
            <div class="burger-icon">
                <!-- BURGER ICON BAR -->
                <div class="burger-icon-bar"></div>
                <!-- /BURGER ICON BAR -->

                <!-- BURGER ICON BAR -->
                <div class="burger-icon-bar"></div>
                <!-- /BURGER ICON BAR -->

                <!-- BURGER ICON BAR -->
                <div class="burger-icon-bar"></div>
                <!-- /BURGER ICON BAR -->
            </div>
            <!-- /BURGER ICON -->
        </div>
        <!-- /CHAT WIDGET BUTTON ICON -->

        <!-- CHAT WIDGET BUTTON TEXT -->
        <p class="chat-widget-button-text">Messages / Chat</p>
        <!-- /CHAT WIDGET BUTTON TEXT -->
    </div>
    <!-- /CHAT WIDGET BUTTON -->
</aside>
@endif
