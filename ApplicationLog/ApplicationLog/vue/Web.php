<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 28/12/2017
 * Time: 14:33
 */

$title = 'Serveur Web';







ob_start();

Logacess();


?>
<a class="nav-link js-scroll-trigger" href="index.php?page=weblog">Log d'accès complet</a>
<a class="nav-link js-scroll-trigger" href="index.php?page=accessip">Accès par IP</a>
<a class="nav-link js-scroll-trigger" href="index.php?page=webstats">Statistique</a>
<?php
$contenu = ob_get_clean();
render($contenu,  $title);

?>
