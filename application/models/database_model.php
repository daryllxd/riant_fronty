<?php

/**
 * database_model - Creates and destroys the database, do not touch
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

class Database_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }

    public function construct_database() {
        $this->dbforge->create_database('riant_fronty');
        $this->load->database('test', TRUE);

        $this->create_users_table();
        $this->seed_users_table();
        $this->create_projects_table();
    }

    private function create_users_table() {
        $this->dbforge->add_field(array(
            'user_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'user_password' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'user_email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE
            ),
            'user_profile_picture' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'default' => 'riant'
            ),
            'stamp_created TIMESTAMP DEFAULT NOW()',
            'stamp_updated' => array(
                'type' => 'DATETIME',
                'null' => TRUE)
        ));

        $this->dbforge->add_key('user_id', TRUE);
        $this->dbforge->create_table('users');
    }

    private function seed_users_table() {

        $user = array(
            'user_name' => 'danimoth2',
            'user_password' => sha1('daryll'),
            'user_email' => 'daryll.santos@gmail.com',
            'user_profile_picture' => 'daryll.jpg'
        );

        $this->db->insert('users', $user);

        $user = array(
            'user_name' => 'nelonoel',
            'user_password' => sha1('aaron'),
            'user_email' => 'aaronnoeldeleon@gmail.com',
            'user_profile_picture' => 'aaron.jpg'
        );

        $this->db->insert('users', $user);
        
        $user = array(
            'user_name' => 'luljm',
            'user_password' => sha1('luljm'),
            'user_email' => 'jm.ramos@gmail.com',
            'user_profile_picture' => 'jm.jpg'
        );

        $this->db->insert('users', $user);
        
        $user = array(
            'user_name' => 'seanamador',
            'user_password' => sha1('sean'),
            'user_email' => 'sean.amador@gmail.com',
            'user_profile_picture' => 'sean.jpg'
        );

        $this->db->insert('users', $user);
        
        $user = array(
            'user_name' => 'chengski',
            'user_password' => sha1('roselle'),
            'user_email' => 'roselle_basa@gmail.com',
            'user_profile_picture' => 'roselle.jpg'
        );

        $this->db->insert('users', $user);
    }

    private function create_projects_table() {
        $this->dbforge->add_field(array(
            'project_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'project_privacy' => array(
                'type' => 'DATE'
            ),
            'project_location' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE
            ),
            'time_logged_in TIMESTAMP DEFAULT NOW()',
            'time_logged_out' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            )
        ));
        $this->dbforge->add_key('project_id', TRUE);
        $this->dbforge->create_table('projects');
        $this->db->query('
            ALTER TABLE projects
            ADD CONSTRAINT fk_Users_Projects
            FOREIGN KEY (user_id)
            REFERENCES users(user_id)
            ');
    }

//    public function destroy_database() {
//        $this->load->database('test', TRUE);
//
//        $tables = $this->db->list_tables();
//
//        foreach ($tables as $table) {
//            echo $table;
//
//            $fields = $this->db->list_fields($table);
//
//            echo implode(' ', $fields);
//        }
//        $this->dbforge->drop_database(DATABASE_NAME);
//    }

}

/* End of file database_model.php */