<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenandaTanganTable extends Migration
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
            'pejabat_id' => [
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
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->addForeignKey('data_penindakan_id', 'data_penindakan_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('pejabat_id', 'pejabat_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('penanda_tangan_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('penanda_tangan_table');
    }
}
