<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Session extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function login($user = '') {

        if (isset($user['user_name'])) {
            $auth = $this->session_model->login($user);
        } else {
            $auth = $this->session_model->login($this->input->post());
        }

        if ($auth) {

            $this->session->set_userdata('id', $auth['user_id']);
            $this->title = $auth['user_name'];
            $this->keywords = "Web development software, documentation";
            $this->data = $auth;
//                $this->css = array('sign_up.css');
            $this->css = array('command_center.css');

            $this->_render('pages/command_center');
            
            
            
        } else {
            
        }
    }

    public function test() {
        $amp = ($this->session_model->login(array('user_name' => 'danimoth2', 'user_email' => 'daryll.santos@gmail.com', 'user_password' => 'daryll')));

        echo var_dump($amp);

        echo $amp['user_name'];
    }

    public function sign_up($renderData = "") {


        $this->title = "Sign up";
        $this->keywords = "Web development software, documentation";
        $this->css = array('sign_up.css');

        $this->_render('pages/sign_up', $renderData);
    }

    public function logged_in($renderData = "") {

        echo var_dump($this->input->post());


        $this->title = "Sign up";
        $this->keywords = "Web development software, documentation";
        $this->css = array('sign_up.css');

        $this->_render('pages/logged_in', $renderData);
    }

    public function new_user($renderData = "") {
        $this->load->model('user_model');
        $user_id = $this->user_model->add($this->input->post());
        $this->session->set_userdata('id', $user_id);

        echo $this->session->userdata('id');
    }

}