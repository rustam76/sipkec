<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>

<section class=" section-bg">
    <div class="container" style="margin-top: 70px;">
    <?php if ($this->session->userdata('level') !== '4') { ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login User</li>
            </ol>
        </nav>

        <!-- ======= Counts Section ======= -->
        
            <section id="" class=" card counts">
                <div class="container">
                    <div class="row text-">
                        <center>
                            <div class="col-md-6">

                                <div class="card-body">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                        <p>Sistem Informasi Kecamatan Poli Polia Kabupaten Kolaka Timur</p>
                                    </div>
                                    <form class="user" action="<?= base_url('Auth/Login') ?>" method="post">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control " id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Username.">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control " id="exampleInputPassword" placeholder="Masukkan Password">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                                    </form>
                                    <div class="text-center mt-3">
                                        <a type="button" class="small" data-toggle="modal" data-target="#fromRegis">Buat Akun</a>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>

                </div>
            </section>

        <?php } else if ($this->session->userdata('level') == '4') { ?>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Permohonan Surat</li>
            </ol>
        </nav>
            <section id="" class=" card counts">
                <div class="container">

                    <div class="row">
                        <?php
                        $no = 1;
                        foreach ($surat as $row) {
                        ?>
                            <div class="col-lg-4 col-md-6 mt-5 mb-5">
                                <div class="count-box shadow">
                                    <i class="bi bi-journal-richtext"></i>
                                    <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                                    <p><?= $row->nama_surat; ?></p>
                                    <br><br>

                                    <a type="button" class="badge badge-primary text-light" data-toggle="modal" data-target="#fromPermohonan<?= $row->id_surat; ?>">Buat Permohonan</a>

                                    <a type="button" class="badge badge-success text-light" data-toggle="modal" data-target="#fromEdit<?= $row->id_surat; ?>">Lihat Persyaratan</a>

                                </div>

                            </div>
                        <?php } ?>

                    </div>

                </div>
            </section><!-- End Counts Section -->
        <?php } ?>
</section>
<?php
foreach ($surat as $row) :
?>
    <div class="modal fade " id="fromPermohonan<?= $row->id_surat; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">From Permohonan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body ">

                    <?= form_open_multipart('Surat/ajukan'); ?>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Nama Surat</label>
                            <input type="text" name="surat" class="form-control " value="<?= $row->nama_surat; ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Nama Pemohon</label>
                            <input type="text" name="nama" class="form-control " value="<?= $this->session->userdata('username') ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Nik Pemohon</label>
                            <input type="text" name="nik" class="form-control " value="<?= $this->session->userdata('nik') ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">No Hp</label>
                            <input type="text" name="no_hp" class="form-control " placeholder="Masukkan No hp">
                        </div>

                        <div class="form-group">
                            <label for="">Upload Persyatan</label>
                            <input type="file" name="file" class="form-control ">
                            <small>* maksimum file 2 mb</small>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="reset">Reset</button>
                            <button class="btn btn-primary" type="submit">Ajukan</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- modal persyaratan -->
<?php
foreach ($surat as $row) :
?>
    <div class="modal fade " id="fromEdit<?= $row->id_surat; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Persyaratan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body ">
                    <table>
                        <tr>
                            <td>
                                <h6><?= $row->nama_surat ?></h6>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><?= $row->persyaratan ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- modal Regis -->

<div class="modal fade " id="fromRegis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">From Register</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body ">

                <form class="user" action="<?= base_url('User/Registrasi') ?>" method="post">
                    <div class="form-group">
                        <label for="">NIK</label>
                        <input type="text" name="nik" class="form-control " placeholder="Masukkan NIK">
                    </div>
                    <div class="form-group">
                    <label for="">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                    <label for="">Password</label>
                        <input type="password" name="password" class="form-control " placeholder="Password">
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary btn-user btn-block mb-4">
                        Registrasi
                    </button>
                    
            </div>
        </div>
    </div>
</div>