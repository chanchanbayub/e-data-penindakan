<?php

namespace App\Models\Editor;

use CodeIgniter\Model;

class PengeluaranKendaraanModel extends Model
{
    protected $table            = 'pengeluaran_kendaraan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['data_penindakan_id', 'nomor_surat_pengeluaran', 'nomor_rangka', 'nomor_mesin', 'alamat_pemilik_kendaraan', 'tanggal_keluar'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPengeluaranKendaraan($ukpd_id)
    {
        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->select('pengeluaran_kendaraan_table.id, pengeluaran_kendaraan_table.data_penindakan_id, data_penindakan_table.status_kendaraan_id, pengeluaran_kendaraan_table.tanggal_keluar ,data_penindakan_table.kode_wilayah_awal,data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.nomor_kendaraan,ukpd_table.ukpd,data_penindakan_table.tanggal_penindakan, status_kendaraan_table.status_kendaraan, data_penindakan_table.ukpd_id, pengantar_table.pengantar_sidang')
                ->join('data_penindakan_table', 'data_penindakan_table.id = pengeluaran_kendaraan_table.data_penindakan_id')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id')
                ->join('pengantar_table', 'pengantar_table.pengeluaran_kendaraan_id = pengeluaran_kendaraan_table.id', 'left')
                ->orderBy('pengeluaran_kendaraan_table.tanggal_keluar desc')
                ->get()->getResultObject();
        } else {
            return $this->table($this->table)
                ->select('pengeluaran_kendaraan_table.id, pengeluaran_kendaraan_table.data_penindakan_id, data_penindakan_table.status_kendaraan_id, pengeluaran_kendaraan_table.tanggal_keluar ,data_penindakan_table.kode_wilayah_awal,data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.nomor_kendaraan,ukpd_table.ukpd,data_penindakan_table.tanggal_penindakan, status_kendaraan_table.status_kendaraan, data_penindakan_table.ukpd_id, pengantar_table.pengantar_sidang')
                ->join('data_penindakan_table', 'data_penindakan_table.id = pengeluaran_kendaraan_table.data_penindakan_id')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id')
                ->join('pengantar_table', 'pengantar_table.pengeluaran_kendaraan_id = pengeluaran_kendaraan_table.id', 'left')
                ->where(["data_penindakan_table.ukpd_id" => $ukpd_id])
                ->orderBy('pengeluaran_kendaraan_table.tanggal_keluar desc')
                ->get()->getResultObject();
        }
    }

    public function getPengeluaranKendaraanStatusDua($ukpd_id)
    {
        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->select('pengeluaran_kendaraan_table.id, pengeluaran_kendaraan_table.data_penindakan_id, data_penindakan_table.status_kendaraan_id, pengeluaran_kendaraan_table.tanggal_keluar ,data_penindakan_table.kode_wilayah_awal,data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.nomor_kendaraan,ukpd_table.ukpd,data_penindakan_table.tanggal_penindakan, status_kendaraan_table.status_kendaraan, data_penindakan_table.ukpd_id, pengantar_table.pengantar_sidang')
                ->join('data_penindakan_table', 'data_penindakan_table.id = pengeluaran_kendaraan_table.data_penindakan_id')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id')
                ->join('pengantar_table', 'pengantar_table.pengeluaran_kendaraan_id = pengeluaran_kendaraan_table.id', 'left')
                ->where(["data_penindakan_table.status_kendaraan_id" => 2])
                ->orderBy('pengeluaran_kendaraan_table.id desc')
                ->get()->getResultObject();
        } else {
            return $this->table($this->table)
                ->select('pengeluaran_kendaraan_table.id, pengeluaran_kendaraan_table.data_penindakan_id, data_penindakan_table.status_kendaraan_id, pengeluaran_kendaraan_table.tanggal_keluar ,data_penindakan_table.kode_wilayah_awal,data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.nomor_kendaraan,ukpd_table.ukpd,data_penindakan_table.tanggal_penindakan, status_kendaraan_table.status_kendaraan, data_penindakan_table.ukpd_id, pengantar_table.pengantar_sidang')
                ->join('data_penindakan_table', 'data_penindakan_table.id = pengeluaran_kendaraan_table.data_penindakan_id')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id')
                ->join('pengantar_table', 'pengantar_table.pengeluaran_kendaraan_id = pengeluaran_kendaraan_table.id', 'left')
                ->where(["data_penindakan_table.ukpd_id" => $ukpd_id])
                ->where(["data_penindakan_table.status_kendaraan_id" => 2])
                ->orderBy('pengeluaran_kendaraan_table.id desc')
                ->get()->getResultObject();
        }
    }

    public function getPengeluaranKendaraanStatusEmpat($ukpd_id)
    {
        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->select('pengeluaran_kendaraan_table.id, pengeluaran_kendaraan_table.data_penindakan_id, data_penindakan_table.status_kendaraan_id, pengeluaran_kendaraan_table.tanggal_keluar ,data_penindakan_table.kode_wilayah_awal,data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.nomor_kendaraan,ukpd_table.ukpd,data_penindakan_table.tanggal_penindakan, status_kendaraan_table.status_kendaraan, data_penindakan_table.ukpd_id, pengantar_table.pengantar_sidang')
                ->join('data_penindakan_table', 'data_penindakan_table.id = pengeluaran_kendaraan_table.data_penindakan_id')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id')
                ->join('pengantar_table', 'pengantar_table.pengeluaran_kendaraan_id = pengeluaran_kendaraan_table.id', 'left')
                ->where(["data_penindakan_table.status_kendaraan_id" => 4])
                ->Orwhere(["data_penindakan_table.status_kendaraan_id" => 3])
                ->Orwhere(["data_penindakan_table.status_kendaraan_id" => 5])
                ->orderBy('pengeluaran_kendaraan_table.id desc')
                ->get()->getResultObject();
        } else {
            return $this->table($this->table)
                ->select('pengeluaran_kendaraan_table.id, pengeluaran_kendaraan_table.data_penindakan_id, data_penindakan_table.status_kendaraan_id, pengeluaran_kendaraan_table.tanggal_keluar ,data_penindakan_table.kode_wilayah_awal,data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.nomor_kendaraan,ukpd_table.ukpd,data_penindakan_table.tanggal_penindakan, status_kendaraan_table.status_kendaraan, data_penindakan_table.ukpd_id, pengantar_table.pengantar_sidang')
                ->join('data_penindakan_table', 'data_penindakan_table.id = pengeluaran_kendaraan_table.data_penindakan_id')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id')
                ->join('pengantar_table', 'pengantar_table.pengeluaran_kendaraan_id = pengeluaran_kendaraan_table.id', 'left')
                ->where(["data_penindakan_table.ukpd_id" => $ukpd_id])
                ->where(["data_penindakan_table.status_kendaraan_id" => 4])
                ->orderBy('pengeluaran_kendaraan_table.id desc')
                ->get()->getResultObject();
        }
    }

    public function getPengeluaranKendaraanWhereId($id)
    {
        return $this->table($this->table)
            ->select('pengeluaran_kendaraan_table.id,pengeluaran_kendaraan_table.data_penindakan_id, pengeluaran_kendaraan_table.tanggal_keluar, pengeluaran_kendaraan_table.nomor_rangka, pengeluaran_kendaraan_table.nomor_mesin, pengeluaran_kendaraan_table.nomor_surat_pengeluaran, pengeluaran_kendaraan_table.alamat_pemilik_kendaraan, data_penindakan_table.status_kendaraan_id,data_penindakan_table.kode_wilayah_awal,data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.nomor_kendaraan, data_penindakan_table.tanggal_penindakan, data_penindakan_table.nama_pemilik, data_penindakan_table.jenis_pelanggaran,data_penindakan_table.lokasi_penindakan,tempat_penyimpanan_table.tempat_penyimpanan,type_kendaraan_table.type_kendaraan, jenis_kendaraan_table.jenis_kendaraan, data_penindakan_table.ukpd_id, data_penindakan_table.tanggal_sidang, lokasi_sidang_table.lokasi_sidang, ukpd_table.ukpd')
            ->join('data_penindakan_table', 'data_penindakan_table.id = pengeluaran_kendaraan_table.data_penindakan_id')
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
            ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
            ->join('type_kendaraan_table', 'type_kendaraan_table.id = data_penindakan_table.type_kendaraan_id')
            ->join('lokasi_sidang_table', 'lokasi_sidang_table.id = data_penindakan_table.lokasi_sidang_id')
            ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id')
            ->where(["pengeluaran_kendaraan_table.id" => $id])
            ->orderBy('pengeluaran_kendaraan_table.id desc')
            ->get()->getRowObject();
    }

    public function getLaporanPengeluaranKendaraan($tanggal_awal, $tanggal_akhir)
    {
        return $this->table($this->table)
            ->select('pengeluaran_kendaraan_table.id,pengeluaran_kendaraan_table.data_penindakan_id, pengeluaran_kendaraan_table.tanggal_keluar, pengeluaran_kendaraan_table.nomor_rangka, pengeluaran_kendaraan_table.nomor_mesin, pengeluaran_kendaraan_table.nomor_surat_pengeluaran, pengeluaran_kendaraan_table.alamat_pemilik_kendaraan, data_penindakan_table.status_kendaraan_id,data_penindakan_table.kode_wilayah_awal,data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.nomor_kendaraan, data_penindakan_table.tanggal_penindakan, data_penindakan_table.nama_pemilik, data_penindakan_table.jenis_pelanggaran,data_penindakan_table.lokasi_penindakan,tempat_penyimpanan_table.tempat_penyimpanan,type_kendaraan_table.type_kendaraan, jenis_kendaraan_table.jenis_kendaraan, data_penindakan_table.ukpd_id, data_penindakan_table.tanggal_sidang, lokasi_sidang_table.lokasi_sidang, ukpd_table.ukpd')
            ->join('data_penindakan_table', 'data_penindakan_table.id = pengeluaran_kendaraan_table.data_penindakan_id')
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
            ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
            ->join('type_kendaraan_table', 'type_kendaraan_table.id = data_penindakan_table.type_kendaraan_id')
            ->join('lokasi_sidang_table', 'lokasi_sidang_table.id = data_penindakan_table.lokasi_sidang_id')
            ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id')
            ->where("pengeluaran_kendaraan_table.tanggal_keluar BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")
            ->where(["data_penindakan_table.status_kendaraan_id" => 2])
            ->orderBy('pengeluaran_kendaraan_table.tanggal_keluar ASC')
            ->get()->getResultObject();
    }
}
