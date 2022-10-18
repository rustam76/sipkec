<div class="py-3 d-flex flex-row align-items-center justify-content-between">
    <a class="btn btn-primary" data-toggle="modal" data-target="#fromEdit<?= $this->session->userdata('id_user') ?>">Ubah Data <i class="fa fa-plus" style="margin-left: 10px;"></i></a>
</div>

<center>
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/'). $this->session->userdata('foto'); ?>">
                    <div class="mt-4 text-left small">
                        <tr>
                            <td>
                                <h5>NAMA &nbsp;: <?= $this->session->userdata('username') ?></h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $this->session->userdata('nik') ?></h5>
                            </td>
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>



<div class="modal fade " id="fromEdit<?= $this->session->userdata('id_user') ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">From Ubah User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body ">
                <?= form_open_multipart('admin/User/ubahPengguna') ?>
                <input type="hidden" name="id" value="<?= $this->session->userdata('id_user') ?>">
                <div class="form-group">
                    <label for="">NIK</label>
                    <input type="text" name="nik" class="form-control " value="<?= $this->session->userdata('nik') ?>">
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" value="<?= $this->session->userdata('username') ?>">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" name="password" class="form-control " value="<?= $this->session->userdata('password') ?>">
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="<?= $this->session->userdata('status') ?>"><?= $this->session->userdata('status') ?></option>
                        <option value="tidak">Tidak</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <hr>
                <button type="submit" class="btn btn-primary btn-user btn-block mb-4">
                    Ubah
                </button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>