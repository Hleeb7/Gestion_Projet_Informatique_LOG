<?php
$title="ETPVISIO";
ob_start();

?>

<section id="Education thérapeutique à distance">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading">Echange en face à face entre médecin et patient à l'aide d'une webcam</h2>
          <hr class="my-4">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box mt-5 mx-auto">
            <i class="fas fa-4x fa-clinic-medical text-primary mb-3 sr-icon-1"></i>
            <h3 class="mb-3">Depuis son domcile</h3>
            <p class="text-muted mb-0">Discuter avec plusieurs membres sans se déplacer</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box mt-5 mx-auto">
            <i class="fas fa-4x fa-globe-europe text-primary mb-3 sr-icon-2"></i>
            <h3 class="mb-3">N'importe où dans le monde </h3>
            <p class="text-muted mb-0">Il est possible de prendre un rendez vous en ligne depuis l'étranger </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box mt-5 mx-auto">
            <i class="fas fa-4x fa-chalkboard-teacher text-primary mb-3 sr-icon-3"></i>
            <h3 class="mb-3">Créer des liens émotionnels au sein du groupe</h3>
            <p class="text-muted mb-0">En favorisant le partage, il est possible de créer des liens </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box mt-5 mx-auto">
            <i class="fas fa-4x fa-heart text-primary mb-3 sr-icon-4"></i>
            <h3 class="mb-3">Partager son expérience et donner des astuces auprès des autres patients</h3>
            <p class="text-muted mb-0">Il est possible d'effectuer une conférence avec plusieurs médecins et patients</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  
<?php
$contenu = ob_get_clean();
render($contenu,  $title);

?>
