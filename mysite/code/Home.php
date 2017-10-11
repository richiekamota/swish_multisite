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

    public static $has_many = array(
         'Social_Media' => 'Social_Media',
         'Site_Link' => 'Site_Link'
    );

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->addFieldsToTab("Root.Main", array(
            TextField::create("BannerContent", "Hero Content"),
            HiddenField::create('SubsiteID','SubsiteID', Subsite::currentSubsiteID()),
        ), "Content");

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

        
        $gridField = new GridField("Social_Media", "Social Media", $this->Social_Media(), $gridFieldConfig);
        $fields->addFieldToTab("Root.SocialMedia", $gridField);

         $gridFieldConfig2 = GridFieldConfig::create()->addComponents(
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

        $gridField = new GridField("Site_Link", "Site Links", $this->Site_Link(), $gridFieldConfig2);
        $fields->addFieldToTab("Root.SiteLinks", $gridField);

        return $fields;
    }

}

class HomePage_Controller extends Page_Controller
{

}