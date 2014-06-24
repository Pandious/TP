<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/assets/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/assets/bootstrap/dist/css/bootstrap-theme.min.css">
		<style type="text/css">
			.container{
				border-radius: 5px;
				border: 0px;
				width:320px;
				padding:0 50px 25px 50px;
				margin: 0 auto;
			}
			.form-group{
				width:auto;
				display: block;
			}
		</style>
	</head>
	<body>
<?php
$connexion = true;

//Ajout de la connection à la BDD
require_once "functions/dbconnect.php";

//Création de la requéte
$query = "SELECT * FROM `users` WHERE login = :login AND password = :password;";

//Mise en préparation de la requéte
$PDOStatement = $PDOObject->prepare($query);

//Liaison des paramêtre avec les marqueurs
$PDOStatement->bindParam(':login', $_POST['login'], PDO::PARAM_STR);
$PDOStatement->bindParam(':password', $_POST['password'], PDO::PARAM_STR);

//Lancement de la requéte
$PDOStatement->execute();

//Récupération du nombre de résultat
if ($PDOStatement->rowCount() != 1) {
	echo 'Connexion &eacute;chou&eacute;e !!!';
	$connexion = false;
	exit;
}

if ($connexion == true){
	session_start();
}


$_SESSION['login'] = $_POST['login'];
$loginS = $_SESSION['login'];

if ($loginS == 'ADMINISTRATEUR')
{
	echo 'Bonjour ' . $loginS . '<br />';
	echo "<a href='modificationU.php'>Modifier les utilisateurs</a><br />";
	echo "<a href='supressionU.php'>Suprimer les utilisateurs</a><br />";
	echo "<a href='modif_profil.php'>Modifier son profil</a><br />";
	echo "<a href='pages/affichageU.php'>Afficher les utilisateurs</a><br />";
}
else
{
	echo 'Bonjour ' . $loginS . '<br />';
	echo "<a href='modif_profil.php'>Modifier son profil</a><br />";
	echo "<a href='affichageU.php'>Afficher les utilisateurs</a><br />";
}
?>
</body>
</html>
