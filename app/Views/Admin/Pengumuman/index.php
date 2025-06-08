<?= $this->extend('Template/index'); ?>
<?= $this->section('konten'); ?>
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- kiri kanan -->
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Data pengumuman</h6>
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
                                <th>Tipe</th>
                                <th>Tanggal</th>
                                <th>File Media</th>
                                <th>Nama pengumuman</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pengumuman as $key => $value) { ?>
                            <tr>
                                <td class="text-center align-middle">
                                    <?= $no++; ?></td>
                                <td class="align-middle text-center">
                                    <?php if ($value['tipe_pengumuman'] == '0') {
                                        echo '<span class="badge badge-primary">Berita</span>';
                                    } else {
                                        echo '<span class="badge badge-danger">Pengumuman</span>';
                                    } ?>
                                </td>
                                <td class="text-center align-middle">
                                    <?= date('d-m-Y', strtotime($value['created_at'])); ?>
                                </td>
                                <td class="text-center">
                                    <?php 
                                    if ($value['type_media'] == '0') {
                                        echo '<a
                                        href="' . base_url('Assets/img/Pengumuman/' . $value['nama_media']) . '"
                                        target="_blank" data-fancybox="gallery"
                                        data-caption="' . $value['judul_pengumuman'] . '"><img src="' . base_url('Assets/img/Pengumuman/' . $value['nama_media']) . '"
                                            class="img-fluid" width="100" height="100"></a>';
                                    } else {
                                        echo '<iframe width="100" height="100" src="' . $value['nama_media'] . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                    }
                                    ?>
                                </td>
                                <td class="align-middle"><?= $value['judul_pengumuman']; ?></td>

                                <td class="align-middle text-center">
                                    <!-- swithcer -->
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input status_pengumuman"
                                            id="<?= $value['id_pengumuman']; ?>"
                                            <?= ($value['status_pengumuman'] == '1') ? 'checked' : ''; ?>>
                                        <label class="custom-control-label"
                                            for="<?= $value['id_pengumuman']; ?>"></label>
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <a haref="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#edit<?= $value['id_pengumuman']; ?>"> <i class="fas fa-edit"></i>
                                        Edit</a>
                                    <a href="<?= base_url('Pengumuman/hapus/' . $value['id_pengumuman']); ?>"
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
<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form enctype="multipart/form-data" id="formAdd">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Data pengumuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="form-group">
                        <label for="judul_pengumuman">Judul pengumuman</label>
                        <input type="text" name="judul_pengumuman" id="judul_pengumuman" class="form-control" required
                            placeholder="Masukkan judul pengumuman">
                    </div>
                    <!-- Tipe pengumuman -->
                    <div class="form-group mt-2">
                        <label for="tipe_pengumuman">Tipe pengumuman</label>
                        <select name="tipe_pengumuman" id="tipe_pengumuman" class="form-control" required>
                            <option value="">Pilih Tipe pengumuman</option>
                            <option value="0">Berita</option>
                            <option value="1">Pengumuman Kegiatan</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="type_media">Tipe Media</label>
                        <select name="type_media" id="type_media" class="form-control" required>
                            <option value="">Pilih Tipe Media</option>
                            <option value="0">Foto</option>
                            <option value="1">Video</option>
                        </select>
                    </div>
                    <div class="form-group mt-2" id="foto_media_div" style="display: none;">
                        <label for="foto_media">Foto pengumuman</label>
                        <input type="file" name="foto_media" id="foto_media" class="form-control"
                            accept="image/*, .jpg, .jpeg, .png">
                    </div>

                    <div class="form-group mt-2" id="link_vid_div" style="display: none;">
                        <label for="link_vid">Link Video Youtube</label>
                        <input type="text" name="link_media" id="link_vid" class="form-control"
                            placeholder="Masukkan link video youtube">
                        <small class="text-danger ">*Pastikan link video youtube yang diinputkan adalah link
                            embed video
                            <a href="https://www.youtube.com/embed/_6i6fsa9TL4?si=G3MBxVqs-12OnPUz" target="_blank">
                                Contoh :
                                https://www.youtube.com/embed/_6i6fsa9TL4?si=G3MBxVqs-12OnPUz</a> </small>
                    </div>
                    <div class="form-group mt-2" id="preview_vid_div" style="display: none;">
                        <label for="preview_vid">Preview Video</label>
                        <div class="embed-responsive embed-responsive-16by9">
                            <!-- <iframe class="embed-responsive-item" src="" allowfullscreen></iframe> -->
                            <iframe class="embed-responsive-item" width="560" height="315" id="preview_vid" src=""
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="deskripsi_pengumuman">Deskripsi pengumuman</label>
                        <div id="deskripsi_pengumuman" style="min-height: 160px;"></div>
                    </div>

                    <div class="form-group mt-2">
                        <label for="tag_pengumuman">Tag pengumuman</label>
                        <input type="text" name="tag_pengumuman" id="tag_pengumuman" class="form-control" required
                            placeholder="Masukkan tag pengumuman">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="btnSimpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- edit -->
<?php foreach ($pengumuman as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_pengumuman']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form enctype="multipart/form-data" class="form_edit" id="formEdit"
                data-id="<?= $value['id_pengumuman']; ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data pengumuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" name="id_pengumuman" value="<?= $value['id_pengumuman']; ?>">
                    <div class="form-group">
                        <label for="judul_pengumuman">Judul pengumuman</label>
                        <input type="text" name="judul_pengumuman" id="judul_pengumuman" class="form-control" required
                            value="<?= $value['judul_pengumuman']; ?>">
                    </div>
                    <div class="form-group mt-2">
                        <label for="tipe_pengumuman">Tipe pengumuman</label>
                        <select name="tipe_pengumuman" id="tipe_pengumuman" class="form-control" required>
                            <option value="">Pilih Tipe pengumuman</option>
                            <option value="0" <?= ($value['tipe_pengumuman'] == '0') ? 'selected' : ''; ?>>Berita
                            </option>
                            <option value="1" <?= ($value['tipe_pengumuman'] == '1') ? 'selected' : ''; ?>>Pengumuman
                                Kegiatan</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="type_media">Tipe Media</label>
                        <select name="type_media" id="type_media" class="form-control disabled" required>
                            <option value="">Pilih Tipe Media</option>
                            <option value="0" <?= ($value['type_media'] == '0') ? 'selected' : ''; ?>>Foto</option>
                            <option value="1" <?= ($value['type_media'] == '1') ? 'selected' : ''; ?>>Video</option>
                        </select>
                    </div>
                    <?php 
                    if($value['type_media'] == '0'){
                        echo '<div class="form-group mt-2">
                        <label for="foto_media">Foto pengumuman</label>
                        <input type="file" name="foto_media" id="foto_media" class="form-control"
                            accept="image/*, .jpg, .jpeg, .png">
                    </div>';
                    }else{
                        echo '<div class="form-group mt-2">
                        <label for="link_vid">Link Video Youtube</label>
                        <input type="text" name="link_media" id="link_vid" class="form-control"
                            value="'.$value['nama_media'].'">
                        <small class="text-danger ">*Pastikan link video youtube yang diinputkan adalah link
                            embed video
                            <a href="https://www.youtube.com/embed/LFLRclv2ivI?si=QZO0csKMdH_Fz0R5" target="_blank">
                                Contoh :
                                https://www.youtube.com/embed/LFLRclv2ivI?si=QZO0csKMdH_Fz0R5</a> </small>
                    </div>';
                    }
                    ?>
                    <div class="form-group mt-2">
                        <label for="deskripsi_pengumuman">Deskripsi pengumuman</label>
                        <div id="edit_deskripsi_pengumuman<?= $value['id_pengumuman']; ?>" style="min-height: 160px;"
                            class="ql-container edit_deskripsi_pengumuman">
                            <?= $value['deskripsi_pengumuman']; ?>
                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <label for="tag_pengumuman">Tag pengumuman</label>
                        <input type="text" name="tag_pengumuman" id="tag_pengumuman" class="form-control" required
                            value="<?= $value['tag_pengumuman']; ?>">
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
<script type="text/javascript">
$('#type_media').change(function() {
    var type_media = $(this).val();
    if (type_media == '0') {
        $('#foto_media_div').show();
        $('#link_vid_div').hide();
        $('#preview_vid_div').hide();
    } else if (type_media == '1') {
        $('#foto_media_div').hide();
        $('#link_vid_div').show();
    } else {
        $('#foto_media_div').hide();
        $('#link_vid_div').hide();
        $('#preview_vid_div').hide();
    }
});

var deskripsi_pengumuman = new Quill('#deskripsi_pengumuman', {
    theme: 'snow',
    placeholder: 'Deskripsi pengumuman',
    modules: {
        toolbar: [
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            ['bold', 'italic', 'underline'],
            ['link', 'blockquote', 'code-block', ],
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }],
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }],
            [{
                'direction': 'rtl'
            }],
            [{
                'size': ['small', false, 'large', 'huge']
            }],
            [{
                'color': []
            }, {
                'background': []
            }],
            [{
                'font': []
            }],
            [{
                'align': []
            }],
            ['clean']
        ]
    }

});

