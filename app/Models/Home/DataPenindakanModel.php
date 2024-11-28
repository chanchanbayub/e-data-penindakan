<?php

namespace App\Models\Home;

use CodeIgniter\Model;

class DataPenindakanModel extends Model
{
    protected $table            = 'data_penindakan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['ukpd_id', 'nomor_bap', 'nama_pemilik', 'type_kendaraan_id', 'tahun_perakitan', 'jenis_kendaraan_id', 'kode_trayek', 'warna_tnkb', 'kode_wilayah_awal', 'nomor_kendaraan', 'kode_wilayah_akhir', 'jenis_pelanggaran', 'pasal_pelanggaran', 'lokasi_penindakan', 'jenis_penindakan_id', 'barang_bukti', 'tanggal_penindakan',  'tanggal_sidang', 'lokasi_sidang_id', 'tempat_penyimpanan_id', 'nama_petugas', 'status_kendaraan_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getDataStopOperasi($ukpd_id, $tahun)
    {
        return $this->table($this->table)
            ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan, status_kendaraan_table.status_kendaraan')
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
            ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
            ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id')
            ->where(["data_penindakan_table.ukpd_id" => $ukpd_id])
            ->where(["data_penindakan_table.jenis_penindakan_id" => 1])
            ->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)
            ->orderBy('data_penindakan_table.id desc')->countAllResults();
    }

    public function getDataBapTilang($ukpd_id, $tahun)
    {
        return $this->table($this->table)
            ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan, status_kendaraan_table.status_kendaraan')
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
            ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
            ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id')
            ->where(["data_penindakan_table.ukpd_id" => $ukpd_id])
            ->where(["data_penindakan_table.jenis_penindakan_id" => 2])
            ->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)
            ->orderBy('data_penindakan_table.id desc')->countAllResults();
    }

    public function getDataStopOperasiperHari($ukpd_id, $tanggal_penindakan)
    {
        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, data_penindakan_table.nama_petugas,data_penindakan_table.tanggal_sidang, data_penindakan_table.jenis_pelanggaran, data_penindakan_table.type_kendaraan_id, data_penindakan_table.kode_trayek,data_penindakan_table.tahun_perakitan ,data_penindakan_table.lokasi_penindakan, data_penindakan_table.nama_pemilik,data_penindakan_table.lokasi_sidang_id ,ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
                ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
                ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
                ->where(["data_penindakan_table.jenis_penindakan_id" => 1])
                ->where(["data_penindakan_table.tanggal_penindakan" =>  $tanggal_penindakan])
                ->orderBy('data_penindakan_table.id desc')
                ->countAllResults();
        } else {
            return $this->table($this->table)
                ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, data_penindakan_table.nama_petugas,data_penindakan_table.tanggal_sidang, data_penindakan_table.jenis_pelanggaran, data_penindakan_table.type_kendaraan_id, data_penindakan_table.kode_trayek,data_penindakan_table.tahun_perakitan ,data_penindakan_table.lokasi_penindakan, data_penindakan_table.nama_pemilik,data_penindakan_table.lokasi_sidang_id ,ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
                ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
                ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
                ->where(["data_penindakan_table.jenis_penindakan_id" => 1])
                ->where(["data_penindakan_table.ukpd_id" => $ukpd_id])
                ->where(["data_penindakan_table.tanggal_penindakan" =>  $tanggal_penindakan])
                ->orderBy('data_penindakan_table.id desc')
                ->countAllResults();
        }
    }

    public function getDataBapTilangperHari($ukpd_id, $tanggal_penindakan)
    {
        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, data_penindakan_table.nama_petugas,data_penindakan_table.tanggal_sidang, data_penindakan_table.jenis_pelanggaran, data_penindakan_table.type_kendaraan_id, data_penindakan_table.kode_trayek,data_penindakan_table.tahun_perakitan ,data_penindakan_table.lokasi_penindakan, data_penindakan_table.nama_pemilik,data_penindakan_table.lokasi_sidang_id ,ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
                ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
                ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
                ->where(["data_penindakan_table.jenis_penindakan_id" => 2])
                ->where(["data_penindakan_table.tanggal_penindakan" =>  $tanggal_penindakan])
                ->orderBy('data_penindakan_table.id desc')
                ->countAllResults();
        } else {
            return $this->table($this->table)
                ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, data_penindakan_table.nama_petugas,data_penindakan_table.tanggal_sidang, data_penindakan_table.jenis_pelanggaran, data_penindakan_table.type_kendaraan_id, data_penindakan_table.kode_trayek,data_penindakan_table.tahun_perakitan ,data_penindakan_table.lokasi_penindakan, data_penindakan_table.nama_pemilik,data_penindakan_table.lokasi_sidang_id ,ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
                ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
                ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
                ->where(["data_penindakan_table.jenis_penindakan_id" => 2])
                ->where(["data_penindakan_table.ukpd_id" => $ukpd_id])
                ->where(["data_penindakan_table.tanggal_penindakan" =>  $tanggal_penindakan])
                ->orderBy('data_penindakan_table.id desc')
                ->countAllResults();
        }
    }
}
