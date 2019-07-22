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

  if (strlen($_POST["name"])>30){

  Core::alert("El apellido excede 30 carácteres.");
          exit();
      }

  //valida nombre
    if (!preg_match("/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]*$/",$_POST["name"])) {
      Core::alert("Solo letras o espacios en blanco en el apellido.");
      exit();
    }elseif ($_POST["name"]==NULL) {
      Core::alert("El apellido no puede estar vacío.");
      exit();
    }


	$user->lastname = $_POST["lastname"];

  if (strlen($_POST["lastname"])>30){

  Core::alert("El apellido excede 30 carácteres.");
          exit();
      }

  //valida apellido
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


	$user->is_type=$tipo_cuenta;
	$user->password = sha1(md5($_POST["password"]));
	$user->add();

print "<script>window.location='index.php?view=users';</script>";


}


?>
