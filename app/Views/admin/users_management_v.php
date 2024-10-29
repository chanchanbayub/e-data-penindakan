<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/users_management">Users Management</a></li>
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
                                    <li><a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#smallModal" data-bs-whatever="@mdo"><i class="bi bi-plus"></i> Tambah Users Management</a></li>

                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title text-capitalize"><?= $title ?> <span>| Table </span></h5>
                                <table class="table table-bordered datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">UKPD</th>
                                            <th scope="col">Nama </th>
                                            <th scope="col">NIP / NPJLP / NPTT</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Role Management</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($users_management as $users_management) : ?>
                                            <tr>
                                                <th scope="row"><a href="#"><?= $no++ ?></a></th>
                                                <td><?= $users_management->ukpd ?></td>
                                                <td><?= $users_management->nama ?></td>
                                                <td><?= $users_management->email ?></td>
                                                <td><?= $users_management->nip ?></td>
                                                <td><?= $users_management->role_management ?></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $users_management->id ?>" type="button">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $users_management->id ?>" type="button">
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

<!-- Modal Tambah ukpd_id -->
<div class="modal fade" id="smallModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Users Management </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tambah_form" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="ukpd_id" class="col-form-label">UKPD:</label>
                        <select name="ukpd_id" id="ukpd_id" class="form-select">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($ukpd as $ukpd) : ?>
                                <option value="<?= $ukpd->id ?>"> <?= $ukpd->nama_dinas ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-ukpd">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Nama :</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <div class="invalid-feedback error-nama">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-form-label">Email :</label>
                        <input type="text" class="form-control" id="email" name="email">
                        <div class="invalid-feedback error-email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nip" class="col-form-label">NIP / NPJLP / NPTT :</label>
                        <input type="text" class="form-control" id="nip" name="nip">
                        <div class=" invalid-feedback error-nip">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role_management_id" class="col-form-label">Role Management :</label>
                        <select name="role_management_id" id="role_management_id" class="form-select">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($role_management as $role_management) : ?>
                                <option value="<?= $role_management->id ?>"> <?= $role_management->role_management ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-role-management">

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

<!-- Modal hapus ukpd_id -->
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

<!-- Modal Edit Edit -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit <?= $title ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_edit" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_edit" name="id">
                        <label for="ukpd_id_edit" class="col-form-label">UKPD:</label>
                        <select name="ukpd_id" id="ukpd_id_edit" class="form-select">
                            <option value="">--Silahkan Pilih--</option>

                        </select>
                        <div class="invalid-feedback error-ukpd-edit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Nama :</label>
                        <input type="text" class="form-control" id="nama_edit" name="nama">
                        <div class="invalid-feedback error-nama-edit">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-form-label">Email :</label>
                        <input type="text" class="form-control" id="email_edit" name="email">
                        <div class="invalid-feedback error-email-edit">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nip" class="col-form-label">NIP / NPJLP / NPTT</label>
                        <input type="text" class="form-control" id="nip_edit" name="nip">
                        <div class="invalid-feedback error-nip-edit">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role_management_id" class="col-form-label">Role Management :</label>
                        <select name="role_management_id" id="role_management_id_edit" class="form-select">
                            <option value="">--Silahkan Pilih--</option>

                        </select>
                        <div class="invalid-feedback error-role-management-edit">

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

<script src="/assets/vendor/jquery/jquery.js"></script>

