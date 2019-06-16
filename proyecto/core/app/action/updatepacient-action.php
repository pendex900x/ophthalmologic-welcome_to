<?php

//Verifica si esta logeado
if(!isset($_SESSION["user_id"])){
header('Location: index.php');
}


//ROLES
$user1 = UserData::getById($_SESSION['user_id']);

if ((strpos($user1->is_type, 'A')!== false) OR (strpos($user1->is_type, 's')!== false)){
}else{
echo "No tiene acceso ya que su cuenta no posee privilegios de administrador y tampoco tiene el rango de secretaria.";
exit();
}

if(count($_POST)>0){

  /*PARA EL RUT*/
  require_once('./core/app/model/ChileRut.php');

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

	$user = PacientData::getById($_POST["user_id"]);

	$user->no = $rut2;

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
	$user->update();

Core::alert("Actualizado exitosamente!");
print "<script>window.location='index.php?view=pacients';</script>";


}


?>
