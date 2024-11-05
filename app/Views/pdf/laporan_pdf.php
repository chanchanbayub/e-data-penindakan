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
    <h3 class="judul">Data Pengeluaran Kendaraan Angkutan Umum dan Angkutan Barang </h3>
    <h3 class="judul">Dinas perhubungan Provinsi DKI Jakarta</h3>
    <h3 class="judul"><?= date_indo(date('Y-m-d', strtotime($tanggal_awal))) ?> s/d <?= date_indo(date('Y-m-d', strtotime($tanggal_akhir))) ?></h3>

    <table class="table">
        <thead>
            <tr>
                <th scope="col" style="text-align: center;">No.</th>
                <th scope="col">Tanggal Pengeluaran</th>
                <th scope="col">Type Kendaraan</th>
                <th scope="col">Nomor Kendaraan</th>
                <th scope="col">Lokasi Penyimpanan</th>
                <th scope="col">Unit Penindak</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($laporan as $laporan) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= date_indo(date('Y-m-d', strtotime($laporan->tanggal_keluar))) ?></td>
                    <td><?= $laporan->type_kendaraan ?> - <?= $laporan->jenis_kendaraan ?></td>
                    <td><?= $laporan->kode_wilayah_awal ?> <?= $laporan->nomor_kendaraan ?> <?= $laporan->kode_wilayah_akhir ?> </td>
                    <td><?= $laporan->tempat_penyimpanan ?> </td>
                    <td><?= $laporan->ukpd ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>