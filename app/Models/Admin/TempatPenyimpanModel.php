<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class TempatPenyimpanModel extends Model
{
    protected $table            = 'tempat_penyimpanan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['tempat_penyimpanan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getTempatPenyimpanan()
    {
        return $this->table($this->table)
            ->orderBy('id asc')
            ->get()->getResultObject();
    }
}
