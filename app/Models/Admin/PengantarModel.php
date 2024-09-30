<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PengantarModel extends Model
{
    protected $table            = 'pengantar_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['pengeluaran_kendaraan_id', 'pengantar_sidang', 'tanggal_pengantar'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPengantarTable()
    {

        return $this->table($this->table)
            ->select('pengantar_table.pengeluaraan_id, pengantar_table.pengantar_sidang')
            ->join('pengeluaran_kendaraan_table', 'pengeluaran_kendaraan_table.id = pengantar_table.pengeluaran_kendaraan_id')
            // ->where(["pengantar_table.pengeluaran_kendaraan_id" => $pengeluaran_kendaraan_id])
            ->orderBy('id desc')
            ->get()->getRowObject();
    }
}
