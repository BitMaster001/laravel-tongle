const hiddenClass = 'hidden';
const timer = 1000;
const newMessageRingtone = new Audio('/assets/ringtone/messenger.mp3');
let messages = [];
let liveMessages = true;
let liveChat = false;
let liveChatUser = '';
let time = new Date();
let fullMessage = false;
let fullMessageFriendName = null;
let notifyNewMessages = false;


function showChatMessageWidget(chatMessageWidget, username) {
    if (typeof messages["friends"] != "undefined") {
        let friend = messages["friends"].find(friend => friend["name"] === username);
        if (typeof friend != "undefined") {
            setChatMessageWidget(friend);
            scrollToEndChatWidgetConversation();
            chatMessageWidget.classList.toggle(hiddenClass);
            liveMessages = false;
            liveChat = true;
            getUserMessages(username);
        } else {
            contactNoFriend(username);
        }
    }
}

function closeChatMessageWidget() {
    liveMessages = true;
    liveChat = false;
    getMessages();
}

function setChatMessageWidget(friend) {
    document.getElementById("chat-widget-message").setAttribute("data-user", friend.name);
    document.getElementById("chat-widget-avatar").setAttribute("data-src", friend.avatar);
    document.getElementById("chat-widget-name").textContent = friend.fullName;
    document.getElementById("chat-widget-gender").className = '';
    switch (friend.gender) {
        case "Male":
            document.getElementById("chat-widget-gender").classList.add("hexagon-progress-40-44-male");
            break;
        case "Female":
            document.getElementById("chat-widget-gender").classList.add("hexagon-progress-40-44-female");
            break;
        case "Other":
            document.getElementById("chat-widget-gender").classList.add("hexagon-progress-40-44-other");
            break;
        default:
            document.getElementById("chat-widget-gender").classList.add("hexagon-progress-40-44");

    }
    let chatWidgetStatus = document.getElementById("chat-widget-status");
    let chatwidgetAvatarStatus = document.getElementById("chat-widget-avatar-status");

    chatWidgetStatus.className = '';
    chatWidgetStatus.classList.add("user-status-tag");
    chatwidgetAvatarStatus.className = '';
    chatwidgetAvatarStatus.classList.add("user-avatar", "small", "no-outline");

    var timeminus5 = new Date(messages["time"]);
    timeminus5.setMinutes(timeminus5.getMinutes() - 5);
    if ((new Date(friend.lastSeen)) > (timeminus5)) {
        switch (friend.status) {
            case "Offline":
                //node = node.replace("hexagon-progress-40-44", "hexagon-progress-40-44-male");
                chatWidgetStatus.classList.add("offline");
                chatWidgetStatus.textContent = "Offline";
                chatwidgetAvatarStatus.classList.add("offline");
                break;
            case "Busy":
                //node = node.replace("hexagon-progress-40-44", "hexagon-progress-40-44-female");
                chatWidgetStatus.classList.add("busy");
                chatWidgetStatus.textContent = "Busy";
                chatwidgetAvatarStatus.classList.add("busy");
                break;
            default:
                chatWidgetStatus.classList.add("online");
                chatWidgetStatus.textContent = "Online";
                chatwidgetAvatarStatus.classList.add("online");
                //node = node.replace("hexagon-progress-40-44", "hexagon-progress-40-44-other");
        }
    } else {
        // alert("offline");
        chatWidgetStatus.classList.add("offline");
        chatWidgetStatus.textContent = "Offline";
        chatwidgetAvatarStatus.classList.add("offline");
    }
    document.getElementById('chat-widget-conversation').textContent = '';

    let friendMessages = friend.messages;

    for (var key in friendMessages) {
        var friendMessage = friendMessages[key];
        if (friendMessage.id === messages.id) {
            addUserMessage(friendMessage.text, friendMessage.time);
        } else {
            addFriendMessage(friend, friendMessage.text, friendMessage.time);
        }
        time = friendMessage.time;
    }


    setChatMessageWidgetStyle();
    //alert(friend.name);
}

