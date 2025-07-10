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

        // Stuk Habis Masa Berlaku
        $stuk_pasal = $this->dataPenindakanModel->getPasalPelanggaran("288", $tanggal_hari_ini);
        $stuk_pasal_1 = $this->dataPenindakanModel->getPasalPelanggaran("288 (3 ) uu 22/2009", $tanggal_hari_ini);
        $stuk_pasal_2 = $this->dataPenindakanModel->getPasalPelanggaran("288 (3) ,308 uu 22/2009", $tanggal_hari_ini);
        $stuk_pasal_3 = $this->dataPenindakanModel->getPasalPelanggaran("288 (3) muu 22/2009", $tanggal_hari_ini);
        $stuk_pasal_4 = $this->dataPenindakanModel->getPasalPelanggaran("288 (3) uu 22/2009", $tanggal_hari_ini);
        $stuk_pasal_5 = $this->dataPenindakanModel->getPasalPelanggaran("288 (3) uu 22009", $tanggal_hari_ini);
        $stuk_pasal_6 = $this->dataPenindakanModel->getPasalPelanggaran("288 uu 22/2009", $tanggal_hari_ini);
        $stuk_pasal_7 = $this->dataPenindakanModel->getPasalPelanggaran("288 uualj", $tanggal_hari_ini);
        $stuk_pasal_8 = $this->dataPenindakanModel->getPasalPelanggaran("288 uulah", $tanggal_hari_ini);
        $stuk_pasal_9 = $this->dataPenindakanModel->getPasalPelanggaran("288 uulaj", $tanggal_hari_ini);
        $stuk_pasal_10 = $this->dataPenindakanModel->getPasalPelanggaran("177", $tanggal_hari_ini);

        $pasal_288 = $stuk_pasal + $stuk_pasal_1 + $stuk_pasal_2 + $stuk_pasal_3 + $stuk_pasal_4 + $stuk_pasal_5 + $stuk_pasal_6 + $stuk_pasal_7 + $stuk_pasal_8 + $stuk_pasal_9 + $stuk_pasal_10;

        // Persyaratan Teknis Laik Jalan
        $persyaratan_teknis_285 = $this->dataPenindakanModel->getPasalPelanggaran("285", $tanggal_hari_ini);
        $persyaratan_teknis_285_1 = $this->dataPenindakanModel->getPasalPelanggaran("285 uu 22/2009", $tanggal_hari_ini);
        $persyaratan_teknis_285_2 = $this->dataPenindakanModel->getPasalPelanggaran("285 uulaj", $tanggal_hari_ini);
        $persyaratan_teknis_285_3 = $this->dataPenindakanModel->getPasalPelanggaran("2858 uulaj", $tanggal_hari_ini);

        $pasal_286 = $this->dataPenindakanModel->getPasalPelanggaran("286", $tanggal_hari_ini);
        $pasal_285 = $persyaratan_teknis_285 + $persyaratan_teknis_285_1 + $persyaratan_teknis_285_2 + $persyaratan_teknis_285_3;

        $persyaratan_teknis = $pasal_285 + $pasal_286;

        // Overloading 
        $overload_pasal = $this->dataPenindakanModel->getPasalPelanggaran("307", $tanggal_hari_ini);
        $komponen_1 = $this->dataPenindakanModel->getPasalPelanggaran("307 syarat muatan", $tanggal_hari_ini);
        $komponen_2 = $this->dataPenindakanModel->getPasalPelanggaran("307 ulaj", $tanggal_hari_ini);
        $komponen_3 = $this->dataPenindakanModel->getPasalPelanggaran("307 uu 22/2007", $tanggal_hari_ini);
        $komponen_4 = $this->dataPenindakanModel->getPasalPelanggaran("307 uu 22/2009", $tanggal_hari_ini);
        $komponen_5 = $this->dataPenindakanModel->getPasalPelanggaran("307 uualj", $tanggal_hari_ini);
        $komponen_6 = $this->dataPenindakanModel->getPasalPelanggaran("307 uulaj", $tanggal_hari_ini);
        $komponen_7 = $this->dataPenindakanModel->getPasalPelanggaran("307,278 uu 22/2009", $tanggal_hari_ini);
        $komponen_8 = $this->dataPenindakanModel->getPasalPelanggaran("307/285", $tanggal_hari_ini);
        $komponen_9 = $this->dataPenindakanModel->getPasalPelanggaran("307/289", $tanggal_hari_ini);
        $komponen_10 = $this->dataPenindakanModel->getPasalPelanggaran("psl 118 (2) perda no. 5 tahun 2014 jo psl 307 jo psl 169 (1) uu no. 22 tahun 2009 dengan denda rp 50", $tanggal_hari_ini);
        $komponen_11 = $this->dataPenindakanModel->getPasalPelanggaran("pasal 276 jo pasal 36 uu no. 22 tahun 2009 dengan denda rp 500.000", $tanggal_hari_ini);
        $data_3007 = $this->dataPenindakanModel->getPasalPelanggaran("3007", $tanggal_hari_ini);
        $pasal_307 = $overload_pasal + $komponen_1 + $komponen_2 + $komponen_3 + $komponen_4 + $komponen_5 + $komponen_6 + $komponen_7 + $komponen_8 + $komponen_9 + $komponen_10 + $komponen_11 + $data_3007;

        // Angkutan Barang Khusus
        $angkutan_barang_khusus = $this->dataPenindakanModel->getPasalPelanggaran("287", $tanggal_hari_ini);
        $angkutan_barang_khusus_1 = $this->dataPenindakanModel->getPasalPelanggaran("287 uu 22/2009", $tanggal_hari_ini);
        $angkutan_barang_khusus_2 = $this->dataPenindakanModel->getPasalPelanggaran("287 uulaj", $tanggal_hari_ini);
        $angkutan_barang_khusus_3 = $this->dataPenindakanModel->getPasalPelanggaran("psl 249 perda 5 tahun 2014 dengan denda rp 250.000", $tanggal_hari_ini);
        $angkutan_barang_khusus_4 =  $this->dataPenindakanModel->getPasalPelanggaran("pasal 90", $tanggal_hari_ini);
        $pasal_287 = $angkutan_barang_khusus + $angkutan_barang_khusus_1 + $angkutan_barang_khusus_2 + $angkutan_barang_khusus_3 + $angkutan_barang_khusus_4;
        $pasal_305 = $this->dataPenindakanModel->getPasalPelanggaran("305", $tanggal_hari_ini);
        $pasal_306 = $this->dataPenindakanModel->getPasalPelanggaran("306", $tanggal_hari_ini);


        // Perlengkapan / Modifikasi Kendaraan
        $modifikasi_kendaraan = $this->dataPenindakanModel->getPasalPelanggaran("277", $tanggal_hari_ini);
        $modifikasi_kendaraan_1 = $this->dataPenindakanModel->getPasalPelanggaran("277 uu 22/2009", $tanggal_hari_ini);
        $modifikasi_kendaraan_2 = $this->dataPenindakanModel->getPasalPelanggaran("277 uualj", $tanggal_hari_ini);
        $modifikasi_kendaraan_3 = $this->dataPenindakanModel->getPasalPelanggaran("277 uulaj", $tanggal_hari_ini);
        $modif = $this->dataPenindakanModel->getPasalPelanggaran("pasal 254 perda 5 tahun 2014 dengan denda rp 3.000.000", $tanggal_hari_ini);
        $pasal_279 = $this->dataPenindakanModel->getPasalPelanggaran("279", $tanggal_hari_ini);
        $pasal_277 = $modifikasi_kendaraan + $modifikasi_kendaraan_1 + $modifikasi_kendaraan_2 + $modifikasi_kendaraan_3;
        $perlengkapan_dan_modifikasi = $pasal_277 + $pasal_279 + $modif;


        // Trayek Angkutan Umum
        $pasal_276 = $this->dataPenindakanModel->getPasalPelanggaran("276", $tanggal_hari_ini);
        $pasal_302 = $this->dataPenindakanModel->getPasalPelanggaran("302", $tanggal_hari_ini);
        $pasal_302_1 = $this->dataPenindakanModel->getPasalPelanggaran("302 uu 22/2009", $tanggal_hari_ini);
        $pasal_308 = $this->dataPenindakanModel->getPasalPelanggaran("308", $tanggal_hari_ini);
        $pasal_308_1 = $this->dataPenindakanModel->getPasalPelanggaran("308 uu 22/2009", $tanggal_hari_ini);
        $pasal_308_2 = $this->dataPenindakanModel->getPasalPelanggaran("308 uulaj", $tanggal_hari_ini);

        $trayek_angkutan_umum = $pasal_276 + $pasal_302 + $pasal_302_1 + $pasal_308 + $pasal_308_1 + $pasal_308_2;

        // Trayek Angkutan Barang
        $pasal_301 = $this->dataPenindakanModel->getPasalPelanggaran("301", $tanggal_hari_ini);

        // Keselamatan Lalu Lintas
        $pasal_289_1 = $this->dataPenindakanModel->getPasalPelanggaran("289", $tanggal_hari_ini);
        $komponen_11 = $this->dataPenindakanModel->getPasalPelanggaran("289 uu /2009", $tanggal_hari_ini);
        $komponen_12 = $this->dataPenindakanModel->getPasalPelanggaran("289 uu 22/ 2009", $tanggal_hari_ini);
        $komponen_13 = $this->dataPenindakanModel->getPasalPelanggaran("289 uu 22/2009", $tanggal_hari_ini);
        $komponen_14 = $this->dataPenindakanModel->getPasalPelanggaran("289 uulaj", $tanggal_hari_ini);

        $pasal_289 = $pasal_289_1 + $komponen_11 + $komponen_12 + $komponen_13 + $komponen_14;

        $pasal_293 = $this->dataPenindakanModel->getPasalPelanggaran("293", $tanggal_hari_ini);
        $pasal_298 = $this->dataPenindakanModel->getPasalPelanggaran("298", $tanggal_hari_ini);
        $pasal_106 = $this->dataPenindakanModel->getPasalPelanggaran("106", $tanggal_hari_ini);
        $pasal_300 = $this->dataPenindakanModel->getPasalPelanggaran("300", $tanggal_hari_ini);

        $pasal_303 = $this->dataPenindakanModel->getPasalPelanggaran("303", $tanggal_hari_ini);
        $pasal_303_1 = $this->dataPenindakanModel->getPasalPelanggaran("303 uu 22/2009", $tanggal_hari_ini);
        $pasal_303_2 = $this->dataPenindakanModel->getPasalPelanggaran("303 uulaj", $tanggal_hari_ini);
        $pasal_303_3 = $this->dataPenindakanModel->getPasalPelanggaran("pasal 303 jo pasal 169 (1) dengan denda rp 500.000", $tanggal_hari_ini);

        $pasal_keselamatan_303 = $pasal_303 + $pasal_303_1 + $pasal_303_2 + $pasal_303_3;

        $pasal_304 = $this->dataPenindakanModel->getPasalPelanggaran("304", $tanggal_hari_ini);
        // dd($komponen_4);
        // Lainnya
        $pasal_92 = $this->dataPenindakanModel->getPasalPelanggaran("92", $tanggal_hari_ini);

        $pasal_92_1 = $this->dataPenindakanModel->getPasalPelanggaran("92 perda 5/2014", $tanggal_hari_ini);
        $pasal_92_2 = $this->dataPenindakanModel->getPasalPelanggaran("92 perda 5/2024", $tanggal_hari_ini);
        $pasal_141 = $this->dataPenindakanModel->getPasalPelanggaran("141", $tanggal_hari_ini);
        $pasal_141_1 = $this->dataPenindakanModel->getPasalPelanggaran("pasal 254 perda 5 tahun 2014 dengan denda rp 3.000.000", $tanggal_hari_ini);

        $pasal_278 = $this->dataPenindakanModel->getPasalPelanggaran("278", $tanggal_hari_ini);
        $pasal_278_1 = $this->dataPenindakanModel->getPasalPelanggaran("pasal 278 (1) psl 106 (4a dan 4b) uu no. 22 tahun 2009 dengan denda rp 250.000", $tanggal_hari_ini);
        $pasal_278_2 = $this->dataPenindakanModel->getPasalPelanggaran("pasal 278 uu no. 22 tahun 2009 dengan denda rp 250.000", $tanggal_hari_ini);
        $pasal_281 = $this->dataPenindakanModel->getPasalPelanggaran("281", $tanggal_hari_ini);
        $pasal_281_1 =  $this->dataPenindakanModel->getPasalPelanggaran("pasal 91 (1) perda 5 tahun 2014 jo psl 281 uu no. 22 tahun 2009 dengan denda rp 1.000.000", $tanggal_hari_ini);
        $pasal_280 = $this->dataPenindakanModel->getPasalPelanggaran("280", $tanggal_hari_ini);

        // dd($pasal_141);

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


            'jp_1' => $pasal_288,
            'jp_2' => $persyaratan_teknis,
            'jp_3' => $pasal_307,
            'jp_4' =>  $pasal_305 + $pasal_306,
            'jp_5' => $perlengkapan_dan_modifikasi,
            'jp_6' => $trayek_angkutan_umum,
            'jp_7' => $pasal_301,
            'jp_8' => $pasal_287,
            'jp_9' => $pasal_289 + $pasal_293 + $pasal_298 + $pasal_300 + $pasal_keselamatan_303 + $pasal_304 + $pasal_106,
            'jp_10' => 0,
            'jp_11' => $pasal_141 + $pasal_92 + $pasal_278 + $pasal_92_1 + $pasal_92_2 + $pasal_278_1 + $pasal_278_2 + $pasal_281 + $pasal_280 + $pasal_141_1 + $pasal_281_1

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
