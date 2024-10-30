<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/petugas/data_penindakan"><?= $title ?></a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title text-capitalize"><?= $title ?> <span>| Table </span></h5>

                                <div class="btn-group btn-sm" role="group" aria-label="Button group with nested dropdown">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-pencil-square"></i> Aksi
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#smallModal" data-bs-whatever="@mdo"><i class="bi bi-plus"></i> Tambah Data Penindakan</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <table class="table table-bordered datatable text-capitalize">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">UKPD</th>
                                            <th scope="col">Nomor Kendaraan</th>
                                            <th scope="col">Tanggal Penindakan</th>
                                            <th scope="col">Jenis Penindakan</th>
                                            <th scope="col">Tempat Penyimpanan</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($data_penindakan as $data_penindakan) : ?>
                                            <tr>
                                                <th scope="row"><a href="#"><?= $no++ ?></a></th>
                                                <td><?= $data_penindakan->ukpd ?></td>
                                                <td><?= $data_penindakan->kode_wilayah_awal ?> <?= $data_penindakan->nomor_kendaraan ?> <?= $data_penindakan->kode_wilayah_akhir ?> </td>
                                                <td><?= date('d-m-Y', strtotime($data_penindakan->tanggal_penindakan)) ?></td>
                                                <td><?= $data_penindakan->jenis_penindakan ?></td>
                                                <td><?= $data_penindakan->tempat_penyimpanan ?></td>
                                                <td>
                                                    <a href="/operator/data_penindakan/views/<?= $data_penindakan->nomor_bap ?>" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
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

<!-- Modal Tambah jenis_kendaraan -->
<div class="modal fade" id="smallModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah <?= $title ?> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tambah_data" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="ukpd_id" class="col-form-label">UKPD :</label>
                        <select name="ukpd_id" id="ukpd_id" class="form-select">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($ukpd as $ukpd) : ?>
                                <option value="<?= $ukpd->id ?>"><?= $ukpd->ukpd ?></option>
                            <?php endforeach; ?>
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
                                <div class="col-md-3">
                                    <input type="text" name="kode_wilayah_awal" id="kode_wilayah_awal" class="form-control" placeholder="B">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="nomor_kendaraan" id="nomor_kendaraan" class="form-control" placeholder="1234">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="kode_wilayah_akhir" id="kode_wilayah_akhir" class="form-control" placeholder="AA">
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-outline-primary btn-sm" id="cek_kendaraan"> <i class="bi bi-search"></i>Cek Kendaraan</button>
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
                            <?php foreach ($jenis_kendaraan as $jenis_kendaraan) : ?>
                                <option value="<?= $jenis_kendaraan->id ?>"><?= $jenis_kendaraan->jenis_kendaraan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-jenis-kendaraan">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type_kendaraan_id" class="col-form-label">Type Kendaraan :</label>
                        <select name="type_kendaraan_id" id="type_kendaraan_id" class="form-select" disabled>
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
                        <select name="kode_trayek" id="kode_trayek" class="form-select" disabled>
                            <option value="">--Silahkan Pilih--</option>
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
                            <?php foreach ($jenis_penindakan as $jenis_penindakan) : ?>
                                <option value="<?= $jenis_penindakan->id ?>"><?= $jenis_penindakan->jenis_penindakan ?></option>
                            <?php endforeach; ?>
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
                            <?php foreach ($lokasi_sidang as $lokasi_sidang) : ?>
                                <option value=" <?= $lokasi_sidang->id ?>"><?= $lokasi_sidang->lokasi_sidang ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-lokasi-sidang">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for=" tempat_penyimpanan_id" class="col-form-label">Tempat Penyimpanan :</label>
                        <select name="tempat_penyimpanan_id" id="tempat_penyimpanan_id" class="form-select text-uppercase">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($tempat_penyimpanan as $tempat_penyimpanan) : ?>
                                <option value="<?= $tempat_penyimpanan->id ?>"><?= $tempat_penyimpanan->tempat_penyimpanan ?></option>
                            <?php endforeach; ?>
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
                        <button type="submit" class="btn btn-primary save"> <i class="bi bi-send"></i> Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- End tambah Modal-->


<script src="/assets/vendor/jquery/jquery.js"></script>

<script>
    $(document).ready(function() {
        $('#ukpd_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });

        $('#jenis_kendaraan_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });

        $('#type_kendaraan_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });

        $('#kode_trayek').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });

        $('#warna_tnkb').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });

        $('#jenis_penindakan_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });

        $('#tempat_penyimpanan_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });

        $('#lokasi_sidang_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });
    });

    $(document).on('click', '#cek_kendaraan', function(e) {
        e.preventDefault();
        let kode_wilayah_awal = $("#kode_wilayah_awal").val();
        let nomor_kendaraan = $("#nomor_kendaraan").val();
        let kode_wilayah_akhir = $("#kode_wilayah_akhir").val();

        $.ajax({
            url: '/operator/data_penindakan/getDataKendaraan',
            method: 'get',
            dataType: 'JSON',
            // contentType: false,
            processData: true,
            data: {
                kode_wilayah_awal: kode_wilayah_awal,
                nomor_kendaraan: nomor_kendaraan,
                kode_wilayah_akhir: kode_wilayah_akhir,
            },
            beforeSend: function() {
                $('#cek_kendaraan').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('#cek_kendaraan').prop('disabled', true);
            },
            success: function(response) {
                $('#cek_kendaraan').html("<i class='bi bi-search'> </i> Cek Kendaraan");
                $('#cek_kendaraan').prop('disabled', false);
                $("#nama_pemilik").val(response.data_penindakan.nama_pemilik);
                $("#tahun_perakitan").val(response.data_penindakan.tahun_perakitan);
                $("#jenis_pelanggaran").val(response.data_penindakan.jenis_pelanggaran);
                $("#pasal_pelanggaran").val(response.data_penindakan.pasal_pelanggaran);
                $("#lokasi_penindakan").val(response.data_penindakan.lokasi_penindakan);
                $("#lokasi_penindakan").val(response.data_penindakan.lokasi_penindakan);
                $("#barang_bukti").val(response.data_penindakan.barang_bukti);
            }
        });

    });

    $("#jenis_kendaraan_id").change(function(e) {
        let jenis_kendaraan_id = $(this).val();
        $.ajax({
            url: '/operator/data_penindakan/getTypeKendaraan',
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



    $("#tambah_data").submit(function(e) {
        e.preventDefault();
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


        $.ajax({
            url: '/operator/data_penindakan/insert',
            method: 'post',
            dataType: 'JSON',
            data: {
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
                nama_petugas: nama_petugas
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