<?php

class  Staff_Member extends DataObject
{
    //  Staff Member object's fields
    public static $db = array(
        'Name' => 'Varchar(255)',        
        'JobTitle' => 'Varchar(255)', 
        'Description' => 'HTMLText',
        'SortID' => 'Int'         
    );

    // One-to-one relationship with profile picture and contact list page
    public static $has_one = array(
        'ProfilePic' => 'Image',
        'Staff'=>'Staff'    
    );

    // Summary fields
    public static $summary_fields = array(
        'Name' => 'Name'
    );

    public function getCMSFields()
    {

        // Profile picture field
        $imageField = new UploadField('ProfilePic', 'Profile Picture');
        $imageField->allowedExtensions = array('jpg', 'png', 'gif', 'jpeg');


        // Name, Description and Website fields
        return new FieldList(
            new TextField('Name', 'Name'),
            new TextField('JobTitle', 'Job Title'),
            $imageField,
            new HTMLEditorField('Description', 'Description')

        );

    }
}