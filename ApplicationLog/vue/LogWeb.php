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
LISTE LOG Web<?php
$contenu = ob_get_clean();
render($contenu,  $title);

?>
