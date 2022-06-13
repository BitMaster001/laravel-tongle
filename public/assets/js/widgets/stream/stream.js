class MediaHandler {
    constructor() {
    }
    getPermissions(){
        console.log('getPermissions');
        return new Promise((res, rej) => {
            navigator.mediaDevices.getUserMedia({video: true, audio: true})
                .then((stream) => {
                    res(stream);
                })
                .catch(err => {
                    console.log(`Unabled to featch stream ${err}`);
                });
        });
    }
}

let mediaHandler = new MediaHandler();
let mediaPermissions = null;
let channel = null;
let peers = {};
const APP_KEY = "12345";
const streamGoLiveButton = document.getElementById('stream-go-live');
if(streamGoLiveButton != null){
    streamGoLiveButton.addEventListener('click', streamGoLive);
}
const streamEndLiveButton = document.getElementById('stream-end-live');
if(streamEndLiveButton != null){
    streamEndLiveButton.addEventListener('click', streamEndLive);
}
const streamVideo = document.getElementById('stream-video');
const streamVideoPeer = document.getElementById('stream-video-peer');

function streamGoLive(){
    changeStreamGoLiveButtonStatus(false);
    changeStreamEndLiveButtonStatus(true);

    mediaPermissions = mediaHandler.getPermissions()
        .then((stream) => {
            console.log("start stream!");
            window.user.stream = stream;
            try{
                streamVideo.srcObject = stream;
            }catch(e){
                console.log(`Unable to start stream ${e}`);
                streamVideo.src = URL.createObjectURL(stream);
            }

            streamVideo.play();
        });
    callTo(2);
}

function streamEndLive(){
    changeStreamGoLiveButtonStatus(true);
    changeStreamEndLiveButtonStatus(false);
    streamVideo.pause();
    streamVideo.src = "";
}
function changeStreamGoLiveButtonStatus(show = false){
    if(show){
        streamGoLiveButton.style.display = "";
        return ;
    }
    streamGoLiveButton.style.display = "none";
}
function changeStreamEndLiveButtonStatus(show = false){
    if(show){
        streamEndLiveButton.style.display = "";
        return ;
    }
    streamEndLiveButton.style.display = "none";
}

function setupPusher(){
    //this.Pusher.logToConsole = true;
    console.log(window.user);
    /*this.Pusher = new Pusher(APP_KEY, {
        authEndpoint: '/pusher/auth',
        cluster: 'ap2',
        auth: {
            params: window.user.id,
            headers:{
                'X-CSRF-Token': window.csrfToken,
            }
        }
    });*/
    //this.channel = this.Pusher.subscribe('presence-video-channel');
    channel = window.Echo.join('presence-video-channel');
    //this.channel.bind(`client-signal-${window.user.id}`, (signal) => {
    window.Echo.channel.bind(`client-signal-${window.user.id}`, (signal) => {
        let peer = this.peers[signal.userId];
        //if peer is not alrady exists we got an incoming call
        if(peer === undefined){
            this.setState({otherUserId: signal.userId});
            peer = startPeer(signal.userId, false);
        }
        peer.signal(signal.data);
    });
}
setupPusher();

function startPeer(userId, initiator = true){
    const peer = new Peer({
        initiator,
        stream: window.user.stream,
        trickle: false,
    });

    peer.on('signal', (data) => {
        channel.trigger(`client-signal-${userId}`, {
            type: 'signal',
            userId: window.user.id,
            data: data
        });
    });

    peer.on('stream', (stream) => {
        try{
            streamVideoPeer.srcObject = stream;
        }catch(e){
            console.log(`Unable to start stream peer ${e}`);
            streamVideoPeer.src = URL.createObjectURL(stream);
        }

        streamVideoPeer.play();
    });

    peer.on('close', () => {
        let peer = this.peers[userId];
        if(peer == undefined){
            peer.destroy();
        }

    });

    return peer;
}

function callTo(userId){
peers[userId] = startPeer(userId);
}
