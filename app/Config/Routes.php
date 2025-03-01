<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->get('/', 'Home::index');
$routes->get('/cari_kendaraan', 'Home::cari_kendaraan');
$routes->get('/progress', 'Home::progress_pengeluaran');

$routes->group('/admin', function ($routes) {
    $routes->get('dashboard', 'Admin\DashboardController::index');
    // $routes->get('dashboard/filter', 'Admin\Dashboard::filterPenderekan');

    // UKPD
    $routes->get('ukpd', 'Admin\UkpdController::index');
    $routes->post('ukpd/insert', 'Admin\UkpdController::insert');
    $routes->get('ukpd/edit', 'Admin\UkpdController::edit');
    $routes->post('ukpd/delete', 'Admin\UkpdController::delete');
    $routes->post('ukpd/update', 'Admin\UkpdController::update');

    // Role Management
    $routes->get('role_management', 'Admin\RoleManagementController::index');
    $routes->post('role_management/insert', 'Admin\RoleManagementController::insert');
    $routes->get('role_management/edit', 'Admin\RoleManagementController::edit');
    $routes->post('role_management/delete', 'Admin\RoleManagementController::delete');
    $routes->post('role_management/update', 'Admin\RoleManagementController::update');

    // Users Management
    $routes->get('users_management', 'Admin\UsersManagementController::index');
    $routes->post('users_management/insert', 'Admin\UsersManagementController::insert');
    $routes->get('users_management/edit', 'Admin\UsersManagementController::edit');
    $routes->post('users_management/delete', 'Admin\UsersManagementController::delete');
    $routes->post('users_management/update', 'Admin\UsersManagementController::update');
    $routes->post('getDataUsersManagement', 'Admin\UsersManagementController::getDataUsersManagement');

    // Jenis Kendaraan
    $routes->get('jenis_kendaraan', 'Admin\JenisKendaraanController::index');
    $routes->post('jenis_kendaraan/insert', 'Admin\JenisKendaraanController::insert');
    $routes->get('jenis_kendaraan/edit', 'Admin\JenisKendaraanController::edit');
    $routes->post('jenis_kendaraan/delete', 'Admin\JenisKendaraanController::delete');
    $routes->post('jenis_kendaraan/update', 'Admin\JenisKendaraanController::update');

    // StatusKendaraan
    $routes->get('status_kendaraan', 'Admin\StatusKendaraanController::index');
    $routes->post('status_kendaraan/insert', 'Admin\StatusKendaraanController::insert');
    $routes->get('status_kendaraan/edit', 'Admin\StatusKendaraanController::edit');
    $routes->post('status_kendaraan/delete', 'Admin\StatusKendaraanController::delete');
    $routes->post('status_kendaraan/update', 'Admin\StatusKendaraanController::update');

    // Lokasi Sidang
    $routes->get('lokasi_sidang', 'Admin\LokasiSidangController::index');
    $routes->post('lokasi_sidang/insert', 'Admin\LokasiSidangController::insert');
    $routes->get('lokasi_sidang/edit', 'Admin\LokasiSidangController::edit');
    $routes->post('lokasi_sidang/delete', 'Admin\LokasiSidangController::delete');
    $routes->post('lokasi_sidang/update', 'Admin\LokasiSidangController::update');

    // Type Kendaraan
    $routes->get('type_kendaraan', 'Admin\TypeKendaraanController::index');
    $routes->post('type_kendaraan/insert', 'Admin\TypeKendaraanController::insert');
    $routes->get('type_kendaraan/edit', 'Admin\TypeKendaraanController::edit');
    $routes->post('type_kendaraan/delete', 'Admin\TypeKendaraanController::delete');
    $routes->post('type_kendaraan/update', 'Admin\TypeKendaraanController::update');

    // Type Kendaraan
    $routes->get('pejabat_penanda_tangan', 'Admin\PejabatController::index');
    $routes->post('pejabat_penanda_tangan/insert', 'Admin\PejabatController::insert');
    $routes->get('pejabat_penanda_tangan/edit', 'Admin\PejabatController::edit');
    $routes->post('pejabat_penanda_tangan/delete', 'Admin\PejabatController::delete');
    $routes->post('pejabat_penanda_tangan/update', 'Admin\PejabatController::update');

    // Kode Trayek
    $routes->get('kode_trayek', 'Admin\KodeTrayekController::index');
    $routes->post('kode_trayek/insert', 'Admin\KodeTrayekController::insert');
    $routes->get('kode_trayek/edit', 'Admin\KodeTrayekController::edit');
    $routes->post('kode_trayek/delete', 'Admin\KodeTrayekController::delete');
    $routes->post('kode_trayek/update', 'Admin\KodeTrayekController::update');

    // Jenis Penindakan
    $routes->get('jenis_penindakan', 'Admin\JenisPenindakanController::index');
    $routes->post('jenis_penindakan/insert', 'Admin\JenisPenindakanController::insert');
    $routes->get('jenis_penindakan/edit', 'Admin\JenisPenindakanController::edit');
    $routes->post('jenis_penindakan/delete', 'Admin\JenisPenindakanController::delete');
    $routes->post('jenis_penindakan/update', 'Admin\JenisPenindakanController::update');

    // Tempat Penyimpanan
    $routes->get('tempat_penyimpanan', 'Admin\TempatPenyimpanController::index');
    $routes->post('tempat_penyimpanan/insert', 'Admin\TempatPenyimpanController::insert');
    $routes->get('tempat_penyimpanan/edit', 'Admin\TempatPenyimpanController::edit');
    $routes->post('tempat_penyimpanan/delete', 'Admin\TempatPenyimpanController::delete');
    $routes->post('tempat_penyimpanan/update', 'Admin\TempatPenyimpanController::update');

    // Data Penindakan
    $routes->get('data_penindakan', 'Admin\DataPenindakanController::index');
    $routes->get('data_penindakan/views/(:any)', 'Admin\DataPenindakanController::views/$1');
    $routes->get('data_penindakan/getTypeKendaraan', 'Admin\DataPenindakanController::getTypeKendaraan');
    $routes->get('data_penindakan/getDataKendaraan', 'Admin\DataPenindakanController::getDataKendaraan');
    $routes->post('data_penindakan/insert', 'Admin\DataPenindakanController::insert');
    $routes->get('data_penindakan/edit', 'Admin\DataPenindakanController::edit');
    $routes->post('data_penindakan/delete', 'Admin\DataPenindakanController::delete');
    $routes->post('data_penindakan/update', 'Admin\DataPenindakanController::update');
    $routes->post('getDataPenindakan', 'Admin\DataPenindakanController::getDataPenindakan');

    // Pengeluaran Kendaraan
    $routes->get('pengeluaran_kendaraan', 'Admin\PengeluaranKendaraanController::index');
    $routes->get('pengeluaran_kendaraan/search', 'Admin\PengeluaranKendaraanController::search');
    $routes->get('pengeluaran_kendaraan/form_insert/(:any)', 'Admin\PengeluaranKendaraanController::form_insert/$1');
    $routes->get('pengeluaran_kendaraan/views/(:any)', 'Admin\PengeluaranKendaraanController::views/$1');
    $routes->get('pengeluaran_kendaraan/getTypeKendaraan', 'Admin\PengeluaranKendaraanController::getTypeKendaraan');
    $routes->post('pengeluaran_kendaraan/insert', 'Admin\PengeluaranKendaraanController::insert');
    $routes->get('pengeluaran_kendaraan/edit', 'Admin\PengeluaranKendaraanController::edit');
    $routes->post('pengeluaran_kendaraan/delete', 'Admin\PengeluaranKendaraanController::delete');
    $routes->post('pengeluaran_kendaraan/update', 'Admin\PengeluaranKendaraanController::update');
    $routes->post('pengeluaran_kendaraan/upload_pengantar', 'Admin\PengeluaranKendaraanController::upload_pengantar');

    $routes->get('cetak_pdf/(:any)', 'Pdf\PdfController::index/$1');

    $routes->post('cetak_laporan/', 'Pdf\PdfController::cetak_laporan');
    // $routes->get('pengantar_sidang/(:any)', 'Pdf\PdfController::index/$1');
    $routes->get('cetak_pengantar/(:any)', 'Pdf\PdfController::cetak_pengantar/$1');
});

