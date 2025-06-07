<?= $this->extend('Landing/Template/index') ?>
<?= $this->section('konten') ?>

<!-- Hero Section -->
<section id="hero" class="hero section">

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-8 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Selamat Datang di website <span
                        class="text-primary"><?= $data_sekolah['nama_sekolah']; ?></span></h1>
                <p data-aos="fade-up" data-aos-delay="100">Sekolah dengan akreditasi A, berkomitmen untuk
                    memberikan pendidikan terbaik bagi siswa-siswi kami.</p>
                <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                    <a href="#about" class="btn-get-started">Mulai</a>
                    <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                        class="glightbox btn-watch-video d-flex align-items-center justify-content-center ms-0 ms-md-4 mt-4 mt-md-0"><i
                            class="bi bi-play-circle"></i><span>Lihat Video</span></a>
                </div>
            </div>
            <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                <img src="<?= base_url('Assets/img/web/FOTO SMAN 1 BANDAR.png'); ?>" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- /Hero Section -->

<!-- About Section -->
<section id="about" class="about section">

    <div class="container" data-aos="fade-up">
        <div class="row gx-0">
            <div class="col-lg-6 d-flex align-items-center mb-2" data-aos="zoom-out" data-aos-delay="200">
                <img src="<?= base_url('Assets/img/staff/'); ?><?= $kepala_sekolah['foto_staff']; ?>" class="img-fluid"
                    alt="">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                    <h3>Sambutan Kepala Sekolah,</h3>
                    <h2><?= $kepala_sekolah['nama_staff']; ?></h2>
                    <p>
                        <?= $data_sekolah['sambutan_kepala_sekolah']; ?>
                    </p>
                    <div class="text-center text-lg-start">
                        <a href="#"
                            class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Baca Selengkapnya</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section><!-- /About Section -->

<!-- Stats Section -->
<section id="stats" class="stats section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-lg-3 col-md-6">
                <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-people color-blue flex-shrink-0" style="color: #007bff;"></i>
                    <div>
                        <span data-purecounter-start="0"
                            data-purecounter-end="<?= $data_sekolah['jumlah_siswa_sekolah']; ?>"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Jumlah Siswa</p>
                    </div>
                </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6">
                <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-person-check color-yellow flex-shrink-0" style="color: #ffc107;"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="<?= $jumlah_tenaga_pendidik; ?>"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Jumlah Tenaga Pendidik</p>
                    </div>
                </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6">
                <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-person-workspace color-green flex-shrink-0" style="color: #28a745;"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="<?= $jumlah_tenaga_kependidikan; ?>"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Jumlah Tenaga Kependidikan</p>
                    </div>
                </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6">
                <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-award color-purple flex-shrink-0" style="color: #6f42c1;"></i>
                    <div>
                        <span>
                            <?= $data_sekolah['akreditasi_sekolah']; ?></span>
                        </span>
                        <p>Akreditasi</p>
                    </div>
                </div>
            </div><!-- End Stats Item -->

        </div>

    </div>

</section><!-- /Stats Section -->

<!-- Recent Posts Section -->
<section id="informasi" class="recent-posts section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Informasi</h2>
        <p>Berita dan Pengumuman Terbaru</p>
    </div><!-- End Section Title -->

    <div class="container">
        <span class="badge bg-primary mb-3" data-aos="fade-up" data-aos-delay="100">Berita</span>
        </span>
        <div class="row gy-5">

            <div class="col-xl-4 col-md-6">
                <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">

                    <div class="post-img position-relative overflow-hidden">
                        <img src="<?= base_url('Assets/LandingPage/'); ?>img/blog/blog-1.jpg" class="img-fluid" alt="">
                        <span class="post-date">December 12</span>
                    </div>

                    <div class="post-content d-flex flex-column">

                        <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis</h3>

                        <div class="meta d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person"></i> <span class="ps-2">Julia Parker</span>
                            </div>
                            <span class="px-3 text-black-50">/</span>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-folder2"></i> <span class="ps-2">Politics</span>
                            </div>
                        </div>

                        <hr>

                        <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                class="bi bi-arrow-right"></i></a>

                    </div>

                </div>
            </div><!-- End post item -->

            <div class="col-xl-4 col-md-6">
                <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="200">

                    <div class="post-img position-relative overflow-hidden">
                        <img src="<?= base_url('Assets/LandingPage/'); ?>img/blog/blog-2.jpg" class="img-fluid" alt="">
                        <span class="post-date">July 17</span>
                    </div>

                    <div class="post-content d-flex flex-column">

                        <h3 class="post-title">Et repellendus molestiae qui est sed omnis</h3>

                        <div class="meta d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person"></i> <span class="ps-2">Mario Douglas</span>
                            </div>
                            <span class="px-3 text-black-50">/</span>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-folder2"></i> <span class="ps-2">Sports</span>
                            </div>
                        </div>

                        <hr>

                        <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                class="bi bi-arrow-right"></i></a>

                    </div>

                </div>
            </div><!-- End post item -->

            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="post-item position-relative h-100">

                    <div class="post-img position-relative overflow-hidden">
                        <img src="<?= base_url('Assets/LandingPage/'); ?>img/blog/blog-3.jpg" class="img-fluid" alt="">
                        <span class="post-date">September 05</span>
                    </div>

                    <div class="post-content d-flex flex-column">

                        <h3 class="post-title">Quia assumenda est et veritati tirana ploder</h3>

                        <div class="meta d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person"></i> <span class="ps-2">Lisa Hunter</span>
                            </div>
                            <span class="px-3 text-black-50">/</span>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-folder2"></i> <span class="ps-2">Economics</span>
                            </div>
                        </div>

                        <hr>

                        <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                class="bi bi-arrow-right"></i></a>

                    </div>

                </div>
            </div><!-- End post item -->

        </div>
        <span class="d-block mb-3 text-center mt-4" data-aos="fade-up" data-aos-delay="100">
            <a href="<?= base_url('Berita'); ?>" class="btn btn-primary">Lihat Semua Berita</a>
        </span>
        <hr class="my-5">
        <span class="badge bg-danger mb-3" data-aos="fade-up" data-aos-delay="100">Pengumuman</span>
        <div class="row gy-5">

            <div class="col-xl-4 col-md-6">
                <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">

                    <div class="post-img position-relative overflow-hidden">
                        <img src="<?= base_url('Assets/LandingPage/'); ?>img/blog/blog-1.jpg" class="img-fluid" alt="">
                        <span class="post-date">December 12</span>
                    </div>

                    <div class="post-content d-flex flex-column">

                        <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis</h3>

                        <div class="meta d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person"></i> <span class="ps-2">Julia Parker</span>
                            </div>
                            <span class="px-3 text-black-50">/</span>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-folder2"></i> <span class="ps-2">Politics</span>
                            </div>
                        </div>

                        <hr>

                        <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                class="bi bi-arrow-right"></i></a>

                    </div>

                </div>
            </div><!-- End post item -->

            <div class="col-xl-4 col-md-6">
                <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="200">

                    <div class="post-img position-relative overflow-hidden">
                        <img src="<?= base_url('Assets/LandingPage/'); ?>img/blog/blog-2.jpg" class="img-fluid" alt="">
                        <span class="post-date">July 17</span>
                    </div>

                    <div class="post-content d-flex flex-column">

                        <h3 class="post-title">Et repellendus molestiae qui est sed omnis</h3>

                        <div class="meta d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person"></i> <span class="ps-2">Mario Douglas</span>
                            </div>
                            <span class="px-3 text-black-50">/</span>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-folder2"></i> <span class="ps-2">Sports</span>
                            </div>
                        </div>

                        <hr>

                        <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                class="bi bi-arrow-right"></i></a>

                    </div>

                </div>
            </div><!-- End post item -->

            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="post-item position-relative h-100">

                    <div class="post-img position-relative overflow-hidden">
                        <img src="<?= base_url('Assets/LandingPage/'); ?>img/blog/blog-3.jpg" class="img-fluid" alt="">
                        <span class="post-date">September 05</span>
                    </div>

                    <div class="post-content d-flex flex-column">

                        <h3 class="post-title">Quia assumenda est et veritati tirana ploder</h3>

                        <div class="meta d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person"></i> <span class="ps-2">Lisa Hunter</span>
                            </div>
                            <span class="px-3 text-black-50">/</span>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-folder2"></i> <span class="ps-2">Economics</span>
                            </div>
                        </div>

                        <hr>

                        <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                class="bi bi-arrow-right"></i></a>

                    </div>

                </div>
            </div><!-- End post item -->

        </div>
        <span class="d-block mb-2 text-center mt-4" data-aos="fade-up" data-aos-delay="100">
            <a href="<?= base_url('Pengumuman'); ?>" class="btn btn-primary">Lihat Semua Pengumuman</a>
        </span>
    </div>

