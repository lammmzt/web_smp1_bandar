<?= $this->extend('Template/index'); ?>
<?= $this->section('konten'); ?>
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Data Sekolah</h6>
                    </div>
                    <div class="col-md-6">

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


                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="text-center">
                            <form action="<?= base_url('Sekolah/ubah_logo'); ?>" method="post"
                                enctype="multipart/form-data">
                                <input type="hidden" name="id_data_sekolah" value="<?= $sekolah['id_data_sekolah']?>">
                                <img src="<?= base_url('Assets/img/logo_sekolah/' . $sekolah['logo_sekolah'])?>"
                                    class="img-thumbnail" style="width: 200px;" id="output"> <br>
                                <label for="logo_sekolah" class="btn btn-warning mt-2">Pilih Logo</label>
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <input type="file" name="logo_sekolah" id="logo_sekolah" class="form-control" hidden
                                    required>

                            </form>
                        </div>
                    </div>

                    <style>
                    .img-thumbnail {
                        width: 200px;
                        height: 200px;
                        object-fit: cover;
                        resize: both;
                    }
                    </style>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="npsn_sekolah">NPSN</label>
                            <input type="text" name="npsn_sekolah" id="npsn_sekolah" class="form-control" required
                                value="<?= $sekolah['npsn_sekolah']?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_sekolah">Nama Sekolah</label>
                            <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control" required
                                value="<?= $sekolah['nama_sekolah']?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="alamat_sekolah">Alamat</label>
                            <textarea name="alamat_sekolah" id="alamat_sekolah" class="form-control" required
                                rows="3"><?= $sekolah['alamat_sekolah']?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="email_sekolah">Email</label>
                            <input type="text" name="email_sekolah" id="email_sekolah" class="form-control" required
                                value="<?= $sekolah['email_sekolah']?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="tlp_sekolah">Tlp</label>
                            <input type="text" name="tlp_sekolah" id="tlp_sekolah" class="form-control" required
                                value="<?= $sekolah['tlp_sekolah']?>" maxlength="13">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="no_wa_sekolah">No. wa</label>
                            <input type="text" name="no_wa_sekolah" id="no_wa_sekolah" class="form-control" required
                                value="<?= $sekolah['no_wa_sekolah']?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="visi_sekolah">Visi</label>
                            <div id="visi_sekolah" style="min-height: 160px;"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="misi_sekolah">Misi</label>
                            <div id="misi_sekolah" style="min-height: 160px;"></div>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group ">
                            <label for="sejarah_sekolah">Sejarah</label>
                            <div id="sejarah_sekolah" style="min-height: 160px;"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group ">
                            <label for="sambutan_kepala_sekolah">Sambutan Kepala Sekolah</label>
                            <div id="sambutan_kepala_sekolah" style="min-height: 160px;"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="latitude_sekolah">Lat</label>
                            <input type="text" name="latitude_sekolah" id="latitude_sekolah" class="form-control"
                                value="<?= $sekolah['latitude_sekolah']?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="longitude_sekolah">Long</label>
                            <input type="text" name="longitude_sekolah" id="longitude_sekolah" class="form-control"
                                value="<?= $sekolah['longitude_sekolah']?>">
                        </div>
                    </div>
                    <div class="col-md-6" style="display: none;">
                        <div class="form-group ">
                            <label for="jumlah_siswa_sekolah">Jumlah Siswa</label>
                            <input type="number" name="jumlah_siswa_sekolah" id="jumlah_siswa_sekolah" hidden
                                class="form-control" value="<?= $sekolah['jumlah_siswa_sekolah']?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="akreditasi_sekolah">Akreditasi</label>
                            <input type="text" name="akreditasi_sekolah" id="akreditasi_sekolah" class="form-control"
                                required value="<?= $sekolah['akreditasi_sekolah']?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary" id="simpan">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('kontent'); ?>
<?= $this->section('script'); ?>
<script>
var misi = new Quill('#misi_sekolah', {
    theme: 'snow',
    placeholder: 'Misi Sekolah',
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
misi.root.innerHTML = '<?= $sekolah['misi_sekolah']?>';

document.getElementById('logo_sekolah').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('output').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(file);
    }
});

var visi = new Quill('#visi_sekolah', {
    theme: 'snow',
    placeholder: 'visi Sekolah',
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
visi.root.innerHTML = '<?= $sekolah['visi_sekolah']?>';

var sejarah = new Quill('#sejarah_sekolah', {
    theme: 'snow',
    placeholder: 'Sejarah Sekolah',
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

sejarah.root.innerHTML = '<?= $sekolah['sejarah_sekolah']?>';

var sambutan = new Quill('#sambutan_kepala_sekolah', {
    theme: 'snow',
    placeholder: 'sambutan kepala sekolah',
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
sambutan.root.innerHTML = '<?= $sekolah['sambutan_kepala_sekolah']?>';

// ajax request to update data sekolah
document.getElementById('simpan').addEventListener('click', function() {
    // change button to spiner
    document.getElementById('simpan').innerHTML =
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
    document.getElementById('simpan').setAttribute('disabled', 'disabled');
    var data = {
        id_data_sekolah: '<?= $sekolah['id_data_sekolah']?>',
        nama_sekolah: document.getElementById('nama_sekolah').value,
        alamat_sekolah: document.getElementById('alamat_sekolah').value,
        npsn_sekolah: document.getElementById('npsn_sekolah').value,
        email_sekolah: document.getElementById('email_sekolah').value,
        tlp_sekolah: document.getElementById('tlp_sekolah').value,
        akreditasi_sekolah: document.getElementById('akreditasi_sekolah').value,
        latitude_sekolah: document.getElementById('latitude_sekolah').value,
        longitude_sekolah: document.getElementById('longitude_sekolah').value,
        visi_sekolah: visi.root.innerHTML,
        misi_sekolah: misi.root.innerHTML,
        sejarah_sekolah: sejarah.root.innerHTML,
        sambutan_kepala_sekolah: sambutan.root.innerHTML,
        jumlah_siswa_sekolah: document.getElementById('jumlah_siswa_sekolah').value,
        no_wa_sekolah: document.getElementById('no_wa_sekolah').value
    }
    // console.log(data);
    $.ajax({
        url: '<?= base_url('Sekolah/ubah_data_sekolah'); ?>',
        type: 'POST',
        data: data,
        success: function(response) {
            // change button to save
            document.getElementById('simpan').innerHTML = 'Simpan';
            document.getElementById('simpan').removeAttribute('disabled');
            // console.log(response);
            if (response.status == '200') {
                Swal.fire({
                    title: 'Berhasil',
                    text: response.data,
                    icon: 'success',
                    timer: 2000
                })
            }

        }
    });
});
</script>
<?= $this->endSection('script'); ?>