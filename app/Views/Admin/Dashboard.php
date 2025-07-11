<?= $this->extend('Template/index'); ?>
<?= $this->Section('konten'); ?>
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Staff</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $jml_staff; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Fasilitas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $jml_fasilitas; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hotel fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Jumlah Ekskul</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $jml_ekskul; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-futbol fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Jumlah Prestasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $jml_prestasi; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas  fa-trophy fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<!-- <div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Penonton Tahun <?= date('Y'); ?></h6>
                <div class="dropdown no-arrow">
                    <form action="<?= base_url('Dashboard'); ?>" method="post">
                        <select name="bulan" id="bulan" class="form-control" onchange="this.form.submit()">
                            <option value="">Pilih Bulan</option>
                            <?php
                            $bulan = [
                                '01' => 'Januari',
                                '02' => 'Februari',
                                '03' => 'Maret',
                                '04' => 'April',
                                '05' => 'Mei',
                                '06' => 'Juni',
                                '07' => 'Juli',
                                '08' => 'Agustus',
                                '09' => 'September',
                                '10' => 'Oktober',
                                '11' => 'November',
                                '12' => 'Desember'
                            ];
                            foreach ($bulan as $key => $value) {
                                $selected = ($key == '') ? 'selected' : '';
                                echo "<option value='$key' $selected>$value</option>";
                            }
                            ?>

                        </select>
                    </form>

                </div>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="Penonton"></canvas>
                </div>
            </div>
        </div>
    </div>

</div> -->

<?= $this->endSection('konten'); ?>
<?= $this->Section('script'); ?>
<script>
</script>
<?= $this->endSection('script'); ?>