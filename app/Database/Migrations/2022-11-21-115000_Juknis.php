<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Juknis extends Migration
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
            'nama_juknis'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'no_juknis' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'tanggal_dibuat' => [
                'type'           => 'DATE'
            ],
            'tanggal_disahkan' => [
                'type'           => 'DATE'
            ],
            'pengertian' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'tujuan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'dasar_hukum' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'kebijakan_ketentuan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'unit_pihakterkait' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'catatan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'inputan_id' => [
                'type'           => 'INT',
                'constraint'     => '11'
            ]

        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('juknis');
    }

    public function down()
    {
        $this->forge->dropTable('juknis');
    }
}
