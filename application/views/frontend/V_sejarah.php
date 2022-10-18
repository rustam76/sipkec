<section class=" section-bg" >
<div class="container" style="margin-top: 70px;">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Sejarah</li>
  </ol>
</nav>

<div class="card " >

    <div class="card-body ">
        <table class="">
            <?php foreach($sejarah as $row) { ?>
            <tr>
                <td><h4>Sejarah</h4></td>
             
            </tr>
            <tr>
            <td><p><?= $row->isi_sejarah; ?></p></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    </div>
</div>
</section>