<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 28/12/2017
 * Time: 14:33
 */

$title = 'Serveur Web';







ob_start();



?>
TEST SQL
ICI faire traitement des log récup dans le serveur SQL c'est à dire les inserer dans la base de donnée ici de facon invisible
<a class="nav-link js-scroll-trigger" href="index.php?page=sqllog">LOG SQL</a>
<a class="nav-link js-scroll-trigger" href="index.php?page=sqlstats">Statistique SQL</a><?php
$contenu = ob_get_clean();
render($contenu,  $title);

?>