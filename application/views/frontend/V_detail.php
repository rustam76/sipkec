<section class="team section-bg">
    <div class="container" style="margin-top: 70px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Artikel</li>
            </ol>
        </nav>
        <div class="card mb-5">
            <div class="card-body">
                <div class="row">
                <?php
                    $no = 1;
                    foreach ($detail as $row) {
                    ?>
                    <div class="col-lg-12 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <div class="member-img">
                                <img src="<?= base_url('assets/img/artikel/').$row->foto ?>" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4><?= $row->judul_artikel ?></h4>
                              
                            </div>
                        </div>
                    </div>
                    <p><?= $row->isi_artikel ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>