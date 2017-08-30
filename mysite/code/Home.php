<?php

class HomePage extends Page
{

    private static $db = array(

        'BannerContent' => 'HTMLText'

    );

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->addFieldsToTab("Root.Main", array(
            TextField::create("BannerContent", "Hero Content")
        ), "Content");

        return $fields;
    }

}

class HomePage_Controller extends Page_Controller
{

}