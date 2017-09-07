<div id="property-details">
    <div class="container">
        <article>
            <div class="breadcrumb"><a href="/property"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back to Site Plan</a></div>
            <% if $Floors %>
                <ul class="floorList">
                    <% loop $Floors %>
                        <li><a href="/property/floors/$FloorNumber"
                               <% if $FloorNumber == $Up.CurrentFloorNumber %>class="selected"<% end_if %>>$Name</a>
                        </li>
                    <% end_loop %>
                </ul>
            <% end_if %>

            <div class="floorDetails">
                <div class="floorImage">
                    <% if SelectedFloor %>
                        <% loop SelectedFloor %>
                            $MainImage
                        <% end_loop %>
                    <% end_if %>
                    <p>&copy; TO VIEW FLOOR PLANS, CLICK AVAILABLE UNIT NUMBERS</p>
                </div>
                <div class="roomTable">

                    <table id="roomDataTable" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Floor</th>
                            <th>Unit No.</th>
                            <th>* Price Inc. VAT</th>
                            <th>Bedrooms</th>
                            <th>Interior m<sup>2</sup></th>
                            <th>Terrace m<sup>2</sup></th>
                            <th>Total m<sup>2</sup></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Floor</th>
                            <th>Unit No.</th>
                            <th>* Price Inc. VAT</th>
                            <th>Bedrooms</th>
                            <th>Interior m<sup>2</sup></th>
                            <th>Terrace m<sup>2</sup></th>
                            <th>Total m<sup>2</sup></th>
                        </tr>
                        </tfoot>
                        <tbody>
                            <% if Rooms %>
                                <% loop Rooms %>
                                <tr <% if AvailabilityStatus == 'Not Available' %>class="sold"<% end_if %>>
                                    <td>$FloorNumber</td>
                                    <td>$UnitNumber</td>
                                    <td>$Price</td>
                                    <td>$Bedrooms</td>
                                    <td>$InteriorSize</td>
                                    <td>$ExteriorSize</td>
                                    <td>$TotalSize</td>
                                </tr>
                                <% end_loop %>
                            <% end_if %>
                        </tbody>
                    </table>

                </div>
            </div>

        </article>
    </div>
</div>