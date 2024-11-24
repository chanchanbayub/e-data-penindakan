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
        <div class="pagetitle">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><?= $title ?></li>
                    <!-- <li class="breadcrumb-item"><a href="/progress_pengeluaran"></a></li> -->

                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xxl-6 col-md-12">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title"><span>Jumlah Pengeluaran Kendaraan Hari Ini</span> </h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-car-front"></i>
                                        </div>
                                        <div class="ps-3">
                                            <span class="text-success small pt-1 fw-bold"></span> <b><?= $total_pengeluaran ?></b> <span class="text-muted small pt-2 ps-1">Kendaraan</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-md-12">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title"><span>Jumlah Pengeluaran Kendaraan Dalam Proses Pengajuan Hari Ini</span> </h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-car-front"></i>
                                        </div>
                                        <div class="ps-3">
                                            <span class="text-success small pt-1 fw-bold"></span> <b><?= $total_pengajuan ?></b> <span class="text-muted small pt-2 ps-1">Kendaraan</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $title ?> <span>| Table </span></h5>
                                    <table class="table table-bordered datatable text-uppercase">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th>Nama Pemilik</th>
                                                <th>Nomor Kendaraan</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Status Pengajuan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($pengeluaran_kendaraan as $pengeluaran_kendaraan) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $pengeluaran_kendaraan->nama_pemilik ?></td>
                                                    <td><?= $pengeluaran_kendaraan->kode_wilayah_awal ?> <?= $pengeluaran_kendaraan->nomor_kendaraan ?> <?= $pengeluaran_kendaraan->kode_wilayah_akhir ?></td>
                                                    <td><?= date_indo(date('Y-m-d', strtotime($pengeluaran_kendaraan->tanggal_keluar))) ?></td>
                                                    <td><span class="badge <?= ($pengeluaran_kendaraan->status_kendaraan_id) == 2 ? "bg-success" : "bg-warning"  ?> "><?= $pengeluaran_kendaraan->status_kendaraan ?></span></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div><!-- End Recent Sales -->

                    </div>
                </div><!-- End Left side columns -->

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
    <script src="/assets/vendor/jquery/jquery.js"></script>

    <script>
        $(document).ready(function() {
            setInterval(function() {
                location.reload();
            }, 180000);
        })
    </script>

</body>

</html>