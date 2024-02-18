<?php
/**
 * Created by PhpStorm.
 * User: FRCRUVGO
 * Date: 01/04/2019
 * Time: 10:51
*/

$title="";
ob_start();

$contenu = ob_get_clean();
?>
<section id="conference">
    <div class="container">
    <div class="row">




    </div>
    </div>
</section>
<?php
/*$test=inscriptionconference(50);
echo $test["nbpatient"];*/
render($contenu,  $title);

?>