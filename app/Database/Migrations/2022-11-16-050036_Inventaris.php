<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Inventaris extends Migration
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
            'nama_barang'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'kode_barang' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'merk' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'bahan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128'
            ],
            'jumlah' => [
                'type'           => 'INT',
                'constraint'     => '11'
            ],
            'score' => [
                'type'           => 'INT',
                'constraint'     => '11'
            ],
            'unit_id' => [
                'type'           => 'INT',
                'constraint'     => '11'
            ]
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('inventaris');
    }

    public function down()
    {
        $this->forge->dropTable('inventaris');
    }
}
