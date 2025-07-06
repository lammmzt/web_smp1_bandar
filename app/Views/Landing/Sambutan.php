<?= $this->extend('Landing/Template/index') ?>
<?= $this->section('konten') ?>
<style>
/* add backgournd back in abount Assets/img/background_sambutan.jpg */
#container_sambutan {
    background-image: url('<?= base_url('Assets/img/background_sambutan.jpg'); ?>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    padding: 60px 0;
    position: relative;
    z-index: 1;
}

#container_sambutan::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: -1;
}

#container_sambutan .content {
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
</style>
<!-- Page Title -->
<div class="page-title">
    <div class="heading">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-8">
                    <h1>Sambutan</h1>
                    <p class="mb-0">
                        Sambutan Kepala Sekolah <?= $data_sekolah['nama_sekolah']; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <nav class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="<?= base_url('/'); ?>">Home</a></li>
                <li class="current"><?= $active; ?></li>
            </ol>
        </div>
    </nav>
</div><!-- End Page Title -->

<div class="container" id="">
    <div class="row">
        <div class="col-lg-12">
            <!-- Blog Details Section -->
            <section id="container_sambutan" class="about section">

                <div class="container" data-aos="fade-up">
                    <div class="row gx-0">
                        <div class="col-lg-6 d-flex align-items-center mb-2" data-aos="zoom-out" data-aos-delay="200">
                            <img src="<?= base_url('Assets/img/staff/'); ?><?= $kepala_sekolah['foto_staff']; ?>"
                                class="img-fluid" alt=""
                                style="width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        </div>
                        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="content">
                                <h3>Sambutan Kepala Sekolah,</h3>
                                <h2><?= $kepala_sekolah['nama_staff']; ?></h2>

                                <div class="kata_sambutan">
                                    <?= $data_sekolah['sambutan_kepala_sekolah']; ?>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>

            </section><!-- /About Section -->

        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>