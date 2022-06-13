<aside id="chat-widget-message" class="chat-widget message chat-widget-overlay hidden sidebar right">
    <!-- CHAT WIDGET HEADER -->
    <div class="chat-widget-header">
        <!-- CHAT WIDGET CLOSE BUTTON -->
        <div class="chat-widget-close-button" id="chat-widget-close-button">
            <!-- CHAT WIDGET CLOSE BUTTON ICON -->
            <svg class="chat-widget-close-button-icon icon-back-arrow">
                <use xlink:href="#svg-back-arrow"></use>
            </svg>
            <!-- CHAT WIDGET CLOSE BUTTON ICON -->
        </div>
        <!-- /CHAT WIDGET CLOSE BUTTON -->

        <!-- USER STATUS -->
        <div class="user-status">
            <!-- USER STATUS AVATAR -->
            <div class="user-status-avatar">
                <!-- USER AVATAR -->
                <div class="user-avatar small no-outline online" id="chat-widget-avatar-status">
                    <!-- USER AVATAR CONTENT -->
                    <div class="user-avatar-content">
                        <!-- HEXAGON -->
                        <div class="hexagon-image-30-32" id="chat-widget-avatar" data-src="/assets/img/avatar/03.jpg"></div>
                        <!-- /HEXAGON -->
                    </div>
                    <!-- /USER AVATAR CONTENT -->

                    <!-- USER AVATAR PROGRESS -->
                    <div class="user-avatar-progress">
                        <!-- HEXAGON -->
                        <div class="hexagon-progress-40-44" id="chat-widget-gender"></div>
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
            <p class="user-status-title"><span class="bold" id="chat-widget-name">Nick Grissom</span></p>
            <!-- /USER STATUS TITLE -->

            <!-- USER STATUS TAG -->
            <p class="user-status-tag online" id="chat-widget-status">Online</p>
            <!-- /USER STATUS TAG -->
        </div>
        <!-- /USER STATUS -->
    </div>
    <!-- /CHAT WIDGET HEADER -->

    <!-- CHAT WIDGET CONVERSATION -->
    <div class="chat-widget-conversation" id="chat-widget-conversation" data-simplebar>
        <!-- CHAT WIDGET SPEAKER -->
        <div class="chat-widget-speaker left">
            <!-- CHAT WIDGET SPEAKER AVATAR -->
            <div class="chat-widget-speaker-avatar">
                <!-- USER AVATAR -->
                <div class="user-avatar tiny no-border">
                    <!-- USER AVATAR CONTENT -->
                    <div class="user-avatar-content">
                        <!-- HEXAGON -->
                        <div class="hexagon-image-24-26" data-src="/assets/img/avatar/03.jpg"></div>
                        <!-- /HEXAGON -->
                    </div>
                    <!-- /USER AVATAR CONTENT -->
                </div>
                <!-- /USER AVATAR -->
            </div>
            <!-- /CHAT WIDGET SPEAKER AVATAR -->

            <!-- CHAT WIDGET SPEAKER MESSAGE -->
            <p class="chat-widget-speaker-message">Hi Marina! It's been a long time!</p>
            <!-- /CHAT WIDGET SPEAKER MESSAGE -->

            <!-- CHAT WIDGET SPEAKER TIMESTAMP -->
            <p class="chat-widget-speaker-timestamp">Yesterday at 8:36PM</p>
            <!-- /CHAT WIDGET SPEAKER TIMESTAMP -->
        </div>
        <!-- /CHAT WIDGET SPEAKER -->

        <?php if(false): ?>
        <!-- CHAT WIDGET SPEAKER -->
        <div class="chat-widget-speaker left">
            <!-- CHAT WIDGET SPEAKER AVATAR -->
            <div class="chat-widget-speaker-avatar">
                <!-- USER AVATAR -->
                <div class="user-avatar tiny no-border">
                    <!-- USER AVATAR CONTENT -->
                    <div class="user-avatar-content">
                        <!-- HEXAGON -->
                        <div class="hexagon-image-24-26" data-src="/assets/img/avatar/03.jpg"></div>
                        <!-- /HEXAGON -->
                    </div>
                    <!-- /USER AVATAR CONTENT -->
                </div>
                <!-- /USER AVATAR -->
            </div>
            <!-- /CHAT WIDGET SPEAKER AVATAR -->

            <!-- CHAT WIDGET SPEAKER MESSAGE -->
            <p class="chat-widget-speaker-message">Hi Marina! It's been a long time!</p>
            <!-- /CHAT WIDGET SPEAKER MESSAGE -->

            <!-- CHAT WIDGET SPEAKER TIMESTAMP -->
            <p class="chat-widget-speaker-timestamp">Yesterday at 8:36PM</p>
            <!-- /CHAT WIDGET SPEAKER TIMESTAMP -->
        </div>
        <!-- /CHAT WIDGET SPEAKER -->

        <!-- CHAT WIDGET SPEAKER -->
        <div class="chat-widget-speaker right">
            <!-- CHAT WIDGET SPEAKER MESSAGE -->
            <p class="chat-widget-speaker-message">Hey Nick!</p>
            <!-- /CHAT WIDGET SPEAKER MESSAGE -->

            <!-- CHAT WIDGET SPEAKER MESSAGE -->
            <p class="chat-widget-speaker-message">You're right, it's been a really long time! I think the last time we saw was at Neko's party</p>
            <!-- /CHAT WIDGET SPEAKER MESSAGE -->

            <!-- CHAT WIDGET SPEAKER TIMESTAMP -->
            <p class="chat-widget-speaker-timestamp">10:05AM</p>
            <!-- /CHAT WIDGET SPEAKER TIMESTAMP -->
        </div>
        <!-- /CHAT WIDGET SPEAKER -->

        <!-- CHAT WIDGET SPEAKER -->
        <div class="chat-widget-speaker left">
            <!-- CHAT WIDGET SPEAKER AVATAR -->
            <div class="chat-widget-speaker-avatar">
                <!-- USER AVATAR -->
                <div class="user-avatar tiny no-border">
                    <!-- USER AVATAR CONTENT -->
                    <div class="user-avatar-content">
                        <!-- HEXAGON -->
                        <div class="hexagon-image-24-26" data-src="/assets/img/avatar/03.jpg"></div>
                        <!-- /HEXAGON -->
                    </div>
                    <!-- /USER AVATAR CONTENT -->
                </div>
                <!-- /USER AVATAR -->
            </div>
            <!-- /CHAT WIDGET SPEAKER AVATAR -->

            <!-- CHAT WIDGET SPEAKER MESSAGE -->
            <p class="chat-widget-speaker-message">Yeah! I remember now! The stream launch party</p>
            <!-- /CHAT WIDGET SPEAKER MESSAGE -->

            <!-- CHAT WIDGET SPEAKER MESSAGE -->
            <p class="chat-widget-speaker-message">That reminds me that I wanted to ask you something</p>
            <!-- /CHAT WIDGET SPEAKER MESSAGE -->

            <!-- CHAT WIDGET SPEAKER MESSAGE -->
            <p class="chat-widget-speaker-message">Can you stream the new game?</p>
            <!-- /CHAT WIDGET SPEAKER MESSAGE -->
        </div>
        <!-- /CHAT WIDGET SPEAKER -->
        <?php endif; ?>
    </div>
    <!-- /CHAT WIDGET CONVERSATION -->

    <!-- CHAT WIDGET FORM -->
    <div class="chat-widget-form">
        <!-- INTERACTIVE INPUT -->
        <div class="interactive-input small">
            <input type="text" id="chat-widget-message-text" name="chat_widget_message_text" placeholder="Write a message...">
            <!-- INTERACTIVE INPUT ICON WRAP -->
            <div class="interactive-input-icon-wrap">
                <!-- INTERACTIVE INPUT ICON -->
                <svg class="interactive-input-icon icon-send-message" id="chat-widget-message-send">
                    <use xlink:href="#svg-send-message"></use>
                </svg>
                <!-- /INTERACTIVE INPUT ICON -->
            </div>
            <!-- /INTERACTIVE INPUT ICON WRAP -->


            <!-- INTERACTIVE INPUT ACTION -->
            <div class="interactive-input-action" id="chat-widget-message-clear">
                <!-- INTERACTIVE INPUT ACTION ICON -->
                <svg class="interactive-input-action-icon icon-cross-thin" id="chat-widget-message-send">
                    <use xlink:href="#svg-cross-thin"></use>
                </svg>
                <!-- /INTERACTIVE INPUT ACTION ICON -->
            </div>
            <!-- /INTERACTIVE INPUT ACTION -->


        </div>
        <!-- /INTERACTIVE INPUT -->
    </div>
    <!-- /CHAT WIDGET FORM -->
</aside>
<?php /**PATH E:\xampp\htdocs\msm\resources\views/layouts/message/chat.blade.php ENDPATH**/ ?>