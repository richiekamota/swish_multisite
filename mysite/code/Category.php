<?php

class Category extends DataObject
{
    // Contact object's fields
    public static $db = array(
        'Name' => 'Varchar(255)',
        'SortID' => 'Int',
    );

    // One-to-one relationship with picture
    public static $has_one = array(
        'Thumbnail' => 'Image',
        'Map' => 'Map',
    );

    public static $has_many = array(
        'Locations' => 'Locations'
    );

    // Summary fields
    public static $summary_fields = array(
        'Name' => 'Name'
    );

    public function getCMSFields()
    {

        // Profile picture field
        $thumbField = new UploadField('Thumbnail', 'Thumbnail');
        $thumbField->allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');


        // Name, Description and Website fields
        return new FieldList(
            new TextField('Name', 'Name'),
            $thumbField
        );

    }
}