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
if ($fichier==null){
echo"<br> Attention, fichier logs introuvable <br>";}

$fichier2=file_exists("/var/log/apache2/access.log"); //r : read, w : write, a : append

if($fichier2==true){ echo "<br>OK fichier<br>";}
?>

<a class="nav-link js-scroll-trigger" href="index.php?page=sqllog">LOG SQL</a>
<a class="nav-link js-scroll-trigger" href="index.php?page=sqlstats">Statistique SQL</a><?php
$contenu = ob_get_clean();
render($contenu,  $title);

?>
