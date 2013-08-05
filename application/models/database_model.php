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
        $this->dbforge->create_database(DATABASE_NAME);
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
                'default' => 'logo.png'
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
            'project_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'project_description' => array(
                'type' => 'VARCHAR',
                'constraint' => '256',
                'null' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'project_privacy' => array(
                'type' => 'VARCHAR',
                'constraint' => '32'
            ),
            'project_location' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE
            ),
            'time_created TIMESTAMP DEFAULT NOW()',
            'time_updated' => array(
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

    public function create_and_seed_questions_table() {
        $this->dbforge->add_field(array(
            'question_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'question_text' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'time_created TIMESTAMP DEFAULT NOW()',
            'time_updated' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            )
        ));
        $this->dbforge->add_key('question_id', TRUE);
        $this->dbforge->create_table('questions');

        $base_questions = array('Riant provides a familiar development environment.', 'User interface elements offer informative feedback to user actions.', 'Riant is easy to learn.', 'Riant takes a short time to update the canvas.', 'Panels and user interface components load fast.', 'Riant takes a short time to manipulate project files.', 'Downloaded project files are relatively small in size.', 'The limit set by Riant in uploading files is enough for my needs.', 'Riant did not crash.', 'Riant provides useful information about errors in my code.', 'Riant permits easy reversal or actions.', 'Unexpected bugs do not affect project files.', 'Riant responded accurately to user actions.', 'Riant looks professional and pleasing.');

        foreach ($base_questions as $key) {
            $this->db->set('question_text', $key);
            $this->db->insert('questions');
        }
    }

    public function destroy_database() {
        $this->dbforge->drop_database(DATABASE_NAME);
    }

}

/* End of file database_model.php */