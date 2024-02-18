<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 25/03/2018
 * Time: 12:23
 */





session_start();
//var_dump($_SESSION);
require 'modele/modele.php';
require 'controler/action.php';
$dist_api= "API/api.php";
//$dist_api = "http://localhost/ETPVisioGIT/API/";

if (isset($_GET["page"])) {//verification de la selection

    switch ($_GET["page"])//choix
    {
        case "authentif":
            authentification();
            break;
        case "contact":
        contact();
            break;
        case "faq":
            faq();
            break;
        case "test":
            test();
            break;
        case "creeconf":
            creationConference();
            break;
        case "deco":
            session_unset();
          header(  'Location: index.php');
          break;
        case "inscriconf":
            inscriptionconf();
            break;

            case "rejoindreconference":
                rejoindreconference();
                break;

            }
} else {

    accueil();//page pas d�faut


}


