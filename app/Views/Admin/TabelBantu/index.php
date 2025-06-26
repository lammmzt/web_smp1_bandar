<?= $this->extend('Template/index'); ?>
<?= $this->section('konten'); ?>
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- kiri kanan -->
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Data Tabel Bantu</h6>
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
                                <th>Nama data bantu</th>
                                <th class="text-center" width="10%">Tipe data bantu</th>
                                <th class="text-center">Isian</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($tabel_bantu as $data) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $data['nama_data_bantu']; ?></td>
                                <td class="text-center">
                                    <?php if ($data['tipe_data_bantu'] == 'Video') : ?>
                                    <span class="badge badge-info"><?= $data['tipe_data_bantu']; ?></span>
                                    <?php elseif ($data['tipe_data_bantu'] == 'Foto') : ?>
                                    <span class="badge badge-primary"><?= $data['tipe_data_bantu']; ?></span>
                                    <?php elseif ($data['tipe_data_bantu'] == 'Link') : ?>
                                    <span class="badge badge-success"><?= $data['tipe_data_bantu']; ?></span>
                                    <?php elseif ($data['tipe_data_bantu'] == 'Editor Teks') : ?>
                                    <span class="badge badge-warning"><?= $data['tipe_data_bantu']; ?></span>
                                    <?php elseif ($data['tipe_data_bantu'] == 'Textarea') : ?>
                                    <span class="badge badge-secondary"><?= $data['tipe_data_bantu']; ?></span>
                                    <?php else : ?>
                                    <span class="badge badge-dark">Tidak Diketahui</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($data['tipe_data_bantu'] == 'Video') : ?>
                                    <video width="100px" height="100px" controls>
                                        <source src="<?= base_url('Assets/tabel_bantu/' . $data['isi_data_bantu']); ?>"
                                            type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    <?php elseif ($data['tipe_data_bantu'] == 'Foto') : ?>
                                    <img src="<?= base_url('Assets/tabel_bantu/' . $data['isi_data_bantu']); ?>"
                                        class="img-fluid" alt="Foto" width="100" height="100">
                                    <?php elseif ($data['tipe_data_bantu'] == 'Link') : ?>
                                    <a href="<?= $data['isi_data_bantu']; ?>"
                                        target="_blank"><?= $data['isi_data_bantu']; ?></a>
                                    <?php elseif ($data['tipe_data_bantu'] == 'Editor Teks') : ?>
                                    <?= substr(strip_tags($data['isi_data_bantu']), 0, 50); ?>
                                    <?php elseif ($data['tipe_data_bantu'] == 'Textarea') : ?>
                                    <?= nl2br($data['isi_data_bantu']); ?>
                                    <?php else : ?>
                                    Tidak ada isian
                                    <?php endif; ?>
                                </td>
                                <td class="align-middle text-center">
                                    <!-- swithcer -->
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input status_data_bantu"
                                            id="<?= $data['id_tabel_bantu']; ?>"
                                            <?= ($data['status_data_bantu'] == '1') ? 'checked' : ''; ?>>
                                        <label class="custom-control-label"
                                            for="<?= $data['id_tabel_bantu']; ?>"></label>
                                    </div>
                                </td>

                                <td class="text-center">
                                    <a href="#" class="btn btn-success btn-sm form_edit btn_modal_edit"
                                        data-id="<?= $data['id_tabel_bantu']; ?>" data-toggle="modal"
                                        data-tipe_bantu="<?= $data['tipe_data_bantu']; ?>"
                                        data-isi="<?= substr(strip_tags($data['isi_data_bantu']), 0, 50); ?>"
                                        data-target="#edit<?= $data['id_tabel_bantu']; ?>"><i class="fas fa-edit"></i>
                                        Edit</a>
                                    <a href="<?= base_url('TabelBantu/hapus/' . $data['id_tabel_bantu']); ?>"
                                        class="btn btn-danger btn-sm hapus"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i
                                            class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
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
                    <h5 class="modal-title" id="addModalLabel">Tambah Data tabel bantu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="form-group">
                        <label for="nama_data_bantu">Nama data bantu</label>
                        <input type="text" name="nama_data_bantu" id="nama_data_bantu" class="form-control" required
                            placeholder="Masukkan judul pengumuman">
                    </div>
                    <!-- Tipe pengumuman -->
                    <div class="form-group mt-2">
                        <label for="tipe_data_bantu">Tipe data bantu</label>
                        <select name="tipe_data_bantu" id="tipe_data_bantu" class="form-control" required>
                            <option value="">Pilih Tipe</option>
                            <option value="Video">Video</option>
                            <option value="Foto">Foto</option>
                            <option value="Link">Link</option>
                            <option value="Editor Teks">Editor Teks</option>
                            <option value="Textarea">Textarea</option>
                        </select>
                    </div>


                    <div class="form-group mt-2" id="video" style="display: none;">
                        <label for="video">Video</label>
                        <input type="file" name="video" class="form-control" accept="video/*, .mp4, .avi, .mov">
                        <video id="preview_vid" class="mt-2" width="100%" controls style="display: none;" height="auto">
                            <source src="" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>

                    <div class="form-group mt-2" id="foto" style="display: none;">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                        <img id="preview_foto" class="mt-2" width="100%" height="auto" style="display: none;" src=""
                            alt="Preview Foto">
                    </div>

                    <div class="form-group mt-2" id="link" style="display: none;">
                        <label for="link">Link</label>
                        <input type="text" name="link_media" id="link_media" class="form-control"
                            placeholder="Masukkan link media">
                        <iframe id="preview_vid" class="mt-2" width="100%" height="315" style="display: none;" src=""
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <div class="form-group mt-2" id="editor_teks" style="display: none;">
                        <label for="editor_teks">Editor Teks</label>
                        <div id="teksEditors" class="form-control" style="height: 200px;"></div>
                    </div>
                    <div class="form-group mt-2" id="textarea" style="display: none;">
                        <label for="textarea">Textarea</label>
                        <textarea name="textarea" class="form-control" rows="5" placeholder="Masukan teks"></textarea>
                    </div>
                </div>

                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="btnSimpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($tabel_bantu as $data) : ?>
