<?php

	$errorMessages = array();
	if (empty($_POST)) {
		$errorMessages['form']  = "Pas de formulaire";
	}
	
	if(!isset($_POST['first_name']) || empty($_POST['first_name'])) {
		$errorMessages['first_name'] = 'Nom vide';
	}

	if(!isset($_POST['last_name']) || empty($_POST['last_name'])) {
		$errorMessages['last_name'] = 'Prenom vide';
	}

	

	if (!empty($errorMessages)){
		if ($_SERVER['HTTP_X_REQUESTED_WITH'] !== null){
			echo json_encode($errorMessages);
		}else{
			foreach ($errorMessages as $key => $value) {
				echo $value . "<br>";
			}
		}
	}

?>