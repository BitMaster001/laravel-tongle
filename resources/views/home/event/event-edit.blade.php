@extends('layouts.app')

@section('title')
{{$title}}
@endsection

@section('content')
<!-- SECTION BANNER -->
<div class="section-banner section-banner-2">
    <!-- SECTION BANNER ICON -->
    <img class="section-banner-icon" src="/assets/img/banner/events-icon.png" alt="events-icon">
    <!-- /SECTION BANNER ICON -->

    <!-- SECTION BANNER TITLE -->
    <p class="section-banner-title">Events</p>
    <!-- /SECTION BANNER TITLE -->

    <!-- SECTION BANNER TEXT -->
    <p class="section-banner-text">Easily manage and create events or search!</p>
    <!-- /SECTION BANNER TEXT -->
</div>
<!-- /SECTION BANNER -->

<!-- SECTION HEADER -->
<div class="section-header">
    <!-- SECTION HEADER INFO -->
    <div class="section-header-info">
        <!-- SECTION PRETITLE -->
        <p class="section-pretitle">Events</p>
        <!-- /SECTION PRETITLE -->

        <!-- SECTION TITLE -->
        <h2 class="section-title">{{$title}}</h2>
        <!-- /SECTION TITLE -->
    </div>
    <!-- /SECTION HEADER INFO -->
    @if($event->id)
    <!-- SECTION HEADER ACTIONS -->
    <div class="section-header-actions">
        <!-- SECTION HEADER ACTION -->
        <a href="{{route('getViewEvent', ['event' => $event->key])}}" class="section-header-action">Go to Event</a>
        <!-- /SECTION HEADER ACTION -->
        @if(false)
        <!-- SECTION HEADER ACTION -->
        <a href="{{route('settingsManageGroupsMembersGet', ['group' => $group->username])}}" class="section-header-action">Manage Members</a>
        <!-- /SECTION HEADER ACTION -->
        @endif
    </div>
    <!-- /SECTION HEADER ACTIONS -->
    @endif
</div>
<!-- /SECTION HEADER -->

