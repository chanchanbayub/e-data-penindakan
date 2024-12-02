<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">

                <li class="breadcrumb-item">PAGES</li>
                <li class="breadcrumb-item"><a href="/operator/data_penindakan">KEMBALI</a></li>
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
                                        <?php if ($data_penindakan->jenis_penindakan_id == 1) : ?>
                                            <div class="col-lg-9 col-md-8"><span class="badge bg-danger"><?= $data_penindakan->status_kendaraan ?></span></div>
                                        <?php else : ?>
                                            <div class="col-lg-9 col-md-8"><span class="badge bg-danger">Tilang Dishub</span></div>
                                        <?php endif; ?>
                                    <?php elseif ($data_penindakan->status_kendaraan_id == 2) : ?>
                                        <div class="col-lg-9 col-md-8"> <span class="badge bg-success"><?= $data_penindakan->status_kendaraan ?> </span></div>
                                    <?php elseif ($data_penindakan->status_kendaraan_id == 3 || $data_penindakan->status_kendaraan_id == 4 || $data_penindakan->status_kendaraan_id == 5) : ?>
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
                                    <?php if ($data_penindakan->status_kendaraan_id == 1 || $data_penindakan->status_kendaraan_id == 3) : ?>
                                        <button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $data_penindakan->id ?>" type="button">
                                            <i class="bi bi-pencil-square"> Edit Data</i>
                                        </button>
                                    <?php else : ?>
                                        <button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $data_penindakan->id ?>" type="button" disabled>
                                            <i class="bi bi-pencil-square"> Edit Data</i>
                                        </button>
                                    <?php endif; ?>
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
                <form id="edit_data" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" name="status_kendaraan_id" id="status_kendaraan_id" class="form-control">
                        <input type="hidden" name="id" id="id_edit" class="form-control">
                        <label for="ukpd_id" class="col-form-label">UKPD :</label>
                        <select name="ukpd_id" id="ukpd_id" class="form-select">
                            <option value="">--Silahkan Pilih--</option>

                        </select>
                        <div class="invalid-feedback error-ukpd">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nomor_bap" class="col-form-label">Nomor BAP :</label>
                        <input type="number" name="nomor_bap" id="nomor_bap" class="form-control">
                        <div class="invalid-feedback error-nomor-bap">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kode_wilayah_awal" class="col-form-label">Nomor Kendaraan :</label>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="kode_wilayah_awal" id="kode_wilayah_awal" class="form-control" placeholder="B">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="nomor_kendaraan" id="nomor_kendaraan" class="form-control" placeholder="1234">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="kode_wilayah_akhir" id="kode_wilayah_akhir" class="form-control" placeholder="AA">
                                </div>

                            </div>

                        </div>

                        <span class="invalid-feedback error-kode-wilayah-awal"></span>
                        <span class="invalid-feedback error-nomor-kendaraan"></span>
                        <span class="invalid-feedback error-kode-wilayah-akhir"></span>

                    </div>

                    <div class="form-group">
                        <label for="nama_pemilik" class="col-form-label">Nama Pemilik / Koperasi / Perusahaan:</label>
                        <input type="text" name="nama_pemilik" id="nama_pemilik" class="form-control">
                        <div class="invalid-feedback error-nama-pemilik">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kendaraan_id" class="col-form-label">Jenis Kendaraan :</label>
                        <select name="jenis_kendaraan_id" id="jenis_kendaraan_id" class="form-select">
                            <option value="">--Silahkan Pilih--</option>

                        </select>
                        <div class="invalid-feedback error-jenis-kendaraan">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type_kendaraan_id" class="col-form-label">Type Kendaraan :</label>
                        <select name="type_kendaraan_id" id="type_kendaraan_id" class="form-select">
                            <option value="">--Silahkan Pilih--</option>
                        </select>
                        <div class="invalid-feedback error-type-kendaraan">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tahun_perakitan" class="col-form-label">Tahun Perakitan : </label>
                        <input type="number" name="tahun_perakitan" id="tahun_perakitan" class="form-control">
                        <div class="invalid-feedback error-tahun-perakitan">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kode_trayek" class="col-form-label">Kode Trayek :</label>
                        <select name="kode_trayek" id="kode_trayek" class="form-select">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($kode_trayek as $kode_trayek) : ?>
                                <option value="<?= $kode_trayek->id ?>"><?= $kode_trayek->kode_trayek ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-kode-trayek">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="warna_tnkb" class="col-form-label">Warna TNKB :</label>
                        <select name="warna_tnkb" id="warna_tnkb" class="form-select">
                            <option value="">--Silahkan Pilih--</option>
                            <option value="1">Kuning</option>
                            <option value="2">Hitam / Putih</option>
                        </select>
                        <div class="invalid-feedback error-warna-tnkb">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jenis_pelanggaran" class="col-form-label">Jenis Pelanggaran :</label>
                        <input type="text" name="jenis_pelanggaran" id="jenis_pelanggaran" class="form-control">
                        <div class="invalid-feedback error-jenis-pelanggaran">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pasal_pelanggaran" class="col-form-label">Pasal Pelanggaran :</label>
                        <input type="text" name="pasal_pelanggaran" id="pasal_pelanggaran" class="form-control">
                        <div class="invalid-feedback error-pasal-pelanggaran">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lokasi_penindakan" class="col-form-label">Lokasi Penindakan :</label>
                        <input type="text" name="lokasi_penindakan" id="lokasi_penindakan" class="form-control">
                        <div class="invalid-feedback error-lokasi-penindakan">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jenis_penindakan_id" class="col-form-label">Jenis Penindakan :</label>
                        <select name="jenis_penindakan_id" id="jenis_penindakan_id" class="form-select">
                            <option value="">--Silahkan Pilih--</option>

                        </select>
                        <div class="invalid-feedback error-jenis-penindakan">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="barang_bukti" class="col-form-label">Barang Bukti :</label>
                        <input type="text" name="barang_bukti" id="barang_bukti" class="form-control">
                        <div class="invalid-feedback error-barang-bukti">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_penindakan" class="col-form-label">Tanggal Penindakan :</label>
                        <input type="date" name="tanggal_penindakan" id="tanggal_penindakan" class="form-control">
                        <div class="invalid-feedback error-tanggal-penindakan">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_sidang" class="col-form-label">Tanggal Sidang :</label>
                        <input type="date" name="tanggal_sidang" id="tanggal_sidang" class="form-control">
                        <div class="invalid-feedback error-tanggal-sidang">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lokasi_sidang_id" class="col-form-label">Lokasi Sidang :</label>
                        <select name="lokasi_sidang_id" id="lokasi_sidang_id" class="form-select">
                            <option value="">--Silahkan Pilih--</option>

                        </select>
                        <div class="invalid-feedback error-lokasi-sidang">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tempat_penyimpanan_id" class="col-form-label">Tempat Penyimpanan :</label>
                        <select name="tempat_penyimpanan_id" id="tempat_penyimpanan_id" class="form-select text-capitalize">
                            <option value="">--Silahkan Pilih--</option>

                        </select>
                        <div class="invalid-feedback error-tempat-penyimpanan">

                        </div>
                    </div>


                    <div class="form-group">
                        <label for="nama_petugas" class="col-form-label">Nama Petugas :</label>
                        <input type="text" name="nama_petugas" id="nama_petugas" class="form-control">
                        <div class="invalid-feedback error-nama-petugas">

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-primary ubah"> <i class="bi bi-send"></i> Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Modal -->

