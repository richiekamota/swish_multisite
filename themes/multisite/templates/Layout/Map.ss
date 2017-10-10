<div class="map-container">
    <div id="map" class="map">
    </div>
    <div class="map__category">
        <% loop $uniqueLocationCategories %>
            <div class="map__category-option">
                <input type="checkbox" name="mapCategories" value="$category" id="category_$category" onchange="changeMarkersCategory('mapCategories')" checked>
                <label for="category_$category">$category</label>
            </div>
        <% end_loop %>
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
          description: "$Description",
          category: "$Category",
          image: "$MainImage.URL",
        });
    </script>
<% end_loop %>

<script type="text/javascript" src="{$ThemeDir}/javascript/maps.js"></script>
