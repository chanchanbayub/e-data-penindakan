<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\JenisKendaraanModel;
use App\Models\Admin\KodeTrayekModel;
use CodeIgniter\HTTP\ResponseInterface;

class KodeTrayekController extends BaseController
{
    protected $validation;
    protected $jenisKendaraanModel;
    protected $kodeTrayekModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->jenisKendaraanModel = new JenisKendaraanModel();
        $this->kodeTrayekModel = new KodeTrayekModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kode Trayek',
            'jenis_kendaraan' => $this->jenisKendaraanModel->getJenisKendaraan(),
            'kode_trayek' => $this->kodeTrayekModel->getKodeTrayek()
        ];

        return view('admin/kode_trayek_v', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'jenis_kendaraan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kode Trayek Tidak Boleh Kosong !'
                    ]
                ],
                'kode_trayek' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kode Trayek Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'jenis_kendaraan_id' => $this->validation->getError('jenis_kendaraan_id'),
                        'kode_trayek' => $this->validation->getError('kode_trayek'),

                    ]
                ];
            } else {

                $jenisKendaraan = $this->request->getPost('jenis_kendaraan_id');
                $kode_trayek = $this->request->getPost('kode_trayek');

                $this->kodeTrayekModel->save([
                    'jenis_kendaraan_id' => strtolower($jenisKendaraan),
                    'kode_trayek' => strtolower($kode_trayek),

                ]);

                $alert = [
                    'success' => 'Kode Trayek Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $kode_trayek = $this->kodeTrayekModel->where(["id" => $id])->first();
            $jenis_kendaraan = $this->jenisKendaraanModel->getJenisKendaraan();

            $data = [
                'kode_trayek' => $kode_trayek,
                'jenis_kendaraan' => $jenis_kendaraan
            ];
            // dd($jenisKendaraan);

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $kode_trayek = $this->kodeTrayekModel->where(["id" => $id])->get()->getRowObject();

            $this->kodeTrayekModel->delete($kode_trayek->id);

            $alert = [
                'success' => 'Kode Trayek Berhasil di Hapus'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
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

            ])) {
                $alert = [
                    'error' => [
                        'jenis_kendaraan_id' => $this->validation->getError('jenis_kendaraan_id'),
                        'kode_trayek' => $this->validation->getError('kode_trayek'),
                    ]
                ];
            } else {
                $id = $this->request->getPost('id');
                $jenis_kendaraan = $this->request->getPost('jenis_kendaraan_id');
                $kode_trayek = $this->request->getPost('kode_trayek');


                $this->kodeTrayekModel->update($id, [
                    'jenis_kendaraan_id' => strtolower($jenis_kendaraan),
                    'kode_trayek' => strtolower($kode_trayek),
                ]);

                $alert = [
                    'success' => 'Kode Trayek Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
