<?php

class Floor extends DataObject
{
    // Contact object's fields
    public static $db = array(
        'Name' => 'Varchar(255)',
        'FloorNumber' => 'Int',
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
            new TextField('FloorNumber', 'Floor Number'),
            $thumbField,
            $imageField

        );

    }
}