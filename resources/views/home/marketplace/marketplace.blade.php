@extends('layouts.app')

@section('title')
Marketplace
@endsection

@section('content')
    <!-- SECTION BANNER -->
    <div class="section-banner section-banner-3">
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
<div class="section-header section-action-button" style="display: block;">
    <!-- SECTION HEADER ACTIONS -->
    <div class="section-header-actions" style="display: block; text-align: right;">
    <!-- BUTTON -->
        <a class="button primary popup-manage-item-trigger" href="{{route('settingsManageStoreNewGet')}}"><span style="padding-right: 15px; padding-left: 15px;">Create New Item!</span></a>
    <!-- /BUTTON -->
    </div>
    <!-- /SECTION HEADER ACTIONS -->
</div>
<!-- /SECTION HEADER -->

<!-- SECTION HEADER -->
<div class="section-header" style="margin-top: 0px;">
    <!-- SECTION HEADER -->
    <div class="section-header" style="margin-top: 30px;">
        <!-- SECTION HEADER INFO -->
        <div class="section-header-info">
            <!-- SECTION PRETITLE -->
            <p class="section-pretitle">Find what you want!</p>
            <!-- /SECTION PRETITLE -->

            <!-- SECTION TITLE -->
            <h2 class="section-title">Market Categories</h2>
            <!-- /SECTION TITLE -->
        </div>
        <!-- /SECTION HEADER INFO -->
    </div>
    <!-- /SECTION HEADER -->

    <!-- SECTION HEADER ACTIONS -->
    <div class="section-header-actions">
        <!-- SLIDER CONTROLS -->
        <div id="marketplace-categories-slider-controls" class="slider-controls">
            <!-- SLIDER CONTROL -->
            <div class="slider-control left">
                <!-- SLIDER CONTROL ICON -->
                <svg class="slider-control-icon icon-big-arrow">
                    <use xlink:href="#svg-big-arrow"></use>
                </svg>
                <!-- /SLIDER CONTROL ICON -->
            </div>
            <!-- /SLIDER CONTROL -->

            <!-- SLIDER CONTROL -->
            <div class="slider-control right">
                <!-- SLIDER CONTROL ICON -->
                <svg class="slider-control-icon icon-big-arrow">
                    <use xlink:href="#svg-big-arrow"></use>
                </svg>
                <!-- /SLIDER CONTROL ICON -->
            </div>
            <!-- /SLIDER CONTROL -->
        </div>
        <!-- /SLIDER CONTROLS -->
    </div>
    <!-- /SECTION HEADER ACTIONS -->
</div>
<!-- /SECTION HEADER -->

<!-- SECTION SLIDER -->
<div id="marketplace-categories-slider" class="section-slider">
    @if(false)
    <!-- SECTION SLIDER ITEM -->
    <div class="sections-slider-item">
        <!-- STREAMER BOX -->
        <div class="streamer-box small">
            <!-- STREAMER BOX COVER -->
            <figure class="streamer-box-cover liquid">
                <img src="img/cover/01.jpg" alt="cover-01">
            </figure>
            <!-- /STREAMER BOX COVER -->

            <!-- STREAMER BOX INFO -->
            <div class="streamer-box-info">
                <!-- STREAMER BOX IMAGE -->
                <div class="streamer-box-image">
                    <!-- PICTURE -->
                    <figure class="picture medium circle liquid">
                        <img src="img/avatar/01-social.png" alt="avatar-01-social">
                    </figure>
                    <!-- /PICTURE -->
                </div>
                <!-- /STREAMER BOX IMAGE -->

                <!-- STREAMER BOX TITLE -->
                <p class="streamer-box-title">GameHuntress</p>
                <!-- /STREAMER BOX TITLE -->

                <!-- STREAMER BOX TEXT -->
                <p class="streamer-box-text">Marina Valentine</p>
                <!-- /STREAMER BOX TEXT -->

                <!-- STREAMER BOX STATUS -->
                <p class="streamer-box-status">Offline</p>
                <!-- /STREAMER BOX STATUS -->

                <!-- BUTTON -->
                <a class="button small white" href="profile-timeline.html">View Profile</a>
                <!-- /BUTTON -->

                <!-- BUTTON -->
                <a class="button small twitch" href="https://www.twitch.tv/" target="_blank">Visit Channel</a>
                <!-- /BUTTON -->
            </div>
            <!-- /STREAMER BOX INFO -->
        </div>
        <!-- /STREAMER BOX -->
    </div>
    <!-- /SECTION SLIDER ITEM -->
    @endif
    @foreach($marketCategories as $marketCategorie)
    <!-- SECTION SLIDER ITEM -->
    <div class="sections-slider-item">
        <!-- PRODUCT CATEGORY BOX -->
        <a class="product-category-box category-all category" href="{{route('getMarketplaceCategorie', ['categorie' => $marketCategorie->slag])}}" style=" background: url({{$marketCategorie->cover}}) no-repeat 100% 0,linear-gradient(90deg,{{$marketCategorie->gradient_from}},{{$marketCategorie->gradient_to}});">
            <!-- PRODUCT CATEGORY BOX TITLE -->
            <p class="product-category-box-title">{{$marketCategorie->name}}</p>
            <!-- /PRODUCT CATEGORY BOX TITLE -->

            <!-- PRODUCT CATEGORY BOX TEXT -->
            <p class="product-category-box-text">{{$marketCategorie->description}}</p>
            <!-- /PRODUCT CATEGORY BOX TEXT -->

            <!-- PRODUCT CATEGORY BOX TAG -->
            <p class="product-category-box-tag">{{$marketCategorie->posts.' items'}}</p>
            <!-- /PRODUCT CATEGORY BOX TAG -->
        </a>
        <!-- /PRODUCT CATEGORY BOX -->
    </div>
    <!-- /SECTION SLIDER ITEM -->
    @endforeach
</div>
<!-- /SECTION SLIDER -->

    @if(false)
    <!-- GRID -->
    <div class="grid grid-3-3-3-3 centered">
        @foreach($marketCategories as $marketCategorie)
        <!-- PRODUCT CATEGORY BOX -->
        <a class="product-category-box category-all category" href="{{route('getMarketplaceCategorie', ['categorie' => $marketCategorie->slag])}}" style=" background: url({{$marketCategorie->cover}}) no-repeat 100% 0,linear-gradient(90deg,{{$marketCategorie->gradient_from}},{{$marketCategorie->gradient_to}});">
            <!-- PRODUCT CATEGORY BOX TITLE -->
            <p class="product-category-box-title">{{$marketCategorie->name}}</p>
            <!-- /PRODUCT CATEGORY BOX TITLE -->

            <!-- PRODUCT CATEGORY BOX TEXT -->
            <p class="product-category-box-text">{{$marketCategorie->description}}</p>
            <!-- /PRODUCT CATEGORY BOX TEXT -->

            <!-- PRODUCT CATEGORY BOX TAG -->
            <p class="product-category-box-tag">{{$marketCategorie->posts.' items'}}</p>
            <!-- /PRODUCT CATEGORY BOX TAG -->
        </a>
        <!-- /PRODUCT CATEGORY BOX -->
        @endforeach
    </div>
    <!-- /GRID -->
    @endif

