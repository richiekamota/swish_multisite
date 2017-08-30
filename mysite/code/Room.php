<?php
class Room extends DataObject {
    private static $db = array(
        'Name' => 'Varchar(255)',
        'Bedrooms' => 'Int',
        'Bathrooms' => 'Int',
        'FloorNumber' => 'Int',
        'Price' => 'Varchar(255)',
        'AvailabilityStatus' => 'Enum("Available", Not Available")',
        'AvailabilityDate' => 'SSDatetime',
        'SortOrder' => 'Int'
    );

    static $summary_fields = array(
        'Name' => 'Name'
         'Price' => 'Price'
          'AvailabilityStatus' => 'Availability'
    );

    private static $default_sort='SortOrder';


    public function getCMSFields() {

        $fields = FieldList::create(
            TextField::create('Name'),
            TreeDropdownField::create("Link", "Page to link to:", "SiteTree")
        );

        return $fields;
    }

}