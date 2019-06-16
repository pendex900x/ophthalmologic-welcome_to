<?php

if(count($_POST)>0){


	if(isset($_POST["is_admin"])){$is_admin='A';}
	$is_active=0;
	if(isset($_POST["is_active"])){$is_active=1;}
	if(isset($_POST["is_contador"])){$is_contador='c';}
	if(isset($_POST["is_inventario"])){$is_inventario='i';}
	if(isset($_POST["is_secretaria"])){$is_secretaria='s';}

$tipo_cuenta=$is_admin.$is_secretaria.$is_contador.$is_inventario;

	$user = new UserData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	$user->is_type=$tipo_cuenta;
	$user->password = sha1(md5($_POST["password"]));
	$user->add();

print "<script>window.location='index.php?view=users';</script>";


}


?>
