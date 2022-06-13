var delay = makeDelay(600);
var  headerSearchInput = document.getElementById("header-search");
if (headerSearchInput !== null){
    headerSearchInput.addEventListener("input", function () {
        var queryValue = this.value;
        headerSearchDropdownShow(false);
        if(queryValue.length > 2 ) {
            delay(function(){
                    headerSearch(queryValue);
            });
        }else{
            headerSearchDropdownShow(false);
        }

    });
}

let headerSearchClearButton = document.getElementById("header-search-clear");
if(headerSearchClearButton !== null){
    headerSearchClearButton.addEventListener("click", function(){
        headerSearchDropdownShow(false);
    });

}

function makeDelay(ms) {
    var timer = 0;
    return function(callback){
        clearTimeout (timer);
        timer = setTimeout(callback, ms);
    };
};

function headerSearch (queryValue){
    fetchApi("/widget/search", "post", {"query-value": queryValue}, onloadHeaderSearch);
    headerSearchDropdownShow(true);
}

function onloadHeaderSearch (xhr){
    headerSearchDropdownShow(false);
    var headerSearchDropdown = document.getElementById("header-search-dropdown");
    if(headerSearchDropdown !== null) {
        if (xhr.status == 200) {
            setTimeout(function() {
            var data = JSON.parse(xhr.response);
            var members = data.members;
            headerSearchDropdown.innerHTML = '';
            if (members.length > 0) {
                headerSearchDropdown.appendChild(getDropdownBoxCategory("Members"));
                for (var key in members) {
                    var member = members[key];
                    headerSearchDropdown.appendChild(getDropdownBoxMember(member.username, member.full_name, member.gender, member.avatar, member.profile));

                }
            }
                let groups = data.groups;
                if (groups.length > 0) {
                    headerSearchDropdown.appendChild(getDropdownBoxCategory("Groups"));
                    for (var key in groups) {
                        var group = groups[key];
                        headerSearchDropdown.appendChild(getDropdownBoxGroup(group.username, group.name, group.avatar, group.profile, group.members));

                    }
                }

                let items = data.items;
                if (items.length > 0) {
                    headerSearchDropdown.appendChild(getDropdownBoxCategory("Marketplace"));
                    for (var key in items) {
                        var item = items[key];
                        headerSearchDropdown.appendChild(getDropdownBoxItem(item.title, item.name, item.avatar, item.profile));

                    }
                }


                if(members.length > 0 || groups.length > 0 || items.length > 0){
                    dropdownBoxMemberStyle();
                }else{
                    headerSearchDropdown.appendChild(getDropdownBoxCategory("Unfortunately, no results were found."));
                }

            headerSearchDropdownShow(true);
            }, 400);
        }
    }
}


function headerSearchDropdownShow(show){
    var headerSearchDropdown = document.getElementById("header-search-dropdown");
    if(headerSearchDropdown !== null){
    if(show === true){
        headerSearchDropdown.style = "position: absolute; z-index: 9999; top: 57px; left: 0px; opacity: 1; visibility: visible; transform: translate(0px, 0px); transition: transform 0.4s ease-in-out 0s, opacity 0.4s ease-in-out 0s, visibility 0.4s ease-in-out 0s;"
    }else{
        headerSearchDropdown.style = "position: absolute; z-index: 9999; top: 57px; left: 0px; opacity: 0; visibility: hidden; transform: translate(0px, -40px); transition: transform 0.4s ease-in-out 0s, opacity 0.4s ease-in-out 0s, visibility 0.4s ease-in-out 0s;";
        setTimeout(function() {
        headerSearchDropdown.innerHTML = '';
        headerSearchDropdown.appendChild(getLoaderIndicator());
        }, 300);
    }
    }
}

function getDropdownBoxMember(username, fullName, gender, avatar, profile){
    if(avatar == null){
        avatar = '/storage/default/user/profile/avatar.jpg';
    }
    var node = `<div class="dropdown-box-list small no-scroll"><a class="dropdown-box-list-item" href="${profile}">
                    <div class="user-status notification">
                        <div class="user-status-avatar">
                            <div class="user-avatar small no-outline">
                                <div class="user-avatar-content">
                                    <div class="hexagon-image-30-32" data-src="${avatar}"></div>
                                </div>
                                <div class="user-avatar-progress">
                                    <div class="hexagon-progress-40-44"></div>
                                </div>
                                <div class="user-avatar-progress-border">
                                    <div class="hexagon-border-40-44"></div>
                                </div>
                            </div>
                        </div>
                        <p class="user-status-title"><span class="bold">${fullName}</span></p>
                        <p class="user-status-text">@${username}</p>
                        <div class="user-status-icon">
                            <svg class="icon-friend">
                                <use xlink:href="#svg-friend"></use>
                            </svg>
                        </div>
                    </div>
                </a></div>`;
    switch(gender) {
        case "Male":
            node = node.replace("hexagon-progress-40-44", "hexagon-progress-40-44-male");
            break;
        case "Female":
            node = node.replace("hexagon-progress-40-44", "hexagon-progress-40-44-female");
            break;
        case "Other":
            node = node.replace("hexagon-progress-40-44", "hexagon-progress-40-44-other");
            break;
    }
    return createNodeFromString(node);
}

