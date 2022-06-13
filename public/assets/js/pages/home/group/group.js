const groupInviteFriendButton = document.getElementById('group-invite-friend');

if(groupInviteFriendButton != null){
    groupInviteFriendButton.addEventListener('click', groupInviteFriendClick);
}

function groupInviteFriendClick(){
    //let overlays = document.querySelectorAll("div[style='width: 100%; height: 100%; background-color: rgba(21, 21, 31, 0.96); position: fixed; top: 0px; left: 0px; z-index: 100000; opacity: 0; visibility: hidden; transition: opacity 0.3s ease-in-out 0s, visibility 0.3s ease-in-out 0s;']");
    /*for(var key = 0;  key < overlays.length; key++){
        overlays[key].remove();
    }*/
    invitefy.removeAllTags();
}

const inviteFriendsPopup = app.plugins.createPopup({
    container: '.invite-friends-popup',
    trigger: '.group-invite-friend',
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
newInviteFriendsLaunch();

var invitefy = null;
function newInviteFriendsLaunch(){
    const newPostTagFriends = document.getElementById('new-invite-friends-block');
    if(newPostTagFriends.style.display === "none"){
        fetchApi("/posts/gettagedfriends", "post", {}, onloadGetInvitedFriends);
    }else{
        newPostTaggedClear();
    }
}

function onloadGetInvitedFriends(xhr){
    if (xhr.status == 200) {
        const data = JSON.parse(xhr.response);
        if (typeof data["friends"] != "undefined") {
            document.getElementById('new-invite-friends-block').style.display = "block";
            InitInvitedFriends(data["friends"]);        }
    }
}
function InitInvitedFriends(friends){

    let inputElm = document.querySelector('textarea[name=new-invite-friends]');

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
    invitefy = new Tagify(inputElm, {
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

    invitefy.on('dropdown:show dropdown:updated', onDropdownShow)
    invitefy.on('dropdown:select', onSelectSuggestion)

    var addAllSuggestionsElm;

    function onDropdownShow(e){
        var dropdownContentElm = e.detail.tagify.DOM.dropdown.content;

        if( invitefy.suggestedListItems.length > 1 ){
            addAllSuggestionsElm = getAddAllSuggestionsElm();

            // insert "addAllSuggestionsElm" as the first element in the suggestions list
            dropdownContentElm.insertBefore(addAllSuggestionsElm, dropdownContentElm.firstChild)
        }
    }

    function onSelectSuggestion(e){
        if( e.detail.elm == addAllSuggestionsElm )
            invitefy.dropdown.selectAll.call(invitefy);
    }

// create a "add all" custom suggestion element every time the dropdown changes
    function getAddAllSuggestionsElm(){
        // suggestions items should be based on "dropdownItem" template
        return invitefy.parseTemplate('dropdownItem', [{
                class: "addAll",
                name: "Add all",
                fullName: invitefy.settings.whitelist.reduce(function(remainingSuggestions, item){
                    return invitefy.isTagDuplicate(item.value) ? remainingSuggestions : remainingSuggestions + 1
                }, 0) + " Friends"
            }]
        )
    }
}

