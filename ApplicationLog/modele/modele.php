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

function connexion ()
{
    $con = mysqli_connect("localhost:8889","root","root","base_PII_24"); //retirer mdp (3) si windows et retirer :8889 si autres que mac
    return $con;
}

function deconnexion($con)
{
    mysqli_close($con);
}

function Insert_Line_User_Log ($ip,$dt,$tm,$requeteStatut,$url,$systeme,$navigateur)
{
    $requete = "insert into logs values(null,'".$ip."','".$dt."','".$tm."','".$requeteStatut."','".$url."','".$systeme."','".$navigateur."');";
    $con = connexion();
    mysqli_query($con,$requete);
    deconnexion($con);
}

function Verify_Exist_User_Log ($ip,$dt,$tm,$requeteStatut,$url,$systeme,$navigateur)
{
    $con = connexion();
    $result = mysqli_query($con,"SELECT idlogs FROM logs WHERE ip = '".$ip."' AND dtlog = '".$dt."' AND tmlog = '".$tm."' AND requeteStatut = '".$requeteStatut."' AND urllog = '".$url."' AND systeme = '".$systeme."' AND navigateur = '".$navigateur."'");
    $req = mysqli_fetch_array($result);
    if($req == true)
    {
        $return = true;
    }
    else
    {
        $return = false;
    }
    deconnexion($con);

    return $return;
}

function Insert_Line_Error_Log ($dt, $tm, $typeErreur, $pid, $client, $message)
{
    $requete = "insert into ErrorLog values(null,'".$dt."','".$tm."','".$typeErreur."','".$pid."','".$client."','".$message."');";
    $con = connexion();
    mysqli_query($con,$requete);
    deconnexion($con);
}

function Verify_Exist_Error_Log ($dt, $tm, $typeErreur, $pid, $client, $message)
{
    $con = connexion();
    $result = mysqli_query($con,"SELECT idlogs FROM ErrorLog WHERE dtlog = '".$dt."' AND tmlog = '".$tm."' AND typeErreur = '".$typeErreur."' AND pid = '".$pid."' AND client = '".$client."' AND MessageErreur = '".$message."'");
    $req = mysqli_fetch_array($result);
    if($req == true)
    {
        $return = true;
    }
    else
    {
        $return = false;
    }
    deconnexion($con);

    return $return;
}

function Select_All_Ip ()
{
    $requete = "select ip, count(*) as nbConnexions from logs group by ip;";
    $con = connexion();
    $resultat = mysqli_query($con,$requete);
    deconnexion($con);

    return $resultat;

}

function deleteAll()
{
    $requete = "TRUNCATE TABLE logs ; ";
    $con = connexion();
    mysqli_query($con,$requete);
    deconnexion($con);
}


?>