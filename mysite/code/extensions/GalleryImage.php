<?php

class GalleryImage extends DataExtension {

    private static $db = array(
        'Title' => 'Text',
        'Description' => 'Text'
    );

    private static $belongs_many_many = array(
        'Gallery_Category' => 'Gallery_Category'
    );
}