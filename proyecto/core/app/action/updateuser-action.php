<?php


//Verifica si esta logeado
if(!isset($_SESSION["user_id"])){
header('Location: index.php');
}

//ROLES
$user1 = UserData::getById($_SESSION['user_id']);
if ((strpos($user1->is_type, 'A')!== false) OR (strpos($user1->is_type, 's')!== false)){
}else{
echo "No tiene acceso ya que su cuenta no posee privilegios de administrador.";
exit();
}


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

	//Verifica que exista al menos 1 admin.
	$users1 = UserData::getAll();
	foreach($users1 as $userf){

if (strpos($userf->is_type, 'A')!== false){
		$contador=1+$contador;
	}}

		 if ((strpos($user->is_type, 'A')!== false)){
			 if (($contador==1) && ($is_admin=='')){
			print "<script>alert('Debe haber al menos 1 admin.');</script>";
		//echo "Debe haber al menos 1 admin.";
		exit();
	}}


	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	$user->is_active=$is_active;
	$user->is_type=$tipo_cuenta;
	$user->update(); }


	if($_POST["password"]!=""){
		$user->password = sha1(md5($_POST["password"]));
		$user->update_passwd();
print "<script>alert('Se ha actualizado el password');</script>";

	}

print "<script>window.location='index.php?view=users';</script>";



?>
