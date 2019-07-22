<?php

/*PARA EL RUT*/
require_once('./core/app/model/ChileRut.php');

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

if(count($_POST)>0){
	$user = MedicData::getById($_POST["user_id"]);

	$category_id = "NULL";
	if($_POST["category_id"]!=""){ $category_id = $_POST["category_id"]; }
	$user->no = $_POST["no"];
	$user->name = $_POST["name"];

  $names = $_POST["name"];
//valida largo de Nombre

if (strlen($names)>30){

        Core::alert("NOMBRE EXCEDE LARGO, MAX 30 CARACTERES.");
        exit();
    }

	// valida nombre
	  if (!preg_match("/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]*$/",$names)) {
	    Core::alert("Solo letras o espacios en blanco en el nombre.");
	    exit();
	  }elseif ($names==NULL) {
	    Core::alert("El nombre no puede estar vacío.");
	    exit();
	  }

	$user->category_id = $category_id;
	$user->lastname = $_POST["lastname"];

	$lastnames = $_POST["lastname"];
//valida largo apellido

  if (strlen($lastnames)>30){

          Core::alert("APELLIDO EXCEDE LARGO, MAX 30 CARACTERES.");
          exit();
      }
      //valida apellido

    if (!preg_match("/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]*$/",$lastnames)) {
      Core::alert("Solo letras o espacios en blanco en el apellido.");
      exit();
    }elseif ($lastnames==NULL) {
      Core::alert("El apellido no puede estar vacío.");
      exit();
    }

	$user->address = $_POST["address"];
  $address = $_POST["address"];
  //valida largo direccion

  if (strlen($address)>70){
        Core::alert("DIRECCION EXCEDE LARGO, MAX 70 CARACTERES.");
        exit();
    }
    //VALIDANDO ADDRESS
      $address = $_POST["address"];
      if ($address==NULL) {
        Core::alert("La dirección no puede estar vacío.");
        exit();
    }
    if (!preg_match("/^[A-Za-z0-9.ñÑáéíóúÁÉÍÓÚ ]+$/", $address)) {
    Core::alert("La dirección no cumple con el formato, solo letras, números, punto, y espacios permitidos.");
        exit();
      }

	$user->email = $_POST["email"];
  $email = $_POST["email"];
//valida largo EMAIL
if (strlen($email)>50){

        Core::alert("EMAIL EXCEDE LARGO, MAX 50 CARACTERES.");
        exit();
    }

//valida email
    if ($_POST['email']){
  if (!preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)@[a-z0-9-]+(.[a-z0-9-]+)(.[a-z]{2,})$/i",$email)) {
    Core::alert("El mail tiene un formato invalido.");
    exit();
  }
  }

	$user->phone = $_POST["phone"];

  $phone = $_POST["phone"];
  if(!preg_match("/^[0-9]{8}$/", $phone)) {
    Core::alert("El telefono tiene un formato invalido, recuerda que son 8 sin incluir el +569");
    exit();
  }


	$user->update();

Core::alert("Actualizado exitosamente!");
print "<script>window.location='index.php?view=medics';</script>";


}}


?>
