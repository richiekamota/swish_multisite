<?php

class Room extends DataObject
{
    // Contact object's fields
    public static $db = array(
        'Name' => 'Varchar(255)',
        'FloorNumber' => 'Int',
        'UnitNumber' => 'Int',
        'Description' => 'HTMLText',
        'InteriorSize' => 'Int',
        'ExteriorSize' => 'Int',
        'TotalSize' => 'Int',
        'Bedrooms' => 'Int',
        'Bathrooms' => 'Int',
        'Price' => 'Varchar(255)',
        'AvailabilityStatus' => 'Enum("Available,Not Available")',
        'AvailabilityDate' => 'Date',
        'SubsiteID' => 'Int',
        'SortID' => 'Int'
    );

    // One-to-one relationship with profile picture and contact list page
    public static $has_one = array(
        'Thumbnail' => 'Image',
        'PDFFile' => 'Image',
        'Apartment' => 'Apartment',
        'Subsite' => 'Subsite'
    );

    // Summary fields
    public static $summary_fields = array(
        'Name' => 'Name',
        'Price' => 'Price',
        'AvailabilityStatus' => 'Availability'
    );

    public function getCMSFields()
    {

        // Profile picture field
        $thumbField = new UploadField('Thumbnail', 'Thumbnail');
        $thumbField->allowedExtensions = array('jpg', 'png', 'gif');
       //PDF Uploader
        $pdfField = new UploadField('PDFFile', 'PDF File Upload');
        $pdfField->allowedExtensions = array('pdf');
        // Name, Description and Website fields
        return new FieldList(
            new TextField('Name', 'Name'),
            new TextField('Price', 'Price'),
            new TextField('FloorNumber', 'Floor Number'),
            new TextField('UnitNumber', 'Unit Number'),
            new DropdownField('AvailabilityStatus', 'Availability', singleton('Room')->dbObject('AvailabilityStatus')->enumValues()),
            new DateField('AvailabilityDate', 'Availability Date'),
            new TextField('Bedrooms', 'Bedrooms'),
            new TextField('Bathrooms', 'Bathrooms'),
            new TextField('InteriorSize', 'InteriorSize'),
            new TextField('ExteriorSize', 'ExteriorSize'),
            new HiddenField('SubsiteID','SubsiteID', Subsite::currentSubsiteID()),
            new TextField('TotalSize', 'TotalSize'),
            $thumbField,
            $pdfField,
            new HTMLEditorField('Description', 'Description')
        );
    }
}