<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Pengantar Pengeluaran Kendaraan</title>
    <link href="/assets/img/logo2.png" rel="icon">
    <link href="/assets/img/logo2.png" rel="apple-touch-icon">
</head>
<style>
    * {
        margin: -10px auto;

    }

    header {
        box-sizing: border-box;
    }

    #kopSurat {
        /* margin-top: -20px; */
        width: 100%;
        box-sizing: border-box;
    }

    hr {
        margin-top: -2px;
        box-sizing: border-box;
    }

    .logo {
        margin-top: -20px;
        width: 70px;
    }

    #p1 {
        font-size: 18px;
        text-transform: uppercase;
        line-height: 15px;
        letter-spacing: 1px;
        font-style: normal;
        /* border: 1px solid black; */
    }

    #sudin {
        font-size: 18px;
        text-transform: uppercase;
        line-height: 15px;
        letter-spacing: 1px;
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
        width: 100%;


    }

    #noSuratKend,
    td {
        font-size: 14px;
        font-family: 'Arial';
    }

    .content-data {
        box-sizing: border-box;
        width: 100%;
        margin: 0 auto;
    }

    #content {
        font-family: 'Arial';
        padding-left: 100px;
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
        padding-left: 65px;
        text-transform: capitalize;
        /* margin: 0 auto; */
        line-height: 25px;
        font-family: 'Arial';
    }

    .content-footer {
        width: 100%;
        margin: 0 auto;

    }

    #paragraf-footer {
        text-transform: capitalize;
        padding-left: 100px;
        line-height: 25px;
        font-family: 'Arial';
        text-align: justify;
    }

    .transform {
        text-transform: capitalize;
    }

    .ttd_data {
        margin: 0 auto;
        padding-left: 100px;
        width: 100%;
        box-sizing: border-box;
    }

    .footer {
        box-sizing: border-box;
        width: 100%;
    }

    #footer {
        font-size: 12px;
        text-transform: capitalize;
        font-family: 'Arial';
    }
</style>


