<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 25/03/2018
 * Time: 12:23
 */


function render($contenu, $title)//afficheur des vue via le contenu
{
ob_start();
?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Bootstrap core CSS -->
        <link href="contenu/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template -->
        <link href="contenu/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

        <!-- Plugin CSS -->
        <link href="contenu/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="contenu/css/creative.min.css" rel="stylesheet">
        <link href="contenu/css/custom.css" rel="stylesheet">
    </head>
    <body id="page-top">

    <div class="container-fluid">
        <div class="row">
            <!-- Zone de lien en haut -->
            <div class="col-lg-12 bg-light">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">SQL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Titre</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Web</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <!-- Zone de lien à gauche -->
            <div class="col-lg-2 bg-light">
                <div class="sidebar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Lien 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Lien 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Lien 3</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="contenu/js/jquery.js"></script>
    <script type="text/javascript" src="contenu/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="contenu/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script type="text/javascript" src="contenu/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="contenu/js/creative.min.js"></script>
    </body>
    </html>


    <div id="contenu">
    <?php
    echo $contenu;
    ?>
</div>

</main>

<!-- Bootstrap core JavaScript -->

</body>


<?php
}

// Affiche la page d'acceuil

function accueil()
{
    require 'vue/accueil.php';
}
function authentification()
{
    require 'vue/authentification.php';
}
function contact()
{
    require 'vue/contact.php';
}
function faq()
{
    require 'vue/faq.php';
}
function test()
{
    require 'vue/test.php';
}
function creationConference()
{
    require 'vue/creationConference.php';
}
function inscriptionconf()
{
    require 'vue/inscriconf.php';
}
function rejoindreconference()
{
    require 'vue/rejoindreconference.php';
}

?>
