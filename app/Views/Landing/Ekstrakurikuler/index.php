<?= $this->extend('Landing/Template/index') ?>
<?= $this->section('konten') ?>
<!-- Page Title -->
<div class="page-title">
    <div class="heading">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-8">
                    <h1>Daftar Ekstrakurikuler</h1>
                    <p class="mb-0">
                        Daftar Ekstrakurikuler dari <?= $data_sekolah['nama_sekolah']; ?>.
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

            <!-- Blog Posts Section -->
            <section id="staff" class="values section">

                <div class="container">

                    <div class="row gy-4">

                        <?php 
                            if (!empty($data_ekskul)) :
                                $no = 1;
                                foreach ($data_ekskul as $ekskul) :
                        ?>
                        <div class="col-lg-4 data-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="card">
                                <a href="<?= base_url('Assets/img/ekskul/' . $ekskul['foto_ekskul']); ?>"
                                    target="_blank" data-fancybox="gallery"
                                    data-caption="<?= $ekskul['nama_ekskul']; ?>">
                                    <img src="<?= base_url('Assets/img/ekskul/' . $ekskul['foto_ekskul']); ?>"
                                        class="img-fluid" alt="">
                                </a>
                                <h3><?= $ekskul['nama_ekskul']; ?></h3>
                                <p><?= substr(strip_tags($ekskul['deskripsi_ekskul']), 0, 50) . '...'; ?></p>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <a href="<?= base_url('Ekstrakurikuler/Detail/' . $ekskul['id_ekskul']); ?>"
                                        class="more-link">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div><!-- End Card Item -->


                        <?php 
                                endforeach; 
                            else :
                        ?>
                        <div class="col-12">
                            <p class="text-center">Tidak ada ekstrakurikuler yang ditemukan.</p>
                        </div>
                        <?php 
                            endif;
                        ?>

                    </div><!-- End blog posts list -->
                    <div class="no-results" style="display: none;">
                        <p>Tidak ada hasil yang ditemukan.</p>
                    </div>
                </div>

            </section><!-- /Blog Posts Section -->
            <section id="blog-pagination" class="blog-pagination section">

                <div class="container">
                    <div class="d-flex justify-content-center">
                        <ul id="pagination">
                            <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#" class="active">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li>...</li>
                            <li><a href="#">10</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>

            </section><!-- /Blog Pagination Section -->
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const itemsPerPage = 3;
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
</script>
<?= $this->endSection('konten') ?>