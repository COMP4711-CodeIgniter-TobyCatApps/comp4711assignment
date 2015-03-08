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
        $currentUserId = $this->users->get_current_user_id();
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
        $currentUserId = $this->users->get_current_user_id();
        $isAdmin = $this->users->is_current_user_admin();

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
