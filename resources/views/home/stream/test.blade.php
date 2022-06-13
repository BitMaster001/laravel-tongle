
@extends('home.stream.master')

@section('content')
<p id="power">0</p>
<ul id="events"></ul>
@endsection

@section('footer')
<script src="/js/app.js"></script>
<!--<script src="//{{ Request::getHost() }}:3000/socket.io/socket.io.js"></script>-->
    <script>
        window.Echo.channel('streamfire')
            .listen('streamFire', (e) => {
                console.log('StreamFire');
                console.log(e);
            });
        //var socket = io('http://localhost:3000');

/*        const $events = document.getElementById('events');

        const newItem = (content) => {
            const item = document.createElement('li');
            item.innerText = content;
            return item;
        };*/

        /*var socket = io('https://tongle.ved:3000');
        socket.on('connect', () => {
            $events.appendChild(newItem('connect'));
        });*/
        /*socket.on("StreamFire", function(message){
            console.log("StreamFire");
            $events.appendChild(newItem('test_channel'));
            // increase the power everytime we load test route
            //alert('fire');
            //$('#power').text(parseInt($('#power').text()) + parseInt(message.data.power));
        });*/

        /*var io = require('socket.io')(4001)

        io.httpServer.on('listening', function () {
            console.log('listening on port', io.httpServer.address().port)
        })*/




       /* window.Echo.channel('test-event')
            .listen('StreamFire', (e) => {
                console.log(e);
            });
*/
        //console.log(Echo.socketId());
/*        socket.on('connect', () => {
            // either with send()
            socket.send('Hello!');

            // or with emit() and custom event names
            socket.emit('salutations', 'Hello!', { 'mr': 'john' }, Uint8Array.from([1, 2, 3, 4]));
        });
        socket.on('message', data => {
            console.log(data);
        });
        socket.on('greetings', (elem1, elem2, elem3) => {
            console.log(elem1, elem2, elem3);
        });*/

    </script>
@endsection
