<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 05/01/2018
 * Time: 11:23
 */

//Page qui sert à la connexion de l'utilisateur.
$contenu = "";
$title = "Connexion";

// Début de la mise en mémoire tampon de sortie
ob_start();
?>

<title>Connexion</title>
<style>
    .login-container {
        position: absolute;
        top: 200px; /* Ajustez cette valeur selon votre besoin */
        left: 200px;
        width: 300px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 20px;
        background-color: white;
        color: black;
    }

        td {
            color: black; /* Changement de couleur en noir */
            text-align: center; /* Centrer le contenu dans la cellule de tableau */
        }
</style>

<body>
    <div class="login-container">
        <h1>Connexion</h1>
        <form method="post" action="index.php?page=cnx">
            <table>
                <tr>
                    <td>Login:</td>
                    <td><input title='Saisir votre login' type="text" name="login"/></td>
                </tr>
                <tr>
                    <td>Mot de passe:</td>
                    <td><input title="Saisir votre mot de passe" type="password" name="mdp"/></td>
                </tr>
                <tr>
                    <td><input title="Valider pour ce connecter" type="submit" value="Valider"/></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

<?php
// Récupération du contenu mis en mémoire tampon et assignation à $contenu
$contenu = ob_get_clean();

// Rendu du contenu
render($contenu, $title);

// Décommentez et corrigez la logique de gestion de la soumission de formulaire
/*
if (isset($_POST["login"]) && isset($_POST["mdp"])) {
    $login = $_POST["login"];
    $mdp = $_POST["mdp"];
    if ($login != null && $mdp != null) {
        $authen = get_authentif($login, $mdp);
        if ($authen == false) {
            erreurlogmdp();
        } else {
            $_SESSION['adherent'] = $authen;
            $_SESSION["connecter"] = true;
            $_SESSION["login"] = $login;
            header("Refresh: 0.1; URL=http://localhost/APLOG/index.php");//refresh obligatoire pour laisser le temps a wamp de charger
        }
    } else {
        echo "erreur champ";
    }
}
*/
?>