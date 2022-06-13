function reactionOptionButtonsClick(){
    const reaction = this.getAttribute('data-title');
    const commentPid = this.closest('.reaction-options').getAttribute('data-comment');
    if(commentPid != null){
        sendNewReaction("Reply", commentPid, reaction);
    }else {
        const postPid = this.closest('.reaction-options').getAttribute('data-post');
        if (postPid != null) {
            sendNewReaction("Post", postPid, reaction);
        }
    }
}

function sendNewReaction(type, pid, reaction){
    let data = {};
    data['type'] = type;
    data['pid'] = pid;
    data['reaction'] = reaction;
    fetchApi("/reactions/add", "post", data, onloadSendNewReaction);
}

function onloadSendNewReaction(xhr){
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
        console.log(data);
        if(typeof (data.reactions) != "undefined"){
            const reactions = data.reactions.reactions;
            const user = data.reactions.user;
            const source = data.reactions.source;
            showReactions(source, user, reactions);

        }
    }else{
        ShowDanger("Oops something unusually went wrong, Please try again.");
    }
}

function showReactions(source, user, reactions){

if(source.type == "Post"){
    const postBox = document.querySelector(".widget-box[data-post='"+source.pid+"']");
    if(postBox != null){
        const reactionsHtml = generateReactions(source, user, reactions);
        postBox.querySelector(".content-post-action").innerHTML = '';
        postBox.querySelector(".content-post-action").appendChild(createNodesFromString(reactionsHtml));
        dropdownBoxMemberStyle();
        commentsBoxPostStyle();
    }

}else if(source.type == "Reply"){
    const commentBox =  document.querySelector(".post-comment[data-comment='"+source.pid+"']");
    if(commentBox != null){
        const reactionsHtml = generateReactionsSmall(source, user, reactions);
        const contentReplyActionLine = commentBox.querySelector(".content-reply-action .content-reply-action-line");
        if(contentReplyActionLine != null){
            contentReplyActionLine.remove();
        }
        commentBox.querySelector(".content-reply-action").prepend(createNodesFromString(reactionsHtml));
        dropdownBoxMemberStyle();
        commentsBoxPostStyle();
    }
}
}

function generateReactions(source, user, reactions){
    let node = '';
    let mojos = '';
    let participants = 0;
    for (const [key, value] of Object.entries(reactions)) {
        if(reactions[key].length>0){
            const keyLower = key.toLowerCase();
            mojos += `<div class="reaction-item"><img class="reaction-image reaction-item-dropdown-trigger"
                        src="/assets/img/reaction/${keyLower}.png" alt="reaction-${keyLower}">
                    <div class="simple-dropdown padded reaction-item-dropdown">
                        <p class="simple-dropdown-text"><img class="reaction" src="/assets/img/reaction/${keyLower}.png"
                                alt="reaction-${keyLower}"> <span class="bold">${key}</span></p>`;
            for(let key1 = 0; key1 < reactions[key].length; key1++){
                mojos += `<p class="simple-dropdown-text">${reactions[key][key1]}</p>`
                participants++;
            }
            mojos += '</div></div>'
        }
    }
    if(participants>0){
        node = `<div class="meta-line">
            <div class="meta-line-list reaction-item-list">
            ${mojos}
            </div>
        </div>
        <div class="meta-line">
            <p class="meta-line-text">${participants} Participants</p>
        </div>`;
    }
return node;
}

function generateReactionsSmall(source, user, reactions){
    let node = '';
    let mojos = '';
    let participants = 0;
    for (const [key, value] of Object.entries(reactions)) {
        if(reactions[key].length>0){
            const keyLower = key.toLowerCase();
            mojos += `<div class="reaction-item"><img class="reaction-image reaction-item-dropdown-trigger"
                        src="/assets/img/reaction/${keyLower}.png" alt="reaction-${keyLower}">
                    <div class="simple-dropdown padded reaction-item-dropdown">
                        <p class="simple-dropdown-text"><img class="reaction" src="/assets/img/reaction/${keyLower}.png"
                                alt="reaction-${keyLower}"> <span class="bold">${key}</span></p>`;
            for(let key1 = 0; key1 < reactions[key].length; key1++){
                mojos += `<p class="simple-dropdown-text">${reactions[key][key1]}</p>`
                participants++;
            }
            mojos += '</div></div>'
        }
    }
    if(participants>0){
        node = `<div class="meta-line content-reply-action-line">
            <div class="meta-line-list reaction-item-list small">
            ${mojos}
            </div>
            <p class="meta-line-text">${participants}</p>
        </div>`;
    }
    return node;
}
