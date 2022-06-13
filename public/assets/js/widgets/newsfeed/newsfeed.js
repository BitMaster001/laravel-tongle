let newsfeed = 'All';
let timeStart = '';
let timeEnd = '';
let morePosts = true;
let profileName = '';

document.addEventListener('DOMContentLoaded', function() {
    getPosts();
});

function getPosts(){
    let data = {};
    data['newsfeed'] = newsfeed;
    data['timeStart'] = timeStart;
    data['timeEnd'] = timeEnd;
    data['profileName'] = profileName;
    console.log(timeStart+" "+timeEnd);
    fetchApi("/newsfeed/posts", "post", data, onloadGetPosts);
}

function onloadGetPosts(xhr){
    if (xhr.status === 200) {
        let data = JSON.parse(xhr.response);
        if(typeof (data.posts) != 'undefined' && typeof (data.user) != 'undefined'){
            addPostsToNewsfeed(data.user, data.posts);
        }else{
            node =`<div class="widget-box no-padding"">
            <div class="widget-box-scrollable" data-simplebar>
            <div class="widget-box-status">
            <div class="widget-box-status-content">
            <p class="widget-box-status-text">No posts available.</p>
            <br>
            </div>
            </div>
            </div>
            </div>`;
            morePosts = false;
            document.getElementById('newsfeed-post').appendChild(createNodesFromString(node));
        }
    }else{
        ShowDanger("Oops something unusually went wrong, Please try to refresh the page.");
    }
    hideNewsfeedLoader();
}

function addPostsToNewsfeed(user, posts){
    for (let key = 0 ; key < posts.length; key++) {
        const postTime = posts[key].post.time;
        if(timeStart == "" || timeEnd == ""){
            timeStart = postTime;
            timeEnd = postTime;
        }else{
        if((new Date(timeStart))>(new Date(postTime))){timeStart = postTime;}
        if((new Date(timeEnd))<(new Date(postTime))){timeEnd = postTime;}
        }
        addPostToNewsfeed(user, posts[key]);
    }
    dropdownBoxMemberStyle();
    dropdownBoxPostStyle();
}

function addPostToNewsfeed(user, post, top = false){
const postHtml = generatePostHtml(user, post);
if(!top){
document.getElementById('newsfeed-post').appendChild(createNodesFromString(postHtml));
}else{
    document.getElementById('newsfeed-post').prepend(createNodesFromString(postHtml));
}
}

function generatePostHtml(user, post){
    let node = '';
const postSettings = generatePostSettings(user, post);
const postUser = generatePostUser(user, post);
const postStatus = generatePostStatus(user, post);
const postTagged = generatePostTages(user, post);
const postContentActions = generatePostContentActions(user, post);
const postOptions = generatePostOptions(user, post);
const postContents = generatePostContents(user, post);
const postCommentForm = generatepostCommentForm(user, post);
const postPreview = generatePostPreview(user, post);
    node =`<div class="widget-box no-padding" data-post="${post.post.pid}">
            <div class="widget-box-scrollable" data-simplebar>
            ${postSettings}
            <div class="widget-box-status">
            <div class="widget-box-status-content">
            ${postUser}
            ${postStatus}
            </div>
            ${postPreview}
            <div class="widget-box-status-content">
            ${postContents}
            ${postTagged}
            ${postContentActions}
            </div>
            </div>
            ${postOptions}
             <div class="post-comment-list" style="display: none;">
            <!--<p class="post-comment-heading">Load More Comments <span class="highlighted">9+</span></p>-->
                    <!-- LOADER BARS -->
                    <div class="post-comment-list post-user-comment-list">
                    </div>

            <div class="loader-bars newsfeed-post-comments-loader" style="margin: 0 auto 0;">
                <div class="loader-bar"></div>
                <div class="loader-bar"></div>
                <div class="loader-bar"></div>
                <div class="loader-bar"></div>
                <div class="loader-bar"></div>
                <div class="loader-bar"></div>
                <div class="loader-bar"></div>
                <div class="loader-bar"></div>
            </div>

        <!-- /LOADER BARS -->
        </div>
            </div>
            ${postCommentForm}
            </div>`;
    return(node);
}