<!-- GRID -->
<div class="grid">
    <!-- GRID COLUMN -->
    <div class="grid-column">
        <!-- FORM -->
        <form class="form" method="post" action="{{route('getEventEdit')}}" enctype="multipart/form-data">
            <!-- WIDGET BOX -->
            <div class="quick-post">
                <!-- QUICK POST BODY -->
                <div class="quick-post-body">
                    <!-- TAB BOX -->
                    <div class="tab-box">
                        <!-- TAB BOX ITEMS -->
                        <div class="tab-box-items">
                            <!-- TAB BOX ITEM -->
                            <div class="tab-box-item">
                                <!-- TAB BOX ITEM CONTENT -->
                                <div class="tab-box-item-content new-post">

                                    <!-- FORM ROW -->
                                    <div class="form-row">
                                        @csrf
                                        <input name="id" hidden value="{{$event->id}}">
                                        @if(isset($group))
                                        <input name="group" hidden value="{{$group->username}}">
                                        @endif


                                        <!-- FORM ITEM -->
                                        <div class="form-item form-item-new-post split join-on-mobile">
                                            <!-- FORM INPUT -->
                                            <div class="form-input small active always-active">
                                                <label for="event-name">Event Name</label>
                                                <input class="@error('event-name') is-invalid @enderror" type="text" id="event-name" name="event-name" value="{{old('event-name') ?? $event->title ?? ''}}">
                                                @error('event-name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <!-- /FORM INPUT -->

                                            <!-- FORM INPUT -->
                                            <div class="form-input small active always-active">
                                                <label for="event-price">Event Price in $</label>
                                                <input class="@error('event-price') is-invalid @enderror" type="text" id="event-price" name="event-price" value="{{old('event-price') ?? $event->price ?? 0}}">
                                                @error('event-price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <!-- /FORM INPUT -->
                                        </div>
                                        <!-- /FORM ITEM -->



                                        <!-- FORM ITEM -->
                                        <div class="form-item form-item-new-post split join-on-mobile">
                                            <!-- FORM INPUT DECORATED -->
                                            <div class="form-input-decorated">
                                                <!-- FORM INPUT -->
                                                <div class="form-input small active always-active">
                                                    <label for="event-location">Event Location</label>
                                                    <input class="@error('event-location') is-invalid @enderror" type="text" id="event-location" name="event-location" value="{{old('event-location') ?? $event->event_location ?? ''}}">
                                                    @error('event-location')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                                <!-- /FORM INPUT -->

                                                <!-- FORM INPUT ICON -->
                                                <svg class="form-input-icon icon-pin">
                                                    <use xlink:href="#svg-pin"></use>
                                                </svg>
                                                <!-- /FORM INPUT ICON -->
                                            </div>
                                            <!-- /FORM INPUT DECORATED -->

                                            <!-- FORM SELECT -->
                                            <div class="form-select" >
                                                <label for="event-type">Type</label>
                                                <select id="event-type" name="event-type">
                                                    <option value="Public" @if($event->privacy == 'Public') selected @endif>Public</option>
                                                    <option value="Closed" @if($event->privacy == 'Closed') selected @endif @if(isset($group)) hidden @endif>Closed</option>
                                                </select>
                                                <!-- FORM SELECT ICON -->
                                                <svg class="form-select-icon icon-small-arrow">
                                                    <use xlink:href="#svg-small-arrow"></use>
                                                </svg>
                                                <!-- /FORM SELECT ICON -->
                                            </div>
                                            <!-- /FORM SELECT -->
                                        </div>
                                        <!-- /FORM ITEM -->



                                        <!-- FORM ITEM -->
                                        <div class="form-item form-item-new-post split join-on-mobile">
                                            <!-- FORM INPUT DECORATED -->
                                            <div class="form-input-decorated">
                                                <!-- FORM INPUT -->
                                                <div class="form-input small active always-active">
                                                    <label for="event-start-date">Event Start Date</label>
                                                    <input class="@error('event-start-date') is-invalid @enderror" type="text" id="event-start-date" name="event-start-date" value="{{old('event-start-date') ?? $event->getEventStartDate() ?? ''}}">
                                                    @error('event-start-date')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                                <!-- /FORM INPUT -->

                                                <!-- FORM INPUT ICON -->
                                                <svg class="form-input-icon icon-events">
                                                    <use xlink:href="#svg-events"></use>
                                                </svg>
                                                <!-- /FORM INPUT ICON -->
                                            </div>
                                            <!-- /FORM INPUT DECORATED -->


                                            <!-- FORM SELECT -->
                                            <div class="form-select">
                                                <label for="event-start-time">Start Time</label>
                                                <select id="event-start-time" name="event-start-time">
                                                    <option value="01:00" @if($event->getEventStartTime() == '1:00') selected @endif>01:00</option>
                                                    <option value="01:30" @if($event->getEventStartTime() == '1:30') selected @endif>01:30</option>
                                                    <option value="02:00" @if($event->getEventStartTime() == '2:00') selected @endif>02:00</option>
                                                    <option value="02:30" @if($event->getEventStartTime() == '2:30') selected @endif>02:30</option>
                                                    <option value="03:00" @if($event->getEventStartTime() == '3:00') selected @endif>03:00</option>
                                                    <option value="03:30" @if($event->getEventStartTime() == '3:30') selected @endif>03:30</option>
                                                    <option value="04:00" @if($event->getEventStartTime() == '4:00') selected @endif>04:00</option>
                                                    <option value="04:30" @if($event->getEventStartTime() == '4:30') selected @endif>04:30</option>
                                                    <option value="05:00" @if($event->getEventStartTime() == '5:00') selected @endif>05:00</option>
                                                    <option value="05:30" @if($event->getEventStartTime() == '5:30') selected @endif>05:30</option>
                                                    <option value="06:00" @if($event->getEventStartTime() == '6:00') selected @endif>06:00</option>
                                                    <option value="06:30" @if($event->getEventStartTime() == '6:30') selected @endif>06:30</option>
                                                    <option value="07:00" @if($event->getEventStartTime() == '7:00') selected @endif>07:00</option>
                                                    <option value="07:30" @if($event->getEventStartTime() == '7:30') selected @endif>07:30</option>
                                                    <option value="08:00" @if($event->getEventStartTime() == '8:00') selected @endif>08:00</option>
                                                    <option value="08:30" @if($event->getEventStartTime() == '8:30') selected @endif>08:30</option>
                                                    <option value="09:00" @if($event->getEventStartTime() == '9:00') selected @endif>09:00</option>
                                                    <option value="09:30" @if($event->getEventStartTime() == '9:30') selected @endif>09:30</option>
                                                    <option value="10:00" @if($event->getEventStartTime() == '10:00') selected @endif>10:00</option>
                                                    <option value="10:30" @if($event->getEventStartTime() == '10:30') selected @endif>10:30</option>
                                                    <option value="11:00" @if($event->getEventStartTime() == '11:00') selected @endif>11:00</option>
                                                    <option value="11:30" @if($event->getEventStartTime() == '11:30') selected @endif>11:30</option>
                                                    <option value="12:00" @if($event->getEventStartTime() == '12:30') selected @endif>12:00</option>
                                                    <option value="00:30" @if($event->getEventStartTime() == '12:30') selected @endif>12:30</option>

                                                </select>
                                                <!-- FORM SELECT ICON -->
                                                <svg class="form-select-icon icon-small-arrow">
                                                    <use xlink:href="#svg-small-arrow"></use>
                                                </svg>
                                                <!-- /FORM SELECT ICON -->
                                            </div>
                                            <!-- /FORM SELECT -->

                                            <!-- FORM SELECT -->
                                            <div class="form-select">
                                                <label for="event-start-time-annotation">AM - PM</label>
                                                <select id="event-start-time-annotation" name="event-start-time-annotation">
                                                    <option value="AM" @if($event->getEventStartTimeAnnotation() == 'AM') selected @endif>AM</option>
                                                    <option value="PM" @if($event->getEventStartTimeAnnotation() == 'PM') selected @endif>PM</option>
                                                </select>
                                                <!-- FORM SELECT ICON -->
                                                <svg class="form-select-icon icon-small-arrow">
                                                    <use xlink:href="#svg-small-arrow"></use>
                                                </svg>
                                                <!-- /FORM SELECT ICON -->
                                            </div>
                                            <!-- /FORM SELECT -->

                                            <!-- FORM ITEM -->
                                            <div class="form-item form-item-new-post">
                                                <!-- CHECKBOX WRAP -->
                                                <div class="checkbox-wrap">
                                                    <input type="checkbox" id="event-add-end-time" name="event_add-end-time" @if($event->id >0 && $event->event_end != null) checked @endif>
                                                    <!-- CHECKBOX BOX -->
                                                    <div class="checkbox-box">
                                                        <!-- ICON CROSS -->
                                                        <svg class="icon-cross">
                                                            <use xlink:href="#svg-cross"></use>
                                                        </svg>
                                                        <!-- /ICON CROSS -->
                                                    </div>
                                                    <!-- /CHECKBOX BOX -->
                                                    <label for="event-add-end-time">Add Event End Time</label>
                                                </div>
                                                <!-- /CHECKBOX WRAP -->
                                            </div>
                                            <!-- /FORM ITEM -->
                                        </div>
                                        <!-- /FORM ITEM -->


                                        <!-- FORM ITEM -->
                                        <div class="form-item form-item-new-post split join-on-mobile" id="event-end-time-block" @if($event->id >0 && $event->event_end != null) @else style="display: none;" @endif>
                                            <!-- FORM INPUT DECORATED -->
                                            <div class="form-input-decorated">
                                                <!-- FORM INPUT -->
                                                <div class="form-input small active always-active">
                                                    <label for="event-date">Event End Date</label>
                                                    <input class="@error('event-end-date') is-invalid @enderror" type="text" id="event-end-date" name="event-end-date" value="{{old('event-end-date') ?? $event->getEventEndDate() ?? ''}}">
                                                    @error('event-end-date')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                                <!-- /FORM INPUT -->

                                                <!-- FORM INPUT ICON -->
                                                <svg class="form-input-icon icon-events">
                                                    <use xlink:href="#svg-events"></use>
                                                </svg>
                                                <!-- /FORM INPUT ICON -->
                                            </div>
                                            <!-- /FORM INPUT DECORATED -->

                                            <!-- FORM SELECT -->
                                            <div class="form-select">
                                                <label for="event-end-time">End Time</label>
                                                <select id="event-end-time" name="event-end-time">
                                                    <option value="01:00" @if($event->getEventEndTime() == '1:00') selected @endif>01:00</option>
                                                    <option value="01:30" @if($event->getEventEndTime() == '1:30') selected @endif>01:30</option>
                                                    <option value="02:00" @if($event->getEventEndTime() == '2:00') selected @endif>02:00</option>
                                                    <option value="02:30" @if($event->getEventEndTime() == '2:30') selected @endif>02:30</option>
                                                    <option value="03:00" @if($event->getEventEndTime() == '3:00') selected @endif>03:00</option>
                                                    <option value="03:30" @if($event->getEventEndTime() == '3:30') selected @endif>03:30</option>
                                                    <option value="04:00" @if($event->getEventEndTime() == '4:00') selected @endif>04:00</option>
                                                    <option value="04:30" @if($event->getEventEndTime() == '4:30') selected @endif>04:30</option>
                                                    <option value="05:00" @if($event->getEventEndTime() == '5:00') selected @endif>05:00</option>
                                                    <option value="05:30" @if($event->getEventEndTime() == '5:30') selected @endif>05:30</option>
                                                    <option value="06:00" @if($event->getEventEndTime() == '6:00') selected @endif>06:00</option>
                                                    <option value="06:30" @if($event->getEventEndTime() == '6:30') selected @endif>06:30</option>
                                                    <option value="07:00" @if($event->getEventEndTime() == '7:00') selected @endif>07:00</option>
                                                    <option value="07:30" @if($event->getEventEndTime() == '7:30') selected @endif>07:30</option>
                                                    <option value="08:00" @if($event->getEventEndTime() == '8:00') selected @endif>08:00</option>
                                                    <option value="08:30" @if($event->getEventEndTime() == '8:30') selected @endif>08:30</option>
                                                    <option value="09:00" @if($event->getEventEndTime() == '9:00') selected @endif>09:00</option>
                                                    <option value="09:30" @if($event->getEventEndTime() == '9:30') selected @endif>09:30</option>
                                                    <option value="10:00" @if($event->getEventEndTime() == '10:00') selected @endif>10:00</option>
                                                    <option value="10:30" @if($event->getEventEndTime() == '10:30') selected @endif>10:30</option>
                                                    <option value="11:00" @if($event->getEventEndTime() == '11:00') selected @endif>11:00</option>
                                                    <option value="11:30" @if($event->getEventEndTime() == '11:30') selected @endif>11:30</option>
                                                    <option value="12:00" @if($event->getEventEndTime() == '12:30') selected @endif>12:00</option>
                                                    <option value="00:30" @if($event->getEventEndTime() == '12:30') selected @endif>12:30</option>
                                                </select>
                                                <!-- FORM SELECT ICON -->
                                                <svg class="form-select-icon icon-small-arrow">
                                                    <use xlink:href="#svg-small-arrow"></use>
                                                </svg>
                                                <!-- /FORM SELECT ICON -->
                                            </div>
                                            <!-- /FORM SELECT -->

                                            <!-- FORM SELECT -->
                                            <div class="form-select">
                                                <label for="event-end-time-annotation">AM - PM</label>
                                                <select id="event-end-time-annotation" name="event-end-time-annotation">
                                                    <option value="AM" @if($event->getEventEndTimeAnnotation() == 'AM') selected @endif>AM</option>
                                                    <option value="PM" @if($event->getEventEndTimeAnnotation() == 'PM') selected @endif>PM</option>
                                                </select>
                                                <!-- FORM SELECT ICON -->
                                                <svg class="form-select-icon icon-small-arrow">
                                                    <use xlink:href="#svg-small-arrow"></use>
                                                </svg>
                                                <!-- /FORM SELECT ICON -->
                                            </div>
                                            <!-- /FORM SELECT -->

                                            <div class="form-input form-item-new-post">
                                                <div class="checkbox-wrap"></div>
                                            </div>
                                        </div>
                                        <!-- /FORM ITEM -->



                                        <!-- FORM ITEM -->
                                        <div class="form-item form-item-new-post">
                                            <!-- FORM INPUT -->
                                            <div class="form-input active always-active">
                                                <label for="event-description">Event Description</label>
                                                <textarea class="@error('event-description') is-invalid @enderror" id="event-description" name="event-description">{{old('event-description') ?? $event->body ?? ''}}</textarea>
                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <!-- /FORM INPUT -->
                                        </div>
                                        <!-- /FORM ITEM -->


                                        <!-- FORM ITEM -->
                                        <div class="form-item form-item-new-post split medium">
                                            <div class="new-post-item-image-preview" style="width: unset; display: flex; margin-right:0px;">
                                                @if($event->id > 0 && $event->cover != null && count($event->images) == 0)

                                                <img class='new-post-image' src='{{$event->cover}}'>
                                                @endif
                                                @if($event->id > 0 && $event->images != null)
                                                @foreach($event->images as $image)
                                                <div class="image-container" style="all:unset; margin-right: 10px; width: auto;">
                                                    <img class='new-post-image' src='{{$image->src}}'>
                                                    <div class="new-post-item-image-clear" onclick="deleteImage(this, '{{$image->key}}');"><svg class="new-post-item-image-clear-icon icon-delete" style="margin-left: -15px; margin-top: -10px; position: absolute;"><use xlink:href="#svg-delete"></use></svg></div>
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>

                                            <div class="new-post-item-image-preview" id="new-post-item-image-preview">
                                            </div>
                                            <input type="file" accept="image/*" multiple id="new-post-item-cover" name="new-post-images[]" hidden>


                                            <!-- <p class="button small secondary" >Blog Cover</p>-->
                                            <div class="action-request-list action-request-list-new-post" id="new-post-item-image-button">
                                                <div class="action-request accept">
                                                    <!-- ACTION REQUEST ICON -->
                                                    <svg class="action-request-icon icon-photos" style="margin-right: 5px; margin-left: 5px;">
                                                        <use xlink:href="#svg-photos"></use>
                                                    </svg>
                                                    <!-- /ACTION REQUEST ICON -->
                                                </div>

                                                @error('new-post-images')
                                                <p class="upload-box-text error" style="color: red;">
                                                    <strong>{{ $message }}</strong>
                                                </p>
                                                @enderror

                                            </div>
                                        </div>
                                        <!-- /FORM ITEM -->

                                        @if(false)
                                        <!-- FORM ITEM -->
                                        <div class="form-item form-item-new-post">
                                            <!-- FORM INPUT DECORATED -->
                                            <div class="form-input-decorated">
                                                <!-- FORM INPUT -->
                                                <div class="form-input small">
                                                    <label for="event-cover-photo">Event Cover Photo</label>
                                                    <input type="text" id="event-cover-photo" name="event_cover_photo">
                                                </div>
                                                <!-- /FORM INPUT -->

                                                <!-- FORM INPUT ICON -->
                                                <svg class="form-input-icon icon-photos">
                                                    <use xlink:href="#svg-photos"></use>
                                                </svg>
                                                <!-- /FORM INPUT ICON -->
                                            </div>
                                            <!-- /FORM INPUT DECORATED -->
                                        </div>
                                        <!-- /FORM ITEM -->
                                        @endif

                                        <!-- FORM ITEM -->
                                        <div class="form-item form-item-new-post">
                                            <!-- FORM INPUT -->
                                            <!--<div class="form-input small">
                                                <label for="event-invite-friends">Invite Friends</label>
                                                <textarea type="text" id="event-invite-friends" name="event-invite-friends" style="display: none;"></textarea>
                                            </div>-->
                                            <div class="new-post-tag-friends event-invite-friends" id="event-invite-friends-block" style="display: none;">
                                                <textarea class="new-post-tag-friends-input event-invite-friends" id="event-invite-friends" name="event-invite-friends" placeholder="Invite Friends"></textarea>
                                            </div>
                                            <!-- /FORM INPUT -->
                                        </div>
                                        <!-- /FORM ITEM -->

                                        @if(false)
                                        <!-- FORM ADD ITEMS -->
                                        <div class="form-add-items form-item-new-post">
                                            <!-- FORM ADD ITEMS TITLE -->
                                            <p class="form-add-items-title">Invite Friends</p>
                                            <!-- /FORM ADD ITEMS TITLE -->

                                            <!-- FORM ADD ITEMS INFO -->
                                            <div class="form-add-items-info">
                                                <!-- FORM ADD ITEMS BUTTON -->
                                                <div class="form-add-items-button">
                                                    <!-- FORM ADD ITEMS BUTTON ICON -->
                                                    <svg class="form-add-items-button-icon icon-plus">
                                                        <use xlink:href="#svg-plus"></use>
                                                    </svg>
                                                    <!-- /FORM ADD ITEMS BUTTON ICON -->
                                                </div>
                                                <!-- /FORM ADD ITEMS BUTTON -->

                                                <!-- USER AVATAR LIST -->
                                                <div class="user-avatar-list reverse medium">
                                                    <!-- USER AVATAR -->
                                                    <div class="user-avatar smaller no-stats">
                                                        <!-- USER AVATAR BORDER -->
                                                        <div class="user-avatar-border">
                                                            <!-- HEXAGON -->
                                                            <div class="hexagon-34-36"></div>
                                                            <!-- /HEXAGON -->
                                                        </div>
                                                        <!-- /USER AVATAR BORDER -->

                                                        <!-- USER AVATAR CONTENT -->
                                                        <div class="user-avatar-content">
                                                            <!-- HEXAGON -->
                                                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/03.jpg"></div>
                                                            <!-- /HEXAGON -->
                                                        </div>
                                                        <!-- /USER AVATAR CONTENT -->
                                                    </div>
                                                    <!-- /USER AVATAR -->

                                                    <!-- USER AVATAR -->
                                                    <div class="user-avatar smaller no-stats">
                                                        <!-- USER AVATAR BORDER -->
                                                        <div class="user-avatar-border">
                                                            <!-- HEXAGON -->
                                                            <div class="hexagon-34-36"></div>
                                                            <!-- /HEXAGON -->
                                                        </div>
                                                        <!-- /USER AVATAR BORDER -->

                                                        <!-- USER AVATAR CONTENT -->
                                                        <div class="user-avatar-content">
                                                            <!-- HEXAGON -->
                                                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/05.jpg"></div>
                                                            <!-- /HEXAGON -->
                                                        </div>
                                                        <!-- /USER AVATAR CONTENT -->
                                                    </div>
                                                    <!-- /USER AVATAR -->

                                                    <!-- USER AVATAR -->
                                                    <div class="user-avatar smaller no-stats">
                                                        <!-- USER AVATAR BORDER -->
                                                        <div class="user-avatar-border">
                                                            <!-- HEXAGON -->
                                                            <div class="hexagon-34-36"></div>
                                                            <!-- /HEXAGON -->
                                                        </div>
                                                        <!-- /USER AVATAR BORDER -->

                                                        <!-- USER AVATAR CONTENT -->
                                                        <div class="user-avatar-content">
                                                            <!-- HEXAGON -->
                                                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/10.jpg"></div>
                                                            <!-- /HEXAGON -->
                                                        </div>
                                                        <!-- /USER AVATAR CONTENT -->
                                                    </div>
                                                    <!-- /USER AVATAR -->

                                                    <!-- USER AVATAR -->
                                                    <div class="user-avatar smaller no-stats">
                                                        <!-- USER AVATAR BORDER -->
                                                        <div class="user-avatar-border">
                                                            <!-- HEXAGON -->
                                                            <div class="hexagon-34-36"></div>
                                                            <!-- /HEXAGON -->
                                                        </div>
                                                        <!-- /USER AVATAR BORDER -->

                                                        <!-- USER AVATAR CONTENT -->
                                                        <div class="user-avatar-content">
                                                            <!-- HEXAGON -->
                                                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/02.jpg"></div>
                                                            <!-- /HEXAGON -->
                                                        </div>
                                                        <!-- /USER AVATAR CONTENT -->
                                                    </div>
                                                    <!-- /USER AVATAR -->

                                                    <!-- USER AVATAR -->
                                                    <div class="user-avatar smaller no-stats">
                                                        <!-- USER AVATAR BORDER -->
                                                        <div class="user-avatar-border">
                                                            <!-- HEXAGON -->
                                                            <div class="hexagon-34-36"></div>
                                                            <!-- /HEXAGON -->
                                                        </div>
                                                        <!-- /USER AVATAR BORDER -->

                                                        <!-- USER AVATAR CONTENT -->
                                                        <div class="user-avatar-content">
                                                            <!-- HEXAGON -->
                                                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/06.jpg"></div>
                                                            <!-- /HEXAGON -->
                                                        </div>
                                                        <!-- /USER AVATAR CONTENT -->
                                                    </div>
                                                    <!-- /USER AVATAR -->

                                                    <!-- USER AVATAR -->
                                                    <div class="user-avatar smaller no-stats">
                                                        <!-- USER AVATAR BORDER -->
                                                        <div class="user-avatar-border">
                                                            <!-- HEXAGON -->
                                                            <div class="hexagon-34-36"></div>
                                                            <!-- /HEXAGON -->
                                                        </div>
                                                        <!-- /USER AVATAR BORDER -->

                                                        <!-- USER AVATAR CONTENT -->
                                                        <div class="user-avatar-content">
                                                            <!-- HEXAGON -->
                                                            <div class="hexagon-image-30-32" data-src="/assets/img/avatar/23.jpg"></div>
                                                            <!-- /HEXAGON -->
                                                        </div>
                                                        <!-- /USER AVATAR CONTENT -->
                                                    </div>
                                                    <!-- /USER AVATAR -->
                                                </div>
                                                <!-- /USER AVATAR LIST -->
                                            </div>
                                            <!-- /FORM ADD ITEMS INFO -->
                                        </div>
                                        <!-- /FORM ADD ITEMS -->
                                        @endif


                                    </div>
                                    <!-- /FORM ROW -->
                                </div>
                                <!-- /TAB BOX ITEM CONTENT -->
                            </div>
                            <!-- /TAB BOX ITEM -->

                        </div>
                        <!-- /TAB BOX ITEMS -->
                    </div>
                    <!-- /TAB BOX -->
                </div>
                <!-- /QUICK POST BODY -->

                <!-- QUICK POST FOOTER -->
                <div class="quick-post-footer">
                    <!-- QUICK POST FOOTER ACTIONS -->
                    <div class="quick-post-footer-actions">
                        @if($event->id > 0)
                        <a class="button small white white-tertiary" href="{{route('getEventDelete', ['event' => $event->key])}}" onclick="return confirm('Are you sure you want to permanently remove this event?')">Delete Event</a>
                        @endif
                    </div>
                    <!-- /QUICK POST FOOTER ACTIONS -->

                    <!-- QUICK POST FOOTER ACTIONS -->
                    <div class="quick-post-footer-actions">
                        <!-- BUTTON -->
                        @if($event->id > 0)
                        <a class="button small void" id="new-post-clear" href="{{route('getViewEventManage', ['event' => $event->key])}}">Discard</a>
                        @else
                        <a class="button small void" id="new-post-clear" href="{{route('getEvent')}}">Discard</a>
                        @endif
                        <!-- /BUTTON -->

                        <!-- BUTTON -->
                        <button class="button small secondary">Save</button>
                        <!-- /BUTTON -->
                    </div>
                    <!-- /QUICK POST FOOTER ACTIONS -->
                </div>
                <!-- /QUICK POST FOOTER -->
            </div>
            <!-- /WIDGET BOX -->
        </form>
        <!-- /FORM -->
    </div>
    <!-- /GRID COLUMN -->
</div>
<!-- /GRID -->
@endsection

@section('stylesheets')
<link rel="stylesheet" href="/assets/vendor/tagify/tagify.css">
<link rel="stylesheet" href="/assets/css/custom-tagify.css">
<link rel="stylesheet" href="/assets/vendor/DatePickerX/css/DatePickerX.css">
<style>
    @media screen and (max-width: 680px){
        .form-item.centered, .form-item.split {
            display: block;
        }
        #new-post-item-image-button .action-request{
            margin-top: 25px;
        }
        .new-post-item-image-preview{
            display: contents !important;
        }
        .new-post-item-image-preview .new-post-image{
            margin-bottom: 15px;
        }
    }
</style>
@endsection

@section('scripts')
<!-- Tagify js -->
<script src="/assets/vendor/tagify/tagify.min.js"></script>
<!-- forum topic edit js -->
<script src="/assets/js/pages/home/events/events-edit.js"></script>
<script src="/assets/vendor/DatePickerX/js/DatePickerX.min.js"></script>
<script>
    function deleteImage(el, id){
        el.closest('.image-container').remove();
        const url = "/events/images/"+id+"/delete";
        fetchApi(url, "get", [], onloadDeleteEventImage);
    }

    function onloadDeleteEventImage(xhr){
        if (xhr.status == 200) {
            let data = JSON.parse(xhr.response);
            if(typeof (data.message) != "undefined"){
                switch (data.message.type){
                    case "Success":
                        ShowSuccess(data.message.body);
                        break;
                    case "Danger":
                        ShowDanger(data.message.body);
                        break;
                    case "Error":
                        ShowError(data.message.body);
                        break;
                }
            }else{
                ShowDanger("Oops something unusually went wrong, Please try again or try to refresh the page.");
                return ;
            }
        }else{
            ShowDanger("Oops something unusually went wrong, Please try again or try to refresh the page.");
        }
    }
    </script>
@endsection


