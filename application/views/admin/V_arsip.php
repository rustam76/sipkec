<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>

<div class="card shadow mb-4 border-bottom-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">Data Arsip Pemohon</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemohon</th>
                        <th>Nama Surat</th>
                        <th>Dokumen</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemohon</th>
                        <th>Nama Surat</th>
                        <th>Dokumen</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pemohon as $row) :
                    ?>
                    <?php if($row->status == 'selesai') { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td>
                            <p>NIK : <?= $row->nik_pemohon; ?></p>
                            <p>Nama : <?= $row->nama_pemohon; ?></p>
                            <p>No Hp : <?= $row->no_hp; ?></P>
                            </td>
    
                            <td>
                                <p><?= date($row->tgl); ?></p>
                                <p><?= $row->nama_surat; ?></p>
                        </td>
                            <td><?= $row->dokumen; ?></td>
                            <td>
                                <label class="badge badge-info"><?= $row->status; ?></label>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/Pemohon/Hapus/').$row->id_pemohon ?>" class="btn-sm btn-danger" id="btn-hapus"><i class="fa fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php
                        $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

