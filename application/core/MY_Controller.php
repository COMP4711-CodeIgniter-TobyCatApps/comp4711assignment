<?php

class Application extends CI_Controller {

    protected $data = array();      // parameters for view components
    protected $id;                  // identifier for our content
    protected $choices = array();   // our menu navbar

    public function __construct()
    {
        parent::__construct();

        // load libraries
        $this->load->model('users');

        // menu items for the navigation bar
        if($this->users->getCurrentUserId() == null)
        {
            $this->choices['Register']           = base_url('/Register');
        }
        else
        {
            $this->choices['Profile Management'] = base_url('/Profile_management');
            $this->choices['User Details']       = base_url('/User_detail');
            $this->choices['Create Ad']          = base_url('/Create_ad');
            $this->choices['Manage Ads']         = base_url('/Manage_ads');
        }
        if($this->users->isCurrentUserAdmin())
        {
            $this->choices['Admin Page']         = base_url('/Admin');
        }

        // default placeholder values for _template view
        $this->data['baseurl']           = base_url('/');  // base url of the site
        $this->data['current_url']       = current_url();  // current url being viewed
        $this->data['page_title']        = 'Welcome';      // our default page
        $this->data['navbar_title']      = 'TobyCatApps';  // our default title
        $this->data['navbar_activelink'] = '';

        $this->errors = array();
    }

    public function login()
    {
        // extract login parameters
        $current_url = $_POST['currenturl'];
        $username    = $_POST['username'];
        $password    = $_POST['password'];

        // login the user if they provided the correct credentials
        $user_id = $this->users->getIdByCredentials($username,$password);
        if($user_id != null)
        {
            $this->session->set_userdata(SESSION_UID,$user_id);
        }

        // go back to the user's original url
        redirect($current_url);
    }

    public function logout()
    {
        // extract post parameters
        $current_url = $_POST['currenturl'];

        // logout the user
        $this->session->sess_destroy();

        // go back to the user's original url
        redirect($current_url);
    }

    protected function render()
    {
        $this->data['navbar_buttons'] = build_menu_bar($this->choices, $this->data['navbar_activelink']);
        $this->data['page_body'] = $this->parser->parse($this->data['page_body'], $this->data, true);

        if($this->users->getCurrentUserId() != null)
        {
            $this->data['navbar_user'] = $this->parser->parse('_logged_in',$this->data,true);
        }
        else
        {
            $this->data['navbar_user'] = $this->parser->parse('_login',$this->data,true);
        }

        // build the browser page
        $this->data['data'] = $this->data;
        $this->parser->parse('_template', $this->data);
    }

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */
