<?php

class Site_Link extends DataObject
{
    // Contact object's fields
    public static $db = array(
        'Title' => 'Varchar(255)',        
        'URL' => 'Varchar(255)',        
        'SortID' => 'Int'         
    );

    // One-to-one relationship with Social Media Icon and Social Media page
    public static $has_one = array(
        'SiteLinksImage' => 'Image',
        'HomePage' => 'HomePage'            
    );

    // Summary fields
    public static $summary_fields = array(
        'Title' => 'Title'
    );

    public function getCMSFields()
    {

        // Profile picture field
        $imageField = new UploadField('SiteLinksImage', 'Site Image');
        $imageField->allowedExtensions = array('jpg', 'png', 'gif', 'jpeg');


        // Name, Description and Website fields
        return new FieldList(
            new TextField('Title', 'Site Name'),
            new TextField('URL','URL'),
            $imageField    
        );

    }
}