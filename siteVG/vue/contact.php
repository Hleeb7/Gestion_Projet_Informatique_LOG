<?php
$title="ETPVISIO";
ob_start();

?>

<section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <h2 class="section-heading">Un personnel dédié pour vous accompagner ! </h2>
          <hr class="my-4">
          <p class="mb-5">Vous pouvez nous contacter par téléphone ou par mail.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center">
          <i class="fas fa-phone fa-3x mb-3 sr-contact-1"></i>
          <p>01.30.42.20.22</p>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 sr-contact-2"></i>
          <p>
            <a href="mailto:your-email@your-domain.com">etpvisiomed@gmail.com</a>
          </p>
        </div>
      </div>
    </div>
  </section>
<?php
$contenu = ob_get_clean();
render($contenu,  $title);

?>


