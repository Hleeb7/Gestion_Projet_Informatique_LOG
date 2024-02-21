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
                <a class="nav-link js-scroll-trigger" href="index.php?page=web">Serveur Web</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link js-scroll-trigger" href="index.php?page=sql">Site SQL</a>
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


function sql()
{
    require 'vue/SQL.php';
}
function sqlstats()
{
    require'vue/StatsSQL.php';
}
function sqllog()
{
    require 'vue/logSQL.php';
}
/**
 *
 */
function detail(){
    require 'vue/detailformation.php';

}

/**
 *
 */
function erreurlogmdp()
{
    require 'vue/erreurlogmdp.php';
}


?>