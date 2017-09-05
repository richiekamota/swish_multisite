<?php

class Rooms_Controller extends Page_Controller
{
    private static $allowed_actions = array(
        'index'
    );

    public function index(SS_HTTPRequest $request)
    {

        print_r($request);

        $subsiteID = Subsite::currentSubsiteID();

        $rooms = Room::get()->filter(array(
            'SubsiteID' => $subsiteID
        ))->sort('SortID');



        $floors = Floor::get()->filter(array(
            'SubsiteID' => $subsiteID
        ))->sort('SortID');


        return $this->customise(new ArrayData(array(
            'Title' => 'Rooms',
            'Rooms' => $rooms,
            'Floors' => $floors
        )))->renderWith('RoomList');

    }

}

