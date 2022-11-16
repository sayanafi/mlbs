<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StandarPelayanan extends Migration
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
            'nama_dokumensp'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'file_dokumensp' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'unit_id' => [
                'type'           => 'INT',
                'constraint'     => '11'
            ]
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('standar_pelayanan');
    }

    public function down()
    {
        $this->forge->dropTable('standar_pelayanan');
    }
}
