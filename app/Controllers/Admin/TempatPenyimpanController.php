<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\TempatPenyimpanModel;
use CodeIgniter\HTTP\ResponseInterface;

class TempatPenyimpanController extends BaseController
{
    protected $validation;
    protected $tempatPenyimpananKendaraan;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->tempatPenyimpananKendaraan = new TempatPenyimpanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Tempat Penyimpanan Kendaraan',
            'tempat_penyimpanan' => $this->tempatPenyimpananKendaraan->getTempatPenyimpanan()
        ];

        return view('admin/tempat_penyimpanan_v', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'tempat_penyimpanan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tempat Penyimpanan Kendaraan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'tempat_penyimpanan' => $this->validation->getError('tempat_penyimpanan'),

                    ]
                ];
            } else {

                $tempat_penyimpanan = $this->request->getPost('tempat_penyimpanan');

                $this->tempatPenyimpananKendaraan->save([
                    'tempat_penyimpanan' => strtolower($tempat_penyimpanan),

                ]);

                $alert = [
                    'success' => 'Tempat Penyimpanan Kendaraan Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $tempat_penyimpanan = $this->tempatPenyimpananKendaraan->where(["id" => $id])->first();


            return json_encode($tempat_penyimpanan);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $tempat_penyimpanan = $this->tempatPenyimpananKendaraan->where(["id" => $id])->first();

            $this->tempatPenyimpananKendaraan->delete($tempat_penyimpanan["id"]);

            $alert = [
                'success' => 'Tempat Penyimpanan Kendaraan Berhasil di Hapus'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'tempat_penyimpanan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tempat Penyimpanan Kendaraan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'tempat_penyimpanan' => $this->validation->getError('tempat_penyimpanan'),
                    ]
                ];
            } else {
                $id = $this->request->getPost('id');
                $tempat_penyimpanan = $this->request->getPost('tempat_penyimpanan');


                $this->tempatPenyimpananKendaraan->update($id, [
                    'tempat_penyimpanan' => strtolower($tempat_penyimpanan),
                ]);

                $alert = [
                    'success' => 'Tempat Penyimpanan Kendaraan Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
