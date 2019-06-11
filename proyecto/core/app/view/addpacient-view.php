<?php
/**
* Sistema control de citas WELCOME
* @author localhost

**/

/*PARA EL RUT*/
/*
require_once('./core/app/model/ChileRut.php');

$rut = $_POST['no']; //FALTA PROTEGER LA VARIABLE
if ($rut==null OR $rut==''){
  Core::alert("El rut ingresado es incorrecto! Ingrese nuevamente.");
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
$rut0 = str_replace(" ", "", $rut, $contador);
$rut1 = str_replace("-", "", $rut0, $contador);
$rut2 = str_replace(".", "", $rut1, $contador); //FORMATO PARA AGREGAR RUT AL SISTEMA ES SIN GUIÓN NI PUNTOS.
//FIN RUT
*/
/*PARA EL Nombre*/
/* if ($_POST["name"]==null OR $_POST["name"]==''){
	Core::alert("El nombre ingresado es incorrecto! Ingrese nuevamente.");
	//Core::redir(".?view=ver_citas");
	exit();
}
if (!preg_match("/^[a-zA-Z ]*$/",$_POST["name"])) {
  $nameErr = "El nombre debe contener solo letras o espacios en blanco";
	exit();
}
//FIN Nombre
*/
/*PARA EL correo*/
/*if ($_POST["address"]==null OR $_POST["address"]==''){
	Core::alert("El correo ingresado es incorrecto! Ingrese nuevamente.");
	//Core::redir(".?view=ver_citas");
	exit();
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Formato de email incorrecto";
}
//FIN correo

if(count($_POST)>0){
	$user = new PacientData();

	$user->no = $_POST["no"];

	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];

	$user->gender = $_POST["gender"];
	$user->day_of_birth = $_POST["day_of_birth"];

	$user->sick = $_POST["sick"];
	$user->medicaments = $_POST["medicaments"];
	$user->alergy = $_POST["alergy"];


	$user->address = $_POST["address"];
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];
	$user->add();

//print "<script>window.location='index.php?view=pacients';</script>";


}
*/

?>
