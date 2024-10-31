<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/pengeluaran_kendaraan"><?= $title ?></a></li>

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
                                <h5 class="card-title"><span>Jumlah Pengeluaran Kendaraan Dalam Proses Pengajuan</span> </h5>
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
                                <div class="btn-group btn-sm" role="group" aria-label="Button group with nested dropdown">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-pencil-square"></i> Aksi
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#smallModal" data-bs-whatever="@mdo"><i class="bi bi-plus"></i> Ajukan Pengeluaran Kendaraan</a></li>
                                            <li><a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#laporanModal" data-bs-whatever="@mdo"><i class="bi bi-file-pdf"></i> Cetak Laporan Pengeluaran</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <table class="table table-bordered datatable text-uppercase">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th>Nomor Kendaraan</th>
                                            <th>Tanggal Penindakan</th>
                                            <th>Tanggal Pengeluaran</th>
                                            <th>Status Kendaraan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($pengeluaran_kendaraan as $pengeluaran_kendaraan) : ?>
                                            <tr>
                                                <th><a href="#"><?= $no++ ?></a></th>
                                                <td> <?= $pengeluaran_kendaraan->kode_wilayah_awal ?> <?= $pengeluaran_kendaraan->nomor_kendaraan ?> <?= $pengeluaran_kendaraan->kode_wilayah_akhir ?> </td>
                                                <td> <?= date('d-m-Y', strtotime($pengeluaran_kendaraan->tanggal_penindakan)) ?> </td>
                                                <td> <?= date('d-m-Y', strtotime($pengeluaran_kendaraan->tanggal_keluar)) ?></td>
                                                <?php if (session()->get('ukpd_id') == 1) : ?>
                                                    <td><span class="badge <?= ($pengeluaran_kendaraan->status_kendaraan_id) == 2 ? "bg-success" : "bg-warning"  ?> "><?= $pengeluaran_kendaraan->status_kendaraan ?></span></td>
                                                <?php else : ?>
                                                    <td><span class="badge <?= ($pengeluaran_kendaraan->status_kendaraan_id) == 2 ? "bg-success" : "bg-warning"  ?> "><?= $pengeluaran_kendaraan->status_kendaraan ?></span></td>
                                                <?php endif; ?>
                                                <td>
                                                    <?php if (session()->get('role_management_id') == 2) : ?>
                                                        <button class="btn btn-outline-warning btn-sm" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $pengeluaran_kendaraan->id ?>" type="button">
                                                            <i class="bi bi-printer"></i>
                                                        </button>

                                                        <button class="btn btn-sm btn-outline-danger" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $pengeluaran_kendaraan->id ?>" type="button">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                        <?php if ($pengeluaran_kendaraan->status_kendaraan_id == 2) : ?>
                                                            <?php if ($pengeluaran_kendaraan->pengantar_sidang != null) : ?>
                                                                <a href="/admin/cetak_pdf/<?= $pengeluaran_kendaraan->id ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                                                                    <i class="bi bi-file-pdf"></i>
                                                                </a>
                                                                <a href="/pengantar_sidang/<?= $pengeluaran_kendaraan->pengantar_sidang ?>" class="btn btn-sm btn-outline-success" target="_blank">
                                                                    <i class="bi bi-eye"></i>
                                                                </a>
                                                            <?php elseif ($pengeluaran_kendaraan->pengantar_sidang == null) : ?>
                                                                <a href="/admin/cetak_pdf/<?= $pengeluaran_kendaraan->id ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                                                                    <i class="bi bi-file-pdf"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                        <?php elseif ($pengeluaran_kendaraan->status_kendaraan_id == 4 || $pengeluaran_kendaraan->status_kendaraan_id == 3) : ?>
                                                            <?php if ($pengeluaran_kendaraan->pengantar_sidang != null) : ?>
                                                                <a href="/pengantar_sidang/<?= $pengeluaran_kendaraan->pengantar_sidang ?>" class="btn btn-sm btn-outline-success" target="_blank">
                                                                    <i class="bi bi-eye"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                        <?php elseif ($pengeluaran_kendaraan->status_kendaraan_id == 5) : ?>
                                                            <a href="/admin/cetak_pdf/<?= $pengeluaran_kendaraan->id ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                                                                <i class="bi bi-file-pdf"></i>
                                                            </a>
                                                            <a href="/pengantar_sidang/<?= $pengeluaran_kendaraan->pengantar_sidang ?>" class="btn btn-sm btn-outline-success" target="_blank">
                                                                <i class="bi bi-eye"></i>
                                                            </a>

                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>
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

