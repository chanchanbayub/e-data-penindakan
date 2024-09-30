<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PejabatTable extends Migration
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
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nip' => [
                'type' => 'VARCHAR',
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
        $this->forge->addForeignKey('ukpd_id', 'ukpd_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pejabat_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('pejabat_table');
    }
}
