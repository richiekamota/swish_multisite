<?php

class Social_Media extends DataObject
{
    // Contact object's fields
    public static $db = array(
        'Title' => 'Varchar(255)',        
        'URL' => 'Varchar(255)',        
        'SortID' => 'Int'         
    );

    // One-to-one relationship with Social Media Icon and Social Media page
    public static $has_one = array(
        'SocialMediaIcon' => 'Image',
        'HomePage' => 'HomePage'            
    );

    // Summary fields
    public static $summary_fields = array(
        'Title' => 'Title'
    );

    public function getCMSFields()
    {

        // Profile picture field
        $uploader = new UploadField('SocialMediaIcon', 'Social Media Icon');
        $uploader->allowedExtensions = array('jpg', 'png', 'gif', 'jpeg');


        // Name, Description and Website fields
        return new FieldList(
            new TextField('Title', 'Social Media Title'),
            new TextField('URL','URL (http://facebook.com)'),
            $uploader   
        );

    }
}