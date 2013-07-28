<?php

/**
 * database - [Add a short description of what this file does]
 *
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
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

class Database extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->dbutil();
        if (!$this->dbutil->database_exists('riant_fronty')) {
            $this->database_model->construct_database();
            echo 'have db';
        } else {
            $this->database_model->destroy_database();
            echo 'no db now';
        }
    }

}

/* End of file database.php */