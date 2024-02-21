<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 28/12/2017
 * Time: 14:33
 */

$title = 'Accès par URL et IP';







ob_start();

?>
    <a class="nav-link js-scroll-trigger" href="index.php?page=weblog">Log d'accès complet</a>
    <a class="nav-link js-scroll-trigger" href="index.php?page=webstats">Statistique</a>

<?php
$resultatStatAllIP = Select_All_Ip();
$resultatStatAllurl = Select_All_Url();
///

///////
echo "

        <table border='1'>
        <tr> <td> IP </td> <td> Nb Connexions par IP </td> </tr> 
        ";

$tableIP=array();
$tableNB=array();

foreach($resultatStatAllIP as $unlog)
{
    echo "<tr>";
    echo "<td>".$unlog['ip']."</td>";
    echo "<td>".$unlog['nbConnexions']."</td>";
    echo "</tr>";

    $tableIP[] = '"'.$unlog['ip'].'"';
    $tableNB[] = $unlog['nbConnexions'];
}

echo "</table>";
$chaineIP = '['.implode(", ",$tableIP)."]";
$chaineNB = '['.implode(", ",$tableNB)."]";

echo "
        <table border='1'>
        <tr> <td> URL </td> <td> Nb url </td> </tr> 
        ";

$tableUrl=array();
$tableNburl=array();

foreach($resultatStatAllurl as $urllog)
{
    echo "<tr>";
    echo "<td>".$urllog['urllog']."</td>";
    echo "<td>".$urllog['nbUrl']."</td>";
    echo "</tr>";

    $tableUrl[] = '"'.$urllog['urllog'].'"';
    $tableNburl[] = $urllog['nbUrl'];
}

echo "</table>";

$contenu = ob_get_clean();
render($contenu,  $title);

?>