</section><!-- /Recent Posts Section -->

<!-- Team Section -->
<section id="staff" class="team section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Staff</h2>
        <p>Tendik & Pendidik</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">
            <?php 
            if(!empty($data_staff)) :
                $no = 1;
                foreach ($data_staff as $staff) : 
                if($no > 4) break; // Batasi hanya 4 staff yang ditampilkan
                $no++;  
                ?>
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="team-member">
                    <div class="member-img">
                        <img src="<?= base_url('Assets/img/staff/'); ?><?= $staff['foto_staff']; ?>" class="img-fluid"
                            alt="">
                    </div>
                    <div class="member-info">
                        <h4><?= $staff['nama_staff']; ?></h4>
                        <span><?= $staff['jenis_staff']?></span>
                        <p><?= $staff['jabatan_staff']; ?>
                        </p>
                    </div>
                </div>
            </div><!-- End Team Member -->
            <?php endforeach; 
            ?>
            <div class="col-lg-12 text-center mt-4" data-aos="fade-up" data-aos-delay="400">
                <a href="<?= base_url('Staff'); ?>" class="btn btn-primary">Lihat Semua Staff</a>
            </div><!-- End Card Item -->
            <?php
            else : ?>
            <div class="col-lg-12 text-center" data-aos="fade-up" data-aos-delay="100">
                <p>Tidak ada staff yang tersedia.</p>
            </div>
            <?php 
            endif;
           ?>

        </div>

    </div>

</section><!-- /Team Section -->

<!-- Fasilitas Section -->
<section id="fasilitas" class="values section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Fasilitas</h2>
        <p>Fasilitas yang Tersedia di Sekolah Kami<br></p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">

            <?php 
            if(!empty($data_fasilitas)) :
                $no = 1;
                foreach ($data_fasilitas as $fasilitas) : 
                if($no > 3) break; // Batasi hanya 3 fasilitas yang ditampilkan
                $no++;
            ?>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card">
                    <a href="<?= base_url('Assets/img/fasilitas/' . $fasilitas['foto_fasilitas']); ?>" target="_blank"
                        data-fancybox="gallery" data-caption="<?= $fasilitas['nama_fasilitas']; ?>">
                        <img src="<?= base_url('Assets/img/fasilitas/' . $fasilitas['foto_fasilitas']); ?>"
                            class="img-fluid" alt="">
                    </a>
                    <h3><?= $fasilitas['nama_fasilitas']; ?></h3>
                    <p><?= $fasilitas['deskripsi_fasilitas']; ?></p>
                </div>
            </div><!-- End Card Item -->
            <?php endforeach; 
            ?>
            <div class="col-lg-12 text-center mt-4" data-aos="fade-up" data-aos-delay="400">
                <a href="<?= base_url('Fasilitas'); ?>" class="btn btn-primary">Lihat Semua Fasilitas</a>
            </div><!-- End Card Item -->
            <?php
            else : ?>
            <div class="col-lg-12 text-center" data-aos="fade-up" data-aos-delay="100">
                <p>Tidak ada fasilitas yang tersedia.</p>
            </div>
            <?php
            endif;
            ?>
        </div>

    </div>

</section><!-- /Values Section -->

<!-- ekstra Section -->
<section id="ekstrakurikuler" class="values section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Ekstrakurikuler</h2>
        <p>Ekstrakurikuler yang Tersedia di Sekolah Kami<br></p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">

            <?php 
            if(!empty($data_ekskul)) :
                $no = 1;
                foreach ($data_ekskul as $ekskul) : 
                if($no > 3) break; // Batasi hanya 3 ekstrakurikuler yang ditampilkan
                $no++;
            ?>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card">
                    <a href="<?= base_url('Assets/img/ekskul/' . $ekskul['foto_ekskul']); ?>" target="_blank"
                        data-fancybox="gallery" data-caption="<?= $ekskul['nama_ekskul']; ?>">
                        <img src="<?= base_url('Assets/img/ekskul/' . $ekskul['foto_ekskul']); ?>" class="img-fluid"
                            alt="">
                    </a>
                    <h3><?= $ekskul['nama_ekskul']; ?></h3>
                    <p><?= $ekskul['deskripsi_ekskul']; ?></p>
                </div>
            </div><!-- End Card Item -->
            <?php endforeach;
            ?>
            <div class="col-lg-12 text-center mt-4" data-aos="fade-up" data-aos-delay="400">
                <a href="<?= base_url('Ekstrakurikuler'); ?>" class="btn btn-primary">Lihat Semua Ekstrakurikuler</a>
            </div><!-- End Card Item -->
            <?php
            else : ?>
            <div class="col-lg-12 text-center" data-aos="fade-up" data-aos-delay="100">
                <p>Tidak ada ekstrakurikuler yang tersedia.</p>
            </div>
            <?php
            endif;
            ?>
        </div>

    </div>

