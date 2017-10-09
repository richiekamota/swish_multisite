<?php

class Map extends Page
{

    private static $db = array(
        'Heading' => 'Varchar(255)',
        'SubsiteID' => 'Int'
    );

    private static $has_one = array(
        'Image' => 'Image',
        'Subsite' => 'Subsite'
    );
    public static $has_many = array(
        'Locations' => 'Location'
    );

    public static $allowed_actions = array(

    );

    public function getCMSFields()
    {

        $fields = parent::getCMSFields();

        $fields->removeFieldFromTab("Root.Main", "Content");


        $fields->addFieldsToTab("Root.Main", array(

            TextField::create('Heading', 'Heading'),
            HiddenField::create('SubsiteID', 'SubsiteID', Subsite::currentSubsiteID()),
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

        $gridField = new GridField("Locations", "Locations list:", $this->Locations(), $gridFieldConfig);
        $fields->addFieldToTab("Root.Locations", $gridField);

        return $fields;
    }
}