$routes->group('/petugas', function ($routes) {
    $routes->get('dashboard', 'Petugas\DashboardController::index');
    $routes->post('getDataPenindakan', 'Petugas\DataPenindakanController::getDataPenindakan');
    // Data Penindakan
    $routes->get('data_penindakan', 'Petugas\DataPenindakanController::index');
    $routes->get('data_penindakan/views/(:any)', 'Petugas\DataPenindakanController::views/$1');
    $routes->get('data_penindakan/getTypeKendaraan', 'Petugas\DataPenindakanController::getTypeKendaraan');
    $routes->get('data_penindakan/getDataKendaraan', 'Petugas\DataPenindakanController::getDataKendaraan');
    $routes->post('data_penindakan/insert', 'Petugas\DataPenindakanController::insert');
    $routes->get('data_penindakan/edit', 'Petugas\DataPenindakanController::edit');
    $routes->post('data_penindakan/delete', 'Petugas\DataPenindakanController::delete');
    $routes->post('data_penindakan/update', 'Petugas\DataPenindakanController::update');
    // Pengeluaran Kendaraan
    $routes->get('pengeluaran_kendaraan', 'Petugas\PengeluaranKendaraanController::index');
    $routes->get('pengeluaran_kendaraan/search', 'Petugas\PengeluaranKendaraanController::search');
    $routes->get('pengeluaran_kendaraan/form_insert/(:any)', 'Petugas\PengeluaranKendaraanController::form_insert/$1');
    $routes->get('pengeluaran_kendaraan/views/(:any)', 'Petugas\PengeluaranKendaraanController::views/$1');
    $routes->get('pengeluaran_kendaraan/getTypeKendaraan', 'Petugas\PengeluaranKendaraanController::getTypeKendaraan');
    $routes->post('pengeluaran_kendaraan/insert', 'Petugas\PengeluaranKendaraanController::insert');
    $routes->get('pengeluaran_kendaraan/edit', 'Petugas\PengeluaranKendaraanController::edit');
    $routes->post('pengeluaran_kendaraan/update', 'Petugas\PengeluaranKendaraanController::update');
    $routes->post('pengeluaran_kendaraan/upload_pengantar', 'Petugas\PengeluaranKendaraanController::upload_pengantar');

    $routes->get('cetak_pdf/(:any)', 'Pdf\PdfController::index/$1');
    $routes->get('cetak_pengantar/(:any)', 'Pdf\PdfController::cetak_pengantar/$1');
    $routes->post('cetak_laporan/', 'Pdf\PdfController::cetak_laporan');

    $routes->get('export_excel/', 'Excel\ExcelController::cetak_laporan');
});

