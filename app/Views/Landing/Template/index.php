<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= $title?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="<?= base_url('Assets/img/logo_sekolah/'); ?><?= $data_sekolah['logo_sekolah']; ?>" rel="icon">
    <link href="<?= base_url('Assets/img/logo_sekolah/'); ?><?= $data_sekolah['logo_sekolah']; ?>"
        rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('Assets/LandingPage/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('Assets/LandingPage/'); ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('Assets/LandingPage/'); ?>vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('Assets/LandingPage/'); ?>vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('Assets/LandingPage/'); ?>vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?= base_url('Assets/LandingPage/'); ?>css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Updated: Nov 01 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">

        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="<?= base_url('/'); ?>" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="<?= base_url('Assets/img/logo_sekolah/'); ?><?= $data_sekolah['logo_sekolah']; ?>" alt=""> -->
                <h1 class="sitename"><?= $data_sekolah['nama_sekolah']; ?></h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="<?= base_url('/'); ?>" class="active">Home<br></a></li>
                    <li class="dropdown"><a href="#"><span>Profile</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="<?= base_url('Sejarah'); ?>">Sejarah</a></li>
                            <li><a href="<?= base_url('Visi'); ?>">Visi & Misi</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Informasi</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="<?= $active == 'Home' ? '#informasi' : base_url('/#informasi'); ?>">Berita</a>
                            </li>
                            <li><a
                                    href="<?= $active == 'Home' ? '#pengumuman' : base_url('/#pengumuman'); ?>">Pengumuman</a>
                            <li><a href="<?= $active == 'Home' ? 'PPDB' : base_url('/PPDB'); ?>">PPDB</a>
                        </ul>
                    </li>
                    <!-- <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#team">Team</a></li> -->
                    <li><a href="<?= $active == 'Home' ? '#staff' : base_url('/#staff'); ?>">Staff</a></li>
                    <li><a href="<?= $active == 'Home' ? '#fasilitas' : base_url('/#fasilitas'); ?>">Fasilitas</a></li>
                    <li><a
                            href="<?= $active == 'Home' ? '#ekstrakurikuler' : base_url('/#ekstrakurikuler'); ?>">Ekstrakurikuler</a>
                    </li>
                    <li><a href="<?= $active == 'Home' ? '#prestasi' : base_url('/#prestasi'); ?>">Prestasi</a></li>
                    <li><a href="<?= $active == 'Home' ? '#kontak' : base_url('/#kontak'); ?>">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>


        </div>
    </header>

    <main class="main">

        <!-- content -->
        <?= $this->renderSection('konten'); ?>
    </main>

    <footer id="footer" class="footer">

        <!-- <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-6">
                        <h4>Join Our Newsletter</h4>
                        <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                        <form action="forms/newsletter.php" method="post" class="php-email-form">
                            <div class="newsletter-form"><input type="email" name="email"><input type="submit"
                                    value="Subscribe"></div>
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="d-flex align-items-center">
                        <span class="sitename">FlexStart</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>A108 Adam Street</p>
                        <p>New York, NY 535022</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                        <p><strong>Email:</strong> <span>info@example.com</span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12">
                    <h4>Follow Us</h4>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                    <div class="social-links d-flex">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div> -->


        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">
                    <?= $data_sekolah['nama_sekolah']; ?>
                </strong> <span>All Rights
                    Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Developed by <a href="" target="_blank">Dolsa</a></a>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('Assets/LandingPage/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('Assets/LandingPage/'); ?>vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url('Assets/LandingPage/'); ?>vendor/aos/aos.js"></script>
    <script src="<?= base_url('Assets/LandingPage/'); ?>vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('Assets/LandingPage/'); ?>vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url('Assets/LandingPage/'); ?>vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url('Assets/LandingPage/'); ?>vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('Assets/LandingPage/'); ?>vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('Assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <!-- Main JS File -->
    <script src="<?= base_url('Assets/LandingPage/'); ?>js/main.js"></script>
    <script>
    // add data unique id to local storage and automatic remove wehen day after 1 day
    function addDataUniqueIdToLocalStorage() {
        const uniqueId = localStorage.getItem('unique_id');
        const uniqueIdDate = localStorage.getItem('unique_id_date');
        const currentDate = new Date();
        // console.log('Current Date:', currentDate, 'Unique ID Date:', uniqueIdDate);
        if (uniqueId == null || uniqueId == '') {
            const newUniqueId = 'UID-' + Math.random().toString(36).substr(2, 9);
            localStorage.setItem('unique_id', newUniqueId);
            const date = new Date();
            localStorage.setItem('unique_id_date', date.toISOString());
            $.ajax({
                url: '<?= base_url('saveAktifitasWeb'); ?>',
                type: 'POST',
                data: {
                    unique_id: newUniqueId
                },
                dataType: 'json',
                success: function(response) {
                    // console.log('Data unique id saved to server:', response);
                },
                error: function(xhr, status, error) {
                    // console.error('Error saving unique id:', error);
                }
            });
        } else {
            // jika beda hari maka akan menghapus unique_id
            const storedDate = new Date(uniqueIdDate);
            if (currentDate.getDate() !== storedDate.getDate() ||
                currentDate.getMonth() !== storedDate.getMonth() ||
                currentDate.getFullYear() !== storedDate.getFullYear()) {
                localStorage.removeItem('unique_id');
                localStorage.removeItem('unique_id_date');
                const newUniqueId2 = 'UID-' + Math.random().toString(36).substr(2, 9);
                localStorage.setItem('unique_id', newUniqueId2);
                const date2 = new Date();
                localStorage.setItem('unique_id_date', date2.toISOString());
                // console.log('Unique ID expired and removed:', uniqueId);
                $.ajax({
                    url: '<?= base_url('Web/saveAktifitasWeb'); ?>',
                    type: 'POST',
                    data: {
                        unique_id: newUniqueId2
                    },
                    dataType: 'json',
                    success: function(response) {
                        // console.log('Data unique id saved to server:', response);
                    },
                    error: function(xhr, status, error) {
                        // console.error('Error saving unique id:', error);
                    }
                });
            }
        }
    }

    // call when page load
    $(document).ready(function() {
        addDataUniqueIdToLocalStorage();
    });
    </script>
</body>

</html>