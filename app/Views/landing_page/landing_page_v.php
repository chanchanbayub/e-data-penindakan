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
                        <div class="col-md-2">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <!-- <h6 class="card-title">Bidang Dalops <span>| Total Penindakan</span></h6> -->
                                    <p class="card-title"> Bidang Dalops</span></p>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-car-front"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145</h6>
                                            <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Kendaraan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <!-- <h6 class="card-title">Bidang Dalops <span>| Total Penindakan</span></h6> -->
                                    <p class="card-title"> Bidang Dalops</span></p>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-car-front"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145</h6>
                                            <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Kendaraan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <!-- <h6 class="card-title">Bidang Dalops <span>| Total Penindakan</span></h6> -->
                                    <p class="card-title"> Bidang Dalops</span></p>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-car-front"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145</h6>
                                            <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Kendaraan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <!-- <h6 class="card-title">Bidang Dalops <span>| Total Penindakan</span></h6> -->
                                    <p class="card-title"> Bidang Dalops</span></p>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-car-front"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145</h6>
                                            <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Kendaraan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <!-- <h6 class="card-title">Bidang Dalops <span>| Total Penindakan</span></h6> -->
                                    <p class="card-title"> Bidang Dalops</span></p>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-car-front"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145</h6>
                                            <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Kendaraan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <!-- <h6 class="card-title">Bidang Dalops <span>| Total Penindakan</span></h6> -->
                                    <p class="card-title"> Bidang Dalops</span></p>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-car-front"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145</h6>
                                            <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Kendaraan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Sales Card -->


                        <!-- Reports -->
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Reports <span>/Today</span></h5>

                                    <!-- Line Chart -->
                                    <div id="reportsChart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            new ApexCharts(document.querySelector("#reportsChart"), {
                                                series: [{
                                                    name: 'Sales',
                                                    data: [31, 40, 28, 51, 42, 82, 56],
                                                }, {
                                                    name: 'Revenue',
                                                    data: [11, 32, 45, 32, 34, 52, 41]
                                                }, {
                                                    name: 'Customers',
                                                    data: [15, 11, 32, 18, 9, 24, 11]
                                                }],
                                                chart: {
                                                    height: 350,
                                                    type: 'area',
                                                    toolbar: {
                                                        show: false
                                                    },
                                                },
                                                markers: {
                                                    size: 4
                                                },
                                                colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                                fill: {
                                                    type: "gradient",
                                                    gradient: {
                                                        shadeIntensity: 1,
                                                        opacityFrom: 0.3,
                                                        opacityTo: 0.4,
                                                        stops: [0, 90, 100]
                                                    }
                                                },
                                                dataLabels: {
                                                    enabled: false
                                                },
                                                stroke: {
                                                    curve: 'smooth',
                                                    width: 2
                                                },
                                                xaxis: {
                                                    type: 'datetime',
                                                    categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                                                },
                                                tooltip: {
                                                    x: {
                                                        format: 'dd/MM/yy HH:mm'
                                                    },
                                                }
                                            }).render();
                                        });
                                    </script>
                                    <!-- End Line Chart -->
                                </div>

                            </div>
                        </div><!-- End Reports -->
                        <div class="col-6">
                            <!-- Budget Report -->
                            <div class="card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Budget Report <span>| This Month</span></h5>
                                    <div id="budgetChart" style="min-height: 385px;" class="echart"></div>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                                                legend: {
                                                    data: ['Allocated Budget', 'Actual Spending']
                                                },
                                                radar: {
                                                    // shape: 'circle',
                                                    indicator: [{
                                                            name: 'Sales',
                                                            max: 6500
                                                        },
                                                        {
                                                            name: 'Administration',
                                                            max: 16000
                                                        },
                                                        {
                                                            name: 'Information Technology',
                                                            max: 30000
                                                        },
                                                        {
                                                            name: 'Customer Support',
                                                            max: 38000
                                                        },
                                                        {
                                                            name: 'Development',
                                                            max: 52000
                                                        },
                                                        {
                                                            name: 'Marketing',
                                                            max: 25000
                                                        }
                                                    ]
                                                },
                                                series: [{
                                                    name: 'Budget vs spending',
                                                    type: 'radar',
                                                    data: [{
                                                            value: [4200, 3000, 20000, 35000, 50000, 18000],
                                                            name: 'Allocated Budget'
                                                        },
                                                        {
                                                            value: [5000, 14000, 28000, 26000, 42000, 21000],
                                                            name: 'Actual Spending'
                                                        }
                                                    ]
                                                }]
                                            });
                                        });
                                    </script>

                                </div>
                            </div><!-- End Budget Report -->
                        </div><!-- End Reports -->
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