<!-- Modal Tambah tempat_penyimpanan -->
<div class="modal fade" id="smallModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah <?= $title ?> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="search_kendaraan" autocomplete="off">
                    <?= csrf_field(); ?>

                    <div class="form-group">
                        <label for="kode_wilayah_awal" class="col-form-label">Masukan Nomor Kendaraan :</label>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" name="kode_wilayah_awal" id="kode_wilayah_awal" class="form-control" placeholder="B">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="nomor_kendaraan" id="nomor_kendaraan" class="form-control" placeholder="1234">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="kode_wilayah_akhir" id="kode_wilayah_akhir" class="form-control" placeholder="AA">
                                </div>
                            </div>

                        </div>

                        <span class="invalid-feedback error-kode-wilayah-awal"></span>
                        <span class="invalid-feedback error-nomor-kendaraan"></span>
                        <span class="invalid-feedback error-kode-wilayah-akhir"></span>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-primary search"> <i class="bi bi-search"></i> Cari Kendaraan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- End tambah Modal-->


<!-- View -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Kendaraan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nomor Kendaraan</th>
                            <th scope="col">Tanggal Penindakan</th>
                            <th scope="col">UKPD</th>
                            <th scope="col">Status Kendaraan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="data_penindakan_table">

                    </tbody>
                </table>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>

<!-- Modal Edit Pengeluaran-->
<div class="modal fade" id="deleteModal" tabindex="0">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus <?= $title ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="delete_form">
                    <?= csrf_field(); ?>
                    <input type="hidden" class="form-control" id="id_delete" name="id">
                    <div class="modal-body">
                        <p>Apakah Anda Yakin ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-danger button_delete"> <i class="bi bi-trash"></i> Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- End hapus Modal-->

