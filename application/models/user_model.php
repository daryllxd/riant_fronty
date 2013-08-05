<?php

/**
 * user_model
 * 
 * user_id
 * user_name
 * user_password
 * user_email
 * user_profile_picture
 * user_has_finished_survey
 * optional: user_profesion, user_years_experience, user_tools_used
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
     * just one type of user, if user has no projects you get an array
     * with null values, but if the user has projects you get an 
     * array with the user's projects
     * @param int $user_id
     * @return array
     */
    public function get_current_user_and_projects($user_id = '') {
        $users = $this->db->select('*')->from('users')->
                join('projects', 'projects.user_id = users.user_id', 'left')->
                where('users.user_id', $user_id)->
                get();
        if ($users->num_rows >= 1) {
            $ret['resources'] = __::rest($users->result_array());
            $first_row = __::first($users->result_array());
            $ret['user_name'] = $first_row['user_name'];
            $ret['user_profile_picture'] = $first_row['user_profile_picture'];
            $ret['user_email'] = $first_row['user_email'];

            return $ret;
        }
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
    }

    public function add($user_to_add) {

        $user_to_add = array(
            'user_name' => $user_to_add['user_name'],
            'user_password' => sha1($user_to_add['user_password']),
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

    public function submit_survey($user) {
        $to_insert = array();
        
        $user['question_answers'] = __::rest($user['question_answers']);

        

        foreach ($user['question_answers'] as $key => $value) {
            $to_insert[] = array(
                'user_id' => $user['user_id'],
                'question_id' => $key + 1,
                'question_answer' => $value
            );
        }


        $this->db->trans_start();
        
        $this->db->insert_batch('users_questions', $to_insert);


        $this->db->trans_complete();
        
        return $this->db->last_query();
    }

}

/* End of file user_model.php */