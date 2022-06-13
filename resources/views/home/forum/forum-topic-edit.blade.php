@extends('layouts.app')

@section('title')
Q & A
@endsection

@section('content')

    <!-- SECTION BANNER -->
    <div class="section-banner section-banner-1">
        <!-- SECTION BANNER ICON -->
        <img class="section-banner-icon" src="/assets/img/banner/forums-icon.png" alt="forums-icon">
        <!-- /SECTION BANNER ICON -->

        <!-- SECTION BANNER TITLE -->
        <p class="section-banner-title">Forums</p>
        <!-- /SECTION BANNER TITLE -->

        <!-- SECTION BANNER TEXT -->
        <p class="section-banner-text">Talk about anything! Gaming, music, life and more!</p>
        <!-- /SECTION BANNER TEXT -->
    </div>
    <!-- /SECTION BANNER -->

    <!-- SECTION HEADER -->
    <div class="section-header">
        <!-- SECTION HEADER INFO -->
        <div class="section-header-info">
            <!-- SECTION PRETITLE -->
            <p class="section-pretitle">Formus</p>
            <!-- /SECTION PRETITLE -->

            <!-- SECTION TITLE -->
            <h2 class="section-title">{{$categorie->name}}</h2>
            <!-- /SECTION TITLE -->
        </div>
        <!-- /SECTION HEADER INFO -->
        @if($topic->id)
        <!-- SECTION HEADER ACTIONS -->
        <div class="section-header-actions">
            <!-- SECTION HEADER ACTION -->
            <a href="{{route('getForumPost', ['categorie' => $categorie->slag, 'post' => $topic->key])}}" class="section-header-action">Go to topic</a>
            <!-- /SECTION HEADER ACTION -->
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
        <form class="form" method="post" action="{{route('getForumManagePostEdit', ['categorie' => $categorie->slag])}}">
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
                                        <input name="id" hidden value="{{$topic->id}}">
                                        <!-- FORM ITEM -->
                                        <div class="form-item form-item-new-post">
                                            <!-- FORM INPUT -->
                                            <div class="form-input small">
                                                <!--<label for="profile-name">Title</label>
                                                <input class="from-input-new-post @error('username-email')is-invalid @enderror" type="text" id="new-post-blog-title" name="new-post-blog-title" value="">
                                                @error('username-email')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror-->
                                                <label for="profile-name">Title</label>
                                                <input class="@error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title') ?? $topic->title ?? ''}}">
                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <!-- /FORM INPUT -->
                                        </div>
                                        <!-- /FORM ITEM -->


                                        <!-- FORM ITEM -->
                                        <div class="form-item form-item-new-post-blog">
                                            <!-- FORM TEXTAREA -->
                                            <div class="form-textarea form-textarea-new-post-blog">
                                                <textarea name="description" hidden></textarea>
                                                <div id="new-post-blog-body" placeholder="">
                                                    {!!old('description') ?? $topic->body ?? ''!!}
                                                    @error('description')
                                                    <strong style="color: red;">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- /FORM TEXTAREA -->
                                        </div>
                                        <!-- /FORM ITEM -->

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
                    @if($topic->id > 0)
                    <a class="button small white white-tertiary" href="{{route('getForumDeletePost', ['categorie' => $categorie->slag, 'post' => $topic->key])}}" onclick="return confirm('Are you sure you want to permanently remove this topic?')">Delete Topic</a>
                    @endif
                </div>
                <!-- /QUICK POST FOOTER ACTIONS -->

                <!-- QUICK POST FOOTER ACTIONS -->
                <div class="quick-post-footer-actions">
                    <!-- BUTTON -->
                    @if($topic->id > 0)
                    <a class="button small void" id="new-post-clear" href="{{route('getForumPost', ['categorie' => $categorie->slag, 'post' => $topic->key])}}">Discard</a>
                    @else
                    <a class="button small void" id="new-post-clear" href="{{route('getForumCategorie', ['categorie' => $categorie->slag])}}">Discard</a>
                    @endif
                    <!-- /BUTTON -->

                    <!-- BUTTON -->
                    <button class="button small secondary" id="new-post-send">Post</button>
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
<link rel="stylesheet" href="/assets/vendor/quill/quill.css">
<style>
    @media screen and (max-width: 680px) {
        .content-grid {
            width: 95%;
            padding: 25px 0 200px;
        }
        .grid {
            grid-template-columns: 100% !important;
        }
        .user-preview {
            width: 100%;
        }
    }
</style>
@endsection

@section('scripts')
<!-- Quill js -->
<script src="/assets/vendor/quill/quill.js"></script>
<!-- forum topic edit js -->
<script src="/assets/js/pages/home/forums/forum-topic-edit.js"></script>
@endsection


