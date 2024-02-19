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
<html>
<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ETPVISIO</title>
    <!-- Bootstrap core CSS -->
    <link href="contenu/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="contenu/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="contenu/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="contenu/css/creative.min.css" rel="stylesheet">
    <script type="text/javascript" src="contenu/js/jquery.js"></script>
</head>
<body id="page-top">

<div class="imagehaut"></div>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">


        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="index.php" style="color: #333;">Accueil </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="index.php?page=faq" style="color: #333;">FAQ</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="index.php?page=inscriconf" style="color: #333;">Planning conférence</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="index.php?page=rejoindreconference" style="color: #333;">Rejoindre conférence</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="index.php?page=contact" style="color: #333;">Contact</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<div id="contenu">
    <?php
    echo $contenu;
    ?>
</div>

</main>

<!-- Bootstrap core JavaScript -->
<script src="contenu/vendor/jquery/jquery.min.js"></script>
<script src="contenu/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="contenu/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="contenu/vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="contenu/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Custom scripts for this template -->
<script src="contenu/js/creative.min.js"></script>

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
