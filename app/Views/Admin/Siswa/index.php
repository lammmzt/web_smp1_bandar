<?= $this->extend('Template/index'); ?>
<?= $this->section('konten'); ?>
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- kiri kanan -->
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
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
                                <th>Tahun Ajaran</th>
                                <th>Jumlah Siswa</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($siswa as $key => $value) { ?>
                            <tr>
                                <td class="text-center align-middle">
                                    <?= $no++; ?></td>

                                <td class="align-middle text-center"><?= $value['tahun_ajaran']; ?></td>
                                <td class="align-middle text-center"><?= $value['jumlah_siswa']; ?></td>
                                <td class="align-middle text-center">
                                    <!-- swithcer -->
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input status_siswa"
                                            id="<?= $value['id_siswa']; ?>"
                                            <?= ($value['status_siswa'] == '1') ? 'checked' : ''; ?>>
                                        <label class="custom-control-label" for="<?= $value['id_siswa']; ?>"></label>
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <a haref="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#edit<?= $value['id_siswa']; ?>"> <i class="fas fa-edit"></i>
                                        Edit</a>
                                    <a href="<?= base_url('Siswa/hapus/' . $value['id_siswa']); ?>"
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
            <form action="<?= base_url('Siswa/simpan'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Data siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="form-group">
                        <label for="tahun_ajaran">Tahun Ajaran</label>
                        <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control" required
                            placeholder="Masukkan nama siswa" maxlength="9">
                    </div>
                    <div class="form-group mt-2">
                        <label for="jumlah_siswa">Jumlah Siswa</label>
                        <input type="text" name="jumlah_siswa" id="jumlah_siswa" class="form-control" required
                            placeholder="Masukkan deskripsi siswa"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            maxlength="3">
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
<?php foreach ($siswa as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_siswa']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('Siswa/ubah'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" name="id_siswa" value="<?= $value['id_siswa']; ?>">
                    <div class="form-group mt-2">
                        <label for="tahun_ajaran">Tahun Ajaran</label>
                        <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control" required
                            value="<?= $value['tahun_ajaran']; ?>" maxlength="9">
                    </div>
                    <div class="form-group mt-2">
                        <label for="jumlah_siswa">Jumlah Siswa</label>
                        <input type="text" name="jumlah_siswa" id="jumlah_siswa" class="form-control" required
                            value="<?= $value['jumlah_siswa']; ?>"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            maxlength="3">

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
<?= $this->section('script'); ?>
<script>
$('.status_siswa').change(function() {
    var id = $(this).attr('id');
    $.ajax({
        url: '<?= base_url('Siswa/updateStatus'); ?>',
        method: 'POST',
        data: {
            id_siswa: id,
        },
        success: function(response) {
            if (response.status == '200') {
                Swal.fire({
                    title: 'Berhasil',
                    text: response.data,
                    icon: 'success',
                    timer: 2000
                })
                window.location.reload();
            } else {
                Swal.fire({
                    title: 'Gagal',
                    text: response.data,
                    icon: 'error',
                    timer: 2000
                })
            }
        }
    });
});
</script>
<?= $this->endSection('script'); ?>