<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 25/03/2018
 * Time: 12:23
 */






function render($contenu,$title)//afficheur des vue via le contenu
{

    ob_start();
    ?>

    <html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/css.css">


</head>

<body>

<main>

    <header>
        <h2><a title="Retour  l'index du site" href="index.php">Application lecture LOG</a></h2>
    </header>

    <nav>
        <h3>Menu</h3>


        <ul>
            <li class="nav-item mr-3">
                <a class="nav-link js-scroll-trigger" href="index.php">Accueil</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link js-scroll-trigger" href="index.php?page=web">Accès Serveur</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link js-scroll-trigger" href="index.php?page=sql">Erreurs Serveur</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="index.php?page=cnx">Connexion</a>
            </li>
        </ul>

    </nav>


    <div id="contenu">


        <?php
        echo $contenu;
        ?>
    </div>
    <footer></footer>


</main>
</body>



    <?php
}


// Affiche la page d'acceuil

/**
 *
 */
function accueil()
{
    require 'vue/accueil.php';
}


/**
 *
 */
function authentification()

{
    require 'vue/authentification.php';
}

/**
 *
 */
function erreurauth()

{
    require 'vue/erreurlogmdp.php';
}

/**
 *
 */
function web()
{
    require 'vue/Web.php';

}
function webstats()
{
    require'vue/StatsWeb.php';
}
function weblog()
{
    require 'vue/LogWeb.php';
}


function error()
{
    require 'vue/erreur.php';
}
function sqlstats()
{
    require'vue/statserreur.php';
}
function logerror()
{
    require 'vue/logerror.php';
}
/**
 *
 */

function accesparip(){
    require 'vue/accessparip.php';
}
/**
 *
 */
function erreurlogmdp()
{
    require 'vue/erreurlogmdp.php';
}


?>