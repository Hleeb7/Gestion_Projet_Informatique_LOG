<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 28/12/2017
 * Time: 14:33
 */

$title = 'Serveur Web';







ob_start();
$fichier=fopen("/var/log/apache2/access.log", "r"); //r : read, w : write, a : append
if ($fichier == null)
{
    echo "<br> / Attention, fichiers logs introuvables. <br>";
}
else
{
    //supprimer tous les elements dans la tables logs
    deleteAll();

    $i = 1;
    while (! feof($fichier))
    {
        //je lis une ligne
        $ligne = fgets($fichier,4096);

        if(strlen($ligne)>40)
        {
            //parser la ligne avec le caractere delimiteur espace
            $tab = explode(" ",$ligne);

            $ip = $tab[0];  //recupere l'adresse IP
            //echo "<br> Adresse IP : ".$ip;

            $dateComplete = substr($tab[3],1);
            $tab2 = explode(":",$dateComplete);
            $time=$tab2[1].":".$tab2[2].":".$tab2[3]; //reformalise l'heure
            //echo "<br> Time Américaine : ".$time;

            $tab3 = explode("/",$dateComplete); //reformalise la date
            $dateA = substr($dateComplete, 7, 4) . "-" . substr($dateComplete, 3, 3) . "-" . substr($dateComplete, 0, 2);
            //echo "<br> Date Américaine : ".$dateA;

            $requeteStatut = $tab[8]." ".$tab[9];   //recupere le statut finale de la connexion
            //echo "<br> Statut requete : ".$requeteStatut;

            $url = $tab[10];    //recuperer l'url
            //echo "<br> URL : ".$url;

            $systeme = $tab[12]." ".$tab[13]." ".$tab[14]." ".$tab[15]." ".$tab[16];    //recupere l'info du systeme d'exploitation
            //echo "<br> Systeme : ".$systeme;

            $navigateur = end($tab);    //recupere le navigateur de la demande de connexion
            //echo "<br> Navigateur : ".$navigateur;

            $i++;

            //vérifie si la ligne qui vient d'être lu n'existe pas deja dans la base de donnée
            if (Verify_Exist_User_Log ($ip, $dateA, $time, $requeteStatut, $url, $systeme, $navigateur) == false)
            {
                //insertion dans la BDD
                Insert_Line_User_Log($ip, $dateA, $time, $requeteStatut, $url, $systeme, $navigateur);
            }
        }

    }
    //fermeture du fichier
    fclose($fichier);
}


?>
TEST WEB
ICI faire traitement des log récup dans le serveur c'est à dire les inserer dans la base de donnée ici de facon invisible
<a class="nav-link js-scroll-trigger" href="index.php?page=weblog">LOG</a>
<a class="nav-link js-scroll-trigger" href="index.php?page=webstats">Statistique</a><?php
$contenu = ob_get_clean();
render($contenu,  $title);

?>
