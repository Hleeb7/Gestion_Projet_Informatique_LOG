<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 25/03/2018
 * Time: 12:23
 */
//Fichier ou ce situe tout les demandes a la base de donnée
include_once dirname(__FILE__) . '/connexion.php';//inclusion fonction de connexion bdd
//////////////////////////////////////////////////////////////////


function get_authentif($login, $mdp)//controle la connexion
{
    $cnx = connexion();
    $sql = "select login,mdp,numadherent  from adherent where login='$login' and mdp='$mdp'";
    $res = $cnx->query($sql);
    $row = $res->fetchAll(PDO::FETCH_ASSOC);
    if ($row == true) {
        return $row[0]['numadherent'];
    } else {
        return false;
    }
}

?>