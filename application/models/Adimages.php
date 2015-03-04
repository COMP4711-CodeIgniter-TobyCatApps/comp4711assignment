<?php

class Adimages extends MY_Model
{
    // Constructor
    public function __construct()
    {
        parent::__construct('Adimages','ID');
    }

    // retrieve a single row
    public function getAdImageIDs($adID)
    {
        // get the records from the database
        $records = $this->some('adID',$adID);

        // iterate over the records and extract their IDs
        $imageIDs = array();
        foreach ($records as $record)
        {
            $imageIDs[] = $record->imageID;
        }
        return $imageIDs;
    }

    // retrieve a single row
    public function getAdImageID($adID)
    {
        $some = $this->some('adID',$adID);
        return (count($some) > 0) ? $some[0]->imageID : null;
    }
}
