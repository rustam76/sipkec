<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>

<div class="card shadow mb-4 border-bottom-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">Tentang</h6>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>Alamat</th>
                        <th>Luas Wilayah</th>
                        <th>No Hp</th>
                        <th>Email</th>
                        <th>Maps</th>
                        <th>Isi</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Alamat</th>
                        <th>Luas Wilayah</th>
                        <th>No Hp</th>
                        <th>Email</th>
                        <th>Maps</th>
                        <th>Isi</th>
                        <th>AKSI</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php

                    foreach ($tentang as $row) :
                    ?>
                        <tr>

                            
                            <td><?= $row->alamat; ?></td>
                            <td><?= $row->luas; ?></td>
                            <td><?= $row->nohub; ?></td>
                            <td><?= $row->email; ?></td>
                            <td><?= $row->maps; ?></td>
                            <td><?= $row->isi_tentang; ?></td>
                            <td>
                                <a type="button" class="badge badge-primary" data-toggle="modal" data-target="#fromEdit<?= $row->id_tentang; ?>"><i class="fa fa-pen"></i> Ubah</a>
                            </td>
                        </tr>
                    <?php
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- modal From Tambah Data Arsip -->
<?php
foreach ($tentang as $row) :
?>
    <div class="modal fade " id="fromEdit<?= $row->id_tentang; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">From Tambah Data Pegawai</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body ">

                    <?= form_open_multipart('admin/Master/ubahTentang'); ?>
                    <input type="hidden" name="id" value="<?= $row->id_tentang ?>">
                    <div class="form-group">
                        <Label>Luas Wilayah</Label>
                        <input type="text" name="luas" class="form-control" value="<?= $row->luas ?>">                    
                    </div>
                    <div class="form-group">
                        <Label>Alamat</Label>
                        <input type="text" name="alamat" class="form-control" value="<?= $row->alamat ?>">                    
                    </div>
                    <div class="form-group">
                        <Label>Maps</Label>
                        <input type="text" name="maps" class="form-control" value="<?= $row->maps ?>">                    
                    </div>
                    <div class="form-group">
                        <Label>No Hp</Label>
                        <input type="text" name="nohub" class="form-control" value="<?= $row->nohub ?>">                    
                    </div>
                    <div class="form-group">
                        <Label>Email</Label>
                        <input type="text" name="email" class="form-control" value="<?= $row->email ?>">                    
                    </div>
                    <div class="form-group">
                        <Label>Bantuan</Label>
                        <textarea name="isi" class="ckeditor form-control" id="ckedtor"><?= $row->isi_tentang; ?></textarea>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="reset">Reset</button>
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
