<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\RoleManagementModel;
use App\Models\Admin\UkpdModel;
use App\Models\Admin\UsersManagementModel;
use CodeIgniter\HTTP\ResponseInterface;
use Hermawan\DataTables\DataTable;

class UsersManagementController extends BaseController
{
    protected $validation;
    protected $ukpdModel;
    protected $roleManagementModel;
    protected $usersManagementModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->roleManagementModel = new RoleManagementModel();
        $this->ukpdModel = new UkpdModel();
        $this->usersManagementModel = new UsersManagementModel();
    }

    public function index()
    {
        if (session()->get('role_management_id') == 2) {
            $ukpd = $this->ukpdModel->getUkpd(null);
            $users_management = $this->usersManagementModel->getUsersManagement(null);
            $role_management = $this->roleManagementModel->getRoleManagement(null);
        } else {
            $ukpd = $this->ukpdModel->getUkpd(session()->get('ukpd_id'));
            $users_management = $this->usersManagementModel->getUsersManagement(session()->get('ukpd_id'));
            $role_management = $this->roleManagementModel->getRoleManagement(session()->get('ukpd_id'));
        }

        $data = [
            'ukpd' => $ukpd,
            'users_management' => $users_management,
            'role_management' => $role_management,
            'title' => 'Users Management',
        ];

        return view('admin/users_management_v', $data);
    }

    public function getDataUsersManagement()
    {
        if ($this->request->isAjax()) {
            $users_management = $this->usersManagementModel->getUsersManagamentDataTable();

            return DataTable::of($users_management)
                ->add('action', function ($row) {
                    return '<button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' . $row->id . '"type="button">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                            <button class="btn btn-sm btn-outline-danger" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' . $row->id . '" type="button">
                                                        <i class="bi bi-trash"></i>
                                                    </button>';
                })
                ->setSearchableColumns(['ukpd', 'nama', 'email', 'role_management'])

                ->addNumbering('no')->toJson(true);
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
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Tidak Boleh Kosong !'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Email Tidak Boleh Kosong !',
                        'valid_email' => 'Email Tidak Valid !'
                    ]
                ],
                'nip' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'NIP Tidak Boleh Kosong !'
                    ]
                ],
                'role_management_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Role Management Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'ukpd_id' => $this->validation->getError('ukpd_id'),
                        'nama' => $this->validation->getError('nama'),
                        'nip' => $this->validation->getError('nip'),
                        'email' => $this->validation->getError('email'),
                        'role_management_id' => $this->validation->getError('role_management_id')
                    ]
                ];
            } else {

                $ukpd_id = $this->request->getPost('ukpd_id');
                $nama = $this->request->getPost('nama');
                $email = $this->request->getPost('email');
                $nip = $this->request->getPost('nip');
                $role_management_id = $this->request->getPost('role_management_id');

                $this->usersManagementModel->save([
                    'ukpd_id' => strtolower($ukpd_id),
                    'nama' => strtolower($nama),
                    'email' => strtolower($email),
                    'nip' => strtolower($nip),
                    'role_management_id' => strtolower($role_management_id)
                ]);

                $alert = [
                    'success' => 'Users Management Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $users_management = $this->usersManagementModel->where(["id" => $id])->first();

            if (session()->get('role_management_id') == 2) {
                $ukpd = $this->ukpdModel->getUkpd(null);
                $role_management = $this->roleManagementModel->getRoleManagement(null);
            } else {
                $ukpd = $this->ukpdModel->getUkpd(session()->get('ukpd_id'));
                $role_management = $this->roleManagementModel->getRoleManagement(session()->get('ukpd_id'));
            }
            $data = [
                'users_management' => $users_management,
                'nip' => $users_management["nip"],
                'ukpd' => $ukpd,
                'role_management' => $role_management
            ];
            // dd($ukpd);

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $users_management = $this->usersManagementModel->where(["id" => $id])->first();

            $this->usersManagementModel->delete($users_management["id"]);

            $alert = [
                'success' => 'Users Management Berhasil di Hapus'
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
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Email Tidak Boleh Kosong !',
                        'valid_email' => 'Email Tidak Valid !'
                    ]
                ],
                'nip' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'NIP Tidak Boleh Kosong !'
                    ]
                ],
                'role_management_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Role Management Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'ukpd_id' => $this->validation->getError('ukpd_id'),
                        'nama' => $this->validation->getError('nama'),
                        'email' => $this->validation->getError('email'),
                        'nip' => $this->validation->getError('nip'),
                        'role_management_id' => $this->validation->getError('role_management_id')
                    ]
                ];
            } else {
                $id = $this->request->getVar('id');
                $ukpd_id = $this->request->getPost('ukpd_id');
                $nama = $this->request->getPost('nama');
                $email = $this->request->getPost('email');
                $nip = $this->request->getPost('nip');
                $role_management_id = $this->request->getPost('role_management_id');

                $this->usersManagementModel->update($id, [
                    'ukpd_id' => strtolower($ukpd_id),
                    'nama' => strtolower($nama),
                    'email' => strtolower($email),
                    'nip' => strtolower($nip),
                    'role_management_id' => strtolower($role_management_id)
                ]);

                $alert = [
                    'success' => 'Users Management Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
