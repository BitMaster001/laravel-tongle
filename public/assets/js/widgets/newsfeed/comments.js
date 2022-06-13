function showPostOptionCommentClick(){
    if(!this.classList.contains('active')){
        showPostOptionComment(this);
    }else{
        hidePostOptionComment(this);
    }
    }

function showPostOptionComment(el){
    el.classList.add('active');
    el.closest('.widget-box').classList.add('active');
    el.closest('.widget-box').querySelector('.post-comment-list').style.display = 'block';
    el.closest('.widget-box').querySelector('.post-comment-list .loader-bars.newsfeed-post-comments-loader').style.display = 'flex';

    const pid = el.closest('.widget-box').getAttribute("data-post");
    let data = {};
    data['pid'] = pid;
    fetchApi("/comments/get", "post", data, onloadGetComments);
}

function onloadGetComments(xhr){
    if (xhr.status === 200) {
        const data = JSON.parse(xhr.response);
        const comments = data.comments;
        const user = data.user;
        const source = data.source;
        showComments(source, user, comments);
    }
}

function hidePostOptionComment(el){
    el.classList.remove('active');
    el.closest('.widget-box').classList.remove('active');
    el.closest('.widget-box').querySelector('.post-comment-list').style.display = 'none';
    el.closest('.widget-box').querySelector('.post-comment-list .loader-bars.newsfeed-post-comments-loader').style.display = 'none';
    el.closest('.widget-box').querySelector('.post-user-comment-list').innerHTML = '';
}

function postCommentInputClick(el){
    const comment = el.value;
    if(comment.length==0){
        return;
    }
const commentPid = el.getAttribute("data-comment");
if(commentPid != null){
    snedNewComment("Reply", commentPid, comment);
}else{
    const postPid = el.closest('.widget-box').getAttribute("data-post");
    if(postPid != null){
        snedNewComment("Post", postPid, comment);
    }
}
}

function snedNewComment(type, pid, comment){
    let data = {};
    data['type'] = type;
    data['pid'] = pid;
    data['comment'] = comment;
    fetchApi("/comments/add", "post", data, onloadSnedNewComment);
}

function onloadSnedNewComment(xhr){
    if (xhr.status === 200) {
        let data = JSON.parse(xhr.response);
        /*if(typeof (data.message) != "undefined"){
            switch (data.message.type){
                case "Success":
                    ShowSuccess(data.message.body);
                    break;
                case "Danger":
                    ShowDanger(data.message.body);
                    break;
                case "Error":
                    ShowError(data.message.body);
                    break;
            }
        }else{
            ShowDanger("Oops something unusually went wrong, Please try again.");
            return ;
        }*/
        if(typeof (data.comments) != "undefined"){
            const comments = data.comments.comments;
            const user = data.comments.user;
            const source = data.comments.source;
            showComment(source, user, comments);

        }
    }else{
        ShowDanger("Oops something unusually went wrong, Please try again.");
    }
}

function showComments(source, user, comments){
    let commentsHtml ='';
    let key = 0;
    const postBoxs = document.querySelectorAll(".widget-box[data-post='"+source.pid+"']");
    if(typeof (comments) != 'undefined'){
    for (key ; key < comments.length; key++){
        commentsHtml += generatePostComment(user, comments[key]);
    }
    let postBox = null;
        for(let key1 = 0; key1 < postBoxs.length; key1++){
            if(postBoxs[key1].querySelector('.post-user-comment-list') != null){
            postBox = postBoxs[key1];
            postBox.querySelector('.post-user-comment-list').appendChild(createNodesFromString(commentsHtml));
            dropdownBoxMemberStyle();
            commentsBoxPostStyle();
        }
        }
    }
    for(let key1 = 0; key1 < postBoxs.length; key1++) {
        if(postBoxs[key1].querySelector('.post-comment-list .loader-bars.newsfeed-post-comments-loader') != null){
            postBoxs[key1].querySelector('.post-comment-list .loader-bars.newsfeed-post-comments-loader').style.display = 'none';
        }
    }
}

function showComment(source, user, comments){
    const comment = comments[0];
    let postBox = null;
    if(source.type == "Post"){

        const postBoxs = document.querySelectorAll(".widget-box[data-post='"+source.pid+"']");
        for(let key =  0; key < postBoxs.length; key++){
            if(postBoxs[key].querySelector('.post-option-comment') != null){
                postBox = postBoxs[key];
                clearNewPostInput(postBox);
                if(!postBox.classList.contains('active')){
                    showPostOptionComment(postBox.querySelector('.post-option-comment'));
                    return ;
        }
        }
        }
    }else if(source.type == "Reply"){
        console.log(source);
        postBox = document.querySelector(".post-comment-replies[data-comment='"+source.pid+"']").closest('.widget-box');
        removeNewPostReplyInput(postBox, source.pid);
    }

    let node = '';

    if(source.type == "Post"){
        node = generatePostComment(user, comment);
        postBox.querySelector('.post-user-comment-list').appendChild(createNodeFromString(node));
    }else if(source.type == "Reply"){
        node = generatePostCommentReply(user, comment);
        postBox.querySelector(".post-comment-replies[data-comment='"+source.pid+"']").appendChild(createNodeFromString(node));
    }
    dropdownBoxMemberStyle();
    commentsBoxPostStyle();
}

