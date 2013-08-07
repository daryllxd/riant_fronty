<?php

/**
 * session_model - sets and destroys sessions in the db
 * 
 * @package		riant
 * @author		University of the East Research and Development Unit
 * @author              Daryll Santos, <daryll.santos@gmail.com>
 * @copyright           Copyright (c) 2013
 * @license		http://opensource.org/licenses/mit-license.php
 * @link		https://www.facebook.com/ueccssrnd
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Session_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * @depends __ library
     * @param array $user_to_log_in['user_name', 'user_email', 'user_password']
     * @return boolean
     */
    public function login($user_to_log_in) {
        if (isset($user_to_log_in['user_name']) && ($user_to_log_in['user_password'])) {
            $users = $this->db->select('*')->from('users')->
                            where('user_name', $user_to_log_in['user_name'])->
                            where('user_password', sha1($user_to_log_in['user_password'])
                            )->get();
            if ($users->num_rows >= 1) {
                return __::first($users->result_array());
            }
        } else if (isset($user_to_log_in['user_email']) && ($user_to_log_in['user_password'])) {
            $users = $this->db->select('*')->from('users')->
                            where('user_email', $user_to_log_in['user_email'])->
                            where('user_password', sha1($user_to_log_in['user_password'])
                            )->get();
            if ($users->num_rows >= 1) {
                return __::first($users->result_array());
            }
        }

        return false;
    }

    public function logout($user_to_log_out) {
        
    }

}

/* End of file database_model.php */