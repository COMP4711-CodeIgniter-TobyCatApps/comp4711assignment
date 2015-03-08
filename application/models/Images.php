<?php

class Images extends MY_Model
{

    var $imagesRoot = 'uploads/posts/';

    // Constructor
    public function __construct()
    {
        parent::__construct('images','ID');
    }

    /////////////////////////////
    // active record interface //
    /////////////////////////////

    public function getAdImages($adID)
    {
        // get all image records with corresponding adID
        $adImages = $this->some('adID',$adID);

        // if there are no images, inject the null image
        if(count($adImages) == 0)
        {
            $adImages[] = $this->getNullImage();
        }

        // return...
        return $adImages;
    }

    public function getAdImage($adID)
    {
        // get all images for the ad, and return the first one in the array
        $adImages = $this->getAdImages($adID);
        return $adImages[0];
    }

    public function getNullImage()
    {
        $nullImageRecord = $this->create();
        $nullImageRecord->ID   = 0;
        $nullImageRecord->alt  = 'no image';
        $nullImageRecord->src  = 'assets/img/default-image.png';
        $nullImageRecord->adID = 0;
        return $nullImageRecord;
    }

    public function addAdImage($alttext,$filename,$adID)
    {
        $newImage = $this->images->create();
        $newImage->alt  = $alttext;
        $newImage->src  = $filename;
        $newImage->adID = $adID;
        $this->add($newImage);
    }

    ////////////////
    // basic CRUD //
    ////////////////

    // retrieve a single row
    public function get($pkeyval1,$pkeyval2 = null)
    {
        $record = parent::get($pkeyval1,$pkeyval2);
        if($record)
        {
            $record->src = $this->imagesRoot.$record->adID.'/'.$record->src;
        }
        return $record;
    }

    public function some($column,$value = null)
    {
        $records = parent::some($column,$value);
        foreach($records as $record)
        {
            $record->src = $this->imagesRoot.$record->adID.'/'.$record->src;
        }
        return $records;
    }

    // retrieve all rows
    public function all()
    {
        $records = parent::all();
        foreach($records as $record)
        {
            $record->src = $imagesRoot.$record->adID.'/'.$record->src;
        }
        return $records;
    }

}
