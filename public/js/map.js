
var markers = [];
var Map;

function AddKosanMap() {

    Map = new google.maps.Map(document.getElementById('map'), {
        zoom: 18,
        streetViewControl :false
    });

    navigator.geolocation.getCurrentPosition(function (pos) {
        var position = {lat: pos.coords.latitude, lng: pos.coords.longitude};
        Map.setCenter(position);
    });

    google.maps.event.addListener(Map, 'click', function (event) {
        for (var i = 0; i < markers.length; i++)
            markers[i].setMap(null);
        marker = new google.maps.Marker({
            position: event.latLng,
            map: Map
        });
        document.getElementById('latitude').value = marker.position.lat();
        document.getElementById('longitude').value = marker.position.lng();
        markers.push(marker);
    });

}
