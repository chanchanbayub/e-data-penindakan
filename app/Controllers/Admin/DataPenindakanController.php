<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\DataPenindakanModel;
use App\Models\Admin\JenisKendaraanModel;
use App\Models\Admin\JenisPenindakanModel;
use App\Models\Admin\KodeTrayekModel;
use App\Models\Admin\LokasiSidangModel;
use App\Models\Admin\StatusKendaraanModel;
use App\Models\Admin\TempatPenyimpanModel;
use App\Models\Admin\TypeKendaraanModel;
use App\Models\Admin\UkpdModel;
use CodeIgniter\HTTP\ResponseInterface;

class DataPenindakanController extends BaseController
{
    protected $validation;
    protected $dataPenindakanModel;
    protected $ukpdModel;
    protected $jenisKendaraanModel;
    protected $jenisPenindakanModel;
    protected $tempatPenyimpananModel;
    protected $kodeTrayekModel;
    protected $lokasiSidangModel;
    protected $typeKendaraanModel;
    protected $statusKendaraanModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->dataPenindakanModel = new DataPenindakanModel();
        $this->ukpdModel = new UkpdModel();
        $this->jenisKendaraanModel = new JenisKendaraanModel();
        $this->jenisPenindakanModel = new JenisPenindakanModel();
        $this->tempatPenyimpananModel = new TempatPenyimpanModel();
        $this->kodeTrayekModel = new KodeTrayekModel();
        $this->typeKendaraanModel = new TypeKendaraanModel();
        $this->lokasiSidangModel = new LokasiSidangModel();
        $this->statusKendaraanModel = new StatusKendaraanModel();
    }

    public function index()
    {

        if (session()->get('role_management_id') == 2) {
            $data_penindakan = $this->dataPenindakanModel->getDataPenindakan(null);
            $ukpd = $this->ukpdModel->getUkpd(null);
            $jenisKendaraan = $this->jenisKendaraanModel->getJenisKendaraan();
            $jenisPenindakan = $this->jenisPenindakanModel->getJenisPenindakan();
            $tempatPenyimpanan = $this->tempatPenyimpananModel->getTempatPenyimpanan();
            $lokasiSidang = $this->lokasiSidangModel->getLokasiSidang();
            $statusKendaraan = $this->statusKendaraanModel->getStatusKendaraan();
        } else {
            $data_penindakan = $this->dataPenindakanModel->getDataPenindakan(session()->get('ukpd_id'));
            $ukpd = $this->ukpdModel->getUkpd(session()->get('ukpd_id'));
            $jenisKendaraan = $this->jenisKendaraanModel->getJenisKendaraan();
            $jenisPenindakan = $this->jenisPenindakanModel->getJenisPenindakan();
            $tempatPenyimpanan = $this->tempatPenyimpananModel->getTempatPenyimpanan();
            $lokasiSidang = $this->lokasiSidangModel->getLokasiSidang();
            $statusKendaraan = $this->statusKendaraanModel->getStatusKendaraan();
        }

        $data = [
            'title' => 'Data Penindakan',
            'data_penindakan' => $data_penindakan,
            'ukpd' => $ukpd,
            'jenis_kendaraan' => $jenisKendaraan,
            'jenis_penindakan' => $jenisPenindakan,
            'tempat_penyimpanan' => $tempatPenyimpanan,
            'lokasi_sidang' => $lokasiSidang,
            'status_kendaraan' => $statusKendaraan
        ];

        return view('admin/data_penindakan_v', $data);
    }

    public function views($nomor_bap)
    {
        $data_penindakan = $this->dataPenindakanModel->getDataPenindakanWithNomorBap($nomor_bap);

        if ($data_penindakan == null) {
            return redirect()->back();
        }

        $jumlah_penindakan = $this->dataPenindakanModel->searchKendaraan($data_penindakan->kode_wilayah_awal, $data_penindakan->nomor_kendaraan, $data_penindakan->kode_wilayah_akhir);

        // dd($jumlah_penindakan);
        // dd($data_penindakan);

        $total = count($jumlah_penindakan);

        $data = [
            'title' => 'Data Penindakan',
            'data_penindakan' => $data_penindakan,
            'jumlah_penindakan' => $total
        ];

        return view('admin/detail_data_penindakan_v', $data);
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $data_penindakan = $this->dataPenindakanModel->where(["id" => $id])->get()->getRowObject();

            $data = [
                'data_penindakan' => $data_penindakan
            ];

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $data_penindakan = $this->dataPenindakanModel->where(["id" => $id])->get()->getRowObject();

            $this->dataPenindakanModel->delete($data_penindakan->id);

            $alert = [
                'success' => 'Data Penindakan Berhasil di Hapus'
            ];

            return json_encode($alert);
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

                    ]
                ];
            } else {
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

                $statusKendaraan = 1;

                $this->dataPenindakanModel->save([
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
                    'status_kendaraan_id' => $statusKendaraan,
                ]);

                $alert = [
                    'success' => 'Data Penindakan Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function getTypeKendaraan()
    {
        if ($this->request->isAJAX()) {

            $jenis_kendaraan_id = $this->request->getVar('jenis_kendaraan_id');

            // dd($jenis_kendaraan_id);

            $type_kendaraan = $this->typeKendaraanModel->where(["jenis_kendaraan_id" => $jenis_kendaraan_id])->get()->getResultObject();
            $kode_trayek = $this->kodeTrayekModel->where(["jenis_kendaraan_id" => $jenis_kendaraan_id])->get()->getResultObject();

            $data = [
                'type_kendaraan' => $type_kendaraan,
                'kode_trayek' => $kode_trayek
            ];

            return json_encode($data);
        }
    }

    public function getDataKendaraan()
    {
        if ($this->request->isAJAX()) {

            $kode_wilayah_awal = $this->request->getVar('kode_wilayah_awal');
            $nomor_kendaraan = $this->request->getVar('nomor_kendaraan');
            $kode_wilayah_akhir = $this->request->getVar('kode_wilayah_akhir');

            $data_penindakan = $this->dataPenindakanModel->searchDataKendaraan($kode_wilayah_awal, $nomor_kendaraan, $kode_wilayah_akhir);

            $data = [
                'data_penindakan' => $data_penindakan
            ];

            return json_encode($data);
        }
    }
}
