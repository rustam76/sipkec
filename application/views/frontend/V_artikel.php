<section id="team" class="team section-bg">
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
                    foreach ($artikel as $row) {
                    ?>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mb-4">
                        <div class="member">
                            <div class="member-img">
                                <img src="<?= base_url('assets/img/artikel/').$row->foto ?>" class="img-fluid" alt="">
                                <div class="social">
                                    <a href="<?= base_url('Artikel/detail/' . $row->id_artikel) ?>">Read More</a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4><?= $row->judul_artikel ?></h4>
                                <span><?= $row->isi_artikel ?></span>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>