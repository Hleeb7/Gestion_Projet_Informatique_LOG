<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 25/03/2018
 * Time: 12:23
 */



$contenu = "";
$title = "Mes formations";


ob_start();

if (empty($_POST["accept"])) {
    $formation = $_POST['nomformation'];
    $date = $_POST['datelimite'];
    $tabsession = get_numsession($formation, $date);
    $numsession = $tabsession[0]["numsession"];
    $numadherent = $_SESSION["adherent"];
    ?>
    <p>Valider votre désinscription a <?= $formation ?> ce déroulant le <?= $date ?> ? </p>
    <form method="POST" action="">
        <input name="idsession" value="<?= $numsession; ?>" hidden>
        <input name="numadherent" value="<?= $numadherent; ?>" hidden>
        <button title="Appuyer pour vous désinscrire" type="submit" name="accept" value="true">Oui</button>
        <button title="Appuyer pour ne pas vous désincrire" type="submit" name="accept" value="false">Non</button>
    </form>


    <?php
} elseif (isset($_POST['accept']) && $_POST['accept'] == "true") {
    $numsession = $_POST['idsession'];
    $numadherent = $_POST["numadherent"];
    echo"Désinscription en cours veuillez patienter";
    get_deleteinscriptionformation($numsession, $numadherent);
    header("Refresh: 1; URL=http://localhost/ppe/index.php?page=mesformations");

} elseif (isset($_POST['accept']) && $_POST['accept'] == "false") {
    header("Refresh: 0.1; URL=http://localhost/ppe/index.php?page=mesformations");//refresh obligatoire car  serveur bug

}
$contenu = ob_get_clean();
render($contenu, $title);