function setChatMessageFull(friend) {
    document.getElementById("chat-full-message").setAttribute("data-user", friend.name);
    document.getElementById("chat-full-avatar").setAttribute("data-src", friend.avatar);
    document.getElementById("chat-full-name").textContent = friend.fullName;
    document.getElementById("chat-full-gender").className = '';
    switch (friend.gender) {
        case "Male":
            document.getElementById("chat-full-gender").classList.add("hexagon-progress-40-44-male");
            break;
        case "Female":
            document.getElementById("chat-full-gender").classList.add("hexagon-progress-40-44-female");
            break;
        case "Other":
            document.getElementById("chat-full-gender").classList.add("hexagon-progress-40-44-other");
            break;
        default:
            document.getElementById("chat-full-gender").classList.add("hexagon-progress-40-44");

    }
    let chatWidgetStatus = document.getElementById("chat-full-status");
    let chatwidgetAvatarStatus = document.getElementById("chat-full-avatar-status");

    chatWidgetStatus.className = '';
    chatWidgetStatus.classList.add("user-status-tag");
    chatwidgetAvatarStatus.className = '';
    chatwidgetAvatarStatus.classList.add("user-avatar", "small", "no-outline");

    var timeminus5 = new Date(messages["time"]);
    timeminus5.setMinutes(timeminus5.getMinutes() - 5);
    if ((new Date(friend.lastSeen)) > (timeminus5)) {
        switch (friend.status) {
            case "Offline":
                //node = node.replace("hexagon-progress-40-44", "hexagon-progress-40-44-male");
                chatWidgetStatus.classList.add("offline");
                chatWidgetStatus.textContent = "Offline";
                chatwidgetAvatarStatus.classList.add("offline");
                break;
            case "Busy":
                //node = node.replace("hexagon-progress-40-44", "hexagon-progress-40-44-female");
                chatWidgetStatus.classList.add("busy");
                chatWidgetStatus.textContent = "Busy";
                chatwidgetAvatarStatus.classList.add("busy");
                break;
            default:
                chatWidgetStatus.classList.add("online");
                chatWidgetStatus.textContent = "Online";
                chatwidgetAvatarStatus.classList.add("online");
                //node = node.replace("hexagon-progress-40-44", "hexagon-progress-40-44-other");
        }
    } else {
        // alert("offline");
        chatWidgetStatus.classList.add("offline");
        chatWidgetStatus.textContent = "Offline";
        chatwidgetAvatarStatus.classList.add("offline");
    }
    document.getElementById('chat-full-conversation').textContent = '';

    let friendMessages = friend.messages;


    for (var key in friendMessages) {
        var friendMessage = friendMessages[key];
        if (friendMessage.id === messages.id) {
            addUserMessage(friendMessage.text, friendMessage.time);
        } else {
            addFriendMessage(friend, friendMessage.text, friendMessage.time);
        }
        lastMessagetime = friendMessage.time;
    }
    time = lastMessagetime;

    setChatMessageWidgetStyle();
    scrollToEndChatWidgetConversation();
    //alert(friend.name);
}

