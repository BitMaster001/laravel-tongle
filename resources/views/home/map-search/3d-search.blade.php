@extends('layouts.app')

@section('title')
3D Map Search
@endsection

@section('content')
    <!-- SECTION BANNER -->
    <div class="section-banner 3D-Map-Search section-banner-3">
        <!-- SECTION BANNER ICON -->
        <img class="section-banner-icon" src="/assets/img/banner/marketplace-icon.png" alt="marketplace-icon">
        <!-- /SECTION BANNER ICON -->

        <!-- SECTION BANNER TITLE -->
        <p class="section-banner-title">3D Map Search</p>
        <!-- /SECTION BANNER TITLE -->

        <!-- SECTION BANNER TEXT -->
        <p class="section-banner-text">The best place for the community to buy and sell!</p>
        <!-- /SECTION BANNER TEXT -->
    </div>
    <!-- /SECTION BANNER -->



    <!-- SECTION HEADER -->
    <div class="section-header" style="margin-top: 0px;">


        <!-- SECTION HEADER ACTIONS -->

        <!-- /SECTION HEADER ACTIONS -->
    </div>
    <!-- /SECTION HEADER -->


    <div class="btnTopMobile button primary d-block d-lg-none" style="cursor:pointer" onclick="openNav()">
        <svg width="25px" height="25px" viewBox="-4 0 393 393.99003" width="393pt" xmlns="http://www.w3.org/2000/svg"><path d="m368.3125 0h-351.261719c-6.195312-.0117188-11.875 3.449219-14.707031 8.960938-2.871094 5.585937-2.3671875 12.3125 1.300781 17.414062l128.6875 181.28125c.042969.0625.089844.121094.132813.183594 4.675781 6.3125 7.203125 13.957031 7.21875 21.816406v147.796875c-.027344 4.378906 1.691406 8.582031 4.777344 11.6875 3.085937 3.105469 7.28125 4.847656 11.65625 4.847656 2.226562 0 4.425781-.445312 6.480468-1.296875l72.3125-27.574218c6.480469-1.976563 10.78125-8.089844 10.78125-15.453126v-120.007812c.011719-7.855469 2.542969-15.503906 7.214844-21.816406.042969-.0625.089844-.121094.132812-.183594l128.683594-181.289062c3.667969-5.097657 4.171875-11.820313 1.300782-17.40625-2.832032-5.511719-8.511719-8.9726568-14.710938-8.960938zm-131.53125 195.992188c-7.1875 9.753906-11.074219 21.546874-11.097656 33.664062v117.578125l-66 25.164063v-142.742188c-.023438-12.117188-3.910156-23.910156-11.101563-33.664062l-124.933593-175.992188h338.070312zm0 0"/></svg>
    </div>

    <div id="mySidenav" class="jntsidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <form class="form byLocation">
            <!-- FORM ROW -->
            <div class="form-row">
                <!-- FORM ITEM -->
                <div class="form-item">
                    <!-- FORM INPUT -->
                    <div class="form-input small">
                        <label for="map-input">Search Location</label>
                        <input id="map-input1" class="map-input" placeholder="" type="text" name="location" value="{{request()->get('location') ?? auth()->user()->loc_address}}">
                    </div>
                    <!-- /FORM INPUT -->
                </div>
                <input type="hidden" name="lat" class="loc_lat" value="{{ request()->get('lat') ?? $lat }}" />
                <input type="hidden" name="lng" class="loc_lng" value="{{ request()->get('lng') ?? $lng }}" />
                <!-- /FORM ITEM -->


                <div class="form-item">
                    <!-- FORM INPUT -->
                    <div class="form-input">
                        <!-- FORM SELECT -->
                        <div class="form-select small">
                            <label for="items-filter">Radius</label>
                            <select id="items-filter" name="radius">
                                <option value="5" @if(request()->get('radius') == 5) selected @endif>5 KM</option>
                                <option value="10" @if(request()->get('radius') == 10) selected @endif>10 KM</option>
                                <option value="20" @if(request()->get('radius') == 20) selected @endif>20 KM</option>
                                <option value="30" @if(request()->get('radius') == 30) selected @endif>30 KM</option>
                                <option value="50" @if(request()->get('radius') == 50) selected @endif>50 KM</option>
                                <option value="75" @if(request()->get('radius') == 75) selected @endif>75 KM</option>
                                <option value="100" @if(request()->get('radius') == 100) selected @endif>100 KM</option>
                                <option value="200" @if(request()->get('radius') == 200) selected @endif>200 KM</option>
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

                <div class="form-item">
                    <!-- FORM INPUT -->
                    <div class="form-input">
                        <!-- FORM SELECT -->
                        <div class="form-select small">
                            <label for="map-search-type">Search For</label>
                            <select class="map-search-type" id="map-search-type-1" name="search-for">
                                <option value="0" @if(request()->get('search-for') == 0) selected @endif>Users</option>
                                <option value="1" @if(request()->get('search-for') == 1) selected @endif>Marketplaces</option>
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
            </div>
            <!-- /FORM ROW -->

            <!-- FORM ROW -->
            <div class="form-row mt-0 marketplace-filters {{ request()->get('search-for') != 1 ? 'd-none' : '' }}">
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
                            <label for="category-filter">Category By</label>
                            <select id="category-filter" name="category">
                                @foreach($marketCategories as $key => $category)
                                    <option value="{{ $category->slag }}" @if(request()->get('category') == $category->slag) selected @endif>{{ $category->name }}</option>
                                @endforeach
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

            </div>


            <div class="form-row">
                <div class="form-item">
                    <button title="My Location" class="button primary defaultLatLng" data-lat="{{ $defaultLatLn['lat'] }}" data-lng="{{ $defaultLatLn['lng'] }}">
                        <!-- ICON MAGNIFYING GLASS -->
                        <svg width="25px" height="25px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <g> <g> <path d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035 c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,469.729 c-55.847-66.338-152.035-197.217-152.035-284.301c0-83.834,68.202-152.036,152.035-152.036s152.035,68.202,152.035,152.035 C408.034,272.515,311.861,403.37,256,469.729z"/> </g> </g> <g> <g> <path d="M256,92.134c-51.442,0-93.292,41.851-93.292,93.293s41.851,93.293,93.292,93.293s93.291-41.851,93.291-93.293 S307.441,92.134,256,92.134z M256,245.328c-33.03,0-59.9-26.871-59.9-59.901s26.871-59.901,59.9-59.901s59.9,26.871,59.9,59.901 S289.029,245.328,256,245.328z"/> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
                        <!-- /ICON MAGNIFYING GLASS -->
                    </button>
                </div>
            </div>

            <div class="form-row">
                <!-- FORM ITEM -->
                <div class="form-item">
                    <!-- BUTTON -->
                    <button class="button primary w-100">
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
    </div>

    <!-- SECTION FILTERS BAR -->
    <div class="search-map-filters section-filters-bar v4 d-none d-md-block">
        <!-- SECTION FILTERS BAR ACTIONS -->

        <div class="section-filters-bar-actions" style="width: 100%;">
            <!-- FORM -->
            <form class="form byLocation">
                <!-- FORM ROW -->
                <div class="form-row split">
                    <!-- FORM ITEM -->
                    <div class="form-item">
                        <!-- FORM INPUT -->
                        <div class="form-input small">
                            <label for="map-input">Search Location</label>
                            <input id="map-input2" class="map-input" placeholder="" type="text" name="location" value="{{request()->get('location') ?? auth()->user()->loc_address}}">
                        </div>
                        <!-- /FORM INPUT -->
                    </div>
                    <input type="hidden" name="lat" class="loc_lat" value="{{ request()->get('lat') ?? $lat }}" />
                    <input type="hidden" name="lng" class="loc_lng" value="{{ request()->get('lng') ?? $lng }}" />
                    <!-- /FORM ITEM -->


                    <div class="form-item">
                        <!-- FORM INPUT -->
                        <div class="form-input">
                            <!-- FORM SELECT -->
                            <div class="form-select small">
                                <label for="items-filter">Radius</label>
                                <select id="items-filter" name="radius">
                                    <option value="5" @if(request()->get('radius') == 5) selected @endif>5 KM</option>
                                    <option value="10" @if(request()->get('radius') == 10) selected @endif>10 KM</option>
                                    <option value="20" @if(request()->get('radius') == 20) selected @endif>20 KM</option>
                                    <option value="30" @if(request()->get('radius') == 30) selected @endif>30 KM</option>
                                    <option value="50" @if(request()->get('radius') == 50) selected @endif>50 KM</option>
                                    <option value="75" @if(request()->get('radius') == 75) selected @endif>75 KM</option>
                                    <option value="100" @if(request()->get('radius') == 100) selected @endif>100 KM</option>
                                    <option value="200" @if(request()->get('radius') == 200) selected @endif>200 KM</option>
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

                    <div class="form-item">
                        <!-- FORM INPUT -->
                        <div class="form-input">
                            <!-- FORM SELECT -->
                            <div class="form-select small">
                                <label for="map-search-type">Search For</label>
                                <select class="map-search-type" id="map-search-type-2" name="search-for">
                                    <option value="0" @if(request()->get('search-for') == 0) selected @endif>Users</option>
                                    <option value="1" @if(request()->get('search-for') == 1) selected @endif>Marketplaces</option>
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

                    <div class="form-item">
                        <button title="My Location" class="button primary defaultLatLng" data-lat="{{ $defaultLatLn['lat'] }}" data-lng="{{ $defaultLatLn['lng'] }}">
                            <!-- ICON MAGNIFYING GLASS -->
                            <svg width="25px" height="25px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <g> <g> <path d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035 c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,469.729 c-55.847-66.338-152.035-197.217-152.035-284.301c0-83.834,68.202-152.036,152.035-152.036s152.035,68.202,152.035,152.035 C408.034,272.515,311.861,403.37,256,469.729z"/> </g> </g> <g> <g> <path d="M256,92.134c-51.442,0-93.292,41.851-93.292,93.293s41.851,93.293,93.292,93.293s93.291-41.851,93.291-93.293 S307.441,92.134,256,92.134z M256,245.328c-33.03,0-59.9-26.871-59.9-59.901s26.871-59.901,59.9-59.901s59.9,26.871,59.9,59.901 S289.029,245.328,256,245.328z"/> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
                            <!-- /ICON MAGNIFYING GLASS -->
                        </button>
                    </div>

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

                <!-- FORM ROW -->
                <div class="form-row marketplace-filters {{ request()->get('search-for') != 1 ? 'd-none' : '' }} split">
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
                                <label for="category-filter">Category By</label>
                                <select id="category-filter" name="category">
                                    @foreach($marketCategories as $key => $category)
                                    <option value="{{ $category->slag }}" @if(request()->get('category') == $category->slag) selected @endif>{{ $category->name }}</option>
                                    @endforeach
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

                </div>
                <!-- /FORM ROW -->
            </form>
            <!-- /FORM -->

        </div>
    </div>
    <!-- /SECTION FILTERS BAR -->

    <div class="section-3d-map">
        <div style="position: relative">
            <div id="map" style="height: 600px"></div>
        </div>
    </div>



    @if(false)
    <!-- GRID -->
    <div class="grid grid-3-3-3-3">
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

    @if(count($marketPlaces)>0)
        <!-- GRID -->
        <div class="grid grid-3-3-3-3 marketplace-grid">
            @foreach($marketPlaces as $item)
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
    @else
        @if(request()->get('search-for') == 1)
        <br>
        <p>No Market Places near your search.</p>
        @endif
    @endif


    @if(count($users) > 0)
        <!-- GRID -->
        <div class="grid grid-3-3-3-3">
        @foreach($users as $member)
            <!-- USER PREVIEW -->
                <div class="user-preview small">
                    <!-- USER PREVIEW COVER -->
                    <figure class="user-preview-cover liquid">
                        <img src="{{$member->cover ?? '/storage/default/user/profile/cover.jpg'}}" alt="cover">
                    </figure>
                    <!-- /USER PREVIEW COVER -->

                    <!-- USER PREVIEW INFO -->
                    <div class="user-preview-info">
                        <!-- USER SHORT DESCRIPTION -->
                        <div class="user-short-description small">
                            <!-- USER SHORT DESCRIPTION AVATAR -->
                            <a class="user-short-description-avatar user-avatar" href="{{route('userPublicProfileGet', ['user' => $member->username])}}">
                                <!-- USER AVATAR BORDER -->
                                <div class="user-avatar-border">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-100-110"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR BORDER -->

                                <!-- USER AVATAR CONTENT -->
                                <div class="user-avatar-content">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-image-68-74" data-src="{{$member->avatar ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR CONTENT -->

                                <!-- USER AVATAR PROGRESS -->
                                <div class="user-avatar-progress">
                                    <!-- HEXAGON -->
                                    @if($member->gender == "Male")
                                        <div class="hexagon-progress-84-92-male"></div>
                                    @elseif($member->gender == "Female")
                                        <div class="hexagon-progress-84-92-female"></div>
                                    @elseif($member->gender == "Other")
                                        <div class="hexagon-progress-84-92-other"></div>
                                    @else
                                        <div class="hexagon-progress-84-92"></div>
                                @endif
                                <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR PROGRESS -->

                                <!-- USER AVATAR PROGRESS BORDER -->
                                <div class="user-avatar-progress-border">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-border-84-92"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR PROGRESS BORDER -->

                            </a>
                            <!-- /USER SHORT DESCRIPTION AVATAR -->

                            <!-- USER SHORT DESCRIPTION TITLE -->
                            <p class="user-short-description-title"><a href="{{route('userPublicProfileGet', ['user' => $member->username])}}">{{$member->full_name}}</a></p>
                            <!-- /USER SHORT DESCRIPTION TITLE -->

                            <!-- USER SHORT DESCRIPTION TEXT -->
                            <p class="user-short-description-text"><a href="{{$member->website ?? '#'}}">{!!parse_url($member->website)['host'] ?? "&nbsp;"!!}</a></p>
                            <!-- /USER SHORT DESCRIPTION TEXT -->
                        </div>
                        <!-- /USER SHORT DESCRIPTION -->

                        <!-- USER STATS -->
                        <div class="user-stats">
                            <!-- USER STAT -->
                            <div class="user-stat">
                                <!-- USER STAT TITLE -->
                                <p class="user-stat-title">{{$member->posts < 1000 ? $member->posts : number_format($member->posts/1000,1)."K"}}</p>
                                <!-- /USER STAT TITLE -->

                                <!-- USER STAT TEXT -->
                                <p class="user-stat-text">posts</p>
                                <!-- /USER STAT TEXT -->
                            </div>
                            <!-- /USER STAT -->

                            <!-- USER STAT -->
                            <div class="user-stat">
                                <!-- USER STAT TITLE -->
                                <p class="user-stat-title">{{$member->friends < 1000 ? $member->friends : number_format($member->friends/1000,1)."K"}}</p>
                                <!-- /USER STAT TITLE -->

                                <!-- USER STAT TEXT -->
                                <p class="user-stat-text">friends</p>
                                <!-- /USER STAT TEXT -->
                            </div>
                            <!-- /USER STAT -->

                            <!-- USER STAT -->
                            <div class="user-stat">
                                <!-- USER STAT TITLE -->
                                <p class="user-stat-title">{{$member->visits < 1000 ? $member->visits : number_format($member->visits/1000,1)."K"}}</p>
                                <!-- /USER STAT TITLE -->

                                <!-- USER STAT TEXT -->
                                <p class="user-stat-text">visits</p>
                                <!-- /USER STAT TEXT -->
                            </div>
                            <!-- /USER STAT -->
                        </div>
                        <!-- /USER STATS -->

                        <!-- SOCIAL LINKS -->
                    @include('home.user.profile.partial.widgets.friends-social', ['user' => $member])
                    <!-- /SOCIAL LINKS -->
                    </div>
                    <!-- /USER PREVIEW INFO -->

                    <!-- USER PREVIEW FOOTER -->
                    <div class="user-preview-footer">
                        <!-- USER PREVIEW FOOTER ACTION -->
                        <div class="user-preview-footer-action">
                            <!-- BUTTON -->
                            <a href="{{route('userPublicProfileGet', ['user' => $member->username])}}" class="button void void-secondary">
                                <!-- BUTTON ICON -->
                                <svg class="button-icon icon-members">
                                    <use xlink:href="#svg-members"></use>
                                </svg>
                                <!-- /BUTTON ICON -->
                            </a>
                            <!-- /BUTTON -->
                        </div>
                        <!-- /USER PREVIEW FOOTER ACTION -->

                        <!-- USER PREVIEW FOOTER ACTION -->
                        <div class="user-preview-footer-action">
                            <!-- BUTTON -->
                            <p class="button void void-primary profile-friend-send-message" data-user="{{$member->username}}">
                                <!-- BUTTON ICON -->
                                <svg class="button-icon icon-comment">
                                    <use xlink:href="#svg-comment"></use>
                                </svg>
                                <!-- /BUTTON ICON -->
                            </p>
                            <!-- /BUTTON -->
                        </div>
                        <!-- /USER PREVIEW FOOTER ACTION -->
                    </div>
                    <!-- /USER PREVIEW FOOTER -->
                </div>
                <!-- /USER PREVIEW -->
            @endforeach
        </div>
        <!-- /GRID -->
    @else
        @if(request()->get('search-for') == 0)
        <br>
        <p>No User near your search.</p>
        @endif
    @endif


@endsection

@section('stylesheets')
<style>
    .section-3d-map{
        margin-top: 40px;
    }
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
    <!-- categorie js -->
    @if(count($users) > 0)
        <script>
            @foreach($users as $friend)
            app.plugins.createSlider({
                container: `#user-preview-social-links-slider-{{$friend->id}}`,
                items: 4,
                fixedWidth: 32,
                gutter: 8,
                loop: false,
                nav: false,
                controlsContainer: `#user-preview-social-links-slider-controls-{{$friend->id}}`
            });
            @endforeach
        </script>
    @endif
    <script src="https://cdn-webgl.wrld3d.com/wrldjs/dist/latest/wrld.js"></script>
    <script src="https://cdn-webgl.wrld3d.com/eegeojs/public/v2037/eeGeoWebGL.jgz"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.0.0/leaflet.markercluster-src.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.0.0/MarkerCluster.Default.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.0.0/MarkerCluster.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.1/leaflet.css" rel="stylesheet" />
    <link href="{{asset('assets/css/flag-icon.min.css')}}" rel="stylesheet" />
    <script>
        var marketplaces = {!! count($marketPlaces) > 0 ? $marketPlaces->toJson() : "[]" !!}
        var users = {!! count($users) > 0 ? $users->toJson() : "[]" !!}
        var lat_lng = {!! '[' . $lat .',' . $lng . ']' !!}
    </script>
    <script src="/assets/js/pages/home/map-search/3d-map.js"></script>
@endsection


