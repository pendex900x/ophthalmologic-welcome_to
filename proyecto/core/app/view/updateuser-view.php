<?php

if(count($_POST)>0){

	$is_admin='';
	if(isset($_POST["is_admin"])){$is_admin='A';}
	$is_active=0;
	if(isset($_POST["is_active"])){$is_active=1;}
	$is_contador='';
	if(isset($_POST["is_contador"])){$is_contador='c';}
	$is_inventario='';
	if(isset($_POST["is_inventario"])){$is_inventario='i';}
	$is_secretaria='';
	if(isset($_POST["is_secretaria"])){$is_secretaria='s';}
	$tipo_cuenta=$is_admin.$is_contador.$is_inventario.$is_secretaria;

	$user = UserData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	$user->is_type=$tipo_cuenta;
	$user->is_active=$is_active;
	$user->update();

	if($_POST["password"]!=""){
		$user->password = sha1(md5($_POST["password"]));
		$user->update_passwd();
print "<script>alert('Se ha actualizado el password');</script>";

	}

print "<script>window.location='index.php?view=users';</script>";


}


?>