function setChatMessageWidgetStyle() {
    app.plugins.createHexagon({
        container: '.hexagon-image-30-32',
        width: 30,
        height: 32,
        roundedCorners: true,
        roundedCornerRadius: 1,
        clip: true
    });

    app.plugins.createHexagon({
        container: '.hexagon-progress-40-44',
        width: 40,
        height: 44,
        lineWidth: 3,
        roundedCorners: true,
        roundedCornerRadius: 1,
        gradient: {
            colors: ['#7750f8', '#7750f8']
        },
    });
    app.plugins.createHexagon({
        container: '.hexagon-progress-40-44-male',
        width: 40,
        height: 44,
        lineWidth: 3,
        roundedCorners: true,
        roundedCornerRadius: 1,
        gradient: {
            colors: ['#0496ff', '#0496ff']
        }
    });

    app.plugins.createHexagon({
        container: '.hexagon-progress-40-44-female',
        width: 40,
        height: 44,
        lineWidth: 3,
        roundedCorners: true,
        roundedCornerRadius: 1,
        gradient: {
            colors: ['#ff6fa9', '#ff6fa9']
        }
    });

    app.plugins.createHexagon({
        container: '.hexagon-progress-40-44-other',
        width: 40,
        height: 44,
        lineWidth: 3,
        roundedCorners: true,
        roundedCornerRadius: 1,
        gradient: {
            colors: ['#ff6fa9', '#0496ff']
        }
    });
    app.plugins.createHexagon({
        container: '.hexagon-border-40-44',
        width: 40,
        height: 44,
        lineWidth: 3,
        roundedCorners: true,
        roundedCornerRadius: 1,
        lineColor: '#293249'
    });
}

document.getElementById('chat-widget-message-text').addEventListener('keyup', function(e) {
    if (e.keyCode === 13) {
        sentMessage();
    }
});
document.getElementById('chat-widget-message-send').addEventListener('click', function() {
    sentMessage();
});
document.getElementById('btn-send-message').addEventListener('click', function() {
    sentMessage();
});
document.getElementById('chat-widget-close-button').addEventListener('click', closeChatMessageWidget);

let chatFullMessageText = document.getElementById('chat-full-message-text');
if (chatFullMessageText !== null) {
    chatFullMessageText.addEventListener('keyup', function(e) {
        if (e.keyCode === 13) {
            sentMessage();
        }
    });
}
let widgetConversationSend = document.getElementById('chat-widget-conversation-send');
if (widgetConversationSend !== null) {
    widgetConversationSend.addEventListener('click', sentMessage);
}

document.addEventListener('DOMContentLoaded', function() {
    getMessages();
});

let profileHeaderSendMessageButton = document.getElementById('profile-header-send-message');
if (profileHeaderSendMessageButton !== null) {
    profileHeaderSendMessageButton.addEventListener('click', profileHeaderSendMessage);
    profileHeaderSendMessageButton.addEventListener('click', globalOpenChatWidget);
}
//profile-friend-send-message
let profileHeaderSendMessageButtons = document.querySelectorAll('.profile-friend-send-message');
//for(var key in profileHeaderSendMessageButtons){
for (var key = 0; key < profileHeaderSendMessageButtons.length; key++) {
    const profileHeaderSendMessageButton = profileHeaderSendMessageButtons[key];
    if (typeof profileHeaderSendMessageButton != "undefined") {
        profileHeaderSendMessageButton.addEventListener('click', profileHeaderSendMessage);
        profileHeaderSendMessageButton.addEventListener('click', globalOpenChatWidget);
    }
}

let chatWidgetDeleteButton = document.getElementById('chat-widget-delete');
if (chatWidgetDeleteButton !== null) {
    chatWidgetDeleteButton.addEventListener('click', chatWidgetDelete);
}

let chatFullSearchInput = document.getElementById('chat-full-search');
if (chatFullSearchInput != null) {
    chatFullSearchInput.addEventListener('input', chatFullSearch);
}
let chatFullSearchClear = document.getElementById('chat-full-search-clear');
if (chatFullSearchClear != null) {
    chatFullSearchClear.addEventListener('click', chatFullSearch);
}

function chatFullSearch() {
    let query = document.getElementById('chat-full-search').value;
    let rows = document.getElementById('friends-chat-full-messages').querySelector(".simplebar-content").querySelectorAll('.chat-widget-message');
    for (var key in rows) {
        let row = rows[key];
        if (typeof row != "undefined" && typeof row.innerHTML != "undefined") {
            if (query.length > 2) {
                if (row.innerHTML.toLowerCase().indexOf(query.toLowerCase()) > -1) {
                    row.hidden = false;
                } else {
                    row.hidden = true;
                }
            } else {
                row.hidden = false;
            }
        }
    }
}

