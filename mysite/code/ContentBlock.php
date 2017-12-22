<?php

class ContentBlock extends DataObject
{
    // Contact object's fields
    public static $db = array(
        'Title' => 'Varchar(255)',
        'Subtitle' => 'Varchar(255)',
        'Body' => 'HTMLText',
        'Type' => 'Enum("Text,Single Image,Double Image")',
        'SortID' => 'Int',
        'NavID' => 'Varchar(255)'
    );

    // One-to-one relationship with profile picture and contact list page
    public static $has_one = array(
        'Image1' => 'Image',
        'Image2' => 'Image',
        'HeaderImage' => 'Image',
        'Areas' => 'Area'
    );

    // Summary fields
    public static $summary_fields = array(
        'Title' => 'Title',
        'Type' => 'Type'
    );

    public static $default_sort = 'SortID ASC';

    public function getCMSFields()
    {

        // Image fields
        $headerImageField = new UploadField('HeaderImage', 'Image to show under title');
        $headerImageField->allowedExtensions = array('jpg', 'png', 'gif');

        $imageOneField = new UploadField('Image1', 'Lower left image');
        $imageOneField->allowedExtensions = array('jpg', 'png', 'gif');

        $imageTwoField = new UploadField('Image2', 'lower right image');
        $imageTwoField->allowedExtensions = array('jpg', 'png', 'gif');

        // Name, Description and Website fields
        return new FieldList(
            new DropdownField('Type', 'Content Type', singleton('ContentBlock')->dbObject('Type')->enumValues()),
            new TextField('Title', 'Title'),
            new TextField('Subtitle', 'Sub Title'),
            new HtmlEditorField('Body', 'Body'),
            headerImageField,
            $imageOneField,
            $imageTwoField

        );

    }

    public function onBeforeWrite() {
        parent::onBeforeWrite();
        $this->NavID = strtolower(str_replace(" ", "-", $this->Title));
    }
}