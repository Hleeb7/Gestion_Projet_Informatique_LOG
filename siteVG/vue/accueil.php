<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 28/12/2017
 * Time: 14:33
 */

$title = 'Accueil';







ob_start();




?>
 <header class="masthead text-center text-white d-flex">
 <div class="container my-auto">
<div class="row">
<div class="col-lg-10 mx-auto">
    <h1 class="text-uppercase">
      <strong></strong>
    </h1>
    <hr>
  </div>
  <div class="col-lg-8 mx-auto">
    <p class="text-faded mb-5">
    <font color ="white">
  <h4> <b> Le site ETPVISIO, permet au patient et medecin de communiquer à distance.
  Vous etes libre de partager vos expériences ! </b></font></p></h4>

  </div>
</div>
</div>
  </header>
<?php
$contenu = ob_get_clean();
render($contenu,  $title);

?>


