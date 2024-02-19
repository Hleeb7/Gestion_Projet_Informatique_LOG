<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 28/12/2017
 * Time: 14:33
 */

$title = 'Accueil';







ob_start();




?>
 TEST
<?php
$contenu = ob_get_clean();
render($contenu,  $title);

?>


