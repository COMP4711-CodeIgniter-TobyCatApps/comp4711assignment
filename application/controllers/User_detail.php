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

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		        // generate cards
        $this->load->model('ads');
        $ads = $this->ads->all();

        $cards = array();

        foreach($ads as $ad)
        {
            $card = array();
            $card['cardlink']       = base_url('Ad_Detail');
            $card['cardimgsrc']     = base_url('assets/img/portfolio/cabin.png');
            $card['cardimagealt']   = $ad['title'];
            $card['cardtitle']      = $ad['title'];
            $card['cardcaption']    = $ad['description'];
            $cards[] = $this->parser->parse('_card',$card,true);
        }

        // generate columns, with the cards inside them
        $columns = array();
        while(count($cards) > 0)
        {
            $column = array();
            $column['columnclass']  = 'col-sm-4';
            $column['content']      = array_pop($cards);
            $columns[] = $column;
        }

        // generate rows with the columns inside them (3 columns per row)
        $rows = array();
        $rows['row'] = array();
        while(count($columns) > 0)
        {
            $row = array();
            $row['column'] = array();
            for($count = 0; $count < 3; $count++)
            {
                if(count($columns) > 0)
                {
                    $row['column'][] = array_pop($columns);
                }
                else
                {
                    break;
                }
            }
            $rows['row'][] = $row;
        }

        // generate the grid
        // $this->data['cards'] = $cards[0];
        $this->data['cards'] = $this->parser->parse('_grid', $rows, true);


        $this->data['page_title'] = 'User Detail';
        $this->data['page_body'] = 'user_detail';

        $this->data['navbar_activelink'] = base_url('/User_detail');

        $this->render();
	}
}

/* End of file Profile_Management.php */
/* Location: ./application/controllers/Profile_Management.php */
