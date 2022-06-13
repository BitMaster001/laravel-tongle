<!-- POPUP BOX -->
<div class="popup-box small share-post-popup">
    <!-- POPUP CLOSE BUTTON -->
    <div class="popup-close-button post-option-share">
        <!-- POPUP CLOSE BUTTON ICON -->
        <svg class="popup-close-button-icon icon-cross">
            <use xlink:href="#svg-cross"></use>
        </svg>
        <!-- /POPUP CLOSE BUTTON ICON -->
    </div>
    <!-- /POPUP CLOSE BUTTON -->

    <!-- POPUP BOX TITLE -->
    <p class="popup-box-title" style="padding: 32px 20px 0;"> Share Post</p>
    <!-- /POPUP BOX TITLE -->

    <!-- FORM -->
    <form class="form" method="post" action="{{route('sharePosts')}}">
        @csrf
        <input name="post" hidden>

        <!-- FORM ROW -->
        <div class="form-row" style="padding: 0 0px;">
        <!-- FORM ITEM -->
        <div class="form-item">
            <!-- FORM SELECT -->
            <div class="form-select small">
                <label for="type">Share to</label>
                <select class="@error('type') is-invalid @enderror" id="shareto" name="shareto" style="background-color: #21283b; border-radius: 0; border: none;">
                    <option value="">News Feed</option>
                    @php
                    $owngroups = Auth::user()->ownGroups;
                    $groupships = Auth::user()->getGroups();
                    @endphp
                    @foreach($owngroups as $group)
                    <option value="{{$group->username}}">{{$group->name}}</option>
                    @endforeach
                    @foreach($groupships as $groupship)
                    <option value="{{$groupship->group->username}}">{{$groupship->group->name}}</option>
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
        <div class="form-row" style="padding: 0 0px; margin-top: 10px;">

            <!-- FORM ITEM -->
            <div class="form-item">
                <!-- FORM TEXTAREA -->
                <div class="form-textarea">
                    <textarea id="new-share-post-text" name="new-share-post-text" placeholder="What's on your mind?" style="height: 120px; background-color: #21283b; border-radius: 0; border: none;"></textarea>
                </div>
                <!-- /FORM TEXTAREA -->
            </div>
            <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->


        <!-- FORM ROW -->
        <div class="form-row" style="padding: 0 0px; margin-top: 2px;">
            <!-- FORM ITEM -->
            <div class="form-item">
                <!-- FORM INPUT -->
                <div class="new-post-tag-friends new-share-post-tag-friends" id="share-post-tag-friends-block" style="display: none;">
                    <textarea class="new-post-tag-friends-input new-share-post-tag-friends" id="new-share-post-tag-friends" name="new-share-post-tag-friends" placeholder="Invite Friends"></textarea>
                </div>
                <!-- /FORM INPUT -->
            </div>
            <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->

        <!-- POPUP BOX ACTIONS -->
        <div class="popup-box-actions medium void">

                <!-- QUICK POST FOOTER ACTION -->
                <div class="popup-box-action text-tooltip-tft-medium" id="share-post-tag-friends" data-title="Tag Friend" style="padding-top: 15px; cursor: pointer;" >
                    <!-- QUICK POST FOOTER ACTION ICON -->
                    <svg class="popup-box-action-icon icon-tags">
                        <use xlink:href="#svg-tags"></use>
                    </svg>
                    <!-- /QUICK POST FOOTER ACTION ICON -->
                </div>
                <!-- /QUICK POST FOOTER ACTION -->

            <!-- POPUP BOX ACTION -->
            <button class="popup-box-action full button secondary">Share Now!</button>
            <!-- /POPUP BOX ACTION -->
        </div>
        <!-- /POPUP BOX ACTIONS -->
    </form>
    <!-- /FORM -->
</div>
<!-- /POPUP BOX -->
