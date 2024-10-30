<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">

                <li class="breadcrumb-item">PAGES</li>
                <li class="breadcrumb-item"><a href="/verifikator/data_penindakan">KEMBALI</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">


            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Data Penindakan</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Data Penindakan</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">UKPD</div>
                                    <div class="col-lg-9 col-md-8"><?= $data_penindakan->ukpd ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jenis Penindakan</div>
                                    <div class="col-lg-9 col-md-8"><?= $data_penindakan->jenis_penindakan ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Petugas Penindak</div>
                                    <div class="col-lg-9 col-md-8"><?= $data_penindakan->nama_petugas ?> </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nomor BAP</div>
                                    <div class="col-lg-9 col-md-8"><?= $data_penindakan->nomor_bap ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nama Jalan</div>
                                    <div class="col-lg-9 col-md-8"><?= $data_penindakan->lokasi_penindakan ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tanggal Penindakan</div>
                                    <div class="col-lg-9 col-md-8"> <?= date('Y-m-d', strtotime($data_penindakan->tanggal_penindakan)) ?> </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tanggal Sidang</div>
                                    <div class="col-lg-9 col-md-8"><?= date('Y-m-d', strtotime($data_penindakan->tanggal_sidang)) ?> </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Lokasi Sidang</div>
                                    <div class="col-lg-9 col-md-8"><?= $data_penindakan->lokasi_sidang ?> </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tempat Penyimpanan</div>
                                    <div class="col-lg-9 col-md-8"><?= $data_penindakan->tempat_penyimpanan ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jenis Pelanggaran</div>
                                    <div class="col-lg-9 col-md-8"><?= $data_penindakan->jenis_pelanggaran ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jumlah Penindakan</div>
                                    <div class="col-lg-9 col-md-8"><?= $jumlah_penindakan ?> kali</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Status Penindakan</div>
                                    <?php if ($data_penindakan->status_kendaraan_id == 1) : ?>
                                        <div class="col-lg-9 col-md-8"><span class="badge bg-danger"><?= $data_penindakan->status_kendaraan ?></span></div>
                                    <?php elseif ($data_penindakan->status_kendaraan_id == 2) : ?>
                                        <div class="col-lg-9 col-md-8"> <span class="badge bg-success"><?= $data_penindakan->status_kendaraan ?> </span></div>
                                    <?php elseif ($data_penindakan->status_kendaraan_id == 3) : ?>
                                        <div class="col-lg-9 col-md-8"> <span class="badge bg-warning"><?= $data_penindakan->status_kendaraan ?> </span></div>
                                    <?php endif; ?>
                                </div>

                                <h5 class="card-title">Data Kendaraan</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label"> Jenis Kendaraan</div>
                                    <div class="col-lg-9 col-md-8"><?= $data_penindakan->type_kendaraan ?> - <?= $data_penindakan->jenis_kendaraan ?> </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nomor Kendaraan</div>
                                    <div class="col-lg-9 col-md-8"><?= $data_penindakan->kode_wilayah_awal ?> <?= $data_penindakan->nomor_kendaraan ?> <?= $data_penindakan->kode_wilayah_akhir ?> </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Kode Trayek</div>
                                    <div class="col-lg-9 col-md-8"><?= $data_penindakan->kode_trayek ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tahun Perakitan</div>
                                    <div class="col-lg-9 col-md-8"><?= $data_penindakan->tahun_perakitan ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Usia Kendaraan</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?php if ($data_penindakan->tahun_perakitan == intval('-')) : ?>
                                            <span> Usia Kendaraan Tidak Diketahui </span>
                                        <?php elseif (date('Y') - intval($data_penindakan->tahun_perakitan)  < 10) : ?>
                                            <span> Usia Kendaraan Kurang dari 10 Tahun </span>
                                        <?php else : ?>
                                            <span class="text-danger"> Usia Kendaraan lebih dari 10 Tahun </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <h5 class="card-title">Pemilik Kendaraan</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nama Pemilik </div>
                                    <div class="col-lg-9 col-md-8"><?= $data_penindakan->nama_pemilik ?></div>
                                </div>

                                <hr>
                                <div class="row">
                                    <button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $data_penindakan->id ?>" type="button">
                                        <i class="bi bi-pencil-square"> Edit Data</i>
                                    </button>
                                </div>
                            </div>
                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- Modal Edit jenis_kendaraan -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit <?= $title ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_jenis_kendaraan" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_edit" name="id">
                        <label for="jenis_kendaraan" class="col-form-label">jenis_kendaraan:</label>
                        <input type="text" class="form-control" id="jenis_kendaraan_edit" name="jenis_kendaraan">
                        <div class="invalid-feedback error-jenis_kendaraan-edit">

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
<!-- End Edit Modal -->

<script src="/assets/vendor/jquery/jquery.js"></script>

<script>
    $(document).on('click', "#edit", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/data_penindakan/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_edit").val(response.id);
                // $("#jenis_kendaraan_edit").val(response.jenis_kendaraan);

            }
        });
    });
</script>


<?= $this->endSection(); ?>