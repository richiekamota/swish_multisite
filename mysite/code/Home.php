<?php

class HomePage extends Page
{

    private static $db = array(

        'BannerContent' => 'HTMLText',
        'SubsiteID' => 'Int'

    );

    // One-to-one relationship with profile picture and contact list page
    public static $has_one = array(
        'Subsite' => 'Subsite'
    );

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->addFieldsToTab("Root.Main", array(
            TextField::create("BannerContent", "Hero Content"),
            HiddenField::create('SubsiteID','SubsiteID', Subsite::currentSubsiteID()),
        ), "Content");

        return $fields;
    }

}

class HomePage_Controller extends Page_Controller
{

}