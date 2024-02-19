<?php // connection a la base de donner
/**
 * @return PDO
 */



function TESTB()
{

	$ssh_host = '192.168.86.113'; // SSH server
	$ssh_port = 24; // SSH port
	$ssh_user = 'zero'; // SSH username
	$ssh_pass = '03021994'; // SSH password

	$db_host = 'localhost'; // Database host (localhost, as tunnel is created)
	$db_port = 3306; // Database port
	$db_name = 'ProjetLOG'; // Database name
	$db_user = 'vicente'; // Database username
	$db_pass = 'vicente'; // Database password

	$connection = ssh2_connect($ssh_host, $ssh_port);
	if (ssh2_auth_password($connection, $ssh_user, $ssh_pass)) {
		echo "SSH connection established...\n";
		// Forward remote MySQL port to local
		ssh2_tunnel($connection, '127.0.0.1', $db_port);
		echo "SSH tunnel created...\n";

		// Connect to MySQL through the tunnel using PDO
		try {
			$pdo = new PDO("mysql:host=$db_host;dbname=$db_name;port=$db_port", $db_user, $db_pass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Connected to database successfully!\n";
			return 5;
		} catch (PDOException $e) {
			die("Connection failed: " . $e->getMessage());
		}
	} else {
		die("SSH connection failed...");
	}
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
