<?php

class Reviews extends MY_Model {

    // Constructor
    public function __construct() {
        parent::__construct('reviews','ID');
    }

    public function getReviewFrom($viewer, $viewee)
    {
        $sql = "SELECT * FROM ".$this->_tableName.
            " WHERE `from`='" . $viewer . "' AND `to`='". $viewee . "'";

        $query = $this->db->query($sql);
        $records = $query->result();
        return (count($records) > 0) ? $records[0] : $this->reviews->create();
    }
}
