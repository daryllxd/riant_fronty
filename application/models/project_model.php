<?php

/**
 * project_model
 * 
 * project_id
 * user_id
 * project_privacy
 * project_location
 * time_created
 * time_updated
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

class Project_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add($project_to_add) {

        $project_to_add = array(
            'project_name' => $project_to_add['project_name'],
            'project_description' => $project_to_add['project_description'],
            'user_id' => $project_to_add['user_id'],
            'project_privacy' => 'private'
        );
        $this->db->insert('projects', $project_to_add);
        if ($this->db->affected_rows() > 0) {
            $this->create_project_directory($this->db->insert_id());
        }
    }

    private function create_project_directory($project_id) {
        $base_directory = UPLOAD . $project_id;
        mkdir($base_directory);
        mkdir($base_directory . '/css');
        mkdir($base_directory . '/js');
        fopen($base_directory . '/config.txt', 'w');
        fclose($base_directory . '/config.txt');
        fopen($base_directory . '/css/styles.css', 'w');
        fclose($base_directory . '/css/styles.css');
        fopen($base_directory . '/js/core.js', 'w');
        fclose($base_directory . '/js/core.js');
    }
    
    public function download_project_as_zip($project_id){
        
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

    public function delete($project_to_delete) {
        $project_to_delete = array(
            'project_id' => $project_to_delete['project_id'],
            'user_id' => $project_to_delete['user_id']
        );

        $this->db->delete('projects', $project_to_delete);

        return $this->db->last_query();
    }

}

/* End of file user_model.php */