</section><!-- /Services Section -->


<!-- Values Section -->
<section id="prestasi" class="values section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Prestasi</h2>
        <p>Prestasi yang telah diraih oleh sekolah kami<br></p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">
            <?php 
            if(!empty($data_prestasi)) :
                $no = 1;
                foreach ($data_prestasi as $prestasi) : 
                if($no > 3) break; // Batasi hanya 3 prestasi yang ditampilkan
                $no++;
            ?>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card">
                    <a href="<?= base_url('Assets/img/prestasi/' . $prestasi['foto_prestasi']); ?>" target="_blank"
                        data-fancybox="gallery" data-caption="<?= $prestasi['judul_prestasi']; ?>">
                        <img src="<?= base_url('Assets/img/prestasi/' . $prestasi['foto_prestasi']); ?>"
                            class="img-fluid" alt="">
                    </a>
                    <h3><?= $prestasi['judul_prestasi']; ?></h3>
                    <p><?= $prestasi['deskripsi_prestasi']; ?></p>
                    <p class="text-muted">
                        <small>~<?= date('d F Y', strtotime($prestasi['tanggal_prestasi'])); ?>~</small>
                    </p>
                </div>
            </div><!-- End Card Item -->
            <?php endforeach;
            ?>
            <!-- lihat semua -->
            <div class="col-lg-12 text-center mt-4" data-aos="fade-up" data-aos-delay="400">
                <a href="<?= base_url('Prestasi'); ?>" class="btn btn-primary">Lihat Semua Prestasi</a>
            </div><!-- End Card Item -->
            <?php
            else : ?>
            <div class="col-lg-4 text-center" data-aos="fade-up" data-aos-delay="100">
                <p>Tidak ada prestasi yang tersedia.</p>
            </div>
            <?php
            endif;
            ?>

        </div>

    </div>

</section><!-- /Values Section -->


<!-- Contact Section -->
<section id="kontak" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
        <p>Hubungi Kami</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-lg-6">

                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="info-item" data-aos="fade" data-aos-delay="200">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Alamat</h3>
                            <p><?= $data_sekolah['alamat_sekolah']; ?></p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item" data-aos="fade" data-aos-delay="300">
                            <i class="bi bi-telephone"></i>
                            <h3>No Telepon</h3>
                            <p><?= $data_sekolah['tlp_sekolah']; ?></p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item" data-aos="fade" data-aos-delay="400">
                            <i class="bi bi-envelope"></i>
                            <h3>Email</h3>
                            <p><?= $data_sekolah['email_sekolah']; ?></p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item" data-aos="fade" data-aos-delay="500">
                            <i class="bi bi-clock"></i>
                            <h3>Buka Setiap Hari</h3>
                            <p>Senin - Jumat</p>
                            <p>08.00 - 12.00</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

            </div>

            <div class="col-lg-6">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="100%" height="400" id="gmap_canvas"
                            src="https://maps.google.com/maps?q=<?= $data_sekolah['latitude_sekolah']; ?>,<?= $data_sekolah['longitude_sekolah']; ?>&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                </div>
                <!-- <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="row gy-4">

                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                        </div>

                        <div class="col-md-6 ">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                        </div>

                        <div class="col-12">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                        </div>

                        <div class="col-12">
                            <textarea class="form-control" name="message" rows="6" placeholder="Message"
                                required=""></textarea>
                        </div>

                        <div class="col-12 text-center">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>

                            <button type="submit">Send Message</button>
                        </div>

                    </div>
                </form> -->
            </div><!-- End Contact Form -->

        </div>
        <!-- <div class="row mt-4">
            <div class="col-lg-12">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="100%" height="400" id="gmap_canvas"
                            src="https://maps.google.com/maps?q=<?= $data_sekolah['latitude_sekolah']; ?>,<?= $data_sekolah['longitude_sekolah']; ?>&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                </div>
            </div>
        </div> -->

</section><!-- /Contact Section -->

<!-- Testimonial End -->
<?= $this->endSection('content'); ?>