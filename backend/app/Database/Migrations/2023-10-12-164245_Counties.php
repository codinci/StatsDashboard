<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Counties extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'    =>[
                'type'          => 'INT',
                'constraint'    => 11,
                'auto_increment'=> true
            ],
            'county_name'   =>[
                'type'          => 'VARCHAR',
                'constraint'    => 200
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('counties', true);
    }

    public function down()
    {
         $this->forge->dropTable('counties', true);
    }
}
