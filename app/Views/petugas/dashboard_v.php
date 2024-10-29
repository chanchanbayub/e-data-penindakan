<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/petugas/dashboard">|</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="copyright mb-2">
                    | <strong> Data Penindakan <?= session()->get('ukpd') ?> periode 2 Januari 2024 s/d <?= date_indo(date('Y-m-d')) ?></strong></span>
                </div>
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-12">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Total <span>| Penindakan </span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-car-front"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= number_format($total_penindakan) ?> </h6>
                                        <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Kendaraan</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-12">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Total <span>| Penindakan Stop Operasi </span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-car-front"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= number_format($total_so)  ?></h6>
                                        <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Kendaraan</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-12">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Total <span>| Penindakan Tilang Dishub</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-car-front"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= number_format($total_tilang) ?> </h6>
                                        <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Kendaraan</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Sales Card -->

                </div><!-- End Left side columns -->
            </div>
    </section>

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="copyright mb-2">
                    <strong> <span>| Data Pengeluaran Kendaraan yang di Stop Operasi <?= session()->get('ukpd') ?> periode 2 Januari 2024 s/d <?= date_indo(date('Y-m-d')) ?></span></strong></span>
                </div>
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-12">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Total <span>| Kendaraan Keluar </span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-car-front"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= number_format($total_pengeluaran)  ?></h6>
                                        <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Kendaraan</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-12">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Total <span>| Kendaraan Dalam Pengajuan</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-car-front"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6> <?= number_format($total_pengajuan)  ?> </h6>
                                        <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Kendaraan</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-12">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Total <span>| Kendaraan Belum Keluar</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-car-front"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6> <?= number_format($total_belum_keluar)  ?> </h6>
                                        <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Kendaraan</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Sales Card -->

                </div><!-- End Left side columns -->
            </div>
    </section>
</main>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
</script>
<?= $this->endSection(); ?>