let chatWidgetSearchInput = document.getElementById('chat-widget-search');
if (chatWidgetSearchInput != null) {
    chatWidgetSearchInput.addEventListener('input', chatWidgetSearch);
}
let chatWidgetSearchClear = document.getElementById('chat-widget-search-clear');
if (chatWidgetSearchClear != null) {
    chatWidgetSearchClear.addEventListener('click', chatWidgetSearch);
}

function chatWidgetSearch() {
    let query = document.getElementById('chat-widget-search').value;
    let rows = document.getElementById('friends-chat-widget-messages').querySelector(".simplebar-content").querySelectorAll('.chat-widget-message');
    for (var key in rows) {
        let row = rows[key];
        if (typeof row != "undefined" && typeof row.innerHTML != "undefined") {
            if (query.length > 2) {
                if (row.innerHTML.toLowerCase().indexOf(query.toLowerCase()) > -1) {
                    row.hidden = false;
                } else {
                    row.hidden = true;
                }
            } else {
                row.hidden = false;
            }
        }
    }
}

function chatWidgetDelete() {
    user = document.getElementById('chat-full-message').getAttribute('data-user');
    let friend = messages["friends"].find(friend => friend["name"] === user);
    if (typeof friend != "undefined") {
        window.location.replace('/messages/' + user + '/delete');
    }
}

function profileHeaderSendMessage() {
    user = this.getAttribute('data-user');
    showChatMessageWidget(globalChatMessageWidget, this.dataset.user);
    /*
            widgetMessage.addEventListener('click', function(){
            showChatMessageWidget(globalChatMessageWidget, this.dataset.user);
        });
        widgetMessage.addEventListener('click', globalOpenChatWidget);
     */
}


function sentMessage() {
    let message = "";
    let user = "";
    if (!fullMessage) {
        message = document.getElementById('chat-widget-message-text').value;
        user = document.getElementById('chat-widget-message').getAttribute('data-user');
    } else {
        message = document.getElementById('chat-full-message-text').value;
        user = document.getElementById('chat-full-message').getAttribute('data-user');
    }
    let friend = messages["friends"].find(friend => friend["name"] === user);
    if (friend !== null && message.length > 0) {
        addUserMessage(message, messages.time);
        scrollToEndChatWidgetConversation();
        if (!fullMessage) {
            document.getElementById('chat-widget-message-text').value = "";
            document.getElementById('chat-widget-message-clear').click();
        } else {
            document.getElementById('chat-full-message-text').value = "";
            document.getElementById('chat-full-message-clear').click();
        }

        fetchApi("/messages/" + user + "/add", "post", { "message": message }, onloadGetMessages);
    }

    //    alert(message);
}

function getUserMessages(user) {
    liveChatUser = user;
    if (fullMessage) {
        liveChatUser = fullMessageFriendName;
    }
    if (liveChat) {
        setTimeout(function() {
            fetchApi("/messages/" + user + "/get", "post", { "time": time }, onloadGetUserMessages);
        }, timer);
    }
}

function contactNoFriend(user) {
    fetchApi("/messages/" + user + "/contactnofriend", "post", { "time": time }, onloadContactNoFriend);
}

function onloadContactNoFriend(xhr) {
    if (xhr.status == 200) {
        console.log("try show no friend!'");
        let data = JSON.parse(xhr.response);
        if (typeof data["friend"] != "undefined") {
            console.log("show no friend!'");
            let friend = data["friend"];
            setChatMessageWidget(friend);
            scrollToEndChatWidgetConversation();
            globalChatMessageWidget.classList.toggle(hiddenClass);
            liveMessages = false;
            liveChat = true;
            getUserMessages(friend.name);
        }
    }
}

