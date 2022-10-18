<section class=" section-bg">
  <div class="container" style="margin-top: 70px;">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Struktur</li>
      </ol>
    </nav>

    <div class="card ">
      <center>
        <div class="card-body ">
          <table class="">
            <?php foreach ($struktur as $row) { ?>
              <tr>

                <td>
                  <img src="<?= base_url('assets/img/') . $row->foto ?>" alt="" width="500px">
                </td>

              </tr>
            <?php } ?>
          </table>
        </div>
      </center>
    </div>
  </div>
</section>