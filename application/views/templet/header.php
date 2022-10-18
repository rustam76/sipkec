<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Pelayanan Masyarakat</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/sweet/sweetalert2.min.css">

</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3"> <img src="<?= base_url() ?>assets/assetst/img/logo2.png" width="170px" height="40"></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <?php if ($this->session->userdata('level') == 1) { ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?=  $this->uri->segment(2) == 'Dasboard' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/Dasboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <li class="nav-item <?=  $this->uri->segment(2) == 'Artikel' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/Artikel'); ?>">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Artikel</span></a>
            </li>
            <li class="nav-item <?=  $this->uri->segment(2) == 'Regis' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/Regis') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Registrasi</span></a>
            </li>
            <li class="nav-item  <?=  $this->uri->segment(2) == 'Pemohon' ? 'active' : '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Pemohon</span>
                </a>
                <div id="collapsePages" class="collapse <?=  $this->uri->segment(2) == 'Pemohon' ? 'show' : '' ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Master :</h6>
                        <a class="collapse-item" href="<?= base_url('admin/Pemohon'); ?>">Pemohon</a>
                        <a class="collapse-item" href="<?= base_url('admin/Pemohon/arsip'); ?>">Arsip</a>
                    </div>
                </div>
            </li>
            <li class="nav-item <?=  $this->uri->segment(2) == 'Surat' ? 'active' : '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Master Layanan</span>
                </a>
                <div id="collapseTwo" class="collapse <?=  $this->uri->segment(2) == 'Surat' ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Master :</h6>
                        <a class="collapse-item <?=  $this->uri->segment(2) == 'Surat' ? 'active' : '' ?>" href="<?= base_url('admin/Surat') ?>">Surat</a>
                        <a class="collapse-item" href="<?= base_url('admin/Surat/Pengumuman') ?>">Pengumuman</a>
                    </div>
                </div>
            </li>
            <li class="nav-item  <?=  $this->uri->segment(2) == 'User' || $this->uri->segment(2) == 'Master'  ? 'active' : '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseUtilities" class="collapse <?=  $this->uri->segment(2) == 'User' || $this->uri->segment(2) == 'Master' ? 'show' : '' ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Master:</h6>
                        
                        <a class="collapse-item" href="<?= base_url('admin/User') ?>">Data User</a>
                        <a class="collapse-item" href="<?= base_url('admin/Master') ?>">Visi Dan Misi</a>
                        <a class="collapse-item" href="<?= base_url('admin/Master/sejarah') ?>">Sejarah</a>
                        <a class="collapse-item" href="<?= base_url('admin/Master/tentang') ?>">Tentang Kami</a>
                        <a class="collapse-item" href="<?= base_url('admin/Master/struktur') ?>">Struktur</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengguna
            </div>
            <li class="nav-item <?=  $this->uri->segment(2) == 'Pengguna' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/Pengguna'); ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>User</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" id="btn-keluar" href="<?= base_url('admin/Home/logout') ?>">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Log Out</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <?php } else if ($this->session->userdata('level') == 2) { ?>
                <!-- Nav Item - Dashboard -->
            <li class="nav-item <?=  $this->uri->segment(2) == 'Dasboard' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/Dasboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <li class="nav-item <?=  $this->uri->segment(2) == 'Disposisi' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/Disposisi'); ?>">
                <i class="fas fa-fw fa-folder"></i>
                    <span>Disposisi</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengguna
            </div>
            <li class="nav-item <?=  $this->uri->segment(2) == 'Pengguna' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/Pengguna'); ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>User</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" id="btn-keluar" href="<?= base_url('admin/Home/logout') ?>">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Log Out</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> 

            <?php } ?>
        </ul>
        <!-- End of Sidebar -->