<?php

class Map extends Page
{

    private static $db = array(
        'Heading' => 'Varchar(255)',
        'SubsiteID' => 'Int'
    );

    private static $has_one = array(
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

        ), "Metadata");

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

    // Get all the locations associated to the map, filter out the categories and return the unique 1s
    public function uniqueLocationCategories() {
        // Load up the location data
        $mapLocations = new ArrayList();
        $mapLocations->merge(Location::get()->filter(array(
            'MapID' => $this->ID
        )));

        $uniqueCategories = [];
        // Loop through the data and put it in a new array;
        foreach ($mapLocations as $mapLocation) {
            if (!in_array($mapLocation->Category, $uniqueCategories)) {
                $uniqueCategories[] = $mapLocation->Category;
            }
        }
        return $uniqueCategories;
    }
}
