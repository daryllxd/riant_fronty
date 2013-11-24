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

class Test extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->model('project_model');
        
        echo `whoami`;
        
        mkdir('http://localhost/riant_fronty/aw', 0777);
        
         if (!mkdir(base_url('huh'), 0777, true)) {//0777
//        die('Failed to create folders...');
    }
        
        echo base_url('huh');
        mkdir(base_url('huh'), 0777);
        
        
        
        $this->project_model->create_project_directory(3);
        
        
    }


}

/* End of file user.php */