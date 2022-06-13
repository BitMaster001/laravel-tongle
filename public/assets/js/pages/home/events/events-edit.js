const addEndTime = document.getElementById('event-add-end-time');
if(addEndTime != null){
    addEndTime.addEventListener('change', addEndTimeLogic);
}

function addEndTimeLogic(){
    if(this.checked){
        showEventEndTimeBlock()
    }else{
        hideEventEndTimeBlock()
    }
}

function showEventEndTimeBlock(){
    const eventEndTimeBlock = document.getElementById('event-end-time-block');
    if(eventEndTimeBlock != null){
        eventEndTimeBlock.style.display = '';
    }
}
function hideEventEndTimeBlock(){
    const eventEndTimeBlock = document.getElementById('event-end-time-block');
    if(eventEndTimeBlock != null){
        eventEndTimeBlock.style.display = 'none';
        document.getElementById('event-end-date').value = '';
        document.getElementById('event-end-time').value = '00:30';
        document.getElementById('event-end-time-annotation').value = 'AM';
    }
}
/*
const groupInviteFriendButton = document.getElementById('group-invite-friend');

if(groupInviteFriendButton != null){
    groupInviteFriendButton.addEventListener('click', groupInviteFriendClick);
}

function groupInviteFriendClick(){
    let overlays = document.querySelectorAll("div[style='width: 100%; height: 100%; background-color: rgba(21, 21, 31, 0.96); position: fixed; top: 0px; left: 0px; z-index: 100000; opacity: 0; visibility: hidden; transition: opacity 0.3s ease-in-out 0s, visibility 0.3s ease-in-out 0s;']");
    for(var key = 0;  key < overlays.length; key++){
        overlays[key].remove();
    }
    invitefy.removeAllTags();
}
*/

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
    const newPostTagFriends = document.getElementById('event-invite-friends-block');
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
            document.getElementById('event-invite-friends-block').style.display = "block";
            InitInvitedFriends(data["friends"]);        }
    }
}
function InitInvitedFriends(friends){

    let inputElm = document.querySelector('textarea[name=event-invite-friends]');

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

const newPostItemImageButton = document.getElementById('new-post-item-image-button');
const newPostItemImageInput = document.getElementById('new-post-item-cover');
if(newPostItemImageButton != null){
    newPostItemImageButton.addEventListener('click', newPostItemImage);
}
if(newPostItemImageInput != null){
    newPostItemImageInput.addEventListener('change', newPostItemImageChanged);
}

function newPostItemImage(){
    document.getElementById('new-post-item-cover').click();
}

function newPostItemImageChanged(e){
    const images = e.target.files;
    let count = 0;
    if(images.length>0){
        newPostItemImageClear(this, false);
        let imagesContainer = document.getElementById("new-post-item-image-preview");

        for (count = 0; count < images.length; count++){
            (function(file) {
                let imageNode = createNodeFromString("<img class='new-post-image' src=''>");
                let reader = new FileReader();
                reader.onload = function () {
                    var imageObject = new Image();
                    imageObject.src = reader.result;
                    imageObject.onload = function() {
                        if(this.width>=1 && this.height>=1){
                            imageNode.setAttribute("src", reader.result);
                        }else{
                            ShowDanger('New event cover minimum 800x300px.');
                            newPostItemImageClear(this,true);
                            return ;
                        }

                    };
                }
                imagesContainer.appendChild(imageNode);
                reader.readAsDataURL(file);
            })(images[count]);
        }
        if(count>0){
            const clearPhotos = "<div class='new-post-item-image-clear' id='new-post-item-image-clear'><svg class='new-post-item-image-clear-icon icon-delete'><use xlink:href='#svg-delete'></use></svg></div>";
            imagesContainer.appendChild(createNodeFromString(clearPhotos));
            const newPostItemImageClearButton = document.getElementById('new-post-item-image-clear');
            if(newPostItemImageClearButton != null){
                newPostItemImageClearButton.addEventListener('click', newPostItemImageClear);
            }
        }
    }else{
        newPostItemImageClear(this,true);
    }
}


function newPostItemImageClear(e, withInput = true){
    document.getElementById("new-post-item-image-preview").innerHTML = '';
    if(withInput){
        document.getElementById('new-post-item-cover').value = '';
    }
}

window.addEventListener('DOMContentLoaded', function()
{
    var eventStartDate = document.getElementById('event-start-date');
    var eventEndDate = document.getElementById('event-end-date');

    eventStartDate.DatePickerX.init({
        mondayFirst: true,
        format: "dd/mm/yyyy",
        minDate    : new Date(),
        //maxDate    : new Date(1927, 1, 1),
        todayButton: false,
    });

    eventEndDate.DatePickerX.init({
        mondayFirst: true,
        format: "dd/mm/yyyy",
        minDate    : new Date(),
        //maxDate    : new Date(1927, 1, 1),
        todayButton: false,
    });

    eventStartDate.addEventListener('change', updateMinEventEndDate);
});

function updateMinEventEndDate(){
    const eventStartDate = this.value;
    const dateParts = eventStartDate.split("/");
    const date = new Date(Number(dateParts[2]), Number(dateParts[1]) - 1, Number(dateParts[0]));
    if(date){
        const eventEndDate = document.getElementById('event-end-date');
        eventEndDate.value = '';
        eventEndDate.DatePickerX.remove();
        eventEndDate.DatePickerX.init({
            mondayFirst: true,
            format: "dd/mm/yyyy",
            minDate    : date,
            todayButton: false,
        });
    }
}



