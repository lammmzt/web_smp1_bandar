<?php 
    $dataSekolahModel = new \App\Models\dataSekolahModel();
    $data_sekolah = $dataSekolahModel->first();
    ?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Dashboard'); ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('Assets/img/logo_sekolah/') . $data_sekolah['logo_sekolah']; ?>" width="50"
                height="50" alt="" class="img-fluid bg-white rounded-circle">
        </div>
        <div class="sidebar-brand-text mx-2" max-width="50%">Admin Sekolah
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php //if (session()->get('role') == 'Admin') : ?>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($active == 'Dashboard') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('Dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <li class="nav-item <?= ($active == 'Sekolah') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('Sekolah'); ?>">
            <i class=" fas fa-fw fa-school"></i>
            <span>Data Sekolah</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>
    <li class="nav-item <?= ($active == 'Staff') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('Staff'); ?>">
            <i class="fas fa-user-tie"></i>
            <span>Data Staff</span></a>
    </li>

    <li
        class="nav-item <?= ($active == 'Ekskul' || $active == 'Fasilitas' || $active == 'Dokumentasi' || $active == 'Prestasi' || $active == 'Pengumuman') ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Master Web</span>
        </a>
        <div id="collapsePages"
            class="collapse <?= ($active == 'Ekskul' || $active == 'Fasilitas' || $active == 'Dokumentasi' || $active == 'Prestasi' || $active == 'Pengumuman') ? 'show' : ''; ?>"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Website</h6>
                <a class="collapse-item <?= ($active == 'Ekskul') ? 'active' : ''; ?>"
                    href="<?= base_url('Ekskul'); ?>">Ekskul</a>
                <a class="collapse-item <?= ($active == 'Fasilitas') ? 'active' : ''; ?>"
                    href="<?= base_url('Fasilitas'); ?>">Fasilitas</a>
                <!-- <a class="collapse-item <?= ($active == 'Dokumentasi') ? 'active' : ''; ?>"
                    href="<?= base_url('Dokumentasi'); ?>">Dokumentasi</a> -->
                <a class="collapse-item <?= ($active == 'Prestasi') ? 'active' : ''; ?>"
                    href="<?= base_url('Prestasi'); ?>">Prestasi</a>
                <a class="collapse-item <?= ($active == 'Pengumuman') ? 'active' : ''; ?>"
                    href="<?= base_url('Pengumuman'); ?>">Pengumuaman</a>

            </div>
        </div>
    </li>

    <li class="nav-item <?= ($active == 'Users') ? 'active' : ''; ?>">
        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#uersMenu" aria-expanded="true"
            aria-controls="uersMenu">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
        <div id="uersMenu" class="collapse <?= ($active == 'Users') ? 'show' : ''; ?>" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data User</h6>
                <a class="collapse-item <?= ($active == 'Users') ? 'active' : ''; ?>"
                    href="<?= base_url('Users'); ?>">User</a>
            </div>
        </div>
    </li>
    <li class="nav-item <?= ($active == 'Laporan') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('Laporan/Posyandu'); ?>">
            <i class=" fas fa-fw fa-chart-area"></i>
            <span>Laporan</span></a>
    </li>

    <?php //endif; 
    ?>

    <?php if (session()->get('role') == 'Kader') : ?>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($active == 'Dashboard') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('Dashboard/Kader'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>
    <li class="nav-item <?= ($active == 'Jadwal') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('Jadwal'); ?>">
            <i class=" fas fa-fw fa-calendar"></i>
            <span>Jadwal</span></a>
    </li>

    <li class="nav-item <?= ($active == 'orang_tua') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('Orang_tua'); ?>">
            <i class=" fas fa-fw fa-user"></i>
            <span>Orang Tua</span></a>
    </li>
    <li class="nav-item <?= ($active == 'Balita') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('Balita'); ?>">
            <i class=" fas fa-fw fa-child"></i>
            <span>Balita</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Kader
    </div>

    <li class="nav-item <?= ($active == 'Pengecekan') ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pengecekan</span>
        </a>
        <div id="collapsePages"
            class="collapse <?= ($active == 'Pengecekan' || $active == 'histori_pengecekan') ? 'show' : ''; ?>"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Pengecekan</h6>
                <a class="collapse-item <?= ($active == 'Pengecekan') ? 'active' : ''; ?>"
                    href="<?= base_url('Pengecekan'); ?>">Pengecekan</a>
                <a class="collapse-item <?= ($active == 'histori_pengecekan') ? 'active' : ''; ?>"
                    href="<?= base_url('Pengecekan/histori_pengecekan'); ?>">Histori Pengecekan</a>
            </div>
        </div>
    </li>

    <li class="nav-item <?= ($active == 'Users') ? 'active' : ''; ?>">
        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#uersMenu" aria-expanded="true"
            aria-controls="uersMenu">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
        <div id="uersMenu" class="collapse <?= ($active == 'Users') ? 'show' : ''; ?>" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data User</h6>
                <a class="collapse-item <?= ($active == 'Users') ? 'active' : ''; ?>"
                    href="<?= base_url('Users/user_posyandu'); ?>">User</a>
            </div>
        </div>
    </li>
    <li class="nav-item <?= ($active == 'Laporan') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('Laporan'); ?>">
            <i class=" fas fa-fw fa-chart-area"></i>
            <span>Laporan</span></a>
    </li>

    <?php endif; 
    ?>

    <?php if (session()->get('role') == 'Pengguna') : ?>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($active == 'Dashboard') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('Dashboard/Pengguna'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <div class="sidebar-heading">
        Pengguna
    </div>
    <li class="nav-item <?= ($active == 'orang_tua') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('Orang_tua/data_diri'); ?>">
            <i class=" fas fa-fw fa-user"></i>
            <span>Data Diri</span></a>
    </li>

    <li class="nav-item <?= ($active == 'Jadwal') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('Jadwal/jadwal_pengecekan'); ?>">
            <i class=" fas fa-fw fa-calendar"></i>
            <span>Jadwal</span></a>
    </li>
    <li class="nav-item <?= ($active == 'Balita') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('Balita/data_balita'); ?>">
            <i class=" fas fa-fw fa-child"></i>
            <span>Balita</span></a>
    </li>
    <li class="nav-item <?= ($active == 'Laporan') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('Laporan/Balita'); ?>">
            <i class=" fas fa-fw fa-chart-area"></i>
            <span>Laporan</span></a>
    </li>
    <?php endif; ?>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>