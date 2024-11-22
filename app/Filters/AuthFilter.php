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
        } elseif (session()->get('isLogedIn')) {
            if (session()->get('role_management_id') == 5) {
                return redirect()->to('editor/dashboard');
            } else if (session()->get('role_management_id') == 4) {
                return redirect()->to('verifikator/dashboard');
            } else if (session()->get('role_management_id') == 3) {
                return redirect()->to('operator/dashboard');
            } else if (session()->get('role_management_id') == 2) {
                return redirect()->to('operator/dashboard');
            } else if (session()->get('role_management_id') == 2) {
                return redirect()->to('admin/dashboard');
            } else if (session()->get('role_management_id') == 1) {
                return redirect()->to('admin/dashboard');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->get('isLogedIn')) {
            return redirect()->back();
        }
    }
}
