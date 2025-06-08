<?= $this->extend('Landing/Template/index') ?>
<?= $this->section('konten') ?>
<!-- Page Title -->
<div class="page-title">
    <div class="heading">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-8">
                    <h1>Detail Berita</h1>
                    <p class="mb-0">
                        Detail berita <?= $detail_berita['judul_pengumuman']; ?> yang diposting pada
                        <?= date('d M Y', strtotime($detail_berita['created_at'])); ?> oleh
                        <?= $detail_berita['nama_user']; ?>.
                        <br>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <nav class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="<?= base_url('/'); ?>">Home</a></li>
                <li><a href="<?= base_url('Berita'); ?>" class="text-decoration-none text-dark">Berita</a></li>
                <li class="current"><?= $active; ?></li>
            </ol>
        </div>
    </nav>
</div><!-- End Page Title -->
<div class="container">
    <div class="row">

        <div class="col-lg-8">

            <!-- Blog Details Section -->
            <section id="blog-details" class="blog-details section">
                <div class="container">

                    <article class="article">

                        <div class="post-img">
                            <?php
                                if ($detail_berita['type_media'] == '0') {
                                    echo '<img src="' . base_url('Assets/img/pengumuman/' . $detail_berita['nama_media']) . '" class="img-fluid" alt="">';
                                } else {
                                    echo '<iframe width="100%" height="300" src="' . $detail_berita['nama_media'] . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                }
                            ?>
                        </div>

                        <h2 class="title">
                            <?= $detail_berita['judul_pengumuman']; ?>
                        </h2>

                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="#"><?= $detail_berita['nama_user']; ?></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time
                                            datetime="<?= $detail_berita['created_at']; ?>"><?= date('d M Y', strtotime($detail_berita['created_at'])); ?></time></a>
                                <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a
                                        href="#"><?= $detail_berita['views_pengumuman']; ?> Views</a></li>
                            </ul>
                        </div><!-- End meta top -->

                        <div class="content">
                            <?= $detail_berita['deskripsi_pengumuman']; ?>
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

                    </article>

                </div>
            </section><!-- /Blog Details Section -->

        </div>

        <div class="col-lg-4 sidebar">

            <div class="widgets-container">

                <!-- Search Widget -->
                <div class="search-widget widget-item">

                    <h3 class="widget-title">Cari Konten</h3>
                    <form action="<?= base_url('Berita'); ?>" method="post">
                        <input type="text" name="cari" placeholder="Cari berita atau tag..."
                            value="<?= isset($cari) ? $cari : ''; ?>">
                        <button type="submit" title="Search" id="search"><i class="bi bi-search"></i></button>
                    </form>

                </div>
                <!--/Search Widget -->

                <!-- <div class="categories-widget widget-item">

                    <h3 class="widget-title">Categories</h3>
                    <ul class="mt-3">
                        <li><a href="#">General <span>(25)</span></a></li>
                        <li><a href="#">Lifestyle <span>(12)</span></a></li>
                        <li><a href="#">Travel <span>(5)</span></a></li>
                        <li><a href="#">Design <span>(22)</span></a></li>
                        <li><a href="#">Creative <span>(8)</span></a></li>
                        <li><a href="#">Educaion <span>(14)</span></a></li>
                    </ul>

                </div> -->
                <!--/Categories Widget -->

                <!-- Recent Posts Widget -->
                <div class="recent-posts-widget widget-item">

                    <h3 class="widget-title">Postingan Terbaru</h3>

                    <?php 
                        if (!empty($data_berita)) :
                            $no = 1;
                            foreach ($data_berita as $berita) :
                            if ($no > 5) break; // Batasi hanya 5 postingan terbaru
                            $no++;
                    ?>
                    <div class="post-item">
                        <!-- <img src="<?= base_url('Assets/img/pengumuman/' . $berita['nama_media']); ?>" alt=""
                            class="flex-shrink-0"> -->
                        <?php 
                            if ($berita['type_media'] == '0') {
                                echo '<img src="' . base_url('Assets/img/pengumuman/' . $berita['nama_media']) . '" class="flex-shrink-0" alt="">';
                            } else {
                                echo '<iframe lass="flex-shrink-0 " width="80" height="80" src="' . $berita['nama_media'] . '"  style="margin-right: 10px;"
                                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                            }
                            ?>
                        <div>
                            <h4><a
                                    href="<?= base_url('Berita/Detail/' . $berita['id_pengumuman']); ?>"><?= $berita['judul_pengumuman']; ?></a>
                            </h4>
                            <time
                                datetime="<?= $berita['created_at']; ?>"><?= date('d M Y', strtotime($berita['created_at'])); ?></time>
                        </div>
                    </div><!-- End recent post item-->
                    <?php 
                            endforeach; 
                        else :
                    ?>
                    <div class="post-item">
                        <p>Tidak ada postingan terbaru.</p>
                    </div><!-- End recent post item-->
                    <?php 
                        endif;
                    ?>
                </div>
                <!--/Recent Posts Widget -->

                <!-- Tags Widget -->
                <!-- <div class="tags-widget widget-item">

                    <h3 class="widget-title">Tags</h3>
                    <ul>
                        <li><a href="#">App</a></li>
                        <li><a href="#">IT</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Mac</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Office</a></li>
                        <li><a href="#">Creative</a></li>
                        <li><a href="#">Studio</a></li>
                        <li><a href="#">Smart</a></li>
                        <li><a href="#">Tips</a></li>
                        <li><a href="#">Marketing</a></li>
                    </ul>

                </div> -->
                <!--/Tags Widget -->

            </div>

        </div>

    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const itemsPerPage = 5;
    const items = document.querySelectorAll('.data-item');
    const totalItems = items.length;
    const totalPages = Math.ceil(totalItems / itemsPerPage);
    const pagination = document.getElementById('pagination');

    function showPage(page) {
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;

        items.forEach((item, index) => {
            item.style.display = (index >= start && index < end) ? 'block' : 'none';
        });

        renderPagination(page);
    }

    function renderPagination(currentPage) {
        pagination.innerHTML = '';

        if (totalPages <= 1) return;

        const createPageButton = (label, page) => {
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.href = '#';
            a.textContent = label;
            if (page === currentPage) a.classList.add('active');

            a.addEventListener('click', function(e) {
                e.preventDefault();
                showPage(page);
            });

            li.appendChild(a);
            return li;
        };

        // Prev
        if (currentPage > 1) {
            pagination.appendChild(createPageButton('«', currentPage - 1));
        }

        for (let i = 1; i <= totalPages; i++) {
            pagination.appendChild(createPageButton(i, i));
        }

        // Next
        if (currentPage < totalPages) {
            pagination.appendChild(createPageButton('»', currentPage + 1));
        }
    }

    // Inisialisasi pertama
    showPage(1);
});

// when search button clicked
// document.getElementById('search').addEventListener('click', function() {
//     const searchQuery = document.querySelector('input[type="text"]').value.toLowerCase();
//     const items = document.querySelectorAll('.data-item');

//     items.forEach(item => {
//         const title = item.getAttribute('data-judul').toLowerCase();
//         const tags = item.getAttribute('data-tag').toLowerCase();

//         if (title.includes(searchQuery) || tags.includes(searchQuery)) {
//             item.style.display = 'block';
//         } else {
//             item.style.display = 'none';
//         }
//     });

//     const noResults = document.querySelector('.no-results');
//     if (Array.from(items).every(item => item.style.display === 'none')) {
//         noResults.style.display = 'block';
//     } else {
//         noResults.style.display = 'none';
//     }
//     showPage(1); // Reset to first page after search
// });
</script>
<?= $this->endSection('konten') ?>