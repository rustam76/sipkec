<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>

<div class="card shadow mb-4 border-bottom-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">Berkas</h6>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php foreach ($detail as $row) { ?>
                    <iframe src="<?= base_url('assets/pemohon/') . $row->dokumen; ?>" frameborder="0" width="100%" height="500px"></iframe>
                <?php } ?>
            </table>
        </div>
    </div>
</div>