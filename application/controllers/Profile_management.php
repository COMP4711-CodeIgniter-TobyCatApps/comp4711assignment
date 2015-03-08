<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Profile Management controller
 */
class Profile_Management extends Application {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('formfields');
        $this->load->model('users');
    }

    /* Should remove this because it doesn't make sense for this page to have a default index thing
    public function index()
    {
        $this->data['page_title'] = 'Manage Profile';
        $this->data['page_body'] = 'profile_management';
        $this->data['navbar_activelink'] = base_url('/Profile_Management');

        $highestid = $this->users->highest();
        $record = $this->users->get($highestid);

        // Create form fields
        $this->data['fimage'] = makeUploadImageField('Profile picture:', 'imagefile[]', false);
        $this->data['fname'] = makeTextField('Name:', 'name', $record->displayname);
        $this->data['foldpassword'] = makePasswordField('Old Password:', 'opswd', '');
        $this->data['fnewpassword'] = makePasswordField('New Password:', 'npswd', '');
        $this->data['fconfirmpassword'] = makePasswordField('Confirm Password:', 'cpswd', '');
        $this->data['femail'] = makeTextField('Email:', 'email', $record->email);
        $this->data['fsubmit'] = makeSubmitButton('Submit', 'Submit');
        $this->data['fcancel'] = makeCancelButton('Cancel');

        $this->render();
    }
    */
    public function renderForm($id)
    {
        $record = $this->users->get($id);

        $this->data['page_title'] = 'Manage Profile';
        $this->data['page_body'] = 'profile_management';
        $this->data['navbar_activelink'] = base_url('/Profile_Management');

        // Create form fields
        $this->data['fimage'] = makeUploadImageField('Profile picture:', 'imagefile');
        $this->data['fname'] = makeTextField('Name:', 'name', $record->displayname);
        $this->data['foldpassword'] = makePasswordField('Old Password:', 'opswd', '');
        $this->data['fnewpassword'] = makePasswordField('New Password:', 'npswd', '');
        $this->data['fconfirmpassword'] = makePasswordField('Confirm Password:', 'cpswd', '');
        $this->data['femail'] = makeTextField('Email:', 'email', $record->email);
        $this->data['fsubmit'] = makeSubmitButton('Submit', 'Submit');
        $this->data['fcancel'] = makeCancelButton('Cancel');

        $this->render();
    }

    public function user($id)
    {
        if(true)//TODO: Add some way of validation of whether the user is either a ADMIN or the CORRECT user
        {
            $this->renderForm($id);
        }
        else
        {
            //generate some error
        }
    }

    public function confirm()
    {
        // make a directory for the uploaded file(s)
        mkdir('./uploads/users/'.$this->users->get_current_user_id());

        // load the upload library, and configure it
        $config['upload_path']   =
            './uploads/users/'.$this->users->get_current_user_id();
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 100;

        $this->load->library('upload');
        $this->upload->initialize($config);

        // do the uploading
        echo $this->upload->do_multi_upload('imagefile') ? 'uploaded' : 'failed up upload';
        echo $this->upload->display_errors();

        redirect('/User_detail');
    }
}

/* End of file Profile_Management.php */
/* Location: ./application/controllers/Profile_Management.php */