@if(count($latestItems)>0)
    <!-- SECTION HEADER -->
    <div class="section-header">
        <!-- SECTION HEADER INFO -->
        <div class="section-header-info">
            <!-- SECTION PRETITLE -->
            <p class="section-pretitle">See what's new!</p>
            <!-- /SECTION PRETITLE -->

            <!-- SECTION TITLE -->
            <h2 class="section-title">Latest Items</h2>
            <!-- /SECTION TITLE -->
        </div>
        <!-- /SECTION HEADER INFO -->

        <!-- SECTION HEADER ACTIONS -->
        <div class="section-header-actions">
            <!-- SECTION HEADER ACTION -->
            <a class="section-header-action" href="{{route('getMarketplaceCategorie', ['categorie' => 'all'])}}">Browse All Latest</a>
            <!-- /SECTION HEADER ACTION -->
        </div>
        <!-- /SECTION HEADER ACTIONS -->
    </div>
    <!-- /SECTION HEADER -->

    <!-- GRID -->
    <div class="grid grid-3-3-3-3 centered marketplace-grid">
        @foreach($latestItems as $item)
        <!-- PRODUCT PREVIEW -->
        <div class="product-preview">
            <!-- PRODUCT PREVIEW IMAGE -->
            <a href="{{route('getMarketplaceItem', ['categorie' => $item->model->slag, 'item' => $item->key])}}">
                <figure class="product-preview-image liquid">
                    <img src="{{$item->images[0]->src ?? ""}}">
                </figure>
            </a>
            <!-- /PRODUCT PREVIEW IMAGE -->

            <!-- PRODUCT PREVIEW INFO -->
            <div class="product-preview-info">
                <!-- TEXT STICKER -->
                <p class="text-sticker"><span class="highlighted">$</span> {{$item->price}}</p>
                <!-- /TEXT STICKER -->

                <!-- PRODUCT PREVIEW TITLE -->
                <p class="product-preview-title"><a href="{{route('getMarketplaceItem', ['categorie' => $item->model->slag, 'item' => $item->key])}}">{{$item->title}}</a></p>
                <!-- /PRODUCT PREVIEW TITLE -->

                <!-- PRODUCT PREVIEW CATEGORY -->
                <p class="product-preview-category digital"><a href="{{route('getMarketplaceCategorie', ['categorie' => $item->model->slag])}}">{{$item->model->name}}</a></p>
                <!-- /PRODUCT PREVIEW CATEGORY -->
            </div>
            <!-- /PRODUCT PREVIEW INFO -->

            <!-- PRODUCT PREVIEW META -->
            <div class="product-preview-meta">
                <!-- PRODUCT PREVIEW AUTHOR -->
                <div class="product-preview-author">
                    <!-- PRODUCT PREVIEW AUTHOR IMAGE -->
                    <a class="product-preview-author-image user-avatar micro no-border" href="{{route('userPublicProfileGet', ['user' => $item->user->username])}}">
                        <!-- USER AVATAR CONTENT -->
                        <div class="user-avatar-content">
                            <!-- HEXAGON -->
                            <div class="hexagon-image-18-20" data-src="{{$item->user->avatar ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                            <!-- /HEXAGON -->
                        </div>
                        <!-- /USER AVATAR CONTENT -->
                    </a>
                    <!-- /PRODUCT PREVIEW AUTHOR IMAGE -->

                    <!-- PRODUCT PREVIEW AUTHOR TITLE -->
                    <p class="product-preview-author-title">Posted By</p>
                    <!-- /PRODUCT PREVIEW AUTHOR TITLE -->

                    <!-- PRODUCT PREVIEW AUTHOR TEXT -->
                    <p class="product-preview-author-text"><a href="{{route('userPublicProfileGet', ['user' => $item->user->username])}}">{{$item->user->full_name}}</a></p>
                    <!-- /PRODUCT PREVIEW AUTHOR TEXT -->
                </div>
                <!-- /PRODUCT PREVIEW AUTHOR -->

            </div>
            <!-- /PRODUCT PREVIEW META -->
        </div>
        <!-- /PRODUCT PREVIEW -->
        @endforeach
    </div>
    <!-- /GRID -->
@endif
@endsection

@section('stylesheets')
<style>
    @media screen and (max-width: 680px) {
        /*.content-grid {
            width: 95%;
            padding: 0px 0 200px;
        }*/
        .grid {
            grid-template-columns: 100% !important;
        }
        .user-preview {
            width: 100%;
        }
        .section-action-button{
            margin-top: 0px !important;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    console.log("screen.width: "+screen.width);
    const screenWidth = screen.width;
    if(screenWidth>825){
    app.plugins.createSlider({
        container: '#marketplace-categories-slider',
        gutter: 40,
        items: 4,
        nav: false,
        loop: true,
        mouseDrag: true,
        controlsContainer: '#marketplace-categories-slider-controls'
    });
    }
    else{
        app.plugins.createSlider({
            container: '#marketplace-categories-slider',
            gutter: 20,
            items: 2,
            nav: false,
            loop: true,
            controlsContainer: '#marketplace-categories-slider-controls'
        });
    }
</script>
@endsection


