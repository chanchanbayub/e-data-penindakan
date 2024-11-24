<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\RoleManagementModel;
use CodeIgniter\HTTP\ResponseInterface;

class RoleManagementController extends BaseController
{
    protected $validation;
    protected $roleManagementModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->roleManagementModel = new RoleManagementModel();
    }

    public function index()
    {

        if (session()->get('role_management_id') != 2) {
            return redirect()->back();
        }

        if (session()->get('role_management_id') == 2) {
            $role_management = $this->roleManagementModel->getRoleManagement(null);
        } else {
            $role_management = $this->roleManagementModel->getRoleManagement(session()->get('ukpd_id'));
        }

        $data = [
            'title' => 'Role Management',
            'role_management' => $role_management
        ];

        return view('admin/role_management_v', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'role_management' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Role Management Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'role_management' => $this->validation->getError('role_management'),
                    ]
                ];
            } else {

                $jenisKendaraan = $this->request->getPost('role_management');
                $this->roleManagementModel->save([
                    'role_management' => strtolower($jenisKendaraan),

                ]);

                $alert = [
                    'success' => 'Role Management Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $role_management = $this->roleManagementModel->where(["id" => $id])->first();
            // dd($role_management);

            return json_encode($role_management);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $role_management = $this->roleManagementModel->where(["id" => $id])->first();

            $this->roleManagementModel->delete($role_management["id"]);

            $alert = [
                'success' => 'Role Management Berhasil di Hapus'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'role_management' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Role Management Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'role_management' => $this->validation->getError('role_management'),
                    ]
                ];
            } else {
                $id = $this->request->getPost('id');
                $role_management = $this->request->getPost('role_management');


                $this->roleManagementModel->update($id, [
                    'role_management' => strtolower($role_management),
                ]);

                $alert = [
                    'success' => 'Role Management Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
