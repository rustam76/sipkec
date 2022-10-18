

    

<!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg" >
        <div class="container" style="margin-top: 70px;">
        <nav aria-label="breadcrumb" > 
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Bantuan</li>
        </ol>
    </nav>
    <?php foreach($bantuan as $row ) { ?>
            <div class="row">

                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Our Address</h3>
                                <p><?= $row->alamat ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-envelope"></i>
                                <h3>Email Us</h3>
                                <p><?= $row->email ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Call Us</h3>
                                <p><?= $row->nohub ?></p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 mt-4 mt-lg-0">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <?= $row->isi_tentang ?>
                    </form>
                </div>

            </div>
            <?php } ?>

        </div>
    </section><!-- End Contact Section -->

