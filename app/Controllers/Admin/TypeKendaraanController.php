<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\JenisKendaraanModel;
use App\Models\Admin\TypeKendaraanModel;
use CodeIgniter\HTTP\ResponseInterface;

class TypeKendaraanController extends BaseController
{
    protected $validation;
    protected $jenisKendaraanModel;
    protected $typeKendaraanModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->jenisKendaraanModel = new JenisKendaraanModel();
        $this->typeKendaraanModel = new TypeKendaraanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Type Kendaraan',
            'jenis_kendaraan' => $this->jenisKendaraanModel->getJenisKendaraan(),
            'type_kendaraan' => $this->typeKendaraanModel->getTypeKendaraan()
        ];

        return view('admin/type_kendaraan_v', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'jenis_kendaraan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Type Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
                'type_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Type Kendaraan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'jenis_kendaraan_id' => $this->validation->getError('jenis_kendaraan_id'),
                        'type_kendaraan' => $this->validation->getError('type_kendaraan'),

                    ]
                ];
            } else {

                $jenisKendaraan = $this->request->getPost('jenis_kendaraan_id');
                $type_kendaraan = $this->request->getPost('type_kendaraan');

                $this->typeKendaraanModel->save([
                    'jenis_kendaraan_id' => strtolower($jenisKendaraan),
                    'type_kendaraan' => strtolower($type_kendaraan),

                ]);

                $alert = [
                    'success' => 'Type Kendaraan Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $type_kendaraan = $this->typeKendaraanModel->where(["id" => $id])->first();
            $jenis_kendaraan = $this->jenisKendaraanModel->getJenisKendaraan();

            $data = [
                'type_kendaraan' => $type_kendaraan,
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

            $type_kendaraan = $this->typeKendaraanModel->where(["id" => $id])->get()->getRowObject();

            $this->typeKendaraanModel->delete($type_kendaraan->id);

            $alert = [
                'success' => 'Type Kendaraan Berhasil di Hapus'
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
                'type_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Type Kendaraan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'jenis_kendaraan_id' => $this->validation->getError('jenis_kendaraan_id'),
                        'type_kendaraan' => $this->validation->getError('type_kendaraan'),
                    ]
                ];
            } else {
                $id = $this->request->getPost('id');
                $jenis_kendaraan = $this->request->getPost('jenis_kendaraan_id');
                $type_kendaraan = $this->request->getPost('type_kendaraan');


                $this->typeKendaraanModel->update($id, [
                    'jenis_kendaraan_id' => strtolower($jenis_kendaraan),
                    'type_kendaraan' => strtolower($type_kendaraan),
                ]);

                $alert = [
                    'success' => 'Type Kendaraan Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
