<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ad_Detail extends Application {

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
    public function index()
    {
        $this->data['pagetitle'] = 'Starter Template for Bootstrap'; //Change to whatever the ad is later
        $this->data['pagebody'] = 'ad_detail'; //Change to whatever the ad is later

        $this->render();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */