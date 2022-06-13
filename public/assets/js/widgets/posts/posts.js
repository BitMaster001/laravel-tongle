const newPostTabOptions = document.querySelectorAll(".option-item.new-post-tab-option");
for (let key = 0; key < newPostTabOptions.length; key++) {
    newPostTabOptions[key].addEventListener('click', selectNewPostTabOption);
}

function selectNewPostTabOption() {
    const options = ["post", "blog", "poll"];
    const tab = this.getAttribute("data-tab");
    if (options.includes(tab)) {
        for (let key = 0; key < newPostTabOptions.length; key++) {
            newPostTabOptions[key].classList.remove("active");
        }
        this.classList.add("active");
        document.getElementById("new-post-" + tab + "-tab-option").click();
    }
}

const newPostSendButton = document.getElementById("new-post-send");
const newPostClearButton = document.getElementById("new-post-clear");
const newPostAddImagesButton = document.getElementById('new-post-add-images');
const newPostAddVideosButton = document.getElementById('new-post-add-videos');
const newPostAddImagesInput = document.getElementById('new-post-images');
const newPostAddVideosInput = document.getElementById('new-post-videos');
const newPostTagFriendsButton = document.getElementById('new-post-tag-friends');

if (newPostSendButton != null) {
    newPostSendButton.addEventListener("click", newPostSend);
}
if (newPostClearButton != null) {
    newPostClearButton.addEventListener("click", newPostClear);
}
if (newPostAddImagesButton != null) {
    newPostAddImagesButton.addEventListener('click', newPostAddImagesLaunch);
}
if (newPostAddVideosButton != null) {
    newPostAddVideosButton.addEventListener('click', newPostAddVideosLaunch);
}
if (newPostAddImagesInput != null) {
    newPostAddImagesInput.addEventListener('change', newPostAddImages);
}
if (newPostAddVideosInput != null) {
    newPostAddVideosInput.addEventListener('change', newPostAddVideos);
}
if (newPostTagFriendsButton != null) {
    newPostTagFriendsButton.addEventListener('click', newPostTagFriendsLaunch);
}

function newPostSend() {
    const newPostTabOptionActive = document.querySelector('.new-post-tab-option.active');
    if (newPostTabOptionActive != null) {
        const postType = newPostTabOptionActive.getAttribute('data-tab');
        switch (postType) {
            case "post":
                postSend();
                break;
            case "blog":
                blogSend();
                break;
            case "poll":
                pollSend();
                break;
        }
    }
}

function postSend() {
    const body = document.getElementById('new-post-post-text').value;
    if (body.length == 0) {
        ShowDanger("New post can't be empty!");
        return;
    }

    const tagged = getNewPostTagged();
    const images = getNewPostImages();
    const videos = getNewPostVideos();

    let data = {};
    data['type'] = 'Post';
    data['body'] = body;
    data['tagged'] = tagged;
    data['images'] = images;
    data['videos'] = videos;
    data['newsfeed'] = newsfeed;
    data['profileName'] = profileName;

    fetchApi("/posts/add", "post", data, onloadAddPost);
}

function blogSend() {
    const title = document.getElementById('new-post-blog-title').value;
    if (title.length == 0) {
        ShowDanger("New blog title can't be empty!");
        return;
    }
    const timeToRead = document.getElementById('new-post-blog-time-to-read').value;

    const cover = document.getElementById('new-post-blog-cover').files[0];
    if (typeof(cover) == 'undefined') {
        ShowDanger("New blog cover image can't be empty!");
        return;
    }

    const body = document.querySelector('.ql-editor').innerHTML;

    if (body.trim().length < 100) {
        ShowDanger("New blog is too short!");
        return;
    }
    //const body = blogPostBody.container.innerHTML;

    const tagged = getNewPostTagged();
    const images = getNewPostImages();
    const videos = getNewPostVideos();

    let data = {};
    data['type'] = 'Blog';
    data['title'] = title;
    data['timeToRead'] = timeToRead;
    data['body'] = body;
    data['cover'] = cover;
    data['tagged'] = tagged;
    data['images'] = images;
    data['videos'] = videos;
    data['newsfeed'] = newsfeed;
    data['profileName'] = profileName;

    fetchApi("/posts/add", "post", data, onloadAddPost);

}

