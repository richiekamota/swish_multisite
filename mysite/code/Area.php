<?php

class Area extends Page
{

    private static $db = array();

    private static $has_one = array(
        'Banner' => 'Image',
    );



    public function getCMSFields()
    {

        $fields = parent::getCMSFields();

        $fields->addFieldsToTab("Root.Main", array(

            $uploader1 = UploadField::create('Banner', 'Image'),

        ), "Metadata");

        $uploader1->getValidator()->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'));


        return $fields;
    }

}
