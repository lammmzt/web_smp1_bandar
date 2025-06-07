<?= $this->extend('Template/index'); ?>
<?= $this->section('konten'); ?>
<?php 
use App\Models\balitaModel;
use App\Models\pengecekanModel;
$balitaModel = new balitaModel();
$pengecekanModel = new pengecekanModel();
?>
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- kiri kanan -->
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Data Pengecekan</h6>
                    </div>
                    <div class="col-md-6">
                        <!-- <a class="btn btn-primary btn-sm float-right" href="#" data-toggle="modal" data-target="#add"><i
                                class="fas fa-plus"></i> Tambah Data</a> -->
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> <?= session()->getFlashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> <?= session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <form action="<?= base_url('Pengecekan/histori_pengecekan_posyandu'); ?>" method="post">
                    <div class="form-group row">
                        <div class="form-group ml-2">
                            <label for="id_master_posyandu">Posyandu</label>
                            <select name="id_master_posyandu" id="id_master_posyandu" style="width: 100%;"
                                class="form-control js-example-basic-multiple" required>
                                <option value="">Pilih Posyandu</option>
                                <?php foreach ($master_posyandu as $key => $value) { ?>
                                <option value="<?= $value['id_master_posyandu']; ?>"
                                    <?= ($value['id_master_posyandu'] == $id_master_posyandu) ? 'selected' : ''; ?>>
                                    <?= $value['nama_master_posyandu']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group mx-2">
                            <label for="bulan">Bulan</label>
                            <select name="bulan" id="bulan" style="width: 100%;"
                                class="form-control js-example-basic-multiple" required>
                                <option value="">Pilih Bulan</option>
                                <?php 
                                $data_bulan = array (1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                                for ($i=1; $i <= 12; $i++) { ?>
                                <option value="<?= $i; ?>" <?= ($i == $bulan) ? 'selected' : ''; ?>>
                                    <?= $data_bulan[$i]; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_jadwal">Jadwal Pengecekan</label>
                            <select name="id_jadwal" id="id_jadwal" class="form-control js-example-basic-multiple"
                                style="width: 100%;" required>
                                <option value="">Pilih Jadwal Pengecekan</option>

                            </select>
                        </div>

                        <div class="col-sm-2 align-self-center">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th class="text-center">No</th>
                                <th>NIK</th>
                                <th>Nama Balita</th>
                                <th>Nama Orang Tua</th>
                                <th class="text-center">Jenis Kelamin</th>
                                <th class="text-center">Umur</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if($balita != null){
                                foreach ($balita as $key => $value) {
                                    $tanggal_lahir = date_create($value['tanggal_lahir_balita']);
                                    $tgl_sekarang = date_create(date('Y-m-d'));
                                    $umur = date_diff($tanggal_lahir, $tgl_sekarang);
                                    $data_pengecekan = $pengecekanModel->getPengecekanBalitaByJadwal($value['id_balita'], $id_jadwal);
                            ?>
                            <tr
                                class="text-center <?= (count($data_pengecekan) == 0) ? 'bg-danger text-white' : ''; ?>">
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $value['id_balita']; ?></td>
                                <td><?= $value['nama_balita']; ?></td>
                                <td><?= $value['nama_orang_tua']; ?></td>
                                <td class="text-center">
                                    <?= ($value['jenis_kelamin_balita'] == 'L') ? 'Laki-laki' : 'Perempuan'; ?>
                                <td class="text-center"><?= $umur->y.' Tahun '.$umur->m.' Bulan '.$umur->d.' Hari'; ?>
                                </td>
                                <td class="text-center">
                                    <?php 
                                   if (count($data_pengecekan) != 0) { ?>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#detail<?= $value['id_balita']; ?>"><i class="fas fa-eye"></i>
                                        Detail</button>
                                    <?php }else{ ?>
                                    <p class="text-white bg-danger p-1 rounded">
                                        <!-- <i class="fas fa-times"></i> -->
                                        Tidak Ada Pengecekan
                                    </p>
                                    <?php }
                                   ?>
                                </td>
                            </tr>
                            <?php
                             } 
                            }else{
                                echo '<tr><td colspan="7" class="text-center">Data Tidak Ditemukan</td></tr>';
                            }
                            
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- detail pengecekan-->
<?php 
 foreach ($pengecekan as $key => $value) {
    $tanggal_lahir = date_create($value['tanggal_lahir_balita']);
    $tgl_pengecekan = date_create($value['tgl_pengecekan']);
    $umur = date_diff($tanggal_lahir, $tgl_pengecekan);

     ?>

<div class="modal fade" id="detail<?= $value['id_balita']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pengecekan Balita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- isi detail pengecekan -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>NIK</td>
                                                <td>:</td>
                                                <td><?= $value['id_balita']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Balita</td>
                                                <td>:</td>
                                                <td><?= $value['nama_balita']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Orang Tua</td>
                                                <td>:</td>
                                                <td><?= $value['nama_orang_tua']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>:</td>
                                                <td><?= ($value['jenis_kelamin_balita'] == 'L') ? 'Laki-laki' : 'Perempuan'; ?>
                                            </tr>
                                            <tr>
                                                <td>Umur</td>
                                                <td>:</td>
                                                <td><?= $umur->y.' Tahun '.$umur->m.' Bulan '.$umur->d.' Hari'; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>Tanggal Pengecekan</td>
                                                <td>:</td>
                                                <td><?= date('d-m-Y', strtotime($value['tgl_pengecekan'])); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Berat Badan</td>
                                                <td>:</td>
                                                <td class=""><?= $value['berat_badan']; ?> Kg</td>
                                            </tr>
                                            <tr>
                                                <td>Tinggi Badan</td>
                                                <td>:</td>
                                                <td class=" "><?= $value['tinggi_badan']; ?> Cm</td>
                                            </tr>
                                            <tr>
                                                <td>Keterangan</td>
                                                <td>:</td>
                                                <td><?= $value['ket_pengecekan']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right bg-white">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?= $this->endSection('konten'); ?>

<?= $this->section('script'); ?>
<script type="text/javascript">
// function to get jadwal pengecekan
function getJadwal(id_master_posyandu, bulan) {
    $.ajax({
        url: "<?= base_url('Jadwal/getJadwalByPosyandu'); ?>",
        type: "POST",
        data: {
            id_master_posyandu: id_master_posyandu,
            bulan: bulan
        },
        dataType: "JSON",
        success: function(data) {
            $('#id_jadwal').html('');
            const hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
                'September', 'Oktober', 'November', 'Desember'
            ];
            if (data.data.length != 0) {
                $.each(data.data, function(index, value) {
                    const tanggal = new Date(value.tanggal_jadwal);
                    const hari_jadwal = hari[tanggal.getDay()];
                    const tanggal_jadwal = tanggal.getDate();
                    const bulan_jadwal = bulan[tanggal.getMonth()];
                    const tahun_jadwal = tanggal.getFullYear();
                    // alert(value.id_jadwal, <?= $id_jadwal; ?>);
                    if (value.id_jadwal == '<?= $id_jadwal; ?>') {
                        $('#id_jadwal').append(
                            `<option value="${value.id_jadwal}" selected>${hari_jadwal}, ${tanggal_jadwal} ${bulan_jadwal} ${tahun_jadwal}</option>`
                        );
                    } else {
                        $('#id_jadwal').append(
                            `<option value="${value.id_jadwal}">${hari_jadwal}, ${tanggal_jadwal} ${bulan_jadwal} ${tahun_jadwal}</option>`
                        );
                    }
                });
            } else {
                $('#id_jadwal').append(
                    `<option value="">Tidak Ada Jadwal Pengecekan</option>`
                );
            }

        }
    });
}

// ajax when select the posyandu
$('#id_master_posyandu').on('change', function() {
    var id_master_posyandu = $(this).val();
    var bulan = $('#bulan').val();
    getJadwal(id_master_posyandu, bulan);
});

// ajax when select the bulan
$('#bulan').on('change', function() {
    var bulan = $(this).val();
    var id_master_posyandu = $('#id_master_posyandu').val();
    getJadwal(id_master_posyandu, bulan);
});

$(document).ready(function() {
    getJadwal('<?= $id_master_posyandu; ?>', '<?= $bulan; ?>');
});
</script>

<?= $this->endSection('script'); ?>