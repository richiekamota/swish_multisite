<div class="map-container">
    <div id="map" class="map">
    </div>
    <div class="map__categories">
        <% if $uniqueLocationCategories %>
        <ul>
            <li>
                <label for="category_all" class="map__category"  style="background-image: url('{$ThemeDir}/images/map-all.jpg')">
                    All
                    <input type="checkbox" name="mapCategories" value="all" id="category_all" onchange="createMarkersArray('all')">
                </label>
            </li>
            <% loop $uniqueLocationCategories %>
                <li>
                    <label for="category_$name" class="map__category"  style="background-image: url($image.URL)">
                        $name
                        <input type="checkbox" name="mapCategories" value="$name" id="category_$name" onchange="createMarkersArray('$name')">
                    </label>
                </li>
            <% end_loop %>
        </ul>
        <% end_if %>
    </div>
</div>

<%-- The map marker values from SilverStripe --%>
<script>
    var mapLocations = [];
</script>
<% loop $Locations %>
    <script>
        mapLocations.push({
          name: "$Title",
          lat: "$Lat",
          long: "$Long",
          description: '$Description',
          category: "$Category.Name",
          image: "$Thumbnail.PaddedImage(230, 150, FFFFFF).URL",
        });
    </script>
<% end_loop %>

<script type="text/javascript" src="{$ThemeDir}/javascript/maps.js"></script>
