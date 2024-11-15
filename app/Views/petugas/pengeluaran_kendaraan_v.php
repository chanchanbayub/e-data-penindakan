<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/petugas/pengeluaran_kendaraan"><?= $title ?></a></li>

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
                                <h5 class="card-title"><?= $title ?> <span>| Table </span></h5>
                                <div class="btn-group btn-sm" role="group" aria-label="Button group with nested dropdown">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-pencil-square"></i> Aksi
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#smallModal" data-bs-whatever="@mdo"><i class="bi bi-plus"></i> Ajukan Pengeluaran Kendaraan</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <table class="table table-bordered datatable text-uppercase">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th>UKPD</th>
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
                                                <td> <?= $pengeluaran_kendaraan->ukpd ?> </td>
                                                <td> <?= $pengeluaran_kendaraan->kode_wilayah_awal ?> <?= $pengeluaran_kendaraan->nomor_kendaraan ?> <?= $pengeluaran_kendaraan->kode_wilayah_akhir ?> </td>
                                                <td> <?= date('d-m-Y', strtotime($pengeluaran_kendaraan->tanggal_penindakan)) ?> </td>
                                                <td> <?= date('d-m-Y', strtotime($pengeluaran_kendaraan->tanggal_keluar)) ?></td>
                                                <?php if (session()->get('ukpd_id') == 1) : ?>
                                                    <td><span class="badge <?= ($pengeluaran_kendaraan->status_kendaraan_id) == 2 ? "bg-success" : "bg-warning"  ?> "><?= $pengeluaran_kendaraan->status_kendaraan ?></span></td>
                                                <?php else : ?>
                                                    <td><span class="badge <?= ($pengeluaran_kendaraan->status_kendaraan_id) == 2 ? "bg-success" : "bg-warning"  ?> "><?= $pengeluaran_kendaraan->status_kendaraan ?></span></td>
                                                <?php endif; ?>
                                                <td>
                                                    <?php if (session()->get('ukpd_id') != 1) : ?>
                                                        <?php if ($pengeluaran_kendaraan->status_kendaraan_id == 3) :  ?>
                                                            <?php if ($pengeluaran_kendaraan->pengantar_sidang == null) : ?>
                                                                <a href="/petugas/cetak_pengantar/<?= $pengeluaran_kendaraan->id ?>" class="btn btn-sm btn-outline-primary" target="_blank">
                                                                    <i class="bi bi-file-pdf"></i>
                                                                </a>
                                                                <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#pengantarModal" id="ajukan" data-id="<?= $pengeluaran_kendaraan->id ?>">
                                                                    <i class="bi bi-file-pdf">Ajukan</i>
                                                                </button>
                                                            <?php else : ?>
                                                                <a href="/pengantar_sidang/<?= $pengeluaran_kendaraan->pengantar_sidang ?>" class="btn btn-sm btn-outline-primary" target="_blank">
                                                                    <i class="bi bi-eye"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                        <?php elseif ($pengeluaran_kendaraan->status_kendaraan_id == 4 || $pengeluaran_kendaraan->status_kendaraan_id == 2) : ?>
                                                            <?php if ($pengeluaran_kendaraan->pengantar_sidang != null) : ?>
                                                                <a href="/petugas/cetak_pdf/<?= $pengeluaran_kendaraan->id ?>" class="btn btn-sm btn-outline-success" target="_blank">
                                                                    <i class="bi bi-file-pdf"></i>
                                                                </a>
                                                                <a href="/pengantar_sidang/<?= $pengeluaran_kendaraan->pengantar_sidang ?>" class="btn btn-sm btn-outline-primary" target="_blank">
                                                                    <i class="bi bi-eye"></i>
                                                                </a>
                                                            <?php else : ?>
                                                                <a href="/petugas/cetak_pdf/<?= $pengeluaran_kendaraan->id ?>" class="btn btn-sm btn-outline-success" target="_blank">
                                                                    <i class="bi bi-file-pdf"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php elseif (session()->get('ukpd_id') == 1) : ?>
                                                        <?php if ($pengeluaran_kendaraan->status_kendaraan_id == 4) : ?>
                                                            <?php if ($pengeluaran_kendaraan->pengantar_sidang != null) : ?>
                                                                <a href="/pengantar_sidang/<?= $pengeluaran_kendaraan->pengantar_sidang ?>" class="btn btn-sm btn-outline-primary" target="_blank">
                                                                    <i class="bi bi-eye"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                        <?php elseif ($pengeluaran_kendaraan->status_kendaraan_id == 1) : ?>
                                                            <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#pengantarModal" id="ajukan" data-id="<?= $pengeluaran_kendaraan->id ?>">
                                                                <i class="bi bi-file-pdf">Ajukan</i>
                                                            </button>
                                                        <?php elseif ($pengeluaran_kendaraan->status_kendaraan_id == 2 || $pengeluaran_kendaraan->status_kendaraan_id == 5) : ?>
                                                            <?php if ($pengeluaran_kendaraan->pengantar_sidang != null) : ?>
                                                                <a href="/pengantar_sidang/<?= $pengeluaran_kendaraan->pengantar_sidang ?>" class="btn btn-sm btn-outline-primary" target="_blank">
                                                                    <i class="bi bi-eye"></i>
                                                                </a>
                                                                <a href="/petugas/cetak_pdf/<?= $pengeluaran_kendaraan->id ?>" class="btn btn-sm btn-outline-success" target="_blank">
                                                                    <i class="bi bi-file-pdf"></i>
                                                                </a>
                                                            <?php elseif ($pengeluaran_kendaraan->pengantar_sidang == null) : ?>
                                                                <a href="/petugas/cetak_pdf/<?= $pengeluaran_kendaraan->id ?>" class="btn btn-sm btn-outline-success" target="_blank">
                                                                    <i class="bi bi-file-pdf"></i>
                                                                </a>
                                                            <?php endif; ?>
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
                        <label for="pengantar_sidang" class="col-form-label">Upload Pengantar & Kwitansi Sidang (PDF) Max (2MB) :</label>
                        <input type="file" name="pengantar_sidang" id="pengantar_sidang" class="form-control">
                        <div class="invalid-feedback error-pengantar">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_pengantar" class="col-form-label">Tanggal Surat Pengantar Atau Kwitansi Sidang :</label>
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

<script src="/assets/vendor/jquery/jquery.js">
</script>


<script>
    $(document).ready(function(e) {
        $('#status_kendaraan_id').select2({
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
            url: '/petugas/pengeluaran_kendaraan/search',
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
                                     <td> <a href="/petugas/pengeluaran_kendaraan/form_insert/${e.nomor_bap}" id="data_button" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"> Lengkapi </i>
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

    $(document).on('click', "#ajukan", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/petugas/pengeluaran_kendaraan/edit',
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
            url: '/petugas/pengeluaran_kendaraan/upload_pengantar',
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
                        window.location.href = '/petugas/pengeluaran_kendaraan/';
                    }, 1000)
                }
            }
        })
    });
</script>
<?= $this->endSection(); ?>