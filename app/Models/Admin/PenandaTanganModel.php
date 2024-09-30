<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PenandaTanganModel extends Model
{
    protected $table            = 'penanda_tangan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['data_penindakan_id', 'pejabat_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getDataPenandaTangan($data_penindakan_id)
    {

        return $this->table($this->table)
            ->select('penanda_tangan_table.id, penanda_tangan_table.data_penindakan_id, penanda_tangan_table.pejabat_id, pejabat_table.nama, pejabat_table.nip ')
            ->join('data_penindakan_table', 'data_penindakan_table.id = penanda_tangan_table.data_penindakan_id')
            ->join('pejabat_table', 'pejabat_table.id = penanda_tangan_table.pejabat_id')
            ->where(["data_penindakan_table.id" => $data_penindakan_id])
            ->orderBy('id desc')
            ->get()->getRowObject();
    }
}
