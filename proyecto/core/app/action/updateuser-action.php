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

	if (strlen($_POST["name"])>30){
	//valida nombre
	Core::alert("El apellido excede 30 carácteres.");
					exit();
			}
		if (!preg_match("/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]*$/",$_POST["name"])) {
			Core::alert("Solo letras o espacios en blanco en el apellido.");
			exit();
		}elseif ($_POST["name"]==NULL) {
			Core::alert("El apellido no puede estar vacío.");
			exit();
		}


	$user->lastname = $_POST["lastname"];
	if (strlen($_POST["lastname"])>30){

		//valida apellido
		Core::alert("El apellido excede 30 carácteres.");
					exit();
			}

		if (!preg_match("/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]*$/",$_POST["lastname"])) {
			Core::alert("Solo letras o espacios en blanco en el apellido.");
			exit();
		}elseif ($_POST["lastname"]==NULL) {
			Core::alert("El apellido no puede estar vacío.");
			exit();
		}

	$user->username = $_POST["username"];
	//VALIDANDO EL username
	if (!preg_match('/^[a-z0-9]{6,10}$/', $_POST["username"])){
		Core::alert("Solo letras minusculas y números. El largo debe ser de 6 a 10 carácteres.");
		exit();
}

	$user->email = $_POST["email"];
	//VALIDANDO EL EMAIL
	  $email = $_POST["email"];
	    if ($_POST['email']){
	  if (!preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)@[a-z0-9-]+(.[a-z0-9-]+)(.[a-z]{2,})$/i",$email)) {
	    Core::alert("El mail tiene un formato invalido.");
	    exit();
	  }
	  }

	  if (strlen($email)>50){
	  Core::alert("El email excede 50 carácteres.");
	  exit();
	  }

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