function generatePostComment(user, comment){
    const fullName = comment.user.fullName;
    const avatar = comment.user.avatar;
    const profileUrl = comment.user.profileUrl;
    const timeSincePost = timeSince(user.time, comment.comment.time);
    const reactions = comment.comment.reactions.reactions;
    const reactionsHtml = generateReactionsSmall(null, user, reactions);
    let gender = '';
    switch (comment.user.gender) {
        case "Male":
            gender = "hexagon-progress-40-44-male";
            break;
        case "Female":
            gender = "hexagon-progress-40-44-female";
            break;
        case "Other":
            gender = "hexagon-progress-40-44-other";
            break;
        default :
            gender = "hexagon-progress-40-44";
    }
    let settings = '';
    if(user.name == comment.user.name){
        settings = `<div class="meta-line settings">
                    <div class="post-settings-wrap">
                        <div class="post-settings post-settings-dropdown-trigger"><svg
                                class="post-settings-icon icon-more-dots">
                                <use xlink:href="#svg-more-dots"></use>
                            </svg></div>
                        <div class="simple-dropdown post-settings-dropdown">
                            <p class="simple-dropdown-link newsfeed-delete" data-comment="${comment.comment.pid}">Delete comment</p>
                        </div>
                    </div>
                </div>`;
    }
    let node = `<div class="post-comment" data-comment="${comment.comment.pid}">
        <a class="user-avatar small no-outline" href="${profileUrl}">
            <div class="user-avatar-content">
                <div class="hexagon-image-30-32" data-src="${avatar}"></div>
            </div>
            <div class="user-avatar-progress">
                <div class="${gender}"></div>
            </div>
            <div class="user-avatar-progress-border">
                <div class="hexagon-border-40-44"></div>
            </div>
        </a>
        <p class="post-comment-text">
        <a class="post-comment-text-author" href="${profileUrl}">${fullName}</a>
        ${comment.comment.body}
            </p>
        <div class="content-actions">
            <div class="content-action content-reply-action">
                ${reactionsHtml}
                <div class="meta-line">
                    <p class="meta-line-link light reaction-options-small-dropdown-trigger">React!</p>
                    <div class="reaction-options small reaction-options-small-dropdown" data-comment="${comment.comment.pid}">
                        <div class="reaction-option text-tooltip-tft" data-title="Like"><img
                                class="reaction-option-image" src="/assets/img/reaction/like.png" alt="reaction-like">
                        </div>
                        <div class="reaction-option text-tooltip-tft" data-title="Love"><img
                                class="reaction-option-image" src="/assets/img/reaction/love.png" alt="reaction-love">
                        </div>
                        <div class="reaction-option text-tooltip-tft" data-title="Dislike"><img
                                class="reaction-option-image" src="/assets/img/reaction/dislike.png"
                                alt="reaction-dislike"></div>
                        <div class="reaction-option text-tooltip-tft" data-title="Happy"><img
                                class="reaction-option-image" src="/assets/img/reaction/happy.png" alt="reaction-happy">
                        </div>
                        <div class="reaction-option text-tooltip-tft" data-title="Funny"><img
                                class="reaction-option-image" src="/assets/img/reaction/funny.png" alt="reaction-funny">
                        </div>
                        <div class="reaction-option text-tooltip-tft" data-title="Wow"><img
                                class="reaction-option-image" src="/assets/img/reaction/wow.png" alt="reaction-wow">
                        </div>
                        <div class="reaction-option text-tooltip-tft" data-title="Angry"><img
                                class="reaction-option-image" src="/assets/img/reaction/angry.png" alt="reaction-angry">
                        </div>
                        <div class="reaction-option text-tooltip-tft" data-title="Sad"><img
                                class="reaction-option-image" src="/assets/img/reaction/sad.png" alt="reaction-sad">
                        </div>
                    </div>
                </div>
                <div class="meta-line post-comment-reply">
                    <p class="meta-line-link light">Reply</p>
                </div>
                <div class="meta-line">
                    <p class="meta-line-timestamp">${timeSincePost}</p>
                </div>
               ${settings}
            </div>
        </div>
    </div>`;

        node += `<div class="post-comment-replies" data-comment="${comment.comment.pid}">`;
    for (let key = 0; key < comment.replies.length; key++){
        node += generatePostCommentReply(user, comment.replies[key]);
    }
        node += '</div>';
    return node;
}

function generatePostCommentReply(user, comment){
    const fullName = comment.user.fullName;
    const avatar = comment.user.avatar;
    const profileUrl = comment.user.profileUrl;
    const timeSincePost = timeSince(user.time, comment.comment.time);
    const reactions = comment.comment.reactions.reactions;
    const reactionsHtml = generateReactionsSmall(null, user, reactions);
    let gender = '';
    switch (comment.user.gender) {
        case "Male":
            gender = "hexagon-progress-40-44-male";
            break;
        case "Female":
            gender = "hexagon-progress-40-44-female";
            break;
        case "Other":
            gender = "hexagon-progress-40-44-other";
            break;
        default :
            gender = "hexagon-progress-40-44";
    }
    let settings = '';
    if(user.name == comment.user.name){
        settings = `<div class="meta-line settings">
                    <div class="post-settings-wrap">
                        <div class="post-settings post-settings-dropdown-trigger"><svg
                                class="post-settings-icon icon-more-dots">
                                <use xlink:href="#svg-more-dots"></use>
                            </svg></div>
                        <div class="simple-dropdown post-settings-dropdown">
                            <p class="simple-dropdown-link newsfeed-delete" data-comment="${comment.comment.pid}">Delete post</p>
                        </div>
                    </div>
                </div>`;
    }
    let node = `<div class="post-comment unread reply-2" data-comment="${comment.comment.pid}">
        <a class="user-avatar small no-outline" href="${profileUrl}">
            <div class="user-avatar-content">
                <div class="hexagon-image-30-32" data-src="${avatar}"></div>
            </div>
            <div class="user-avatar-progress">
                <div class="${gender}"></div>
            </div>
            <div class="user-avatar-progress-border">
                <div class="hexagon-border-40-44"></div>
            </div>
        </a>
        <p class="post-comment-text">
        <a class="post-comment-text-author" href="${profileUrl}">${fullName}</a>
        ${comment.comment.body}
            </p>
        <div class="content-actions">
            <div class="content-action content-reply-action">
                ${reactionsHtml}
                <div class="meta-line">
                    <p class="meta-line-link light reaction-options-small-dropdown-trigger">React!</p>
                    <div class="reaction-options small reaction-options-small-dropdown" data-comment="${comment.comment.pid}">
                        <div class="reaction-option text-tooltip-tft" data-title="Like"><img
                                class="reaction-option-image" src="/assets/img/reaction/like.png" alt="reaction-like">
                        </div>
                        <div class="reaction-option text-tooltip-tft" data-title="Love"><img
                                class="reaction-option-image" src="/assets/img/reaction/love.png" alt="reaction-love">
                        </div>
                        <div class="reaction-option text-tooltip-tft" data-title="Dislike"><img
                                class="reaction-option-image" src="/assets/img/reaction/dislike.png"
                                alt="reaction-dislike"></div>
                        <div class="reaction-option text-tooltip-tft" data-title="Happy"><img
                                class="reaction-option-image" src="/assets/img/reaction/happy.png" alt="reaction-happy">
                        </div>
                        <div class="reaction-option text-tooltip-tft" data-title="Funny"><img
                                class="reaction-option-image" src="/assets/img/reaction/funny.png" alt="reaction-funny">
                        </div>
                        <div class="reaction-option text-tooltip-tft" data-title="Wow"><img
                                class="reaction-option-image" src="/assets/img/reaction/wow.png" alt="reaction-wow">
                        </div>
                        <div class="reaction-option text-tooltip-tft" data-title="Angry"><img
                                class="reaction-option-image" src="/assets/img/reaction/angry.png" alt="reaction-angry">
                        </div>
                        <div class="reaction-option text-tooltip-tft" data-title="Sad"><img
                                class="reaction-option-image" src="/assets/img/reaction/sad.png" alt="reaction-sad">
                        </div>
                    </div>
                </div>
                <div class="meta-line">
                    <p class="meta-line-timestamp">${timeSincePost}</p>
                </div>
                ${settings}
            </div>
        </div>
    </div>`;
    return node;
}

function clearNewPostInput(postBox){
    const input = postBox.querySelector(".post-comment-form .post-comment-input");
    input.value = '';
    input.closest(".form-input").classList.remove('active');
}

function removeNewPostReplyInput(postBox, pid){
    postBox.querySelector(".post-comment[data-comment='"+pid+"']").querySelector('.post-reply-comment-form').remove();
}


