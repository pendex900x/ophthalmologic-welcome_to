<?php
/**
* Sistema control de citas WELCOME
* @author localhost

**/

/*PARA EL RUT*/
require_once('./core/app/model/ChileRut.php');
if(isset($_POST)){
if ($_POST['no']==null OR $_POST['no']==''){

  Core::alert("El rut ingresado esta vacío. Ingrese nuevamente.");
  //Core::redir(".?view=ver_citas");
  exit();
}

if($_POST['no']){
    if(validaRut($_POST['no'])==true AND solo_pararut($_POST['no'])==true){
    }else{
         //echo "El rut ".$_POST['no']." es incorrecto";
         Core::alert("El rut ingresado es incorrecto! Ingrese nuevamente.");
        // Core::redir(".?view=newpacient");
         exit();
    }
}
$rut0 = str_replace(" ", "", $_POST['no'], $contador);
$rut1 = str_replace("-", "", $rut0, $contador);
$rut2 = str_replace(".", "", $rut1, $contador); //FORMATO PARA AGREGAR RUT AL SISTEMA ES SIN GUIÓN NI PUNTOS.
//FIN RUT

/*PARA EL Nombre*/
if ($_POST["name"]==null OR $_POST["name"]==''){
	Core::alert("El nombre ingresado es incorrecto! Ingrese nuevamente.");
	//Core::redir(".?view=ver_citas");
	exit();
}
if (!preg_match("/^[a-zA-Z ]*$/",$_POST["name"])) {
  $nameErr = "El nombre debe contener solo letras o espacios en blanco";
	exit();
}
//FIN Nombre

/*PARA EL correo*/
if ($_POST["email"]==null OR $_POST["email"]==''){
	Core::alert("El correo ingresado es incorrecto! Ingrese nuevamente.");
	//Core::redir(".?view=ver_citas");
	exit();
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Formato de email incorrecto";
}
//FIN correo
}

if(count($_POST)>0){
	$user = new MedicData();
	$category_id = "NULL";
	if($_POST["category_id"]!=""){ $category_id = $_POST["category_id"]; }
  $user->no = $_POST["no"];
	$user->name = $_POST["name"];
	$user->category_id = $category_id;
	$user->lastname = $_POST["lastname"];
	$user->address = $_POST["address"];
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];
	$user->add();

Core::alert("Ingresado satisfactoriamente.");
print "<script>window.location='index.php?view=medics';</script>";


}


?>
