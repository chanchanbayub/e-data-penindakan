<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TempatPenyimpananKendaraan extends Migration
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
            'tempat_penyimpanan' => [
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
        $this->forge->createTable('tempat_penyimpanan_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('tempat_penyimpanan_table');
    }
}
