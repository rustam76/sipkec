<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>

<div class="card shadow mb-4 border-bottom-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">Data Pemohon</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>No</th>
                        <th>Nama Surat</th>
                        <th>Nama Pemohon</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Surat</th>
                        <th>Nama Pemohon</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($disposisi as $row) :
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row->nama_surat; ?></td>
                            <td><?= $row->nama_pemohon; ?></td>
                            <td>
                                <label class="badge badge-info"><?= $row->status; ?></label>
                            </td>
                            <td>
                            <a href="<?= base_url('admin/Pemohon/Detail/').$row->id_pemohon;?>" class="btn-sm btn-info"><i class="fa fa-eye"></i> Lihat</a>
                            <a type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#fromEdit<?= $row->id_pemohon; ?>">Cek Status</a>    
                            <a href="<?= base_url('admin/Disposisi/Cek/').$row->id_disposisi ?>" class="btn-sm btn-success">Selesai</a>
                                
                            </td>
                            <!-- <td>
                            <a type="button" class="badge badge-success" data-toggle="modal" data-target="#fromDisposisi<?= $row->id_pemohon; ?>">Teruskan</a>
                            </td> -->
                        </tr>
                    <?php
                        $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal Cek -->
<?php
foreach ($disposisi as $row) :
?>
    <div class="modal fade " id="fromEdit<?= $row->id_pemohon; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">From Status Pemohon</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body ">

                    <?= form_open_multipart('admin/Disposisi/Cekdesa'); ?>
                    <input type="hidden" name="id" value="<?= $row->id_pemohon; ?>">
                    <div class="form-group">
                        <label for="">Status Surat Pemohon</label>
                        <select name="status" id="" class="form-control ">
                            <option value="">--Pilih Status--</option>
                            <option value="acc">ACC</option>
                            <option value="berkas di tolak">Berkas Ditolak</option>
                        </select>
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
<!-- akhir modal cek -->

<!-- modal disposisi -->
<?php
foreach ($disposisi as $row) :
?>
    <div class="modal fade " id="fromDisposisi<?= $row->id_pemohon; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">From Disposisi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body ">

                    <?= form_open_multipart('admin/Pemohon/disposisi'); ?>
                    <input type="hidden" name="id" value="<?= $row->id_pemohon; ?>">
                    <div class="form-group">
                        <label for="">Disposisi</label>
                       <select name="nik_desa" id="" class="form-control">
                        <?php foreach($desa as $row) { ?>
                        <option value="<?= $row->nik ?>"><?= $row->username ?></option>
                        <?php } ?>
                       </select>
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