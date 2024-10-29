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
            <div class="col-12">
                <div class="card overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title text-capitalize"><?= $title ?> <span>| Table </span></h5>
                        <form id="tambah_data" autocomplete="off">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" class="form-control" value="<?= $data_penindakan->id ?>">
                                <label for="ukpd_id" class="col-form-label">UKPD :</label>
                                <select name="ukpd_id" id="ukpd_id" class="form-select">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php foreach ($ukpd as $ukpd) : ?>
                                        <?php if ($ukpd->id == $data_penindakan->ukpd_id) : ?>
                                            <option value="<?= $ukpd->id ?>" selected><?= $ukpd->ukpd ?></option>
                                        <?php else : ?>
                                            <option value="<?= $ukpd->id ?>"><?= $ukpd->ukpd ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback error-ukpd">

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nomor_bap" class="col-form-label">Nomor BAP :</label>
                                <input type="number" name="nomor_bap" id="nomor_bap" class="form-control" value="<?= $data_penindakan->nomor_bap ?>">
                                <div class="invalid-feedback error-nomor-bap">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="kode_wilayah_awal" class="col-form-label">Nomor Kendaraan :</label>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" name="kode_wilayah_awal" id="kode_wilayah_awal" class="form-control" value="<?= $data_penindakan->kode_wilayah_awal ?>">
                                        </div>
                                        <div class=" col-md-6">
                                            <input type="text" name="nomor_kendaraan" id="nomor_kendaraan" class="form-control" value="<?= $data_penindakan->nomor_kendaraan ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="kode_wilayah_akhir" id="kode_wilayah_akhir" class="form-control" value="<?= $data_penindakan->kode_wilayah_akhir ?>">
                                        </div>
                                    </div>

                                </div>

                                <span class="invalid-feedback error-kode-wilayah-awal"></span>
                                <span class="invalid-feedback error-nomor-kendaraan"></span>
                                <span class="invalid-feedback error-kode-wilayah-akhir"></span>

                            </div>

                            <div class="form-group">
                                <label for="nama_pemilik" class="col-form-label">Nama Pemilik / Koperasi / Perusahaan:</label>
                                <input type="text" name="nama_pemilik" id="nama_pemilik" class="form-control" value="<?= $data_penindakan->nama_pemilik ?>">
                                <div class="invalid-feedback error-nama-pemilik">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="jenis_kendaraan_id" class="col-form-label">Jenis Kendaraan :</label>
                                <select name="jenis_kendaraan_id" id="jenis_kendaraan_id" class="form-select">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php foreach ($jenis_kendaraan as $jenis_kendaraan) : ?>
                                        <?php if ($jenis_kendaraan->id == $data_penindakan->jenis_kendaraan_id) : ?>
                                            <option value="<?= $jenis_kendaraan->id ?>" selected><?= $jenis_kendaraan->jenis_kendaraan ?></option>
                                        <?php else : ?>
                                            <option value="<?= $jenis_kendaraan->id ?>"><?= $jenis_kendaraan->jenis_kendaraan ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback error-jenis-kendaraan">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="type_kendaraan_id" class="col-form-label">Type Kendaraan :</label>
                                <select name="type_kendaraan_id" id="type_kendaraan_id" class="form-select">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php foreach ($type_kendaraan as $type_kendaraan) : ?>
                                        <?php if ($type_kendaraan->id == $data_penindakan->type_kendaraan_id) : ?>
                                            <option value="<?= $type_kendaraan->id ?>" selected><?= $type_kendaraan->type_kendaraan ?></option>
                                        <?php else : ?>
                                            <option value="<?= $type_kendaraan->id ?>"><?= $type_kendaraan->type_kendaraan ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback error-type-kendaraan">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tahun_perakitan" class="col-form-label">Tahun Perakitan : </label>
                                <input type="number" name="tahun_perakitan" id="tahun_perakitan" class="form-control" value="<?= $data_penindakan->tahun_perakitan ?>">
                                <div class="invalid-feedback error-tahun-perakitan">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="kode_trayek" class="col-form-label">Kode Trayek :</label>
                                <select name="kode_trayek" id="kode_trayek" class="form-select">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php foreach ($kode_trayek as $kode_trayek) : ?>
                                        <?php if ($kode_trayek->kode_trayek == $data_penindakan->kode_trayek) : ?>
                                            <option value="<?= $kode_trayek->kode_trayek ?>" selected><?= $kode_trayek->kode_trayek ?></option>
                                        <?php else : ?>
                                            <option value="<?= $kode_trayek->kode_trayek ?>" selected><?= $kode_trayek->kode_trayek ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback error-kode-trayek">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="warna_tnkb" class="col-form-label">Warna TNKB :</label>
                                <select name="warna_tnkb" id="warna_tnkb" class="form-select">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php if ($data_penindakan->warna_tnkb == 1) : ?>
                                        <option value="1" selected>Kuning</option>
                                    <?php else : ?>
                                        <option value="2" selected>Hitam / Putih</option>
                                    <?php endif; ?>
                                </select>
                                <div class="invalid-feedback error-warna-tnkb">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="jenis_pelanggaran" class="col-form-label">Jenis Pelanggaran :</label>
                                <input type="text" name="jenis_pelanggaran" id="jenis_pelanggaran" class="form-control" value="<?= $data_penindakan->jenis_pelanggaran ?>">
                                <div class="invalid-feedback error-jenis-pelanggaran">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pasal_pelanggaran" class="col-form-label">Pasal Pelanggaran :</label>
                                <input type="text" name="pasal_pelanggaran" id="pasal_pelanggaran" class="form-control" value="<?= $data_penindakan->pasal_pelanggaran ?>">
                                <div class="invalid-feedback error-pasal-pelanggaran">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lokasi_penindakan" class="col-form-label">Lokasi Penindakan :</label>
                                <input type="text" name="lokasi_penindakan" id="lokasi_penindakan" class="form-control" value="<?= $data_penindakan->lokasi_penindakan ?>">
                                <div class="invalid-feedback error-lokasi-penindakan">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="jenis_penindakan_id" class="col-form-label">Jenis Penindakan :</label>
                                <select name="jenis_penindakan_id" id="jenis_penindakan_id" class="form-select">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php foreach ($jenis_penindakan as $jenis_penindakan) : ?>
                                        <?php if ($jenis_penindakan->id == $data_penindakan->jenis_penindakan_id) : ?>
                                            <option value="<?= $jenis_penindakan->id ?>" selected><?= $jenis_penindakan->jenis_penindakan ?></option>
                                        <?php else : ?>
                                            <option value="<?= $jenis_penindakan->id ?>" selected><?= $jenis_penindakan->jenis_penindakan ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback error-jenis-penindakan">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="barang_bukti" class="col-form-label">Barang Bukti :</label>
                                <input type="text" name="barang_bukti" id="barang_bukti" class="form-control" value="<?= $data_penindakan->barang_bukti ?>">
                                <div class="invalid-feedback error-barang-bukti">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_penindakan" class="col-form-label">Tanggal Penindakan :</label>
                                <input type="date" name="tanggal_penindakan" id="tanggal_penindakan" class="form-control" value="<?= $data_penindakan->tanggal_penindakan ?>">
                                <div class="invalid-feedback error-tanggal-penindakan">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_sidang" class="col-form-label">Tanggal Sidang :</label>
                                <input type="date" name="tanggal_sidang" id="tanggal_sidang" class="form-control" value="<?= $data_penindakan->tanggal_sidang ?>">
                                <div class="invalid-feedback error-tanggal-sidang">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lokasi_sidang_id" class="col-form-label">Lokasi Sidang :</label>
                                <select name="lokasi_sidang_id" id="lokasi_sidang_id" class="form-select">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php foreach ($lokasi_sidang as $lokasi_sidang) : ?>
                                        <?php if ($lokasi_sidang->id == $data_penindakan->lokasi_sidang_id) : ?>
                                            <option value=" <?= $lokasi_sidang->id ?>" selected><?= $lokasi_sidang->lokasi_sidang ?></option>
                                        <?php else : ?>
                                            <option value=" <?= $lokasi_sidang->id ?>"><?= $lokasi_sidang->lokasi_sidang ?></option>
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback error-lokasi-sidang">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tempat_penyimpanan_id" class="col-form-label">Tempat Penyimpanan :</label>
                                <select name="tempat_penyimpanan_id" id="tempat_penyimpanan_id" class="form-select text-uppercase">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php foreach ($tempat_penyimpanan as $tempat_penyimpanan) : ?>
                                        <?php if ($tempat_penyimpanan->id == $data_penindakan->tempat_penyimpanan_id) : ?>
                                            <option value="<?= $tempat_penyimpanan->id ?>" selected><?= $tempat_penyimpanan->tempat_penyimpanan ?></option>
                                        <?php else : ?>
                                            <option value="<?= $tempat_penyimpanan->id ?>"><?= $tempat_penyimpanan->tempat_penyimpanan ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback error-tempat-penyimpanan">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_petugas" class="col-form-label">Nama Petugas :</label>
                                <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" value="<?= $data_penindakan->nama_petugas ?>">
                                <div class="invalid-feedback error-nama-petugas">

                                </div>
                            </div>
                            <?php if (session()->get('ukpd_id') == 1) : ?>
                                <div class="form-group">
                                    <label for="nomor_surat_pengeluaran" class="col-form-label">Nomor Surat Pengeluaran :</label>
                                    <input type="text" name="nomor_surat_pengeluaran" id="nomor_surat_pengeluaran" class="form-control" placeholder="Masukan Nomor Surat">
                                    <div class=" invalid-feedback error-nomor-surat">

                                    </div>

                                </div>
                            <?php else : ?>
                                <div class="form-group" hidden>
                                    <label for="nomor_surat_pengeluaran" class="col-form-label">Nomor Surat Pengeluaran :</label>
                                    <input type="text" name="nomor_surat_pengeluaran" id="nomor_surat_pengeluaran" class="form-control" placeholder="Masukan Nomor Surat" value="-">
                                    <div class=" invalid-feedback error-nomor-surat">

                                    </div>

                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="nomor_rangka" class="col-form-label">Nomor Rangka :</label>
                                <input type="text" name="nomor_rangka" id="nomor_rangka" class="form-control" placeholder="Masukan Nomor Rangka ">
                                <div class=" invalid-feedback error-nomor-rangka">

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nomor_mesin" class="col-form-label">Nomor Mesin :</label>
                                <input type="text" name="nomor_mesin" id="nomor_mesin" class="form-control" placeholder="Masukan Nomor Mesin ">
                                <div class=" invalid-feedback error-nomor-mesin">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alamat_pemilik_kendaraan" class="col-form-label">Alamat Pemilik Kendaraan :</label>
                                <textarea name="alamat_pemilik_kendaraan" id="alamat_pemilik_kendaraan" class="form-control"></textarea>
                                <div class=" invalid-feedback error-alamat-pemilik-kendaraan">

                                </div>
                            </div>

                            <div class="form-group">
                                <?php if (session()->get('ukpd_id') == 1) : ?>
                                    <label for="tanggal_keluar" class="col-form-label">Tanggal Keluar :</label>
                                <?php else : ?>
                                    <label for="tanggal_keluar" class="col-form-label">Tanggal Pengajuan :</label>
                                <?php endif; ?>
                                <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control">
                                <div class=" invalid-feedback error-tanggal-keluar">

                                </div>
                            </div>

                            <?php if (session()->get('ukpd_id') == 1) : ?>
                                <div class="form-group">
                                    <label for="status_kendaraan_id" class="col-form-label">Status Kendaraan :</label>
                                    <select name="status_kendaraan_id" id="status_kendaraan_id" class="form-control">
                                        <option value="">--Silahkan Pilih--</option>
                                        <?php foreach ($status_kendaraan as $status_kendaraan) : ?>
                                            <?php if ($status_kendaraan->id == $data_penindakan->status_kendaraan_id) : ?>
                                                <option value="<?= $status_kendaraan->id ?>" selected><?= $status_kendaraan->status_kendaraan ?></option>
                                            <?php else : ?>
                                                <option value="<?= $status_kendaraan->id ?>"><?= $status_kendaraan->status_kendaraan ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback error-status-kendaraan">
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="form-group">
                                    <label for="status_kendaraan_id" class="col-form-label">Status Kendaraan :</label>
                                    <select name="status_kendaraan_id" id="status_kendaraan_id" class="form-control">
                                        <option value="">--Silahkan Pilih--</option>
                                        <option value="3" selected>Rekom</option>
                                    </select>
                                    <div class="invalid-feedback error-status-kendaraan">
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="pejabat_id" class="col-form-label">Pejabat Penanda Tangan :</label>
                                <select name="pejabat_id" id="pejabat_id" class="form-control">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php foreach ($pejabat as $pejabat) : ?>
                                        <option value="<?= $pejabat->id ?>"><?= $pejabat->nama ?></option>
                                    <?php endforeach; ?>

                                </select>
                                <div class="invalid-feedback error-pejabat">
                                </div>
                            </div>
                            <br>
                            <div class="text-center">

                                <a href="/petugas/pengeluaran_kendaraan" class="btn btn-danger"> <i class="bi bi-x-lg"></i> Kembali</a>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                                <button type="submit" class="btn btn-primary save"> <i class="bi bi-send"></i> Simpan</button>
                            </div>

                        </form>

                    </div>

                </div>
            </div><!-- End Recent Sales -->
        </div>
    </section>
