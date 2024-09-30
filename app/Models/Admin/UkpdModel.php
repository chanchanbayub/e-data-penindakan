<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class UkpdModel extends Model
{
    protected $table            = 'ukpd_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['ukpd', 'nama_dinas'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getUkpd($ukpd_id)
    {
        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->orderBy('id desc')
                ->get()->getResultObject();
        } else {
            return $this->table($this->table)
                ->where(["ukpd_table.id" => $ukpd_id])
                ->orderBy('id desc')
                ->get()->getResultObject();
        }
    }
}
