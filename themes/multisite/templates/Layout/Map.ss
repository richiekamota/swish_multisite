<div id="map-container">
    <div id="map" class="map">
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
        });
    </script>
<% end_loop %>

<%--<% loop $uniqueLocationCategories %>--%>
    <%--$Debug--%>
<%--<% end_loop %>--%>


<script type="text/javascript" src="{$ThemeDir}/javascript/maps.js"></script>