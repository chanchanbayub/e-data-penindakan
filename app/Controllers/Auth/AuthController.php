<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Admin\UsersManagementModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    protected $userManagementModel;
    protected $validation;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->userManagementModel = new UsersManagementModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login Page',

        ];
        return view('auth/login_v', $data);
    }

    public function cek_login()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Email Tidak Boleh Kosong!',
                        'valid_email' => 'Email Tidak Valid!'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'email' => $this->validation->getError('email'),
                        'password' => $this->validation->getError('password'),
                    ]
                ];
            } else {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $user_mangement = $this->userManagementModel->getUserManagementData($email, $password);


                if ($user_mangement == null) {
                    $alert = [
                        'errors' => 'Username / Password Tidak ditemukan!'
                    ];
                } else {
                    if ($user_mangement->role_management_id == 1) {
                        $data = [
                            'id' => $user_mangement->id,
                            'ukpd' => $user_mangement->ukpd,
                            'ukpd_id' => $user_mangement->ukpd_id,
                            'nama' => $user_mangement->nama,
                            'email' => $user_mangement->email,
                            'role_management' => $user_mangement->role_management,
                            'role_management_id' => $user_mangement->role_management_id,
                            'isLogedIn' => true
                        ];
                        session()->set($data);
                        $alert = [
                            'success' => 'Berhasil Login !',
                            'url' => '/petugas/dashboard'
                        ];
                    } else if ($user_mangement->role_management_id == 2) {
                        $data = [
                            'id' => $user_mangement->id,
                            'ukpd_id' => $user_mangement->ukpd_id,
                            'nama' => $user_mangement->nama,
                            'email' => $user_mangement->email,
                            'role_management' => $user_mangement->role_management,
                            'role_management_id' => $user_mangement->role_management_id,
                            'isLogedIn' => true
                        ];
                        session()->set($data);
                        $alert = [
                            'success' => 'Berhasil Login !',
                            'url' => '/admin/dashboard'
                        ];
                    }
                }
            };
            return json_encode($alert);
        }
    }

    public function logout()
    {

        session()->destroy();

        return redirect()->to('/auth/login');
    }
}
