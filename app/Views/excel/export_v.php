<?php

header("Content-Type: application/vnd-ms-excel;");
header("Content-Disposition: attachment; filename=data_penindakan.xls");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Pengeluaran Kendaraan</title>
    <link href="/assets/img/logo2.png" rel="icon">
    <link href="/assets/img/logo2.png" rel="apple-touch-icon">
</head>
<style>
    table {
        width: 100%;
        vertical-align: middle;
        font-family: Arial;
        font-size: 12px;
    }

    table,
    th,
    td {
        text-transform: uppercase;
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;
        font-family: Arial;
        font-size: 14px;

    }

    .judul {
        font-family: Arial;
        font-size: 14px;
        text-align: center;
        text-transform: uppercase;
    }
</style>

<body>
    <h3 class="judul">Data Penindakan Angkutan Umum dan Angkutan Barang </h3>
    <h3 class="judul">Dinas perhubungan Provinsi DKI Jakarta</h3>
    <span class="judul">Periode <?= date('d-m-Y', strtotime($tanggal_awal)) ?> s/d <?= date('d-m-Y', strtotime($tanggal_akhir)) ?> </span>

    <table class="table" border="1">
        <thead>
            <tr>
                <th scope="col" style="text-align: center;">No.</th>
                <th scope="col">UKPD</th>
                <th scope="col">Nomor BAP</th>
                <th scope="col">Nama Pemilik</th>
                <th scope="col">Jenis Kendaraan</th>
                <th scope="col">Type Kendaraan</th>
                <th scope="col">Tahun Perakitan</th>
                <th scope="col">Kode Trayek</th>
                <th scope="col">Nomor Kendaraan</th>
                <th scope="col">Jenis Pelanggaran</th>
                <th scope="col">Pasal Pelanggaran</th>
                <th scope="col">Lokasi Penindakan</th>
                <th scope="col">Jenis Penindakan</th>
                <th scope="col">Barang Bukti</th>
                <th scope="col">Tanggal Penindakan</th>
                <th scope="col">Tanggal Sidang</th>
                <th scope="col">Lokasi Sidang</th>
                <th scope="col">Tempat Penyimpanan</th>
                <th scope="col">Nama Petugas</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_penindakan as $data_penindakan) : ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $data_penindakan->ukpd ?></td>
                    <td><?= $data_penindakan->nomor_bap ?></td>
                    <td><?= $data_penindakan->nama_pemilik ?></td>
                    <td><?= $data_penindakan->jenis_kendaraan ?></td>
                    <td><?= $data_penindakan->type_kendaraan ?></td>
                    <td><?= $data_penindakan->tahun_perakitan ?></td>
                    <td><?= $data_penindakan->kode_trayek ?></td>
                    <td><?= $data_penindakan->kode_wilayah_awal ?> <?= $data_penindakan->nomor_kendaraan  ?> <?= $data_penindakan->kode_wilayah_akhir  ?> </td>
                    <td><?= $data_penindakan->jenis_pelanggaran  ?> </td>
                    <td><?= $data_penindakan->pasal_pelanggaran  ?> </td>
                    <td><?= $data_penindakan->lokasi_penindakan  ?> </td>
                    <td><?= $data_penindakan->jenis_penindakan  ?> </td>
                    <td><?= $data_penindakan->barang_bukti  ?> </td>
                    <td><?= $data_penindakan->tanggal_penindakan  ?> </td>
                    <td><?= $data_penindakan->tanggal_sidang  ?> </td>
                    <td><?= $data_penindakan->lokasi_sidang  ?> </td>
                    <td><?= $data_penindakan->tempat_penyimpanan  ?> </td>
                    <td><?= $data_penindakan->nama_petugas  ?> </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</body>

</html>