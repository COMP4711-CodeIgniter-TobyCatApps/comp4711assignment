<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
*	Based on instructions found on the CodeIgniter website:
*	https://ellislab.com/codeigniter/user-guide/libraries/form_validation.html#theform
*/
class Create_ad extends Application {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 *         http://example.com/index.php/welcome
	 *    - or -
	 *         http://example.com/index.php/welcome/index
	 *    - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	 /**
	 * Constructor, creates the Create_ad class object, and loads the methods found in the formfields_helper
	 *
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->helper('formfields_helper');
		$this->load->model('Ads');
		$this->load->model('Users');
	}

	public function index($id)
	{
		//get the record from the RDB
		$record = get($id);

		//populate the form elements from the RDB data
		$this->data['navbar_activelink']    = base_url('/Create_ad');
		$this->data['page_title'] = 'Starter Template for Bootstrap'; //Change to whatever the ad is later
		$this->data['ad_category'] = MakeComboField('category', 'ad_category', $record->category, $categories);
		$this->data['ad_title'] = MakeTextField('title', 'ad_title', $record->title);
		$this->data['ad_price'] = MakeTextField('price', 'ad_price', $record->price);
		$this->data['ad_description'] = MakeTextArea('description', 'ad_description', $record->description);

		$this->data['page_body'] = 'edit_ad'; //the view that is to be rendered

		$this->data['ad_submit'] = makeSubmitButton('Process Ad', "Update", 'btn-success');

		//render the form
		$this->render();

	}

	/**
	 *	Get variables from the form, validate them, and submit them to the RDB
	 */
	 public function submit()
	 {
		//create empty entry in RDB
		$record = $this->Ads->create();

		$record->categoryID = $this->input->post('ad_category');	//does the combo box return an INTEGER?, no but the server promotes the INT to a string anyway so this is cool
		$record->title = $this->input->post('ad_title');
		$record->price = $this->input->post('ad_price');
		$record->description = $this->input->post('ad_description');

		$record->flags = 0;			//0 complaints against this post
		$record->uploaded = date('Y-m-d'); //2015-03-04 yyyy-mm-dd
		$record->userID = $this->users->getCurrentUserId();


		// validate user input
		if ($record->userID == null)
		{
			$this->errors[] = 'You must log in to submit a post';
		}

		if (empty($record->title))
		{
			$this->errors[] = 'You must enter a title for your advertisement';
		}

		if ($record->price < 0)
		{
			$this->errors[] = 'You cannot enter a negative amount of money';
		}

		// redisplay if any errors
		if (count($this->errors) > 0)
		{
			$this->displayError($record);
			return; // make sure we don't try to save anything
		}

		//Create a new entry in the RDB
		if (empty($record->id))
		{
			$this->Ads->add($record);
		}
		else
		{
			$this->Ads->update($record);
		}
		redirect('/');
	 }

	/**
	*	Re-renders the form to the screen, including any error messages
	*
	*/
	public function displayError($record)
	{
		//error codes at the top
		// format any errors
		$message = '';
		if (count($this->errors) > 0)
		{
			foreach ($this->errors as $errors)
				$message .= $errors . BR;
		}
		$this->data['message'] = $message;

		//the rest of the form

		//specify combo box information
		$categories = $this->Categories->all();
		foreach ($categories as $key => $value) {
			$categories[$key] = $categories[$key]->name;
		}

		$this->data['navbar_activelink']    = base_url('/Create_ad');
		$this->data['page_title'] = 'Starter Template for Bootstrap'; //Change to whatever the ad is later
		$this->data['ad_category'] = MakeComboField('category', 'ad_category', $record->categoryID, $categories);
		$this->data['ad_title'] = MakeTextField('title', 'ad_title', $record->title);
		$this->data['ad_price'] = MakeTextField('price', 'ad_price', $record->price);
		$this->data['ad_description'] = MakeTextArea('description', 'ad_description', $record->description);

		$this->data['page_body'] = 'edit_ad'; //the view that is to be rendered

		$this->data['ad_submit'] = makeSubmitButton('Process Ad', "Update", 'btn-success');

		$this->render();
	}
}

?>
/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