function onloadGetUserMessages(xhr) {
    if (xhr.status == 200) {
        let data = JSON.parse(xhr.response);
        if (typeof data["messages"] != "undefined") {
            //console.log(data);
            let friendMessages = data["messages"];
            console.log(liveChatUser);
            let friend = messages["friends"].find(friend => friend["name"] === liveChatUser);
            if (fullMessage && friendMessages[0].id !== friend.id) {
                getUserMessages(liveChatUser);
                return;
            }
            for (var key in friendMessages) {
                var friendMessage = friendMessages[key];
                if (friendMessage.id !== messages.id) {
                    addFriendMessage(friend, friendMessage.text, friendMessage.time);
                    newMessageNotify();

                }
                time = friendMessage.time;
            }
            scrollToEndChatWidgetConversation();
        }
        //console.log(xhr.response);
        // messages = JSON.parse(xhr.response);
    }
    getUserMessages(liveChatUser);
}

function getMessages() {
    if (liveMessages) {
        //setTimeout(function() {
        fetchApi("/messages/get", "get", {}, onloadGetMessages);
        //}, timer);
    }
}

function getUpdates() {
    if (liveMessages) {
        setTimeout(function() {
            fetchApi("/messages/update", "post", { "time": messages.time }, onloadGetUpdates);
        }, timer);
    }
}

function onloadGetUpdates(xhr) {
    let canUpdate = true;
    if (xhr.status == 200) {
        //console.log(xhr.response);
        let data = JSON.parse(xhr.response);
        if (data.newMessage) {
            getMessages();
            canUpdate = false;
            if (!fullMessage) {
                newMessageNotify();
            }
        }
    }
    if (canUpdate) {
        getUpdates();
    }
}

function onloadGetMessages(xhr) {
    if (xhr.status == 200) {
        messages = JSON.parse(xhr.response);
        if (typeof messages["friends"] != "undefined") {
            if (!fullMessage) {
                addUserChatWidgetMessages(messages["friends"]);
            } else {
                addUserChatFullMessages(messages["friends"]);
            }
            addHeaderMessages(messages["friends"]);
        }
        //console.log(messages);
    }
    //getMessages();
    getUpdates();
}

function addUserChatWidgetMessages(friends) {
    let node = "";
    document.getElementById('friends-chat-widget-messages').querySelector(".simplebar-content").textContent = '';
    for (var key in friends) {
        var friend = friends[key];
        var gender = "";
        var status = "";
        var lastMessage = "";
        var lastSeen = "";
        switch (friend.gender) {
            case "Male":
                gender = "hexagon-progress-40-44-male";
                break;
            case "Female":
                gender = "hexagon-progress-40-44-female";
                break;
            case "Other":
                gender = "hexagon-progress-40-44-other";
                break;
            default:
                gender = "hexagon-progress-40-44";

        }

        var timeminus5 = new Date(messages["time"]);
        timeminus5.setMinutes(timeminus5.getMinutes() - 5);
        if ((new Date(friend.lastSeen)) > (timeminus5)) {
            switch (friend.status) {
                case "Offline":
                    status = "offline";
                    break;
                case "Busy":
                    status = "busy";
                    break;
                default:
                    status = "online";
            }
        } else {
            status = "offline";
        }

        if (typeof friend.lastMessage != "undefined") {
            lastMessage = friend.lastMessage.text;
            lastSeen = timeSince(messages.time, friend.lastMessage.time);
        } else {
            lastMessage = "";
            lastSeen = "";
        }

        node = `<div class="chat-widget-message" data-user="${friend.name}">
            <div class="user-status">
                <div class="user-status-avatar">
                    <div class="user-avatar small no-outline ${status}">
                        <div class="user-avatar-content">
                            <div class="hexagon-image-30-32" data-src="${friend.avatar}"></div>
                        </div>
                        <div class="user-avatar-progress">
                            <div class="${gender}"></div>
                        </div>
                        <div class="user-avatar-progress-border">
                            <div class="hexagon-border-40-44"></div>
                        </div>
                    </div>
                </div>
                <p class="user-status-title"><span class="bold">${friend.fullName}</span></p>
                <p class="user-status-text small">${lastMessage}</p>
                <p class="user-status-timestamp floaty">${lastSeen}</p>
            </div>
        </div>`;
        document.getElementById('friends-chat-widget-messages').querySelector(".simplebar-content").appendChild(createNodeFromString(node));
        //chatWidgetMessage = chatWidgetMessages.querySelectorAll('.chat-widget-message')

    }
    setChatMessageWidgetStyle();
    sidebarInit();
    chatWidgetSearch();
}

