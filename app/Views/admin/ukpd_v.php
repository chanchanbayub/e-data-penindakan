<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/ukpd">UKPD</a></li>
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
                                    <li><a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#smallModal" data-bs-whatever="@mdo"><i class="bi bi-plus"></i> Tambah UKPD</a></li>

                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title text-capitalize"><?= $title ?> <span>| Table </span></h5>
                                <table class="table table-bordered datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">UKPD</th>
                                            <th scope="col">Nama Intansi</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($ukpd as $ukpd) : ?>
                                            <tr>
                                                <th scope="row"><a href="#"><?= $no++ ?></a></th>
                                                <td><?= $ukpd->ukpd ?></td>
                                                <td><?= $ukpd->nama_dinas ?></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $ukpd->id ?>" type="button">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $ukpd->id ?>" type="button">
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

<!-- Modal Tambah UKPD -->
<div class="modal fade" id="smallModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah UKPD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tambah_ukpd" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="ukpd" class="col-form-label">UKPD:</label>
                        <input type="text" class="form-control" id="ukpd" name="ukpd" placeholder="masukan nama ukpd cth : dalops">
                        <div class="invalid-feedback error-ukpd">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_dinas" class="col-form-label">Nama Intansi:</label>
                        <input type="text" class="form-control" id="nama_dinas" name="nama_dinas" placeholder="masukan nama ukpd cth : Bidang Dalops">
                        <div class="invalid-feedback error-nama-dinas">
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

<!-- Modal hapus UKPD -->
<div class="modal fade" id="deleteModal" tabindex="0">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus UKPD</h5>
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

<!-- Modal Edit UKPD -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit UKPD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_ukpd" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_edit" name="id">
                        <label for="ukpd" class="col-form-label">UKPD:</label>
                        <input type="text" class="form-control" id="ukpd_edit" name="ukpd">
                        <div class="invalid-feedback error-ukpd-edit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_dinas" class="col-form-label">Nama Intansi:</label>
                        <input type="text" class="form-control" id="nama_dinas_edit" name="nama_dinas">
                        <div class="invalid-feedback error-nama-dinas-edit">
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
    $("#tambah_ukpd").submit(function(e) {
        e.preventDefault();
        let ukpd = $('#ukpd').val();
        let nama_dinas = $("#nama_dinas").val();
        $.ajax({
            url: '/admin/ukpd/insert',
            method: 'post',
            dataType: 'JSON',
            data: {
                ukpd: ukpd,
                nama_dinas: nama_dinas
            },
            beforeSend: function() {
                $('.save').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.save').prop('disabled', true);
            },
            success: function(response) {
                $('.save').html("<i class='bi bi-send'></i> Kirim");
                $('.save').prop('disabled', false);
                if (response.error) {
                    if (response.error.ukpd) {
                        $("#ukpd").addClass('is-invalid');
                        $(".error-ukpd").html(response.error.ukpd);
                    } else {
                        $("#ukpd").removeClass('is-invalid');
                        $(".error-ukpd").html('');
                    }
                    if (response.error.nama_dinas) {
                        $("#nama_dinas").addClass('is-invalid');
                        $(".error-nama-dinas").html(response.error.nama_dinas);
                    } else {
                        $("#nama_dinas").removeClass('is-invalid');
                        $(".error-nama-dinas").html('');
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
            url: '/admin/ukpd/edit',
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
            url: '/admin/ukpd/delete',
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
            url: '/admin/ukpd/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_edit").val(response.id);
                $("#ukpd_edit").val(response.ukpd);
                $("#nama_dinas_edit").val(response.nama_dinas);

            }
        });
    });

    $("#edit_ukpd").submit(function(e) {
        e.preventDefault();
        let id = $('#id_edit').val();
        let ukpd = $('#ukpd_edit').val();
        let nama_dinas = $("#nama_dinas_edit").val();
        $.ajax({
            url: '/admin/ukpd/update',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
                ukpd: ukpd,
                nama_dinas: nama_dinas
            },
            beforeSend: function() {
                $('.update').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.update').prop('disabled', true);
            },
            success: function(response) {
                $('.update').html("<i class='bi bi-send'></i> Ubah");
                $('.update').prop('disabled', false);
                if (response.error) {
                    if (response.error.ukpd) {
                        $("#ukpd_edit").addClass('is-invalid');
                        $(".error-ukpd-edit").html(response.error.ukpd);
                    } else {
                        $("#ukpd_edit").removeClass('is-invalid');
                        $(".error-ukpd-edit").html('');
                    }
                    if (response.error.nama_dinas) {
                        $("#nama_dinas_edit").addClass('is-invalid');
                        $(".error-nama-dinas-edit").html(response.error.nama_dinas);
                    } else {
                        $("#nama_dinas_edit").removeClass('is-invalid');
                        $(".error-nama-dinas-edit").html('');
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