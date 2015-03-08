<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    /**
     * load the necessary models and helpers required by this model.
     */
    public function __construct()
    {
        parent::__construct();

        // loading models
        $this->load->model('ads');
        $this->load->model('categories');

        // loading helpers
        $this->load->helper('card');
        $this->load->helper('grid');
        $this->load->helper('array');
        $this->load->helper('html');
    }

    /**
     * displays all ads from the database.
     */
    public function index($message = '')
    {
        $ads = $this->ads->all();
        $this->present($ads,$message);
    }

    public function present($ads,$message)
    {
        // inject template parameters
        $this->data['navbar_activelink'] = base_url('/');
        $this->data['page_title']        = 'Welcome';
        $this->data['page_body']         = 'welcome';
        $this->data['search']            = $this->parser->parse('_search',$this->data,true);

        // generating categories for the sidebar
        $this->data['categories'] = $this->_generate_categories();

        // show all ads in the database
        $this->data['cards'] = generateCards($this, $ads);

        // show messages if any
        $this->data['message'] = $message;

        // render...
        $this->render();
    }

    /**
     * displays all the ads that belong to the indicated category.
     *
     * @param  $categoryid id of the category to display.
     */
    public function category($categoryid)
    {
        $ads = $this->ads->some('categoryID',$categoryid);
        $this->present($ads,'');
    }

    /**
     * search for ads that contain the posted search parameters, and display
     *   them.
     */
    public function search()
    {
        // get post parameters
        $adname    = $_POST['adname'];

        // show all ads with matching titles
        $ads = $this->ads->search($adname);
        $this->present($ads,'');
    }

    /**
     * generate an unordered list of categories.
     *
     * @return returns a list of categories in an unordered list.
     */
    private function _generate_categories()
    {
        // get all the categories
        $categories = $this->categories->all();

        // build the links
        $list = array();
        foreach ($categories as $category)
        {
            $list[] = anchor(base_url('/welcome/category/'.$category->ID),
                $category->name,
                'title="'.$category->name.'"');
        }

        // add attributes to categories
        $attributes = array();
        $attributes['class'] = 'sidebar-brand';
        $attributes['id']    = 'mylist';

        // return an unordered list
        return ul($list, $attributes);
    }
}

/* End of file Welcome.php */
/* Location: ./application/controllers/Welcome.php */
