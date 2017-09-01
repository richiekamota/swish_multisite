<?php

class Room extends DataObject
{
    // Contact object's fields
    public static $db = array(
        'Name' => 'Varchar(255)',
        'Description' => 'HTMLText',
        'Bedrooms' => 'Int',
        'Bathrooms' => 'Int',
        'FloorNumber' => 'Int',
        'Price' => 'Varchar(255)',
        'AvailabilityStatus' => 'Enum("Available,Not Available")',
        'AvailabilityDate' => 'SSDatetime',
        'SortID' => 'Int'
    );

    // One-to-one relationship with profile picture and contact list page
    public static $has_one = array(
        'Thumbnail'       => 'Image',
        'MainImage'       => 'Image',
        'Apartment' => 'Apartment'
    );

    // Summary fields
    public static $summary_fields = array(
        'Name'      => 'Name',
        'Price' => 'Price',
        'AvailabilityStatus'   => 'Availability'
    );

    public function getCMSFields()
    {

        // Profile picture field
        $thumbField = new UploadField('Thumbnail', 'Thumbnail');
        $thumbField->allowedExtensions = array('jpg', 'png', 'gif');

        $imageField = new UploadField('MainImage', 'Main Image');
        $imageField->allowedExtensions = array('jpg', 'png', 'gif');

        // Name, Description and Website fields
        return new FieldList(
            new TextField('Name', 'Name'),
            new TextField('Bedrooms', 'Bedrooms'),
            new TextField('Bathrooms', 'Bathrooms'),
            new TextField('FloorNumber', 'Floor Number'),
            new TextareaField('Price', 'Price'),
            new HTMLEditorField('Description', 'Description'),
            $thumbField,
            $imageField
        );

    }
}