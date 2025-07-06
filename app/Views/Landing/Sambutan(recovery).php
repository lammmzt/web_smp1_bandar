<?= $this->extend('Landing/Template/index') ?>
<?= $this->section('konten') ?>
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

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- Blog Details Section -->
            <section id="blog-details" class="blog-details section">
                <div class="container">

                    <article class="article">

                        <div class="post-img">
                            <img src="<?= base_url('Assets/img/staff/'); ?><?= $kepala_sekolah['foto_staff']; ?>"
                                class="img-fluid" alt=""
                                style="width: 250px; height: 250px; text-align: center; border-radius: 50%; margin: 15px  auto; display: block;">
                        </div>

                        <h2 class=" title text-ceter">Sambutan Kepala Sekolah, <?= $kepala_sekolah['nama_staff']; ?>
                        </h2>


                        <div class="content">
                            <?= $data_sekolah['sambutan_kepala_sekolah']; ?>
                        </div><!-- End post content -->



                    </article>

                </div>
            </section><!-- /Blog Details Section -->

        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>