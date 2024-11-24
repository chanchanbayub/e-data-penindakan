<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\LokasiSidangModel;
use CodeIgniter\HTTP\ResponseInterface;

class LokasiSidangController extends BaseController
{
    protected $validation;
    protected $lokasiSidangModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->lokasiSidangModel = new LokasiSidangModel();
    }

    public function index()
    {
        if (session()->get('role_management_id') != 2) {
            return redirect()->back();
        }
        $data = [
            'title' => 'Lokasi Sidang',
            'lokasi_sidang' => $this->lokasiSidangModel->getLokasiSidang()
        ];

        return view('admin/lokasi_sidang_v', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'lokasi_sidang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Lokasi Sidang Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'lokasi_sidang' => $this->validation->getError('lokasi_sidang'),

                    ]
                ];
            } else {

                $lokasi_sidang = $this->request->getPost('lokasi_sidang');
                $this->lokasiSidangModel->save([
                    'lokasi_sidang' => strtolower($lokasi_sidang),

                ]);

                $alert = [
                    'success' => 'Lokasi Sidang Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $lokasi_sidang = $this->lokasiSidangModel->where(["id" => $id])->first();
            // dd($lokasi_sidang);

            return json_encode($lokasi_sidang);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $lokasi_sidang = $this->lokasiSidangModel->where(["id" => $id])->first();

            $this->lokasiSidangModel->delete($lokasi_sidang["id"]);

            $alert = [
                'success' => 'Lokasi Sidang Berhasil di Hapus'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'lokasi_sidang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Lokasi Sidang Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'lokasi_sidang' => $this->validation->getError('lokasi_sidang'),
                    ]
                ];
            } else {
                $id = $this->request->getPost('id');
                $lokasi_sidang = $this->request->getPost('lokasi_sidang');


                $this->lokasiSidangModel->update($id, [
                    'lokasi_sidang' => strtolower($lokasi_sidang),
                ]);

                $alert = [
                    'success' => 'Lokasi Sidang Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
