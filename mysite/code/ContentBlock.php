<?php

class ContentBlock extends DataObject
{
    // Contact object's fields
    public static $db = array(
        'Title' => 'Varchar(255)',
        'Subtitle' => 'Varchar(255)',
        'Body' => 'HTMLText',
        'Type' => 'Enum("Text,Single Image,Double Image")',
        'SortID' => 'Int'
    );

    // One-to-one relationship with profile picture and contact list page
    public static $has_one = array(
        'Image1' => 'Image',
        'Image2' => 'Image',
        'Areas' => 'Area'
    );

    // Summary fields
    public static $summary_fields = array(
        'Title' => 'Title',
        'Type' => 'Type'
    );

    public function getCMSFields()
    {

        // Profile picture field
        $thumbField = new UploadField('Image1', 'Image1');
        $thumbField->allowedExtensions = array('jpg', 'png', 'gif');

        $imageField = new UploadField('Image2', 'Image');
        $imageField->allowedExtensions = array('jpg', 'png', 'gif');

        // Name, Description and Website fields
        return new FieldList(
            new DropdownField('Type', 'Content Type', singleton('ContentBlock')->dbObject('Type')->enumValues()),
            new TextField('Title', 'Title'),
            new TextField('Subtitle', 'Sub Title'),
            new HtmlEditorField('Body', 'Body'),
            $thumbField,
            $imageField

        );

    }
}