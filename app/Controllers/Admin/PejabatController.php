<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PejabatModel;
use App\Models\Admin\UkpdModel;
use CodeIgniter\HTTP\ResponseInterface;

class PejabatController extends BaseController
{
    protected $validation;
    protected $ukpdModel;
    protected $pejabatModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->ukpdModel = new UkpdModel();
        $this->pejabatModel = new PejabatModel();
    }

    public function index()
    {
        if (session()->get('role_management_id') == 2) {
            $ukpd = $this->ukpdModel->getUkpd(null);
            $pejabat = $this->pejabatModel->getPejabatPenandaTangan(null);
        } else {
            $ukpd = $this->ukpdModel->getUkpd(session()->get('ukpd_id'));
            $pejabat = $this->pejabatModel->getPejabatPenandaTangan(session()->get('ukpd_id'));
        }
        $data = [
            'ukpd' => $ukpd,
            'pejabat' => $pejabat,
            'title' => 'Pejabat Penanda Tangan',
        ];

        return view('admin/pejabat_v', $data);
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
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Tidak Boleh Kosong !'
                    ]
                ],
                'nip' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'NIP Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'ukpd_id' => $this->validation->getError('ukpd_id'),
                        'nama' => $this->validation->getError('nama'),
                        'nip' => $this->validation->getError('nip')
                    ]
                ];
            } else {

                $ukpd_id = $this->request->getPost('ukpd_id');
                $nama = $this->request->getPost('nama');
                $nip = $this->request->getPost('nip');

                $this->pejabatModel->save([
                    'ukpd_id' => strtolower($ukpd_id),
                    'nama' => strtolower($nama),
                    'nip' => strtolower($nip)
                ]);

                $alert = [
                    'success' => 'Pejabat Penanda Tangan Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');


            if (session()->get('role_management_id') == 2) {
                $ukpd = $this->ukpdModel->getUkpd(null);
                $pejabat = $this->pejabatModel->getPejabatPenandaTangan(null);
            } else {
                $ukpd = $this->ukpdModel->getUkpd(session()->get('ukpd_id'));
                $pejabat = $this->pejabatModel->getPejabatPenandaTangan(session()->get('ukpd_id'));
            }
            $pejabat = $this->pejabatModel->where(["id" => $id])->first();


            $data = [
                'pejabat' => $pejabat,
                'ukpd' => $ukpd
            ];
            // dd($ukpd);

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $pejabat = $this->pejabatModel->where(["id" => $id])->first();

            $this->pejabatModel->delete($pejabat["id"]);

            $alert = [
                'success' => 'Pejabat Penanda Tangan Berhasil di Hapus'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'ukpd_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'UKPD Tidak Boleh Kosong !'
                    ]
                ],
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Tidak Boleh Kosong !'
                    ]
                ],
                'nip' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'NIP Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'ukpd_id' => $this->validation->getError('ukpd_id'),
                        'nama' => $this->validation->getError('nama'),
                        'nip' => $this->validation->getError('nip')
                    ]
                ];
            } else {
                $id = $this->request->getVar('id');
                $ukpd_id = $this->request->getPost('ukpd_id');
                $nama = $this->request->getPost('nama');
                $nip = $this->request->getPost('nip');

                $this->pejabatModel->update($id, [
                    'ukpd_id' => strtolower($ukpd_id),
                    'nama' => strtolower($nama),
                    'nip' => strtolower($nip)
                ]);

                $alert = [
                    'success' => 'Pejabat Penanda Tangan Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