function addUserChatFullMessages(friends) {
    let node = "";
    document.getElementById('friends-chat-full-messages').querySelector(".simplebar-content").textContent = '';
    let requestedFriend = null;
    const urlParams = new URLSearchParams(window.location.search);
    const requestedFriendQuery = urlParams.get('friend');
    const requestedFriendObj = messages["friends"].find(friend => friend["name"] === requestedFriendQuery);
    if (typeof requestedFriendObj != "undefined") {
        requestedFriend = requestedFriendObj.name;
    }
    for (var key in friends) {
        var friend = friends[key];
        var gender = "";
        var status = "";
        var lastMessage = "";
        var lastSeen = "";
        var active = "";
        switch (friend.gender) {
            case "Male":
                gender = "hexagon-progress-40-44-male";
                break;
            case "Female":
                gender = "hexagon-progress-40-44-female";
                break;
            case "Other":
                gender = "hexagon-progress-40-44-other";
                break;
            default:
                gender = "hexagon-progress-40-44";

        }

        var timeminus5 = new Date(messages["time"]);
        timeminus5.setMinutes(timeminus5.getMinutes() - 5);
        if ((new Date(friend.lastSeen)) > (timeminus5)) {
            switch (friend.status) {
                case "Offline":
                    status = "offline";
                    break;
                case "Busy":
                    status = "busy";
                    break;
                default:
                    status = "online";
            }
        } else {
            status = "offline";
        }

        if (typeof friend.lastMessage != "undefined") {
            lastMessage = friend.lastMessage.text;
            lastSeen = timeSince(messages.time, friend.lastMessage.time);
        } else {
            lastMessage = "";
            lastSeen = "";
        }

        if (key == 0 && fullMessageFriendName === null && requestedFriend === null) {
            document.getElementById('chat-full-message').hidden = false;
            active = " active";
            setChatMessageFull(friend);
            fullMessageFriendName = friend.name;
            liveChat = true;
            getUserMessages(fullMessageFriendName);

        } else if (fullMessageFriendName === null && friend.name === requestedFriend) {
            document.getElementById('chat-full-message').hidden = false;
            active = " active";
            setChatMessageFull(friend);
            fullMessageFriendName = friend.name;
            liveChat = true;
            getUserMessages(fullMessageFriendName);
        }
        if (friend.name === fullMessageFriendName) {
            active = " active";
            setChatMessageFull(friend);
        }

        node = `<div class="chat-widget-message${active}" data-user="${friend.name}">
            <div class="user-status">
                <div class="user-status-avatar">
                    <div class="user-avatar small no-outline ${status}">
                        <div class="user-avatar-content">
                            <div class="hexagon-image-30-32" data-src="${friend.avatar}"></div>
                        </div>
                        <div class="user-avatar-progress">
                            <div class="${gender}"></div>
                        </div>
                        <div class="user-avatar-progress-border">
                            <div class="hexagon-border-40-44"></div>
                        </div>
                    </div>
                </div>
                <p class="user-status-title"><span class="bold">${friend.fullName}</span></p>
                <p class="user-status-text small">${lastMessage}</p>
                <p class="user-status-timestamp floaty">${lastSeen}</p>
            </div>
        </div>`;
        document.getElementById('friends-chat-full-messages').querySelector(".simplebar-content").appendChild(createNodeFromString(node));

    }
    setChatMessageWidgetStyle();
    fullChatInit();
    chatFullSearch();
}