</main><!-- End #main -->

<!-- Scrollable modal -->
<div class="modal fade" id="kebijakan_privasi" tabindex="0">
    <div class="modal-dialog modal-dialog-scrollable  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kebijakan & Privasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 style="text-align:center ;">Disclamer</h3>
                <hr>
                <p style="text-align: justify;">Apakah Anda yakin ? <br> Data yang sudah di kirim tidak dapat di edit !</p>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="kirim">Ya, Yakin </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/vendor/jquery/jquery.js"></script>

<script>
    $(document).ready(function() {
        $('#ukpd_id').select2({
            theme: 'bootstrap4',

        });

        $('#pejabat_id').select2({
            theme: 'bootstrap4',

        });

        $('#jenis_kendaraan_id').select2({
            theme: 'bootstrap4',

        });

        $('#type_kendaraan_id').select2({
            theme: 'bootstrap4',

        });

        $('#kode_trayek').select2({
            theme: 'bootstrap4',

        });

        $('#warna_tnkb').select2({
            theme: 'bootstrap4',

        });

        $('#jenis_penindakan_id').select2({
            theme: 'bootstrap4',

        });

        $('#tempat_penyimpanan_id').select2({
            theme: 'bootstrap4',

        });

        $('#lokasi_sidang_id').select2({
            theme: 'bootstrap4',

        });

        $('#status_kendaraan_id').select2({
            theme: 'bootstrap4',

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


    $("#tambah_data").submit(function(e) {
        e.preventDefault();
        let id = $('#id').val();
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

        let nomor_surat_pengeluaran = $('#nomor_surat_pengeluaran').val();
        let nomor_rangka = $('#nomor_rangka').val();
        let nomor_mesin = $('#nomor_mesin').val();
        let alamat_pemilik_kendaraan = $('#alamat_pemilik_kendaraan').val();
        let tanggal_keluar = $('#tanggal_keluar').val();
        let status_kendaraan_id = $('#status_kendaraan_id').val();
        let pejabat_id = $('#pejabat_id').val();

        let formData = new FormData(this);

        formData.append('id', id);
        formData.append('ukpd_id', ukpd_id);
        formData.append('nomor_bap', nomor_bap);
        formData.append('nama_pemilik', nama_pemilik);
        formData.append('type_kendaraan_id', type_kendaraan_id);
        formData.append('tahun_perakitan', tahun_perakitan);
        formData.append('jenis_kendaraan_id', jenis_kendaraan_id);
        formData.append('kode_trayek', kode_trayek);
        formData.append('warna_tnkb', warna_tnkb);
        formData.append('kode_wilayah_awal', kode_wilayah_awal);
        formData.append('nomor_kendaraan', nomor_kendaraan);
        formData.append('kode_wilayah_akhir', kode_wilayah_akhir);
        formData.append('jenis_pelanggaran', jenis_pelanggaran);
        formData.append('pasal_pelanggaran', pasal_pelanggaran);
        formData.append('lokasi_penindakan', lokasi_penindakan);
        formData.append('jenis_penindakan_id', jenis_penindakan_id);
        formData.append('barang_bukti', barang_bukti);
        formData.append('tanggal_penindakan', tanggal_penindakan);
        formData.append('tanggal_sidang', tanggal_sidang);
        formData.append('lokasi_sidang_id', lokasi_sidang_id);
        formData.append('tempat_penyimpanan_id', tempat_penyimpanan_id);
        formData.append('nama_petugas', nama_petugas);
        formData.append('nomor_rangka', nomor_rangka);
        formData.append('nomor_mesin', nomor_mesin);
        formData.append('alamat_pemilik_kendaraan', alamat_pemilik_kendaraan);
        formData.append('tanggal_keluar', tanggal_keluar);
        formData.append('status_kendaraan_id', status_kendaraan_id);
        formData.append('pejabat_id', pejabat_id);

        $("#kebijakan_privasi").modal('show');

        $("#kebijakan_privasi").on("click", "#kirim", function(e) {
            e.preventDefault();
            sendData(formData);
        });

    });

    function sendData(formData) {
        $("#kebijakan_privasi").modal('hide');
        $.ajax({
            url: '/petugas/pengeluaran_kendaraan/insert',
            data: formData,
            method: 'post',
            dataType: 'JSON',
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function() {
                $('.save').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.save').prop('disabled', true);
            },
            success: function(response) {

                $('.save').html("<i class='bi bi-send'></i> Simpan");
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
                    if (response.error.nama_petugas) {
                        $("#nama_petugas").addClass('is-invalid');
                        $(".error-nama-petugas").html(response.error.nama_petugas);
                    } else {
                        $("#nama_petugas").removeClass('is-invalid');
                        $(".error-nama-petugas").html('');
                    }

                    if (response.error.nomor_surat_pengeluaran) {
                        $("#nomor_surat_pengeluaran").addClass('is-invalid');
                        $(".error-nomor-surat").html(response.error.nomor_surat_pengeluaran);
                    } else {
                        $("#nomor_surat_pengeluaran").removeClass('is-invalid');
                        $(".error-nomor-surat").html('');
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
                    if (response.error.pejabat_id) {
                        $("#pejabat_id").addClass('is-invalid');
                        $(".error-pejabat").html(response.error.pejabat_id);
                    } else {
                        $("#pejabat_id").removeClass('is-invalid');
                        $(".error-pejabat").html('');
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
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: `Data Belum Tersimpan!`,
                });
                $('.save').html("<i class='bi bi-send'></i> Simpan");
                $('.save').prop('disabled', false);
            }
        });
    }
</script>
<?= $this->endSection(); ?>