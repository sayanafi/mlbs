<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InputanJuknis extends Migration
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
            'prosedur_tetap'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'sikap' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'ucapan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'pelaksana' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'persyaratan_pelengkapan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'waktu' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'output' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ]

        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('inputan_juknis');
    }

    public function down()
    {
        $this->forge->dropTable('inputan_juknis');
    }
}
