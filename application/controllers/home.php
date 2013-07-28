<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Controller {

    public function index($renderData = "") {

        /*
         * set up title and keywords (if not the default in custom.php config file will be set) 
         */
        $this->title = "Yaaaaa";
        $this->keywords = "arny, arnodo";
        $this->css = array('home.css');

        // 1. when you pass AJAX to renderData it will generate only that particular PAGE skipping other parts like header, nav bar,etc.,
        //      this can be used for AJAX Responses
        // 2. when you pass JSON , then the response will be json object of $this->data.  This can be used for JSON Responses to AJAX Calls.
        // 3. By default full page will be rendered

        $this->_render('pages/home', $renderData);
    }

    public function docu($renderData = "") {

        $this->title = "Riant Documentation";
        $this->keywords = "Web development software, documentation";

        $this->_render('pages/docu', $renderData);
    }

    public function sign_up($renderData = "") {


        $this->title = "Sign up";
        $this->keywords = "Web development software, documentation";
        $this->css = array('sign_up.css');

        $this->_render('pages/sign_up', $renderData);
    }

    public function profile($renderData = "") {
        $this->load->model('user_model');
        $user_info = $this->user_model->get_current_user_and_projects($this->session->userdata('user_id'));

        $this->title = $user_info['user_name'];
        $this->keywords = "Web development software, documentation";
        $this->data = $user_info;
        $this->css = array('command_center.css');
        $this->javascript = array('command_center.js');

        $this->_render('pages/command_center');
    }

    public function logged_in($renderData = "") {


        $this->title = "Sign up";
        $this->keywords = "Web development software, documentation";
        $this->css = array('sign_up.css');

        $this->_render('pages/logged_in', $renderData);
    }

}