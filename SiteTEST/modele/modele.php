<?php
//Fichier ou ce situe tout les demandes a la base de donnée
include_once dirname(__FILE__) . '/connexion.php';//inclusion fonction de connexion bdd
$GLOBALS['dist_api'] = "http://etpvisioapi.local/";


function aut($login,$mdp)
{
    $cnx=connexion();
    $b=$cnx->prepare('Select id,role from identifiant where login = :login and mdp = :mdp');
    $b->bindParam(':login',$login);
    $b->bindParam(':mdp',$mdp);
    $b->execute();
    $res=$b->fetch();
    $id=$res["id"];
    $role=$res["role"];
    $_SESSION["id"]=$id;
    $_SESSION["role"]=$role;


    switch ($role)//choix
    {
        case "admin":
            $_SESSION["id"]=$id;
            $_SESSION["role"]=$role;
            break;
    }

}
















?>
