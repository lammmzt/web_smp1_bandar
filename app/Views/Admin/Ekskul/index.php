<?= $this->extend('Template/index'); ?>
<?= $this->section('konten'); ?>
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- kiri kanan -->
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Data Ekskul</h6>
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
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($ekskul as $key => $value) { ?>
                            <tr>
                                <td class="text-center align-middle">
                                    <?= $no++; ?></td>
                                <td class="text-center"><a
                                        href="<?= base_url('Assets/img/ekskul/' . $value['foto_ekskul']); ?>"
                                        target="_blank" data-fancybox="gallery"
                                        data-caption="<?= $value['nama_ekskul']; ?>">
                                        <img src="<?= base_url('Assets/img/ekskul/' . $value['foto_ekskul']); ?>"
                                            alt="Foto" width="70"></a>
                                </td>
                                <td class="align-middle"><?= $value['nama_ekskul']; ?></td>
                                <td class="align-middle"><?= $value['deskripsi_ekskul']; ?></td>
                                <td class="text-center align-middle">
                                    <a haref="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#edit<?= $value['id_ekskul']; ?>"> <i class="fas fa-edit"></i>
                                        Edit</a>
                                    <a href="<?= base_url('Ekskul/hapus/' . $value['id_ekskul']); ?>"
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
            <form action="<?= base_url('Ekskul/simpan'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Data ekskul</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="form-group">
                        <label for="nama_ekskul">Nama ekskul</label>
                        <input type="text" name="nama_ekskul" id="nama_ekskul" class="form-control" required
                            placeholder="Masukkan nama ekskul">
                    </div>
                    <div class="form-group mt-2">
                        <label for="deskripsi_ekskul">Deskripsi</label>
                        <textarea name="deskripsi_ekskul" id="deskripsi_ekskul" class="form-control" required
                            placeholder="Masukkan deskripsi ekskul"></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label for="foto_ekskul">Foto ekskul</label>
                        <input type="file" name="foto_ekskul" id="foto_ekskul" class="form-control" required
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
<?php foreach ($ekskul as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_ekskul']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('Ekskul/ubah'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data ekskul</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" name="id_ekskul" value="<?= $value['id_ekskul']; ?>">
                    <div class="form-group mt-2">
                        <label for="nama_ekskul">Nama ekskul</label>
                        <input type="text" name="nama_ekskul" id="nama_ekskul" class="form-control" required
                            value="<?= $value['nama_ekskul']; ?>">
                    </div>
                    <div class="form-group mt-2">
                        <label for="deskripsi_ekskul">Deskripsi</label>
                        <textarea name="deskripsi_ekskul" id="deskripsi_ekskul" class="form-control"
                            required><?= $value['deskripsi_ekskul']; ?></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label for="foto_ekskul">Foto ekskul</label>
                        <input type="file" name="foto_ekskul" id="foto_ekskul" class="form-control"
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