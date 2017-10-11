<div class="container">

    <article>
        <div class="content">$Content</div>

        $Form

        <h3>Swish Head Office:</h3>

        <div class="row">
            <div class="col-lg-6">
                <p>8th floor<br/>
                    80 Strand Street<br/>
                    Cape Town<br/>
                    8005
                </p>
            </div>
            <div class="col-lg-6">
                <div id="map"></div>
                <script>
                  function initMap() {
                    var location = {lat: $GPSLat, lng: $GPSLng};
                    var map = new google.maps.Map(document.getElementById('map'), {
                      zoom: 4,
                      center: location
                    });
                    var marker = new google.maps.Marker({
                      position: location,
                      map: map
                    });
                  }
                </script>
            </div>
        </div>
        
    </article>

    <% if Image1 && Image2 %>
        <div class="row images">
            <div class="col-lg-6">
                $Image1
            </div>
            <div class="col-lg-6">
                $Image2
            </div>
        </div>
    <% end_if %>



</div>
