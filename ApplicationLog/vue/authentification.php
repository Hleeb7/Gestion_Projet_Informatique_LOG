<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 05/01/2018
 * Time: 11:23
 */




//Page qui sert a la connexion de l'utilisateur.
$contenu = "";
$title = "Connexion";


ob_start();

        echo "test";
       //echo TESTB();
        /*
         *
         *
         *
         * ?>

    <title>Connexion</title>

    <body>
    <h1>Connexion</h1>
    <form method="post" action="index.php?page=cnx">
        <table>
            <tr>
                <td>Login:</td>
                <td><input title='Saisir votre login'type="text" name="login"/></td>
            </tr>
            <tr>
                <td>Mot de passe:</td>
                <td><input title="Saisir votre mot de passe" type="password" name="mdp"/></td>
            </tr>
            <tr>
                <td><input title="Valider pour ce connecter" type="submit" value="Valider"/></td>
            </tr>
        </table>
        <?php
         *//*if (isset($_POST["login"]) && isset($_POST["mdp"])) {
            $login = $_POST["login"];
            $mdp = $_POST["mdp"];
            if ($login != null && $mdp != null) {

              /*  $authen = get_authentif($login, $mdp);
                if ($authen == false) {
                    erreurlogmdp();
                } else {
                    $_SESSION['adherent'] = $authen;
                    $_SESSION["connecter"] = true;
                    $_SESSION["login"] = $login;
                    header("Refresh: 0.1; URL=http://localhost/APLOG/index.php");//refresh obligatoire pour laisser le temps a wamp de charger
                }
                echo TESTB();
            } else {
                echo "erreur	 champ";
            }
        }*/
        ?>
    </form>

    </body>
    </html>

<?php

$contenu = ob_get_clean();


render($contenu, $title);

?>