<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KodeTrayek extends Migration
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
            'jenis_kendaraan_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'kode_trayek' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
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
        $this->forge->addForeignKey('jenis_kendaraan_id', 'jenis_kendaraan_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kode_trayek_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('kode_trayek_table');
    }
}
