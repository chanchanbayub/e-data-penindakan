<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dinas Perhubungan Prov. DKI Jakarta'
        ];
        return view('landing_page/landing_page_v', $data);
    }
}
