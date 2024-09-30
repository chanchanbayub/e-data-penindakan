<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class StatusKendaraanModel extends Model
{
    protected $table            = 'status_kendaraan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['status_kendaraan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getStatusKendaraan()
    {
        return $this->table($this->table)
            ->orderBy('id asc')
            ->get()->getResultObject();
    }
}
