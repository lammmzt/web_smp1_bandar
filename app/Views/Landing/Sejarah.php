<?= $this->extend('Landing/Template/index') ?>
<?= $this->section('konten') ?>
<!-- Page Title -->
<div class="page-title">
    <div class="heading">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-8">
                    <h1>Sejarah</h1>
                    <p class="mb-0">
                        Sejarah singkat berdirinya <?= $data_sekolah['nama_sekolah']; ?>
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
                            <?php 
                           if (!empty($foto_sejarah)) : ?>
                            <img src="<?= base_url('Assets/tabel_bantu/' . $foto_sejarah['isi_data_bantu']); ?>"
                                alt="<?= $data_sekolah['nama_sekolah']; ?>" class="img-fluid"
                                style="width: 100%; height: auto; object-fit: cover;">

                            <?php 
                            endif;
                            ?>
                        </div>

                        <h2 class="title">Sejarah <?= $data_sekolah['nama_sekolah']; ?></h2>

                        <!-- <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="blog-details.html">John Doe</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="blog-details.html"><time datetime="2020-01-01">Jan 1, 2022</time></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                        href="blog-details.html">12 Comments</a></li>
                            </ul>
                        </div> -->

                        <div class="content">
                            <?= $data_sekolah['sejarah_sekolah']; ?>
                        </div><!-- End post content -->



                    </article>

                </div>
            </section><!-- /Blog Details Section -->

        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>