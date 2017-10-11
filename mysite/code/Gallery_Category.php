<?php

class Gallery_Category extends DataObject
{
    // Gallery Image object's fields
    public static $db = array(
        'Name' => 'Varchar(255)',
        'Description' => 'HTMLText',
        'SortID' => 'Int'
    );

    // One-to-one relationship with profile picture and contact list page
    public static $has_one = array(
        'Gallery'=>'Gallery'    
    );

    private static $many_many = array(
        'GalleryImages' => 'Image'
    );

    // Summary fields
    public static $summary_fields = array(
        'Name' => 'Name'
    );

    public function getCMSFields()
    {

        // Profile picture field
        $imageField = new UploadField('GalleryImages', 'Images');
        $imageField->allowedExtensions = array('jpg', 'png', 'gif', 'jpeg');
        $imageField->setAllowedMaxFileNumber(50);


        // Name, Description and Website fields
        return new FieldList(
            new TextField('Name', 'Gallery Name'),
            $imageField,
            new HTMLEditorField('Description', 'Description')
        );

    }
}