function addHeaderMessages(friends) {
    let node = "";
    document.getElementById('header-chat-messages').querySelector(".simplebar-content").textContent = '';
    for (var key in friends) {
        var friend = friends[key];
        if (typeof friend.lastMessage != "undefined") {
            var gender = "";
            var status = "";
            var lastMessage = "";
            var lastSeen = "";
            switch (friend.gender) {
                case "Male":
                    gender = "hexagon-progress-40-44-male";
                    break;
                case "Female":
                    gender = "hexagon-progress-40-44-female";
                    break;
                case "Other":
                    gender = "hexagon-progress-40-44-other";
                    break;
                default:
                    gender = "hexagon-progress-40-44";
            }

            var timeminus5 = new Date(messages["time"]);
            timeminus5.setMinutes(timeminus5.getMinutes() - 5);
            if ((new Date(friend.lastSeen)) > (timeminus5)) {
                switch (friend.status) {
                    case "Offline":
                        status = "offline";
                        break;
                    case "Busy":
                        status = "busy";
                        break;
                    default:
                        status = "online";
                }
            } else {
                status = "offline";
            }

            if (typeof friend.lastMessage != "undefined") {
                lastMessage = friend.lastMessage.text;
                lastSeen = timeSince(messages.time, friend.lastMessage.time);
            } else {
                lastMessage = "";
                lastSeen = "";
            }

            node = `<a href="#" class="dropdown-box-list-item" data-user="${friend.name}">
            <div class="user-status">
                <div class="user-status-avatar">
                    <div class="user-avatar small no-outline ${status}">
                        <div class="user-avatar-content">
                            <div class="hexagon-image-30-32" data-src="${friend.avatar}"></div>
                        </div>
                        <div class="user-avatar-progress">
                            <div class="${gender}"></div>
                        </div>
                        <div class="user-avatar-progress-border">
                            <div class="hexagon-border-40-44"></div>
                        </div>
                    </div>
                </div>
                <p class="user-status-title"><span class="bold">${friend.fullName}</span></p>
                <p class="user-status-text small">${lastMessage}</p>
                <p class="user-status-timestamp floaty">${lastSeen}</p>
            </div>
        </a>`;
            document.getElementById('header-chat-messages').querySelector(".simplebar-content").appendChild(createNodeFromString(node));
        }
    }
    setChatMessageWidgetStyle();

    headerChatMessagesInit();
}

function addUserMessage(message, messageTime) {
    let node = `<div class="chat-widget-speaker right">
                <p class="chat-widget-speaker-message">${message}</p>
                <p class="chat-widget-speaker-timestamp">${timeSince(messages.time, messageTime)}</p>
                </div>`;

    if (!fullMessage) {
        document.getElementById('chat-widget-conversation').appendChild(createNodeFromString(node));
    } else {
        document.getElementById('chat-full-conversation').appendChild(createNodeFromString(node));
    }
}

function addFriendMessage(friend, message, messageTime) {
    let node = `<div class="chat-widget-speaker left">
            <div class="chat-widget-speaker-avatar">
                <div class="user-avatar tiny no-border">
                    <div class="user-avatar-content">
                        <div class="hexagon-image-24-26" data-src="${friend.avatar}"></div>
                    </div>
                </div>
            </div>
            <p class="chat-widget-speaker-message">${message}</p>
            <p class="chat-widget-speaker-timestamp">${timeSince(messages.time, messageTime)}</p>
        </div>`;

    if (!fullMessage) {
        document.getElementById('chat-widget-conversation').appendChild(createNodeFromString(node));
    } else {
        document.getElementById('chat-full-conversation').appendChild(createNodeFromString(node));
    }

    app.plugins.createHexagon({
        container: '.hexagon-image-24-26',
        width: 24,
        height: 26,
        roundedCorners: true,
        roundedCornerRadius: 1,
        clip: true
    });
}

