@extends('layouts.app')

@section('title')
Manage Store
@endsection

@section('content')
<form class="form" method="post" action="{{route('settingsManageStoreEditPost')}}" enctype="multipart/form-data">
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
            <!-- GRID COLUMN -->
            <div class="account-hub-content">
                <!-- SECTION HEADER -->
                <div class="section-header">
                    <!-- SECTION HEADER INFO -->
                    <div class="section-header-info">
                        <!-- SECTION PRETITLE -->
                        <p class="section-pretitle">Store</p>
                        <!-- /SECTION PRETITLE -->

                        <!-- SECTION TITLE -->
                        <h2 class="section-title">{{$title}}</h2>
                        <!-- /SECTION TITLE -->
                    </div>
                    <!-- /SECTION HEADER INFO -->
                    @if($post->id)
                    <!-- SECTION HEADER ACTIONS -->
                    <div class="section-header-actions">
                        <!-- SECTION HEADER ACTION -->
                        <a href="{{route('getMarketplaceItem', ['categorie' => $post->model->slag, 'item' => $post->key])}}" class="section-header-action">See Item</a>
                        <!-- /SECTION HEADER ACTION -->

                        <!-- SECTION HEADER ACTION -->
                        <a href="{{route('getMarketplace')}}" class="section-header-action">Marketplace</a>
                        <!-- /SECTION HEADER ACTION -->
                    </div>
                    <!-- /SECTION HEADER ACTIONS -->
                    @endif
                </div>
                <!-- /SECTION HEADER -->

                <!-- GRID COLUMN -->
                <div class="grid-column">
                    <!-- WIDGET BOX -->
                    <div class="widget-box">
                        <!-- WIDGET BOX TITLE -->
                        <p class="widget-box-title">About Your Item</p>
                        <!-- /WIDGET BOX TITLE -->
                        <input hidden name="id" value="{{$post->id ?? 0}}">
                        <!-- WIDGET BOX CONTENT -->
                        <div class="widget-box-content">
                            <!-- FORM ROW -->
                            <div class="form-row split">
                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small">
                                        <label for="title">Title</label>
                                        <input class="@error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title') ?? $post->title ?? ''}}">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->

                            </div>
                            <!-- /FORM ROW -->

                            <!-- FORM ROW -->
                            <div class="form-row split">

                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small">
                                        <label for="price">Price in $</label>
                                        <input class="@error('price') is-invalid @enderror" type="text" id="price" name="price" value="{{old('price') ?? $post->price ?? 0}}">
                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->

                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM SELECT -->
                                    <div class="form-select small">
                                        <label for="type">Type</label>
                                        <select class="@error('type') is-invalid @enderror" id="type" name="type">
                                            <!--<option value="Public"{{$post->type == 'Public' ? ' selected' : ''}}>Public</option>-->
                                            <option value="">Select you item type</option>
                                            @foreach($groupshipsApproved as $groupshipApproved)
                                                @if($groupshipApproved->slag != 'all')
                                                    <option value="{{$groupshipApproved->slag}}" @if($post->id > 0 && $groupshipApproved->slag == $post->model->slag)selected @endif>{{$groupshipApproved->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <!-- FORM SELECT ICON -->
                                        <svg class="form-select-icon icon-small-arrow">
                                            <use xlink:href="#svg-small-arrow"></use>
                                        </svg>
                                        <!-- /FORM SELECT ICON -->
                                        @error('type')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <!-- /FORM SELECT -->
                                </div>
                                <!-- /FORM ITEM -->
                            </div>
                            <!-- /FORM ROW -->

                            <!-- FORM ROW -->
                            <div class="form-row">
                                <!-- FORM ITEM -->
                                <div class="form-item form-item-new-post split join-on-mobile medium">
                                    <div class="new-post-item-image-preview" id="new-post-item-image-preview">
                                        @if($post->id > 0 && $post->images != null)
                                        @foreach($post->images as $image)
                                        <img class='new-post-image' src='{{$image->src}}'>
                                        @endforeach
                                        @endif
                                    </div>
                                    <input type="file" accept="image/*" multiple id="new-post-item-cover" name="new-post-images[]" hidden>


                                    <!-- <p class="button small secondary" >Blog Cover</p>-->
                                    <div class="action-request-list action-request-list-new-post" id="new-post-item-image-button">
                                        <div class="action-request accept">
                                            <!-- ACTION REQUEST ICON -->
                                            <svg class="action-request-icon icon-photos">
                                                <use xlink:href="#svg-photos"></use>
                                            </svg>
                                            <!-- /ACTION REQUEST ICON -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /FORM ITEM -->
                            </div>
                            <!-- /FORM ROW -->

                            <!-- FORM ROW -->
                            <div class="form-row">
                                <!-- FORM ITEM -->
                                <div class="form-item">
                                    <!-- FORM INPUT -->
                                    <div class="form-input small full">
                                        <label for="description">Description</label>
                                        <textarea class="@error('description') is-invalid @enderror" id="description" rows="16" name="description" style="height: 200px;">{{old('description') ?? $post->body ?? ''}}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!-- /FORM INPUT -->
                                </div>
                                <!-- /FORM ITEM -->
                            </div>
                            <!-- /FORM ROW -->

                            @if($post->id >0)
                            <!-- FORM ROW -->
                            <div class="form-row">
                            <!-- FORM ITEM -->
                            <div class="form-item split">
                                <div></div>
                                <div></div>
                                <!-- BUTTON -->
                                <a class="button full white white-tertiary" href="{{route('settingsManageStoreDeleteGet', ['item' => $post->key])}}" onclick="return confirm('Are you sure you want to permanently remove this item?')">Delete Item</a>
                                <!-- /BUTTON -->
                            </div>
                            <!-- /FORM ITEM -->
                        </div>
                            <!-- /FORM ROW -->
                            @endif

                        </div>
                        <!-- WIDGET BOX CONTENT -->
                    </div>
                    <!-- /WIDGET BOX -->
                </div>
                <!-- /GRID COLUMN -->


            </div>
            <!-- /GRID COLUMN -->
        </div>
        <!-- /GRID COLUMN -->

        <!-- GRID COLUMN -->
        @include('home.user.profile.settings.partial.sidebar-mobile')
        <!-- /GRID COLUMN -->
    </div>
    <!-- /GRID -->
</form>
@endsection

@section('stylesheets')
@endsection

@section('scripts')
<!-- global.accordions -->
<script src="/assets/js/global/global.accordions.js"></script>
<!-- manage store item js -->
<!--<script src="/assets/js/widgets/posts/posts.js"></script>-->
<script src="/assets/js/pages/home/user/profile/settings/manage-store-item.js"></script>
@endsection
