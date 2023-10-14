<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
       $this->forge->addField([
            'id'    => [
                'type'          => 'INT',
                'constraint'    => 11,
                'auto_increment'=> True
            ],
            'tsc_no'    => [
                'type'          => 'VARCHAR',
                'constraint'    => 200
            ],
            'county_id'    => [
                'type'          => 'INT',
                'constraint'    => 11,
            ],
            'first_name'    => [
                'type'          => 'VARCHAR',
                'constraint'    => 200,
            ],
            'last_name'    => [
                'type'          => 'VARCHAR',
                'constraint'    => 200,
            ],
            'email'    => [
                'type'          => 'VARCHAR',
                'constraint'    => 200,
                'unique'        => true,
            ],
            'password'    => [
                'type'          => 'VARCHAR',
                'constraint'    => 200,
            ],
            'role'       => [
                'type'       => "ENUM('admin', 'trainer', 'teacher')",
                'default'    => 'teacher',
            ],
            'isTrained'  => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0, // 0 for false, 1 for true
            ],
            'school_level'   => [
                'type'       => "ENUM('global', 'ecde', 'primary', 'secondary')",
                'default'    => 'primary',
            ]

        ]);
        $this->forge->addKey('id', true);
        //this is a foreign key
        $this->forge->addForeignKey('county_id', 'counties', 'id');
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
