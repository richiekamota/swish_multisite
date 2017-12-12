// Code related to the maps
var mapMarkers = [];
var initialMapMarkers = [];
var map;
function initMap() {

  // NOTE: We get the map locations from the pages script tags, spat out by SilverStripe
  map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: { lat: parseFloat(mapLocations[0].lat), lng: parseFloat(mapLocations[0].long) },
      styles: [
        {
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#ffffff"
            }
          ]
        },
        {
          "elementType": "labels.icon",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#616161"
            }
          ]
        },
        {
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#f5f5f5"
            }
          ]
        },
        {
          "featureType": "administrative.land_parcel",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#bdbdbd"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#eeeeee"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#757575"
            }
          ]
        },
        {
          "featureType": "poi.business",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#e5e5e5"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "labels.text",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#9e9e9e"
            }
          ]
        },
        {
          "featureType": "road",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#ffffff"
            }
          ]
        },
        {
          "featureType": "road.arterial",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road.arterial",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#d94133"
            },
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road.arterial",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#757575"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#f4c498"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "labels",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#616161"
            }
          ]
        },
        {
          "featureType": "road.local",
          "stylers": [
            {
              "color": "#d9d8ca"
            }
          ]
        },
        {
          "featureType": "road.local",
          "elementType": "labels",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road.local",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#9e9e9e"
            }
          ]
        },
        {
          "featureType": "transit.line",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#e5e5e5"
            }
          ]
        },
        {
          "featureType": "transit.station",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#eeeeee"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#c5cecb"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#9e9e9e"
            }
          ]
        }
      ]
  });

  createInitalMarkers();

}

function createInitalMarkers () {

  for (var i = 0; i < mapLocations.length; i++) {

    // Add the marker to the array of displayed markers
    var marker = new google.maps.Marker({
        position: {lat: parseFloat(mapLocations[i].lat), lng: parseFloat(mapLocations[i].long)},
        map: map,
        title: mapLocations[i].name,
        icon: 'http://swishproperties.incendiaryblue.com/themes/multisite/images/mapswish.png',
    });
    marker.description = mapLocations[i].description;
    marker.category = mapLocations[i].category;
    marker.image = mapLocations[i].image;

    var infoWindow = new google.maps.InfoWindow();
    // Add click event and info window to the marker
    marker.addListener('click', function() {
        var html = '<div class="map__marker-info">' +
            '<div class="map__marker-info-image" style="background-image: url('+ this.image  +'); "></div>' +
            "<span class='map__marker-info-title'>" + this.title + "</span>" +
            "<span class='map__marker-info-category'>" +  this.category + "</span>" +
            "<span class='map__marker-info-desc'>" + this.description + "</span>" +
            '</div>';
        infoWindow.setContent(html);
        infoWindow.open(map, this);
    });

    mapMarkers.push(marker);

  }

}

// Function to display the map markers on the map
function createMarkersArray(category){

  for (var i = 0; i < mapMarkers.length; i++) {
    if (mapMarkers[i].category == category || category == 'all') {

      mapMarkers[i].setMap(map);

    } else {

      mapMarkers[i].setMap(null);

    }
  }

};
