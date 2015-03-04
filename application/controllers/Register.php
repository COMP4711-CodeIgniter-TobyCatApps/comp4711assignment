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

class Register extends Application {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('formfields');
        $this->load->model('users');
    }

    public function confirm()//$record)
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
        // add database checking for username

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
            $this->display_error($record);
            return; // make sure we don't try to save anything
        }

        // create a record to add to the database
        $addRecord = $this->users->create();

        $addRecord->ID = $this->users->highest() + 1;
        $addRecord->type = 0;
        $addRecord->username = $record->fusername;
        $addRecord->password = $record->fpassword;
        $addRecord->email = $record->femail;
        $addRecord->displayname = $record->fdisplayname;

        $this->users->add($addRecord);

        redirect('/welcome');
    }

    public function display_error($record)
    {
        // format any errors
        $message = '';

        if(count($this->errors) > 0)
        {
            foreach($this->errors as $error)
                $message .= $error . BR;
        }

        $this->data['message'] = $message;

        $this->data['fdisplayname'] = makeTextField('Display Name:', 'dname', $record->fdisplayname);
        $this->data['fusername'] = makePasswordField('User Name:', 'uname', $record->fusername);
        $this->data['fpassword'] = makePasswordField('Password', 'pswd', $record->fpassword);
        $this->data['fcpassword'] = makePasswordField('Confirm Password', 'cpswd', $record->fcpassword);
        $this->data['femail'] = makeTextField('Email', 'email', $record->femail);
        $this->data['fsubmit'] = makeSubmitButton('Submit', 'Submit');
        $this->data['fcancel'] = makeCancelButton('Cancel');

        $this->data['page_body'] = 'register';

        $this->render();
    }

	public function index()
	{
        $this->data['page_title'] = 'Register';
        $this->data['page_body'] = 'register';
        $this->data['navbar_activelink'] = base_url('/Register');
        $this->data['message'] = '';

        // Create form fields
        $this->data['fdisplayname'] = makeTextField('Display Name:', 'dname', '');
        $this->data['fusername'] = makePasswordField('User Name:', 'uname', '');
        $this->data['fpassword'] = makePasswordField('Password', 'pswd', '');
        $this->data['fcpassword'] = makePasswordField('Confirm Password', 'cpswd', '');
        $this->data['femail'] = makeTextField('Email', 'email', '');
        $this->data['fsubmit'] = makeSubmitButton('Submit', 'Submit');
        $this->data['fcancel'] = makeCancelButton('Cancel');

        $this->render();
	}
}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */
