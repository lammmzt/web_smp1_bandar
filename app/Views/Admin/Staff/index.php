<?= $this->extend('Template/index'); ?>
<?= $this->section('konten'); ?>
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- kiri kanan -->
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Data Staff</h6>
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
                                <th>Jenis Staff</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($staff as $key => $value) { ?>
                            <tr>
                                <td class="text-center align-middle">
                                    <?= $no++; ?></td>
                                <td class="text-center"><a
                                        href="<?= base_url('Assets/img/staff/' . $value['foto_staff']); ?>"
                                        target="_blank" data-fancybox="gallery"
                                        data-caption="<?= $value['nama_staff']; ?>">
                                        <img src="<?= base_url('Assets/img/staff/' . $value['foto_staff']); ?>"
                                            alt="Foto" width="70"></a>
                                </td>
                                <td class="align-middle"><?= $value['nama_staff']; ?></td>
                                <td class="align-middle"><?= $value['jenis_staff']; ?></td>
                                <td class="align-middle"><?= $value['jabatan_staff']; ?></td>
                                <td class="text-center align-middle">
                                    <a haref="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#edit<?= $value['id_staff']; ?>"> <i class="fas fa-edit"></i>
                                        Edit</a>
                                    <a href="<?= base_url('Staff/hapus/' . $value['id_staff']); ?>"
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
            <form action="<?= base_url('Staff/simpan'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Data Staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="form-group">
                        <label for="nama_staff">Nama Staff</label>
                        <input type="text" name="nama_staff" id="nama_staff" class="form-control" required
                            placeholder="Masukkan nama staff">
                    </div>
                    <div class="form-group mt-2">
                        <label for="jenis_staff">Jenis Staff</label>
                        <select name="jenis_staff" id="jenis_staff" class="form-control" required>
                            <option value="" disabled selected>Pilih Jenis Staff</option>
                            <option value="Tenaga Kependidikan">Tenaga Kependidikan</option>
                            <option value="Tenaga Pendidik">Tenaga Pendidik</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="jabatan_staff">Jabatan</label>
                        <input type="text" name="jabatan_staff" id="jabatan_staff" class="form-control" required
                            placeholder="Masukkan jabatan statff">
                    </div>
                    <div class="form-group mt-2">
                        <label for="foto_staff">Foto Staff</label>
                        <input type="file" name="foto_staff" id="foto_staff" class="form-control" required
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
<?php foreach ($staff as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_staff']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('Staff/ubah'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" name="id_staff" value="<?= $value['id_staff']; ?>">
                    <div class="form-group mt-2">
                        <label for="nama_staff">Nama Staff</label>
                        <input type="text" name="nama_staff" id="nama_staff" class="form-control" required
                            value="<?= $value['nama_staff']; ?>">
                    </div>
                    <div class="form-group mt-2">
                        <label for="jenis_staff">Jenis Staff</label>
                        <select name="jenis_staff" id="jenis_staff" class="form-control" required>
                            <option value="" disabled selected>Pilih Jenis Staff</option>
                            <option value="Tenaga Kependidikan"
                                <?= ($value['jenis_staff'] == 'Tenaga Kependidikan') ? 'selected' : ''; ?>>Tenaga
                                Kependidikan
                            </option>
                            <option value="Tenaga Pendidik"
                                <?= ($value['jenis_staff'] == 'Tenaga Pendidik') ? 'selected' : ''; ?>>
                                Tenaga Pendidik</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="jabatan_staff">Jabatan</label>
                        <input type="text" name="jabatan_staff" id="jabatan_staff" class="form-control" required
                            value="<?= $value['jabatan_staff']; ?>">
                    </div>
                    <div class="form-group mt-2">
                        <label for="foto_staff">Foto Staff</label>
                        <input type="file" name="foto_staff" id="foto_staff" class="form-control"
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