$routes->group('/operator', function ($routes) {
    $routes->get('dashboard', 'Operator\DashboardController::index');
    // Data Penindakan
    $routes->get('data_penindakan', 'Operator\DataPenindakanController::index');
    $routes->post('getDataPenindakan', 'Operator\DataPenindakanController::getDataPenindakan');


    $routes->get('data_penindakan/views/(:any)', 'Operator\DataPenindakanController::views/$1');
    $routes->get('data_penindakan/getTypeKendaraan', 'Operator\DataPenindakanController::getTypeKendaraan');
    $routes->get('data_penindakan/getDataKendaraan', 'Operator\DataPenindakanController::getDataKendaraan');
    $routes->post('data_penindakan/insert', 'Operator\DataPenindakanController::insert');
    $routes->get('data_penindakan/edit', 'Operator\DataPenindakanController::edit');
    $routes->post('data_penindakan/delete', 'Operator\DataPenindakanController::delete');
    $routes->post('data_penindakan/update', 'Operator\DataPenindakanController::update');
    // Pengeluaran Kendaraan
    $routes->get('pengeluaran_kendaraan', 'Operator\PengeluaranKendaraanController::index');
    $routes->get('pengeluaran_kendaraan/search', 'Operator\PengeluaranKendaraanController::search');
    $routes->get('pengeluaran_kendaraan/form_insert/(:any)', 'Operator\PengeluaranKendaraanController::form_insert/$1');
    $routes->get('pengeluaran_kendaraan/views/(:any)', 'Operator\PengeluaranKendaraanController::views/$1');
    $routes->get('pengeluaran_kendaraan/getTypeKendaraan', 'Operator\PengeluaranKendaraanController::getTypeKendaraan');
    $routes->post('pengeluaran_kendaraan/insert', 'Operator\PengeluaranKendaraanController::insert');
    $routes->get('pengeluaran_kendaraan/edit', 'Operator\PengeluaranKendaraanController::edit');
    $routes->post('pengeluaran_kendaraan/update', 'Operator\PengeluaranKendaraanController::update');
    $routes->post('pengeluaran_kendaraan/upload_pengantar', 'Operator\PengeluaranKendaraanController::upload_pengantar');

    $routes->get('cetak_pdf/(:any)', 'Pdf\PdfController::index/$1');
    $routes->get('cetak_pengantar/(:any)', 'Pdf\PdfController::cetak_pengantar/$1');

    $routes->post('cetak_laporan/', 'Pdf\PdfController::cetak_laporan');

    $routes->get('export_excel/', 'Excel\ExcelController::cetak_laporan');
});

