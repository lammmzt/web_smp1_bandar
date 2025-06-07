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
                <form action="<?= base_url('Laporan/Posyandu'); ?>" method="post">
                    <div class="form-group row mb-2">

                        <div class="col-sm-3 mt-2">
                            <label for="id_master_posyandu">Nama Posyandu</label>
                            <select name="id_master_posyandu" id="id_master_posyandu" style="width: 100%;"
                                class="form-control js-example-basic-multiple" required>
                                <option value="">Pilih Posyandu</option>
                                <?php foreach ($master_posyandu as $key => $value) { ?>
                                <option value="<?= $value['id_master_posyandu']; ?>"
                                    <?= ($value['id_master_posyandu'] == $id_master_posyandu) ? 'selected' : ''; ?>>
                                    <?= $value['nama_master_posyandu']; ?>
                                </option>
                                <?php } ?>
                        </div>
                        <div class="col-sm-3 mt-2">
                            <label for="tanggal_awal">Tanggal Awal</label>
                            <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" required
                                placeholder="Tanggal Awal" value="<?= $tgl_awal; ?>">
                        </div>
                        <div class="col-sm-3 mt-2">
                            <label for="tanggal_akhir">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" required
                                placeholder="Tanggal Akhir" value="<?= $tgl_akhir; ?>">
                        </div>
                        <div class="col-sm-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-sm mt-3"><i class="fas fa-search"></i>
                                Cari</button>
                            <?php 
                            if($pengecekan != null) :
                            ?>
                            <a class="btn btn-info btn-sm mt-3" id="btn_cetak" target="_blank"
                                href="<?= base_url('Laporan/cetak_posyandu/').$tgl_awal.'/'.$tgl_akhir.'/'.$id_master_posyandu; ?>"><i
                                    class="fas fa-print"></i>
                                Cetak</a>
                            <?php endif; ?>

                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th class="text-center">No</th>
                                <th>Tgl Pengecekan</th>
                                <th>Nama Balita</th>
                                <th>Nama Orang Tua</th>
                                <th class="text-center">Jenis Kelamin</th>
                                <th class="text-center">Umur</th>
                                <th>Alamat</th>
                                <th class="text-center">Berat Badan</th>
                                <th class="text-center">Tinggi Badan</th>
                                <th class="text-center">Ket Pengecekan</th>
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
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $value['tgl_pengecekan']; ?></td>
                                <td><?= $value['nama_balita']; ?></td>
                                <td><?= $value['nama_orang_tua']; ?></td>
                                <td class="text-center">
                                    <?= ($value['jenis_kelamin_balita'] == 'L') ? 'Laki-Laki' : 'Prenmpuan'?> </td>
                                <td><?= $umur->y.' Tahun '.$umur->m.' Bulan '.$umur->d.' Hari'; ?></td>
                                <td>
                                    <?= $value['alamat_orang_tua']; ?>
                                </td>
                                <td class="text-center"><?= $value['berat_badan']; ?>Kg</td>
                                <td class="text-center"><?= $value['tinggi_badan']; ?>Cm</td>
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
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>