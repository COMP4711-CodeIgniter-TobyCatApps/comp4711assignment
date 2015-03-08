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

    public function index()
    {
        $currentUserId = $this->users->getCurrentUserId();
        if($currentUserId != null)
        {
            $this->user($currentUserId);
        }
        else
        {
            redirect('Welcome/index/you must login to manage your profile.');
        }
    }

    public function _renderForm($id)
    {
        $user = $this->users->get($id);

        $this->data['page_title'] = 'Manage Profile';
        $this->data['page_body'] = 'profile_management';
        $this->data['navbar_activelink'] = base_url('/Profile_management');

        // Create form fields
        $this->data['fimage'] = makeUploadImageField('Profile picture:', 'imagefile[]', false);
        $this->data['fname'] = makeTextField('Name:', 'name', $user->displayname);
        $this->data['foldpassword'] = makePasswordField('Old Password:', 'opswd', '');
        $this->data['fnewpassword'] = makePasswordField('New Password:', 'npswd', '');
        $this->data['fconfirmpassword'] = makePasswordField('Confirm Password:', 'cpswd', '');
        $this->data['femail'] = makeTextField('Email:', 'email', $user->email);
        $this->data['fsubmit'] = makeSubmitButton('Submit', 'Submit');
        $this->data['fcancel'] = makeCancelButton('Cancel');

        $this->render();
    }

    public function user($id)
    {
        $currentUserId = $this->users->getCurrentUserId();
        $isAdmin = $this->users->isCurrentUserAdmin();

        // let the user see the form if user is either ADMIN or the CORRECT user
        if($isAdmin || $currentUserId == $id)
        {
            // show them the page
            $this->_renderForm($id);
        }
        else
        {
            // kick the user out; they're not welcomed here
            redirect('Welcome/index/user not authorized to see this page.');
        }
    }

    public function confirm()
    {
        $currentUserId = $this->users->getCurrentUserId();

        // load the upload library, and configure it
        $config['upload_path']   = './uploads/users/'.$currentUserId;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 100;
        $this->load->library('upload');
        $this->upload->initialize($config);

        // make a directory for the uploaded file(s)
        mkdir($config['upload_path']);

        // do the uploading
        $this->upload->do_multi_upload('imagefile');
        echo $this->upload->display_errors();

        // set the user's image in our database
        $uploadDetails = $this->upload->get_multi_upload_data();
        if(count($uploadDetails) > 0)
        {
            $uploadDetails = $uploadDetails[0];
            $this->users->setUserImage($currentUserId,$uploadDetails['file_name']);
        }

        redirect('/User_detail');
    }
}

/* End of file Profile_Management.php */
/* Location: ./application/controllers/Profile_Management.php */
