@extends('layouts.app')

@section('title')
Manage Store
@endsection

@section('content')
<dic class="form" method="post" action="{{route('settingsChangePasswordPost')}}">
    @csrf
    <!-- SECTION BANNER -->
    @include('home.user.profile.settings.partial.banner')
    <!-- /SECTION BANNER -->

    <!-- GRID -->
    <div class="grid grid-3-9 medium-space">
        <!-- GRID COLUMN -->
        @include('home.user.profile.settings.partial.sidebar')
        <!-- /GRID COLUMN -->

        <!-- GRID COLUMN -->
        <div class="account-hub-content">
            <!-- SECTION HEADER -->
            <div class="section-header">
                <!-- SECTION HEADER INFO -->
                <div class="section-header-info">
                    <!-- SECTION PRETITLE -->
                    <p class="section-pretitle">My Store</p>
                    <!-- /SECTION PRETITLE -->

                    <!-- SECTION TITLE -->
                    <h2 class="section-title">Manage Store</h2>
                    <!-- /SECTION TITLE -->
                </div>
                <!-- /SECTION HEADER INFO -->
            </div>
            <!-- /SECTION HEADER -->

            <!-- GRID -->
            <div class="grid grid-3-3-3 centered-on-mobile">
                <!-- CREATE ENTITY BOX -->
                <div class="create-entity-box v2">
                    <!-- CREATE ENTITY BOX COVER -->
                    <div class="create-entity-box-cover"></div>
                    <!-- /CREATE ENTITY BOX COVER -->

                    <!-- CREATE ENTITY BOX AVATAR -->
                    <div class="create-entity-box-avatar primary">
                        <!-- CREATE ENTITY BOX AVATAR ICON -->
                        <svg class="create-entity-box-avatar-icon icon-item">
                            <use xlink:href="#svg-item"></use>
                        </svg>
                        <!-- /CREATE ENTITY BOX AVATAR ICON -->
                    </div>
                    <!-- /CREATE ENTITY BOX AVATAR -->

                    <!-- CREATE ENTITY BOX INFO -->
                    <div class="create-entity-box-info">
                        <!-- CREATE ENTITY BOX TITLE -->
                        <p class="create-entity-box-title" style="text-align: center;">Sell Items On Marketplace</p>
                        <!-- /CREATE ENTITY BOX TITLE -->

                        <!-- BUTTON -->
                        <a class="button primary full popup-manage-item-trigger" href="{{route('settingsManageStoreNewGet')}}">Create New Item!</a>
                        <!-- /BUTTON -->
                    </div>
                    <!-- /CREATE ENTITY BOX INFO -->
                </div>
                <!-- /CREATE ENTITY BOX -->

                @php
                $items = Auth::user()->items();
                @endphp

                @if(count($items) > 0)
                @foreach($items as $item)
                <!-- PRODUCT PREVIEW -->
                <div class="product-preview fixed-height">
                    <!-- PRODUCT PREVIEW IMAGE -->
                    <a href="{{route('settingsManageStoreManageGet', ['item' => $item->key])}}">
                        <figure class="product-preview-image liquid">
                            <img src="{{$item->images[0]->src}}">
                        </figure>
                    </a>
                    <!-- /PRODUCT PREVIEW IMAGE -->

                    <!-- PRODUCT PREVIEW INFO -->
                    <div class="product-preview-info">
                        <!-- TEXT STICKER -->
                        <p class="text-sticker"><span class="highlighted">$</span> {{$item->price}}</p>
                        <!-- /TEXT STICKER -->

                        <!-- PRODUCT PREVIEW TITLE -->
                        <p class="product-preview-title"><a href="{{route('settingsManageStoreManageGet', ['item' => $item->key])}}">{{$item->title}}</a></p>
                        <!-- /PRODUCT PREVIEW TITLE -->

                        <!-- PRODUCT PREVIEW CATEGORY -->
                        <p class="product-preview-category digital"><a href="{{route('getMarketplaceCategorie', ['categorie' => $item->model->slag])}}">{{$item->model->name}}</a></p>
                        <!-- /PRODUCT PREVIEW CATEGORY -->

                        <!-- BUTTON -->
                        <a class="button white full popup-manage-item-trigger" href="{{route('settingsManageStoreManageGet', ['item' => $item->key])}}">Edit Item</a>
                        <!-- /BUTTON -->
                    </div>
                    <!-- /PRODUCT PREVIEW INFO -->
                </div>
                <!-- /PRODUCT PREVIEW -->
                @endforeach
                @endif
            </div>
            <!-- /GRID -->
        </div>
        <!-- /GRID COLUMN -->
    </div>
    <!-- /GRID -->
</dic>
@endsection

@section('stylesheets')
@endsection

@section('scripts')
<!-- global.accordions -->
<script src="/assets/js/global/global.accordions.js"></script>
@endsection
