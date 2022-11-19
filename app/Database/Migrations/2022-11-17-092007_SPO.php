<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SPO extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'nama_spo'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'no_spo' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => '11'
            ],
            'unit_id' => [
                'type'           => 'INT',
                'constraint'     => '11'
            ]
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('spo');
    }

    public function down()
    {
        $this->forge->dropTable('spo');
    }
}