<body>
    <table id="kopSurat">
        <tr>
            <td>
                <img class="logo" src="assets/img/logo.png" alt="logo" />
            </td>
            <td align="center">
                <p id="p1">pemerintah daerah khusus ibu kota jakarta</p>
                <p id="p1">dinas perhubungan</p>
                <p id="sudin">Suku Dinas Perhubungan</p>
                <?php if ($pengeluaran->ukpd_id == 2) : ?>
                    <p id="sudin"> Kota Administrasi Jakarta Pusat</p>
                    <p id="p3">Jalan Stasiun Senen Nomor 4 Jakarta Pusat Telp/Fax (021) 42887286</p>
                    <p id="p4">E-mail : sudinhub-jakpus@jakarta.go.id </p>
                <?php elseif ($pengeluaran->ukpd_id == 3) :  ?>
                    <p id="sudin">Kota Administrasi Jakarta Barat</p>
                    <p id="p3">Jalan Ring Road Komplek Pool Rawa Buaya Cengkareng</p>
                    <p id="p4"> Jakarta Barat Telp/Fax : 021 - 5459548 E-mail : sudinhubjakbar@gmail.com </p>
                <?php elseif ($pengeluaran->ukpd_id == 4) :  ?>
                    <p id="sudin">Kota Administrasi Jakarta Utara</p>
                    <p id="p3">Jalan Yos Sudarso No. 12 Telp.( 021 ) 22431131Fax : 43932244</p>
                    <p id="p4">E-mail : sudinhubju@gmail.com </p>
                <?php elseif ($pengeluaran->ukpd_id == 5) :  ?>
                    <p id="sudin">Kota Administrasi Jakarta Timur</p>
                    <p id="p3">Jalan Perserikatan Nomor 1 Telepon 4704242 Faksimile 4704242</p>
                    <p id="p4">E-mail : sudinhubjaktim@gmail.com </p>
                <?php elseif ($pengeluaran->ukpd_id == 6) :  ?>
                    <p id="sudin">Kota Administrasi Jakarta Timur</p>
                    <p id="p3">Jalan Perserikatan Nomor 1 Telepon 4704242 Faksimile 4704242</p>
                    <p id="p4">E-mail : sudinhubjaktim@gmail.com </p>
                <?php elseif ($pengeluaran->ukpd_id == 6) :  ?>
                    <p id="sudin">Kota Administrasi Jakarta Selatan</p>
                    <p id="p3">Jl MT Haryono Kav. 45 - 46 Lt.4 Telp. 79160069 Fax.79160071</p>
                    <!-- <p id="p4">E-mail : sudinhubjaktim@gmail.com </p> -->
                <?php endif; ?>
                <p id="p4">J A K A R T A</p>
            </td>

        </tr>
        <tr>
            <?php if ($pengeluaran->ukpd_id == 2) : ?>
                <td colspan="3" align="right" id="p5">
                    Kode Pos : 10410
                </td>
            <?php elseif ($pengeluaran->ukpd_id == 3) : ?>
                <td colspan="3" align="right" id="p5">
                    Kode Pos : 11740
                </td>
            <?php elseif ($pengeluaran->ukpd_id == 4) : ?>
                <td colspan="3" align="right" id="p5">
                    Kode Pos : 14230
                </td>
            <?php elseif ($pengeluaran->ukpd_id == 5) : ?>
                <td colspan="3" align="right" id="p5">
                    Kode Pos : 13220
                </td>
            <?php elseif ($pengeluaran->ukpd_id == 6) : ?>
                <td colspan="3" align="right" id="p5">
                    <!-- Kode Pos : 13220 -->
                </td>
            <?php endif; ?>
        </tr>
    </table>

    <hr id="devine">

    <div class="noSurat">
        <br>
        <table id="noSuratKend">
            <tr>
                <td style="width:13%"> Nomor</td>
                <td style="width: 2%;">:</td>
                <td style="text-transform: uppercase;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;/ PH.06.00</td>
                <td style="width: 10%;"></td>
                <td colspan="14" align="center">
                    &nbsp;&nbsp;&nbsp;&nbsp; <?= date_indo(date('Y-m-d', strtotime($pengeluaran->tanggal_keluar))) ?>
                </td>
                <!-- <td colspan="">&nbsp;</td> -->
            </tr>
            <tr>
                <td style="width:1%"> Perihal</td>
                <td style="width: 2%;">:</td>
                <td>Penting</td>
                <td style="width: 10%;"></td>
                <td colspan="14"></td>
            </tr>
            <tr>
                <td style="width:13%"> Lampiran</td>
                <td style="width: 2%;">:</td>
                <td>1 (satu) berkas</td>
                <td style="width: 10%;text-align:right">Yth.</td>
                <td colspan="14"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepada</td>

            </tr>
            <tr>
                <td style="width:13%;vertical-align:top;"> Hal</td>
                <td style="width: 2%;vertical-align:top;">:</td>
                <td style="width: 35%;">Permohonan Surat Pengeluaran Kendaraan</td>
                <td style="width: 10%;"></td>
                <td colspan="14" style="padding-left: 33px;vertical-align:top;">Kepala Dinas Perhubungan <br> Provinsi DKI Jakarta</td>
            </tr>
            <tr>
                <td style="width:13%;vertical-align:top;"> </td>
                <td style="width: 2%;vertical-align:top;"></td>
                <td style="width: 35%;"></td>
                <td style="width: 10%;"></td>
                <td colspan="14" style="padding-left: 33px;vertical-align:top;">di </td>
            </tr>
            <tr>
                <td style="width:13%;vertical-align:top;"> </td>
                <td style="width: 2%;vertical-align:top;"></td>
                <td style="width: 35%;"></td>
                <td style="width: 10%;"></td>
                <td colspan="14" style="padding-left: 75px;vertical-align:top;">Jakarta </td>
            </tr>

        </table>
    </div>

    <div class="content-data">
        <table id="content">
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sesuai Dengan Surat Keputusan Kepala Dinas Peruhubungan Provinsi DKI Jakarta Nomor : e-0007 tentang Surat Pengeluaran Kendaraan Stop Operasi Karena Pelanggaran Persyaratan Teknis dan Kelaikan Jalan Kendaraan Bermotor, maka dengan ini kami mengajukan surat pengeluaran kendaraan bermotor sebagai berikut:
                </td>
            </tr>
        </table>
    </div>

    <div class="data_kendaraan">
        <table id="content-table">
            <tr>
                <td style="width:40%">
                    Nomor Kendaraan
                </td>
                <td style="width: 5%;">
                    :
                </td>
                <td> <span style="text-transform: uppercase;"> <?= $pengeluaran->kode_wilayah_awal ?> <?= $pengeluaran->nomor_kendaraan ?> <?= $pengeluaran->kode_wilayah_akhir ?> </span> </td>
            </tr>
            <tr>
                <td>
                    Nama Pemilik
                </td>
                <td>
                    :
                </td>
                <td> <span style="text-transform: capitalize;"> <?= $pengeluaran->nama_pemilik ?> </span></td>
            </tr>
            <tr>
                <td>
                    Jenis Kendaraan
                </td>
                <td>
                    :
                </td>
                <td> <span style="text-transform: capitalize;"> <?= $pengeluaran->type_kendaraan ?> - <?= $pengeluaran->jenis_kendaraan ?> </span></td>
            </tr>
            <tr>
                <td>
                    Jenis Pelanggaran
                </td>
                <td>
                    :
                </td>
                <td> <span style="text-transform: capitalize;"> <?= $pengeluaran->jenis_pelanggaran ?> </span></td>
            </tr>
            <tr>
                <td>
                    Tempat Penyimpanan
                </td>
                <td>
                    :
                </td>
                <td> <span style="text-transform: capitalize;"> terminal mobil barang <?= $pengeluaran->tempat_penyimpanan ?> </span></td>
            </tr>

        </table>
    </div>

    <div class="content-footer">
        <table id="paragraf-footer">
            <tr>
                <td>
                    <p>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Surat permohonan ini dibuat dengan pertimbangan bahwa atas kendaraan bermotor tersebut telah melengkapi surat-surat kendaraan sebagaimana terlampir dan telah mengikuti sidang di <span style="text-transform: capitalize;"><?= $pengeluaran->lokasi_sidang ?></span> pada tanggal <?= date_indo(date('Y-m-d', strtotime($pengeluaran->tanggal_sidang))) ?>.
                        <br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Demikian Permohonan ini disampaikan, atas perhatian dan perkenannya diucapkan terimakasih.
                    </p>
                </td>
            </tr>
        </table>
    </div>
    <div class="ttd_data">
        <table id="ttd">
            <tr>
                <td style=" color: white;width:35%">Kepala Suku Dinas </td>
                <td style="color: white; width:25%"></td>
                <td style="text-align: center;">Kepala Suku Dinas Perhubungan</td>
            </tr>
            <tr>
                <td style="color: white;"></td>
                <td style="color: white;width:25%"></td>
                <?php if ($pengeluaran->ukpd_id == 2) : ?>
                    <td style="text-align: center;">Kota Administrasi Jakarta Pusat, </td>
                <?php elseif ($pengeluaran->ukpd_id == 3): ?>
                    <td style="text-align: center;">Kota Administrasi Jakarta Barat, </td>
                <?php elseif ($pengeluaran->ukpd_id == 4): ?>
                    <td style="text-align: center;">Kota Administrasi Jakarta Utara, </td>
                <?php elseif ($pengeluaran->ukpd_id == 5): ?>
                    <td style="text-align: center;">Kota Administrasi Jakarta Timur, </td>
                <?php elseif ($pengeluaran->ukpd_id == 6): ?>
                    <td style="text-align: center;">Kota Administrasi Jakarta Selatan, </td>
                <?php endif; ?>
            </tr>
            <tr>
                <td style="color: white;"></td>
                <td style="color: white;"></td>
                <td style="color: white;">Kepala Bidang Pengendalian Operasional</td>
            </tr>
            <tr>
                <td style="color: white;"></td>
                <td style="color: white;"></td>
                <td style="color: white;">Kepala Bidang Pengendalian Operasional</td>
            </tr>
            <tr>
                <td style="color: white;">NAMA LENGKAP</td>
                <td style="color: white;width:25%">NAMA LENGKAP</td>
                <td style="text-align: center; text-transform:capitalize"><?= $pejabat->nama ?></td>
            </tr>
            <tr>
                <td style="color: white;">NAMA LENGKAP</td>
                <td style="color: white;width:25">NAMA LENGKAP</td>
                <td style="text-align: center">NIP. <?= $pejabat->nip ?> </td>
            </tr>
        </table>
    </div>
    <div class="footer">
        <table id="footer">
            <tr>
                <td>Tembusan :</td>
            </tr>
            <tr>
                <td>
                    1. Wakil Kepala Dinas Perhubungan Provinsi DKI Jakarta;
                </td>
            </tr>
            <tr>
                <td>
                    2. Kabid Pengendalian Operasional LLAJ Dinas Perhubungan Provinsi DKI Jakarta;
                </td>
            </tr>
            <tr>
                <td>
                    3. Kabid Angkutan Jalan Dinas Perhubungan Provinsi DKI Jakarta.
                </td>
            </tr>

        </table>
    </div>


</body>

</html>