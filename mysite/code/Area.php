<?php

class Area extends Page
{

    private static $db = array(
        'SmallHero' => 'Boolean'
    );

    private static $has_one = array(
        'Banner' => 'Image',
    );
    public static $has_many = array(
        'ContentBlocks' => 'ContentBlock'
    );


    public function getCMSFields()
    {

        $fields = parent::getCMSFields();

        $fields->removeFieldFromTab("Root.Main", "Content");

        $fields->addFieldsToTab("Root.Main", array(

            CheckboxField::create('SmallHero'),
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

        $gridField = new GridField("ContentBlocks", "Content Blocks:", $this->ContentBlocks(), $gridFieldConfig);
        $fields->addFieldToTab("Root.ContentBlocks", $gridField);


        return $fields;
    }

}
