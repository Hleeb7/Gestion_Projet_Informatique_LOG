<?php // connection a la base de donner
/**
 * @return PDO
 */
function connexion()
{
    try {
        $cnx = new PDO('mysql:host=localhost;dbname=etpvisio2', 'root', '');


    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    return $cnx;
}


?>