$routes->group('/verifikator', function ($routes) {
    $routes->get('dashboard', 'Verifikator\DashboardController::index');
    // Data Penindakan
    $routes->get('data_penindakan', 'Verifikator\DataPenindakanController::index');
    $routes->get('data_penindakan/views/(:any)', 'Verifikator\DataPenindakanController::views/$1');
    $routes->get('data_penindakan/getTypeKendaraan', 'Verifikator\DataPenindakanController::getTypeKendaraan');
    $routes->get('data_penindakan/getDataKendaraan', 'Verifikator\DataPenindakanController::getDataKendaraan');
    $routes->post('data_penindakan/insert', 'Verifikator\DataPenindakanController::insert');
    $routes->get('data_penindakan/edit', 'Verifikator\DataPenindakanController::edit');
    $routes->post('data_penindakan/delete', 'Verifikator\DataPenindakanController::delete');
    $routes->post('data_penindakan/update', 'Verifikator\DataPenindakanController::update');

    $routes->post('getDataPenindakan', 'Verifikator\DataPenindakanController::getDataPenindakan');
    // Pengeluaran Kendaraan
    $routes->get('pengeluaran_kendaraan', 'Verifikator\PengeluaranKendaraanController::index');
    $routes->get('pengeluaran_kendaraan/search', 'Verifikator\PengeluaranKendaraanController::search');
    $routes->get('pengeluaran_kendaraan/form_insert/(:any)', 'Verifikator\PengeluaranKendaraanController::form_insert/$1');
    $routes->get('pengeluaran_kendaraan/views/(:any)', 'Verifikator\PengeluaranKendaraanController::views/$1');
    $routes->get('pengeluaran_kendaraan/getTypeKendaraan', 'Verifikator\PengeluaranKendaraanController::getTypeKendaraan');
    $routes->post('pengeluaran_kendaraan/insert', 'Verifikator\PengeluaranKendaraanController::insert');
    $routes->get('pengeluaran_kendaraan/edit', 'Verifikator\PengeluaranKendaraanController::edit');
    $routes->post('pengeluaran_kendaraan/update', 'Verifikator\PengeluaranKendaraanController::update');
    $routes->post('pengeluaran_kendaraan/upload_pengantar', 'Verifikator\PengeluaranKendaraanController::upload_pengantar');

    $routes->get('cetak_pdf/(:any)', 'Pdf\PdfController::index/$1');
    $routes->get('cetak_pengantar/(:any)', 'Pdf\PdfController::cetak_pengantar/$1');

    $routes->post('cetak_laporan/', 'Pdf\PdfController::cetak_laporan');
});

$routes->group('/editor', function ($routes) {
    $routes->get('dashboard', 'Editor\DashboardController::index');
    // Data Penindakan
    $routes->get('data_penindakan', 'Editor\DataPenindakanController::index');
    $routes->get('data_penindakan/views/(:any)', 'Editor\DataPenindakanController::views/$1');
    $routes->get('data_penindakan/getTypeKendaraan', 'Editor\DataPenindakanController::getTypeKendaraan');
    $routes->get('data_penindakan/getDataKendaraan', 'Editor\DataPenindakanController::getDataKendaraan');
    $routes->post('data_penindakan/insert', 'Editor\DataPenindakanController::insert');
    $routes->get('data_penindakan/edit', 'Editor\DataPenindakanController::edit');
    $routes->post('data_penindakan/delete', 'Editor\DataPenindakanController::delete');
    $routes->post('data_penindakan/update', 'Editor\DataPenindakanController::update');

    $routes->post('getDataPenindakan', 'Editor\DataPenindakanController::getDataPenindakan');
    // Pengeluaran Kendaraan
    $routes->get('pengeluaran_kendaraan', 'Editor\PengeluaranKendaraanController::index');
    $routes->get('pengeluaran_kendaraan/search', 'Editor\PengeluaranKendaraanController::search');
    $routes->get('pengeluaran_kendaraan/form_insert/(:any)', 'Editor\PengeluaranKendaraanController::form_insert/$1');
    $routes->get('pengeluaran_kendaraan/views/(:any)', 'Editor\PengeluaranKendaraanController::views/$1');
    $routes->get('pengeluaran_kendaraan/getTypeKendaraan', 'Editor\PengeluaranKendaraanController::getTypeKendaraan');
    $routes->post('pengeluaran_kendaraan/insert', 'Editor\PengeluaranKendaraanController::insert');
    $routes->get('pengeluaran_kendaraan/edit', 'Editor\PengeluaranKendaraanController::edit');
    $routes->post('pengeluaran_kendaraan/update', 'Editor\PengeluaranKendaraanController::update');
    $routes->post('pengeluaran_kendaraan/upload_pengantar', 'Editor\PengeluaranKendaraanController::upload_pengantar');

    $routes->get('cetak_pdf/(:any)', 'Pdf\PdfController::index/$1');
    $routes->get('cetak_pengantar/(:any)', 'Pdf\PdfController::cetak_pengantar/$1');

    $routes->post('cetak_laporan/', 'Pdf\PdfController::cetak_laporan');
});

$routes->group('/auth', function ($routes) {
    $routes->get('login', 'Auth\AuthController::index');
    $routes->get('logout', 'Auth\AuthController::logout');
    $routes->post('cek_login', 'Auth\AuthController::cek_login');
});
