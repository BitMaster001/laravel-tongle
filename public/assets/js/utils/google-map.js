
var $ = jQuery;

$(window).on('load',function () {
    if(typeof needLocation !== 'undefined' && needLocation === "1"){
        getLocation();
    }
    if($('.map-input').is('*')){
        console.log('map-ini');
        initializeMaps();
    }
});

$(window).ready(function () {
    formSubmitCheck();
    closeTopBar();
    askForLocation();
});

function initializeMaps() {

    jQuery('#map-input2').on('focus', function(){
        autocomplete = new google.maps.places.Autocomplete((document.getElementById("map-input2")), { types: ['geocode'] });
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();

            if(typeof place !== 'undefined'){
                $('.loc_lat').val(place.geometry.location.lat());
                $('.loc_lng').val(place.geometry.location.lng());
                //document.getElementById('loc_lat').value = place.geometry.location.lat();
                //document.getElementById('loc_lng').value = place.geometry.location.lng();
            }

        });

    });

    jQuery('#map-input1').on('focus', function(){

        autocomplete = new google.maps.places.Autocomplete((document.getElementById("map-input1")), { types: ['geocode'] });
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();

            if(typeof place !== 'undefined'){

                $('.loc_lat').val(place.geometry.location.lat());
                $('.loc_lng').val(place.geometry.location.lng());
                //document.getElementById('loc_lat').value = place.geometry.location.lat();
                //document.getElementById('loc_lng').value = place.geometry.location.lng();
            }
        });

    });

}

function closeTopBar(){
    $('.close-top-bar').on('click', function () {
        $(this).closest('.location-message-top-bar').remove();
    });
}

function formSubmitCheck(){
    $('form.byLocation').on('submit', function (e) {
       if(!$('input.loc_lat').val()){
           e.preventDefault();
           ShowError('Please Select Google Suggestion Places');
       }
    });
}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            $('.location-message-top-bar').removeClass('d-none');
            console.log("User denied the request for Geolocation.")
            break;
        case error.POSITION_UNAVAILABLE:
            console.log("Location information is unavailable.")
            break;
        case error.TIMEOUT:
            console.log("The request to get user location timed out.")
            break;
        case error.UNKNOWN_ERROR:
            console.log("An unknown error occurred.")
            break;

    }
}

function showPosition(position) {

    let lat = position.coords.latitude;
    let lang = position.coords.longitude;
    var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + lang + "&key=AIzaSyD5KPKoO7ZP-grfU1aOx2GD1ra1pQMBdAQ&sensor=true";

    $.getJSON(url, function (data) {
        if(data.status === "OK"){
            let address = data.results[0].formatted_address;
            if($('.map-input').is('*')){
                $('.map-input').val(address).focus();
                $('.loc_lat').val(lat);
                $('.loc_lng').val(lang);
            }
            $.ajax({
                type: "POST",
                url: '/map-search/ajax/location',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="request"]').attr('content')
                },
                data: {
                    longitude:lang,
                    latitude:lat,
                    address:address
                },
                success: function(data){

                }
            });
        }else{
            console.log('Something Went Wrong!');
        }

    });

}

function askForLocation(){

    if(jQuery('.3D-Map-Search').is('*')) {

        resetDefaultLocation();

        if (document.cookie.indexOf("navigator=true") === -1) {
            getLocation();
            document.cookie = "navigator=true; max-age=86400";
        }
    }
}

function resetDefaultLocation(){
    $('.defaultLatLng').on('click', function(e){
        e.preventDefault();
        $('.loc_lat').val($(this).data('lat'));
        $('.loc_lng').val($(this).data('lng'));

        $(this).closest('form').submit();
    })
}