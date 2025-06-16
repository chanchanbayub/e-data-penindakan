<?php

namespace App\Controllers;

use App\Models\Admin\DataPenindakanModel;
use App\Models\Admin\JenisKendaraanModel;
use App\Models\Admin\JenisPenindakanModel;
use App\Models\Admin\PengeluaranKendaraanModel;
use App\Models\Home\DataPenindakanModel as HomeDataPenindakanModel;

class Home extends BaseController
{
    protected $dataPenindakanModel;
    protected $pengeluaranKendaraanModel;
    protected $jenisPenindakanModel;
    protected $jenisKendaraanModel;
    protected $dataPenindakan;

    public function __construct()
    {
        $this->dataPenindakanModel = new HomeDataPenindakanModel();
        $this->pengeluaranKendaraanModel = new PengeluaranKendaraanModel();
        $this->jenisPenindakanModel = new JenisPenindakanModel();
        $this->jenisKendaraanModel = new JenisKendaraanModel();
        $this->dataPenindakan = new DataPenindakanModel();
    }

    public function index()
    {

        helper(['format']);

        $tahun = date('Y');
        $tanggal_hari_ini = date('Y-m-d');
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

        // data perhari
        $so_dalops_perhari = $this->dataPenindakanModel->getDataStopOperasiperHari(1, $tanggal_hari_ini);
        $so_pusat_perhari = $this->dataPenindakanModel->getDataStopOperasiperHari(2, $tanggal_hari_ini);
        $so_utara_perhari = $this->dataPenindakanModel->getDataStopOperasiperHari(4, $tanggal_hari_ini);
        $so_barat_perhari = $this->dataPenindakanModel->getDataStopOperasiperHari(3, $tanggal_hari_ini);
        $so_selatan_perhari = $this->dataPenindakanModel->getDataStopOperasiperHari(6, $tanggal_hari_ini);
        $so_timur_perhari = $this->dataPenindakanModel->getDataStopOperasiperHari(5, $tanggal_hari_ini);

        // BAP Tilang
        $bap_dalops_perhari = $this->dataPenindakanModel->getDataBapTilangperHari(1, $tanggal_hari_ini);
        $bap_pusat_perhari = $this->dataPenindakanModel->getDataBapTilangperHari(2, $tanggal_hari_ini);
        $bap_utara_perhari = $this->dataPenindakanModel->getDataBapTilangperHari(4, $tanggal_hari_ini);
        $bap_barat_perhari = $this->dataPenindakanModel->getDataBapTilangperHari(3, $tanggal_hari_ini);
        $bap_selatan_perhari = $this->dataPenindakanModel->getDataBapTilangperHari(6, $tanggal_hari_ini);
        $bap_timur_perhari = $this->dataPenindakanModel->getDataBapTilangperHari(5, $tanggal_hari_ini);

        $bulan_data  = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        $tahun = date('Y');

        $jumlah_data_penindakan = $this->dataPenindakanModel->where("YEAR(tanggal_penindakan)", $tahun)->countAllResults();
        $jumlah_so = $this->dataPenindakanModel->where("YEAR(tanggal_penindakan)", $tahun)->where(["jenis_penindakan_id" => 1])->countAllResults();
        $jumlah_tilang = $this->dataPenindakanModel->where("YEAR(tanggal_penindakan)", $tahun)->where(["jenis_penindakan_id" => 2])->countAllResults();

        $komponen_1 = $this->dataPenindakanModel->getPasalPelanggaran("288", $tanggal_hari_ini);

        $komponen_2 = $this->dataPenindakanModel->getPasalPelanggaran("285", $tanggal_hari_ini);
        $komponen_3 = $this->dataPenindakanModel->getPasalPelanggaran("286", $tanggal_hari_ini);

        $komponen_4 = $this->dataPenindakanModel->getPasalPelanggaran("307", $tanggal_hari_ini);

        $komponen_5 = $this->dataPenindakanModel->getPasalPelanggaran("287", $tanggal_hari_ini);
        $komponen_6 = $this->dataPenindakanModel->getPasalPelanggaran("305", $tanggal_hari_ini);
        $komponen_7 = $this->dataPenindakanModel->getPasalPelanggaran("306", $tanggal_hari_ini);

        $komponen_8 = $this->dataPenindakanModel->getPasalPelanggaran("277", $tanggal_hari_ini);
        $komponen_9 = $this->dataPenindakanModel->getPasalPelanggaran("279", $tanggal_hari_ini);

        $komponen_10 = $this->dataPenindakanModel->getPasalPelanggaran("276", $tanggal_hari_ini);
        $komponen_11 = $this->dataPenindakanModel->getPasalPelanggaran("302", $tanggal_hari_ini);
        $komponen_12 = $this->dataPenindakanModel->getPasalPelanggaran("308", $tanggal_hari_ini);

        $komponen_13 = $this->dataPenindakanModel->getPasalPelanggaran("301", $tanggal_hari_ini);

        $komponen_14 = $this->dataPenindakanModel->getPasalPelanggaran("287", $tanggal_hari_ini);

        $komponen_15 = $this->dataPenindakanModel->getPasalPelanggaran("289", $tanggal_hari_ini);
        $komponen_16 = $this->dataPenindakanModel->getPasalPelanggaran("293", $tanggal_hari_ini);
        $komponen_17 = $this->dataPenindakanModel->getPasalPelanggaran("298", $tanggal_hari_ini);
        $komponen_18 = $this->dataPenindakanModel->getPasalPelanggaran("300", $tanggal_hari_ini);
        $komponen_19 = $this->dataPenindakanModel->getPasalPelanggaran("303", $tanggal_hari_ini);
        $komponen_20 = $this->dataPenindakanModel->getPasalPelanggaran("304", $tanggal_hari_ini);

        $komponen_21 = $this->dataPenindakanModel->getPasalPelanggaran("278", $tanggal_hari_ini);



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
            'jenis_penindakan' => $this->jenisPenindakanModel->getJenisPenindakan(),
            'jenis_kendaraan' => $this->jenisKendaraanModel->getJenisKendaraan(),

            'so_dalops_perhari' => $so_dalops_perhari,
            'so_pusat_perhari' => $so_pusat_perhari,
            'so_utara_perhari' => $so_utara_perhari,
            'so_barat_perhari' => $so_barat_perhari,
            'so_selatan_perhari' => $so_selatan_perhari,
            'so_timur_perhari' => $so_timur_perhari,

            'bap_dalops_perhari' => $bap_dalops_perhari,
            'bap_pusat_perhari' => $bap_pusat_perhari,
            'bap_utara_perhari' => $bap_utara_perhari,
            'bap_barat_perhari' => $bap_barat_perhari,
            'bap_selatan_perhari' => $bap_selatan_perhari,
            'bap_timur_perhari' => $bap_timur_perhari,
            'bulan' => $bulan_data,
            'tahun' => $tahun,

            'jumlah_penindakan' => $jumlah_data_penindakan,
            'jumlah_so' => $jumlah_so,
            'jumlah_tilang' => $jumlah_tilang,


            'jp_1' => $komponen_1,
            'jp_2' => $komponen_2 + $komponen_3,
            'jp_3' => $komponen_4,
            'jp_4' => $komponen_5 + $komponen_6 + $komponen_7,
            'jp_5' => $komponen_8 + $komponen_9,
            'jp_6' => $komponen_10 + $komponen_11 + $komponen_12,
            'jp_7' => $komponen_13,
            'jp_8' => $komponen_14,
            'jp_9' => $komponen_15 + $komponen_16 + $komponen_17 + $komponen_18 + $komponen_19 + $komponen_20,
            'jp_10' => 0,
            'jp_11' => $komponen_21,

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

    public function cari_kendaraan()
    {
        if ($this->request->isAJAX()) {

            $kode_wilayah_awal = $this->request->getVar('kode_wilayah_awal');
            $nomor_kendaraan = $this->request->getVar('nomor_kendaraan');
            $kode_wilayah_akhir = $this->request->getVar('kode_wilayah_akhir');

            $data_penindakan = $this->dataPenindakan->searchKendaraan($kode_wilayah_awal, $nomor_kendaraan, $kode_wilayah_akhir);
            $data_so = $this->dataPenindakan->searchKendaraanSO(null, $kode_wilayah_awal, $nomor_kendaraan, $kode_wilayah_akhir);
            $data_tilang = $this->dataPenindakan->searchKendaraanTilang(null, $kode_wilayah_awal, $nomor_kendaraan, $kode_wilayah_akhir);

            $data = [
                'data_penindakan' => $data_penindakan,
                'data_so' => count($data_so),
                'data_tilang' => count($data_tilang),
            ];

            return json_encode($data);
        }
    }
}
