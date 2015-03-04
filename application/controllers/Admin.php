<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Application {

	 public function index()
	 {
				$this->load->model('users');
				$this->load->model('ads');
				$this->load->model('categories');

        $this->data['page_title'] = '';
        $this->data['page_body'] = 'admin.php';
				$this->data['adlist'] = $this->ads->all();



				$this->data['userlist'] = $this->users->all();
				/*

        $this->load->helper('html');

				$ads = $this->ads->all();

				$adDataArray = array();

				foreach($ads as $ad)
				{
						$adData = array();

						$adData['ID'] 				= $ad->ID;
						$adData['userID']     = $ad->userID;
						$adData['uploaded']   = $ad->uploaded;
						$adData['price']      = $ad->price;
						$adData['flags']    	= $ad->flags;
						$adData['description']= $ad->description;
						$adData['categoryID'] = $ad->categoryID;
						$adData['title']			= $ad->title;

						array_push($adDataArray, $adData);
				}

				$adList = array();
				foreach ($adDataArray as $adData)
				{
						$adList[] = anchor('', $adData['ID'], 'title="'.$adData['ID'].'"');
				}

				$attributes = array();
				$attributes['class'] = 'list-group';
				$attributes['id']    = 'adList';

				$this->data['adlist'] = ul($adList, $attributes);
*/
/*
        $adDataArray = array(
            array(
                'ID'                => 1,
                'parentCategoryID'  => 0,
                'name'              => 'Pets' ),
            array(
                'ID'                => 2,
                'parentCategoryID'  => 0,
                'name'              => 'Electronics'),
            array(
                'ID'                => 3,
                'parentCategoryID'  => 0,
                'name'              => 'Kitchen'),
            array(
                'ID'                => 4,
                'parentCategoryID'  => 0,
                'name'              => 'Stationary'),
            array(
                'ID'                => 5,
                'parentCategoryID'  => 0,
                'name'              => 'Toiletries'),
            array(
                'ID'                => 6,
                'parentCategoryID'  => 0,
                'name'              => 'Other')
        );





        $userDataArray = array(
            array(
                'ID'                => 1,
                'parentCategoryID'  => 0,
                'name'              => 'Pets' ),
            array(
                'ID'                => 2,
                'parentCategoryID'  => 0,
                'name'              => 'Electronics'),
            array(
                'ID'                => 3,
                'parentCategoryID'  => 0,
                'name'              => 'Kitchen'),
            array(
                'ID'                => 4,
                'parentCategoryID'  => 0,
                'name'              => 'Stationary'),
            array(
                'ID'                => 5,
                'parentCategoryID'  => 0,
                'name'              => 'Toiletries'),
            array(
                'ID'                => 6,
                'parentCategoryID'  => 0,
                'name'              => 'Other')
        );

        $userList = array();
        foreach ($userDataArray as $userData)
        {
            $userList[] = anchor(
                '', $userData['name'], 'title="'.$userData['name'].'"');
        }

        $attributes = array();
        $attributes['class'] = 'list-group';
        $attributes['id']    = 'userList';

        $this->data['userlist'] = ul($userList, $attributes);
				*/
        $this->render();
	 }
}
