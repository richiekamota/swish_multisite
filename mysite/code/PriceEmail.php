<?php

class PriceEmail extends DataObject
{
    // Contact object's fields
    public static $db = array(
        'Email' => 'Varchar(255)',
        'SubsiteID' => 'Int',
        'SortID' => 'Int'
    );

    // One-to-one relationship with profile picture and contact list page
    public static $has_one = array(
        'Subsite' => 'Subsite'
    );
}