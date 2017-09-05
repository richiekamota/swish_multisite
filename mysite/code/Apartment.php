<?php

class Apartment extends Page
{

    private static $db = array(

        'ApartmentType' => "Enum('Commercial,Residential,Mixed Use Development,Student Accommodation,Industrial,Retail','Residential')",
        'Floors' => 'Int',
        'Heading' => 'Varchar(255)',
        'Subheading' => 'Varchar(255)',
        'Body' => 'HTMLText',
        'CaptionHeading' => 'Varchar(255)',
        'CaptionText' => 'HTMLText'
    );

    private static $has_one = array(
        'Image' => 'Image',
    );
    public static $has_many = array(
        'Rooms' => 'Room',
        'Floors' => 'Floor'
    );

    public static $allowed_actions = array(
        'floors'
    );

    public function getCMSFields()
    {

        $fields = parent::getCMSFields();

        $fields->removeFieldFromTab("Root.Main", "Content");


        $fields->addFieldsToTab("Root.Main", array(

            TextField::create('Floors', 'Number of Floors'),
            TextField::create('Heading', 'Left Heading'),
            TextField::create('Subheading', 'Left Sub Heading'),
            HtmlEditorField::create('Body', 'Body'),
            TextField::create('CaptionHeading', 'Caption Heading'),
            HtmlEditorField::create('CaptionText', 'Caption Text'),
            $uploader1 = UploadField::create('Image', 'Image'),

        ), "Metadata");

        $uploader1->getValidator()->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'));

        $gridFieldConfig = GridFieldConfig::create()->addComponents(
            new GridFieldToolbarHeader(),
            new GridFieldAddNewButton('toolbar-header-right'),
            new GridFieldSortableHeader(),
            new GridFieldDataColumns(),
            new GridFieldPaginator(20),
            new GridFieldEditButton(),
            new GridFieldDeleteAction(),
            new GridFieldDetailForm(),
            new GridFieldSortableRows('SortID')
        );

        $gridField = new GridField("Rooms", "Rooms list:", $this->Rooms(), $gridFieldConfig);
        $fields->addFieldToTab("Root.Rooms", $gridField);

        $gridField = new GridField("Floors", "Floors list:", $this->Floors(), $gridFieldConfig);
        $fields->addFieldToTab("Root.Floors", $gridField);


        return $fields;
    }
}
