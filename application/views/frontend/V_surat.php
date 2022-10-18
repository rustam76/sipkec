<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>
<!-- <div id="flash" data-flash="<?= $this->session->flashdata('gagal'); ?>"></div> -->
<section class=" section-bg">
    <div class="container" style="margin-top: 70px;">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Surat</li>
            </ol>
        </nav>

        <!-- ======= Counts Section ======= -->
        <section id="" class=" card counts">
            <div class="container">
           
                <div class="card-body">
                <?php if ($this->session->userdata('level') !== '4') { ?>
                    <h5 class="text-center">Anda Belum Login Bro...!!! </h5>
                    
                <?php }else if ($this->session->userdata('level') == '4') { ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>Nama Surat</th>
                                    <th>Status</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>Nama Surat</th>
                                    <th>Status</th>
                                    <th>#</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pemohon as $row) { ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $row->nama_pemohon ?></td>
                                        <td><?= $row->nama_surat ?></td>
                                        <td>
                                            <?php if($row->status == 'selesai') { ?>
                                                <a href="#" class="btn-sm btn-primary"><?= $row->status ?></</a>
                                            <?php }else if($row->status !== 'berkas di tolak') { ?>
                                               <a href="#" class="btn-sm btn-danger"><?= $row->status ?></</a>
                                            <?php }else if($row->status == 'berkas di tolak') { ?>
                                                <a href="#" class="btn-sm btn-warning"><?= $row->status ?></a>
                                                &nbsp;&nbsp;
                                                <a type="button" class="btn-sm btn-info text-light" data-toggle="modal" data-target="#fromUbah<?= $row->id_pemohon; ?>">Ubah</a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if($row->status == 'selesai') { ?>
                                               <a href="<?= base_url('Surat/Download/').$row->id_pemohon; ?>" class="btn-sm btn-primary">Download</a>
                                            <?php }else if($row->status == 'acc') { ?>
                                                <a href="#" class="btn-sm btn-primary">Terverifikasi</a>
                                            <?php }else if($row->status !== 'acc') { ?>
                                                <a href="#" class="btn-sm btn-danger">Menungggu</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                           
                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                </div>
            </div>

    </div>
</section><!-- End Counts Section -->

</section>

<?php
foreach ($pemohon as $row) :
?>
    <div class="modal fade " id="fromUbah<?= $row->id_pemohon ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">From Ubah Berkas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body ">

                    <?= form_open_multipart('Surat/Ubah'); ?>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <!-- <label for="">Nama Surat</label> -->
                            <input type="hidden" name="surat" class="form-control " value="<?= $row->id_pemohon; ?>" readonly>
                        </div>
                       
                        <div class="form-group">
                            <label for="">Upload Ulang Persyatan</label>
                            <input type="file" name="file" class="form-control ">
                            <small>* maksimum file 2 mb</small>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="reset">Reset</button>
                            <button class="btn btn-primary" type="submit">Ubah</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