<!-- Modal Edit tempat_penyimpanan -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <?= $title ?> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_data" autocomplete="off">
                    <?= csrf_field(); ?>




                    <div class="form-group">
                        <label for="nomor_surat_pengeluaran" class="col-form-label">Nomor Surat Pengeluaran:</label>
                        <input type="text" name="nomor_surat_pengeluaran" id="nomor_surat_pengeluaran" class="form-control" disabled>
                        <div class="invalid-feedback error-nomor-surat-pengeluaran">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ukpd_edit" class="col-form-label">UKPD :</label>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="ukpd_edit" id="ukpd_edit" class="text-capitalize form-control" disabled>
                                </div>
                            </div>
                            <span class="invalid-feedback error-ukpd"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="id_edit" id="id_edit" class="form-control">
                        <input type="hidden" name="data_penindakan_id" id="data_penindakan_id" class="form-control" disabled>
                        <label for="nomor_kendaraan_edit" class="col-form-label">Nomor Kendaraan :</label>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="nomor_kendaraan_edit" id="nomor_kendaraan_edit" class="text-uppercase form-control" disabled>
                                </div>
                            </div>
                            <span class="invalid-feedback error-nomor-kendaraan"></span>
                        </div>
                    </div>

                    <div class="form-group" disabled>
                        <label for="jenis_kendaraan_edit" class="col-form-label">Jenis Kendaraan :</label>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="jenis_kendaraan_edit" id="jenis_kendaraan_edit" class="text-capitalize form-control" disabled>
                                </div>
                            </div>
                            <span class="invalid-feedback error-jenis-kendaraan"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nomor_rangka" class="col-form-label">Nomor Rangka:</label>
                        <input type="text" name="nomor_rangka" id="nomor_rangka" class="form-control" disabled>
                        <div class="invalid-feedback error-nomor-rangka">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nomor_mesin" class="col-form-label">Nomor Mesin:</label>
                        <input type="text" name="nomor_mesin" id="nomor_mesin" class="form-control" disabled>
                        <div class="invalid-feedback error-nomor-mesin">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_pemilik_edit" class="col-form-label">Nama Pemilik :</label>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="nama_pemilik_edit" id="nama_pemilik_edit" class="text-uppercase form-control" disabled>
                                </div>
                            </div>
                            <span class="invalid-feedback error-nama-pemilik"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat_pemilik_kendaraan" class="col-form-label">Alamat Pemilik Kendaraan :</label>
                        <textarea name="alamat_pemilik_kendaraan" id="alamat_pemilik_kendaraan" class="form-control" disabled></textarea>
                        <div class=" invalid-feedback error-alamat-pemilik-kendaraan">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jenis_pelanggaran" class="col-form-label">Jenis Pelanggaran :</label>
                        <input type="text" name="jenis_pelanggaran" id="jenis_pelanggaran" class="form-control" disabled>
                        <div class=" invalid-feedback error-jenis-pelanggaran">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_keluar" class="col-form-label">Tanggal Keluar :</label>
                        <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control">
                        <div class=" invalid-feedback error-tanggal-keluar">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tempat_penyimpanan_id_edit" class="col-form-label">Tempat Penyimpanan :</label>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="tempat_penyimpanan_id_edit" id="tempat_penyimpanan_id_edit" class="text-capitalize form-control" disabled>
                                </div>
                            </div>
                            <span class="invalid-feedback error-nama-pemilik"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status_kendaraan_id" class="col-form-label">Status Kendaraan :</label>
                        <select name="status_kendaraan_id" id="status_kendaraan_id" class="form-control">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($status_kendaraan as $status_kendaraan) : ?>
                                <option value="<?= $status_kendaraan->id ?>"><?= $status_kendaraan->status_kendaraan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-status-kendaraan">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jenis_ttd_id" class="col-form-label">Jenis Tanda Tangan :</label>
                        <select name="jenis_ttd_id" id="jenis_ttd_id" class="form-control">
                            <option value="">--Silahkan Pilih--</option>
                            <option value="1">Tanda Tangan Elektronik</option>
                            <option value="2">Tanda Tangan Manual</option>

                        </select>
                        <div class="invalid-feedback error-status-kendaraan">

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-primary update"> <i class="bi bi-send"></i> Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Modal-->

<!-- Modal AJukan Pengeluaran -->
<div class="modal fade" id="pengantarModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajukan Pengeluaran Kendaraan </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_ajukan_pengeluaran" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" name="pengeluaran_kendaraan_id" id="pengeluaran_kendaraan_id" class="form-control">
                        <label for="pengantar_sidang" class="col-form-label">Upload Pengantar & Kwitansi Sidang (PDF) :</label>
                        <input type="file" name="pengantar_sidang" id="pengantar_sidang" class="form-control">
                        <div class="invalid-feedback error-pengantar">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_pengantar" class="col-form-label">Tanggal Surat Pengantar :</label>
                        <input type="date" name="tanggal_pengantar" id="tanggal_pengantar" class="form-control">
                        <div class="invalid-feedback error-tanggal-pengantar">

                        </div>
                    </div>

                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-primary kirim"> <i class="bi bi-send"></i> Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- End tambah Modal-->


