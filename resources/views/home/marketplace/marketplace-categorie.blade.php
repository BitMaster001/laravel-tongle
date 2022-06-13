@extends('layouts.app')

@section('title')
Marketplace
@endsection

@section('content')
    <!-- SECTION BANNER -->
    <div class="section-banner section-banner-2">
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
        <p class="section-pretitle">Browse Products</p>
        <!-- /SECTION PRETITLE -->

        <!-- SECTION TITLE -->
        <h2 class="section-title">{{$categorie->name}}</h2>
        <!-- /SECTION TITLE -->
    </div>
    <!-- /SECTION HEADER INFO -->

    <!-- SECTION HEADER ACTIONS -->
    <div class="section-header-actions">
        <!-- SECTION HEADER SUBSECTION -->
        <a class="section-header-subsection" href="{{route('getMarketplace')}}">Marketplace</a>
        <!-- /SECTION HEADER SUBSECTION -->

        <!-- SECTION HEADER SUBSECTION -->
        <p class="section-header-subsection">{{$categorie->name}}</p>
        <!-- /SECTION HEADER SUBSECTION -->
    </div>
    <!-- /SECTION HEADER ACTIONS -->
</div>
<!-- /SECTION HEADER -->

<!-- SECTION FILTERS BAR -->
<div class="section-filters-bar v4">
    <!-- SECTION FILTERS BAR ACTIONS -->
    <div class="section-filters-bar-actions" style="width: 100%;">
        <!-- FORM -->
        <form class="form">
            <!-- FORM ROW -->
            <div class="form-row split">
                <!-- FORM ITEM -->
                <div class="form-item">
                    <!-- FORM INPUT -->
                    <div class="form-input small">
                        <label for="items-search">Search Items</label>
                        <input type="text" name="q" value="{{request()->get('q') ?? ''}}">
                    </div>
                    <!-- /FORM INPUT -->
                </div>
                    <!-- /FORM ITEM -->

                <!-- FORM ITEM -->
                <div class="form-item">
                    <!-- FORM INPUT -->
                    <div class="form-input small active always-active currency-decorated">
                        <label for="price-from">From</label>
                        <input type="text" name="from" value="{{request()->get('from') ?? ''}}">
                    </div>
                    <!-- /FORM INPUT -->
                </div>
                <!-- /FORM ITEM -->

                <!-- FORM ITEM -->
                <div class="form-item">
                    <!-- FORM INPUT -->
                    <div class="form-input small active always-active currency-decorated">
                        <label for="price-to">To</label>
                        <input type="text" name="to" value="{{request()->get('to') ?? ''}}">
                    </div>
                    <!-- /FORM INPUT -->
                </div>
                <!-- /FORM ITEM -->

                <!-- FORM ITEM -->
                <div class="form-item">
                <!-- FORM INPUT -->
                <div class="form-input">
                <!-- FORM SELECT -->
                <div class="form-select small">
                    <label for="items-filter">Filter By</label>
                    <select id="items-filter" name="items-filter">
                        <option value="0" @if(request()->get('items-filter') == 0) selected @endif>Time newly listed</option>
                        <option value="1" @if(request()->get('items-filter') == 1) selected @endif>Time oldly listed</option>
                        <option value="2" @if(request()->get('items-filter') == 2) selected @endif>Lowest price</option>
                        <option value="3" @if(request()->get('items-filter') == 3) selected @endif>Highest price</option>
                    </select>
                    <!-- FORM SELECT ICON -->
                    <svg class="form-select-icon icon-small-arrow">
                        <use xlink:href="#svg-small-arrow"></use>
                    </svg>
                    <!-- /FORM SELECT ICON -->
                </div>
                <!-- /FORM SELECT -->
                </div>
                <!-- /FORM INPUT -->
                </div>
                <!-- /FORM ITEM -->

                <!-- FORM ITEM -->
                <div class="form-item">
                <!-- BUTTON -->
                <button class="button primary">
                    <!-- ICON MAGNIFYING GLASS -->
                    <svg class="icon-magnifying-glass">
                        <use xlink:href="#svg-magnifying-glass"></use>
                    </svg>
                    <!-- /ICON MAGNIFYING GLASS -->
                </button>
                <!-- /BUTTON -->
                </div>
                <!-- /FORM ITEM -->

            </div>
            <!-- /FORM ROW -->
        </form>
        <!-- /FORM -->

    </div>
</div>
<!-- /SECTION FILTERS BAR -->

<!-- GRID -->
<div class="grid grid-3-9 small-space">
    <!-- MARKETPLACE SIDEBAR -->
    <div class="marketplace-sidebar">
        <!-- SIDEBAR BOX -->
        <div class="sidebar-box">
            <!-- SIDEBAR BOX TITLE -->
            <p class="sidebar-box-title">Categories</p>
            <!-- /SIDEBAR BOX TITLE -->

            <!-- SIDEBAR BOX ITEMS -->
            <div class="sidebar-box-items">
                @if(false)
                <!-- CHECKBOX LINE -->
                <div class="checkbox-line">
                    <!-- CHECKBOX WRAP -->
                    <div class="checkbox-wrap">
                        <input type="checkbox" id="category-psd" name="category_psd">
                        <!-- CHECKBOX BOX -->
                        <div class="checkbox-box">
                            <!-- ICON CROSS -->
                            <svg class="icon-cross">
                                <use xlink:href="#svg-cross"></use>
                            </svg>
                            <!-- /ICON CROSS -->
                        </div>
                        <!-- /CHECKBOX BOX -->
                        <label for="category-psd">PSD Templates</label>
                    </div>
                    <!-- /CHECKBOX WRAP -->

                    <!-- CHECKBOX LINE TEXT -->
                    <p class="checkbox-line-text">134</p>
                    <!-- /CHECKBOX LINE TEXT -->
                </div>
                <!-- /CHECKBOX LINE -->

                <!-- CHECKBOX LINE -->
                <div class="checkbox-line">
                    <!-- CHECKBOX WRAP -->
                    <div class="checkbox-wrap">
                        <input type="checkbox" id="category-html" name="category_html" checked>
                        <!-- CHECKBOX BOX -->
                        <div class="checkbox-box">
                            <!-- ICON CROSS -->
                            <svg class="icon-cross">
                                <use xlink:href="#svg-cross"></use>
                            </svg>
                            <!-- /ICON CROSS -->
                        </div>
                        <!-- /CHECKBOX BOX -->
                        <label for="category-html">HTML Templates</label>
                    </div>
                    <!-- /CHECKBOX WRAP -->

                    <!-- CHECKBOX LINE TEXT -->
                    <p class="checkbox-line-text">566</p>
                    <!-- /CHECKBOX LINE TEXT -->
                </div>
                <!-- /CHECKBOX LINE -->
                @endif

                @foreach($marketCategories as $marketCategorie)
                <!-- CHECKBOX LINE -->
                <div class="checkbox-line">
                    <!-- CHECKBOX WRAP -->
                    <div class="checkbox-wrap">
                        <input type="checkbox" id="{{$marketCategorie->slag}}" name="marketplace-categorie" data-slag="{{$marketCategorie->slag}}" @if($marketCategorie == $categorie) checked @endif>
                        <!-- CHECKBOX BOX -->
                        <div class="checkbox-box">
                            <!-- ICON CROSS -->
                            <svg class="icon-cross">
                                <use xlink:href="#svg-cross"></use>
                            </svg>
                            <!-- /ICON CROSS -->
                        </div>
                        <!-- /CHECKBOX BOX -->
                        <label for="category-psd">{{$marketCategorie->name}}</label>
                    </div>
                    <!-- /CHECKBOX WRAP -->

                    <!-- CHECKBOX LINE TEXT -->
                    <p class="checkbox-line-text">{{$marketCategorie->posts}}</p>
                    <!-- /CHECKBOX LINE TEXT -->
                </div>
                <!-- /CHECKBOX LINE -->
                @endforeach


            </div>
            <!-- /SIDEBAR BOX ITEMS -->

            @if(false)
            <!-- SIDEBAR BOX TITLE -->
            <p class="sidebar-box-title">Price Range</p>
            <!-- /SIDEBAR BOX TITLE -->

            <!-- SIDEBAR BOX ITEMS -->
            <div class="sidebar-box-items small-space">
                <!-- FORM ITEM -->
                <div class="form-item split">
                    <!-- FORM INPUT -->
                    <div class="form-input active always-active currency-decorated">
                        <label for="price-from">From</label>
                        <input type="text" id="price-from" name="price_from">
                    </div>
                    <!-- /FORM INPUT -->

                    <!-- FORM INPUT -->
                    <div class="form-input active always-active currency-decorated">
                        <label for="price-to">To</label>
                        <input type="text" id="price-to" name="price_to">
                    </div>
                    <!-- /FORM INPUT -->
                </div>
                <!-- /FORM ITEM -->
            </div>
            <!-- /SIDEBAR BOX ITEMS -->

            <!-- BUTTON -->
            <p class="button small primary">Apply Filters</p>
            <!-- /BUTTON -->
            @endif
        </div>
        <!-- /SIDEBAR BOX -->
    </div>
    <!-- /MARKETPLACE SIDEBAR -->

    <!-- MARKETPLACE CONTENT -->
    <div class="marketplace-content">
        <!-- GRID -->
        <div class="grid grid-3-3-3-3 centered marketplace-grid">
            @if(count($items) > 0)
            @foreach($items as $item)
            <!-- PRODUCT PREVIEW -->
            <div class="product-preview">
                <!-- PRODUCT PREVIEW IMAGE -->
                <a href="{{route('getMarketplaceItem', ['categorie' => $item->model->slag, 'item' => $item->key])}}">
                    <figure class="product-preview-image liquid">
                        <img src="{{$item->images[0]->src ?? ''}}">
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
            @else
            <p>No Items.</p>
            @endif

        </div>
        <!-- /GRID -->
        @if(false)
        <!-- SECTION PAGER BAR WRAP -->
        <div class="section-pager-bar-wrap align-right">
            <!-- SECTION PAGER BAR -->
            <div class="section-pager-bar">
                <!-- SECTION PAGER -->
                <div class="section-pager">
                    <!-- SECTION PAGER ITEM -->
                    <div class="section-pager-item active">
                        <!-- SECTION PAGER ITEM TEXT -->
                        <p class="section-pager-item-text">01</p>
                        <!-- /SECTION PAGER ITEM TEXT -->
                    </div>
                    <!-- /SECTION PAGER ITEM -->

                    <!-- SECTION PAGER ITEM -->
                    <div class="section-pager-item">
                        <!-- SECTION PAGER ITEM TEXT -->
                        <p class="section-pager-item-text">02</p>
                        <!-- /SECTION PAGER ITEM TEXT -->
                    </div>
                    <!-- /SECTION PAGER ITEM -->

                </div>
                <!-- /SECTION PAGER -->

                <!-- SECTION PAGER CONTROLS -->
                <div class="section-pager-controls">
                    <!-- SLIDER CONTROL -->
                    <div class="slider-control left disabled">
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
                <!-- /SECTION PAGER CONTROLS -->
            </div>
            <!-- /SECTION PAGER BAR -->
        </div>
        <!-- /SECTION PAGER BAR WRAP -->
        @endif

    </div>
    <!-- /MARKETPLACE CONTENT -->
</div>
<!-- /GRID -->
@endsection

@section('stylesheets')

@endsection

@section('scripts')
<!-- categorie js -->
<script src="/assets/js/pages/home/marketplace/categorie.js"></script>
@endsection


