<?php

//Configuration
//$salt = 'OGJkNjM1ZjMyMWU4OWZiMTI1ZTRhOWYy';
$username = "Contact";
$password = "0000";

//DATA SOURCE NAME
$dsn = "mysql:host=127.0.0.1;dbname=Contact";

try {
	//Création de la connexion à la BDD
	$PDOObject = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
	die('Connexion &eacute;chou&eacute;e : ' . $e->getMessage());
}