<section class=" section-bg">
    <div class="container" style="margin-top: 70px;">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengumuman</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <?php foreach($peng as $row) { ?>
                    <div class="col-md-6 mt-5 mb-5">
                            <div class="card-body shadow">
                                <img src="<?= base_url('assets/img/peng/') . $row->foto; ?>" alt="" class="img-fluid">
                               
                                <h1><?= $row->judul; ?></h1>
                                <p><?= $row->isi_pengumuman; ?></< /p>
                                <div class="social">
                                    <a href="<?= base_url('Home/detailPeng/' . $row->id_pengumuman) ?>" class="btn-sm btn-primary">Read More</a>
                                </div>
                            </div>
                     
                    </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</section>