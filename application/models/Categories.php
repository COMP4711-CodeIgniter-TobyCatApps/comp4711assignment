<?php

class Categories extends MY_Model {

    // Constructor
    public function __construct() {
        parent::__construct('Categories','ID');
    }

    // // retrieve a single row
    // public function get($which) {
    //     // iterate over the data until we find the one we want
    //     foreach ($this->data as $record)
    //         if ($record['ID'] == $which)
    //             return $record;
    //     return null;
    // }

    // // retrieve all rows
    // public function all() {
    //     return $this->data;
    // }

}
