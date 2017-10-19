// Code related to the maps
var mapMarkers = [];
function initMap() {

    // NOTE: We get the map locations from the pages script tags, spat out by SilverStripe
    var map = new google.maps.Map(document.getElementById('map'), {
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

    // Going over the locations and convert them into marker objects and add them to a new array
    for (var i = 0; i < mapLocations.length; i++) {
        var marker = new google.maps.Marker({
            position: {lat: parseFloat(mapLocations[i].lat), lng: parseFloat(mapLocations[i].long)},
            map: map,
            title: mapLocations[i].name,
            icon: {
                path: google.maps.SymbolPath.CIRCLE,
                scale: 10,
                strokeColor: '#e75300',
                strokeWeight: 4,
            },
        });
        marker.description = mapLocations[i].description;
        marker.category = mapLocations[i].category;
        marker.image = mapLocations[i].image;
        mapMarkers.push(marker);
    }

    var infoWindow = new google.maps.InfoWindow();
    // Add click event and info window to the marker
    mapMarkers.forEach(function (marker) {
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
    });
}

function changeMarkersCategory(checkBoxName) {

    // Let's get the values of the checkbox
    var checkboxes = document.querySelectorAll('[name=' + checkBoxName +']');
    var checkedCategories = [];
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checkedCategories.push(checkboxes[i].value);
        }
    }

    mapMarkers.forEach(function(marker) {
        // marker.setVisible(false);
        marker.setIcon(
            {
                path: google.maps.SymbolPath.CIRCLE,
                scale: 10,
                strokeColor: '#000',
                strokeWeight: 4,
            }
        );
        // Iterate through categories
        checkedCategories.forEach(function(category) {
            if (marker.category == category) {
                // marker.setVisible(true);
                marker.setIcon(
                    {
                        path: google.maps.SymbolPath.CIRCLE,
                        scale: 10,
                        strokeColor: '#e75300',
                        strokeWeight: 4,
                    }
                );
            }
        });
    });
}