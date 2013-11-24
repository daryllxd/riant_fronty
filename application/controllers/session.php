<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Session extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function get_current_user_and_projects($user_id = '') {
        return $this->session_model->get_current_user_and_projects($user_id);
    }

    public function login($user = '') {

        if (isset($user['user_name'])) {
            $authentication_info = $this->session_model->login($user);
        } else {
            $authentication_info = $this->session_model->login($this->input->post());
        }

        if ($authentication_info) {
//            login to command center
            $this->session->set_userdata('user_id', $authentication_info['user_id']);
            $this->session->set_userdata('user_name', $authentication_info['user_name']);
            $this->session->set_userdata('user_has_finished_survey', $authentication_info['user_has_finished_survey']);

            redirect(base_url('profile'));
        } else {

            $this->title = 'Riant - Wrong Username/password combo';
            $this->keywords = "Web development software, documentation";
            $this->css = array('sign_in_error.css');

            $this->_render('pages/sign_in_error');
        }
    }

    public function logout($user = '') {
        $this->session->unset_userdata('user_id');

        $this->title = "Yaaaaa";
        $this->keywords = "arny, arnodo";
        $this->css = array('home.css');
        redirect(base_url(''));
    }

}