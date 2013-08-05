<?php

/**
 * user
 * 
 * @package		riant_fronty
 * @author		University of the East Research and Development Unit
 * @author              Daryll Santos, <daryll.santos@gmail.com>
 * @copyright           Copyright (c) 2013
 * @license		http://opensource.org/licenses/mit-license.php
 * @link		https://www.facebook.com/ueccssrnd
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function add() {
        $user_id = $this->user_model->add($this->input->post());
        $this->session->set_userdata('id', $user_id);
        
        redirect(base_url('profile'));
        
    }    

}

/* End of file user.php */