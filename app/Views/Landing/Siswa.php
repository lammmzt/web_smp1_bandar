<?= $this->extend('Landing/Template/index') ?>
<?= $this->section('konten') ?>
<!-- Page Title -->
<div class="page-title">
    <div class="heading">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-8">
                    <h1>Informasi Siswa</h1>
                    <p class="mb-0">
                        Informasi Siswa
                        <?= $data_sekolah['nama_sekolah']; ?>.
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
                        <div class="row gy-4 table-responsive">
                            <table id="dataSiswaTabel" class="table table-striped table-bordered my-2"
                                style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Tahun Ajaran</th>
                                        <th class="text-center">Jumlah Siswa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_siswa as $value) : ?>
                                    <tr>
                                        <td class="text-center align-middle"><?= $no++; ?></td>
                                        <td class="align-middle text-center"><?= $value['tahun_ajaran']; ?></td>
                                        <td class="align-middle text-center"><?= $value['jumlah_siswa']; ?></td>

                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>


                        </div>

                    </article>

                </div>
            </section><!-- /Blog Details Section -->

        </div>
    </div>
</div>


<?= $this->endSection('content'); ?>
<?= $this->section('script'); ?>
<script>
$(document).ready(function() {
    $('#dataSiswaTabel').DataTable({
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
            "emptyTable": "Tidak ada data siswa yang tersedia."
        }
    });
});
</script>
<?= $this->endSection('script'); ?>