<div class="modal fade" id="edit<?= $data['id_tabel_bantu']; ?>" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form enctype="multipart/form-data" class="form_edit" data-id="<?= $data['id_tabel_bantu']; ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Tabel Bantu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="form-group">
                        <label for="nama_data_bantu">Nama data bantu</label>
                        <input type="text" name="nama_data_bantu" id="nama_data_bantu" class="form-control"
                            value="<?= $data['nama_data_bantu']; ?>" required placeholder="Masukkan nama data bantu">
                    </div>
                    <div class="form-group mt-2">
                        <label for="tipe_data_bantu">Tipe data bantu</label>
                        <input type="text" name="tipe_data_bantu" value="<?= $data['tipe_data_bantu']; ?>"
                            class="form-control" disabled>
                    </div>
                    <div class="form-group mt-2" id="video<?= $data['id_tabel_bantu']; ?>"
                        style="<?= ($data['tipe_data_bantu'] == 'Video') ? '' : 'display: none;'; ?>">
                        <label for="video">Video</label>
                        <input type="file" name="video" class="form-control" accept="video/*, .mp4, .avi, .mov">
                        <video id="preview_vid<?= $data['id_tabel_bantu']; ?>" class="mt-2" width="100%" controls
                            style="display: <?= ($data['tipe_data_bantu'] == 'Video') ? '' : 'none'; ?>;" height="auto">
                            <source src="<?= base_url('Assets/tabel_bantu/' . $data['isi_data_bantu']); ?>"
                                type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="form-group mt-2" id="foto<?= $data['id_tabel_bantu']; ?>"
                        style="<?= ($data['tipe_data_bantu'] == 'Foto') ? '' : 'display: none;'; ?>">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                        <img id="preview_foto<?= $data['id_tabel_bantu']; ?>" class="mt-2" width="100%" height="auto"
                            style="display: <?= ($data['tipe_data_bantu'] == 'Foto') ? '' : 'none'; ?>;"
                            src="<?= base_url('Assets/tabel_bantu/' . $data['isi_data_bantu']); ?>" alt="Preview Foto">
                    </div>
                    <div class="form-group mt-2" id="link<?= $data['id_tabel_bantu']; ?>"
                        style="<?= ($data['tipe_data_bantu'] == 'Link') ? '' : 'display: none;'; ?>">
                        <label for="link">Link</label>
                        <input type="text" name="link_media" id="link_media" class="form-control"
                            placeholder="Masukkan link media"
                            value="<?= ($data['tipe_data_bantu'] == 'Link') ? $data['isi_data_bantu'] : ''; ?>">
                        <iframe id="preview_vid<?= $data['id_tabel_bantu']; ?>" class="mt-2" width="100%" height="315"
                            style="display: <?= ($data['tipe_data_bantu'] == 'Link') ? '' : 'none'; ?>;"
                            src="<?= ($data['tipe_data_bantu'] == 'Link') ? $data['isi_data_bantu'] : ''; ?>"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <div class="form-group mt-2" id="editor_teks<?= $data['id_tabel_bantu']; ?>"
                        style="<?= ($data['tipe_data_bantu'] == 'Editor Teks') ? '' : 'display: none;'; ?>">
                        <label for="editor_teks">Editor Teks</label>
                        <div id="edit_teksEditors<?= $data['id_tabel_bantu']; ?>" class="form-control"
                            style="height: 200px;"><?= $data['isi_data_bantu']; ?></div>
                    </div>
                    <div class="form-group mt-2" id="textarea<?= $data['id_tabel_bantu']; ?>"
                        style="<?= ($data['tipe_data_bantu'] == 'Textarea') ? '' : 'display: none;'; ?>">
                        <label for="textarea">Textarea</label>
                        <textarea name="textarea" class="form-control" rows="5"
                            placeholder="Masukan teks"><?= ($data['tipe_data_bantu'] == 'Textarea') ? $data['isi_data_bantu'] : ''; ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php endforeach; ?>
<?= $this->endSection('kontent'); ?>
<?= $this->section('script'); ?>
<script type="text/javascript">
$('#tipe_data_bantu').change(function() {
    var tipe_data_bantu = $(this).val();
    if (tipe_data_bantu == 'Video') {
        $('#video').show();
        $('#foto').hide();
        $('#link').hide();
        $('#editor_teks').hide();
        $('#textarea').hide();
    } else if (tipe_data_bantu == 'Foto') {
        $('#video').hide();
        $('#foto').show();
        $('#link').hide();
        $('#editor_teks').hide();
        $('#textarea').hide();
    } else if (tipe_data_bantu == 'Link') {
        $('#video').hide();
        $('#foto').hide();
        $('#link').show();
        $('#editor_teks').hide();
        $('#textarea').hide();
    } else if (tipe_data_bantu == 'Editor Teks') {
        $('#video').hide();
        $('#foto').hide();
        $('#link').hide();
        $('#editor_teks').show();
        $('#textarea').hide();
    } else if (tipe_data_bantu == 'Textarea') {
        $('#video').hide();
        $('#foto').hide();
        $('#link').hide();
        $('#editor_teks').hide();
        $('#textarea').show();
    } else {
        $('#video').hide();
        $('#foto').hide();
        $('#link').hide();
        $('#editor_teks').hide();
        $('#textarea').hide();
    }
    $('#preview_vid').hide();
    $('#preview_foto').hide();
    $('#link_media').val('');
    $('#teksEditors .ql-editor').html('');
    $('#textarea').val('');
});

var teksEditors = new Quill('#teksEditors', {
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

// when btn_modal_edit is clicked
$('.btn_modal_edit').click(function() {
    var id = $(this).data('id');
    var tipe_bantu = $(this).data('tipe_bantu');
    var isi = $(this).data('isi');
    $('#edit_teksEditors' + id).html('');
    if (tipe_bantu == 'Editor Teks') {
        $('#edit_teksEditors' + id).show();
        var quill = new Quill('#edit_teksEditors' + id, {
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
        quill.root.innerHTML = isi; // set isi dari teks editor
    } else {
        $('#edit_teksEditors' + id).hide();
    }
});

$('#link').focusout(function() {
    var link = $(this).val();
    $('#preview_vid').attr('src', link);
    $('#preview_vid').show();
});

$('#formAdd').submit(function(e) {
    e.preventDefault();
    var teksEditors = $('#teksEditors .ql-editor').html();
    // console.log(teksEditors);
    var form = new FormData(this);
    form.append('teksEditors', teksEditors);
    document.getElementById('btnSimpan').innerHTML =
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
    document.getElementById('btnSimpan').setAttribute('disabled', 'disabled');
    // console.log(form);
    $.ajax({
        url: '<?= base_url('TabelBantu/simpan'); ?>',
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
    var id_tabel_bantu = $(this).data('id');
    var teksEditors = $('#edit_teksEditors' + id_tabel_bantu + ' .ql-editor').html();
    // console.log(id_tabel_bantu);
    // console.log(teksEditors);
    var form = new FormData(this);
    form.append('id_tabel_bantu', id_tabel_bantu);
    form.append('teksEditors', teksEditors);
    $.ajax({
        url: '<?= base_url('TabelBantu/ubah'); ?>',
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
                $('#edit' + id_tabel_bantu).modal('hide');
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
$('.status_data_bantu').change(function() {
    var id = $(this).attr('id');
    var status = $(this).prop('checked');
    if (status == true) {
        status = '1';
    } else {
        status = '0';
    }
    $.ajax({
        url: '<?= base_url('TabelBantu/update_status'); ?>',
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

// when uploading video
$('input[name="video"]').change(function() {
    var file = this.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#preview_vid').attr('src', e.target.result);
            $('#preview_vid').show();
        }
        reader.readAsDataURL(file);
    } else {
        $('#preview_vid').hide();
    }
});

// when uploading foto
$('input[name="foto"]').change(function() {
    var file = this.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#preview_foto').attr('src', e.target.result);
            $('#preview_foto').show();
        }
        reader.readAsDataURL(file);
    } else {
        $('#preview_foto').hide();
    }
});
</script>
<?= $this->endSection('script'); ?>