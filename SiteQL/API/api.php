<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');
require "../modele/modele.php";


if (isset($_GET["delSeance"])){
    $a = array();
    $a['seance']=trim($_GET['id']);
    $a['success'] = supprimermaconference($_GET['id']);
    echo json_encode($a);

}

else if(!isset($_GET)){
    var_dump($_POST);
    var_dump($_SERVER['DOCUMENT_ROOT']);
    var_dump($GLOBALS);
}
