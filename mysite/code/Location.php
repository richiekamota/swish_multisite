<?php

class Location extends DataObject
{
    // Contact object's fields
    public static $db = array(
        'Name' => 'Varchar(255)',
        'Lat' => 'Varchar(255)',
        'Long' => 'Varchar(255)',
        'Description' => 'HTMLText',
        'Category' => 'Enum("Available,Not Available")'
    );

    // One-to-one relationship with picture
    public static $has_one = array(
        'Thumbnail' => 'Image',
        'MainImage' => 'Image',
    );

    // Summary fields
    public static $summary_fields = array(
        'Name' => 'Name',
        'Category' => 'Category'
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
            new TextField('Lat', 'Lat'),
            new TextField('Long', 'Long'),
            new DropdownField('Category', 'Category', singleton('Location')->dbObject('Category')->enumValues()),
            $thumbField,
            $imageField,
            new HTMLEditorField('Description', 'Description')
        );

    }
}