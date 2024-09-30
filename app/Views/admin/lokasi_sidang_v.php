<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/lokasi_sidang"><?= $title ?></a></li>
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
                                    <li><a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#smallModal" data-bs-whatever="@mdo"><i class="bi bi-plus"></i> Tambah Lokasi Sidang</a></li>

                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title text-capitalize"><?= $title ?> <span>| Table </span></h5>
                                <table class="table table-bordered datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Lokasi Sidang</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($lokasi_sidang as $lokasi_sidang) : ?>
                                            <tr>
                                                <th scope="row"><a href="#"><?= $no++ ?></a></th>
                                                <td><?= $lokasi_sidang->lokasi_sidang ?></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $lokasi_sidang->id ?>" type="button">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $lokasi_sidang->id ?>" type="button">
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

<!-- Modal Tambah lokasi_sidang -->
<div class="modal fade" id="smallModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah <?= $title ?> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tambah_lokasi_sidang" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="lokasi_sidang" class="col-form-label"><?= $title ?>:</label>
                        <input type="text" class="form-control" id="lokasi_sidang" name="lokasi_sidang" placeholder="PN Jakarta Pusat">
                        <div class="invalid-feedback error-lokasi-sidang">

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

<!-- Modal hapus lokasi_sidang -->
<div class="modal fade" id="deleteModal" tabindex="0">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Lokasi Sidang</h5>
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

<!-- Modal Edit lokasi_sidang -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit <?= $title ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_lokasi_sidang" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_edit" name="id">
                        <label for="lokasi_sidang" class="col-form-label">Lokasi Sidang:</label>
                        <input type="text" class="form-control" id="lokasi_sidang_edit" name="lokasi_sidang">
                        <div class="invalid-feedback error-lokasi_sidang-edit">

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
    $("#tambah_lokasi_sidang").submit(function(e) {
        e.preventDefault();
        let lokasi_sidang = $('#lokasi_sidang').val();
        $.ajax({
            url: '/admin/lokasi_sidang/insert',
            method: 'post',
            dataType: 'JSON',
            data: {
                lokasi_sidang: lokasi_sidang,
            },
            beforeSend: function() {
                $('.save').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.save').prop('disabled', true);
            },
            success: function(response) {
                $('.save').html("<i class='bi bi-send'></i> Kirim");
                $('.save').prop('disabled', false);
                if (response.error) {
                    if (response.error.lokasi_sidang) {
                        $("#lokasi_sidang").addClass('is-invalid');
                        $(".error-lokasi-sidang").html(response.error.lokasi_sidang);
                    } else {
                        $("#lokasi_sidang").removeClass('is-invalid');
                        $(".error-lokasi-sidang").html('');
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
            url: '/admin/lokasi_sidang/edit',
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
            url: '/admin/lokasi_sidang/delete',
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
            url: '/admin/lokasi_sidang/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_edit").val(response.id);
                $("#lokasi_sidang_edit").val(response.lokasi_sidang);

            }
        });
    });

    $("#edit_lokasi_sidang").submit(function(e) {
        e.preventDefault();
        let id = $('#id_edit').val();
        let lokasi_sidang = $('#lokasi_sidang_edit').val();

        $.ajax({
            url: '/admin/lokasi_sidang/update',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
                lokasi_sidang: lokasi_sidang,

            },
            beforeSend: function() {
                $('.update').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.update').prop('disabled', true);
            },
            success: function(response) {
                $('.update').html("<i class='bi bi-send'></i> Ubah");
                $('.update').prop('disabled', false);
                if (response.error) {
                    if (response.error.lokasi_sidang) {
                        $("#lokasi_sidang_edit").addClass('is-invalid');
                        $(".error-lokasi_sidang-edit").html(response.error.lokasi_sidang);
                    } else {
                        $("#lokasi_sidang_edit").removeClass('is-invalid');
                        $(".error-lokasi_sidang-edit").html('');
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