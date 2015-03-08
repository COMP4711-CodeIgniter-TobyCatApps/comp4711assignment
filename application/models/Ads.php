<?php

class Ads extends MY_Model
{
    public function __construct()
    {
        parent::__construct('ads','ID');
        $this->load->model('images');
    }

    public function search($str)
    {
        $sql = "SELECT * FROM ".$this->_tableName.
            " WHERE title LIKE ? OR description LIKE ?";
        $str = '%'.$str.'%';
        $query = $this->db->query($sql, array($str,$str));
        return $query->result();
    }

    public function delete($adID,$key2=null)
    {
        // delete all images associated with this ad
        $adImages = $this->images->getAdImages($adID);
        foreach($adImages as $adImage)
        {
            $this->images->delete($adImage->ID);
        }

        // delete the ad's image folder
        rmdir('uploads/posts/'.$adID);

        // delete the ad
        parent::delete($adID);
    }
}