<script src="/assets/vendor/jquery/jquery.js"></script>

<script>
    $(document).ready(function() {
        $('#ukpd_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')

        });

        $('#jenis_kendaraan_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });

        $('#type_kendaraan_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });

        $('#kode_trayek').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });

        $('#warna_tnkb').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });

        $('#jenis_penindakan_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });

        $('#tempat_penyimpanan_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });

        $('#lokasi_sidang_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });


    });

    $(document).on('click', "#edit", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/petugas/data_penindakan/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {

                $("#id_edit").val(response.data_penindakan.id);
                $("#nomor_bap").val(response.data_penindakan.nomor_bap);
                $("#kode_wilayah_awal").val(response.data_penindakan.kode_wilayah_awal);
                $("#nomor_kendaraan").val(response.data_penindakan.nomor_kendaraan);
                $("#kode_wilayah_akhir").val(response.data_penindakan.kode_wilayah_akhir);
                $("#nama_pemilik").val(response.data_penindakan.nama_pemilik);
                $("#tahun_perakitan").val(response.data_penindakan.tahun_perakitan);
                $("#jenis_pelanggaran").val(response.data_penindakan.jenis_pelanggaran);
                $("#pasal_pelanggaran").val(response.data_penindakan.pasal_pelanggaran);
                $("#lokasi_penindakan").val(response.data_penindakan.lokasi_penindakan);
                $("#tanggal_penindakan").val(response.data_penindakan.tanggal_penindakan);
                $("#tanggal_sidang").val(response.data_penindakan.tanggal_sidang);
                $("#nama_petugas").val(response.data_penindakan.nama_petugas);
                $("#barang_bukti").val(response.data_penindakan.barang_bukti);
                $("#status_kendaraan_id").val(response.data_penindakan.status_kendaraan_id);

                let ukpd_data = `<option value="">--Silahkan Pilih--</option>`;
                response.ukpd.forEach(function(e) {
                    ukpd_data += `<option value="${e.id}">${e.ukpd}</option>`;
                });

                $("#ukpd_id").html(ukpd_data);

                $("#ukpd_id").val(response.data_penindakan.ukpd_id).trigger('change');

                $("#warna_tnkb").val(response.data_penindakan.warna_tnkb).trigger('change');

                let tempat_penyimpanan_data = `<option value="">--Silahkan Pilih--</option>`;
                response.tempat_penyimpanan.forEach(function(e) {
                    tempat_penyimpanan_data += `<option value="${e.id}">${e.tempat_penyimpanan}</option>`;
                });

                $("#tempat_penyimpanan_id").html(tempat_penyimpanan_data);

                $("#tempat_penyimpanan_id").val(response.data_penindakan.tempat_penyimpanan_id).trigger('change');

                let jenis_penindakan_data = `<option value="">--Silahkan Pilih--</option>`;
                response.jenis_penindakan.forEach(function(e) {
                    jenis_penindakan_data += `<option value="${e.id}">${e.jenis_penindakan}</option>`;
                });

                $("#jenis_penindakan_id").html(jenis_penindakan_data);

                $("#jenis_penindakan_id").val(response.data_penindakan.jenis_penindakan_id).trigger('change');

                let lokasi_sidang_data = `<option value="">--Silahkan Pilih--</option>`;
                response.lokasi_sidang.forEach(function(e) {
                    lokasi_sidang_data += `<option value="${e.id}">${e.lokasi_sidang}</option>`;
                });

                $("#lokasi_sidang_id").html(lokasi_sidang_data);

                $("#lokasi_sidang_id").val(response.data_penindakan.lokasi_sidang_id).trigger('change');

                let jenis_kendaraan_data = `<option value="">--Silahkan Pilih--</option>`;
                response.jenis_kendaraan.forEach(function(e) {
                    jenis_kendaraan_data += `<option value="${e.id}">${e.jenis_kendaraan}</option>`;
                });

                $("#jenis_kendaraan_id").html(jenis_kendaraan_data);

                $("#jenis_kendaraan_id").val(response.data_penindakan.jenis_kendaraan_id).trigger('change');

                let type_kendaraan_data = `<option value="">--Silahkan Pilih--</option>`;
                response.type_kendaraan.forEach(function(e) {
                    type_kendaraan_data += `<option value="${e.id}">${e.type_kendaraan}</option>`;
                });

                $("#type_kendaraan_id").html(type_kendaraan_data);

                $("#type_kendaraan_id").val(response.data_penindakan.type_kendaraan_id).trigger('change');

                let kode_trayek_data = `<option value="">--Silahkan Pilih--</option>`;
                response.kode_trayek.forEach(function(e) {
                    kode_trayek_data += `<option value="${e.kode_trayek}" selected>${e.kode_trayek}</option>`;
                });

                $("#kode_trayek").html(kode_trayek_data);

                $("#kode_trayek").val(response.data_penindakan.kode_trayek).trigger('change');

            }
        });
    });

    $("#jenis_kendaraan_id").change(function(e) {
        let jenis_kendaraan_id = $(this).val();
        $.ajax({
            url: '/petugas/data_penindakan/getTypeKendaraan',
            method: 'get',
            dataType: 'JSON',
            data: {
                jenis_kendaraan_id: jenis_kendaraan_id,
            },
            success: function(response) {
                let type_kendaraan_data = `<option value="">--Silahkan Pilih--</option>`;

                if (response.type_kendaraan.length >= 1) {
                    response.type_kendaraan.forEach(function(e) {
                        $('#type_kendaraan_id').prop('disabled', false);
                        type_kendaraan_data += `<option value="${e.id}">${e.type_kendaraan}</option>`;
                    })
                } else {
                    $('#type_kendaraan_id').prop('disabled', true);
                }
                $("#type_kendaraan_id").html(type_kendaraan_data);


                let kode_trayek_data = `<option value="">--Silahkan Pilih--</option>`;

                if (response.kode_trayek.length >= 1) {
                    response.kode_trayek.forEach(function(e) {
                        $('#kode_trayek').prop('disabled', false);
                        kode_trayek_data += `<option value="${e.kode_trayek}">${e.kode_trayek}</option>`;
                    })
                } else {
                    $('#kode_trayek').prop('disabled', true);
                }
                $("#kode_trayek").html(kode_trayek_data);
            }
        });

    });

    $("#edit_data").submit(function(e) {
        e.preventDefault();
        let id = $('#id_edit').val();
        let ukpd_id = $('#ukpd_id').val();
        let nomor_bap = $('#nomor_bap').val();
        let nama_pemilik = $('#nama_pemilik').val();
        let type_kendaraan_id = $('#type_kendaraan_id').val();
        let tahun_perakitan = $('#tahun_perakitan').val();
        let jenis_kendaraan_id = $('#jenis_kendaraan_id').val();
        let kode_trayek = $('#kode_trayek').val();
        let warna_tnkb = $('#warna_tnkb').val();
        let kode_wilayah_awal = $('#kode_wilayah_awal').val();
        let nomor_kendaraan = $('#nomor_kendaraan').val();
        let kode_wilayah_akhir = $('#kode_wilayah_akhir').val();
        let jenis_pelanggaran = $('#jenis_pelanggaran').val();
        let pasal_pelanggaran = $('#pasal_pelanggaran').val();

        let lokasi_penindakan = $('#lokasi_penindakan').val();

        let jenis_penindakan_id = $('#jenis_penindakan_id').val();
        let barang_bukti = $('#barang_bukti').val();
        let tanggal_penindakan = $('#tanggal_penindakan').val();

        let tanggal_sidang = $('#tanggal_sidang').val();
        let lokasi_sidang_id = $('#lokasi_sidang_id').val();
        let tempat_penyimpanan_id = $('#tempat_penyimpanan_id').val();

        let nama_petugas = $('#nama_petugas').val();
        let status_kendaraan_id = $('#status_kendaraan_id').val();

        $.ajax({
            url: '/operator/data_penindakan/update',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
                ukpd_id: ukpd_id,
                nomor_bap: nomor_bap,
                nama_pemilik: nama_pemilik,
                type_kendaraan_id: type_kendaraan_id,
                tahun_perakitan: tahun_perakitan,
                jenis_kendaraan_id: jenis_kendaraan_id,
                kode_trayek: kode_trayek,
                warna_tnkb: warna_tnkb,
                kode_wilayah_awal: kode_wilayah_awal,
                nomor_kendaraan: nomor_kendaraan,
                kode_wilayah_akhir: kode_wilayah_akhir,
                jenis_pelanggaran: jenis_pelanggaran,
                pasal_pelanggaran: pasal_pelanggaran,
                lokasi_penindakan: lokasi_penindakan,
                jenis_penindakan_id: jenis_penindakan_id,
                barang_bukti: barang_bukti,
                tanggal_penindakan: tanggal_penindakan,
                tanggal_sidang: tanggal_sidang,
                lokasi_sidang_id: lokasi_sidang_id,
                tempat_penyimpanan_id: tempat_penyimpanan_id,
                nama_petugas: nama_petugas,
                status_kendaraan_id: status_kendaraan_id
            },
            beforeSend: function() {
                $('.save').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.save').prop('disabled', true);
            },
            success: function(response) {

                $('.save').html("<i class='bi bi-send'></i> Kirim");
                $('.save').prop('disabled', false);
                if (response.error) {
                    if (response.error.ukpd_id) {
                        $("#ukpd_id").addClass('is-invalid');
                        $(".error-ukpd").html(response.error.ukpd_id);
                    } else {
                        $("#ukpd_id").removeClass('is-invalid');
                        $(".error-ukpd").html('');
                    }

                    if (response.error.nomor_bap) {
                        $("#nomor_bap").addClass('is-invalid');
                        $(".error-nomor-bap").html(response.error.nomor_bap);
                    } else {
                        $("#nomor_bap").removeClass('is-invalid');
                        $(".error-nomor-bap").html('');
                    }

                    if (response.error.nama_pemilik) {
                        $("#nama_pemilik").addClass('is-invalid');
                        $(".error-nama-pemilik").html(response.error.nama_pemilik);
                    } else {
                        $("#nama_pemilik").removeClass('is-invalid');
                        $(".error-nama-pemilik").html('');
                    }

                    if (response.error.type_kendaraan_id) {
                        $("#type_kendaraan_id").addClass('is-invalid');
                        $(".error-type-kendaraan").html(response.error.type_kendaraan_id);
                    } else {
                        $("#type_kendaraan_id").removeClass('is-invalid');
                        $(".error-type-kendaraan").html('');
                    }

                    if (response.error.tahun_perakitan) {
                        $("#tahun_perakitan").addClass('is-invalid');
                        $(".error-tahun-perakitan").html(response.error.tahun_perakitan);
                    } else {
                        $("#tahun_perakitan").removeClass('is-invalid');
                        $(".error-tahun-perakitan").html('');
                    }
                    if (response.error.jenis_kendaraan_id) {
                        $("#jenis_kendaraan_id").addClass('is-invalid');
                        $(".error-jenis-kendaraan").html(response.error.jenis_kendaraan_id);
                    } else {
                        $("#jenis_kendaraan_id").removeClass('is-invalid');
                        $(".error-jenis-kendaraan").html('');
                    }

                    if (response.error.kode_trayek) {
                        $("#kode_trayek").addClass('is-invalid');
                        $(".error-kode-trayek").html(response.error.kode_trayek);
                    } else {
                        $("#kode_trayek").removeClass('is-invalid');
                        $(".error-kode-trayek").html('');
                    }

                    if (response.error.warna_tnkb) {
                        $("#warna_tnkb").addClass('is-invalid');
                        $(".error-warna-tnkb").html(response.error.warna_tnkb);
                    } else {
                        $("#warna_tnkb").removeClass('is-invalid');
                        $(".error-warna-tnkb").html('');
                    }

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

                    if (response.error.jenis_pelanggaran) {
                        $("#jenis_pelanggaran").addClass('is-invalid');
                        $(".error-jenis-pelanggaran").html(response.error.jenis_pelanggaran);
                    } else {
                        $("#jenis_pelanggaran").removeClass('is-invalid');
                        $(".error-jenis-pelanggaran").html('');
                    }

                    if (response.error.pasal_pelanggaran) {
                        $("#pasal_pelanggaran").addClass('is-invalid');
                        $(".error-pasal-pelanggaran").html(response.error.pasal_pelanggaran);
                    } else {
                        $("#pasal_pelanggaran").removeClass('is-invalid');
                        $(".error-pasal-pelanggaran").html('');
                    }

                    if (response.error.lokasi_penindakan) {
                        $("#lokasi_penindakan").addClass('is-invalid');
                        $(".error-lokasi-penindakan").html(response.error.lokasi_penindakan);
                    } else {
                        $("#lokasi_penindakan").removeClass('is-invalid');
                        $(".error-lokasi-penindakan").html('');
                    }

                    if (response.error.jenis_penindakan_id) {
                        $("#jenis_penindakan_id").addClass('is-invalid');
                        $(".error-jenis-penindakan").html(response.error.jenis_penindakan_id);
                    } else {
                        $("#jenis_penindakan_id").removeClass('is-invalid');
                        $(".error-jenis-penindakan").html('');
                    }

                    if (response.error.barang_bukti) {
                        $("#barang_bukti").addClass('is-invalid');
                        $(".error-barang-bukti").html(response.error.barang_bukti);
                    } else {
                        $("#barang_bukti").removeClass('is-invalid');
                        $(".error-barang-bukti").html('');
                    }

                    if (response.error.tanggal_penindakan) {
                        $("#tanggal_penindakan").addClass('is-invalid');
                        $(".error-tanggal-penindakan").html(response.error.tanggal_penindakan);
                    } else {
                        $("#tanggal_penindakan").removeClass('is-invalid');
                        $(".error-tanggal-penindakan").html('');
                    }

                    if (response.error.tanggal_sidang) {
                        $("#tanggal_sidang").addClass('is-invalid');
                        $(".error-tanggal-sidang").html(response.error.tanggal_sidang);
                    } else {
                        $("#tanggal_sidang").removeClass('is-invalid');
                        $(".error-tanggal-sidang").html('');
                    }
                    if (response.error.lokasi_sidang_id) {
                        $("#lokasi_sidang_id").addClass('is-invalid');
                        $(".error-lokasi-sidang").html(response.error.lokasi_sidang_id);
                    } else {
                        $("#lokasi_sidang_id").removeClass('is-invalid');
                        $(".error-lokasi-sidang").html('');
                    }
                    if (response.error.tempat_penyimpanan_id) {
                        $("#tempat_penyimpanan_id").addClass('is-invalid');
                        $(".error-tempat-penyimpanan").html(response.error.tempat_penyimpanan_id);
                    } else {
                        $("#tempat_penyimpanan_id").removeClass('is-invalid');
                        $(".error-tempat-penyimpanan").html('');
                    }
                    if (response.error.alamat_pemilik_kendaraan) {
                        $("#alamat_pemilik_kendaraan").addClass('is-invalid');
                        $(".error-alamat-pemilik-kendaraan").html(response.error.alamat_pemilik_kendaraan);
                    } else {
                        $("#alamat_pemilik_kendaraan").removeClass('is-invalid');
                        $(".error-alamat-pemilik-kendaraan").html('');
                    }
                    if (response.error.nama_petugas) {
                        $("#nama_petugas").addClass('is-invalid');
                        $(".error-nama-petugas").html(response.error.nama_petugas);
                    } else {
                        $("#nama_petugas").removeClass('is-invalid');
                        $(".error-nama-petugas").html('');
                    }

                } else {
                    Swal.fire({
                        icon: 'success',
                        title: `${response.success}`,
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 1000)
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: `Data Belum Tersimpan!`,
                });
                $('.save').html("<i class='bi bi-send'></i> Kirim");
                $('.save').prop('disabled', false);
            }
        });
    });
</script>


<?= $this->endSection(); ?>