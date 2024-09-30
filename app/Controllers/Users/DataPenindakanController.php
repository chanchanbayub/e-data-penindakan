<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\Admin\DataPenindakanModel;
use CodeIgniter\HTTP\ResponseInterface;

class DataPenindakanController extends BaseController
{
    protected $validation;
    protected $dataPenindakanModel;

    public function __construct()
    {
        $this->dataPenindakanModel = new DataPenindakanModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'kode_wilayah_awal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
                'nomor_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
                'kode_wilayah_akhir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Kendaraan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'kode_wilayah_awal' => $this->validation->getError('kode_wilayah_awal'),
                        'nomor_kendaraan' => $this->validation->getError('nomor_kendaraan'),
                        'kode_wilayah_akhir' => $this->validation->getError('kode_wilayah_akhir'),

                    ]
                ];
            } else {

                $kode_wilayah_awal = $this->request->getVar('kode_wilayah_awal');
                $nomor_kendaraan = $this->request->getVar('nomor_kendaraan');
                $kode_wilayah_akhir = $this->request->getVar('kode_wilayah_akhir');

                $data_penindakan = $this->dataPenindakanModel->searchKendaraan($kode_wilayah_awal, $nomor_kendaraan, $kode_wilayah_akhir);
                $so = $this->dataPenindakanModel->getDataStopOperasi($kode_wilayah_awal, $nomor_kendaraan, $kode_wilayah_akhir);
                $bap = $this->dataPenindakanModel->getDataBapTilang($kode_wilayah_awal, $nomor_kendaraan, $kode_wilayah_akhir);

                $jumlahSO = count($so);
                $jumlahBAP = count($bap);



                $alert = [
                    'data_penindakan' => $data_penindakan,
                    'so' => $jumlahSO,
                    'bap' => $jumlahBAP
                ];
            }

            return json_encode($alert);
        }
    }

    public function detail_data()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $detail_data = $this->dataPenindakanModel->getDetails($id);

            return json_encode($detail_data);
        }
    }
}
