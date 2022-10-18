<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>

<div class="card shadow mb-4 border-bottom-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">Data Artikel</h6>
        <a class="btn btn-primary" data-toggle="modal" data-target="#fromTambah">Tambah Data <i class="fa fa-plus" style="margin-left: 10px;"></i></a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Isi Pengumuman</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Isi Pengumuman</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    foreach($artikel as $row) :
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row->judul_artikel; ?></td>
                            <td><?= $row->isi_artikel; ?></td>
                            <td>
                                <img src="<?= base_url('assets/img/artikel/') . $row->foto; ?>" alt="" width="100px">
                            </td>
                            <td>
                                <a type="button" class="badge badge-primary" data-toggle="modal" data-target="#fromEdit<?= $row->id_artikel; ?>"><i class="fa fa-pen"></i> Ubah</a>
                                <a href="<?= base_url('admin/Artikel/hapus/'). $row->id_artikel ?>" class="badge badge-danger" id="btn-hapus"><i class="fa fa-trash"></i> Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">From Tambah Data Artikel</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body ">
                <?= form_open_multipart('admin/Artikel/simpanArtikel'); ?>
                <div class="form-group">
                    <label for="">Judul Artikel</label>
                    <input type="text" name="judul" class="form-control " placeholder="Masukkan Judul">
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto" class="form-control ">
                </div>

                <div class="form-group">
                    <label for="">isi Artikel</label>
                    <textarea name="isi" class="ckeditor form-control" id="ckedtor"></textarea>
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

<!-- modal From Tambah Data edit -->
<?php
foreach ($artikel as $row) :
?>
    <div class="modal fade " id="fromEdit<?= $row->id_artikel; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">From Ubah Artikel</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body ">
                    <?= form_open_multipart('admin/Artikel/ubahartikel'); ?>
                    <input type="hidden" name="id" value="<?= $row->id_artikel ?>">
                    <div class="form-group">
                        <label for="">Judul Artikel</label>
                        <input type="text" name="judul" class="form-control " value="<?= $row->judul_artikel ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">isi Artikel</label>
                        <textarea name="isi" class="ckeditor form-control" id="ckedtor"><?= $row->isi_artikel ?></textarea>
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