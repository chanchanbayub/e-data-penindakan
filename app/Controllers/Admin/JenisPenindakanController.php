<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\JenisPenindakanModel;
use CodeIgniter\HTTP\ResponseInterface;

class JenisPenindakanController extends BaseController
{
    protected $validation;
    protected $jenisPenindakanModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->jenisPenindakanModel = new JenisPenindakanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Jenis Penindakan',
            'jenis_penindakan' => $this->jenisPenindakanModel->getJenisPenindakan()
        ];

        return view('admin/jenis_penindakan_v', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'jenis_penindakan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Penindakan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'jenis_penindakan' => $this->validation->getError('jenis_penindakan'),

                    ]
                ];
            } else {

                $jenisKendaraan = $this->request->getPost('jenis_penindakan');
                $this->jenisPenindakanModel->save([
                    'jenis_penindakan' => strtolower($jenisKendaraan),

                ]);

                $alert = [
                    'success' => 'Jenis Penindakan Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $jenisKendaraan = $this->jenisPenindakanModel->where(["id" => $id])->first();
            // dd($jenisKendaraan);

            return json_encode($jenisKendaraan);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $jenisKendaraan = $this->jenisPenindakanModel->where(["id" => $id])->first();

            $this->jenisPenindakanModel->delete($jenisKendaraan["id"]);

            $alert = [
                'success' => 'Jenis Penindakan Berhasil di Hapus'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'jenis_penindakan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Penindakan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'jenis_penindakan' => $this->validation->getError('jenis_penindakan'),
                    ]
                ];
            } else {
                $id = $this->request->getPost('id');
                $jenisKendaraan = $this->request->getPost('jenis_penindakan');


                $this->jenisPenindakanModel->update($id, [
                    'jenis_penindakan' => strtolower($jenisKendaraan),
                ]);

                $alert = [
                    'success' => 'Jenis Penindakan Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
