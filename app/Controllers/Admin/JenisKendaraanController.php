<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\JenisKendaraanModel;
use CodeIgniter\HTTP\ResponseInterface;

class JenisKendaraanController extends BaseController
{
    protected $validation;
    protected $jenisKendaraanModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->jenisKendaraanModel = new JenisKendaraanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Jenis Kendaraan',
            'jenis_kendaraan' => $this->jenisKendaraanModel->getJenisKendaraan()
        ];

        return view('admin/jenis_kendaraan_v', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'jenis_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kendaraan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'jenis_kendaraan' => $this->validation->getError('jenis_kendaraan'),

                    ]
                ];
            } else {

                $jenisKendaraan = $this->request->getPost('jenis_kendaraan');
                $this->jenisKendaraanModel->save([
                    'jenis_kendaraan' => strtolower($jenisKendaraan),

                ]);

                $alert = [
                    'success' => 'Jenis Kendaraan Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $jenisKendaraan = $this->jenisKendaraanModel->where(["id" => $id])->first();
            // dd($jenisKendaraan);

            return json_encode($jenisKendaraan);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $jenisKendaraan = $this->jenisKendaraanModel->where(["id" => $id])->first();

            $this->jenisKendaraanModel->delete($jenisKendaraan["id"]);

            $alert = [
                'success' => 'Jenis Kendaraan Berhasil di Hapus'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'jenis_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kendaraan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'jenis_kendaraan' => $this->validation->getError('jenis_kendaraan'),
                    ]
                ];
            } else {
                $id = $this->request->getPost('id');
                $jenisKendaraan = $this->request->getPost('jenis_kendaraan');


                $this->jenisKendaraanModel->update($id, [
                    'jenis_kendaraan' => strtolower($jenisKendaraan),
                ]);

                $alert = [
                    'success' => 'Jenis Kendaraan Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
