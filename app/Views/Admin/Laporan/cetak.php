<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Pengecekan <?= $pengecekan[0]['nama_master_posyandu']; ?> Periode
        <?= date('d-m-Y', strtotime($tgl_awal)) ?> s/d
        <?= date('d-m-Y', strtotime($tgl_akhir)) ?></title>
    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    h2 {
        text-align: center;
    }

    p {
        margin-top: 0;
        margin-bottom: 5px;
    }

    .table-header {
        width: 100%;
        margin-top: 0px;
    }

    .table-header tr:nth-child(even) {
        background-color: white;
    }

    .table-header td {
        padding: 5px;
    }

    .table-header td:first-child {
        padding-top: 0;
    }

    .table-header td:last-child {
        padding-bottom: 2px;
    }

    table {
        width: 99%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th {
        background-color: #f2f2f2;
        color: black;
    }

    table th,
    table td {
        padding: 8px;
        text-align: left;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* media a4 */
    @page {
        size: A4 landscape;
    }
    </style>
    <script>
    window.print();

    window.onafterprint = function() {
        window.close();
    }
    </script>

<body>
    <!-- <img src="<?= base_url('Assets/kop.png') ?>" alt="" style="width: 100%; height: 150px;"> -->
    <table border="0" cellpadding="5" cellspacing="0" class="table-header">
        <tr>
            <td colspan="2">
                <h2>Laporan Data Pengecekan Balita <?= $pengecekan[0]['nama_master_posyandu']; ?></h2>
            </td>
        </tr>
        <tr>
            <td width="70px">Periode</td>
            <td>: <?= date('d-m-Y', strtotime($tgl_awal)) ?> s/d <?= date('d-m-Y', strtotime($tgl_akhir)) ?></td>
        </tr>
    </table>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th style="text-align: center">No</th>
                <th>Tgl Pengecekan</th>
                <th>Nama Balita</th>
                <th>Nama Orang Tua</th>
                <th style="text-align: center">Jenis Kelamin</th>
                <th style="text-align: center">Umur</th>
                <th>Alamat</th>
                <th style="text-align: center">Berat Badan</th>
                <th style="text-align: center">Tinggi Badan</th>
                <th style="text-align: center">Ket Pengecekan</th>
                <th>Nama kader</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
                if($pengecekan != null){
                    foreach ($pengecekan as $key => $value) {
                        $tanggal_lahir = date_create($value['tanggal_lahir_balita']);
                        $tgl_pengecekan = date_create($value['tgl_pengecekan']);
                        $umur = date_diff($tanggal_lahir, $tgl_pengecekan);
            ?>
            <tr>
                <td style="text-align: center"><?= $no++; ?></td>
                <td><?= $value['tgl_pengecekan']; ?></td>
                <td><?= $value['nama_balita']; ?></td>
                <td><?= $value['nama_orang_tua']; ?></td>
                <td style="text-align: center">
                    <?= ($value['jenis_kelamin_balita'] == 'L') ? 'Laki-Laki' : 'Prenmpuan'?> </td>
                <td><?= $umur->y.' Tahun '.$umur->m.' Bulan '.$umur->d.' Hari'; ?></td>
                <td>
                    <?= $value['alamat_orang_tua']; ?>
                </td>
                <td style="text-align: center"><?= $value['berat_badan']; ?>Kg</td>
                <td style="text-align: center"><?= $value['tinggi_badan']; ?>Cm</td>
                <td><?= $value['ket_pengecekan']; ?>Cm</td>
                <td><?= $value['nama_user']; ?></td>
            </tr>
            <?php
               } 
              }else{
                  echo '<tr><td colspan="11" style="text-align: center">Data Tidak Ditemukan</td></tr>';
              }
              
              ?>
        </tbody>
    </table>


    <!-- form ttd -->
    <!-- <table style="width: 100%; margin-top: 20px;" border="0" cellpadding="5" cellspacing="0">
        <tr>
            <td style="width: 50%; text-align: center;">
                <p>Mengetahui</p>
                <p>Ketua Posyandu</p>
                <br>
                <br>
                <br>
                <p>(...........................................)</p>
            </td>
            <td style="width: 50%; text-align: center;">
                <p>Pekalongan, <?= date('d-m-Y') ?></p>
                <p>Yang Membuat</p>
                <br>
                <br>
                <br>
                <p>(...........................................)</p>
            </td>
        </tr>
    </table> -->
</body>

</html>