// tampilkan edit deskripsi pengumuman di modal edit ketika di klik
<?php foreach ($pengumuman as $key => $value) { ?>
var edit_deskripsi_pengumuman = new Quill('#edit_deskripsi_pengumuman<?= $value['id_pengumuman']; ?>', {
    theme: 'snow',
    placeholder: 'Deskripsi pengumuman',
    modules: {
        toolbar: [
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            ['bold', 'italic', 'underline'],
            ['link', 'blockquote', 'code-block', ],
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }],
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }],
            [{
                'direction': 'rtl'
            }],
            [{
                'size': ['small', false, 'large', 'huge']
            }],
            [{
                'color': []
            }, {
                'background': []
            }],
            [{
                'font': []
            }],
            [{
                'align': []
            }],
            ['clean']
        ]
    }

});
<?php } ?>



$('#link_vid').focusout(function() {
    var link_vid = $(this).val();
    $('#preview_vid').attr('src', link_vid);
    $('#preview_vid_div').show();
});

$('#formAdd').submit(function(e) {
    e.preventDefault();
    var deskripsi_pengumuman = $('#deskripsi_pengumuman .ql-editor').html();
    // console.log(deskripsi_pengumuman);
    var form = new FormData(this);
    form.append('deskripsi_pengumuman', deskripsi_pengumuman);
    document.getElementById('btnSimpan').innerHTML =
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
    document.getElementById('btnSimpan').setAttribute('disabled', 'disabled');
    // console.log(form);
    $.ajax({
        url: '<?= base_url('Pengumuman/simpan'); ?>',
        method: 'POST',
        data: form,
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
            if (response.status == '200') {
                Swal.fire({
                    title: 'Berhasil',
                    text: response.data,
                    icon: 'success',
                    timer: 2000
                })
                $('#add').modal('hide');
                document.getElementById('btnSimpan').removeAttribute('disabled');
                document.getElementById('btnSimpan').innerHTML = 'Simpan';
                window.location.reload();
            } else {
                Swal.fire({
                    title: 'Gagal',
                    text: response.data,
                    icon: 'error',
                    timer: 2000
                })
                document.getElementById('btnSimpan').removeAttribute('disabled');
                document.getElementById('btnSimpan').innerHTML = 'Simpan';
            }
        },
        error: function(xhr, status, error) {
            Swal.fire({
                title: 'Gagal',
                text: 'Terjadi kesalahan saat menyimpan data',
                icon: 'error',
                timer: 2000
            })
            document.getElementById('btnSimpan').removeAttribute('disabled');
            document.getElementById('btnSimpan').innerHTML = 'Simpan';
        }
    });
});

