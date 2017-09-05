<?php

class Rooms_Controller extends Page_Controller
{
    private static $allowed_actions = array(
        'index'
    );

    public function index(SS_HTTPRequest $request)
    {

        $subsiteID = Subsite::currentSubsiteID();

        $floors = Floor::get()->filter(array(
            'SubsiteID' => $subsiteID
        ))->sort('SortID');

        if ($this->getRequest()->param('ID')) {
            $floorNumber = $this->getRequest()->param('ID');
        } else {
            $floorNumber = 1;
        }

        $selectedFloor = Floor::get()->filter(array(
            'SubsiteID' => $subsiteID,
            'FloorNumber' => $floorNumber
        ))->limit(1);

        $rooms = Room::get()->filter(array(
            'SubsiteID' => $subsiteID,
            'FloorNumber' => $floorNumber
        ))->sort('SortID');


        return $this->customise(new ArrayData(array(
            'Title' => 'Rooms',
            'Rooms' => $rooms,
            'Floors' => $floors,
            'SelectedFloor' => $selectedFloor,
            'CurrentFloorNumber' => $floorNumber
        )))->renderWith('RoomList');

    }

}

