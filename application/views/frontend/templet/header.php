<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sistem Informasi Pelayanan Masyrakat</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>assets/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- =======================================================
  * Template Name: Resi - v4.8.0
  * Template URL: https://bootstrapmade.com/resi-free-bootstrap-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="lo">
            <img src="<?= base_url() ?>assets/assetst/img/kol.png" width="230px" height="60">    
            <!-- <a href="index.html">siskec</a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
<h2>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto  <?= $this->uri->segment(1) == 'Home' ? 'active' : '' ?>" href="<?= base_url('Home') ?>">Home</a></li>
                    <li><a class="nav-link scrollto  <?= $this->uri->segment(1) == 'Artikel' ? 'active' : '' ?>" href="<?= base_url('Artikel') ?>">Artikel</a></li>
                    <li class="dropdown"><a href="#" class="nav-link scrollto  <?= $this->uri->segment(1) == 'Master' ? 'active' : '' ?>"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?= base_url('Master') ?>">Visi & Misi</a></li>
                            <li><a href="<?= base_url('Master/sejarah') ?>">Sejarah</a></li>
                            <li><a href="<?= base_url('Master/struktur') ?>">Struktur</a></li>
                        </ul>
                    </li>
                    <li class="dropdown  "><a href="#" class="nav-link scrollto  <?= $this->uri->segment(1) == 'Surat' ? 'active' : '' ?>"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?= base_url('Surat') ?>">Permohonan Surat</a></li>
                            <li><a href="<?= base_url('Surat/Pengumuman') ?>">Pengumuman</a></li>
                            <li><a href="<?= base_url('Surat/suratpemohon') ?>">Surat</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto  <?= $this->uri->segment(1) == 'Bantu' ? 'active' : '' ?>" href="<?= base_url('Bantu') ?>">Bantuan</a></li>
                    <?php if ($this->session->userdata('level') !== '4') { ?>
                    <li><a class="getstarted scrollto" href="<?= base_url('Surat') ?>">Login</a></li>
                    <?php } else if ($this->session->userdata('level') == '4') { ?>
                    <li><a class="getstarted scrollto" href="<?= base_url('Auth/logout') ?>">Logout</a></li>
                    <?php }?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
            </h2>
        </div>
    </header><!-- End Header -->