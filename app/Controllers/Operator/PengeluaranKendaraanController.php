<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Models\Admin\JenisKendaraanModel;
use App\Models\Admin\JenisPenindakanModel;
use App\Models\Admin\KodeTrayekModel;
use App\Models\Admin\LokasiSidangModel;
use App\Models\Admin\PejabatModel;
use App\Models\Admin\PenandaTanganModel;
use App\Models\Admin\PengantarModel;
use App\Models\Admin\StatusKendaraanModel;
use App\Models\Admin\TempatPenyimpanModel;
use App\Models\Admin\TypeKendaraanModel;
use App\Models\Admin\UkpdModel;
use App\Models\Operator\DataPenindakanModel;
use App\Models\Operator\PengeluaranKendaraanModel;
use CodeIgniter\HTTP\ResponseInterface;

class PengeluaranKendaraanController extends BaseController
{
    protected $validation;
    protected $pengeluaranKendaraanModel;
    protected $ukpdModel;
    protected $jenisKendaraanModel;
    protected $jenisPenindakanModel;
    protected $tempatPenyimpananModel;
    protected $kodeTrayekModel;
    protected $lokasiSidangModel;
    protected $typeKendaraanModel;
    protected $statusKendaraanModel;
    protected $dataPenindakanModel;
    protected $pejabatModel;
    protected $penandaTanganModel;
    protected $pengantarSidangModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->pengeluaranKendaraanModel = new PengeluaranKendaraanModel();
        $this->ukpdModel = new UkpdModel();
        $this->jenisKendaraanModel = new JenisKendaraanModel();
        $this->jenisPenindakanModel = new JenisPenindakanModel();
        $this->tempatPenyimpananModel = new TempatPenyimpanModel();
        $this->lokasiSidangModel = new LokasiSidangModel();
        $this->typeKendaraanModel = new TypeKendaraanModel();
        $this->statusKendaraanModel = new StatusKendaraanModel();
        $this->dataPenindakanModel = new DataPenindakanModel();
        $this->kodeTrayekModel = new KodeTrayekModel();
        $this->pejabatModel = new PejabatModel();
        $this->penandaTanganModel = new PenandaTanganModel();
        $this->pengantarSidangModel = new PengantarModel();
    }

    public function index()
    {
        $ukpd = $this->ukpdModel->getUkpd(null);
        $jenisKendaraan = $this->jenisKendaraanModel->getJenisKendaraan();
        $jenisPenindakan = $this->jenisPenindakanModel->getJenisPenindakan();
        $tempatPenyimpanan = $this->tempatPenyimpananModel->getTempatPenyimpanan();
        $lokasiSidang = $this->lokasiSidangModel->getLokasiSidang();
        $statusKendaraan = $this->statusKendaraanModel->getStatusKendaraanData();
        $pengeluaran_kendaraan = $this->pengeluaranKendaraanModel->getPengeluaranKendaraan(null);

        $data = [
            'title' => 'Pengeluaran Kendaraan',
            'ukpd' => $ukpd,
            'jenis_kendaraan' => $jenisKendaraan,
            'jenis_penindakan' => $jenisPenindakan,
            'tempat_penyimpanan' => $tempatPenyimpanan,
            'lokasi_sidang' => $lokasiSidang,
            'status_kendaraan' => $statusKendaraan,
            'pengeluaran_kendaraan' => $pengeluaran_kendaraan,

        ];

        return view('operator/pengeluaran_kendaraan_v', $data);
    }

    public function search()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'kode_wilayah_awal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kode Wilayah Awal Tidak Boleh Kosong !'
                    ]
                ],
                'nomor_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
                'kode_wilayah_akhir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kode Wilayah Akhir Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'kode_wilayah_awal' => $this->validation->getError('kode_wilayah_awal'),
                        'nomor_kendaraan' => $this->validation->getError('nomor_kendaraan'),
                        'kode_wilayah_akhir' => $this->validation->getError('kode_wilayah_akhir'),

                    ]
                ];
            } else {

                $ukpd_id = session()->get('ukpd_id');

                $kode_wilayah_awal = $this->request->getVar('kode_wilayah_awal');
                $nomor_kendaraan = $this->request->getVar('nomor_kendaraan');
                $kode_wilayah_akhir = $this->request->getVar('kode_wilayah_akhir');

                if (session()->get('role_management_id') == 2 || session()->get('role_management_id') == 3) {
                    $data_penindakan = $this->dataPenindakanModel->searchKendaraanSO(null, $kode_wilayah_awal, $nomor_kendaraan, $kode_wilayah_akhir);
                } else {
                    $data_penindakan = $this->dataPenindakanModel->searchKendaraanSO($ukpd_id, $kode_wilayah_awal, $nomor_kendaraan, $kode_wilayah_akhir);
                }


                $alert = [
                    'data_penindakan' => $data_penindakan
                ];
            }

            return json_encode($alert);
        }
    }

    public function form_insert($nomor_bap)
    {
        $data = $this->dataPenindakanModel->getDataPenindakanWithNomorBap($nomor_bap);

        if ($data == null) {
            return redirect()->back();
        } else {

            $ukpd = $this->ukpdModel->getUkpd(null);
            $jenisKendaraan = $this->jenisKendaraanModel->getJenisKendaraan();
            $jenisPenindakan = $this->jenisPenindakanModel->getJenisPenindakan();
            $tempatPenyimpanan = $this->tempatPenyimpananModel->getTempatPenyimpanan();
            $lokasiSidang = $this->lokasiSidangModel->getLokasiSidang();
            $statusKendaraan = $this->statusKendaraanModel->getStatusKendaraan();
            $typeKendaraan = $this->typeKendaraanModel->getTypeKendaraan();
            $kodeTrayek = $this->kodeTrayekModel->getKodeTrayek();
            $pejabat = $this->pejabatModel->getPejabatPenandaTanganWhereUKPD(null);


            $data = [
                'title' => 'Form Pengeluaran Kendaraan',
                'data_penindakan' => $data,
                'ukpd' => $ukpd,
                'jenis_kendaraan' => $jenisKendaraan,
                'jenis_penindakan' => $jenisPenindakan,
                'tempat_penyimpanan' => $tempatPenyimpanan,
                'lokasi_sidang' => $lokasiSidang,
                'status_kendaraan' => $statusKendaraan,
                'type_kendaraan' => $typeKendaraan,
                'kode_trayek' => $kodeTrayek,
                'pejabat' => $pejabat
            ];

            return view('operator/form_pengeluaran_kendaraan_v', $data);
        }
    }


    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'ukpd_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'UKPD Tidak Boleh Kosong !'
                    ]
                ],
                'nomor_bap' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor BAP Tidak Boleh Kosong !'
                    ]
                ],
                'nama_pemilik' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Pemilik Tidak Boleh Kosong !'
                    ]
                ],
                'type_kendaraan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Type Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
                'tahun_perakitan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tahun Perakitan Tidak Boleh Kosong !'
                    ]
                ],
                'jenis_kendaraan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
                'kode_trayek' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kode Trayek Tidak Boleh Kosong !'
                    ]
                ],
                'warna_tnkb' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Warna TNKB Tidak Boleh Kosong !'
                    ]
                ],
                'kode_wilayah_awal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
                'nomor_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
                'kode_wilayah_akhir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
                'jenis_pelanggaran' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Pelanggaran Tidak Boleh Kosong !'
                    ]
                ],
                'pasal_pelanggaran' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pasal Pelanggaran Tidak Boleh Kosong !'
                    ]
                ],
                'lokasi_penindakan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Lokasi Penindakan Tidak Boleh Kosong !'
                    ]
                ],
                'jenis_penindakan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Penindakan Tidak Boleh Kosong !'
                    ]
                ],
                'barang_bukti' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Barang Bukti Tidak Boleh Kosong !'
                    ]
                ],
                'tanggal_penindakan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Penindakan Tidak Boleh Kosong !'
                    ]
                ],

                'tanggal_sidang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Sidang Tidak Boleh Kosong !'
                    ]
                ],
                'lokasi_sidang_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Lokasi Sidang Tidak Boleh Kosong !'
                    ]
                ],
                'tempat_penyimpanan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tempat Penyimpanan Tidak Boleh Kosong !'
                    ]
                ],

                'nama_petugas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Petugas Tidak Boleh Kosong !'
                    ]
                ],
                'nomor_surat_pengeluaran' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Surat Tidak Boleh Kosong !'
                    ]
                ],
                'nomor_rangka' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Rangka Tidak Boleh Kosong !'
                    ]
                ],
                'nomor_mesin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Mesin Tidak Boleh Kosong !'
                    ]
                ],
                'alamat_pemilik_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat Pemilik Tidak Boleh Kosong !'
                    ]
                ],
                'tanggal_keluar' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Keluar Tidak Boleh Kosong !'
                    ]
                ],
                'status_kendaraan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
                'pejabat_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Penanda Tangan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'ukpd_id' => $this->validation->getError('ukpd_id'),
                        'nomor_bap' => $this->validation->getError('nomor_bap'),
                        'nama_pemilik' => $this->validation->getError('nama_pemilik'),
                        'type_kendaraan_id' => $this->validation->getError('type_kendaraan_id'),
                        'tahun_perakitan' => $this->validation->getError('tahun_perakitan'),
                        'jenis_kendaraan_id' => $this->validation->getError('jenis_kendaraan_id'),
                        'kode_trayek' => $this->validation->getError('kode_trayek'),
                        'warna_tnkb' => $this->validation->getError('warna_tnkb'),
                        'kode_wilayah_awal' => $this->validation->getError('kode_wilayah_awal'),
                        'nomor_kendaraan' => $this->validation->getError('nomor_kendaraan'),
                        'kode_wilayah_akhir' => $this->validation->getError('kode_wilayah_akhir'),
                        'jenis_pelanggaran' => $this->validation->getError('jenis_pelanggaran'),
                        'pasal_pelanggaran' => $this->validation->getError('pasal_pelanggaran'),
                        'lokasi_penindakan' => $this->validation->getError('lokasi_penindakan'),
                        'jenis_penindakan_id' => $this->validation->getError('jenis_penindakan_id'),
                        'barang_bukti' => $this->validation->getError('barang_bukti'),
                        'tanggal_penindakan' => $this->validation->getError('tanggal_penindakan'),
                        'tanggal_sidang' => $this->validation->getError('tanggal_sidang'),
                        'lokasi_sidang_id' => $this->validation->getError('lokasi_sidang_id'),
                        'tempat_penyimpanan_id' => $this->validation->getError('tempat_penyimpanan_id'),
                        'nama_petugas' => $this->validation->getError('nama_petugas'),
                        'nomor_surat_pengeluaran' => $this->validation->getError('nomor_surat_pengeluaran'),
                        'nomor_rangka' => $this->validation->getError('nomor_rangka'),
                        'nomor_mesin' => $this->validation->getError('nomor_mesin'),
                        'alamat_pemilik_kendaraan' => $this->validation->getError('alamat_pemilik_kendaraan'),
                        'tanggal_keluar' => $this->validation->getError('tanggal_keluar'),
                        'status_kendaraan_id' => $this->validation->getError('status_kendaraan_id'),
                        'pejabat_id' => $this->validation->getError('pejabat_id'),

                    ]
                ];
            } else {

                $id = $this->request->getVar('id');
                $ukpd_id = $this->request->getVar('ukpd_id');
                $nomor_bap = $this->request->getVar('nomor_bap');
                $nama_pemilik = $this->request->getVar('nama_pemilik');
                $type_kendaraan_id = $this->request->getVar('type_kendaraan_id');
                $tahun_perakitan = $this->request->getVar('tahun_perakitan');
                $jenis_kendaraan_id = $this->request->getVar('jenis_kendaraan_id');
                $kode_trayek = $this->request->getVar('kode_trayek');
                $warna_tnkb = $this->request->getVar('warna_tnkb');
                $kode_wilayah_awal = $this->request->getVar('kode_wilayah_awal');
                $nomor_kendaraan = $this->request->getVar('nomor_kendaraan');
                $kode_wilayah_akhir = $this->request->getVar('kode_wilayah_akhir');
                $jenis_pelanggaran = $this->request->getVar('jenis_pelanggaran');
                $pasal_pelanggaran = $this->request->getVar('pasal_pelanggaran');
                $lokasi_penindakan = $this->request->getVar('lokasi_penindakan');
                $jenis_penindakan_id = $this->request->getVar('jenis_penindakan_id');
                $barang_bukti = $this->request->getVar('barang_bukti');
                $tanggal_penindakan = $this->request->getVar('tanggal_penindakan');
                $tanggal_sidang = $this->request->getVar('tanggal_sidang');
                $lokasi_sidang_id = $this->request->getVar('lokasi_sidang_id');
                $tempat_penyimpanan_id = $this->request->getVar('tempat_penyimpanan_id');
                $nama_petugas = $this->request->getVar('nama_petugas');

                $status_kendaraan_id = $this->request->getVar('status_kendaraan_id');

                $pejabat_id = $this->request->getVar('pejabat_id');

                $this->dataPenindakanModel->update($id, [
                    'ukpd_id' => strtolower($ukpd_id),
                    'nomor_bap' => strtolower($nomor_bap),
                    'nama_pemilik' => strtolower($nama_pemilik),
                    'type_kendaraan_id' => strtolower($type_kendaraan_id),
                    'tahun_perakitan' => strtolower($tahun_perakitan),
                    'jenis_kendaraan_id' => strtolower($jenis_kendaraan_id),
                    'kode_trayek' => strtolower($kode_trayek),
                    'warna_tnkb' => strtolower($warna_tnkb),
                    'kode_wilayah_awal' => strtolower($kode_wilayah_awal),
                    'nomor_kendaraan' => strtolower($nomor_kendaraan),
                    'kode_wilayah_akhir' => strtolower($kode_wilayah_akhir),
                    'jenis_pelanggaran' => strtolower($jenis_pelanggaran),
                    'pasal_pelanggaran' => strtolower($pasal_pelanggaran),
                    'lokasi_penindakan' => strtolower($lokasi_penindakan),
                    'jenis_penindakan_id' => strtolower($jenis_penindakan_id),
                    'barang_bukti' => strtolower($barang_bukti),
                    'tanggal_penindakan' => strtolower($tanggal_penindakan),
                    'tanggal_sidang' => strtolower($tanggal_sidang),
                    'lokasi_sidang_id' => strtolower($lokasi_sidang_id),
                    'tempat_penyimpanan_id' => strtolower($tempat_penyimpanan_id),
                    'nama_petugas' => strtolower($nama_petugas),
                    'status_kendaraan_id' => $status_kendaraan_id,
                ]);

                $nomor_surat_pengeluaran = $this->request->getVar('nomor_surat_pengeluaran');
                $nomor_rangka = $this->request->getVar('nomor_rangka');
                $nomor_mesin = $this->request->getVar('nomor_mesin');
                $alamat_pemilik_kendaraan = $this->request->getVar('alamat_pemilik_kendaraan');
                $tanggal_keluar = $this->request->getVar('tanggal_keluar');

                $this->pengeluaranKendaraanModel->save([
                    'data_penindakan_id' => $id,
                    'nomor_surat_pengeluaran' => strtolower($nomor_surat_pengeluaran),
                    'nomor_rangka' => strtolower($nomor_rangka),
                    'nomor_mesin' => strtolower($nomor_mesin),
                    'alamat_pemilik_kendaraan' => strtolower($alamat_pemilik_kendaraan),
                    'tanggal_keluar' => strtolower($tanggal_keluar),

                ]);

                $this->penandaTanganModel->save([
                    'data_penindakan_id' => $id,
                    'pejabat_id' => $pejabat_id,
                ]);

                $alert = [
                    'success' => 'Surat Pengeluaran Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $pengeluaran_kendaraan = $this->pengeluaranKendaraanModel->getPengeluaranKendaraanWhereId($id);

            return json_encode($pengeluaran_kendaraan);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $pengeluaran_kendaraan = $this->pengeluaranKendaraanModel->where(["id" => $id])->first();

            $pengantar_sidang = $this->pengantarSidangModel->where(["pengeluaran_kendaraan_id" => $pengeluaran_kendaraan["id"]])->get()->getRowObject();

            if ($pengantar_sidang != null) {
                $path_pengantar = 'pengantar_sidang/' . $pengantar_sidang->pengantar_sidang;

                if ($pengantar_sidang->pengantar_sidang != null) {
                    if (file_exists($path_pengantar)) {
                        unlink($path_pengantar);
                    }
                }
            }

            $this->dataPenindakanModel->update($pengeluaran_kendaraan['data_penindakan_id'], [
                'status_kendaraan_id' => 1
            ]);

            $this->pengeluaranKendaraanModel->delete($pengeluaran_kendaraan["id"]);


            $alert = [
                'success' => 'Data Pengeluaran Kendaraan Berhasil di Hapus'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'nomor_surat_pengeluaran' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Surat Tidak Boleh Kosong !'
                    ]
                ],
                'nomor_rangka' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Rangka Tidak Boleh Kosong !'
                    ]
                ],
                'nomor_mesin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Mesin Tidak Boleh Kosong !'
                    ]
                ],
                'alamat_pemilik_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat Pemilik Tidak Boleh Kosong !'
                    ]
                ],
                'tanggal_keluar' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Keluar Tidak Boleh Kosong !'
                    ]
                ],
                'nama_pemilik' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Pemilik Tidak Boleh Kosong !'
                    ]
                ],
                'status_kendaraan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Kendaraan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'nomor_surat_pengeluaran' => $this->validation->getError('nomor_surat_pengeluaran'),
                        'nomor_rangka' => $this->validation->getError('nomor_rangka'),
                        'nomor_mesin' => $this->validation->getError('nomor_mesin'),
                        'alamat_pemilik_kendaraan' => $this->validation->getError('alamat_pemilik_kendaraan'),
                        'nama_pemilik' => $this->validation->getError('nama_pemilik'),
                        'tanggal_keluar' => $this->validation->getError('tanggal_keluar'),
                    ]
                ];
            } else {
                $id = $this->request->getVar('id');
                $data_penindakan_id = $this->request->getVar('data_penindakan_id');
                $nomor_surat_pengeluaran = $this->request->getVar('nomor_surat_pengeluaran');
                $nomor_rangka = $this->request->getVar('nomor_rangka');
                $nomor_mesin = $this->request->getVar('nomor_mesin');
                $alamat_pemilik_kendaraan = $this->request->getVar('alamat_pemilik_kendaraan');
                $nama_pemilik = $this->request->getVar('nama_pemilik');
                $tanggal_keluar = $this->request->getVar('tanggal_keluar');
                $status_kendaraan_id = $this->request->getVar('status_kendaraan_id');

                $this->pengeluaranKendaraanModel->update($id, [
                    'data_penindakan_id' => strtolower($data_penindakan_id),
                    'nomor_surat_pengeluaran' => strtolower($nomor_surat_pengeluaran),
                    'nomor_rangka' => strtolower($nomor_rangka),
                    'nomor_mesin' => strtolower($nomor_mesin),
                    'alamat_pemilik_kendaraan' => strtolower($alamat_pemilik_kendaraan),
                    'tanggal_keluar' => strtolower($tanggal_keluar),
                ]);

                $this->dataPenindakanModel->update($data_penindakan_id, [
                    'status_kendaraan_id' => $status_kendaraan_id,
                    'nama_pemilik' => $nama_pemilik
                ]);

                $alert = [
                    'success' => 'Surat Pengeluaran Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function upload_pengantar()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'pengantar_sidang' => [
                    'rules' => 'uploaded[pengantar_sidang]',
                    'errors' => [
                        'required' => 'Pengantar Sidang Tidak Boleh Kosong !'
                    ]
                ],
                'tanggal_pengantar' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal pengantar Tidak Boleh Kosong !'
                    ]
                ],



            ])) {
                $alert = [
                    'error' => [
                        'pengantar_sidang' => $this->validation->getError('pengantar_sidang'),
                        'tanggal_pengantar' => $this->validation->getError('tanggal_pengantar'),

                    ]
                ];
            } else {

                $pengeluaran_kendaraan_id = $this->request->getVar('pengeluaran_kendaraan_id');
                $tanggal_pengantar = $this->request->getVar('tanggal_pengantar');
                $pengantar_sidang = $this->request->getFile('pengantar_sidang');

                $nama_pengantar = $pengantar_sidang->getRandomName();

                $pengeluaran = $this->pengeluaranKendaraanModel->where(["id" => $pengeluaran_kendaraan_id])->get()->getRowObject();

                $this->pengantarSidangModel->save([
                    'pengeluaran_kendaraan_id' => $pengeluaran_kendaraan_id,
                    'tanggal_pengantar' => $tanggal_pengantar,
                    'pengantar_sidang' => $nama_pengantar
                ]);

                $this->dataPenindakanModel->update($pengeluaran->data_penindakan_id, [
                    'status_kendaraan_id' => 4
                ]);

                $pengantar_sidang->move('pengantar_sidang', $nama_pengantar);

                $alert = [
                    'success' => 'Data Kendaraan Berhasil di Kirim!'
                ];
            }

            return json_encode($alert);
        }
    }
}
