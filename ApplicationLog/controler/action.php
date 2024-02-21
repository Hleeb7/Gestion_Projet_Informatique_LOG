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

<style>
   body {
        color: white; /* Change la couleur du texte en blanc */
    }
    nav ul li a {
    font-size: 20px; /* Changer la taille de la police des éléments de menu */
    border: 2px solid gray; /* Ajoute une bordure de 2 pixels solide blanche autour de l'élément <nav> */
    padding: 5px; /* Ajoute un espace intérieur de 10 pixels pour séparer le contenu de la bordure */
    background-color: white; /* Définit la couleur de fond de l'élément <nav> en blanc */
}
    nav ul li a:hover {
    background-color: gray; /* Changer la couleur de fond lorsque survolé */
}
nav {
    position: fixed; /* Positionnement fixe */
    top: 0; /* À partir du haut de la fenêtre */
    left: 0; /* À partir de la gauche de la fenêtre */
    width: 20%; 
    background-color: #333; /* Couleur de fond */
    padding: 10px; /* Espacement intérieur pour un meilleur aspect */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Ombre */
    z-index: 999; /* Pour s'assurer que le menu apparaît au-dessus des autres éléments */
}
header {
    position: fixed; /* Positionnement fixe */
    top: 0; /* En haut de la fenêtre */
    left: 100; /* À gauche de la fenêtre */
    width: 100%; /* Largeur de 100% */

    padding: 10px; /* Espacement intérieur */
    text-align: center; /* Alignement du texte au centre */
    z-index: 999; /* Pour s'assurer que l'en-tête apparaît au-dessus des autres éléments */
}

</style>

    <header>
        <h2><b title="Retour  l'index du site" href="index.php">Application lecture LOG</b></h2>
    </header>
    <style>
        b {
            color: white; /* Changement de couleur en noir */
            
        }
    </style>

    <nav>
        <h2>Menu</h2>



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

        <div>
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