<?php

class Apartment extends Page
{

    private static $db = array(

        'ApartmentType' => "Enum('Commercial,Residential,Mixed Use Development,Student Accommodation,Industrial,Retail','Residential')",
    );

    private static $has_one = array(
        'Image' => 'Image',
    );
    public static $has_many = array(
        'Rooms' => 'Room'
    );


    public function getCMSFields()
    {

        $fields = parent::getCMSFields();

        $fields->addFieldsToTab("Root.Main", array(

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


        return $fields;
    }

}
