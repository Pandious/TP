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
//Ajout de la connection à la BDD
require_once "functions/dbconnect.php";

if(!empty($_POST['login'])){
	//Création de la requéte
	$query1 = "SELECT * FROM `users` WHERE login = :login;";
	$PDOStatement = $PDOObject->prepare($query1);
	
	$PDOStatement->bindParam(':login', $_POST['login'], PDO::PARAM_STR);

	
	$PDOStatement->execute();
}

if ($PDOStatement->rowCount() == 0) {
	$query2 = "INSERT INTO `Contact`.`users` (
	`first_name` ,
	`last_name` ,
	`login` ,
	`password`
	)
	VALUES (:first_name, :last_name, :login, :password);";
	
	//Mise en préparation de la requéte
	$PDOStatement1 = $PDOObject->prepare($query2);
	
	//Liaison des paramêtre avec les marqueurs
	$PDOStatement1->bindParam(':first_name', $_POST['first_name'], PDO::PARAM_STR);
	$PDOStatement1->bindParam(':last_name', $_POST['last_name'], PDO::PARAM_STR);
	$PDOStatement1->bindParam(':login', $_POST['login'], PDO::PARAM_STR);
	$PDOStatement1->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
	
	//Lancement de la requéte
	$PDOStatement1->execute();
	echo 'Votre compte � bien &eacute;t&eacute; cr&eacute;&eacute; !';
}
else 
{
	echo 'Compte d�ja existant !';
	exit;
}

?>
</body>
</html>