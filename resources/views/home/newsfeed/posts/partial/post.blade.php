
<!-- FORM -->
<form class="form">
    <!-- FORM ROW -->
    <div class="form-row">
        <!-- FORM ITEM -->
        <div class="form-item">
            <!-- FORM TEXTAREA -->
            <div class="form-textarea">
                <textarea id="new-post-post-text" name="new-post-post-text" placeholder="Hi{{" ".(Auth::user()->first_name ?? "")}}! What's on your mind?"></textarea>
            </div>
            <!-- /FORM TEXTAREA -->
        </div>
        <!-- /FORM ITEM -->
    </div>
    <!-- /FORM ROW -->
</form>
<!-- /FORM -->