function generatePostSettings(user, post){
    let links = '';
    let node = '';
    if(user.name === post.user.name){
        links += `<p class="simple-dropdown-link newsfeed-delete" data-post="${post.post.pid}">Delete Post</p>`;
    }else if(typeof (user.admin) != 'undefined' && user.admin == true){
        links += `<p class="simple-dropdown-link newsfeed-delete" data-post="${post.post.pid}">Delete Post</p>`;
    }
    const isTagged = post.post.tagged.find(tagged => tagged["name"] === user.name)
    if(typeof (isTagged) != 'undefined'){
        links += `<p class="simple-dropdown-link">Untagged</p>`;
    }
    if(links.length>0){
        node = `<div class="widget-box-settings">
                <div class="post-settings-wrap">
                  <div class="post-settings widget-box-post-settings-dropdown-trigger">
                    <svg class="post-settings-icon icon-more-dots">
                      <use xlink:href="#svg-more-dots"></use>
                    </svg>
                  </div>
                  <div class="simple-dropdown widget-box-post-settings-dropdown">
                  ${links}
                  </div>
                </div>
              </div>`;
    }
    return node;
}

function generatePostUser(user, post){
    const fullName = post.user.fullName;
    const avatar = post.user.avatar;
    const profileUrl = post.user.profileUrl;
    const timeSincePost = timeSince(user.time, post.post.time);
    let gender = '';
    switch (post.user.gender) {
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
    let node = `<div class="user-status">
    <a class="user-status-avatar" href="${profileUrl}">
      <div class="user-avatar small no-outline">
        <div class="user-avatar-content">
          <div class="hexagon-image-30-32" data-src="${avatar}"></div>
        </div>
        <div class="user-avatar-progress">
          <div class="${gender}"></div>
        </div>
        <div class="user-avatar-progress-border">
          <div class="hexagon-border-40-44"></div>
        </div>
      </div>
    </a>
    <p class="user-status-title medium"><a class="bold" href="${profileUrl}">${fullName}</a></p>
    <p class="user-status-text small">${timeSincePost}</p>
  </div>`;
    return node;
}

function generatePostStatus(user, post){
    let node = '';
    if(post.post.body != null && post.post.body.length>0 && post.post.type !== 'Blog'){
        node = `<p class="widget-box-status-text" style="word-wrap: break-word; white-space: pre-line;">${post.post.body}</p>`;
    }
    return node;
}

function generatePostTages(user, post){
    if(post.post.type == 'Event'){
        return '';
    }
    let links = '';
    let node = '';
    if(post.post.tagged.length>0){
        const tagged = post.post.tagged;
        for(let key = 0; key < tagged.length; key++){
            links += `<a class="tag-item secondary" href="${tagged[key].profileUrl}">${tagged[key].fullName}</a>`;
        }
        node = `<div class="tag-list">${links}</div>`;
    }
    return node;
}

function generatePostContentActions(user, post){
    const reactions = post.post.reactions.reactions;
    const reactionsHtml = generateReactions(null, user, reactions);
    let node = `<div class="content-actions">
    <div class="content-action content-post-action">
        ${reactionsHtml}
    </div>
    <div class="content-action">
        <div class="meta-line">
            <p class="meta-line-text">${post.post.comments} Comments</p>
        </div>
        <div class="meta-line">
            <p class="meta-line-text">${post.post.shares} Shares</p>
        </div>
    </div>
</div>`;
    return node;
}

function generatePostOptions(user, post){
    let node = `<div class="post-options">
              <div class="post-option-wrap">
                <div class="post-option reaction-options-dropdown-trigger">
                  <svg class="post-option-icon icon-thumbs-up">
                    <use xlink:href="#svg-thumbs-up"></use>
                  </svg>
                  <p class="post-option-text">React!</p>
                </div>
                <div class="reaction-options reaction-options-dropdown" data-post="${post.post.pid}">
                  <div class="reaction-option text-tooltip-tft" data-title="Like">
                    <img class="reaction-option-image" src="/assets/img/reaction/like.png" alt="reaction-like">
                  </div>
                  <div class="reaction-option text-tooltip-tft" data-title="Love">
                    <img class="reaction-option-image" src="/assets/img/reaction/love.png" alt="reaction-love">
                  </div>
                  <div class="reaction-option text-tooltip-tft" data-title="Dislike">
                    <img class="reaction-option-image" src="/assets/img/reaction/dislike.png" alt="reaction-dislike">
                  </div>
                  <div class="reaction-option text-tooltip-tft" data-title="Happy">
                    <img class="reaction-option-image" src="/assets/img/reaction/happy.png" alt="reaction-happy">
                  </div>
                  <div class="reaction-option text-tooltip-tft" data-title="Funny">
                    <img class="reaction-option-image" src="/assets/img/reaction/funny.png" alt="reaction-funny">
                  </div>
                  <div class="reaction-option text-tooltip-tft" data-title="Wow">
                    <img class="reaction-option-image" src="/assets/img/reaction/wow.png" alt="reaction-wow">
                  </div>
                  <div class="reaction-option text-tooltip-tft" data-title="Angry">
                    <img class="reaction-option-image" src="/assets/img/reaction/angry.png" alt="reaction-angry">
                  </div>
                  <div class="reaction-option text-tooltip-tft" data-title="Sad">
                    <img class="reaction-option-image" src="/assets/img/reaction/sad.png" alt="reaction-sad">
                  </div>
                </div>
              </div>
              <div class="post-option post-option-comment">
                <svg class="post-option-icon icon-comment">
                  <use xlink:href="#svg-comment"></use>
                </svg>
                <p class="post-option-text">Comment</p>
              </div>
              <div class="post-option post-option-share" data-post="${post.post.pid}">
                <!-- POST OPTION ICON -->
                <svg class="post-option-icon icon-share">
                  <use xlink:href="#svg-share"></use>
                </svg>
                <p class="post-option-text" >Share</p>
              </div>
            </div>`;
    return node;
}

function generatePostContents(user, post){
    let node = ``;
    switch(post.post.type){
        case 'Blog':
            node += generatePostBlog(user, post);
            break;
        case 'Poll':
            node += generatePostPoll(user, post);
            break;
        case 'Share':
            node += generatePostShare(user, post);
            break;
        case 'Event':
            node += generatePostEvent(user, post);
            break;
    }
    const images = post.post.images;
    if(images.length>0 && post.post.type != 'Event'){
        if(images.length == 1){
            node += generatePostPicture(images[0]);
        }else{
            node += generatePostPictures(images);
        }
    }
    return node;
}

function generatePostPicture(image){
    let node = `<figure class="widget-box-picture popup-picture-trigger"><img src="${image.src}"></figure>`;
    return node;
}

function generatePostPictures(images){
    let imagesHtml = '';
    let node = '';
    const cpt = images.length;
    let index = 0;
    while (index < cpt){
        if(((cpt-index)%2)==0 || (((cpt-index)%2)==1 && ((cpt-index)%3)==1) || ((cpt-index)%3)==2){
            imagesHtml += generatePostPicturesTwoInRow(images[index++], images[index++]);
        }else if(((cpt-index)%3)==0){
            imagesHtml += generatePostPicturesThreeInRow(images[index++], images[index++], images[index++]);
        }
    }
    node = `<div class="picture-collage">${imagesHtml}</div>`;
    return node;
}
function generatePostPicturesTwoInRow(imageOne, ImageTow){
    let node = `<div class="picture-collage-row medium">
        <div class="picture-collage-item popup-picture-trigger">
            <div class="photo-preview">
                <figure class="photo-preview-image liquid"><img src="${imageOne.src}"></figure>
            </div>
        </div>
        <div class="picture-collage-item popup-picture-trigger">
            <div class="photo-preview">
                <figure class="photo-preview-image liquid"><img src="${ImageTow.src}"></figure>
            </div>
        </div>
    </div>`;
    return node;
}
function generatePostPicturesThreeInRow(imageOne, ImageTow, ImageThree){
    let node = `<div class="picture-collage-row">
        <div class="picture-collage-item popup-picture-trigger">
            <div class="photo-preview">
                <figure class="photo-preview-image liquid"><img src="${imageOne.src}"></figure>
            </div>
        </div>
        <div class="picture-collage-item popup-picture-trigger">
            <div class="photo-preview">
                <figure class="photo-preview-image liquid"><img src="${ImageTow.src}"></figure>
            </div>
        </div>
        <div class="picture-collage-item popup-picture-trigger">
            <div class="photo-preview">
                <figure class="photo-preview-image liquid"><img src="${ImageThree.src}"></figure>
            </div>
        </div>
    </div>`;
    return node;
}

function generatePostPreview(user, post){
    let node = '';
    if(post.post.preview){
        if(post.post.preview.type == 'Video'){
            node += `<div class="iframe-wrap">${post.post.preview.html}</div>`;
        }else{
            node += generatePostPreviewLink(user, post);
        }
    }
    return node;
}

function generatePostPreviewLink(user, post){

    const url = new URL(post.post.preview.url);
    const meta = `<p class="video-status-meta">${url.hostname.toUpperCase()}</p>`;
    let description = ``;
    if(post.post.preview.description){
        description = `<p class="video-status-text">${post.post.preview.description}</p>`;
    }

    let node = `<div class="widget-box-status-content">
                    <a class="video-status" href="${post.post.preview.url}" target="_blank">
                    <img class="video-status-image" src="${post.post.preview.cover}">
                    <div class="video-status-info">
                        ${meta}
                        <p class="video-status-title"><span class="bold">${post.post.preview.title}</span>
                        </p>
                        ${description}
                    </div>
            </a></div>`;
    return node;
}

function generatePostBlog(user, post){
    let node = `<div class="post-preview medium">
                    <figure class="post-preview-image liquid">
                      <img src="${post.post.cover}" alt="cover-19">
                    </figure>
                    <div class="post-preview-info">
                      <p class="post-preview-timestamp">${post.post.timeToRead} mins read</p>
                        <p class="post-preview-title">${post.post.title}</p>
                        <div class="post-preview-text">
                            ${post.post.body}
                        </div>
                    </div>
                  </div>`;
    return node;
}

function generatePostPoll(user, post){
    let poolContent = '';
    let node = '';
    let pollEndIn = '';
    const time = new Date(user.time);
    const pollTime = new Date(post.post.timeToEnd);

    const diffDays = Math.round(Math.abs((pollTime - time) / (24 * 60 * 60 * 1000)));
    if(pollTime < time || diffDays == 0){
        pollEndIn = 'Poll has ended';
    }else{

        if(diffDays == 1){
            pollEndIn = 'Poll ends in 1 day';
        }else{
            pollEndIn = `Poll ends in ${diffDays} day`;
        }
    }
    if(pollTime > time && diffDays != 0 && !post.post.voted){
        poolContent = generatePostPollQuestions(user, post);
    }else{
        poolContent = generatePostPollVotes(user, post);
    }
    node =`<div class="poll-box">
            <p class="poll-title">${post.post.title}</p>
            <p class="poll-text">${pollEndIn}</p>
            ${poolContent}
            </div>`;
    return node;
}

function generatePostEventV0(user, post){
    //const url = new URL(post.post.url);
    const meta = `<p class="video-status-meta">Event</p>`;
    let description = ``;
    if(post.post.body){
        description = `<p class="video-status-text">${post.post.body}</p>`;
    }

    let node = `<div class="widget-box-status-content">
                    <a class="video-status" href="${post.post.url}" target="_blank">
                    <img class="video-status-image" src="${post.post.cover}">
                    <div class="video-status-info">
                        ${meta}
                        <p class="video-status-title"><span class="bold">${post.post.title}</span>
                        </p>
                        ${description}
                    </div>
            </a></div>`;
    return node;
}

function generatePostEvent(user, post){
    //const url = new URL(post.post.url);
    const meta = `<p class="video-status-meta">Event</p>`;
    let description = ``;
    if(post.post.body){
        description = `<p class="video-status-text">${post.post.body}</p>`;
    }

    let node = `<a class="video-status small" href="${post.post.url}">
                <img class="video-status-image mobile" src="${post.post.cover}">
                <figure class="video-status-image liquid">
                 <img src="${post.post.cover}">
                </figure>
                <div class="video-status-info">
                  <p class="video-status-title"><span class="bold">Event</span> on <span class="highlighted">TongLe</span></p>
                  <p class="video-status-meta">${post.post.title}</p>
                  ${description}
                </div>
              </a>`;
    return node;
}

function  generatePostPollQuestions(user, post){
    let polls = '';
    let node = '';
    const questions = post.post.questions;
    for (let key =0; key<questions.length; key++){
        polls += `<div class="form-row">
                  <div class="form-item">
                    <div class="checkbox-wrap">
                      <input type="radio" name="poll-option" value="${questions[key].pid}">
                      <div class="checkbox-box round"></div>
                      <label for="">${questions[key].question}</label>
                    </div>
                  </div>
                </div>`;
    }
    node = `<form class="form">${polls}</form><div class="poll-box-actions">
       <p class="button small secondary">Vote Now!</p>
        <!--<p class="button small white">See Results</p>-->
        </div>`;
    return node;
}

function generatePostShare(user, post){
    const postShared = post.post.shared;
    if(postShared == null){
       return generateSharedPostNotFound();
    }
    let content = '';
    switch (postShared.post.type){
        case 'Blog':
            content = generatePostBlog(user, postShared);
            break;
        case 'Poll':
            content = generatePostPoll(user, postShared);
            break;
        case 'Post':
            const images = postShared.post.images;
            if(images.length>0){
                if(images.length == 1){
                    content = generatePostPicture(images[0]);
                }else{
                    content = generatePostPictures(images);
                }
            }
            break;
        case 'Event':
            content = generatePostEvent(user, postShared);
            break;
    }

    const timeSincePost = timeSince(user.time, postShared.post.time);
    let gender = '';
    switch (postShared.user.gender) {
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
    let body = '';
    if(postShared.post.type != 'Blog'){
        body = `<p class="widget-box-status-text" style="word-wrap: break-word; white-space: pre-line;">${postShared.post.body}</p>`;
    }
    let postTagged = generatePostTages(user, postShared);
    let preview = ``;
    if(postShared.post.preview){
        if(postShared.post.preview.type == 'Video'){
            preview += `<div class="iframe-wrap">${postShared.post.preview.html}</div>`;
        }else{
            preview += generatePostPreviewLink(user, postShared);
        }
    }
    if( postShared.post.type == 'Event'){
        body = '';
        postTagged = '';
    }
   node = `<div class="widget-box no-padding widget-box-share" data-post="${postShared.post.pid}" data-type="Share">
            <div class="widget-box-status">
                    <div class="widget-box-status-content">
                        <div class="user-status">
                            <a class="user-status-avatar" href="${postShared.user.profileUrl}">
                                <div class="user-avatar small no-outline">
                                    <div class="user-avatar-content">
                                        <div class="hexagon-image-30-32" data-src="${postShared.user.avatar}"></div>
                                    </div>
                                    <div class="user-avatar-progress">
                                        <div class="${gender}"></div>
                                    </div>
                                    <div class="user-avatar-progress-border">
                                        <div class="hexagon-border-40-44"></div>
                                    </div>
                                </div>
                            </a>
                            <p class="user-status-title medium">
                                <a class="bold" href="${postShared.user.profileUrl}">${postShared.user.fullName}</a>
                            </p>
                            <p class="user-status-text small">${timeSincePost}</p>
                        </div>
                        ${body}
                    </div>
                        ${preview}
                    <div class="widget-box-status-content">
                        ${content}
                        ${postTagged}
                    </div>
            </div>
        </div>`;
   return node;
}

function generateSharedPostNotFound(){
    let node = `<div class="widget-box no-padding widget-box-share">
    <div class="widget-box-status" style="padding-top: 35px;">
        <div class="widget-box-status-content">
            <p class="widget-box-status-text"><svg class="icon-info"><use xlink:href="#svg-info"></use></svg>&nbsp;&nbsp;&nbsp;Sorry, this post isn't available anymore.</p>
        </div>
    </div>
</div>`;
    return node;
}

function makeId(length) {
    let result           = '';
    const characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    let charactersLength = characters.length;
    for ( let i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

function  generatePostPollVotes(user, post){
    let polls = '';
    const votes = post.post.votes;
    const voter = post.post.voter;

    for (const [question, users] of Object.entries(votes)) {
        const id = makeId(23);
        polls += `<div class="poll-result">
        <div class="progress-stat">
          <div class="bar-progress-wrap medium">
            <p class="bar-progress-info medium negative regular">${question}<span class="bar-progress-text no-space"></span></p>
          </div>
          <div class="progress-stat-bar poll-progress-bar" id="${id}" data-voter="${voter}" data-votes="${users.length}"></div>
        </div>
        <div class="meta-line">
          <div class="meta-line-list user-avatar-list">`;
        for(let key = 0; key < users.length; key++){
            polls += `<div class="user-avatar micro no-stats">
              <div class="user-avatar-border">
                <div class="hexagon-22-24"></div>
              </div>
              <div class="user-avatar-content">
                <div class="hexagon-image-18-20" data-src="${users[key].avatar}"></div>
              </div>
            </div>`;
        }
        polls +=  `</div>
          <p class="meta-line-text">${users.length} Votes</p>
        </div>
      </div>`;
    }
    let node = `<div class="poll-results">${polls}</div>`;
    return node;
}

function generatepostCommentForm(user, post){
    let gender = '';
    switch (user.gender) {
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
    let node = `<div class="post-comment-form bordered-top">
        <div class="user-avatar small no-outline">
            <div class="user-avatar-content">
                <div class="hexagon-image-30-32" data-src="${user.avatar}"></div>
            </div>
            <div class="user-avatar-progress">
                <div class="${gender}"></div>
            </div>
            <div class="user-avatar-progress-border">
                <div class="hexagon-border-40-44"></div>
            </div>
        </div>
        <div class="form">
            <div class="form-row">
                <div class="form-item">
                    <div class="form-input small">
                    <label for="popup-post-reply">Reply</label>
                    <input class="post-comment-input" type="text" name="post-comment-input">
                    </div>
                </div>
            </div>
        </div>
    </div>`;
    return node;
}

function showNewsfeedLoader(){
    document.getElementById('newsfeed-post-loader').hidden = false;
}
function hideNewsfeedLoader(){
    document.getElementById('newsfeed-post-loader').hidden = true;
}

function dropdownBoxPostStyle(){
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

    app.plugins.createHexagon({
        container: '.hexagon-image-18-20',
        width: 18,
        height: 20,
        roundedCorners: true,
        roundedCornerRadius: 1,
        clip: true
    });

    const images = document.querySelectorAll('.photo-preview-image');
    for(let key = 0; key < images.length; key++){
        images[key].addEventListener('click', showPopupPicture);
    }

    const postOptionCommentButtons = document.querySelectorAll(".post-option.post-option-comment");
    for(let key = 0; key < postOptionCommentButtons.length; key++){
        postOptionCommentButtons[key].addEventListener('click', showPostOptionCommentClick);
    }

    const postCommentInputs = document.querySelectorAll('.post-comment-input');
    for(let key = 0; key < postCommentInputs.length; key++){
        postCommentInputs[key].addEventListener('keyup', postCommentInputKeyup);
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

    const postOptionShareButtons = document.querySelectorAll('.post-option-share');

    for(let key =0; key < postOptionShareButtons.length; key++){
        postOptionShareButtons[key].addEventListener('click', postOptionShareButton);
    }
    if(postOptionShareButtons.length>0){
        initSharePostPopup()
    }

    createProgressBare();
}
function postCommentInputKeyup(e){
    if (e.keyCode === 13) {

        postCommentInputClick(this);

    }
}

function createProgressBare(){
    const pollProgressBars = document.querySelectorAll('.poll-progress-bar');
    for(let key = 0; key < pollProgressBars.length; key++){
        const pollProgressBar = pollProgressBars[key]
        const voter = pollProgressBar.getAttribute('data-voter');
        const votes = pollProgressBar.getAttribute('data-votes');
        let percentage = 0;
        if(votes>0){
        percentage = (votes/voter)*100;
        }
        const id = "#"+pollProgressBar.getAttribute('id');
        app.plugins.createProgressBar({
            container: id,
            height: 4,
            lineColor: '#293249'
        });
        app.plugins.createProgressBar({
            container: id,
            height: 4,
            gradient: {
                colors: ['#40d04f', '#d9ff65']
            },
            scale: {
                start: 0,
                end: 100,
                stop: percentage,
            },
            linkText: true,
            linkUnits: '%'
        });
    }
}

function pollVoteClick(){
    const postPid = this.closest('.widget-box').getAttribute('data-post');
    const pollPidChecked = this.closest('.widget-box').querySelector('input:checked');
    if(pollPidChecked == null){
        ShowDanger("Select an answer first.");
    }
    const pollPid = pollPidChecked.value;
    if(postPid != null) {
        let data = {};
        data['postPid'] = postPid;
        data['pollPid'] = pollPid;
        fetchApi("/newsfeed/vote", "post", data, onloadNewVote);
    }
}

function onloadNewVote(xhr){
    if (xhr.status === 200) {
        let data = JSON.parse(xhr.response);
        if(typeof (data.message) != "undefined"){
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
        }
        if(typeof (data.source) != "undefined"){
            showNewVote(data.source, data.user, data.posts[0]);
        }
        /*if(typeof (data.source) != "undefined"){
            if(data.source.type == "Post"){
                const postBox = document.querySelector(".widget-box[data-post='"+data.source.pid+"']");
                if(postBox != null){
                    postBox.remove();
                }
            }else if(data.source.type == "Reply"){
                const replyBox = document.querySelector(".post-comment-replies[data-comment='"+data.source.pid+"']");
                const commentBox = document.querySelector(".post-comment[data-comment='"+data.source.pid+"']");
                if(replyBox != null){
                    replyBox.remove();
                }
                if(commentBox != null){
                    commentBox.remove();
                }
            }

        }*/
    }else{
        ShowDanger("Oops something unusually went wrong, Please try again.");
    }

}

function showNewVote(source, user, post) {

    const postBoxs = document.querySelectorAll(".widget-box[data-post='" + source.pid + "']");
    for (let key = 0; key < postBoxs.length; key ++) {
        const voteHtml = generatePostPollVotes(user, post);
        postBox = postBoxs[key];
        if (postBox != null) {
            const form = postBox.querySelector('.poll-box form');
            if (form != null) {
                form.remove();
            }
            const actionForm = postBox.querySelector('.poll-box .poll-box-actions');
            if (actionForm != null) {
                actionForm.remove();
            }
            postBox.querySelector('.poll-box').appendChild(createNodesFromString(voteHtml));
        }
    }
    if(postBoxs.length > 0){
        dropdownBoxPostStyle();
    }
}

function newsfeedDeleteButtonsClick(){

    const commentPid = this.getAttribute("data-comment");
    if(commentPid != null){
        newsfeedDelete('Reply', commentPid);
    }else {
        const postPid = this.getAttribute("data-post");
        if(postPid != null){
            newsfeedDelete('Post', postPid);
        }
    }
}

function newsfeedDelete(type, pid){
        let data = {};
        data['type'] = type;
        data['pid'] = pid;
        fetchApi("/newsfeed/delete", "post", data, onloadNewsfeedDelete);

}

function onloadNewsfeedDelete(xhr){
    if (xhr.status === 200) {
        let data = JSON.parse(xhr.response);
        if(typeof (data.message) != "undefined"){
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
        }
        if(typeof (data.source) != "undefined"){
            if(data.source.type == "Post"){
                const postBoxs = document.querySelectorAll(".widget-box[data-post='"+data.source.pid+"']");
                for(let key = 0; key < postBoxs.length; key++){
                    postBox = postBoxs[key];
                if(postBox.getAttribute('data-type') != 'Share'){
                    postBox.remove();
                }
                }
            }else if(data.source.type == "Reply"){
                const replyBox = document.querySelector(".post-comment-replies[data-comment='"+data.source.pid+"']");
                const commentBox = document.querySelector(".post-comment[data-comment='"+data.source.pid+"']");
                if(replyBox != null){
                    replyBox.remove();
                }
                if(commentBox != null){
                    commentBox.remove();
                }
            }

        }
    }else{
        ShowDanger("Oops something unusually went wrong, Please try again.");
    }

}

function showPopupPicture(){

    const popupPicture = document.querySelector('.popup-picture');
    if(popupPicture != null) {
        const src = this.querySelector('img').getAttribute('src');
        popupPicture.querySelector('.popup-picture-image img').setAttribute('src', src);
        //popupPicture.style = 'position: fixed; left: 50%; z-index: 100001; opacity: 1; visibility: visible; transform: translate(0px, 0px); transition: transform 0.3s ease-in-out 0s, opacity 0.3s ease-in-out 0s, visibility 0.3s ease-in-out 0s; top: 46px; margin-left: -761px;';
        popupPicture.style.opacity = 1;
        popupPicture.style.visibility = 'visible';

    }
}
document.querySelector('.popup-picture .popup-close-button').addEventListener('click', closePopupPicture);

function closePopupPicture(){
    const popupPicture = document.querySelector('.popup-picture');
    if(popupPicture != null) {
        //popupPicture.style = 'position: fixed; left: 50%; z-index: 100001; opacity: 0; visibility: hidden; transform: translate(0px, -40px); transition: transform 0.3s ease-in-out 0s, opacity 0.3s ease-in-out 0s, visibility 0.3s ease-in-out 0s; top: 50.5px; margin-left: -845.5px;';
        popupPicture.style.opacity = 0;
        popupPicture.style.visibility = 'hidden';
        document.querySelector("div[style='width: 100%; height: 100%; background-color: rgba(21, 21, 31, 0.96); position: fixed; top: 0px; left: 0px; z-index: 100000; opacity: 1; visibility: visible; transition: opacity 0.3s ease-in-out 0s, visibility 0.3s ease-in-out 0s;']").remove();
    }
}

document.addEventListener('scroll', function (event) {
   // console.log(document.body.scrollHeight+" "+window.pageYOffset+" "+window.innerHeight+" "+ (window.pageYOffset + window.innerHeight));
    /*if (document.body.scrollHeight ==
        window.pageYOffset +
        window.innerHeight) {
        if(document.getElementById('newsfeed-post-loader').getAttribute("hidden") != null && morePosts){
            document.getElementById('newsfeed-post-loader').hidden = false;
            getPosts();
        }
    }*/
    if (document.body.scrollHeight*0.75 <
        window.pageYOffset +
        window.innerHeight) {
        if(document.getElementById('newsfeed-post-loader').getAttribute("hidden") != null && morePosts){
            document.getElementById('newsfeed-post-loader').hidden = false;
            getPosts();
        }
    }
});



