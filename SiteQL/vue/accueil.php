<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 28/12/2017
 * Time: 14:33
 */

$title = 'Relevé';

ob_start();
?>

<style>
.campus {
    background-image: url('https://raw.githubusercontent.com/vvvtttxxx/12345/main/campus.jpg');
    background-size: cover; /* Ajuste la taille de l'image pour remplir le conteneur */
    background-position: center; /* Centre l'image à l'intérieur du conteneur */
    height: 100vh; /* Ajuste la hauteur de l'élément pour couvrir toute la hauteur de la fenêtre */
    width: 100%; /* Ajuste la largeur de l'élément pour couvrir toute la largeur de la fenêtre */
}

/* Changer la couleur du texte en noir */
.text-color {
    color: black;
    border: 2px solid white; 
    background-color: white; /* Définir la couleur de fond du rectangle blanc */
    margin: 0; /* Remplacer la marge automatique par une marge de 0 */
    margin-left: 1px; /* Ajouter une marge à gauche pour déplacer le rectangle à gauche */
    text-align: center; /* Aligner le texte à gauche à l'intérieur du conteneur */
    
}
</style>

<div class="campus text-center text-white d-flex">
    <div class="container my-auto">
        
            <div class="col-lg-5 mr-auto text-color"> 
                
                    <strong></strong>
                </h1>
              
            </div>
            <div class="col-lg-5 mr-auto text-color"> 
                <p class="text-faded-5 mb">
                    <h4><b>Recensement des informations de connexions du site ETPVISIO</b></h4>
                </p>
                <a class="btn btn-primary btn-xl js-scroll-trigger" href="index.php?page=authentif">Cliquer ici pour vous connecter</a>
            </div>
        </div>
    </div>
</div>

<?php
$contenu = ob_get_clean();
render($contenu,  $title);
?>
