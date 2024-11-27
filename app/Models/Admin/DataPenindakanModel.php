<?php

namespace App\Models\Admin;

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

    public function getDataPenindakan($ukpd_id)
    {

        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan, status_kendaraan_table.status_kendaraan')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
                ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
                ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
                ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id')
                ->orderBy('data_penindakan_table.id desc')
                ->get()->getResultObject();
        } else {
            return $this->table($this->table)
                ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan, status_kendaraan_table.status_kendaraan')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
                ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
                ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
                ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id')
                ->where(["data_penindakan_table.ukpd_id" => $ukpd_id])
                ->orderBy('data_penindakan_table.id desc')
                ->get()->getResultObject();
        }
    }

    public function getDataPenindakanWithNomorBap($nomor_bap)
    {
        return $this->table($this->table)
            ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, data_penindakan_table.nama_petugas, data_penindakan_table.pasal_pelanggaran,data_penindakan_table.barang_bukti, data_penindakan_table.tanggal_sidang, data_penindakan_table.jenis_pelanggaran, data_penindakan_table.type_kendaraan_id, data_penindakan_table.kode_trayek,data_penindakan_table.tahun_perakitan ,data_penindakan_table.lokasi_penindakan, data_penindakan_table.nama_pemilik, data_penindakan_table.lokasi_sidang_id, data_penindakan_table.tempat_penyimpanan_id, data_penindakan_table.warna_tnkb, data_penindakan_table.status_kendaraan_id ,ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan, type_kendaraan_table.type_kendaraan, lokasi_sidang_table.lokasi_sidang, status_kendaraan_table.status_kendaraan')
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
            ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
            ->join('type_kendaraan_table', 'type_kendaraan_table.id = data_penindakan_table.type_kendaraan_id')
            ->join('lokasi_sidang_table', 'lokasi_sidang_table.id = data_penindakan_table.lokasi_sidang_id')
            ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id')
            ->where(["data_penindakan_table.nomor_bap" => $nomor_bap])
            ->orderBy('data_penindakan_table.id desc')
            ->get()->getRowObject();
    }

    public function searchKendaraan($kode_wilayah_awal, $nomor_kendaraan, $kode_wilayah_akhir)
    {
        return $this->table($this->table)
            ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, data_penindakan_table.nama_petugas,data_penindakan_table.tanggal_sidang, data_penindakan_table.jenis_pelanggaran, data_penindakan_table.type_kendaraan_id, data_penindakan_table.kode_trayek,data_penindakan_table.tahun_perakitan ,data_penindakan_table.lokasi_penindakan, data_penindakan_table.nama_pemilik, data_penindakan_table.lokasi_sidang_id ,ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan, type_kendaraan_table.type_kendaraan,  lokasi_sidang_table.lokasi_sidang, status_kendaraan_table.status_kendaraan, pengeluaran_kendaraan_table.tanggal_keluar, data_penindakan_table.pasal_pelanggaran, data_penindakan_table.barang_bukti')
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
            ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
            ->join('type_kendaraan_table', 'type_kendaraan_table.id = data_penindakan_table.type_kendaraan_id')
            ->join('lokasi_sidang_table', 'lokasi_sidang_table.id = data_penindakan_table.lokasi_sidang_id')
            ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id')
            ->join('pengeluaran_kendaraan_table', 'pengeluaran_kendaraan_table.data_penindakan_id = data_penindakan_table.id', 'left')
            ->where(["data_penindakan_table.kode_wilayah_awal" => $kode_wilayah_awal])
            ->where(["data_penindakan_table.nomor_kendaraan" => $nomor_kendaraan])
            ->where(["data_penindakan_table.kode_wilayah_akhir" => $kode_wilayah_akhir])
            // ->where(["data_penindakan_table.jenis_penindakan_id" => 1])
            ->orderBy('data_penindakan_table.tanggal_penindakan desc')
            ->get()->getResultObject();
    }

    public function searchDataKendaraan($kode_wilayah_awal, $nomor_kendaraan, $kode_wilayah_akhir)
    {
        return $this->table($this->table)
            ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, data_penindakan_table.nama_petugas,data_penindakan_table.tanggal_sidang, data_penindakan_table.jenis_pelanggaran, data_penindakan_table.type_kendaraan_id, data_penindakan_table.kode_trayek,data_penindakan_table.tahun_perakitan ,data_penindakan_table.lokasi_penindakan, data_penindakan_table.nama_pemilik, data_penindakan_table.lokasi_sidang_id ,ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan, type_kendaraan_table.type_kendaraan,  lokasi_sidang_table.lokasi_sidang, status_kendaraan_table.status_kendaraan, pengeluaran_kendaraan_table.tanggal_keluar, data_penindakan_table.pasal_pelanggaran, data_penindakan_table.barang_bukti')
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
            ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
            ->join('type_kendaraan_table', 'type_kendaraan_table.id = data_penindakan_table.type_kendaraan_id')
            ->join('lokasi_sidang_table', 'lokasi_sidang_table.id = data_penindakan_table.lokasi_sidang_id')
            ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id')
            ->join('pengeluaran_kendaraan_table', 'pengeluaran_kendaraan_table.data_penindakan_id = data_penindakan_table.id', 'left')
            ->where(["data_penindakan_table.kode_wilayah_awal" => $kode_wilayah_awal])
            ->where(["data_penindakan_table.nomor_kendaraan" => $nomor_kendaraan])
            ->where(["data_penindakan_table.kode_wilayah_akhir" => $kode_wilayah_akhir])
            // ->where(["data_penindakan_table.jenis_penindakan_id" => 1])
            ->orderBy('data_penindakan_table.tanggal_penindakan desc')
            ->get()->getRowObject();
    }

    public function searchKendaraanSO($ukpd_id, $kode_wilayah_awal, $nomor_kendaraan, $kode_wilayah_akhir)
    {
        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, data_penindakan_table.nama_petugas,data_penindakan_table.tanggal_sidang, data_penindakan_table.jenis_pelanggaran, data_penindakan_table.type_kendaraan_id, data_penindakan_table.kode_trayek,data_penindakan_table.tahun_perakitan ,data_penindakan_table.lokasi_penindakan, data_penindakan_table.nama_pemilik, data_penindakan_table.status_kendaraan_id, data_penindakan_table.lokasi_sidang_id ,ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan, type_kendaraan_table.type_kendaraan,lokasi_sidang_table.lokasi_sidang, status_kendaraan_table.status_kendaraan')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
                ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
                ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
                ->join('type_kendaraan_table', 'type_kendaraan_table.id = data_penindakan_table.type_kendaraan_id')
                ->join('lokasi_sidang_table', 'lokasi_sidang_table.id = data_penindakan_table.lokasi_sidang_id')
                ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id')
                ->where(["data_penindakan_table.kode_wilayah_awal" => $kode_wilayah_awal])
                ->where(["data_penindakan_table.nomor_kendaraan" => $nomor_kendaraan])
                ->where(["data_penindakan_table.kode_wilayah_akhir" => $kode_wilayah_akhir])
                ->where(["data_penindakan_table.jenis_penindakan_id" => 1])
                // ->where(["data_penindakan_table.status_kendaraan_id" => 1])
                ->orderBy('data_penindakan_table.tanggal_penindakan desc')
                ->get()->getResultObject();
        } else {
            return $this->table($this->table)
                ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, data_penindakan_table.nama_petugas,data_penindakan_table.tanggal_sidang, data_penindakan_table.jenis_pelanggaran, data_penindakan_table.type_kendaraan_id, data_penindakan_table.kode_trayek,data_penindakan_table.tahun_perakitan ,data_penindakan_table.lokasi_penindakan, data_penindakan_table.nama_pemilik, data_penindakan_table.status_kendaraan_id, data_penindakan_table.lokasi_sidang_id ,ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan, type_kendaraan_table.type_kendaraan,lokasi_sidang_table.lokasi_sidang, status_kendaraan_table.status_kendaraan')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
                ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
                ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
                ->join('type_kendaraan_table', 'type_kendaraan_table.id = data_penindakan_table.type_kendaraan_id')
                ->join('lokasi_sidang_table', 'lokasi_sidang_table.id = data_penindakan_table.lokasi_sidang_id')
                ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id')
                ->where(["data_penindakan_table.kode_wilayah_awal" => $kode_wilayah_awal])
                ->where(["data_penindakan_table.nomor_kendaraan" => $nomor_kendaraan])
                ->where(["data_penindakan_table.kode_wilayah_akhir" => $kode_wilayah_akhir])
                ->where(["data_penindakan_table.jenis_penindakan_id" => 1])
                // ->where(["data_penindakan_table.status_kendaraan_id" => 1])
                ->where(["data_penindakan_table.ukpd_id" => $ukpd_id])
                ->orderBy('data_penindakan_table.tanggal_penindakan desc')
                ->get()->getResultObject();
        }
    }
    public function getDataBapTilang($ukpd_id)
    {
        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, data_penindakan_table.nama_petugas,data_penindakan_table.tanggal_sidang, data_penindakan_table.jenis_pelanggaran, data_penindakan_table.type_kendaraan_id, data_penindakan_table.kode_trayek,data_penindakan_table.tahun_perakitan ,data_penindakan_table.lokasi_penindakan, data_penindakan_table.nama_pemilik,data_penindakan_table.lokasi_sidang_id ,ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
                ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
                ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
                ->where(["data_penindakan_table.jenis_penindakan_id" => 2])
                ->orderBy('data_penindakan_table.id desc')
                ->get()->getResultObject();
        } else {
            return $this->table($this->table)
                ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, data_penindakan_table.nama_petugas,data_penindakan_table.tanggal_sidang, data_penindakan_table.jenis_pelanggaran, data_penindakan_table.type_kendaraan_id, data_penindakan_table.kode_trayek,data_penindakan_table.tahun_perakitan ,data_penindakan_table.lokasi_penindakan, data_penindakan_table.nama_pemilik,data_penindakan_table.lokasi_sidang_id ,ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
                ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
                ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
                ->where(["data_penindakan_table.ukpd_id" => $ukpd_id])
                ->where(["data_penindakan_table.jenis_penindakan_id" => 2])
                ->orderBy('data_penindakan_table.id desc')
                ->get()->getResultObject();
        }
    }

    public function getDataStopOperasi($ukpd_id)
    {
        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, data_penindakan_table.nama_petugas,data_penindakan_table.tanggal_sidang, data_penindakan_table.jenis_pelanggaran, data_penindakan_table.type_kendaraan_id, data_penindakan_table.kode_trayek,data_penindakan_table.tahun_perakitan ,data_penindakan_table.lokasi_penindakan, data_penindakan_table.nama_pemilik,data_penindakan_table.lokasi_sidang_id ,ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
                ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
                ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
                ->where(["data_penindakan_table.jenis_penindakan_id" => 1])
                ->orderBy('data_penindakan_table.id desc')
                ->get()->getResultObject();
        } else {
            return $this->table($this->table)
                ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, data_penindakan_table.nama_petugas,data_penindakan_table.tanggal_sidang, data_penindakan_table.jenis_pelanggaran, data_penindakan_table.type_kendaraan_id, data_penindakan_table.kode_trayek,data_penindakan_table.tahun_perakitan ,data_penindakan_table.lokasi_penindakan, data_penindakan_table.nama_pemilik,data_penindakan_table.lokasi_sidang_id ,ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
                ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
                ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
                ->where(["data_penindakan_table.jenis_penindakan_id" => 1])
                ->where(["data_penindakan_table.ukpd_id" => $ukpd_id])
                ->orderBy('data_penindakan_table.id desc')
                ->get()->getResultObject();
        }
    }

    public function getDetails($id)
    {
        return $this->table($this->table)
            ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, data_penindakan_table.nama_petugas,data_penindakan_table.tanggal_sidang, data_penindakan_table.jenis_pelanggaran, data_penindakan_table.type_kendaraan_id, data_penindakan_table.kode_trayek,data_penindakan_table.tahun_perakitan ,data_penindakan_table.lokasi_penindakan, data_penindakan_table.nama_pemilik, data_penindakan_table.lokasi_sidang_id ,ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan, type_kendaraan_table.type_kendaraan,  lokasi_sidang_table.lokasi_sidang, status_kendaraan_table.status_kendaraan, pengeluaran_kendaraan_table.tanggal_keluar')
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
            ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
            ->join('type_kendaraan_table', 'type_kendaraan_table.id = data_penindakan_table.type_kendaraan_id')
            ->join('lokasi_sidang_table', 'lokasi_sidang_table.id = data_penindakan_table.lokasi_sidang_id')
            ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id')
            ->join('pengeluaran_kendaraan_table', 'pengeluaran_kendaraan_table.data_penindakan_id = data_penindakan_table.id', 'left')
            ->where(["data_penindakan_table.id" => $id])
            ->orderBy('data_penindakan_table.id desc')
            ->get()->getRowObject();
    }

    public function getKendaraanStatusKendaraanSatu($ukpd_id)
    {
        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, data_penindakan_table.nama_petugas,data_penindakan_table.tanggal_sidang, data_penindakan_table.jenis_pelanggaran, data_penindakan_table.type_kendaraan_id, data_penindakan_table.kode_trayek,data_penindakan_table.tahun_perakitan ,data_penindakan_table.lokasi_penindakan, data_penindakan_table.nama_pemilik,data_penindakan_table.lokasi_sidang_id ,ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
                ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
                ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
                ->where(["data_penindakan_table.status_kendaraan_id" => 1])
                ->where(["data_penindakan_table.jenis_penindakan_id" => 1])
                ->orderBy('data_penindakan_table.id desc')
                ->get()->getResultObject();
        } else {
            return $this->table($this->table)
                ->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap ,data_penindakan_table.kode_wilayah_awal, data_penindakan_table.nomor_kendaraan, data_penindakan_table.kode_wilayah_akhir,data_penindakan_table.jenis_kendaraan_id, data_penindakan_table.jenis_penindakan_id, data_penindakan_table.tanggal_penindakan, data_penindakan_table.nama_petugas,data_penindakan_table.tanggal_sidang, data_penindakan_table.jenis_pelanggaran, data_penindakan_table.type_kendaraan_id, data_penindakan_table.kode_trayek,data_penindakan_table.tahun_perakitan ,data_penindakan_table.lokasi_penindakan, data_penindakan_table.nama_pemilik,data_penindakan_table.lokasi_sidang_id ,ukpd_table.ukpd, jenis_kendaraan_table.jenis_kendaraan, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan')
                ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
                ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
                ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
                ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
                ->where(["data_penindakan_table.ukpd_id" => $ukpd_id])
                ->where(["data_penindakan_table.status_kendaraan_id" => 1])
                ->where(["data_penindakan_table.jenis_penindakan_id" => 1])
                ->orderBy('data_penindakan_table.id desc')
                ->get()->getResultObject();
        }
    }

    public function getDataPenindakanDataTable()
    {
        $db = db_connect();
        $builder = $db->table($this->table);
        $builder = $builder->select('data_penindakan_table.id,data_penindakan_table.ukpd_id,data_penindakan_table.nomor_bap , data_penindakan_table.tanggal_penindakan, ukpd_table.ukpd, tempat_penyimpanan_table.tempat_penyimpanan, jenis_penindakan_table.jenis_penindakan')
            ->select("CONCAT(data_penindakan_table.kode_wilayah_awal,' ',data_penindakan_table.nomor_kendaraan, ' ' ,data_penindakan_table.kode_wilayah_akhir) as concat_nomor_kendaraan")
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
            ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
            ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id');

        return $builder->orderBy('data_penindakan_table.tanggal_penindakan', 'desc');
    }

    public function getDataWithJenisPenindakan($jenis_penindakan_id, $tahun)
    {
        return $this->table($this->table)
            ->select('count(data_penindakan_table.jenis_penindakan_id) as total')
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
            ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = data_penindakan_table.jenis_kendaraan_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = data_penindakan_table.jenis_penindakan_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id')
            ->join('status_kendaraan_table', 'status_kendaraan_table.id = data_penindakan_table.status_kendaraan_id')
            ->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)
            ->where(['data_penindakan_table.jenis_penindakan_id' => $jenis_penindakan_id])
            ->orderBy('data_penindakan_table.id desc')->countAllResults();
    }
}
