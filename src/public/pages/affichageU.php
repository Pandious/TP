<?php
require_once "../functions/dbconnect.php";
session_start();
if (isset($_SESSION['login']))
{
	echo 'Bonjour ' . $_SESSION['login'] . '<br />';
}
//Création de la requéte
$query = "SELECT id_users, first_name, last_name, login 
			FROM `users`;";
echo $query;

//Mise en préparation de la requéte
$PDOStatement = $PDOObject->prepare($query);

//Liaison des paramêtre avec les marqueurs
$PDOStatement->bindParam(':first_name', $_POST['first_name'], PDO::PARAM_STR);
$PDOStatement->bindParam(':last_name', $_POST['last_name'], PDO::PARAM_STR);
$PDOStatement->bindParam(':login', $_POST['login'], PDO::PARAM_STR);

//Lancement de la requéte
$PDOStatement->execute();

//Récupération du nombre de résultat
if ($PDOStatement->rowCount() < 1) {
	echo 'Connexion &eacute;chou&eacute;e !!!';
	exit;
}

echo 'Connexion r&eacute;ussie !!!';


?>