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

    public function submit_survey() {
        if ($this->session->userdata('user_id')) {
            $input = $this->input->post();
            
            $to_pass['user_id'] = $this->session->userdata('user_id');
            $to_pass['question_answers'] = $input['question_answers'];
            

            echo $this->user_model->submit_survey($to_pass);
            
            
//            echo var_dump($this->input->post());


//            $this->load->model('question_model');
//            $all_questions = $this->question_model->get();
//            $this->title = 'Post-test survey';
//
//            $this->data['questions'] = $all_questions;
//            $this->keywords = "Web development software, documentation";
//            $this->css = array('survey.css');
//            $this->javascript = array('survey.js');
//            $this->_render('pages/survey');
        } else {
            redirect('home');
        }
    }

}

/* End of file user.php */