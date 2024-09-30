<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PengantarTable extends Migration
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
            'pengeluaran_kendaraan_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],

            'tanggal_pengantar' => [
                'type'           => 'date',
            ],
            'pengantar_sidang' => [
                'type'           => 'VARCHAR',
                'constraint'           => 255,
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
        $this->forge->addForeignKey('pengeluaran_kendaraan_id', 'pengeluaran_kendaraan_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pengantar_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('pengantar_table');
    }
}
