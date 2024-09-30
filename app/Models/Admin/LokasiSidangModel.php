<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class LokasiSidangModel extends Model
{
    protected $table            = 'lokasi_sidang_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['lokasi_sidang'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getLokasiSidang()
    {
        return $this->table($this->table)
            ->orderBy('id asc')
            ->get()->getResultObject();
    }
}
