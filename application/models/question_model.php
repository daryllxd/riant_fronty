<?php

/**
 * question_model
 * 
 * question_id
 * question_text
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

class Question_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * just one type of question
     * @param type $question_id
     * @return type
     */
    public function get_current_question_and_projects($question_id = '') {
        $questions = $this->db->select('*')->from('questions')->
                join('projects', 'projects.question_id = questions.question_id', 'left')->
                where('questions.question_id', $question_id)->
                get();
        if ($questions->num_rows >= 1) {
            $ret['resources'] = $questions->result_array();
            $aw = __::first($questions->result_array());
            $ret['question_name'] = $aw['question_name'];
            $ret['question_profile_picture'] = $aw['question_profile_picture'];
            $ret['question_email'] = $aw['question_email'];
            
//            return __::first($questions->result_array());
            return $ret;
        }
    }

    /**
     * 
     * @return array Associative array of associative arrays.
     */
    public function get() {

        $questions = $this->db->select('*')->from('questions')->get();

        foreach ($questions->result_array() as $row) {
            $rows[] = $row;
        }

        return $rows;

    }

    public function add($question_to_add) {

        $question_to_add = array(
            'question_name' => $question_to_add['question_name'],
            'question_password' => sha1($question_to_add['question_password']),
            'question_email' => $question_to_add['question_email']
        );

        $this->db->insert('questions', $question_to_add);

        return $this->db->insert_id();
    }

    public function edit($question) {
        $this->db->trans_start();

        $updated_question = array(
            'first_name' => $question['first_name'],
            'last_name' => $question['last_name'],
            'cellphone_number' => $question['cellphone_number'],
            'school_id' => $question['school_id'],
            'email_address' => $question['email_address']
        );

        $this->db->where('question_id', $question['question_id']);

        $this->db->update('questions', $updated_question);
        $this->db->trans_complete();

        return $question['question_id'];
    }

}

/* End of file question_model.php */