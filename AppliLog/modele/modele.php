<?php
//Fichier ou ce situe tout les demandes a la base de donnée
include_once dirname(__FILE__) . '/connexion.php';//inclusion fonction de connexion bdd
$GLOBALS['dist_api'] = "http://etpvisioapi.local/";


function aut($login,$mdp)
{
    $cnx=connexion();
    $b=$cnx->prepare('Select * from identifiant where login = :login and mdp = :mdp');
    $b->bindParam(':login',$login);
    $b->bindParam(':mdp',$mdp);
    $b->execute();
    $res=$b->fetch();
    $id=$res["id"];

    if($res==true)
    {
       $a=$cnx->prepare('Select * from medic where id = :id');
        $a->bindParam(':id',$id);
        $a->execute();
        $medic=$a->fetch();


        $b=$cnx->prepare('Select * from patient where id = :id ');
        $b->bindParam(':id',$id);
        $b->execute();
        $patient=$b->fetch();
         if($medic==true)
         {
          $_SESSION["id"]=$medic[0]["id"];
          $_SESSION["statut"]="medecin";
          return $medic;
        }
         else if($patient==true)
         {
          $_SESSION["id"]=$patient[0]["id"];
          $_SESSION["statut"]="patient";
           return $patient;
         }
         else
         {
            //Crée une  page erreur veuillez contacter administration via le formulaire de contact

         }
    }


  //  $res=$b->fetch();
    //return $res;
}
function createconf($date,$time,$proto,$indivi)
{
    $cnx=connexion();
    $a=$cnx->prepare('INSERT INTO seance (date, heure, idprotocole, idmedic,individuelle) 
    VALUES ( :date,:time,:proto,:idmedic,:indiv);');
    $a->bindParam(':idmedic',$_SESSION["id"]);
    $a->bindParam(':time',$time);
    $a->bindParam(':date',$date);
    $a->bindParam(':proto',$proto);
    $a->bindParam(':indiv',$indivi);
    $a->execute();
}

function consulterprotocole()
{
    $cnx=connexion();
    $b=$cnx->prepare('Select * from protocole;');
    $cnx->exec('SET NAMES utf8');
    $b->execute();
    $res=$b->fetchAll();
    return $res;

}


function consultermesconference(){
    $cnx=connexion();
    $b=$cnx->prepare('Select * from protocole,seance
where protocole.idprotocole=seance.idprotocole
and seance.idmedic=:idmedic');
    $b->bindParam(':idmedic',$_SESSION["id"]);
    $cnx->exec('SET NAMES utf8');
    $b->execute();
    $res=$b->fetchAll();
    return $res;
}

function supprimermaconference($idconference)
{
    $cnx=connexion();
    $a=$cnx->prepare('Delete from seancecreer where idseance=:idconfsupp');
    $a->bindParam('idconfsupp',$idconference);
    $a->execute();

    $b=$cnx->prepare('Delete from seance where idseance= :idconf');
    $b->bindParam('idconf',$idconference);
    return $b->execute();
}

function consultationdesconférence()
{
    $cnx=connexion();
    $b=$cnx->prepare('Select * from seance  ');
    $cnx->exec('SET NAMES utf8');
    $b->execute();
    $res=$b->fetchAll();
    return $res;
}

function inscriptionconference($idconf)
{   $cnx=connexion();
    $b=$cnx->prepare("Select count( distinct idpatient) as nbpatient,individuelle from seance,seancecreer where seancecreer.idseance=:idconf");
    $b->bindParam(':idconf',$idconf);
    $b->execute();
    $res=$b->fetch();
    $nbpatient=$res["nbpatient"];
        $indiv=$res["individuelle"];
     //  if($nbpatient<=1 && $indiv=="Oui")

            $a=$cnx->prepare('INSERT INTO seancecreer (idpatient, idseance) VALUES ( :idpatient,:idconf);');
            $a->bindParam(':idpatient',$_SESSION["id"]);
            $a->bindParam(':idconf',$idconf);
            $a->execute();


}















?>
