<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>

<div class="card shadow mb-4 border-bottom-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">Data Surat</h6>
        <a class="btn btn-primary" data-toggle="modal" data-target="#fromTambah">Tambah Data <i class="fa fa-plus" style="margin-left: 10px;"></i></a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Persyaratan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Persyaratan</th>
                    <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($surat as $row) :
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row->nama_surat; ?></td>
                            <td><?= $row->persyaratan; ?></td>
                            <td width="90px">
                                <a type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#fromEdit<?= $row->id_surat; ?>"><i class="fa fa-pen"></i> Ubah</a>
                                <br><br>
                                <a href="<?= base_url('admin/Surat/Hapus/').$row->id_surat ?>" class="btn-sm btn-danger" id="btn-hapus"><i class="fa fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="fromTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">From Tambah Data Surat</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body ">

                <?= form_open_multipart('admin/Surat/simpan'); ?>

                <div class="form-group">
                    <label for="">Nama Surat</label>
                    <input type="text" name="nama" class="form-control " placeholder="Masukkan Nama Surat">
                </div>
                <div class="form-group">
                    <label for="">Peryaratan Surat</label>
                    <textarea name="persyaratan" class="ckeditor form-control" id="ckedtor"></textarea>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="reset">Reset</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!-- modal From Tambah Data Arsip -->
<?php
foreach ($surat as $row) :
?>
    <div class="modal fade " id="fromEdit<?= $row->id_surat; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">From Ubah Surat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body ">

                    <?= form_open_multipart('admin/Surat/ubah'); ?>
                    <input type="hidden" name="id" value="<?= $row->id_surat; ?>">
                    <div class="form-group">
                        <label for="">Namam Surat</label>
                        <input type="text" name="nama" class="form-control " value="<?= $row->nama_surat; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Peryaratan Surat</label>
                        <textarea name="persyaratan" class="ckeditor form-control" id="ckedtor"><?= $row->persyaratan; ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="reset">Reset</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end modal From Tambah Data Arsip -->