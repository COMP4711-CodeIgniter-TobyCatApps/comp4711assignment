<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
*	Based on instructions found on the CodeIgniter website:
*	https://ellislab.com/codeigniter/user-guide/libraries/form_validation.html#theform
*/
class View_ad extends Application {

	 /**
	 * Constructor, loads all necessary helpers, models, and libraries for the controller
	 *
	 */
	function __construct()
    {
		parent::__construct();
		$this->load->helper('view_ad_helper');
		$this->load->model('Ads');
		$this->load->model('Users');
    }
	
	/**
	 * Display the advertisement details to the screen.
	 * An edit button is created for admins or owners of the advertisement.
	 * A delete button is created for admins or owners of the advertisement.
	 */
	 public function index($id)	//FRONT PAGE NEEDS TO PASS ID TO THIS CONTROLLER
	 {
		//get the record from the DB from the id
		
		//pass the data from the record to the webview helpers
		
		//if the user is an admin OR the owner of the ad, create and Edit and Delete button
		
		//render the changes to the screen
	 }

	 }
	
	/**
	* an onclick handler for the edit button. Passes all data in the advertisemetn view (or the ID of the record)
	* to the edit_advertisement view.
	*	$record: 
	*/
	public function edit($record)
	{
		//get the record associated with the info
		//pass the record information to the edit_ad view
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
