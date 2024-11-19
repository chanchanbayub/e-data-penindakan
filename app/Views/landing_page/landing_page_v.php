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
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="/assets/img/logo2.png" alt="">
                <span class="d-none d-lg-block">Dinas Perhubungan</span>
            </a>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

            </ul>
        </nav><!-- End Icons Navigation -->

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
                                        <div class="col-md-6">
                                            <p class="card-text text-center">Stop Operasi</p>
                                            <p class="card-text text-center"> <b> <?= $so_dalops ?> </b> Kendaraan</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="card-text text-center">BAP / Tilang</p>
                                            <p class="card-text text-center"> <b> <?= $bap_dalops ?> </b> Kendaraan</p>
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
                                        <div class="col-md-6">
                                            <p class="card-text text-center">Stop Operasi</p>
                                            <p class="card-text text-center"> <b> <?= $so_pusat ?> </b> Kendaraan</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="card-text text-center">BAP / Tilang</p>
                                            <p class="card-text text-center"> <b> <?= $bap_pusat ?> </b> Kendaraan</p>
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
                                        <div class="col-md-6">
                                            <p class="card-text text-center">Stop Operasi</p>
                                            <p class="card-text text-center"> <b> <?= $so_utara ?> </b> Kendaraan</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="card-text text-center">BAP / Tilang</p>
                                            <p class="card-text text-center"> <b> <?= $bap_utara ?> </b> Kendaraan</p>
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
                                        <div class="col-md-6">
                                            <p class="card-text text-center">Stop Operasi</p>
                                            <p class="card-text text-center"> <b> <?= $so_barat ?> </b> Kendaraan</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="card-text text-center">BAP / Tilang</p>
                                            <p class="card-text text-center"><b> <?= $bap_barat ?> </b> Kendaraan</p>
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
                                        <div class="col-md-6">
                                            <p class="card-text text-center">Stop Operasi</p>
                                            <p class="card-text text-center"> <b> <?= $so_selatan ?> </b> Kendaraan</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="card-text text-center">BAP / Tilang</p>
                                            <p class="card-text text-center"> <b> <?= $bap_selatan ?> </b> Kendaraan</p>
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
                                        <div class="col-md-6">
                                            <p class="card-text text-center">Stop Operasi</p>
                                            <p class="card-text text-center"> <b> <?= $so_timur ?> </b> Kendaraan</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="card-text text-center">BAP / Tilang</p>
                                            <p class="card-text text-center"> <b> <?= $bap_timur ?> </b> Kendaraan</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- End Sales Card -->

                        <!-- Reports -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Bar CHart</h5>

                                    <!-- Bar Chart -->
                                    <canvas id="barChart" style="max-height: 400px;"></canvas>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            new Chart(document.querySelector('#barChart'), {
                                                type: 'bar',
                                                data: {
                                                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                                    datasets: [{
                                                        label: 'Bar Chart',
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
                        <!-- End Reports -->

                    </div>
                </div>
        </section>
    </main><!-- End #main -->

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

</body>

</html>