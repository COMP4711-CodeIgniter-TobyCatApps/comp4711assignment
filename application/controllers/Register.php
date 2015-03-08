<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Application {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('formfields');
        $this->load->model('users');
    }

    public function confirm()
    {
        //if(empty($record))
        $record = new stdClass();

        // Extract submitted fields
        $record->fdisplayname = $this->input->post('dname');
        $record->fusername = $this->input->post('uname');
        $record->fpassword = $this->input->post('pswd');
        $record->fcpassword = $this->input->post('cpswd');
        $record->femail = $this->input->post('email');

        // validation
        if(empty($record->fdisplayname))
            $this->errors[] = 'You must specify display name.';
        if(empty($record->fusername))
            $this->errors[] = 'You must specify user name.';
        if(!$this->users->checkUsernameAvailability($record->fusername))
            $this->errors[] = 'Someone already has that username; please change your username.';
        if(empty($record->fpassword))
            $this->errors[] = 'No password set.';
        if(empty($record->fcpassword))
            $this->errors[] = 'Confirm password.';
        if(strcmp($record->fpassword, $record->fcpassword) !== 0)
            $this->errors[] = 'Password do not match';
        if (!filter_var($record->femail, FILTER_VALIDATE_EMAIL))
            $this->errors[] = "Invalid email format.";

        // redisplay if any errors
        if(count($this->errors) > 0)
        {
            $this->present($record);
            return; // make sure we don't try to save anything
        }

        // create a record to add to the database
        $addRecord = $this->users->create();

        $addRecord->type = 0;
        $addRecord->username = $record->fusername;
        $addRecord->password = $record->fpassword;
        $addRecord->email = $record->femail;
        $addRecord->displayname = $record->fdisplayname;

        $addRecord->ID = $this->users->add($addRecord);

        // load the upload library, and configure it
        $config['upload_path']   = './uploads/users/'.$addRecord->ID.'/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 100;
        $this->load->library('upload');
        $this->upload->initialize($config);

        // make a directory for the uploaded file(s)
        mkdir($config['upload_path']);

        // do the uploading
        $this->upload->do_multi_upload('imagefile');

        // set the user's image in our database
        $uploadDetails = $this->upload->get_multi_upload_data();
        if(count($uploadDetails) > 0)
        {
            $uploadDetails = $uploadDetails[0];
            $this->users->setUserImage($addRecord->ID,$uploadDetails['file_name']);
        }

        redirect('/Welcome');
    }

    public function present($record)
    {
        // format any errors
        $message = '';

        if(count($this->errors) > 0)
        {
            foreach($this->errors as $error)
                $message .= $error . BR;
        }

        $this->data['message'] = $message;

        $this->data['fimage'] = makeUploadImageField('Profile picture:', 'imagefile[]', false);
        $this->data['fdisplayname'] = makeTextField('Display Name:', 'dname', $record->fdisplayname);
        $this->data['fusername'] = makeTextField('User Name:', 'uname', $record->fusername);
        $this->data['fpassword'] = makePasswordField('Password', 'pswd', $record->fpassword);
        $this->data['fcpassword'] = makePasswordField('Confirm Password', 'cpswd', $record->fcpassword);
        $this->data['femail'] = makeTextField('Email', 'email', $record->femail);
        $this->data['fsubmit'] = makeSubmitButton('Submit', 'Submit');
        $this->data['fcancel'] = makeCancelButton('Cancel');

        $this->data['page_title'] = 'Register';
        $this->data['page_body'] = 'register';
        $this->data['navbar_activelink'] = base_url('/Register');

        $this->render();
    }

	public function index()
	{
        $record = new stdClass();
        $record->fdisplayname = '';
        $record->fusername = '';
        $record->fpassword = '';
        $record->fcpassword = '';
        $record->femail = '';

        $this->present($record);
	}
}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */
