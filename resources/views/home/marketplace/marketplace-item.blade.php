@extends('layouts.app')

@section('title')
Marketplace
@endsection

@section('content')
<!-- SECTION BANNER -->
<div class="section-banner section-banner-1">
    <!-- SECTION BANNER ICON -->
    <img class="section-banner-icon" src="/assets/img/banner/marketplace-icon.png" alt="marketplace-icon">
    <!-- /SECTION BANNER ICON -->

    <!-- SECTION BANNER TITLE -->
    <p class="section-banner-title">Marketplace</p>
    <!-- /SECTION BANNER TITLE -->

    <!-- SECTION BANNER TEXT -->
    <p class="section-banner-text">The best place for the community to buy and sell!</p>
    <!-- /SECTION BANNER TEXT -->
</div>
<!-- /SECTION BANNER -->

<!-- SECTION HEADER -->
<div class="section-header">
    <!-- SECTION HEADER INFO -->
    <div class="section-header-info">
        <!-- SECTION PRETITLE -->
        <p class="section-pretitle">{{$item->model->name}}</p>
        <!-- /SECTION PRETITLE -->

        <!-- SECTION TITLE -->
        <h2 class="section-title">{{$item->title}}</h2>
        <!-- /SECTION TITLE -->
    </div>
    <!-- /SECTION HEADER INFO -->

    <!-- SECTION HEADER ACTIONS -->
    <div class="section-header-actions">
        <!-- SECTION HEADER SUBSECTION -->
        <a class="section-header-subsection" href="{{route('getMarketplace')}}">Marketplace</a>
        <!-- /SECTION HEADER SUBSECTION -->

        <!-- SECTION HEADER SUBSECTION -->
        <a class="section-header-subsection" href="{{route('getMarketplaceCategorie', ['categorie' => $item->model->slag])}}">{{$item->model->name}}</a>
        <!-- /SECTION HEADER SUBSECTION -->

        <!-- SECTION HEADER SUBSECTION -->
        <p class="section-header-subsection">{{$item->title}}</p>
        <!-- /SECTION HEADER SUBSECTION -->
    </div>
    <!-- /SECTION HEADER ACTIONS -->
</div>
<!-- /SECTION HEADER -->

