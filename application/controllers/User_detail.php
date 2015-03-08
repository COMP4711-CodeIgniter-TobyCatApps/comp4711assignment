<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class User_detail extends Application {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('formfields');
        $this->load->model('users');
        $this->load->model('ads');
        $this->load->model('categories');
        $this->load->model('reviews');

        $this->load->helper('card');
        $this->load->helper('grid');
        $this->load->helper('array');
    }

    private function getUserDetails($id)
    {
        $record = $this->users->get($id);

        $this->data['username'] = $record->username;
        $this->data['displayname'] = $record->displayname;
        $this->data['email'] = $record->email;
    }

    public function confirm()
    {
        // create a record to add to the database
        $addRecord = $this->reviews->create();

        $addRecord->from = 'from user'; // need to update this once log-in is implemented
        $addRecord->to = 'to user'; // need to update this once log-in is implemented
        $addRecord->review = $this->input->post('review');
        $addRecord->rating = $this->input->post('rating');

        // Add validation here once log in is implemented
        // there shouldn't be an anonymous review

        $this->reviews->add($addRecord);

        redirect('/user_detail');
    }

    public function present()
    {
        // Get user details
        $id = $this->users->get_current_user_id();
        if($id != null)
            $this->getUserDetails($id);
        else
            redirect('/register');

        // Get user ads
        $ads = $this->ads->some('userID', $id);
        $this->data['cards'] = generateCards($this, $ads);

        // rating
        $this->data['frating'] = makeHiddenField('rating', '');
        // for testing purposes so you can see the data
        //$this->data['frating'] = makeTextField('Display Name:', 'rating', '');

        $this->data['freview'] = makeTextArea('Your Review:', 'review', '');
        $this->data['fsubmit'] = makeSubmitButton('Submit', "Submit", 'btn-success');

        $this->data['page_title'] = 'User Detail';
        $this->data['page_body'] = 'user_detail';

        $this->data['navbar_activelink'] = base_url('/User_detail');

        $this->render();
    }

    public function index()
	{
        $this->present();
	}
}

/* End of file User_detail.php */
/* Location: ./application/controllers/User_detail.php */
