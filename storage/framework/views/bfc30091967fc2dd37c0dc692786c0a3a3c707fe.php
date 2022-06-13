<?php
$date = new \Carbon\Carbon();
$calendar = (new App\Http\Controllers\Home\EventController())->getEventsCalendar($date, true, false);
?>
<!-- WIDGET BOX -->
<div class="widget-box no-padding">
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
                <a class="simple-dropdown-link" href="<?php echo e(route('getEvent')); ?>">Events</a>
                <!-- /SIMPLE DROPDOWN LINK -->
            </div>
            <!-- /SIMPLE DROPDOWN -->
        </div>
        <!-- /POST SETTINGS WRAP -->
    </div>
    <!-- /WIDGET BOX SETTINGS -->

    <!-- WIDGET BOX TITLE -->
    <p class="widget-box-title"><?php echo e($date->format('F Y')); ?></p>
    <!-- /WIDGET BOX TITLE -->

    <!-- WIDGET BOX CONTENT -->
    <div class="widget-box-content">
        <!-- CALENDAR -->

        <?php echo $calendar; ?>

        <!-- /CALENDAR -->

        <?php
        $todayEvents = $user->getDayEvents($date);
        ?>

        <!-- CALENDAR EVENTS PREVIEW -->
        <div class="calendar-events-preview small">
            <?php if(count($todayEvents)>0): ?>
            <!-- CALENDAR EVENTS PREVIEW TITLE Monday, August 13th - 2019 -->
            <p class="calendar-events-preview-title"><?php echo e($date->format('l, F dS, Y')); ?></p>
            <!-- /CALENDAR EVENTS PREVIEW TITLE -->

            <!-- CALENDAR EVENT PREVIEW LIST -->
            <div class="calendar-event-preview-list">
                <?php $__currentLoopData = $todayEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- CALENDAR EVENT PREVIEW -->
                <div class="calendar-event-preview <?php if($event->privacy == 'Public'): ?> primary <?php else: ?> secondary <?php endif; ?>">
                    <!-- CALENDAR EVENT PREVIEW START TIME -->
                    <div class="calendar-event-preview-start-time">
                        <!-- CALENDAR EVENT PREVIEW START TIME TITLE -->
                        <p class="calendar-event-preview-start-time-title"><?php echo e($event->getEventStartTime()); ?></p>
                        <!-- /CALENDAR EVENT PREVIEW START TIME TITLE -->

                        <!-- CALENDAR EVENT PREVIEW START TIME TEXT -->
                        <p class="calendar-event-preview-start-time-text"><?php echo e($event->getEventStartTimeAnnotation()); ?></p>
                        <!-- /CALENDAR EVENT PREVIEW START TIME TEXT -->
                    </div>
                    <!-- /CALENDAR EVENT PREVIEW START TIME -->

                    <!-- CALENDAR EVENT PREVIEW INFO -->
                    <div class="calendar-event-preview-info">
                        <!-- CALENDAR EVENT PREVIEW TITLE -->
                        <p class="calendar-event-preview-title popup-event-information-trigger"><a href="<?php echo e(route('getViewEvent', ['event' => $event->key])); ?>" style="color: unset;"><?php echo e($event->title); ?></a></p>
                        <!-- /CALENDAR EVENT PREVIEW TITLE -->

                        <!-- CALENDAR EVENT PREVIEW TEXT -->
                        <p class="calendar-event-preview-text"><?php echo e($event->body); ?></p>
                        <!-- /CALENDAR EVENT PREVIEW TEXT -->

                        <!-- CALENDAR EVENT PREVIEW TITLE -->
                        <p class="calendar-event-preview-time"><span class="bold"><?php echo e($event->getEventStartTime()); ?></span> <?php echo e($event->getEventStartTimeAnnotation()); ?> <?php if($event->getEventEndDate()): ?>- <span class="bold"><?php echo e($event->getEventEndTime()); ?></span> <?php echo e($event->getEventEndTimeAnnotation()); ?> <?php endif; ?></p>
                        <!-- /CALENDAR EVENT PREVIEW TITLE -->
                    </div>
                    <!-- /CALENDAR EVENT PREVIEW INFO -->
                </div>
                <!-- /CALENDAR EVENT PREVIEW -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- /CALENDAR EVENT PREVIEW LIST -->
            <?php endif; ?>
        </div>
        <!-- /CALENDAR EVENTS PREVIEW -->
    </div>
    <!-- /WIDGET BOX CONTENT -->
</div>
<!-- /WIDGET BOX -->
<?php /**PATH E:\xampp\htdocs\msm\resources\views/home/newsfeed/widgets/events.blade.php ENDPATH**/ ?>