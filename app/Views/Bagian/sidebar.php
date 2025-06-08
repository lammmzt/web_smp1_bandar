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
    <li class="nav-item <?= ($active == 'TabelBantu') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('TabelBantu'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Bantu</span></a>
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
    <!-- <li class="nav-item <?= ($active == 'Laporan') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('Laporan/Posyandu'); ?>">
            <i class=" fas fa-fw fa-chart-area"></i>
            <span>Laporan</span></a>
    </li> -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>