<!-- GRID -->
<div class="grid grid-9-3">
    <!-- MARKETPLACE CONTENT -->
    <div class="marketplace-content grid-column">
        <!-- SLIDER PANEL -->
        <div class="slider-panel">
            <!-- SLIDER PANEL SLIDES -->
            <div id="product-box-slider-items" class="slider-panel-slides">
                @foreach($item->images as $image)
                <!-- SLIDER PANEL SLIDE -->
                <div class="slider-panel-slide">
                    <!-- SLIDER PANEL SLIDE IMAGE -->
                    <figure class="slider-panel-slide-image liquid">
                        <img src="{{$image->src}}">
                    </figure>
                    <!-- /SLIDER PANEL SLIDE IMAGE -->
                </div>
                <!-- /SLIDER PANEL SLIDE -->
                @endforeach
            </div>
            <!-- /SLIDER PANEL SLIDES -->

            <!-- SLIDER PANEL ROSTER -->
            <div class="slider-panel-roster">
                <!-- SLIDER CONTROLS -->
                <div id="product-box-slider-controls" class="slider-controls">
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

                @if(false)
                <!-- BUTTON -->
                <a class="button secondary"
                   href="https://themeforest.net/item/pixel-diamond-html-esports-gaming-magazine-community/23798711"
                   target="_blank">Live Preview</a>
                <!-- /BUTTON -->
                @endif
                <!-- ROSTER PICTURES -->
                <div id="product-box-slider-roster" class="roster-pictures">
                    @foreach($item->images as $image)
                    <!-- ROSTER PICTURE -->
                    <div class="roster-picture">
                        <!-- ROSTER PICTURE IMAGE -->
                        <figure class="roster-picture-image liquid">
                            <img src="{{$image->src}}">
                        </figure>
                        <!-- /ROSTER PICTURE IMAGE -->
                    </div>
                    <!-- /ROSTER PICTURE -->
                    @endforeach
                </div>
                <!-- /ROSTER PICTURES -->
            </div>
            <!-- /SLIDER PANEL ROSTER -->
        </div>
        <!-- /SLIDER PANEL -->
        @if(strlen($item->body) > 0)
        <!-- TAB BOX -->
        <div class="tab-box">
            <!-- TAB BOX OPTIONS -->
            <div class="tab-box-options">
                <!-- TAB BOX OPTION -->
                <div class="tab-box-option">
                    <!-- TAB BOX OPTION TITLE -->
                    <p class="tab-box-option-title">Description</p>
                    <!-- /TAB BOX OPTION TITLE -->
                </div>
                <!-- /TAB BOX OPTION -->
            </div>
            <!-- /TAB BOX OPTIONS -->


            <!-- TAB BOX ITEMS -->
            <div class="tab-box-items">
                <!-- TAB BOX ITEM -->
                <div class="tab-box-item">
                    <!-- TAB BOX ITEM CONTENT -->
                    <div class="tab-box-item-content">
                        <p>{{$item->body}}</p>
                    </div>
                    <!-- /TAB BOX ITEM CONTENT -->
                </div>
                <!-- /TAB BOX ITEM -->
            </div>
            <!-- /TAB BOX ITEMS -->
        </div>
        <!-- /TAB BOX -->
        @endif
    </div>
    <!-- /MARKETPLACE CONTENT -->

    <!-- MARKETPLACE SIDEBAR -->
    <div class="marketplace-sidebar">
        <!-- SIDEBAR BOX -->
        <div class="sidebar-box">
            <!-- SIDEBAR BOX ITEMS -->
            <div class="sidebar-box-items">
                <!-- PRICE TITLE -->
                <p class="price-title big"><span class="currency">$</span> {{$item->price}}</p>
                <!-- /PRICE TITLE -->
            </div>
            <!-- /SIDEBAR BOX ITEMS -->

            <!-- SIDEBAR BOX TITLE -->
            <p class="sidebar-box-title medium-space">Details</p>
            <!-- /SIDEBAR BOX TITLE -->

            <!-- SIDEBAR BOX ITEMS -->
            <div class="sidebar-box-items">
                <!-- INFORMATION LINE LIST -->
                <div class="information-line-list">
                    <!-- INFORMATION LINE -->
                    <div class="information-line">
                        <!-- INFORMATION LINE TITLE -->
                        <p class="information-line-title">Updated</p>
                        <!-- /INFORMATION LINE TITLE -->

                        <!-- INFORMATION LINE TEXT -->
                        <p class="information-line-text"><span class="bold">{{$item->getUpdateDate()}}</span></p>
                        <!-- /INFORMATION LINE TEXT -->
                    </div>
                    <!-- /INFORMATION LINE -->

                    <!-- INFORMATION LINE -->
                    <div class="information-line">
                        <!-- INFORMATION LINE TITLE -->
                        <p class="information-line-title">Created</p>
                        <!-- /INFORMATION LINE TITLE -->

                        <!-- INFORMATION LINE TEXT -->
                        <p class="information-line-text"><span class="bold">{{$item->getCreateDate()}}</span></p>
                        <!-- /INFORMATION LINE TEXT -->
                    </div>
                    <!-- /INFORMATION LINE -->

                    <!-- INFORMATION LINE -->
                    <div class="information-line">
                        <!-- INFORMATION LINE TITLE -->
                        <p class="information-line-title">Category</p>
                        <!-- /INFORMATION LINE TITLE -->

                        <!-- INFORMATION LINE TEXT -->
                        <p class="information-line-text"><a href="{{route('getMarketplaceCategorie', ['categorie' => $item->model->slag])}}">{{$item->model->name}}</a></p>
                        <!-- /INFORMATION LINE TEXT -->
                    </div>
                    <!-- /INFORMATION LINE -->
                    @if($item->user->public_phone)
                    <!-- INFORMATION LINE -->
                    <div class="information-line">
                        <!-- INFORMATION LINE TITLE -->
                        <p class="information-line-title">Phone</p>
                        <!-- /INFORMATION LINE TITLE -->

                        <!-- INFORMATION LINE TEXT -->
                        <p class="information-line-text"><span class="bold">{{$item->user->public_phone}}</span></p>
                        <!-- /INFORMATION LINE TEXT -->
                    </div>
                    <!-- /INFORMATION LINE -->
                    @endif

                    @if($item->user->public_email)
                    <!-- INFORMATION LINE -->
                    <div class="information-line">
                        <!-- INFORMATION LINE TITLE -->
                        <p class="information-line-title">Email</p>
                        <!-- /INFORMATION LINE TITLE -->

                        <!-- INFORMATION LINE TEXT -->
                        <p class="information-line-text"><span class="bold">{{$item->user->public_email}}</span></p>
                        <!-- /INFORMATION LINE TEXT -->
                    </div>
                    <!-- /INFORMATION LINE -->
                    @endif


                    @if($item->user->country)
                    <!-- INFORMATION LINE -->
                    <div class="information-line">
                        <!-- INFORMATION LINE TITLE -->
                        <p class="information-line-title">Location</p>
                        <!-- /INFORMATION LINE TITLE -->

                        <!-- INFORMATION LINE TEXT -->
                        <p class="information-line-text"><span class="bold">@if($item->user->city) {{$item->user->city.", "}}@endif{{$item->user->country}}  </span><img class="information-line-image" src="{{'/assets/img/flags/'.$item->user->country.'.png'}}" alt="flag {{$item->user->country}}" style="height: 15px;"></p>
                        <!-- /INFORMATION LINE TEXT -->
                    </div>
                    <!-- /INFORMATION LINE -->
                    @endif

                </div>
                <!-- /INFORMATION LINE LIST -->
            </div>
            <!-- /SIDEBAR BOX ITEMS -->

            <!-- SIDEBAR BOX TITLE -->
            <p class="sidebar-box-title medium-space">Seller</p>
            <!-- /SIDEBAR BOX TITLE -->

            <!-- SIDEBAR BOX ITEMS -->
            <div class="sidebar-box-items">
                <!-- USER STATUS -->
                <div class="user-status">
                    <!-- USER STATUS AVATAR -->
                    <a class="user-status-avatar" href="{{route('userPublicProfileGet', ['user' => $item->user->username])}}">
                        <!-- USER AVATAR -->
                        <div class="user-avatar small no-outline">
                            <!-- USER AVATAR CONTENT -->
                            <div class="user-avatar-content">
                                <!-- HEXAGON -->
                                <div class="hexagon-image-30-32" data-src="{{$item->user->avatar}}"></div>
                                <!-- /HEXAGON -->
                            </div>
                            <!-- /USER AVATAR CONTENT -->

                            <!-- USER AVATAR PROGRESS -->
                            <div class="user-avatar-progress">
                                <!-- HEXAGON -->
                                @if($item->user->gender == "Male")
                                <div class="hexagon-progress-40-44-male"></div>
                                @elseif($item->user->gender == "Female")
                                <div class="hexagon-progress-40-44-female"></div>
                                @elseif($item->user->gender == "Other")
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

                    <!-- USER STATUS TITLE -->
                    <p class="user-status-title"><a class="bold" href="{{route('userPublicProfileGet', ['user' => $item->user->username])}}">{{$item->user->full_name}}</a></p>
                    <!-- /USER STATUS TITLE -->

                    <!-- USER STATUS TEXT -->
                    <p class="user-status-text small">{{count($item->user->items())}} items published</p>
                    <!-- /USER STATUS TEXT -->
                </div>
                <!-- /USER STATUS -->
                @if($item->user != Auth::user())
                <!-- BUTTON -->
                <p class="button primary" id="profile-header-send-message" data-user="{{$item->user->username}}">Contact Seller</p>
                <!-- /BUTTON -->
                @else
                <!-- BUTTON -->
                <a class="button primary" href="{{route('settingsManageStoreManageGet', ['item' => $item->key])}}">Edit Item</a>
                <!-- /BUTTON -->
                @endif
                <!-- BUTTON -->
                <a class="button small secondary" href="{{route('userPublicStoreGet', ['user' => $item->user->username])}}">View Seller Store</a>
                <!-- /BUTTON -->
            </div>
            <!-- /SIDEBAR BOX ITEMS -->


        </div>
        <!-- /SIDEBAR BOX -->
    </div>
    <!-- /MARKETPLACE SIDEBAR -->
</div>
<!-- /GRID -->
@endsection

@section('stylesheets')

@endsection

@section('scripts')
@endsection


