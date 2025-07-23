<?= $this->extend('Template/index'); ?>
<?= $this->section('konten'); ?>
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- kiri kanan -->
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Data Prestasi</h6>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-primary btn-sm float-right" href="#" data-toggle="modal" data-target="#add"><i
                                class="fas fa-plus"></i> Tambah Data</a>
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
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Foto</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($prestasi as $key => $value) { ?>
                            <tr>
                                <td class="text-center align-middle">
                                    <?= $no++; ?></td>
                                <td class="text-center"><a
                                        href="<?= base_url('Assets/img/prestasi/' . $value['foto_prestasi']); ?>"
                                        target="_blank" data-fancybox="gallery"
                                        data-caption="<?= $value['judul_prestasi']; ?>">
                                        <img src="<?= base_url('Assets/img/prestasi/' . $value['foto_prestasi']); ?>"
                                            alt="Foto" width="70"></a>
                                </td>
                                <td class="align-middle"><?= $value['judul_prestasi']; ?></td>
                                <td class="align-middle"><?= date('d F Y', strtotime($value['tanggal_prestasi'])); ?>
                                </td>
                                <td class="align-middle"><?= $value['deskripsi_prestasi']; ?></td>
                                <td class="text-center align-middle">
                                    <a haref="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#edit<?= $value['id_prestasi']; ?>"> <i class="fas fa-edit"></i>
                                        Edit</a>
                                    <a href="<?= base_url('Prestasi/hapus/' . $value['id_prestasi']); ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"> <i
                                            class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('Prestasi/simpan'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Data prestasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="form-group">
                        <label for="judul_prestasi">Judul prestasi</label>
                        <input type="text" name="judul_prestasi" id="judul_prestasi" class="form-control" required
                            placeholder="Masukkan Judul prestasi">
                    </div>
                    <div class="form-group mt-2">
                        <label for="deskripsi_prestasi">Deskripsi</label>
                        <textarea name="deskripsi_prestasi" id="deskripsi_prestasi" class="form-control" required
                            placeholder="Masukkan deskripsi prestasi"></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label for="tanggal_prestasi">Tanggal</label>
                        <input type="date" name="tanggal_prestasi" id="tanggal_prestasi" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="foto_prestasi">Foto prestasi</label>
                        <input type="file" name="foto_prestasi" id="foto_prestasi" class="form-control" required
                            accept="image/*, .jpg, .jpeg, .png">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- edit -->
<?php foreach ($prestasi as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_prestasi']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('Prestasi/ubah'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data prestasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" name="id_prestasi" value="<?= $value['id_prestasi']; ?>">
                    <div class="form-group mt-2">
                        <label for="judul_prestasi">Judul prestasi</label>
                        <input type="text" name="judul_prestasi" id="judul_prestasi" class="form-control" required
                            value="<?= $value['judul_prestasi']; ?>">
                    </div>
                    <div class="form-group mt-2">
                        <label for="deskripsi_prestasi">Deskripsi</label>
                        <textarea name="deskripsi_prestasi" id="deskripsi_prestasi" class="form-control"
                            required><?= $value['deskripsi_prestasi']; ?></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label for="tanggal_prestasi">Tanggal</label>
                        <input type="date" name="tanggal_prestasi" id="tanggal_prestasi" class="form-control" required
                            value="<?= $value['tanggal_prestasi']; ?>">
                    </div>

                    <div class="form-group mt-2">
                        <label for="foto_prestasi">Foto prestasi</label>
                        <input type="file" name="foto_prestasi" id="foto_prestasi" class="form-control"
                            accept="image/*, .jpg, .jpeg, .png">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>

        </div>
    </div>
</div>
<?php } ?>
<?= $this->endSection('kontent'); ?>