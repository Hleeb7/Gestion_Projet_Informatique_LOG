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
<div style="text-align: center;">
<br/>
<br/>
<br/>
<br/>
<br/>
    TEST WEB
    <br/>
    ICI faire traitement des log récup dans le serveur <br/>
    C'est à dire les insérer dans la base de données ici de façon invisible <br/>
    <a class="nav-link js-scroll-trigger" href="index.php?page=weblog">LOG</a>
    <a class="nav-link js-scroll-trigger" href="index.php?page=webstats">Statistique</a>
</div>
<?php
$contenu = ob_get_clean();
render($contenu, $title);
?>