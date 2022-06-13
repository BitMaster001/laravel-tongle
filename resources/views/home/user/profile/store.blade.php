@extends('layouts.app')

@section('title')
{{$user->username}}
@endsection

@php
$items = $user->items();
@endphp

@section('content')
<!-- PROFILE HEADER -->
@include('home.user.profile.partial.profile-header')
<!-- /PROFILE HEADER -->

<!-- SECTION NAVIGATION -->
@include('home.user.profile.partial.profile-navigation')
<!-- /SECTION NAVIGATION -->

<!-- SECTION -->
<section class="section">
    <!-- SECTION HEADER -->
    <div class="section-header">
        <!-- SECTION HEADER INFO -->
        <div class="section-header-info">
            <!-- SECTION PRETITLE -->
            <p class="section-pretitle">Browse {{$user->full_name}}</p>
            <!-- /SECTION PRETITLE -->

            <!-- SECTION TITLE -->
            <h2 class="section-title">Item Store <span class="highlighted">{{count($items)}}</span></h2>
            <!-- /SECTION TITLE -->
        </div>
        <!-- /SECTION HEADER INFO -->
    </div>
    <!-- /SECTION HEADER -->

    @if(count($items) > 0)
    <!-- GRID -->
    <div class="grid grid-3-3-3-3 centered">
        @foreach($items as $item)
        <!-- PRODUCT PREVIEW -->
        <div class="product-preview">
            <!-- PRODUCT PREVIEW IMAGE -->
            <a href="{{route('getMarketplaceItem', ['categorie' => $item->model->slag, 'item' => $item->key])}}">
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
                <p class="product-preview-title"><a href="{{route('getMarketplaceItem', ['categorie' => $item->model->slag, 'item' => $item->key])}}">{{$item->title}}</a></p>
                <!-- /PRODUCT PREVIEW TITLE -->

                <!-- PRODUCT PREVIEW CATEGORY -->
                <p class="product-preview-category digital"><a href="#">{{$item->model->name}}</a></p>
                <!-- /PRODUCT PREVIEW CATEGORY -->
            </div>
            <!-- /PRODUCT PREVIEW INFO -->
        </div>
        <!-- /PRODUCT PREVIEW -->
        @endforeach
    </div>
    <!-- /GRID -->
    @else
    <br>
    <p>No Items for sell.</p>
    @endif


</section>
<!-- /SECTION -->

@endsection

@section('stylesheets')
@endsection

@section('scripts')
@endsection
