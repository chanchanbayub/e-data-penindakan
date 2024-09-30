<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PengeluaranKendaraan extends Migration
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
            'data_penindakan_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nomor_surat_pengeluaran' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'nomor_rangka' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,

            ],
            'nomor_mesin' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'alamat_pemilik_kendaraan' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'tanggal_keluar' => [
                'type'           => 'date',
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
        $this->forge->addForeignKey('data_penindakan_id', 'data_penindakan_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pengeluaran_kendaraan_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('pengeluaran_kendaraan_table');
    }
}
