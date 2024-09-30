<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/kode_trayek"><?= $title ?></a></li>
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

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Aksi</h6>
                                    </li>
                                    <li><a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#smallModal" data-bs-whatever="@mdo"><i class="bi bi-plus"></i> Tambah Kode Trayek</a></li>

                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title text-capitalize"><?= $title ?> <span>| Table </span></h5>
                                <table class="table table-bordered datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Jenis Kendaraan</th>
                                            <th scope="col">Kode Trayek</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($kode_trayek as $kode_trayek) : ?>
                                            <tr>
                                                <th scope="row"><a href="#"><?= $no++ ?></a></th>
                                                <td><?= $kode_trayek->jenis_kendaraan ?></td>
                                                <td><?= $kode_trayek->kode_trayek ?></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $kode_trayek->id ?>" type="button">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $kode_trayek->id ?>" type="button">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
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
                <form id="tambah_kode_trayek" autocomplete="off">
                    <?= csrf_field(); ?>
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
                        <label for="kode_trayek" class="col-form-label"><?= $title ?>:</label>
                        <input type="text" name="kode_trayek" id="kode_trayek" class="form-control" placeholder="M20">
                        <div class="invalid-feedback error-kode-trayek">

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

<!-- Modal hapus jenis_kendaraan -->
<div class="modal fade" id="deleteModal" tabindex="0">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Kode Trayek</h5>
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
                        <label for="jenis_kendaraan_id_edit" class="col-form-label">Jenis Kendaraan :</label>
                        <select name="jenis_kendaraan_id_edit" id="jenis_kendaraan_id_edit" class="form-control">
                            <option value="">--Silahkan Pilih--</option>
                        </select>
                        <div class="invalid-feedback error-jenis-kendaraan-edit">

                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_edit" name="id">
                        <label for="kode_trayek" class="col-form-label">kode_trayek:</label>
                        <input type="text" class="form-control" id="kode_trayek_edit" name="kode_trayek">
                        <div class="invalid-feedback error-kode-trayek-edit">

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
</div><!-- End Edit Modal-->

<script src="/assets/vendor/jquery/jquery.js"></script>

<script>
    $(document).ready(function(e) {
        $('#jenis_kendaraan_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });
        $('#jenis_kendaraan_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });
    });

    $("#tambah_kode_trayek").submit(function(e) {
        e.preventDefault();

        let jenis_kendaraan_id = $('#jenis_kendaraan_id').val();
        let kode_trayek = $('#kode_trayek').val();

        $.ajax({
            url: '/admin/kode_trayek/insert',
            method: 'post',
            dataType: 'JSON',
            data: {
                jenis_kendaraan_id: jenis_kendaraan_id,
                kode_trayek: kode_trayek,
            },
            beforeSend: function() {
                $('.save').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.save').prop('disabled', true);
            },
            success: function(response) {
                $('.save').html("<i class='bi bi-send'></i> Kirim");
                $('.save').prop('disabled', false);
                if (response.error) {
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

    $(document).on('click', "#delete", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/kode_trayek/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_delete").val(response.kode_trayek.id);
            }
        });
    });

    $("#delete_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_delete").val();
        $.ajax({
            url: '/admin/kode_trayek/delete',
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
            url: '/admin/kode_trayek/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_edit").val(response.kode_trayek.id);
                $("#kode_trayek_edit").val(response.kode_trayek.kode_trayek);

                let jenis_kendaraan_data = `<option value="">--Silahkan Pilih--</option>`;
                response.jenis_kendaraan.forEach(function(e) {
                    jenis_kendaraan_data += `<option value="${e.id}">${e.jenis_kendaraan}</option>`;
                });

                $("#jenis_kendaraan_id_edit").html(jenis_kendaraan_data);

                $("#jenis_kendaraan_id_edit").val(response.kode_trayek.jenis_kendaraan_id).trigger('change');

            }
        });
    });

    $("#edit_jenis_kendaraan").submit(function(e) {
        e.preventDefault();
        let id = $('#id_edit').val();
        let jenis_kendaraan_id = $('#jenis_kendaraan_id_edit').val();
        let kode_trayek = $('#kode_trayek_edit').val();

        $.ajax({
            url: '/admin/kode_trayek/update',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
                jenis_kendaraan_id: jenis_kendaraan_id,
                kode_trayek: kode_trayek,

            },
            beforeSend: function() {
                $('.update').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.update').prop('disabled', true);
            },
            success: function(response) {
                $('.update').html("<i class='bi bi-send'></i> Ubah");
                $('.update').prop('disabled', false);
                if (response.error) {
                    if (response.error.jenis_kendaraan_id) {
                        $("#jenis_kendaraan_id_edit").addClass('is-invalid');
                        $(".error-jenis-kendaraan-edit").html(response.error.jenis_kendaraan_id);
                    } else {
                        $("#jenis_kendaraan_id_edit").removeClass('is-invalid');
                        $(".error-jenis-kendaraan-edit").html('');
                    }
                    if (response.error.kode_trayek) {
                        $("#kode_trayek_edit").addClass('is-invalid');
                        $(".error-kode-trayek-edit").html(response.error.kode_trayek);
                    } else {
                        $("#kode_trayek_edit").removeClass('is-invalid');
                        $(".error-kode-trayek-edit").html('');
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
                $('.update').html("<i class='bi bi-send'></i> Ubah");
                $('.update').prop('disabled', false);
            }
        });
    });
</script>
<?= $this->endSection(); ?>