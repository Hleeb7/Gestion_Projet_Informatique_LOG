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

    TEST SQL
    <br/>
    ICI faire traitement des logs récupérés dans le serveur SQL, c'est à dire les insérer dans la base de données ici de façon invisible.
    <br/>
    <a class="nav-link js-scroll-trigger" href="index.php?page=sqllog">LOG SQL</a>
    <a class="nav-link js-scroll-trigger" href="index.php?page=sqlstats">Statistique SQL</a>
</div>
<?php
$contenu = ob_get_clean();
render($contenu, $title);
?>