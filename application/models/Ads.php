<?php

class Ads extends MY_Model
{
    public function __construct()
    {
        parent::__construct('ads','ID');
    }

    public function search($str)
    {
        $sql = "SELECT * FROM ".$this->_tableName.
            " WHERE title LIKE ? OR description LIKE ?";
        $str = '%'.$str.'%';
        $query = $this->db->query($sql, array($str,$str));
        return $query->result();
    }
}
