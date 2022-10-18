<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>

<div class="card shadow mb-4 border-bottom-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">Data User</h6>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIk</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <th>No</th>
                    <th>NIk</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($user as $row) :
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row->nik; ?></td>
                            <td><?= $row->username; ?></td>
                            <td><?= $row->status; ?></td>
                            <td>
                                <a type="button" class="badge badge-primary" data-toggle="modal" data-target="#fromEdit<?= $row->id_user; ?>"><i class="fa fa-pen"></i> Ubah</a>
                                <a href="<?= base_url('admin/User/hapus/') . $row->id_user; ?>" class="badge badge-danger" id="btn-hapus"><i class="fa fa-trash"></i> Hapus</a>
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

<?php foreach ($user as $row) { ?>
    <div class="modal fade " id="fromEdit<?= $row->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">From Ubah User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body ">

                    <form class="user" action="<?= base_url('admin/User/ubah') ?>" method="post">
                        <input type="text" name="id"  value="<?= $row->id_user ?>">
                        <div class="form-group">
                            <label for="">NIK</label>
                            <input type="text" name="nik" class="form-control " value="<?= $row->nik ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" value="<?= $row->username ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control " value="<?= $row->password ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="<?= $row->status ?>"><?= $row->status ?></option>
                                <option value="tidak">Tidak</option>
                            </select>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-user btn-block mb-4">
                            Ubah
                        </button>

                </div>
            </div>
        </div>
    </div>
<?php } ?>