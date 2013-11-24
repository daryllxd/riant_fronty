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

        $first_row = __::first($users->result_array());
        $user_information['user_name'] = $first_row['user_name'];
        $user_information['user_profile_picture'] = $first_row['user_profile_picture'];
        $user_information['user_email'] = $first_row['user_email'];
        
        if ($first_row['project_id'] !== NULL){
            $user_information['resources'] = $users->result_array();
        }
        
        return $user_information;        
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

    public function edit($user_to_edit) {
        $this->db->trans_start();

        $updated_user = array(
            'user_profession' => $user_to_edit['profession'],
            'user_years_experience' => $user_to_edit['years_experience'],
            'user_tools_used' => $user_to_edit['tools_used'],
            'user_has_finished_survey' => TRUE
        );

        $this->db->where('user_id', $user_to_edit['user_id']);

        $this->db->update('users', $updated_user);
        $this->db->trans_complete();

        return $user_to_edit['user_id'];
    }

    /**
     * Not sure if I should move this to a question_model or what
     * @param array $survey_answers
     * @return type
     */
    public function submit_survey($survey_answers) {
        $this->db->trans_start();

        $this->edit($survey_answers['user_information']);

        $to_insert = array();

//        fix this because it isn't sanitized enough'
        $survey_answers['question_answers'] = __::rest($survey_answers['question_answers']);

        foreach ($survey_answers['question_answers'] as $key => $value) {
            $to_insert[] = array(
                'user_id' => $survey_answers['user_information']['user_id'],
                'question_id' => $key + 1,
                'question_answer' => $value
            );
        }

        $this->db->insert_batch('users_questions', $to_insert);


        $this->db->trans_complete();

        return $this->db->last_query();
    }
    
    

}

/* End of file user_model.php */