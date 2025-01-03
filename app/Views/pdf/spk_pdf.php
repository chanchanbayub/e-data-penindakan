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
    * {
        margin: 0 auto;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    header {
        /* border: 1px solid green; */
        /* padding: 20px; */
        margin: -30px 0px 0px 0px;
        box-sizing: border-box;
    }

    #kopSurat {
        width: 100%;

        /* border: 1px solid black; */
        box-sizing: border-box;
    }

    hr {
        margin-top: -2px;
        box-sizing: border-box;
    }

    .logo {
        width: 70px;
    }

    #p1 {
        font-size: 18px;
        text-transform: uppercase;
        line-height: 15px;
        letter-spacing: 0px;
        font-style: normal;
    }

    #p2 {
        font-size: 24px;
        text-transform: uppercase;
        line-height: 15px;
        letter-spacing: 1px;
        font-weight: 900;
    }

    #p3 {
        font-size: 14px;
        letter-spacing: 1px;
        line-height: 15px;
    }

    #p4 {
        font-size: 14px;
        line-height: 15px;
        letter-spacing: 0px;
        font-style: normal;
    }

    #p5 {
        font-size: 12px;
        text-transform: capitalize;
    }

    #td {
        text-align: right;
    }

    .noSurat {
        width: 100%;
        margin: -8px 0 auto;
        box-sizing: border-box;
    }

    #noSuratKend {
        /* margin: 0 auto; */
        width: 100%;


    }

    #noSuratKend,
    td {
        font-size: 14px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .content-data {
        box-sizing: border-box;
        width: 90%;
        margin: 0 auto;
    }

    #content {
        font-family: Arial;
        padding-left: 70px;
        line-height: 20px;
        margin: 0 auto;
        text-align: justify;
        font-size: 14px;
    }

    .data_kendaraan {
        box-sizing: border-box;
        margin: 0 auto;
        width: 90%;
    }

    #content-table {
        padding-left: 70px;
        text-transform: capitalize;
        /* margin: 0 auto; */
        line-height: 25px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .content-footer {
        width: 90%;
        margin: 0 auto;

    }

    #paragraf-footer {
        text-transform: capitalize;
        padding-left: 70px;
        line-height: 25px;
        font-family: Arial, Helvetica, sans-serif;
        text-align: justify;
    }

    .transform {
        text-transform: capitalize;
    }

    .ttd_data {
        margin: 0 auto;
        box-sizing: border-box;
    }

    .footer {
        box-sizing: border-box;
    }

    #footer {
        font-size: 12px;
        text-transform: capitalize;
        font-family: Arial, Helvetica, sans-serif;
    }
</style>


