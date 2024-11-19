<?php

namespace App\Controllers;

use App\Models\Admin\DataPenindakanModel;
use App\Models\Admin\PengeluaranKendaraanModel;
use App\Models\Home\DataPenindakanModel as HomeDataPenindakanModel;

class Home extends BaseController
{
    protected $dataPenindakanModel;

    public function __construct()
    {
        $this->dataPenindakanModel = new HomeDataPenindakanModel();
    }

    public function index()
    {
        // Stop Operasi
        $so_dalops = $this->dataPenindakanModel->getDataStopOperasi(1);
        $so_pusat = $this->dataPenindakanModel->getDataStopOperasi(2);
        $so_utara = $this->dataPenindakanModel->getDataStopOperasi(4);
        $so_barat = $this->dataPenindakanModel->getDataStopOperasi(3);
        $so_selatan = $this->dataPenindakanModel->getDataStopOperasi(6);
        $so_timur = $this->dataPenindakanModel->getDataStopOperasi(5);

        // BAP Tilang
        $bap_dalops = $this->dataPenindakanModel->getDataBapTilang(1);
        $bap_pusat = $this->dataPenindakanModel->getDataBapTilang(2);
        $bap_utara = $this->dataPenindakanModel->getDataBapTilang(4);
        $bap_barat = $this->dataPenindakanModel->getDataBapTilang(3);
        $bap_selatan = $this->dataPenindakanModel->getDataBapTilang(6);
        $bap_timur = $this->dataPenindakanModel->getDataBapTilang(5);

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
}
