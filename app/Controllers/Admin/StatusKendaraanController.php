<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\StatusKendaraanModel;
use CodeIgniter\HTTP\ResponseInterface;

class StatusKendaraanController extends BaseController
{
    protected $validation;
    protected $statusKendaraanModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->statusKendaraanModel = new StatusKendaraanModel();
    }

    public function index()
    {
        if (session()->get('role_management_id') != 2) {
            return redirect()->back();
        }
        $data = [
            'title' => 'Status Kendaraan',
            'status_kendaraan' => $this->statusKendaraanModel->getStatusKendaraan()
        ];

        return view('admin/status_kendaraan_v', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'status_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Kendaraan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'status_kendaraan' => $this->validation->getError('status_kendaraan'),

                    ]
                ];
            } else {

                $status_kendaraan = $this->request->getPost('status_kendaraan');
                $this->statusKendaraanModel->save([
                    'status_kendaraan' => strtolower($status_kendaraan),

                ]);

                $alert = [
                    'success' => 'Status Kendaraan Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $jenisKendaraan = $this->statusKendaraanModel->where(["id" => $id])->first();
            // dd($jenisKendaraan);

            return json_encode($jenisKendaraan);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $jenisKendaraan = $this->statusKendaraanModel->where(["id" => $id])->first();

            $this->statusKendaraanModel->delete($jenisKendaraan["id"]);

            $alert = [
                'success' => 'Status Kendaraan Berhasil di Hapus'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'status_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Kendaraan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'status_kendaraan' => $this->validation->getError('status_kendaraan'),
                    ]
                ];
            } else {
                $id = $this->request->getPost('id');
                $jenisKendaraan = $this->request->getPost('status_kendaraan');


                $this->statusKendaraanModel->update($id, [
                    'status_kendaraan' => strtolower($jenisKendaraan),
                ]);

                $alert = [
                    'success' => 'Status Kendaraan Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
