<?php

namespace App\Controllers\Excel;

use App\Controllers\BaseController;
use App\Models\Admin\UkpdModel;
use App\Models\Operator\DataPenindakanModel;
use CodeIgniter\HTTP\ResponseInterface;

class ExcelController extends BaseController
{
    protected $dataPenindakanModel;
    protected $ukpdModel;

    public function __construct()
    {
        $this->dataPenindakanModel = new DataPenindakanModel();
    }

    public function cetak_laporan()
    {
        $ukpd_id = $this->request->getVar('ukpd_id');
        $tanggal_awal = $this->request->getVar('tanggal_awal');
        $tanggal_akhir = $this->request->getVar('tanggal_akhir');

        $data_penindakan = $this->dataPenindakanModel->getDataPenindakanPerPeriode($ukpd_id, $tanggal_awal, $tanggal_akhir);
        // dd($data_penindakan);

        $data = [
            'data_penindakan' => $data_penindakan,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
        ];

        return view('excel/export_v', $data);
    }
}
