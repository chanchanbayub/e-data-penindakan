<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LokasiSidang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'lokasi_sidang' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_at' => [
                'type' => 'datetime'
            ],
            'updated_at' => [
                'type' => 'datetime'
            ]

        ]);
        $this->forge->addKey('id', true);
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('lokasi_sidang_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('lokasi_sidang_table');
    }
}
