<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>

<div class="card shadow mb-4 border-bottom-success">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">Sejarah</h6>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>

                        <th>SEJARAH</th>
                 
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>

                    <th>SEJARAH</th>
                 
                 <th>AKSI</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php

                    foreach ($sejarah as $row) :
                    ?>
                        <tr>

                            <td><?= $row->isi_sejarah; ?></td>
                            <td>
                                <a type="button" class="badge badge-primary" data-toggle="modal" data-target="#fromEdit<?= $row->id_sejarah; ?>"><i class="fa fa-pen"></i> Ubah</a>
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
foreach ($sejarah as $row) :
?>
    <div class="modal fade " id="fromEdit<?= $row->id_sejarah; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">From Ubah Sejarah</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body ">

                    <?= form_open_multipart('admin/Master/ubahSejarah'); ?>
                    <input type="hidden" name="id" value="<?= $row->id_sejarah ?>">
                    <div class="form-group">
                        <Label>Isi Sejarah</Label>
                        <textarea name="sejarah" class="ckeditor form-control" id="ckedtor"><?= $row->isi_sejarah; ?></textarea>
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
<!-- end modal From Tambah Data Arsip -->