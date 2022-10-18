</main><!-- End #main -->
<!-- <div class="modal fade " id="fromLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">

      <h5 class="h4 text-gray-900">From Login</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="card-body mb-5">
        <div class="text-center">
       
          <p>Sistem Informasi Kecamatan Poli Polia Kabupaten Kolaka Timur</p>
        </div>
        <form class="user" action="<?= base_url('Auth/Login') ?>" method="post">
          <div class="form-group">
            <input type="text" name="username" class="form-control " id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Username.">
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control " id="exampleInputPassword" placeholder="Masukkan Password">
          </div>
          <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
        </form>
        
      </div>
    </div>
  </div>
</div> -->



<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-6 col-md-6 footer-contact">

          <img src="<?= base_url() ?>assets/assetst/img/logo.png" width="100px">
          <br>
          <br>
          <h6>Sistem Informasi Pelayanan Masyarakat</h6>
          <p>
            Kecamatan Poli Polia
          </p>
        </div>


        <div class="col-lg-6 col-md-6 footer-links">
        <?php foreach($bantuan as $row) { ?>
          <iframe src="<?= $row->maps ?>"></iframe>
          <?php } ?>
        </div>

      </div>
    </div>
  </div>

  <div class="container d-md-flex py-4">

    <div class="me-md-auto text-center text-md-start">
      <div class="copyright">
        &copy; Copyright <strong><span>Sistem Informasi Pelayanan Masyarakat</span></strong>. All Rights Reserved
      </div>
    </div>
    <div class="social-links text-center text-md-right pt-3 pt-md-0">
      <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
      <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
      <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
      <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
      <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
    </div>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url(); ?>assets/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?= base_url(); ?>assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url(); ?>assets/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url(); ?>assets/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url(); ?>assets/assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/sweet/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>

<script>
  var flash = $('#flash').data('flash');
  if (flash) {
    Swal.fire({
      icon: 'success',
      title: 'Success',
      text: flash,

    })
  }
  // var flash = $('#flash').data('flash');
  // if (flash) {
  //   Swal.fire({
  //     icon: 'warning',
  //     title: 'Perhatian',
  //     text: flash,

  //   })
  // }
</script>
</body>

</html>

</body>

</html>