// update pengumuman 
$('.form_edit').submit(function(e) {
    e.preventDefault();
    var id_pengumuman = $(this).data('id');
    var deskripsi_pengumuman = $('#edit_deskripsi_pengumuman' + id_pengumuman + ' .ql-editor').html();
    // console.log(deskripsi_pengumuman);
    var form = new FormData(this);
    form.append('deskripsi_pengumuman', deskripsi_pengumuman);
    $.ajax({
        url: '<?= base_url('Pengumuman/ubah'); ?>',
        method: 'POST',
        data: form,
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
            if (response.status == '200') {
                Swal.fire({
                    title: 'Berhasil',
                    text: response.data,
                    icon: 'success',
                    timer: 2000
                })
                $('.form_edit')[0].reset();
                $('.form_edit').closest('.modal').modal('hide');
                window.location.reload();
            } else {
                Swal.fire({
                    title: 'Gagal',
                    text: response.data,
                    icon: 'error',
                    timer: 2000
                })
            }
        },
        error: function(xhr, status, error) {
            Swal.fire({
                title: 'Gagal',
                text: 'Terjadi kesalahan saat mengubah data',
                icon: 'error',
                timer: 2000
            })
        }
    });
});

// update status
$('.status_pengumuman').change(function() {
    var id = $(this).attr('id');
    var status = $(this).prop('checked');
    if (status == true) {
        status = '1';
    } else {
        status = '0';
    }
    $.ajax({
        url: '<?= base_url('Pengumuman/update_status'); ?>',
        method: 'POST',
        data: {
            id: id,
            status: status
        },
        success: function(response) {
            if (response.status == '200') {
                Swal.fire({
                    title: 'Berhasil',
                    text: response.data,
                    icon: 'success',
                    timer: 2000
                })
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