function pollSend() {
    const title = document.getElementById('new-post-poll-title').value;
    if (title.length == 0) {
        ShowDanger("New poll title can't be empty!");
        return;
    }
    const body = document.getElementById('new-post-poll-text').value;

    const timeToEnd = document.getElementById('new-post-poll-time-to-end').value;

    const questions = getNewPostPollQuestions();
    if (questions.length < 2) {
        ShowDanger("You can't create a poll with less then 2 questions!");
        return;
    }
    const tagged = getNewPostTagged();
    const images = getNewPostImages();
    const videos = getNewPostVideos();

    let data = {};
    data['type'] = 'Poll';
    data['title'] = title;
    data['timeToEnd'] = timeToEnd;
    data['body'] = body;
    data['questions'] = questions;
    data['tagged'] = tagged;
    data['images'] = images;
    data['videos'] = videos;
    data['newsfeed'] = newsfeed;
    data['profileName'] = profileName;

    fetchApi("/posts/add", "post", data, onloadAddPost);

}

function onloadAddPost(xhr) {
    if (xhr.status == 200) {
        let data = JSON.parse(xhr.response);
        if (typeof(data.message) != "undefined") {
            switch (data.message.type) {
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
        } else {
            ShowDanger("Oops something unusually went wrong, Please try again or try to refresh the page.");
            return;
        }

        if (typeof(data.posts) != "undefined") {
            showPost(data.user, data.posts);

        }
    } else {
        ShowDanger("Oops something unusually went wrong, Please try again or try to refresh the page.");
    }
}

function showPost(user, posts) {
    switch (posts[0].post.type) {
        case 'Post':
            NewPostPostClear();
            break;
        case 'Blog':
            NewPostBlogClear();
            break;
        case 'Poll':
            NewPostPollClear();
            break;
        default:
            return;
    }
    addPostToNewsfeed(user, posts[0], true);
    dropdownBoxMemberStyle();
    dropdownBoxPostStyle();
}

function getNewPostTagged() {
    let tagged = [];
    const newPostTagFriendsInput = document.getElementById('new-post-tag-friends-input');
    if (newPostTagFriendsInput != null && newPostTagFriendsInput.value.length > 0) {
        const taggedInput = JSON.parse(newPostTagFriendsInput.value);
        for (let key = 0; key < taggedInput.length; key++) {
            tagged.push(taggedInput[key].name);
        }
    }
    return tagged;
}

function getNewPostImages() {
    let images = [];
    const newPostImagesInput = document.getElementById('new-post-images');
    if (newPostImagesInput != null && newPostImagesInput.files.length > 0) {
        for (let key = 0; key < newPostImagesInput.files.length; key++) {
            images.push(newPostImagesInput.files[key]);
        }
    }
    return images;
}

function getNewPostVideos() {
    let videos = [];
    const newPostVideosInput = document.getElementById('new-post-videos');
    if (newPostVideosInput != null && newPostVideosInput.files.length > 0) {
        for (let key = 0; key < newPostVideosInput.files.length; key++) {
            videos.push(newPostVideosInput.files[key]);
        }
    }
    return videos;
}

function getNewPostPollQuestions() {
    let questions = [];
    let newPostPollQuestionsInput = document.querySelectorAll('input[name=new-post-poll-questions]');
    if (newPostPollQuestionsInput != null && newPostPollQuestionsInput.length > 0) {
        for (let key = 0; key < newPostPollQuestionsInput.length; key++) {
            let question = newPostPollQuestionsInput[key].value;
            if (question.length > 0) {
                questions.push(question);
            }

        }
    }
    return questions;
}

function newPostClear() {
    NewPostPostClear();
    NewPostBlogClear();
    NewPostPollClear();
}

function newPostAddImagesLaunch() {
    document.getElementById('new-post-images').click();
}

function newPostAddVideosLaunch() {
    document.getElementById('new-post-videos').click();
}

function newPostTagFriendsLaunch() {
    const newPostTagFriends = document.getElementById('new-post-tag-friends-block');
    if (newPostTagFriends.style.display === "none") {
        fetchApi("/posts/gettagedfriends", "post", {}, onloadGetTagedFriends);
    } else {
        newPostTaggedClear();
    }
}

function onloadGetTagedFriends(xhr) {
    if (xhr.status == 200) {
        const data = JSON.parse(xhr.response);
        if (typeof data["friends"] != "undefined") {
            document.getElementById('new-post-tag-friends-block').style.display = "block";
            InitTagFriends(data["friends"]);


        }
    }
}

function newPostAddImages(e) {
    let count = 0;
    const images = e.target.files;
    if (images.length > 0) {
        newPostImagesClear(this, false);
        let imagesContainer = document.getElementById("new-post-images-preview");
        for (count = 0; count < images.length; count++) {
            (function(file) {
                let imageNode = createNodeFromString("<img class='new-post-image' src=''>");
                let reader = new FileReader();
                reader.onload = function() {
                    imageNode.setAttribute("src", reader.result);
                }
                imagesContainer.appendChild(imageNode);
                //reader.readAsDataURL();
                reader.readAsDataURL(file);
            })(images[count]);
        }
        if (count > 0) {
            const clearPhotos = "<div class='new-post-images-clear' id='new-post-images-clear'><svg class='new-post-images-clear-icon icon-delete'><use xlink:href='#svg-delete'></use></svg></div>";
            imagesContainer.appendChild(createNodeFromString(clearPhotos));
            const newPostImagesClearButton = document.getElementById('new-post-images-clear');
            if (newPostImagesClearButton != null) {
                newPostImagesClearButton.addEventListener('click', newPostImagesClear);
            }
        }
    } else {
        newPostImagesClear(this, true);
    }
}

function newPostAddVideos(e) {
    let count = 0;
    const videos = e.target.files;
    if (videos.length > 0) {
        newPostVideosClear(this, false);
        let videosContainer = document.getElementById("new-post-videos-preview");
        for (count = 0; count < videos.length; count++) {
            (function(file) {
                //let videoNode = createNodeFromString("<video class='new-post-video' src=''></video>");
                let videoNode = createNodeFromString("<video class='new-post-video' controls='' name='media' autoplay loop><source src='" + URL.createObjectURL(file) + "' type='video/mp4'></video>");
                /*let reader = new FileReader();
                reader.onload = function () {
                    videoNode.querySelector('source').setAttribute("src", reader.result);
                }*/
                videosContainer.appendChild(videoNode);
                //reader.readAsDataURL();
                //reader.readAsDataURL(file);
            })(videos[count]);
        }
        if (count > 0) {
            const clearVideos = "<div class='new-post-videos-clear' id='new-post-videos-clear'><svg class='new-post-videos-clear-icon icon-delete'><use xlink:href='#svg-delete'></use></svg></div>";
            videosContainer.appendChild(createNodeFromString(clearVideos));
            const newPostVideosClearButton = document.getElementById('new-post-videos-clear');
            if (newPostVideosClearButton != null) {
                newPostVideosClearButton.addEventListener('click', newPostVideosClear);
            }
        }
    } else {
        newPostVideosClear(this, true);
    }
}

function newPostImagesClear(e, withInput = true) {
    document.getElementById("new-post-images-preview").innerHTML = '';
    if (withInput) {
        document.getElementById('new-post-images').value = '';
    }
}

function newPostVideosClear(e, withInput = true) {
    document.getElementById("new-post-videos-preview").innerHTML = '';
    if (withInput) {
        document.getElementById('new-post-videos').value = '';
    }
}

function InitTagFriends(friends) {

    let inputElm = document.querySelector('textarea[name=new-post-tag-friends]');

    var usersList = friends;

    function tagTemplate(tagData) {
        return `
        <tag title="${(tagData.title || tagData.email)}"
                contenteditable='false'
                spellcheck='false'
                tabIndex="-1"
                class="${this.settings.classNames.tag} ${tagData.class ? tagData.class : ""}"
                ${this.getAttributes(tagData)}>
            <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
            <div>
                <div class='tagify__tag__avatar-wrap'>
                    <img onerror="this.style.visibility='hidden'" src="${tagData.avatar}">
                </div>
                <span class='tagify__tag-text'>${tagData.fullName}</span>
            </div>
        </tag>
    `
    }

    function suggestionItemTemplate(tagData) {

        return `
        <div ${this.getAttributes(tagData)}
            class='tagify__dropdown__item ${tagData.class ? tagData.class : ""}'
            tabindex="0"
            role="option">
            ${ tagData.avatar ? `
            <div class='tagify__dropdown__item__avatar-wrap'>
                <img onerror="this.style.visibility='hidden'" src="${tagData.avatar}">
            </div>` : ''
        }
            <strong>${tagData.fullName}</strong>
            <span>${'@'+tagData.name}</span>
        </div>
    `
    }

// initialize Tagify on the above input node reference
    var tagify = new Tagify(inputElm, {
        tagTextProp: 'name',
        enforceWhitelist: true,
        skipInvalid: true,
        dropdown: {
            closeOnSelect: false,
            enabled: 0,
            classname: 'users-list',
            searchKeys: ['name', 'fullName']
        },
        templates: {
            tag: tagTemplate,
            dropdownItem: suggestionItemTemplate
        },
        whitelist: usersList
    });

    tagify.on('dropdown:show dropdown:updated', onDropdownShow)
    tagify.on('dropdown:select', onSelectSuggestion)

    var addAllSuggestionsElm;

    function onDropdownShow(e){
        var dropdownContentElm = e.detail.tagify.DOM.dropdown.content;

        if( tagify.suggestedListItems.length > 1 ){
            addAllSuggestionsElm = getAddAllSuggestionsElm();

            // insert "addAllSuggestionsElm" as the first element in the suggestions list
            dropdownContentElm.insertBefore(addAllSuggestionsElm, dropdownContentElm.firstChild)
        }
    }

    function onSelectSuggestion(e){
        if( e.detail.elm == addAllSuggestionsElm )
            tagify.dropdown.selectAll.call(tagify);
    }

// create a "add all" custom suggestion element every time the dropdown changes
    function getAddAllSuggestionsElm(){
        // suggestions items should be based on "dropdownItem" template
        return tagify.parseTemplate('dropdownItem', [{
                class: "addAll",
                name: "Add all",
                fullName: tagify.settings.whitelist.reduce(function(remainingSuggestions, item){
                    return tagify.isTagDuplicate(item.value) ? remainingSuggestions : remainingSuggestions + 1
                }, 0) + " Friends"
            }]
        )
    }
}

function NewPostPostClear(){
    document.getElementById('new-post-post-text').value = '';
    newPostTaggedClear();
    newPostImagesClear(this,true);
    newPostVideosClear(this,true);
}

function NewPostBlogClear(){
    document.getElementById('new-post-blog-title').value = '';
    document.getElementById('new-post-blog-time-to-read').value = 1;
    blogPostBody.setText('');
    newPostBlogImageClear();
    newPostTaggedClear();
    newPostImagesClear(this,true);
    newPostVideosClear(this,true);
}

function NewPostPollClear(){
    document.getElementById('new-post-poll-text').value = '';
    document.getElementById('new-post-poll-title').value = '';
    document.getElementById('new-post-poll-time-to-end').value = 1;
    document.getElementById('new-post-poll-add-questions').innerHTML = '';
    newPostPollAddQuestion();
    newPostPollAddQuestion();
}

// new post blog

const newPostBlogImageButton = document.getElementById('new-post-blog-image-button');
const newPostBlogImageInput = document.getElementById('new-post-blog-cover');
if(newPostBlogImageButton != null){
    newPostBlogImageButton.addEventListener('click', newPostBlogImage);
}
if(newPostBlogImageInput != null){
    newPostBlogImageInput.addEventListener('change', newPostBlogImageChanged);
}
function newPostBlogImage(){
    document.getElementById('new-post-blog-cover').click();
}
function newPostBlogImageChanged(e){
    const image = e.target.files[0];
    if(image != null){
        newPostBlogImageClear(this, false);
        let imageContainer = document.getElementById("new-post-blog-image-preview");

            (function(file) {
                let imageNode = createNodeFromString("<img class='new-post-image'  src=''>");
                let reader = new FileReader();
                reader.onload = function () {
                    var imageObject = new Image();
                    imageObject.src = reader.result;
                    imageObject.onload = function() {
                        if(this.width>=800 && this.height>=300){
                            imageNode.setAttribute("src", reader.result);
                        }else{
                            ShowDanger('New blog cover minimum 800x300px.');
                            newPostBlogImageClear(this,true);
                            return ;
                        }

                    };

                }
                imageContainer.appendChild(imageNode);
                //reader.readAsDataURL();
                reader.readAsDataURL(file);
            })(image);


            const clearPhotos = "<div class='new-post-blog-image-clear' id='new-post-blog-image-clear'><svg class='new-post-blog-image-clear-icon icon-delete'><use xlink:href='#svg-delete'></use></svg></div>";
            imageContainer.appendChild(createNodeFromString(clearPhotos));
            const newPostBlogImageClearButton = document.getElementById('new-post-blog-image-clear');
            if(newPostBlogImageClearButton != null){
                newPostBlogImageClearButton.addEventListener('click', newPostBlogImageClear);
            }

    }else{
        newPostBlogImageClear(this,true);
    }
}


function newPostBlogImageClear(e, withInput = true){
    document.getElementById("new-post-blog-image-preview").innerHTML = '';
    if(withInput){
        document.getElementById('new-post-blog-cover').value = '';
    }
}

function newPostTaggedClear(){
    document.getElementById('new-post-tag-friends-block').style.display = 'none';
    document.getElementById('new-post-tag-friends-input').value = '';
    let newPostTagFriendsInput =  document.querySelector('.tagify.new-post-tag-friends-input');
    if(newPostTagFriendsInput != null){
    document.querySelector('.tagify.new-post-tag-friends-input').remove();
    }
}

var blogPostBody = new Quill('#new-post-blog-body', {
    modules: {
        toolbar: [
            [{ header: [1, 2, 3, false] }],
            ['bold', 'italic', 'underline', 'strike', 'blockquote'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            ['image', 'link','code-block']
        ]
    },
    placeholder: '...',
    theme: 'snow'
});

//new post poll

const newPostPollAddQuestionButton = document.getElementById('new-post-poll-add-question-button');
if(newPostPollAddQuestionButton != null){
    newPostPollAddQuestionButton.addEventListener('click', newPostPollAddQuestion);
}

function newPostPollAddQuestion(){
    let node = `<div class="form-item form-item-new-post">
                  <div class="interactive-input small">
                    <input type="text" class="new-post-poll-questions" name="new-post-poll-questions" placeholder="...">
                    <div class="interactive-input-icon-wrap actionable">
                      <div class="tooltip-wrap text-tooltip-tft from-input-new-post-question-delete" data-title="Delete">
                        <svg class="interactive-input-icon icon-camera">
                          <use xlink:href="#svg-delete"></use>
                        </svg>
                      <div class="xm-tooltip" style="white-space: nowrap; position: absolute; z-index: 99999; top: -28px; left: 50%; margin-left: -45.5px; opacity: 0; visibility: hidden; transform: translate(0px, 10px); transition: all 0.3s ease-in-out 0s;">
                      <p class="xm-tooltip-text">Delete</p>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>`;
    document.getElementById('new-post-poll-add-questions').appendChild(createNodeFromString(node));
    let fromInputNewPostQuestionDeleteButtons = document.querySelectorAll('.from-input-new-post-question-delete');
    fromInputNewPostQuestionDeleteButtons[fromInputNewPostQuestionDeleteButtons.length-1].addEventListener('click', fromInputNewPostQuestionDelete);
   /* alert('newPostPollAddQuestion');*/
}
function fromInputNewPostQuestionDelete(){
    let fromInputNewPostQuestionDeleteButtons = document.querySelectorAll('.from-input-new-post-question-delete');
    if(fromInputNewPostQuestionDeleteButtons.length > 2){
    this.closest('.form-item-new-post').remove();
    }else{
        ShowDanger("You can't create a poll with less then 2 questions!");
    }
}
newPostPollAddQuestion();
newPostPollAddQuestion();