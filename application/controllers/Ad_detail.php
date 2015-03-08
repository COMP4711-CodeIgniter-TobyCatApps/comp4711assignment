<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ad_Detail extends Application {

    public function index($adID)
    {
        $this->load->model('ads');
        $this->load->model('users');
        $this->load->model('images');
        $this->load->model('categories');

        $this->load->helper('carousel');

        // make the carousel
        $images = $this->images->getAdImages($adID);
        $carousel = makeCarousel($images);
        $this->data['ad_carousel'] =
            $this->parser->parse('_carousel', $carousel, true);

        // make everything else
        $ad = $this->ads->get($adID);                         // ad to display
        $user = $this->users->get($ad->userID);               // ad owner
        $category = $this->categories->get($ad->categoryID);  // ad category

        $this->data['ad_title']         = $ad->title;
        $this->data['ad_category']      = $category->name;
        $this->data['ad_description']   = $ad->description;
        $this->data['uploader']         = $user->displayname;
        $this->data['uploader_link']    = base_url('/User_detail/index/'.$user->username);

        // common to all pages
        $this->data['page_title'] = 'Starter Template for Bootstrap'; //Change to whatever the ad is later
        $this->data['page_body'] = 'ad_detail'; //Change to whatever the ad is later

        $this->render();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
