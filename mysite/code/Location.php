<?php

class Location extends DataObject
{
    // Contact object's fields
    public static $db = array(
        'Name' => 'Varchar(255)',
        'Lat' => 'Varchar(255)',
        'Long' => 'Varchar(255)',
        'GoogleMapsLink' => 'Varchar(255)',
        'Description' => 'HTMLText',
        'SortID' => 'Int',
    );

    // One-to-one relationship with picture
    public static $has_one = array(
        'Thumbnail' => 'Image',
        'MainImage' => 'Image',
        'Category' => 'Category',
        'Map' => 'Map',
    );

    // Summary fields
    public static $summary_fields = array(
        'Name' => 'Name',
        'Category' => 'Category',
        'Lat' => 'Lat',
        'Long' => 'Long'
    );

    public static $default_sort = 'SortID ASC';

    public function getCMSFields()
    {

        // Image fields
        $thumbField = new UploadField('Thumbnail', 'Thumbnail');
        $thumbField->allowedExtensions = array('jpg', 'png', 'gif');

        $imageField = new UploadField('MainImage', 'Main Image');
        $imageField->allowedExtensions = array('jpg', 'png', 'gif');


        // Name, Description and Website fields
        return new FieldList(
            new TextField('Name', 'Name'),
            new TextField('Lat', 'Lat'),
            new TextField('Long', 'Long'),
            new TextField('GoogleMapsLink', 'Google Map Link'),
            new DropdownField('CategoryID', 'Category', Category::get()->map('ID', 'Name')),
            $thumbField,
            $imageField,
            new HTMLEditorField('Description', 'Description')
        );

    }
}