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
TEST WEB
ICI faire traitement des log récup dans le serveur c'est à dire les inserer dans la base de donnée ici de facon invisible
<a class="nav-link js-scroll-trigger" href="index.php?page=weblog">LOG</a>
<a class="nav-link js-scroll-trigger" href="index.php?page=webstats">Statistique</a><?php
$contenu = ob_get_clean();
render($contenu,  $title);

?>
