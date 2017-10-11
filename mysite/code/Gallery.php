<?php

class Gallery extends Page
{

    private static $db = array();

    private static $has_one = array(
        'Banner' => 'Image',
    );
    public static $has_many = array(
        'Gallery_Categories' => 'Gallery_Category'
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
        
        $gridField = new GridField("Gallery_Categories", "Gallery Categories", $this->Gallery_Categories(), $gridFieldConfig);
        $fields->addFieldToTab("Root.GalleryCategories", $gridField);
       

        return $fields;
    }

}
