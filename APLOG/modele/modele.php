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


/**
 * @param $numAdd
 * @param $id_session
 * @return bool
 */
function get_inscription($numAdd, $id_session)//inscription de l'utilisateur a une session de formation dans la table inscription
{
    $cnx = connexion();

    $sql = "INSERT INTO `inscription`(`numsession`, `numadherent`) VALUES ($id_session,$numAdd);";
    $res = $cnx->query($sql);

    if ($res) return true;
    else return false;

}

/**
 * @param $login
 * @param $mdp
 * @param $nom
 * @param $prenom
 * @param $mail
 */
function get_inscriptionadh($login, $mdp, $nom, $prenom, $mail)//CREATION d'un compte utilisateur +controle si un compte similaire  existe
{
    $login = md5($login);
    $mdp = md5($mdp);
    $cnx = connexion();
    $sql = "select login from adherent where login='$login'";
    $res = $cnx->query($sql);
    $row = $res->fetchall(PDO::FETCH_ASSOC);//Bug car res ne suffit pas donc row = tab vide = false donc login existepas
    if ($row == true) {
        echo 'Login deja utilisé';
    } else {
        $sql = "INSERT INTO adherent (login,mdp,nom,prenom,mail) VALUES ('$login','$mdp','$nom','$prenom','$mail');";
        $res = $cnx->query($sql);
        echo "compte crée redirection vers l'index.";
        header("Refresh: 0.1; URL=http://localhost/ppe/index.php");

    }

}


///////////VALIDER
/**
 * @param $numadherent
 * @return array
 */
function get_mesformation($numadherent)/// permet de recupérer les formations et date ou on s'inscrit
{
    $cnx = connexion();
    $sql = "Select nomformation,datelimite 
from inscription,formation,session 
where
inscription.numsession=session.numsession 
AND formation.numformation=session.numformation 
And inscription.numadherent='$numadherent';";
    $cnx->exec('SET NAMES utf8');
    $res = $cnx->query($sql);
    $row = $res->fetchall(PDO::FETCH_ASSOC);
    return $row;

}

/////////////////////////authentification
/**
 * @param $login
 * @param $mdp
 * @return bool
 */
function get_authentif($login, $mdp)//controle la connexion
{
    $logincrypt = md5($login);
    $mdpcrypt = md5($mdp);
    $cnx = connexion();
    $sql = "select login,mdp,numadherent  from adherent where login='$logincrypt' and mdp='$mdpcrypt'";
    $res = $cnx->query($sql);
    $row = $res->fetchAll(PDO::FETCH_ASSOC);
    if ($row == true) {
        return $row[0]['numadherent'];
    } else {
        return false;
    }
}

/////////////////////////////////////
/**
 * @return array
 */
function get_toutlisteformation()//recupere info de toute les formation
{
    $cnx = connexion();
    $sql = "Select * from lieu,formation,
session where session.numformation=formation.numformation 
And lieu.idlieu=session.idlieu Group By formation.numformation; ";
    $cnx->exec('SET NAMES utf8');
    $res = $cnx->query($sql);
    $row = $res->fetchall(PDO::FETCH_ASSOC);
    return $row;

}

///
/**
 * @param $numformation
 * @return array
 */
function get_detailformation($numformation)//récup détail de la formation selectioner sur la page formation.php
{
    $cnx = connexion();
    $sql = "Select * from lieu,formation,
session where session.numformation=formation.numformation 
And lieu.idlieu=session.idlieu  and formation.numformation='$numformation'; ";
    $cnx->exec('SET NAMES utf8');
    $res = $cnx->query($sql);
    $row = $res->fetchall(PDO::FETCH_ASSOC);
    return $row;

}

/**
 * @param $numformation
 * @return array
 */
function get_sessionvalide($numformation) //Permet de controler les dates de session
{
    $date = date("Y-m-d");
    $cnx = connexion();
    $sql = "Select datelimite,numsession from lieu,formation,
session where session.numformation=formation.numformation 
And lieu.idlieu=session.idlieu  
and formation.numformation='$numformation'
 and session.datelimite>='$date'
  order by datelimite ASC
      ;";
    $res = $cnx->query($sql);
    $row = $res->fetchall(PDO::FETCH_ASSOC);
    return $row;
}

/**
 * @param $nomformation
 * @param $datelimite
 * @return array
 */
function get_numsession($nomformation, $datelimite)//récup le num de session en fct du nom de la formation et de sa date
{
    $cnx = connexion();
    $sql = "Select numsession from session,formation
Where session.datelimite='$datelimite'
And formation.nomformation='$nomformation'
;";
    $res = $cnx->query($sql);
    $row = $res->fetchall(PDO::FETCH_ASSOC);
    return $row;

}


/**
 * @param $numsession
 * @param $numadherent
 * @return bool
 */
function get_deleteinscriptionformation($numsession, $numadherent)//  suppression  d'une inscription  a une formations
{

    $cnx = connexion();
    $sql = "Delete 
  from inscription
where
numsession='$numsession'
and
numadherent='$numadherent';
";
    $res = $cnx->query($sql);
    $row = $res->execute();
    return $row;

}

?>