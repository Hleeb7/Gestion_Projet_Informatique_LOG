<?php // connection a la base de donner
/**
 * @return PDO
 */

function TESTA()
{
	// Informations de connexion SSH
	$ssh_host = '10.33.32.187'; // Adresse du serveur SSH
	$ssh_port = 22; // Port SSH
	$ssh_username = 'zero'; // Nom d'utilisateur SSH
	$ssh_password = '03021994'; // Mot de passe SSH
	// Connexion SSH
	$ssh_connection = ssh2_connect($ssh_host, $ssh_port);
	echo "ok";
	if (!$ssh_connection) {
		die('La connexion SSH a échoué.');
	}
	if (!ssh2_auth_password($ssh_connection, $ssh_username, $ssh_password)) {
		die('L\'authentification SSH a échoué.');
	}
	// Informations de connexion à la base de données MySQL
	$db_host = '10.33.32.187'; // Adresse du serveur MySQL
	$db_username = 'vicente'; // Nom d'utilisateur MySQL
	$db_password = 'vicente'; // Mot de passe MySQL
	$db_name = 'ProjetLOG'; // Nom de la base de données MySQL

	// Connexion à la base de données MySQL via SSH
	$mysql_connection = ssh2_tunnel($ssh_connection, $db_host, 3306);
	if (!$mysql_connection) {
		die('La connexion MySQL à travers SSH a échoué.');
	}

	// Connexion PDO à la base de données MySQL
	try {

		$dsn = "mysql:host=10.33.32.187;dbname=$db_name";
		$pdo = new PDO($dsn, $db_username, $db_password);

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Exemple d'exécution d'une requête MySQL
		$query = "Select login from user;";
		$query2 =" INSERT INTO ProjetLOG.user (login, mdp, role) VALUES ('30', '30', '30')";
		$stmt = $pdo->query($query);

		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt3 = $pdo->query($query2);
		// Affichage des données
		foreach ($rows as $row) {
			echo $row["login"].'<br>';
		}
	} catch (PDOException $e) {
		die('Erreur de connexion à la base de données MySQL : ' . $e->getMessage());
	}
}


/*function TESTB()
{
	// Connexion SSH
	$ssh_host = '192.168.0.25'; // Adresse du serveur SSH
	$ssh_port = 22; // Port SSH
	$ssh_username = 'zero'; // Nom d'utilisateur SSH
	$ssh_password = '03021994'; // Mot de passe SSH

	$ssh_connection = ssh2_connect($ssh_host, $ssh_port);
	if (!$ssh_connection) {
		die('La connexion SSH a échoué.');
	}

	echo "Connexion SSH établie.<br>";

	if (!ssh2_auth_password($ssh_connection, $ssh_username, $ssh_password)) {
		die('L\'authentification SSH a échoué.');
	}

	// Connexion à la base de données MySQL à travers la connexion SSH
	$db_host = '127.0.0.1'; // Adresse IP locale
	$db_username = 'vicente'; // Nom d'utilisateur MySQL
	$db_password = 'vicente'; // Mot de passe MySQL
	$db_name = 'ProjetLOG'; // Nom de la base de données MySQL

	$mysql_connection = ssh2_tunnel($ssh_connection, $db_host, 3306);
	if (!$mysql_connection) {
		die('La connexion MySQL à travers SSH a échoué.');
	}

	echo "Connexion MySQL à travers SSH établie.<br>";

	$mysqli = new mysqli(null, $db_username, $db_password, $db_name, null, null, $mysql_connection);
	if ($mysqli->connect_errno) {
		die('Erreur de connexion à la base de données MySQL : ' . $mysqli->connect_error);
	}

	// Exemple d'exécution d'une requête MySQL
	$query = "SELECT * FROM user";
	$result = $mysqli->query($query);
	echo $result;
	echo "testQuery";
	if ($result) {
		while ($row = $result->fetch_assoc()) {
			// Traitement des données

		}
		$result->close();
	} else {
		echo 'Erreur dans la requête : ' . $mysqli->error;
	}

	// Fermeture de la connexion
	$mysqli->close();
}

/*
function connexion(){
	try
	{
		$cnx = new PDO('mysql:host=127.0.0.1;dbname=ProjetLOG', 'root', '');
		
		
		
		
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());}
	
	return $cnx;
 }*/
 
 
?>
