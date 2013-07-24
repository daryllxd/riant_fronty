<?php

/**
 * user_model
 * 
 * user_id
 * user_name
 * user_password
 * user_email
 * user_profile_picture
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

class User_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        
    }

    /**
     * 
     * @return array Associative array of associative arrays.
     */
    public function get() {
        
        $users = $this->db->select('*')->from('users')->get();

        foreach ($users->result_array() as $row) {
            $rows[] = $row;
        }

        return $rows;
        
        
//        $users = $this->db->select('*')->from('users')->
//                join('schools', 'schools.school_id = users.school_id')->
//                get();
//
//        foreach ($users->result_array() as $row) {
//            $rows[] = $row;
//        }
//
//        return $rows;
    }

    public function add($user_to_add) {

        $user_to_add = array(
            'user_name' => $user_to_add['user_name'],
            'user_password' => $user_to_add['user_password'],
            'user_email' => $user_to_add['user_email']
        );

        $this->db->insert('users', $user_to_add);

        return $this->db->insert_id();
    }

    public function edit($user) {
        $this->db->trans_start();

        $updated_user = array(
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'cellphone_number' => $user['cellphone_number'],
            'school_id' => $user['school_id'],
            'email_address' => $user['email_address']
        );

        $this->db->where('user_id', $user['user_id']);

        $this->db->update('users', $updated_user);
        $this->db->trans_complete();

        return $user['user_id'];
    }

}

/* End of file user_model.php */