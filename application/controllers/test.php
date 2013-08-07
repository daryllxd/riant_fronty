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
        
        
        
        echo var_dump($this->project_model->download_project_as_zip(3));
        
        echo 'ta';
        
    }


}

/* End of file user.php */