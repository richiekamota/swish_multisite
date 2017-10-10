// Code related to the maps
function initMap() {

    var markers = [];

    // NOTE: We get the map locations from the pages script tags, spat out by SilverStripe
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: { lat: parseFloat(mapLocations[0].lat), lng: parseFloat(mapLocations[0].long) }
    });

    // Going over the locations and convert them into marker objects and add them to a new array
    for (var i = 0; i < mapLocations.length; i++) {
        var marker = new google.maps.Marker({
            position: {lat: parseFloat(mapLocations[i].lat), lng: parseFloat(mapLocations[i].long)},
            map: map,
            title: mapLocations[i].name,
        });
        marker.description = mapLocations[i].description;
        markers.push(marker);
    }

    var infoWindow = new google.maps.InfoWindow();
    // Add click event and info window to the marker
    markers.forEach(function (marker) {
        marker.addListener('click', function() {
            var html = this.title +
                "<br/>" + this.description;
            infoWindow.setContent(html);
            infoWindow.open(map, this);
        });
        // Hide the markers
        // marker.setVisible(false);
    });
}