/*function getTimeNow(){
    let time = new Date();
    return time.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
}*/

function scrollToEndChatWidgetConversation() {
    if (!fullMessage) {
        document.getElementById('chat-widget-conversation').scrollTo({ behavior: 'auto', top: document.getElementById('chat-widget-conversation').scrollHeight });
    } else {
        document.getElementById('chat-full-conversation').scrollTo({ behavior: 'auto', top: document.getElementById('chat-full-conversation').scrollHeight });
    }
}

function timeSince(time, messageTime) {
    time = new Date(time);
    time.setMinutes(time.getMinutes() + 0);

    var seconds = Math.floor((time - new Date(messageTime)) / 1000);

    var interval = seconds / 31536000;

    if (interval > 1) {
        return Math.floor(interval) + " years ago";
    }
    interval = seconds / 2592000;
    if (interval > 1) {
        return Math.floor(interval) + " months ago";
    }
    interval = seconds / 86400;
    if (interval > 1) {
        return Math.floor(interval) + " days ago";
    }
    interval = seconds / 3600;
    if (interval > 1) {
        return Math.floor(interval) + " hours ago";
    }
    interval = seconds / 60;
    if (interval > 1) {
        return Math.floor(interval) + " minutes ago";
    }
    //return Math.floor(seconds) + " seconds";
    return "now";
}

function newMessageNotify() {
    var promise = newMessageRingtone.play();
    if (promise !== undefined) {
        promise.then(_ => {
            // Autoplay started!
        }).catch(error => {
            // Autoplay was prevented.
            // Show a "Play" button so that user can start playback.
        });
    }
}

function sidebarInit() {

    let chatWidgetMessage = document.getElementById('friends-chat-widget-messages').querySelector(".simplebar-content").querySelectorAll('.chat-widget-message');
    for (const widgetMessage of chatWidgetMessage) {
        widgetMessage.addEventListener('click', function() {
            showChatMessageWidget(globalChatMessageWidget, this.dataset.user);
        });
        widgetMessage.addEventListener('click', globalOpenChatWidget);
    }
}

function fullChatInit() {
    let chatFullMessage = document.getElementById('friends-chat-full-messages').querySelector(".simplebar-content").querySelectorAll('.chat-widget-message');
    for (const fullMessage of chatFullMessage) {
        fullMessage.addEventListener('click', function() {
            changeFullMessageFriend(this);
        });
    }
}

function headerChatMessagesInit() {
    let headerChatMessages = document.getElementById('header-chat-messages').querySelector(".simplebar-content").querySelectorAll('.dropdown-box-list-item');
    for (const headerChatMessage of headerChatMessages) {
        headerChatMessage.addEventListener('click', function() {
            goFriendChatMessage(this);
        });
    }
}

function goFriendChatMessage(el) {
    let friendName = el.getAttribute("data-user");
    window.location.replace('/account-hub/messages?friend=' + friendName);
}

function changeFullMessageFriend(el) {
    if (!el.classList.contains("active")) {
        let friendName = el.getAttribute("data-user");
        let friend = messages["friends"].find(friend => friend["name"] === friendName);
        if (friend !== null) {
            let chatFullMessagesActive = document.getElementById('friends-chat-full-messages').querySelector(".simplebar-content").querySelectorAll('.chat-widget-message.active');
            for (const chatFullMessageActive of chatFullMessagesActive) {
                if (chatFullMessageActive.classList.contains("active")) {
                    chatFullMessageActive.classList.remove("active");
                }

            }
            el.classList.add("active");
            setChatMessageFull(friend);
            scrollToEndChatWidgetConversation();
            fullMessageFriendName = friend.name;
            time = new Date();
            //chatMessageWidget.classList.toggle(hiddenClass);
            /*liveMessages = true;
            liveChat = false;*/
            //getMessages();
        }
    }
}