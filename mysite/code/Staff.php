<?php

class Staff extends Page
{

    private static $db = array();

    private static $has_one = array(
        'Banner' => 'Image',
    );
    public static $has_many = array(
        'Staff_Members' => 'Staff_Member'
    );


    public function getCMSFields()
    {

        $fields = parent::getCMSFields();

        //$fields->removeFieldFromTab("Root.Main", "Content");

        $fields->addFieldsToTab("Root.Main", array(

            $uploader1 = UploadField::create('Banner', 'Image'),

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
        
        $gridField = new GridField("Staff_Members", "Staff Members:", $this->Staff_Members(), $gridFieldConfig);
        $fields->addFieldToTab("Root.Staff_Members", $gridField);
       

        return $fields;
    }

}
