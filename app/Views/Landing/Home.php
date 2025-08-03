<?= $this->extend('Landing/Template/index') ?>
<?= $this->section('konten') ?>
<style>
.kata_sambutan p {
    margin: 10px 0px !important;
    padding: 0 !important;
    justify-content: justify !important;
}

/* add backgournd back in abount Assets/img/background_sambutan.jpg */
#about {
    background-image: url('<?= base_url('Assets/img/background_sambutan.jpg'); ?>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    padding: 60px 0;
    position: relative;
    z-index: 1;
}

#about::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: -1;
}

#about .content {
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
</style>
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
                    <!-- <a href="#about" class="btn-get-started">Mulai</a> -->
                    <a href="<?= $link_profile_sekolah['isi_data_bantu'] ?>"
                        class="glightbox btn-watch-video d-flex align-items-center justify-content-center ms-0 ms-md-4 mt-4 mt-md-0"><i
                            class="bi bi-play-circle"></i><span>Lihat Video</span></a>
                </div>
            </div>
            <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                <img src="<?= base_url('Assets/img/LOGO_SMP.png'); ?>" class="img-fluid animated" alt="" width="350">
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
                    alt=""
                    style="width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                    <h3>Sambutan Kepala Sekolah,</h3>
                    <h2><?= $kepala_sekolah['nama_staff']; ?></h2>

                    <div class="kata_sambutan">
                        <?= substr($data_sekolah['sambutan_kepala_sekolah'], 0, 1000); ?> ......
                    </div>

                    <div class="text-center text-lg-start mt-2">
                        <a href="<?= base_url('Sambutan'); ?>"
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
                        <span data-purecounter-start="0" data-purecounter-end="<?= $jumlah_siswa['jumlah_siswa']; ?>"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>
                            Jumlah Siswa<br>
                            <a href="<?= base_url('History_siswa'); ?>">Lihat History Siswa</a>
                        </p>
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
            <?php 
            if(!empty($data_berita)) :
                $no = 1;
                foreach ($data_berita as $berita) : 
                if($no > 3) break; // Batasi hanya 2 berita yang ditampilkan
                $no++;
            ?>
            <div class="col-xl-4 col-md-6">
                <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="200">

                    <div class="post-img position-relative overflow-hidden">
                        <?php 
                             if ($berita['type_media'] == '0') {
                                echo '<img src="' . base_url('Assets/img/pengumuman/' . $berita['nama_media']) . '" class="img-fluid" alt="" style="305px; height: 305px; object-fit: cover;">';
                            } else {
                                echo '<iframe lass="img-fluid" width="100%" height="305" src="' . $berita['nama_media'] . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                            }
                        ?>

                        <span class="post-date"><?= date('d F Y', strtotime($berita['created_at'])); ?></span>
                    </div>

                    <div class="post-content d-flex flex-column">

                        <h3 class="post-title"><?= $berita['judul_pengumuman']; ?></h3>

                        <div class="meta d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person"></i> <span class="ps-2"><?= $berita['nama_user']; ?></span>
                            </div>
                            <span class="px-3 text-black-50">|</span>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-clock"></i> <span
                                    class="ps-2"><?= date('H:i', strtotime($berita['created_at'])); ?> WIB</span>
                            </div>
                        </div>

                        <hr>

                        <a href="<?= base_url('Berita/Detail/' . $berita['id_pengumuman']); ?>"
                            class="readmore stretched-link"><span>Baca Lebih Lanjut</span><i
                                class="bi bi-arrow-right"></i></a>

                    </div>
                </div>
            </div><!-- End post item -->
            <?php endforeach;
            ?>
            <span class="d-block mb-3 text-center mt-4" data-aos="fade-up" data-aos-delay="100">
                <a href="<?= base_url('Berita'); ?>" class="btn btn-primary">Lihat Semua Berita</a>
            </span>
            <?php
            else : ?>
            <div class="col-lg-12 text-center" data-aos="fade-up" data-aos-delay="100">
                <p>Tidak ada berita yang tersedia.</p>
            </div>
            <?php
            endif;
            ?>

        </div>

        <hr class="my-5" id="pengumuman">
        <span class="badge bg-danger mb-3" data-aos="fade-up" data-aos-delay="100">Pengumuman</span>
        <div class="row gy-5">
            <?php
            if(!empty($data_pengumuman)) :
                $no = 1;
                foreach ($data_pengumuman as $pengumuman) : 
                if($no > 3) break; // Batasi hanya 2 pengumuman yang ditampilkan
                $no++;
            ?>
            <div class="col-xl-4 col-md-6">
                <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="200">

                    <div class="post-img position-relative overflow-hidden">
                        <?php 
                            if ($pengumuman['type_media'] == '0') {
                                echo '<img src="' . base_url('Assets/img/pengumuman/' . $pengumuman['nama_media']) . '" class="img-fluid" alt="" style="width;305px; height: 305px; object-fit: cover;">';
                            } else {
                                echo '<iframe lass="img-fluid" width="100%" height="305" src="' . $pengumuman['nama_media'] . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                            }
                        ?>
                        <span class="post-date"><?= date('d F Y', strtotime($pengumuman['created_at'])); ?></span>
                    </div>

                    <div class="post-content d-flex flex-column">

                        <h3 class="post-title"><?= $pengumuman['judul_pengumuman']; ?></h3>
                        <div class="meta d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person"></i> <span class="ps-2"><?= $pengumuman['nama_user']; ?></span>
                            </div>
                            <span class="px-3 text-black-50">|</span>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-clock"></i> <span
                                    class="ps-2"><?= date('H:i', strtotime($pengumuman['created_at'])); ?> WIB</span>
                            </div>
                        </div>
                        <hr>
                        <a href="<?= base_url('Pengumumans/Detail/' . $pengumuman['id_pengumuman']); ?>"
                            class="readmore stretched-link"><span>Baca Lebih Lanjut</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div><!-- End post item -->
            <?php endforeach;
            ?>
            <span class="d-block mb-2 text-center mt-4" data-aos="fade-up" data-aos-delay="100">
                <a href="<?= base_url('Pengumumans'); ?>" class="btn btn-primary">Lihat Semua Pengumuman</a>
            </span>
            <?php
            else : ?>
            <div class="col-lg-12 text-center" data-aos="fade-up" data-aos-delay="100">
                <p>Tidak ada pengumuman yang tersedia.</p>
            </div>
            <?php
            endif;
            ?>
        </div>

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
                <a href="<?= base_url('Staffs'); ?>" class="btn btn-primary">Lihat Semua Staff</a>
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
                    <p><?= substr(strip_tags($fasilitas['deskripsi_fasilitas']), 0, 50) . '...'; ?></p>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <a href="<?= base_url('Fasilitass/Detail/' . $fasilitas['id_fasilitas']); ?>"
                            class="more-link">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div><!-- End Card Item -->
            <?php endforeach; 
            ?>
            <div class="col-lg-12 text-center mt-4" data-aos="fade-up" data-aos-delay="400">
                <a href="<?= base_url('Fasilitass'); ?>" class="btn btn-primary">Lihat Semua Fasilitas</a>
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
                    <p><?= substr($ekskul['deskripsi_ekskul'], 0, 50); ?>...</p>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <a href="<?= base_url('Ekstrakurikuler/Detail/' . $ekskul['id_ekskul']); ?>"
                            class="more-link">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                    </div>
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

        <div class="row gy-4 table-responsive">
            <table id="prestasiTable" class="table table-striped table-bordered my-2" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Foto</th>
                        <th>Judul Prestasi</th>
                        <th>Tanggal Prestasi</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(!empty($data_prestasi)) :
                        $no = 1;
                        foreach ($data_prestasi as $prestasi) : ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center" style="width: 250px; min-width: 250px">
                            <?php if ($prestasi['foto_prestasi'] != '') : ?>

                            <a style="width: 250px; min-width: 250px"
                                href="<?= base_url('Assets/img/prestasi/' . $prestasi['foto_prestasi']); ?>"
                                target="_blank"> <img
                                    src="<?= base_url('Assets/img/prestasi/' . $prestasi['foto_prestasi']); ?>"
                                    alt="<?= $prestasi['judul_prestasi']; ?>" class="img-fluid"
                                    style="width: 250px; min-width: 250px; height: auto; object-fit: cover;">

                            </a>
                            <?php else : ?>
                            <img src="<?= base_url('Assets/img/no-image.png'); ?>" alt="No Image" class="img-fluid"
                                style="width: 100px; height: auto; object-fit: cover;">
                            <?php endif; ?>
                        </td>
                        <td><?= $prestasi['judul_prestasi']; ?></td>
                        <td><?= date('d F Y', strtotime($prestasi['tanggal_prestasi'])); ?></td>
                        <td><?= substr($prestasi['deskripsi_prestasi'], 0, 1000); ?></td>
                    </tr>
                    <?php endforeach; 
                    else : ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada prestasi yang tersedia.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>


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
                        <a href="https://wa.me/<?= $data_sekolah['no_wa_sekolah']; ?>" class="" target="_blank">
                            <div class="info-item" data-aos="fade" data-aos-delay="500">
                                <i class="bi bi-whatsapp"></i>
                                <h3>WhatsApp</h3>
                                <p></p>
                                <a href="https://wa.me/<?= $data_sekolah['no_wa_sekolah']; ?>"
                                    class="text-decoration-none text-dark"
                                    target="_blank"><?= $data_sekolah['no_wa_sekolah']; ?>
                                </a>
                            </div>
                        </a>
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

<div class="container text-center mt-2">
    <a href="<?= base_url('Auth'); ?>" class="btn btn-primary"><i class="bi bi-box-arrow-in-right"></i> Login
        Admin</a>
</div>


<?= $this->endSection('content'); ?>
<?= $this->section('script'); ?>
<script>
$(document).ready(function() {
    $('#prestasiTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "pageLength": 5,
        "lengthMenu": [5, 10, 25, 50, 100],
        "language": {
            "emptyTable": "Tidak ada data prestasi yang tersedia."
        }
    });
});
</script>
<?= $this->endSection('script'); ?>