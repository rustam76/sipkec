<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>

<div class="card shadow mb-4 border-bottom-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">Data User Registrasi</h6>
        <a class="btn btn-primary" data-toggle="modal" data-target="#fromTambah">Tambah Data <i class="fa fa-plus" style="margin-left: 10px;"></i></a>
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
                    foreach($regis as $row) :
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row->nik; ?></td>
                            <td><?= $row->username; ?></td>
                            <td>
                                <?php if($row->status !== 'aktif') { ?>
                                    <label for="" class="badge badge-danger">Belum Aktif</label>
                                <?php } ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/User/CekRegis/'). $row->id_user; ?>" class="badge badge-primary">Aproved</a>
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

<div class="modal fade " id="fromTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">From Register</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body ">

                <form class="user" action="<?= base_url('admin/User/simpan') ?>" method="post">
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