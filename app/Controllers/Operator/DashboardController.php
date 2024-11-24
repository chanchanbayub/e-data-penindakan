<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Models\Operator\DataPenindakanModel;
use App\Models\Operator\PengeluaranKendaraanModel;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    protected $dataPenindakanModel;
    protected $pengeluaranKendaraanModel;

    public function __construct()
    {
        $this->dataPenindakanModel = new DataPenindakanModel();
        $this->pengeluaranKendaraanModel = new PengeluaranKendaraanModel();
    }

    public function index()
    {
        if (session()->get('role_management_id') != 3) {
            return redirect()->back();
        }

        helper('format_helper');

        $data_penindakan = $this->dataPenindakanModel->getDataPenindakan(null);
        $total_penindakan = count($data_penindakan);

        $stop_operasi = $this->dataPenindakanModel->getDataStopOperasi(null);
        $total_so = count($stop_operasi);

        $tilang = $this->dataPenindakanModel->getDataBapTilang(null);
        $total_tilang = count($tilang);

        $pengeluaran_kendaraan = $this->pengeluaranKendaraanModel->getPengeluaranKendaraanStatusDua(null);
        $total_pengeluaran = count($pengeluaran_kendaraan);

        $pengajuan_kendaraan = $this->pengeluaranKendaraanModel->getPengeluaranKendaraanStatusEmpat(null);
        $total_pengajuan = count($pengajuan_kendaraan);

        $belum_keluar = $this->dataPenindakanModel->getKendaraanStatusKendaraanSatu(null);
        $total_belum_keluar = count($belum_keluar);


        $data = [
            'title' => 'Dashboard ',
            'total_penindakan' => $total_penindakan,
            'total_so' => $total_so,
            'total_tilang' => $total_tilang,
            'total_pengeluaran' => $total_pengeluaran,
            'total_belum_keluar' => $total_belum_keluar,
            'total_pengajuan' => $total_pengajuan
        ];

        return view('operator/dashboard_v', $data);
    }
}
