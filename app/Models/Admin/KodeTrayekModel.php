<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class KodeTrayekModel extends Model
{
    protected $table            = 'kode_trayek_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['jenis_kendaraan_id', 'kode_trayek'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getKodeTrayek()
    {
        return $this->table($this->table)
            ->select('kode_trayek_table.id, kode_trayek_table.jenis_kendaraan_id, kode_trayek_table.kode_trayek, jenis_kendaraan_table.jenis_kendaraan')
            ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = kode_trayek_table.jenis_kendaraan_id')
            ->orderBy('kode_trayek_table.id desc')
            ->get()->getResultObject();
    }
}