function commentsBoxPostStyle(){
    app.plugins.createDropdown({
        trigger: '.widget-box-post-settings-dropdown-trigger',
        container: '.widget-box-post-settings-dropdown',
        offset: {
            top: 30,
            right: 9
        },
        animation: {
            type: 'translate-top',
            speed: .3,
            translateOffset: {
                vertical: 20
            }
        }
    });

    app.plugins.createDropdown({
        trigger: '.reaction-item-dropdown-trigger',
        container: '.reaction-item-dropdown',
        triggerEvent: 'hover',
        offset: {
            bottom: 38,
            left: -16
        },
        animation: {
            type: 'translate-bottom',
            speed: .3,
            translateOffset: {
                vertical: 20
            }
        }
    });

    app.plugins.createDropdown({
        trigger: '.reaction-options-dropdown-trigger',
        container: '.reaction-options-dropdown',
        triggerEvent: 'click',
        offset: {
            bottom: 54,
            left: -16
        },
        animation: {
            type: 'translate-bottom',
            speed: .3,
            translateOffset: {
                vertical: 20
            }
        },
        closeOnDropdownClick: true
    });

    app.plugins.createDropdown({
        trigger: '.reaction-options-small-dropdown-trigger',
        container: '.reaction-options-small-dropdown',
        triggerEvent: 'click',
        offset: {
            bottom: 30,
            left: -80
        },
        animation: {
            type: 'translate-bottom',
            speed: .3,
            translateOffset: {
                vertical: 16
            }
        },
        closeOnDropdownClick: true
    });

    app.plugins.createDropdown({
        trigger: '.post-settings-dropdown-trigger',
        container: '.post-settings-dropdown',
        offset: {
            bottom: 30,
            right: 0
        },
        animation: {
            type: 'translate-bottom',
            speed: .3,
            translateOffset: {
                vertical: 16
            }
        }
    });

    app.querySelector('.liquid', function (images) {
        for (const image of images) {
            app.liquidify(image);
        }
    });

    app.querySelector('.form-input', function (elements) {
        for (const el of elements) {
            if (el.classList.contains('always-active')) continue;

            const input = el.querySelector('input'),
                textarea = el.querySelector('textarea'),
                activeClass = 'active';

            let inputItem = undefined;

            if (input) inputItem = input;
            if (textarea) inputItem = textarea;

            if (inputItem) {
                inputItem.addEventListener('focus', function () {
                    el.classList.add(activeClass);
                });

                inputItem.addEventListener('blur', function () {
                    if (inputItem.value === '') {
                        el.classList.remove(activeClass);
                    }
                });

                if(inputItem.value.length > 0){
                    el.classList.add(activeClass);
                }
            }

        }
    });


    const postCommentReplyButtons = document.querySelectorAll(".post-comment-reply");
    for(let key = 0; key < postCommentReplyButtons.length; key++){
        postCommentReplyButtons[key].addEventListener('click', showPostCommentReplyClick);
    }

    const reactionOptionButtons = document.querySelectorAll('.reaction-option');
    for(let key = 0; key < reactionOptionButtons.length; key++){
        reactionOptionButtons[key].addEventListener('click', reactionOptionButtonsClick);
    }

    const newsfeedDeleteButtons = document.querySelectorAll('.newsfeed-delete');
    for(let key = 0; key < newsfeedDeleteButtons.length; key++){
        newsfeedDeleteButtons[key].addEventListener('click', newsfeedDeleteButtonsClick);
    }

    const pollOptionsInput = document.querySelectorAll('input[name="poll-option"]');
    for(let key = 0; key < pollOptionsInput.length; key++){
        pollOptionsInput[key].closest('.form-item').addEventListener('click', function (){
            this.querySelector('input[name="poll-option"]').checked = true;
        });
    }

    const pollVoteButtons = document.querySelectorAll('.poll-box-actions p:first-child');
    for(let key = 0; key < pollVoteButtons.length; key++){
        pollVoteButtons[key].addEventListener('click', pollVoteClick);
    }

}

function showPostCommentReplyClick(){
    const postComment = this.closest('.post-comment');
    const postCommentReply = postComment.querySelector('.post-reply-comment-form');
    if(postCommentReply == null){
        const commentPid = this.closest('.post-comment').getAttribute('data-comment');
        const replyHtml = generatePostCommentReplyForm(commentPid);
        postComment.appendChild(createNodeFromString(replyHtml));
        postComment.querySelector('.post-comment-reply-input').addEventListener('keyup', function (e){
            if (e.keyCode === 13) {
                postCommentInputClick(this);
            }
        });
        commentsBoxPostStyle();
    }else{
        postCommentReply.remove();
    }
}

function generatePostCommentReplyForm(pid){
    let node = `<div class="post-comment-form post-reply-comment-form">
                <div class="form">
            <div class="form-row">
                <div class="form-item">
                    <div class="form-input small">
                    <label for="popup-post-reply">Reply</label>
                    <input class="post-comment-reply-input" type="text" name="post-comment-input" data-comment="${pid}">
                    </div>
                </div>
            </div>
        </div>
            </div>`;
    return node;
}
