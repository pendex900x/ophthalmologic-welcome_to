<?php


//Verifica si esta logeado
	if(!isset($_SESSION["user_id"])){
	header('Location: index.php');
	}


//ROLES
	$user = UserData::getById($_SESSION['user_id']);

	if ((strpos($user->is_type, 'A')!== false) OR (strpos($user->is_type, 's')!== false)){
	}else{
	echo "No tiene acceso ya que su cuenta no posee privilegios de administrador.";
	exit();
	}


$client = PacientData::getById($_GET["id"]);
$client->del();
Core::redir("./index.php?view=pacients");

?>
