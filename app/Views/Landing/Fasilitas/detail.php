<?= $this->extend('Landing/Template/index') ?>
<?= $this->section('konten') ?>
<!-- Page Title -->
<div class="page-title">
    <div class="heading">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-8">
                    <h1>Detail Fasilitas</h1>
                    <p class="mb-0">
                        Detail Fasilitas <?= $detail_fasilitas['nama_fasilitas']; ?>.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <nav class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="<?= base_url('/'); ?>">Home</a></li>
                <li><a href="<?= base_url('Fasilitass'); ?>" class="text-decoration-none text-dark">Fasilitas</a></li>
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
                            <img src="<?= base_url('Assets/img/fasilitas/' . $detail_fasilitas['foto_fasilitas']); ?>"
                                class="img-fluid" alt="" style="width: 100%; height: auto;">
                        </div>

                        <h2 class="title">
                            <?= $detail_fasilitas['nama_fasilitas']; ?>
                        </h2>


                        <div class="content">
                            <?= $detail_fasilitas['deskripsi_fasilitas']; ?>
                        </div><!-- End post content -->

                        <!-- <div class="meta-bottom">
                            <i class="bi bi-folder"></i>
                            <ul class="cats">
                                <li><a href="#">Business</a></li>
                            </ul>

                            <i class="bi bi-tags"></i>
                            <ul class="tags">
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
                            </ul>
                        </div> -->

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="<?= base_url('Fasilitass'); ?>" class="more-link">Kembali ke Daftar Fasilitas <i
                                    class="bi bi-arrow-right"></i></a>
                        </div><!-- End post meta -->
                    </article>

                </div>
            </section><!-- /Blog Details Section -->

        </div>
    </div>
</div>
<?= $this->endSection('konten') ?>