<?php

namespace App\Controllers\Pdf;

use App\Controllers\BaseController;
use App\Models\Admin\PejabatModel;
use App\Models\Admin\PenandaTanganModel;
use App\Models\Admin\PengeluaranKendaraanModel;
use CodeIgniter\HTTP\ResponseInterface;

class PdfController extends BaseController
{
    protected $mpdf;
    protected $pengeluaranKendaraanModel;
    protected $penandaTanganModel;
    protected $pejabatPenandaTanganModel;

    public function __construct()
    {
        $this->mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [216, 330]]);
        $this->pengeluaranKendaraanModel = new PengeluaranKendaraanModel();
        $this->pejabatPenandaTanganModel = new PejabatModel();
        $this->penandaTanganModel = new PenandaTanganModel();
    }

    public function index($id)
    {
        $this->mpdf->showImageErrors = true;

        helper(['format']);

        $cetak_spk = $this->pengeluaranKendaraanModel->getPengeluaranKendaraanWhereId($id);

        $pejabatPenandaTangan = $this->pejabatPenandaTanganModel->getPejabatPenandaTanganWhereUKPDData(1);
        // dd($pejabatPenandaTangan);

        $data = [
            'pengeluaran' => $cetak_spk,
            'pejabat' => $pejabatPenandaTangan,
        ];

        $html = view('pdf/spk_pdf', $data);
        $this->mpdf->WriteHTML($html);

        $this->response->setHeader('Content-Type', 'application/pdf');;
        $this->mpdf->output('SPK -' . 'Nomor Kendaraan' . '.pdf', 'I');
    }

    public function cetak_pengantar($id)
    {
        $this->mpdf->showImageErrors = true;
        $this->mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);

        helper(['format']);

        $cetak_pengantar = $this->pengeluaranKendaraanModel->getPengeluaranKendaraanWhereId($id);
        // dd($cetak_pengantar);

        $pejabatPenandaTangan = $this->penandaTanganModel->getDataPenandaTangan($cetak_pengantar->data_penindakan_id);
        // dd($pejabatPenandaTangan);

        $data = [
            'pengeluaran' => $cetak_pengantar,
            'pejabat' => $pejabatPenandaTangan,
        ];

        $html = view('pdf/pengantar_pdf', $data);
        $this->mpdf->WriteHTML($html);

        $this->response->setHeader('Content-Type', 'application/pdf');;
        $this->mpdf->output('Pengantar' . $cetak_pengantar->kode_wilayah_awal . $cetak_pengantar->nomor_kendaraan . $cetak_pengantar->kode_wilayah_akhir  . '.pdf', 'I');
    }

    public function cetak_laporan()
    {
        $this->mpdf->showImageErrors = true;

        helper(['format']);

        $tanggal_awal = $this->request->getVar('tanggal_awal');
        $tanggal_akhir = $this->request->getVar('tanggal_akhir');

        $laporan  = $this->pengeluaranKendaraanModel->getLaporanPengeluaranKendaraan($tanggal_awal, $tanggal_akhir);

        $data = [
            'laporan' => $laporan,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir
        ];

        $html = view('pdf/laporan_pdf', $data);
        $this->mpdf->WriteHTML($html);

        $this->response->setHeader('Content-Type', 'application/pdf');;
        $this->mpdf->output(' ' . format_indo(date('Y-m-d', strtotime($tanggal_awal))) . '' . '.pdf', 'D');
    }
}
