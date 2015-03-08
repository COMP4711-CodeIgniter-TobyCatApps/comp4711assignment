<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
*	Based on instructions found on the CodeIgniter website:
*	https://ellislab.com/codeigniter/user-guide/libraries/form_validation.html#theform
*/
class Edit_ad extends Application {

	 /**
	 * Constructor, creates the Create_ad class object, and loads the methods found in the formfields_helper
	 *
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('formfields_helper');
		$this->load->model('ads');
		$this->load->model('users');
		$this->load->model('categories');
		$this->errors = array();
	}

	public function index($id,$returnUrl)
	{
		//get the record from the RDB
		$record = $this->ads->get($id);
		$this->present($record,$returnUrl);
	}

	/**
	 *	Get variables from the form, validate them, and submit them to the RDB
	 */
	 public function submit($adID,$returnUrl)
	 {
		// get ad from database
		$record = $this->ads->get($adID);

		$record->categoryID  = $this->input->post('ad_category');
		$record->title       = $this->input->post('ad_title');
		$record->price       = $this->input->post('ad_price');
		$record->description = $this->input->post('ad_description');
		$record->userID      = $record->userID;
		$record->flags       = 0;             //0 complaints against this post
		$record->uploaded    = date('Y-m-d'); //2015-03-04 yyyy-mm-dd

		// validate user input
		if ($record->userID == null)
			$this->errors[] = 'You must log in to submit a post';
		if (empty($record->title))
			$this->errors[] = 'You must enter a title for your advertisement';
		if ($record->price < 0)
			$this->errors[] = 'You cannot enter a negative amount of money';

		// redisplay if any errors
		if (count($this->errors) > 0)
		{
			$this->present($record);
			return; // make sure we don't try to save anything
		}

		//Create a new entry in the RDB
		$this->ads->update($record);
		// redirect('/Manage_ads');
		redirect($returnUrl);
	 }

	/**
	*	Re-renders the form to the screen, including any error messages
	*
	*/
	public function present($record,$returnUrl)
	{
		// format & display errors
		$message = '';
		if (count($this->errors) > 0)
		{
			foreach ($this->errors as $errors)
				$message .= $errors . BR;
		}
		$this->data['message'] = $message;

		// create combo box options
		$categories = $this->categories->all();
		$combobox_entries = array();
		foreach ($categories as $key => $value) {
			$combobox_entries[$categories[$key]->ID] = $categories[$key]->name;
		}

		// populate the form elements from the RDB data
		$this->data['adID']           = $record->ID;
		$this->data['returnurl']      = $returnUrl;
		$this->data['ad_category']    = MakeComboField('category', 'ad_category', $record->categoryID, $combobox_entries);
		$this->data['ad_title']       = MakeTextField('title', 'ad_title', $record->title);
		$this->data['ad_price']       = MakeTextField('price', 'ad_price', $record->price);
		$this->data['ad_description'] = MakeTextArea('description', 'ad_description', $record->description);

		// inject template parameters
		$this->data['navbar_activelink'] = base_url('/Edit_ad');
		$this->data['page_title']        = 'Edit Ad'; //Change to whatever the ad is later
		$this->data['page_body']         = 'edit_ad'; //the view that is to be rendered

		$this->data['ad_submit'] = makeSubmitButton('Process Ad', "Update", 'btn-success');

		//render the form
		$this->render();
	}
}
