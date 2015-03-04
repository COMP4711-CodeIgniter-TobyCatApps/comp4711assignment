<?php

class Images extends MY_Model
{

    var $imagesRoot = 'assets/img/portfolio/';

    // Constructor
    public function __construct()
    {
        parent::__construct('Images','ID');
    }

    // retrieve a single row
    public function get($pkeyval1,$pkeyval2 = null)
    {
        $record = parent::get($pkeyval1,$pkeyval2);
        if($record)
        {
            $record->src = $this->imagesRoot.$record->src;
        }
        return $record;
        // // iterate over the data until we find the one we want
        // foreach ($this->data as $record)
        //     if ($record['ID'] == $which)
        //         return $record;
        // return null;
    }

    public function getImagesForAd($adID)
    {

        // get IDs of images for the passed ad
        $imageIDs = $this->adimages->getAdImageIDs($adID);

        // get the actual image records to be returned while modifying their src
        // path
        $imageRecords = array();
        foreach($imageIDs as $imageID)
        {
            $imageRecord = parent::get($imageID);
            $imageRecord->src = $this->imagesRoot.$imageRecord->src;
            $imageRecords[] = $imageRecord;
        }

        // return them
        return $imageRecords;
    }

    public function some($column,$value = null)
    {
        $records = parent::some($column,$value);
        foreach($records as $record)
        {
            $record->src = $this->imagesRoot.$record->src;
        }
        return $records;

        // $images = array();

        // // iterate over the data until we find the one we want
        // foreach ($this->data as $record)
        // {
        //     if (in_array($record['ID'], $which))
        //     {
        //         $images[] = $record;
        //     }
        // }

    //     return $images;
    }

    // retrieve all rows
    public function all()
    {
        $records = parent::all();
        foreach($records as $record)
        {
            $record->src = $imagesRoot.$record->src;
        }
        return $records;
    }

}
