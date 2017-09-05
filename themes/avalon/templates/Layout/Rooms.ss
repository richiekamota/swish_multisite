<div id="property-details">
    <div class="container">
        <article>
            <div class="breadcrumb"><a href="/property">Back to Site Plan</a></div>
            <% if Floors %>
                <ul class="floorList">
                    <% loop Floors %>
                        <li><a href="#floor$FloorNumber">$Name</a></li>
                    <% end_loop %>
                </ul>
            <% end_if %>

            <div class="floorDetails">
                <div class="FloorImage">
                    $MainImage
                </div>
            </div>

        </article>
    </div>
</div>