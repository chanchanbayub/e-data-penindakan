<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/logo2.png" rel="icon">
    <link href="/assets/img/logo2.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.min.css">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <img src="/assets2/img/jayaraya_logo.png" alt="">
                <img src="/assets2/img/logo2.png" alt="">
                <span class="d-lg-block" style="font-size: 18px;">Dinas Perhubungan Provinsi DKI Jakarta</span>
            </a>
        </div>
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">

                    <a class="btn-outline-secondary nav-link d-flex align-items-center pe-0" href="/progress">
                        <span class="d-none d-md-block dropdown-toggle ps-2">Progress Pengeluaran Kendaraan</span>
                    </a><!-- End Profile Iamge Icon -->

                </li>
            </ul>

    </header><!-- End Header -->

    <main id="main" class="main" style="margin-left: auto;">

        <div class="pagetitle">
            <h2>Cari Kendaraan</h2>
            <form id="cari_kendaraan">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="" class="col-form-label"> <b>Masukan Nomor Kendaraan :</b> </label>
                    <div class="col-md-12">
                        <div class="row g-3 text-uppercase">
                            <div class="col-sm-4">
                                <input type="text" class="form-control text-uppercase" name="kode_wilayah_awal" id="kode_wilayah_awal" placeholder="B" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control text-uppercase" name="nomor_kendaraan" id="nomor_kendaraan" placeholder="1234" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control text-uppercase" name="kode_wilayah_akhir" id="kode_wilayah_akhir" placeholder="CD" required>
                            </div>
                        </div>
                        <br>
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-success btn-sm search" type="submit"><i class="bi bi-search"></i>Cari Kendaraan</button>
                        </div>
                    </div>
            </form>

        </div><!-- End Page Title -->
        <br>

        <div class=" pagetitle">
            <h2>Dashboard</h2>
            <span>Data Penindakan Persyaratan Teknis dan Laik Jalan Dinas Perhubungan Provinsi DKI Jakarta</span><br>
            <span>Periode Hari <?= format_indo(date('Y-m-d'))  ?></span>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <!-- Small tables -->
                            <table class="table table-sm ">
                                <thead align="center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th rowspan="2">UKPD</th>
                                        <th colspan="2">Jenis Penindakan</th>
                                        <th rowspan="2">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr align="center">
                                        <td></td>
                                        <td></td>
                                        <td>Stop Operasi</td>
                                        <td>Tilang Dishub</td>
                                        <td></td>
                                    </tr>
                                    <tr align="center">
                                        <th scope="row">1</th>
                                        <td align="left">Bidang Dalops</td>
                                        <td><?= $so_dalops_perhari ?></td>
                                        <td><?= $bap_dalops_perhari ?></td>
                                        <td><?= $so_dalops_perhari + $bap_dalops_perhari ?></td>
                                    </tr>
                                    <tr align="center">
                                        <th scope="row">2</th>
                                        <td align="left">Sudinhub Jakarta Pusat</td>
                                        <td><?= $so_pusat_perhari ?></td>
                                        <td><?= $bap_pusat_perhari ?></td>
                                        <td><?= $so_pusat_perhari + $bap_pusat_perhari ?></td>
                                    </tr>
                                    <tr align="center">
                                        <th scope="row">3</th>
                                        <td align="left">Sudinhub Jakarta Utara</td>
                                        <td><?= $so_utara_perhari ?></td>
                                        <td><?= $bap_utara_perhari ?></td>
                                        <td><?= $so_utara_perhari + $bap_utara_perhari ?></td>
                                    </tr>
                                    <tr align="center">
                                        <th scope="row">4</th>
                                        <td align="left">Sudinhub Jakarta Selatan</td>
                                        <td><?= $so_selatan_perhari ?></td>
                                        <td><?= $bap_selatan_perhari ?></td>
                                        <td><?= $so_selatan_perhari + $bap_selatan_perhari ?></td>
                                    </tr>
                                    <tr align="center">
                                        <th scope="row">5</th>
                                        <td align="left">Sudinhub Jakarta Barat</td>
                                        <td><?= $so_barat_perhari ?></td>
                                        <td><?= $bap_barat_perhari ?></td>
                                        <td><?= $so_barat_perhari + $bap_barat_perhari ?></td>
                                    </tr>
                                    <tr align="center">
                                        <th scope="row">6</th>
                                        <td align="left">Sudinhub Jakarta Timur</td>
                                        <td><?= $so_timur_perhari ?></td>
                                        <td><?= $bap_timur_perhari ?></td>
                                        <td><?= $so_timur_perhari + $bap_timur_perhari ?></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr align="center">
                                        <th colspan="2">Total</th>
                                        <th><?= $so_barat_perhari + $so_pusat_perhari + $so_utara_perhari + $so_dalops_perhari + $so_timur_perhari + $so_selatan_perhari ?></th>
                                        <th><?= $bap_barat_perhari + $bap_pusat_perhari + $bap_utara_perhari + $bap_dalops_perhari + $bap_timur_perhari + $bap_selatan_perhari ?></th>
                                        <th><?= $so_barat_perhari + $so_pusat_perhari + $so_utara_perhari + $so_dalops_perhari + $so_timur_perhari + $so_selatan_perhari + $bap_barat_perhari + $bap_pusat_perhari + $bap_utara_perhari + $bap_dalops_perhari + $bap_timur_perhari + $bap_selatan_perhari ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- End small tables -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class=" pagetitle">
            <span>Data Penindakan Persyaratan Teknis dan Laik Jalan Dinas Perhubungan Provinsi DKI Jakarta</span><br>
            <span>Periode 02 Januari s/d <?= date('d F Y') ?></span>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Sales Card -->
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Bidang Dalops <br> <small> <u>Data Penindakan Kelaikan Jalan Tahun <?= date('Y') ?> </u></small></h5>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td> Stop Operasi</td>
                                                        <td>:</td>
                                                        <td> <b> <?= $so_dalops ?> </b> <small> Kendaraan </small></td>
                                                    </tr>
                                                    <tr>
                                                        <td>BAP / Tilang</td>
                                                        <td>:</td>
                                                        <td> <b> <?= $bap_dalops ?> </b> <small> Kendaraan </small></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total</td>
                                                        <td>:</td>
                                                        <td> <b> <?= $so_dalops + $bap_dalops ?> <small> Kendaraan </small> </b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Sudinhub Jakarta Pusat <br> <small> <u>Data Penindakan Kelaikan Jalan Tahun <?= date('Y') ?> </u></small></h5>
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td> Stop Operasi</td>
                                                        <td>:</td>
                                                        <td> <b> <?= $so_pusat ?> </b> <small> Kendaraan </small></td>
                                                    </tr>
                                                    <tr>
                                                        <td>BAP / Tilang</td>
                                                        <td>:</td>
                                                        <td> <b> <?= $bap_pusat ?> </b> <small> Kendaraan </small></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total</td>
                                                        <td>:</td>
                                                        <td> <b> <?= $so_pusat + $bap_pusat ?> <small> Kendaraan </small> </b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Sudinhub Jakarta Utara <br> <small> <u>Data Penindakan Kelaikan Jalan Tahun <?= date('Y') ?> </u></small></h5>
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td> Stop Operasi</td>
                                                        <td>:</td>
                                                        <td> <b> <?= $so_utara ?> </b> <small> Kendaraan </small></td>
                                                    </tr>
                                                    <tr>
                                                        <td>BAP / Tilang</td>
                                                        <td>:</td>
                                                        <td> <b> <?= $bap_utara ?> </b> <small> Kendaraan </small></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total</td>
                                                        <td>:</td>
                                                        <td> <b> <?= $so_utara + $bap_utara ?> <small> Kendaraan </small> </b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Sudinhub Jakarta Barat <br> <small> <u>Data Penindakan Kelaikan Jalan Tahun <?= date('Y') ?> </u></small></h5>
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td> Stop Operasi</td>
                                                        <td>:</td>
                                                        <td> <b> <?= $so_barat ?> </b> <small> Kendaraan </small></td>
                                                    </tr>
                                                    <tr>
                                                        <td>BAP / Tilang</td>
                                                        <td>:</td>
                                                        <td> <b> <?= $bap_barat ?> </b> <small> Kendaraan </small></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total</td>
                                                        <td>:</td>
                                                        <td> <b> <?= $so_barat + $bap_barat ?> <small> Kendaraan </small> </b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Sudinhub Jakarta Selatan <br> <small> <u>Data Penindakan Kelaikan Jalan Tahun <?= date('Y') ?> </u></small></h5>
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td> Stop Operasi</td>
                                                        <td>:</td>
                                                        <td> <b> <?= $so_selatan ?> </b> <small> Kendaraan </small></td>
                                                    </tr>
                                                    <tr>
                                                        <td>BAP / Tilang</td>
                                                        <td>:</td>
                                                        <td> <b> <?= $bap_selatan ?> </b> <small> Kendaraan </small></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total</td>
                                                        <td>:</td>
                                                        <td> <b> <?= $so_selatan + $bap_selatan ?> <small> Kendaraan </small> </b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Sudinhub Jakarta Timur <br><small> <u>Data Penindakan Kelaikan Jalan Tahun <?= date('Y') ?> </u></small></h5>
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td> Stop Operasi</td>
                                                        <td>:</td>
                                                        <td> <b> <?= $so_timur ?> </b> <small> Kendaraan </small></td>
                                                    </tr>
                                                    <tr>
                                                        <td>BAP / Tilang</td>
                                                        <td>:</td>
                                                        <td> <b> <?= $bap_timur ?> </b> <small> Kendaraan </small></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total</td>
                                                        <td>:</td>
                                                        <td> <b> <?= $so_timur + $bap_timur ?> <small> Kendaraan </small> </b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- End Sales Card -->

                        <!-- Reports -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Grafik Jumlah Penindakan Tahun <?= date('Y') ?></h5>

                                    <!-- Bar Chart -->
                                    <canvas id="barChart" style="max-height: 400px;"></canvas>
                                    <!-- End Bar CHart -->

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Persentase Berdasarkan Jenis Penindakan</h5>
                                    <!-- Pie Chart -->
                                    <canvas id="pieChart" style="max-height: 450px;"></canvas>
                                    <!-- End Pie CHart -->

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Persentase Berdasarkan Jenis Kendaraan</h5>
                                    <!-- Doughnut Chart -->
                                    <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
                                    <!-- End Doughnut CHart -->

                                </div>
                            </div>
                        </div>
                        <!-- End Reports -->

                    </div>
                </div>
        </section>
    </main><!-- End #main -->

    <!-- Modal -->
    <div class="modal fade" id="data_penindakan_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Data Penindakan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr align="center">
                                    <th scope="col">#</th>
                                    <th scope="col">UKPD</th>
                                    <th scope="col">Nomor Kendaraan</th>
                                    <th scope="col">Tanggal Penindakan</th>
                                    <th scope="col">Jenis Penindakan</th>
                                </tr>
                            </thead>
                            <tbody id="table_data" class="text-uppercase">
                                <tr align="center">

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <span><b>Total Tilang Dishub : </b><b id="jumlah_tilang"></b></span><br>
                    <span><b>Total Stop Operasi : </b> <b id="jumlah_so"></b></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-dismiss="modal"><i class="bi bi-door-closed-fill"></i> Tutup</button>

                </div>
            </div>
        </div>
    </div>



    <?php

    use App\Models\Admin\DataPenindakanModel;

    foreach ($jenis_penindakan as $jenis_penindakan) {

        $tahun = date('Y');
        $db = \Config\Database::connect();

        $data_penindakan = $db->table('data_penindakan_table')->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)->countAllResults();

        $stop_operasi = $db->table('data_penindakan_table')->where('jenis_penindakan_id', 1)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)
            ->countAllResults();

        $tilang_dishub = $db->table('data_penindakan_table')->where('jenis_penindakan_id', 2)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)
            ->countAllResults();
    }; ?>

    <?php foreach ($bulan as $bulan) {

        $db = \Config\Database::connect();
        $januari = $db->table('data_penindakan_table')->where('MONTH(data_penindakan_table.tanggal_penindakan)', 1)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)->countAllResults();
        $februari = $db->table('data_penindakan_table')->where('MONTH(data_penindakan_table.tanggal_penindakan)', 2)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)->countAllResults();
        $maret = $db->table('data_penindakan_table')->where('MONTH(data_penindakan_table.tanggal_penindakan)', 3)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)->countAllResults();
        $april = $db->table('data_penindakan_table')->where('MONTH(data_penindakan_table.tanggal_penindakan)', 4)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)->countAllResults();
        $mei = $db->table('data_penindakan_table')->where('MONTH(data_penindakan_table.tanggal_penindakan)', 5)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)->countAllResults();
        $juni = $db->table('data_penindakan_table')->where('MONTH(data_penindakan_table.tanggal_penindakan)', 6)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)->countAllResults();
        $juli = $db->table('data_penindakan_table')->where('MONTH(data_penindakan_table.tanggal_penindakan)', 7)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)->countAllResults();
        $agustus = $db->table('data_penindakan_table')->where('MONTH(data_penindakan_table.tanggal_penindakan)', 8)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)->countAllResults();
        $september = $db->table('data_penindakan_table')->where('MONTH(data_penindakan_table.tanggal_penindakan)', 9)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)->countAllResults();
        $oktober = $db->table('data_penindakan_table')->where('MONTH(data_penindakan_table.tanggal_penindakan)', 10)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)->countAllResults();
        $november = $db->table('data_penindakan_table')->where('MONTH(data_penindakan_table.tanggal_penindakan)', 11)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)->countAllResults();
        $desember = $db->table('data_penindakan_table')->where('MONTH(data_penindakan_table.tanggal_penindakan)', 12)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)->countAllResults();
    }; ?>

    <?php foreach ($jenis_kendaraan as $jenis_kendaraan) {
        $db = \Config\Database::connect();
        $bus_kecil = $db->table('data_penindakan_table')->where('jenis_kendaraan_id', 1)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)
            ->countAllResults();
        $mikrotrans = $db->table('data_penindakan_table')->where('jenis_kendaraan_id', 2)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)
            ->countAllResults();
        $bus_besar = $db->table('data_penindakan_table')->where('jenis_kendaraan_id', 3)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)
            ->countAllResults();
        $bus_sedang = $db->table('data_penindakan_table')->where('jenis_kendaraan_id', 4)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)
            ->countAllResults();
        $taksi = $db->table('data_penindakan_table')->where('jenis_kendaraan_id', 11)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)
            ->countAllResults();
        $mobil_barang = $db->table('data_penindakan_table')->where('jenis_kendaraan_id', 12)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)
            ->countAllResults();
        $kendaraan_khusus = $db->table('data_penindakan_table')->where('jenis_kendaraan_id', 13)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)
            ->countAllResults();
        $bajaj = $db->table('data_penindakan_table')->where('jenis_kendaraan_id', 14)->where('YEAR(data_penindakan_table.tanggal_penindakan)', $tahun)
            ->countAllResults();
    }; ?>


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer" style="margin-left: 0;">
        <div class="copyright">
            &copy; Copyright <strong><span>Dinas Perhubungan Provinsi DKI Jakarta</span></strong>. All Rights Reserved
        </div>
        <!-- <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div> -->
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



    <!-- Vendor JS Files -->
    <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="/assets/vendor/echarts/echarts.min.js"></script>
    <script src="/assets/vendor/quill/quill.min.js"></script>
    <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets2/js/moment.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.min.js"></script>
    <script src="/assets/vendor/jquery/jquery.js"></script>

    <script>
        $(document).ready(function() {
            new Chart(document.querySelector('#pieChart'), {
                type: 'doughnut',
                data: {
                    labels: [
                        'Stop Operasi : <?= number_format($stop_operasi) ?>',
                        'Tilang Dishub : <?= number_format($tilang_dishub) ?>',
                    ],
                    datasets: [{
                        label: 'Persentase ',
                        data: [<?= round($stop_operasi / $data_penindakan * 100) ?>, <?= round($tilang_dishub / $data_penindakan * 100) ?>],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                        ]
                    }]
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            let date = new Date();

            new Chart(document.querySelector('#barChart'), {
                type: 'bar',
                data: {
                    labels: [
                        'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'Juni',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember',
                    ],
                    datasets: [{
                        label: `Jumlah Penindakan Tahun ${date.getFullYear()}`,
                        data: [<?= $januari ?>, <?= $februari ?>, <?= $maret ?>, <?= $april ?>, <?= $mei ?>, <?= $juni ?>, <?= $juli ?>, <?= $juli ?>, <?= $agustus ?>, <?= $september ?>, <?= $oktober ?>, <?= $november ?>, <?= $desember ?>, ],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(0, 255, 254)',
                            'rgb(115, 255, 216)',
                            'rgb(255, 227, 200)',
                            'rgb(138, 43, 226)',
                            'rgb(95, 158, 160)',
                            'rgb(127, 255, 1)',
                            'rgb(100, 149, 237)',
                            'rgb(184, 134, 11)',
                            'rgb(189, 183, 107)',
                            'rgb(251, 140, 1)'
                        ]
                    }]
                },
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            new Chart(document.querySelector('#doughnutChart'), {
                type: 'doughnut',
                data: {
                    labels: [
                        'Bus Kecil',
                        'Mikrotrans',
                        'Bus Besar',
                        'Bus Sedang',
                        'Taksi',
                        'Mobil Barang',
                        'Kendaraan Khusus',
                        'Bajaj'
                    ],
                    datasets: [{
                        label: 'Jumlah',
                        data: [<?= $bus_kecil ?>, <?= $mikrotrans ?>, <?= $bus_besar ?>, <?= $bus_sedang ?>, <?= $taksi ?>, <?= $mobil_barang ?>, <?= $kendaraan_khusus ?>, <?= $bajaj ?>],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(251, 127, 80)',
                            'rgb(100, 149, 237)',
                            'rgb(173, 255, 48)',
                            'rgb(153, 50, 204)',
                            'rgb(143, 188, 144)',
                        ],
                        hoverOffset: 4
                    }]
                }
            });
        });
    </script>

    <script>
        let tanggal = new moment();

        $("#cari_kendaraan").submit(function(e) {
            e.preventDefault();
            let kode_wilayah_awal = $("#kode_wilayah_awal").val();
            let nomor_kendaraan = $("#nomor_kendaraan").val();
            let kode_wilayah_akhir = $("#kode_wilayah_akhir").val();
            $.ajax({
                url: '/cari_kendaraan',
                method: 'get',
                dataType: 'JSON',
                data: {
                    kode_wilayah_awal: kode_wilayah_awal,
                    nomor_kendaraan: nomor_kendaraan,
                    kode_wilayah_akhir: kode_wilayah_akhir,
                },
                beforeSend: function() {
                    $('.search').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                    $('.search').prop('disabled', true);
                },
                success: function(response) {
                    $('.search').html("<i class='bi bi-search'></i> Cari Kendaraan");
                    $('.search').prop('disabled', false);
                    if (response.data_penindakan.length == 0) {
                        Swal.fire({
                            icon: 'error',
                            title: `Data Tidak diTemukan`,
                        });
                        $("#kode_wilayah_awal").val('');
                        $("#nomor_kendaraan").val('');
                        $("#kode_wilayah_akhir").val('');
                    } else {

                        $("#kode_wilayah_awal").val('');
                        $("#nomor_kendaraan").val('');
                        $("#kode_wilayah_akhir").val('');

                        let no = 1;
                        let table_data = ``;

                        $("#data_penindakan_modal").modal('show');
                        response.data_penindakan.forEach(function(e) {
                            table_data += `<tr align = "center"> 
                                <td align="center">${no++}</td>
                                <td align="left">${e.ukpd}</td>
                                <td align="center">${e.kode_wilayah_awal} ${e.nomor_kendaraan} ${e.kode_wilayah_akhir} </td>
                                <td align="center">${moment(e.tanggal_penindakan).format('DD/MM/Y')}</td>
                                <td align="center">${e.jenis_penindakan}</td>
                                
                            </tr>`;

                            $("#table_data").html(table_data);
                            $("#jumlah_tilang").html(response.data_tilang + ' Kali');
                            $("#jumlah_so").html(response.data_so + ' Kali');
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: `Data Belum Tersimpan!`,
                    });
                    $('.search').html("<i class='bi bi-search'></i> Cari Kendaraan");
                    $('.search').prop('disabled', false);
                }
            });
        });
    </script>

</body>

</html>