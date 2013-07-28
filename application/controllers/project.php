<?php

/**
 * project - deals wtih adding or destroying a project
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
        if (!isset($this->session->userdata('id'))) {
            show_error('Not logged in', 302);
        } else {
            $project_to_add = $this->input->post();
            $project_to_add['user_id'] = $this->session->userdata('id');
            $this->project_model->add($project_to_add);
        }
    }

}

/* End of file project.php */