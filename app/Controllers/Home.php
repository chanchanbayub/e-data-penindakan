<?php

namespace App\Controllers;

use App\Models\Admin\DataPenindakanModel;
use App\Models\Admin\PengeluaranKendaraanModel;
use App\Models\Home\DataPenindakanModel as HomeDataPenindakanModel;

class Home extends BaseController
{
    protected $dataPenindakanModel;
    protected $pengeluaranKendaraanModel;

    public function __construct()
    {
        $this->dataPenindakanModel = new HomeDataPenindakanModel();
        $this->pengeluaranKendaraanModel = new PengeluaranKendaraanModel();
    }

    public function index()
    {

        $tahun = date('Y');
        // Stop Operasi
        $so_dalops = $this->dataPenindakanModel->getDataStopOperasi(1, $tahun);
        $so_pusat = $this->dataPenindakanModel->getDataStopOperasi(2, $tahun);
        $so_utara = $this->dataPenindakanModel->getDataStopOperasi(4, $tahun);
        $so_barat = $this->dataPenindakanModel->getDataStopOperasi(3, $tahun);
        $so_selatan = $this->dataPenindakanModel->getDataStopOperasi(6, $tahun);
        $so_timur = $this->dataPenindakanModel->getDataStopOperasi(5, $tahun);

        // BAP Tilang
        $bap_dalops = $this->dataPenindakanModel->getDataBapTilang(1, $tahun);
        $bap_pusat = $this->dataPenindakanModel->getDataBapTilang(2, $tahun);
        $bap_utara = $this->dataPenindakanModel->getDataBapTilang(4, $tahun);
        $bap_barat = $this->dataPenindakanModel->getDataBapTilang(3, $tahun);
        $bap_selatan = $this->dataPenindakanModel->getDataBapTilang(6, $tahun);
        $bap_timur = $this->dataPenindakanModel->getDataBapTilang(5, $tahun);

        $data = [
            'title' => 'Dinas Perhubungan Prov. DKI Jakarta',
            'so_dalops' => $so_dalops,
            'so_pusat' => $so_pusat,
            'so_utara' => $so_utara,
            'so_barat' => $so_barat,
            'so_selatan' => $so_selatan,
            'so_timur' => $so_timur,

            'bap_dalops' => $bap_dalops,
            'bap_pusat' => $bap_pusat,
            'bap_utara' => $bap_utara,
            'bap_barat' => $bap_barat,
            'bap_selatan' => $bap_selatan,
            'bap_timur' => $bap_timur,
        ];
        return view('landing_page/landing_page_v', $data);
    }

    public function progress_pengeluaran()
    {


        $tanggal_hari_ini = date('Y-m-d');
        $pengeluaran_perhari = $this->pengeluaranKendaraanModel->getPengeluaranHarian($tanggal_hari_ini);
        $total_pengeluaran = count($pengeluaran_perhari);

        $pengajuan_perhari = $this->pengeluaranKendaraanModel->getPengajuanHarian($tanggal_hari_ini);
        $total_pengajuan = count($pengajuan_perhari);

        $pengeluaran_kendaraan = $this->pengeluaranKendaraanModel->getPengeluaranKendaraanPerhari($tanggal_hari_ini);
        helper(['format']);

        $data = [
            'title' => 'Progress Pengeluaran Kendaraan',
            'pengeluaran_kendaraan' => $pengeluaran_kendaraan,
            'total_pengeluaran' => $total_pengeluaran,
            'total_pengajuan' => $total_pengajuan
        ];
        return view('landing_page/progress_pengeluaran_v', $data);
    }
}
