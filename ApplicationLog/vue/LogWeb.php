<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 28/12/2017
 * Time: 14:33
 */

$title = 'Log Web';







ob_start();
?>

<a class="nav-link js-scroll-trigger" href="index.php?page=accessip">Accès par IP</a>
<a class="nav-link js-scroll-trigger" href="index.php?page=webstats">Statistique</a>

<?php

$resultatAllConnexion = Select_All_Connexion();

// Affichage du tableau des User Log (access log)
echo "
<table border='1'>
    <tr> <td> Adresse IP </td> <td> Date </td> <td> Time </td> <td> Statut Requete </td> <td> URL </td> <td> Systeme </td> <td> Navigateur </td></tr>
";

foreach ($resultatAllConnexion as $unlog) {
    echo "<tr>";
    echo "<td>" . $unlog['ip'] . "</td>";
    echo "<td>" . $unlog['dtlog'] . "</td>";
    echo "<td>" . $unlog['tmlog'] . "</td>";
    echo "<td>" . $unlog['requeteStatut'] . "</td>";
    echo "<td>" . $unlog['urllog'] . "</td>";
    echo "<td>" . $unlog['systeme'] . "</td>";
    echo "<td>" . $unlog['navigateur'] . "</td>";
    echo "</tr>";
}

echo "</table>";





?>
LISTE LOG Web<?php
$contenu = ob_get_clean();
render($contenu,  $title);

?>
