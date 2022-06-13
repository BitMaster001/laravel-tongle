

function postOptionShareButton(){
    /*let overlays = document.querySelectorAll("div[style='width: 100%; height: 100%; background-color: rgba(21, 21, 31, 0.96); position: fixed; top: 0px; left: 0px; z-index: 100000; opacity: 0; visibility: hidden; transition: opacity 0.3s ease-in-out 0s, visibility 0.3s ease-in-out 0s;']");
    for(var key = 0;  key < overlays.length; key++){
        overlays[key].remove();
    }*/

    const post = this.getAttribute('data-post');
    if(post != null){
    document.querySelector('.share-post-popup').querySelector('input[name="post"]').value = post;
    }else{
        document.querySelector('.share-post-popup').querySelector('input[name="post"]').value = '';
    }
    document.getElementById('new-share-post-text').value = '';
    document.getElementById('shareto').value = '';
    sharePostTagFriends( null,  true);
}

function initSharePostPopup(){
    app.plugins.createPopup({
        container: '.share-post-popup',
        trigger: '.post-option-share',
        overlay: {
            color: '21, 21, 31',
            opacity: .96
        },
        animation: {
            type: 'translate-in-fade',
            speed: .3,
            translateOffset: 40
        }
    });
}

const sharePostTagFriendsButton = document.getElementById('share-post-tag-friends');
if(sharePostTagFriendsButton != null){
    sharePostTagFriendsButton.addEventListener('click', sharePostTagFriends);
}

function sharePostTagFriends( el, clear = false){
    const newPostTagFriends = document.getElementById('share-post-tag-friends-block');
    if(newPostTagFriends != null){
    if(newPostTagFriends.style.display === "none" && !clear){
        newPostTagFriends.style.display = "block";
    }else{
        newPostTagFriends.style.display = "none";
        tagefy.removeAllTags();
    }
    }
}

newSharePostTagFriendsLaunch();

var tagefy = null;
function newSharePostTagFriendsLaunch(){
    const newPostTagFriends = document.getElementById('share-post-tag-friends-block');
    if(newPostTagFriends.style.display === "none"){
        fetchApi("/posts/gettagedfriends", "post", {}, onloadGetSharePostTagdFriends);
    }else{
        newPostTaggedClear();
    }
}

function onloadGetSharePostTagdFriends(xhr){
    if (xhr.status == 200) {
        const data = JSON.parse(xhr.response);
        if (typeof data["friends"] != "undefined") {
            //document.getElementById('share-post-tag-friends-block').style.display = "block";
            InitSharePostTagdFriends(data["friends"]);        }
    }
}
function InitSharePostTagdFriends(friends){

    let inputElm = document.querySelector('textarea[name=new-share-post-tag-friends]');

    var usersList = friends;

    function tagTemplate(tagData){
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

    function suggestionItemTemplate(tagData){

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
    tagefy = new Tagify(inputElm, {
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

    tagefy.on('dropdown:show dropdown:updated', onDropdownShow)
    tagefy.on('dropdown:select', onSelectSuggestion)

    var addAllSuggestionsElm;

    function onDropdownShow(e){
        var dropdownContentElm = e.detail.tagify.DOM.dropdown.content;

        if( tagefy.suggestedListItems.length > 1 ){
            addAllSuggestionsElm = getAddAllSuggestionsElm();

            // insert "addAllSuggestionsElm" as the first element in the suggestions list
            dropdownContentElm.insertBefore(addAllSuggestionsElm, dropdownContentElm.firstChild)
        }
    }

    function onSelectSuggestion(e){
        if( e.detail.elm == addAllSuggestionsElm )
            tagefy.dropdown.selectAll.call(tagefy);
    }

// create a "add all" custom suggestion element every time the dropdown changes
    function getAddAllSuggestionsElm(){
        // suggestions items should be based on "dropdownItem" template
        return tagefy.parseTemplate('dropdownItem', [{
                class: "addAll",
                name: "Add all",
                fullName: tagefy.settings.whitelist.reduce(function(remainingSuggestions, item){
                    return tagefy.isTagDuplicate(item.value) ? remainingSuggestions : remainingSuggestions + 1
                }, 0) + " Friends"
            }]
        )
    }
}
