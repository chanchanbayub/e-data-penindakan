<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataPenindakan extends Migration
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
            'ukpd_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nomor_bap' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_pemilik' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'type_kendaraan_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'tahun_perakitan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenis_kendaraan_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'kode_trayek' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',

            ],
            'warna_tnkb' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'kode_wilayah_awal' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nomor_kendaraan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'kode_wilayah_akhir' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenis_pelanggaran' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'pasal_pelanggaran' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'lokasi_penindakan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenis_penindakan_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'barang_bukti' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tanggal_penindakan' => [
                'type'       => 'date',
            ],

            'tanggal_sidang' => [
                'type'       => 'date',
            ],
            'lokasi_sidang_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'tempat_penyimpanan_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],

            'nama_petugas' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'status_kendaraan_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],

            'created_at' => [
                'type' => 'datetime'
            ],
            'updated_at' => [
                'type' => 'datetime'
            ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('ukpd_id', 'ukpd_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('jenis_kendaraan_id', 'jenis_kendaraan_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('type_kendaraan_id', 'type_kendaraan_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('jenis_penindakan_id', 'jenis_penindakan_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('lokasi_sidang_id', 'lokasi_sidang_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('tempat_penyimpanan_id', 'tempat_penyimpanan_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('status_kendaraan_id', 'status_kendaraan_table', 'id', 'CASCADE', 'CASCADE');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('data_penindakan_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('data_penindakan_table');
    }
}
