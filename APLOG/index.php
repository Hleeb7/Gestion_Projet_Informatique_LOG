<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 25/03/2018
 * Time: 12:23
 */





session_start();
require 'modele/modele.php';
require 'controler/action.php';
//phpinfo();

if (isset($_GET["page"])) {//verification de la selection

    switch ($_GET["page"])//choix
    {
        case "cnx":
            authentification();
            break;
        case "web":
            web();
            break;

        case "deconnexion":
            session_unset();
            accueil();
            break;

        case "inscriform":
            detail();
            break;

        case "validation":
            validinscri();
            break;
        case "mesformations":
            mesFormations();
            break;
        case "desinscription":
            desincription();
        case "inscription":
            inscription();



    }
} else {


    accueil();//page pas d�faut


}

?>