function getDropdownBoxGroup(username, name, avatar, profile, members){
    if(avatar == null){
        avatar = '/storage/default/user/profile/avatar.jpg';
    }
    var node = `<div class="dropdown-box-list small no-scroll">
          <a class="dropdown-box-list-item" href="${profile}">
            <div class="user-status notification">
              <div class="user-status-avatar">
                <div class="user-avatar small no-border">
                  <div class="user-avatar-content">
                    <div class="hexagon-image-40-44" data-src="${avatar}"></div>
                  </div>
                </div>
              </div>
              <p class="user-status-title"><span class="bold">${name}</span></p>
              <p class="user-status-text">${members} members</p>
              <div class="user-status-icon">
                <svg class="icon-group">
                  <use xlink:href="#svg-group"></use>
                </svg>
              </div>
            </div>
          </a>
        </div>`;

    return createNodeFromString(node);
}

function getDropdownBoxItem(title, name, avatar, profile){
    if(avatar == null){
        avatar = '/storage/default/user/profile/avatar.jpg';
    }
    var node = `<div class="dropdown-box-list small no-scroll">
          <a class="dropdown-box-list-item" href="${profile}">
            <div class="user-status no-padding-top">
              <div class="user-status-avatar">
                <figure class="picture small round liquid">
                  <img src="${avatar}">
                </figure>
              </div>
              <p class="user-status-title"><span class="bold">${title}</span></p>
              <p class="user-status-text">By ${name}</p>
              <div class="user-status-icon">
                <!-- ICON MARKETPLACE -->
                <svg class="icon-marketplace">
                  <use xlink:href="#svg-marketplace"></use>
                </svg>
              </div>
            </div>
          </a>
        </div>`;

    return createNodeFromString(node);
}

function getDropdownBoxCategory(text){
    return createNodeFromString(`<div class="dropdown-box-category"><p class="dropdown-box-category-title">${text}</p></div>`);
}

function getLoaderIndicator(){
    return createNodeFromString('<div class="dropdown-box-category"><div class="page-loader-indicator loader-bars"><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div></div></div>');
}

function createNodeFromString(str){
    var template = document.createElement('template');
    str = str.trim();
    template.innerHTML = str;
    return template.content.firstChild;
}

function createNodesFromString(str){
    var template = document.createElement('template');
    str = str.trim();
    template.innerHTML = str;
    return template.content;
}

function dropdownBoxMemberStyle(){
    app.plugins.createHexagon({
        container: '.hexagon-image-30-32',
        width: 30,
        height: 32,
        roundedCorners: true,
        roundedCornerRadius: 1,
        clip: true
    });
    app.plugins.createHexagon({
        container: '.hexagon-image-40-44',
        width: 40,
        height: 44,
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

    app.querySelector('.liquid', function (images) {
        for (const image of images) {
            app.liquidify(image);
        }
    });

}

function fetchApi(url, method, data, onLoadCallBack){
    var xhr = new XMLHttpRequest();
    xhr.timeout = 60000;
    xhr.open(method, url, true);
    data['_token']=document.querySelector('meta[name="request"]').getAttribute('content');
    var formData = new FormData();
    for (const [key, value] of Object.entries(data)) {
        if(typeof(value) != 'object'){
        formData.append(key+"", value);
        }else{
            if(!Array.isArray(value)){
                formData.append(key+"", value);
            }else{
            for (const [key1, value1] of Object.entries(value)) {
                formData.append(key+"[]", value1);
            }
            }
        }
    }
    /*console.log(data);
    for (var pair of formData.entries()) {
        console.log(pair[0]+ ', ' + pair[1]);
    }*/
    xhr.send(formData);
    /*xhr.send(JSON.stringify({
        value: value
    }));*/
    xhr.onload = function() {
        onLoadCallBack(xhr);
    };

    xhr.onerror = function() { // only triggers if the request couldn't be made at all
       // alert(`Network Error`);
        ShowError("Network error, please connect and try again!");
    };
    //xhr.onprogress = function(event) {
    // event.loaded - how many bytes downloaded
    // event.lengthComputable = true if the server sent Content-Length header
    // event.total - total number of bytes (if lengthComputable)
    //   alert(`Received ${event.loaded} of ${event.total}`);
    //};
}
