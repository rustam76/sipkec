<section class=" section-bg" >
<div class="container" style="margin-top: 70px;">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Visi & Misi</li>
  </ol>
</nav>

<div class="card " >

    <div class="card-body ">
        <table class="">
            <?php foreach($visi as $row) { ?>
            <tr>
                <td><h4>Visi</h4></td>
             
            </tr>
            <tr>
            <td><p><?= $row->visi; ?></p></td>
            </tr>
            <tr>
                <td><h4>Misi</h4></td>
               
            </tr>
            <tr>
            <td><p><?= $row->misi; ?></p></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    </div>
</div>
</section>