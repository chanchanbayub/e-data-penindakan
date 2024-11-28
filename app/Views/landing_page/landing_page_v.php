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

        <div class=" pagetitle">
            <h2>Dashboard</h2>
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
                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            new Chart(document.querySelector('#barChart'), {
                                                type: 'bar',
                                                data: {
                                                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                                    datasets: [{
                                                        label: '',
                                                        data: [65, 59, 80, 81, 56, 55, 40],
                                                        backgroundColor: [
                                                            'rgba(255, 99, 132, 0.2)',
                                                            'rgba(255, 159, 64, 0.2)',
                                                            'rgba(255, 205, 86, 0.2)',
                                                            'rgba(75, 192, 192, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                            'rgba(153, 102, 255, 0.2)',
                                                            'rgba(201, 203, 207, 0.2)'
                                                        ],
                                                        borderColor: [
                                                            'rgb(255, 99, 132)',
                                                            'rgb(255, 159, 64)',
                                                            'rgb(255, 205, 86)',
                                                            'rgb(75, 192, 192)',
                                                            'rgb(54, 162, 235)',
                                                            'rgb(153, 102, 255)',
                                                            'rgb(201, 203, 207)'
                                                        ],
                                                        borderWidth: 1
                                                    }]
                                                },
                                                options: {
                                                    scales: {
                                                        y: {
                                                            beginAtZero: true
                                                        }
                                                    }
                                                }
                                            });
                                        });
                                    </script>
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




    <?php foreach ($jenis_penindakan as $jenis_penindakan) {

        $db = \Config\Database::connect();
        $data_penindakan = $db->table('data_penindakan_table')->countAllResults();

        $stop_operasi = $db->table('data_penindakan_table')->where('jenis_penindakan_id', 1)
            ->countAllResults();

        $so = $stop_operasi / $data_penindakan * 100;
        $persentasi_so = round($so) . '%';

        $tilang_dishub = $db->table('data_penindakan_table')->where('jenis_penindakan_id', 2)
            ->countAllResults();

        $tilang = $tilang_dishub / $data_penindakan * 100;
        $persentasi_tilang = round($tilang) . '%';

        $persen_so = $persentasi_so;
        $persen_tilang = $persentasi_tilang;
        // dd($persen_so);
    }; ?>


    <?php foreach ($jenis_kendaraan as $jenis_kendaraan) {
        $db = \Config\Database::connect();
        $bus_kecil = $db->table('data_penindakan_table')->where('jenis_kendaraan_id', 1)
            ->countAllResults();
        $mikrotrans = $db->table('data_penindakan_table')->where('jenis_kendaraan_id', 2)
            ->countAllResults();
        $bus_besar = $db->table('data_penindakan_table')->where('jenis_kendaraan_id', 3)
            ->countAllResults();
        $bus_sedang = $db->table('data_penindakan_table')->where('jenis_kendaraan_id', 4)
            ->countAllResults();
        $taksi = $db->table('data_penindakan_table')->where('jenis_kendaraan_id', 11)
            ->countAllResults();
        $mobil_barang = $db->table('data_penindakan_table')->where('jenis_kendaraan_id', 12)
            ->countAllResults();
        $kendaraan_khusus = $db->table('data_penindakan_table')->where('jenis_kendaraan_id', 13)
            ->countAllResults();
        $bajaj = $db->table('data_penindakan_table')->where('jenis_kendaraan_id', 14)
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
    <script src="/assets/js/main.js"></script>
    <script src="/assets/vendor/jquery/jquery.js"></script>

    <script>
        $(document).ready(function() {
            new Chart(document.querySelector('#pieChart'), {
                type: 'pie',
                data: {
                    labels: [
                        'Stop Operasi : <?= number_format($stop_operasi) ?>',
                        'Tilang Dishub : <?= number_format($tilang_dishub) ?>',
                    ],
                    datasets: [{
                        label: 'Persentase',
                        data: [<?= $stop_operasi ?>, <?= $tilang_dishub ?>, ],
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

</body>

</html>