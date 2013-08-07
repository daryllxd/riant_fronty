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

class Project extends MY_Controller {

    private $project_context;

    public function __construct() {
        parent::__construct();
        $this->project_context = $this->input->post();
        $this->project_context['user_id'] = $this->session->userdata('user_id');
    }

    public function add() {
        $this->project_model->add($this->project_context);
    }

    public function delete() {
        $this->project_model->delete($this->project_context);
    }

    public function download($project_id) {
        $this->project_model->download_project_as_zip($project_id);
    }

}

/* End of file project.php */