<body>
    <header>
        <table id="kopSurat">
            <tr>
                <td>
                    <img class="logo" src="assets/img/logo.png" alt="logo" />
                </td>
                <td align="center">
                    <p id="p1"> pemerintah daerah khusus ibu kota jakarta</p>
                    <p id="p2"> dinas perhubungan</p>
                    <p id="p3">Jalan Taman Jatibaru Nomor 1 Telepon 3501349 Faksimile 3455264</p>
                    <p id="p4">Website : www.dishub.jakarta.go.id E-mail : dishub@jakarta.go.id </p>
                    <p id="p4">J A K A R T A</p>
                </td>
                <!-- <td>
                    <img class="logo" src="assets/img/logo2.png" alt="logo" />
                </td> -->
            </tr>
            <tr>
                <td colspan="3" align="right" id="p5">
                    Kode Pos : 10150
                </td>
            </tr>
        </table>

    </header>
    <hr id="devine">
    <div class="noSurat">
        <table id="noSuratKend">
            <tr>
                <td style="width:13%"> No</td>
                <td style="width: 2%;">:</td>
                <td style="text-transform: uppercase;">&nbsp; <?= $pengeluaran->nomor_surat_pengeluaran ?> &nbsp;/ PH.06.00</td>
                <td colspan="14" align="center">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= date_indo(date('Y-m-d', strtotime($pengeluaran->tanggal_keluar))) ?>
                </td>
                <!-- <td colspan="">&nbsp;</td> -->
            </tr>
            <tr>
                <td style="width:13%"> Sifat</td>
                <td style="width: 2%;">:</td>
                <td></td>
                <td colspan="14"></td>
            </tr>
            <tr>
                <td style="width:13%"> Lampiran</td>
                <td style="width: 2%;">:</td>
                <td colspan="15"></td>
            </tr>
            <tr>
                <td style="width:13%"> Hal</td>
                <td style="width: 2%;">:</td>
                <td style="width: 35%;">Pengeluaran Kendaraan</td>
                <td style="width: 5%">&nbsp;</td>
                <td colspan="13" style="padding-left: 40px;">Kepada</td>
            </tr>
            <tr>
                <td style="width:13%"></td>
                <!-- <td style="width: 2%;"></td> -->
                <td style="width: 35%;"></td>
                <td style="width: 7%;" style="text-align: right;">Yth.</td>
                <td style="width: 5%">&nbsp;</td>

                <td colspan="13" style="padding-left: 25px;">Kepala Terminal Mobil Barang </td>
            </tr>
            <tr>
                <td style="width:13%"></td>
                <!-- <td style="width: 2%;"></td> -->
                <td style="width: 35%;"></td>
                <td style="width: 7%;"></td>
                <td style="width: 5%">&nbsp;</td>
                <td colspan="13" style="padding-left: 25px;"><span class="transform"> <?= $pengeluaran->tempat_penyimpanan ?></span> Dinas Perhubungan </td>
            </tr>
            <tr>
                <td style="width:13%"></td>
                <!-- <td style="width: 2%;"></td> -->
                <td style="width: 35%;"></td>
                <td style="width: 7%;"></td>
                <td style="width: 5%">&nbsp;</td>

                <td colspan="13" style=" padding-left: 25px;">Provinsi DKI Jakarta</td>
            </tr>
            <tr>
                <td style=" width:13%"></td>
                <!-- <td style="width: 2%;"></td> -->
                <td style="width: 35%;"></td>
                <td style="width: 7%;"></td>
                <td style="width: 5%">&nbsp;</td>
                <td colspan="13" style=" padding-left: 25px;">di</td>
            </tr>
            <tr>
                <td style="width:13%"></td>
                <td style="width:2%;"></td>
                <td style="width:35%;"></td>
                <td style="width:7%;"></td>
                <td style="width: 5%">&nbsp;</td>
                <td colspan="13" style="padding-left: 10px;"> &nbsp; J a k a r t a</td>
            </tr>
        </table>
    </div>

    <div class="content-data">
        <table id="content">
            <tr>
                <td>
                    Sehubungan dengan pelanggaran lalu lintas dan angkutan jalan yang dilakukan oleh kendaraan sebagai berikut :
                </td>
            </tr>
        </table>
    </div>

    <div class="data_kendaraan">
        <table id="content-table">
            <tr>
                <td style="width:40%;">
                    1. Nomor Kendaraan
                </td>
                <td style="width: 5%;">
                    :
                </td>
                <td> <span style="text-transform: uppercase; letter-spacing:2px"> <?= $pengeluaran->kode_wilayah_awal ?> <?= $pengeluaran->nomor_kendaraan ?> <?= $pengeluaran->kode_wilayah_akhir ?> </span> </td>
            </tr>
            <tr>
                <td>
                    2. Jenis Kendaraan
                </td>
                <td>
                    :
                </td>
                <td> <span style="text-transform: capitalize; letter-spacing:1px"> <?= $pengeluaran->type_kendaraan ?> / <?= $pengeluaran->jenis_kendaraan ?> </span></td>
            </tr>
            <tr>
                <td>
                    3. Nomor Rangka
                </td>
                <td>
                    :
                </td>
                <td> <span style="text-transform: uppercase;"> <?= $pengeluaran->nomor_rangka ?> </span></td>
            </tr>
            <tr>
                <td>
                    4. Nomor Mesin
                </td>
                <td>
                    :
                </td>
                <td> <span style="text-transform: uppercase;"> <?= $pengeluaran->nomor_mesin ?> </span></td>
            </tr>
            <tr>
                <td>
                    5. Nama Pemilik / Perusahaan
                </td>
                <td>
                    :
                </td>
                <td> <span style="text-transform: capitalize;"> <?= $pengeluaran->nama_pemilik ?> </span></td>
            </tr>
            <tr>
                <td style="vertical-align: top;">
                    6. Alamat
                </td>
                <td style="vertical-align: top;">
                    :
                </td>
                <td> <span style="text-transform: capitalize;"><?= $pengeluaran->alamat_pemilik_kendaraan ?></span> </td>
            </tr>
            <tr>
                <td>
                    7. Pelanggaran
                </td>
                <td>
                    :
                </td>
                <td> <span style="text-transform: capitalize;"> <?= $pengeluaran->jenis_pelanggaran ?></span> </td>
            </tr>
            <tr>
                <td>
                    8. Lokasi
                </td>
                <td>
                    :
                </td>
                <td> <span style="text-transform: capitalize;">Jl. <?= $pengeluaran->lokasi_penindakan ?></span> </td>
            </tr>
            <tr>
                <td>
                    9. Pada Hari / Tanggal
                </td>
                <td>
                    :
                </td>
                <td> <?= tanggal_indonesia(date('Y-m-d', strtotime($pengeluaran->tanggal_penindakan))) ?>, <?= date_indo(date('Y-m-d', strtotime($pengeluaran->tanggal_penindakan))) ?></td>
            </tr>
        </table>
    </div>

    <div class="content-footer">
        <table id="paragraf-footer">
            <tr>
                <td>
                    <p>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Bersama ini diberitahukan bahwa kendaraan tersebut diatas dapat dikeluarkan dari Terminal Mobil Barang Pool <span class="transform"> <?= $pengeluaran->tempat_penyimpanan ?></span> Dinas Perhubungan Provinsi DKI Jakarta, sehubungan yang bersangkutan telah :
                        <br>
                        a. Membuat surat pernyataan;
                        <br>
                        b. Mengikuti Sidang Pengadilan;
                        <br>
                        c. Melengkapi surat-surat kendaraan dimaksud;
                        <br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Demikian untuk dimaklumi dan pelaksaan lebih lanjut.
                    </p>
                </td>
            </tr>
        </table>
    </div>

    <div class="ttd_data">
        <?php if ($pengeluaran->status_kendaraan_id != 2) : ?>
            <table id="ttd">
                <tr>
                    <td style="color: white;">a.n. Kepala Dinas Perhubungan Provinsi DKI Jakarta</td>
                    <td style="text-align: center;">a.n. Kepala Dinas Perhubungan Provinsi DKI Jakarta</td>
                </tr>
                <tr>
                    <td style="color: white;">a.n. Kepala Dinas Perhubungan Provinsi DKI Jakarta</td>
                    <td style="text-align: center;">Kepala Bidang Pengendalian Operasional</td>
                </tr>
                <tr>
                    <td style="color: white;">Lalu Lintas Dan Angkutan Jalan</td>
                    <td style="text-align: center;">Lalu Lintas Dan Angkutan Jalan</td>
                </tr>
                <tr>
                    <td style="color: white;">Lalu Lintas Dan Angkutan Jalan</td>
                </tr>
                <tr>
                    <td style="color: white;">Lalu Lintas Dan Angkutan Jalan</td>
                    <td style="text-align: center;"></td>
                </tr>
                <tr>
                    <td style="color: white;">Lalu Lintas Dan Angkutan Jalan</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="color: white;">NAMA LENGKAP</td>
                    <td style="text-align: center; text-transform:capitalize"><?= $pejabat->nama ?></td>
                </tr>
                <tr>
                    <td style="color: white;">NAMA LENGKAP</td>
                    <td style="text-align: center">NIP. <?= $pejabat->nip ?> </td>
                </tr>
            </table>
        <?php else : ?>
            <table id="ttd">
                <tr>
                    <td style="color: white;">a.n. Kepala Dinas Perhubungan Provinsi DKI Jakarta</td>
                    <td style="text-align: center;">a.n. Kepala Dinas Perhubungan Provinsi DKI Jakarta</td>
                </tr>
                <tr>
                    <td style="color: white;">Kepala Bidang Pengendalian Operasional</td>
                    <td style="text-align: center;">Kepala Bidang Pengendalian Operasional</td>
                </tr>
                <tr>
                    <td style="color: white;">Kepala Bidang Pengendalian Operasional</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="color: white;">Kepala Bidang Pengendalian Operasional</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="color: white;">Kepala Bidang Pengendalian Operasional</td>
                    <td></td>
                </tr>

                <tr>
                    <td style="color: white;">NAMA LENGKAP</td>
                    <td style="text-align: center; text-transform:capitalize"><?= $pejabat->nama ?></td>
                </tr>
                <tr>
                    <td style="color: white;">NAMA LENGKAP</td>
                    <td style="text-align: center">NIP. <?= $pejabat->nip ?> </td>
                </tr>
            </table>
            <!-- <img src="ttd/ttd_12.png" alt="ttd_data" style="width: 180px; height: 130px; margin-left:400px; margin-top:-150px" class="ttd_digital"> -->
        <?php endif; ?>
    </div>
    <div class="footer">
        <table id="footer">
            <tr>
                <td>Tembusan :</td>
            </tr>
            <tr>
                <td>
                    1. Kepala Dinas Perhubungan Prov. DKI Jakarta;
                </td>
            </tr>
            <tr>
                <td>
                    2. Sekretaris Dinas Perhubungan Provinsi Dki Jakarta.
                </td>
            </tr>

        </table>
    </div>


</body>

</html>