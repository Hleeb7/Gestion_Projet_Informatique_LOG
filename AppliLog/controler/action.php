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



            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="index.php" style="color: #333;">Accueil </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="index.php?page=web" style="color: #333;">Serveur Web</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="index.php?page=sql" style="color: #333;">Site SQL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="index.php?page=authentif" style="color: #333;">Connexion</a>
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