<!-- Modal Download Pengeluaran -->
<div class="modal fade" id="laporanModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Download Laporan Pengeluaran Kendaraan </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_laporan" autocomplete="off" class="row g-3" action="/admin/cetak_laporan" method="post">
                    <?= csrf_field(); ?>

                    <div class="col-md-6">
                        <label for="tanggal_awal" class="form-label">Tanggal Awal :</label>
                        <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" required />
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal_akhir" class="form-label">Tanggal Akhir : </label>
                        <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" required />
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-primary download_laporan"> <i class="bi bi-download"></i> Download</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- End tambah Modal-->

<script src="/assets/vendor/jquery/jquery.js"></script>


<script>
    $(document).ready(function(e) {
        $('#status_kendaraan_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });

        $('#jenis_ttd_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });
    });

    $("#search_kendaraan").submit(function(e) {
        e.preventDefault();
        let kode_wilayah_awal = $('#kode_wilayah_awal').val();
        let nomor_kendaraan = $('#nomor_kendaraan').val();
        let kode_wilayah_akhir = $('#kode_wilayah_akhir').val();

        $.ajax({
            url: '/admin/pengeluaran_kendaraan/search',
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
                // console.log(response.data_kendaraan);
                $('.search').html("<i class='bi bi-search'></i> Cari Kendaraan");
                $('.search').prop('disabled', false);
                if (response.error) {
                    if (response.error.kode_wilayah_awal) {
                        $("#kode_wilayah_awal").addClass('is-invalid');
                        $(".error-kode-wilayah-awal").html(response.error.kode_wilayah_awal);
                    } else {
                        $("#kode_wilayah_awal").removeClass('is-invalid');
                        $(".error-kode-wilayah-awal").html('');
                    }

                    if (response.error.nomor_kendaraan) {
                        $("#nomor_kendaraan").addClass('is-invalid');
                        $(".error-nomor-kendaraan").html(response.error.nomor_kendaraan);
                    } else {
                        $("#nomor_kendaraan").removeClass('is-invalid');
                        $(".error-nomor-kendaraan").html('');
                    }

                    if (response.error.kode_wilayah_akhir) {
                        $("#kode_wilayah_akhir").addClass('is-invalid');
                        $(".error-kode-wilayah-akhir").html(response.error.kode_wilayah_akhir);
                    } else {
                        $("#kode_wilayah_akhir").removeClass('is-invalid');
                        $(".error-kode-wilayah-akhir").html('');
                    }

                } else {
                    if (response.data_penindakan.length > 0) {

                        $("#smallModal").modal('hide');
                        $("#viewModal").modal('show');

                        let data = '';
                        let no = 1;

                        response.data_penindakan.forEach(function(e) {
                            data += `<tr>
                                     <td> ${no++} </td>
                                     <td> ${e.kode_wilayah_awal} ${e.nomor_kendaraan} ${e.kode_wilayah_akhir} </td>
                                     <td> ${e.tanggal_penindakan}  </td>
                                     <td> ${e.ukpd} </td>
                                     <td> ${e.status_kendaraan} </td>
                                     <td> <a href="/admin/pengeluaran_kendaraan/form_insert/${e.nomor_bap}" id="data_button" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"> Lengkapi </i>
                                     </a> </td>
                                 </tr>`;
                        })

                        $("#data_penindakan_table").html(data);


                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: `Data Tidak Ditemukan`,
                        });
                        $('.search').html("<i class='bi bi-send'></i> Kirim");
                        $('.search').prop('disabled', false);
                    }
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: `Data Tidak Ditemukan`,
                });
                $('.search').html("<i class='bi bi-send'></i> Kirim");
                $('.search').prop('disabled', false);
            }
        });
    });

    $(document).on('click', "#delete", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/pengeluaran_kendaraan/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_delete").val(response.id);
            }
        });
    });

    $("#delete_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_delete").val();
        $.ajax({
            url: '/admin/pengeluaran_kendaraan/delete',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
            },
            beforeSend: function() {
                $('.button_delete').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.button_delete').prop('disabled', true);
            },
            success: function(response) {
                $('.button_delete').html('<i class="bi bi-trash"></i> Hapus');
                $('.button_delete').prop('disabled', false);
                Swal.fire({
                    icon: 'success',
                    title: `${response.success}`,
                });
                setTimeout(function() {
                    location.reload();
                }, 1000)
            },
            error: function(response) {
                $('.button_delete').html('<i class="bi bi-trash"></i> Delete');
                alert('Data Gagal di Hapus');
            }
        });
    });

    $(document).on('click', "#edit", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/pengeluaran_kendaraan/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                console.log(response);
                $("#id_edit").val(response.id);
                $("#data_penindakan_id").val(response.data_penindakan_id);
                $("#nomor_kendaraan_edit").val(`${response.kode_wilayah_awal} ${response.nomor_kendaraan} ${response.kode_wilayah_akhir}`);

                $("#nama_pemilik_edit").val(`${response.nama_pemilik}`);
                $("#ukpd_edit").val(`${response.ukpd}`);
                $("#tempat_penyimpanan_id_edit").val(`${response.tempat_penyimpanan}`);
                $("#jenis_kendaraan_edit").val(`${response.type_kendaraan}  - ${response.jenis_kendaraan}`);

                $("#nomor_surat_pengeluaran").val(response.nomor_surat_pengeluaran);
                $("#nomor_rangka").val(response.nomor_rangka);
                $("#nomor_mesin").val(response.nomor_mesin);
                $("#alamat_pemilik_kendaraan").val(response.alamat_pemilik_kendaraan);
                $("#tanggal_keluar").val(response.tanggal_keluar);
                $("#jenis_pelanggaran").val(response.jenis_pelanggaran);

                $("#status_kendaraan_id").val(response.status_kendaraan_id).trigger('change');
            }
        });
    });

    $("#edit_data").submit(function(e) {
        e.preventDefault();
        let id = $('#id_edit').val();
        let data_penindakan_id = $("#data_penindakan_id").val();
        let nomor_surat_pengeluaran = $('#nomor_surat_pengeluaran').val();
        let nomor_rangka = $('#nomor_rangka').val();
        let nomor_mesin = $('#nomor_mesin').val();
        let alamat_pemilik_kendaraan = $('#alamat_pemilik_kendaraan').val();
        let tanggal_keluar = $('#tanggal_keluar').val();
        let status_kendaraan_id = $('#status_kendaraan_id').val();


        $.ajax({
            url: '/admin/pengeluaran_kendaraan/update',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
                data_penindakan_id: data_penindakan_id,
                nomor_surat_pengeluaran: nomor_surat_pengeluaran,
                nomor_rangka: nomor_rangka,
                nomor_mesin: nomor_mesin,
                alamat_pemilik_kendaraan: alamat_pemilik_kendaraan,
                tanggal_keluar: tanggal_keluar,
                status_kendaraan_id: status_kendaraan_id,
            },
            beforeSend: function() {
                $('.update').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.update').prop('disabled', true);
            },
            success: function(response) {

                $('.update').html("<i class='bi bi-send'></i> Ubah");
                $('.update').prop('disabled', false);
                if (response.error) {

                    if (response.error.nomor_surat_pengeluaran) {
                        $("#nomor_surat_pengeluaran").addClass('is-invalid');
                        $(".error-nomor-surat-pengeluaran").html(response.error.nomor_surat_pengeluaran);
                    } else {
                        $("#nomor_surat_pengeluaran").removeClass('is-invalid');
                        $(".error-nomor-surat-pengeluaran").html('');
                    }

                    if (response.error.nomor_rangka) {
                        $("#nomor_rangka").addClass('is-invalid');
                        $(".error-nomor-rangka").html(response.error.nomor_rangka);
                    } else {
                        $("#nomor_rangka").removeClass('is-invalid');
                        $(".error-nomor-rangka").html('');
                    }

                    if (response.error.nomor_mesin) {
                        $("#nomor_mesin").addClass('is-invalid');
                        $(".error-nomor-mesin").html(response.error.nomor_mesin);
                    } else {
                        $("#nomor_mesin").removeClass('is-invalid');
                        $(".error-nomor-mesin").html('');
                    }

                    if (response.error.alamat_pemilik_kendaraan) {
                        $("#alamat_pemilik_kendaraan").addClass('is-invalid');
                        $(".error-alamat-pemilik-kendaraan").html(response.error.alamat_pemilik_kendaraan);
                    } else {
                        $("#alamat_pemilik_kendaraan").removeClass('is-invalid');
                        $(".error-alamat-pemilik-kendaraan").html('');
                    }

                    if (response.error.tanggal_keluar) {
                        $("#tanggal_keluar").addClass('is-invalid');
                        $(".error-tanggal-keluar").html(response.error.tanggal_keluar);
                    } else {
                        $("#tanggal_keluar").removeClass('is-invalid');
                        $(".error-tanggal-keluar").html('');
                    }

                    if (response.error.status_kendaraan_id) {
                        $("#status_kendaraan_id").addClass('is-invalid');
                        $(".error-status-kendaraan").html(response.error.status_kendaraan_id);
                    } else {
                        $("#status_kendaraan_id").removeClass('is-invalid');
                        $(".error-status-kendaraan").html('');
                    }


                } else {
                    Swal.fire({
                        icon: 'success',
                        title: `${response.success}`,
                    });
                    setTimeout(function() {
                        window.location.href = '/admin/pengeluaran_kendaraan/';
                    }, 1000)
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: `Data Belum Tersimpan!`,
                });
                $('.update').html("<i class='bi bi-send'></i> Ubah");
                $('.update').prop('disabled', false);
            }
        });
    });

    $(document).on('click', "#ajukan", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/pengeluaran_kendaraan/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#pengeluaran_kendaraan_id").val(response.id);
            }
        });
    });

    $("#form_ajukan_pengeluaran").submit(function(e) {
        e.preventDefault();
        let pengeluaran_kendaraan_id = $("#pengeluaran_kendaraan_id").val();
        let pengantar_sidang = $("#pengantar_sidang").val();
        let tanggal_pengantar = $("#tanggal_pengantar").val();

        let formData = new FormData(this);

        formData.append('pengeluaran_kendaraan_id', pengeluaran_kendaraan_id);
        formData.append('pengantar_sidang', pengantar_sidang);
        formData.append('tanggal_pengantar', tanggal_pengantar);

        $.ajax({
            url: '/admin/pengeluaran_kendaraan/upload_pengantar',
            data: formData,
            dataType: 'json',
            enctype: 'multipart/form-data',
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function() {
                $('.kirim').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $(".kirim").prop('disabled', true);
            },
            success: function(response) {
                $('.kirim').html("<i class='bi bi-send'></i> Kirim");
                $('.kirim').prop('disabled', false);

                if (response.error) {
                    if (response.error.pengantar_sidang) {
                        $("#pengantar_sidang").addClass('is-invalid');
                        $(".error-pengantar").html(response.error.pengantar_sidang);
                    } else {
                        $("#pengantar_sidang").removeClass('is-invalid');
                        $(".error-pengantar").html('');
                    }

                    if (response.error.tanggal_pengantar) {
                        $("#tanggal_pengantar").addClass('is-invalid');
                        $(".error-tanggal-pengantar").html(response.error.tanggal_pengantar);
                    } else {
                        $("#tanggal_pengantar").removeClass('is-invalid');
                        $(".error-tanggal-pengantar").html('');
                    }

                } else {
                    Swal.fire({
                        icon: 'success',
                        title: `${response.success}`,
                    });
                    setTimeout(function() {
                        window.location.href = '/admin/pengeluaran_kendaraan/';
                    }, 1000)
                }
            }
        })
    });
</script>
<?= $this->endSection(); ?>