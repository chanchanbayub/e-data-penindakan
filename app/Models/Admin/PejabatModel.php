<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PejabatModel extends Model
{
    protected $table            = 'pejabat_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['ukpd_id', 'nama', 'nip'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPejabatPenandaTangan($ukpd_id)
    {
        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->select('pejabat_table.id, pejabat_table.ukpd_id, pejabat_table.nama, pejabat_table.nip, ukpd_table.ukpd')
                ->join('ukpd_table', 'ukpd_table.id = pejabat_table.ukpd_id')
                ->orderBy('pejabat_table.id desc')
                ->get()->getResultObject();
        } else {
            return $this->table($this->table)
                ->select('pejabat_table.id, pejabat_table.ukpd_id, pejabat_table.nama, pejabat_table.nip, ukpd_table.ukpd')
                ->join('ukpd_table', 'ukpd_table.id = pejabat_table.ukpd_id')
                ->where(["pejabat_table.ukpd_id" => $ukpd_id])
                ->orderBy('pejabat_table.id desc')
                ->get()->getResultObject();
        }
    }

    public function getPejabatPenandaTanganWhereUKPD($ukpd_id)
    {
        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->select('pejabat_table.id, pejabat_table.ukpd_id, pejabat_table.nama, pejabat_table.nip, ukpd_table.ukpd')
                ->join('ukpd_table', 'ukpd_table.id = pejabat_table.ukpd_id')
                ->orderBy('pejabat_table.id desc')
                ->get()->getResultObject();
        } else {
            return $this->table($this->table)
                ->select('pejabat_table.id, pejabat_table.ukpd_id, pejabat_table.nama, pejabat_table.nip, ukpd_table.ukpd')
                ->join('ukpd_table', 'ukpd_table.id = pejabat_table.ukpd_id')
                ->where(["pejabat_table.ukpd_id" => $ukpd_id])
                ->orderBy('pejabat_table.id desc')
                ->get()->getResultObject();
        }
    }

    public function getPejabatPenandaTanganWhereUKPDData($ukpd_id)
    {
        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->select('pejabat_table.id, pejabat_table.ukpd_id, pejabat_table.nama, pejabat_table.nip, ukpd_table.ukpd')
                ->join('ukpd_table', 'ukpd_table.id = pejabat_table.ukpd_id')
                ->orderBy('pejabat_table.id desc')
                ->get()->getRowObject();
        } else {
            return $this->table($this->table)
                ->select('pejabat_table.id, pejabat_table.ukpd_id, pejabat_table.nama, pejabat_table.nip, ukpd_table.ukpd')
                ->join('ukpd_table', 'ukpd_table.id = pejabat_table.ukpd_id')
                ->where(["pejabat_table.ukpd_id" => $ukpd_id])
                ->orderBy('pejabat_table.id desc')
                ->get()->getRowObject();
        }
    }
}