<script>
    $(document).ready(function() {
        $('#ukpd_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });

        $('#ukpd_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });

        $('#role_management').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });

        $('#role_management_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });
    });

    $("#tambah_form").submit(function(e) {
        e.preventDefault();
        let ukpd_id = $('#ukpd_id').val();
        let nama = $("#nama").val();
        let nip = $("#nip").val();
        let email = $("#email").val();
        let role_management_id = $("#role_management_id").val();
        $.ajax({
            url: '/admin/users_management/insert',
            method: 'post',
            dataType: 'JSON',
            data: {
                ukpd_id: ukpd_id,
                nama: nama,
                email: email,
                nip: nip,
                role_management_id: role_management_id
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
                    if (response.error.nama) {
                        $("#nama").addClass('is-invalid');
                        $(".error-nama").html(response.error.nama);
                    } else {
                        $("#nama").removeClass('is-invalid');
                        $(".error-nama").html('');
                    }
                    if (response.error.email) {
                        $("#email").addClass('is-invalid');
                        $(".error-email").html(response.error.email);
                    } else {
                        $("#email").removeClass('is-invalid');
                        $(".error-email").html('');
                    }
                    if (response.error.nip) {
                        $("#nip").addClass('is-invalid');
                        $(".error-nip").html(response.error.nip);
                    } else {
                        $("#nip").removeClass('is-invalid');
                        $(".error-nip").html('');
                    }
                    if (response.error.role_management_id) {
                        $("#role_management_id").addClass('is-invalid');
                        $(".error-role-management").html(response.error.role_management_id);
                    } else {
                        $("#role_management_id").removeClass('is-invalid');
                        $(".error-role-management").html('');
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
            url: '/admin/users_management/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_delete").val(response.users_management.id);
            }
        });
    });

    $("#delete_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_delete").val();
        $.ajax({
            url: '/admin/users_management/delete',
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
            url: '/admin/users_management/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {

                $("#id_edit").val(response.users_management.id);
                $("#nama_edit").val(response.users_management.nama);
                $("#email_edit").val(response.users_management.email);
                $("#nip_edit").val(response.users_management.nip);

                let ukpd_data = `<option value="">--Silahkan Pilih--</option>`;

                if (response.ukpd != null) {
                    response.ukpd.forEach(function(e) {
                        ukpd_data += `<option value="${e.id}">${e.ukpd}</option>`;
                    });

                    $("#ukpd_id_edit").html(ukpd_data);
                }

                let role_management_data = `<option value="">--Silahkan Pilih--</option>`;

                if (response.role_management != null) {
                    response.role_management.forEach(function(e) {
                        role_management_data += `<option value="${e.id}">${e.role_management}</option>`;
                    });

                    $("#role_management_id_edit").html(role_management_data);
                }

                $("#ukpd_id_edit").val(response.users_management.ukpd_id).trigger('change');
                $("#role_management_id_edit").val(response.users_management.role_management_id).trigger('change');

            }
        });
    });

    $("#form_edit").submit(function(e) {
        e.preventDefault();
        let id = $('#id_edit').val();
        let ukpd_id = $('#ukpd_id_edit').val();
        let nama = $("#nama_edit").val();
        let email = $("#email_edit").val();
        let nip = $("#nip_edit").val();
        let role_management_id = $("#role_management_id_edit").val();
        $.ajax({
            url: '/admin/users_management/update',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
                ukpd_id: ukpd_id,
                nama: nama,
                email: email,
                nip: nip,
                role_management_id: role_management_id
            },
            beforeSend: function() {
                $('.update').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.update').prop('disabled', true);
            },
            success: function(response) {
                $('.update').html("<i class='bi bi-send'></i> Ubah");
                $('.update').prop('disabled', false);
                if (response.error) {
                    if (response.error.ukpd_id) {
                        $("#ukpd_id_edit").addClass('is-invalid');
                        $(".error-ukpd_id-edit").html(response.error.ukpd_id);
                    } else {
                        $("#ukpd_id_edit").removeClass('is-invalid');
                        $(".error-ukpd_id-edit").html('');
                    }
                    if (response.error.nama) {
                        $("#nama_edit").addClass('is-invalid');
                        $(".error-nama-edit").html(response.error.nama);
                    } else {
                        $("#nama_dinas_edit").removeClass('is-invalid');
                        $(".error-nama-edit").html('');
                    }
                    if (response.error.email) {
                        $("#email_edit").addClass('is-invalid');
                        $(".error-email-edit").html(response.error.email);
                    } else {
                        $("#email_edit").removeClass('is-invalid');
                        $(".error-email-edit").html('');
                    }
                    if (response.error.nip) {
                        $("#nip_edit").addClass('is-invalid');
                        $(".error-nip-edit").html(response.error.nip);
                    } else {
                        $("#nip_edit").removeClass('is-invalid');
                        $(".error-nip-edit").html('');
                    }
                    if (response.error.role_magamenent) {
                        $("#role_management_id_edit").addClass('is-invalid');
                        $(".error-role-management-edit").html(response.error.role_management_id);
                    } else {
                        $("#role_management_id_edit").removeClass('is-invalid');
                        $(".error-role-management-edit").html('');
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