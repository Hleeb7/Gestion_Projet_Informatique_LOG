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


function authntification($login, $mdp)//controle la connexion
{
    $con = connexion();
    $result = mysqli_query($con,"SELECT * FROM user WHERE Userlogin = '".$login."' AND mdp = '.$mdp.");
    $req = mysqli_fetch_array($result);
    if($req == true)
    {
       // $_SESSION['role'] trouver code pour mettre le rôle;
        $_SESSION["connecter"] = true;
        $return = true;
    }
    else
    {
        $return = false;
    }
    deconnexion($con);

    return $return;
}
/*function connexion ()
{
    $con = mysqli_connect("192.168.86.115","vicente","vicente","base_PII_24"); //retirer mdp (3) si windows et retirer :8889 si autres que mac
    return $con;
}

function deconnexion($con)
{
    mysqli_close($con);
}*/
function connexion ()
{
    $con = mysqli_connect("192.168.86.115","vicente","vicente","base_PII_24"); //retirer mdp (3) si windows et retirer :8889 si autres que mac
    return $con;
}

function deconnexion($con)
{
    mysqli_close($con);
}
function Logacess()
{
    $fichier = fopen("/var/log/apache2/access.log", "r"); //r : read ; w : write
    if ($fichier == null) {
        echo "<br> / Attention, fichiers logs introuvables. <br>";
    } else {
        //supprimer tous les elements dans la tables logs
        deleteAll();
        $i = 1;
        while (!feof($fichier)) {
            //je lis une ligne
            $ligne = fgets($fichier, 4096);
            if (strlen($ligne) > 40) {
                //parser la ligne avec le caractere delimiteur espace
                $tab = explode(" ", $ligne);

                $ip = $tab[0];  //recupere l'adresse IP
                //echo "<br> Adresse IP : ".$ip;

                $dateComplete = substr($tab[3], 1);
                $tab2 = explode(":", $dateComplete);
                $time = $tab2[1] . ":" . $tab2[2] . ":" . $tab2[3]; //reformalise l'heure
                //echo "<br> Time Américaine : ".$time;

                $tab3 = explode("/", $dateComplete); //reformalise la date
                $dateA = substr($dateComplete, 7, 4) . "-" . substr($dateComplete, 3, 3) . "-" . substr($dateComplete, 0, 2);
                //echo "<br> Date Américaine : ".$dateA;

                $requeteStatut = $tab[8] . " " . $tab[9];   //recupere le statut finale de la connexion
                //echo "<br> Statut requete : ".$requeteStatut;

                $url = $tab[10];    //recuperer l'url
                //echo "<br> URL : ".$url;
                $systeme = $tab[12] . " " . $tab[13] . " " . $tab[14] . " " . $tab[15] . " " . $tab[16];//recupere l'info du systeme d'exploitation
                //echo "<br> Systeme : ".$systeme;
                $navigateur = end($tab);    //recupere le navigateur de la demande de connexion
                //echo "<br> Navigateur : ".$navigateur;

                $i++;

                //vérifie si la ligne qui vient d'être lu n'existe pas deja dans la base de donnée
                if (Verify_Exist_User_Log($ip, $dateA, $time, $requeteStatut, $url, $systeme, $navigateur) == false) {
                    //insertion dans la BDD
                    Insert_Line_User_Log($ip, $dateA, $time, $requeteStatut, $url, $systeme, $navigateur);
                }
            }

        }
        //fermeture du fichier
        fclose($fichier);
    }
}

/*function Logaerror()
{
    $fichier = fopen("/var/log/apache2/error.log", "r"); //r : read ; w : write
    if ($fichier == null) {
        echo "<br> / Attention, fichiers logs introuvables. <br>";
    } else {
        //supprimer tous les elements dans la tables logs
        deleteAll();
        $i = 1;
        while (!feof($fichier)) {
            //je lis une ligne
            $ligne = fgets($fichier, 4096);
            if (strlen($ligne) > 40) {
                //parser la ligne avec le caractere delimiteur espace
                $tab = explode(" ", $ligne);

                $ip = $tab[0];  //recupere l'adresse IP
                //echo "<br> Adresse IP : ".$ip;

                $dateComplete = substr($tab[3], 1);
                $tab2 = explode(":", $dateComplete);
                $time = $tab2[1] . ":" . $tab2[2] . ":" . $tab2[3]; //reformalise l'heure
                //echo "<br> Time Américaine : ".$time;

                $tab3 = explode("/", $dateComplete); //reformalise la date
                $dateA = substr($dateComplete, 7, 4) . "-" . substr($dateComplete, 3, 3) . "-" . substr($dateComplete, 0, 2);
                //echo "<br> Date Américaine : ".$dateA;

                $requeteStatut = $tab[8] . " " . $tab[9];   //recupere le statut finale de la connexion
                //echo "<br> Statut requete : ".$requeteStatut;

                $url = $tab[10];    //recuperer l'url
                //echo "<br> URL : ".$url;

                $systeme = $tab[12] . " " . $tab[13] . " " . $tab[14] . " " . $tab[15] . " " . $tab[16];    //recupere l'info du systeme d'exploitation
                //echo "<br> Systeme : ".$systeme;

                $navigateur = end($tab);    //recupere le navigateur de la demande de connexion
                //echo "<br> Navigateur : ".$navigateur;

                $i++;

                //vérifie si la ligne qui vient d'être lu n'existe pas deja dans la base de donnée
                if (Verify_Exist_User_Log($ip, $dateA, $time, $requeteStatut, $url, $systeme, $navigateur) == false) {
                    //insertion dans la BDD
                    Insert_Line_User_Log($ip, $dateA, $time, $requeteStatut, $url, $systeme, $navigateur);
                }
            }
        }
        //fermeture du fichier
        fclose($fichier);
    }
}*/

////////////////CODE BDDD
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

function Select_All_Connexion ()
{
    $requete = "select * from logs;";
    $con = connexion();
    $resultat = mysqli_query($con,$requete);
    deconnexion($con);

    return $resultat;
}

function Select_All_Error ()
{
    $requete = "select * from ErrorLog;";
    $con = connexion();
    $resultat = mysqli_query($con,$requete);
    deconnexion($con);

    return $resultat;
}

function Select_All_Ip ()
{
    $requete = "select ip, count(*) as nbConnexions from logs group by ip;";
    $con = connexion();
    $resultat = mysqli_query($con,$requete);
    deconnexion($con);

    return $resultat;
}

function Select_All_Url ()
{
    $requete = "select urllog, count(*) as nbUrl from logs group by urllog;";
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