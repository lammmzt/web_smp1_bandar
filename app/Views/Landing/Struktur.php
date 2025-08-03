<?= $this->extend('Landing/Template/index') ?>
<?= $this->section('konten') ?>
<!-- Page Title -->
<div class="page-title">
    <div class="heading">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-8">
                    <h1>Struktur Organisasi</h1>
                    <p class="mb-0">
                        Struktur Organisasi <?= $data_sekolah['nama_sekolah']; ?>
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
                        <?php 
                            if (!empty($foto_visi)) : ?>
                        <div class="post-img">
                            <img src="<?= base_url('Assets/tabel_bantu/' . $foto_visi['isi_data_bantu']); ?>"
                                alt="<?= $data_sekolah['nama_sekolah']; ?>" class="img-fluid"
                                style="width: 100%; height: auto; object-fit: cover;">
                        </div>
                        <?php
                            endif;
                            ?>



                    </article>

                </div>
            </section><!-- /Blog Details Section -->

        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>