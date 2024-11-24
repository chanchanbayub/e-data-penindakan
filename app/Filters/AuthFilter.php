<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLogedIn')) {
            return redirect()->to(site_url('auth/login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->get('role_management_id') == 1) {
            return redirect()->to(site_url('petugas/dashboard'));
        } else if (session()->get('role_management_id') == 2) {
            return redirect()->to(site_url('admin/dashboard'));
        } else if (session()->get('role_management_id') == 3) {
            return redirect()->to(site_url('operator/dashboard'));
        } else if (session()->get('role_management_id') == 4) {
            return redirect()->to(site_url('verifikator/dashboard'));
        } else if (session()->get('role_management_id') == 5) {
            return redirect()->to(site_url('editor/dashboard'));
        }
    }
}
