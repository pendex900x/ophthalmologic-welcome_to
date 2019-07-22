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
//VALIDANDO EL NOMBRE
  $names = $_POST["name"];
  if (!preg_match("/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]*$/",$names)) {
    Core::alert("Solo letras o espacios en blanco en el nombre.");
    exit();
  }elseif ($names==NULL) {
    Core::alert("El nombre no puede estar vacío.");
    exit();
  }

if (strlen($names)>30){
Core::alert("El nombre excede 25 carácteres.");
exit();
}


	$user->lastname = $_POST["lastname"];
  //VALIDANDO EL APELLIDO
    $lastnames = $_POST["lastname"];
    if (!preg_match("/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]*$/",$lastnames)) {
      Core::alert("Solo letras o espacios en blanco en el apellido.");
      exit();
    }elseif ($lastnames==NULL) {
      Core::alert("El apellido no puede estar vacío.");
      exit();
    }

if (strlen($lastnames)>30){
Core::alert("El apellido excede 30 carácteres.");
exit();
}

	$user->gender = $_POST["gender"];

  //VALIDANDO EL GENERO
    $genders = $_POST["gender"];
    if ($genders==NULL) {
      Core::alert("El genero no puede estar vacío.");
      exit();
}
    if(($genders=='m') OR ($genders=='h')){
    }else{ Core::alert("Opción no valida para genero.");
      exit();
    }

	$user->day_of_birth = $_POST["day_of_birth"];

//VALIDANDO FECHA DE NACIMIENTO, edad máxima es de 122 años
$now = date_create('now')->format('Y-m-d');
$fecha_cumple= $_POST["day_of_birth"];
$fecha_cumple1 = explode('-', $fecha_cumple);
if ((2019-$fecha_cumple1[0])<123){
  Core::alert("Fecha de nacimiento supera los 123 años. La persona más longeva del mundo vivió 122 años.");
exit();
}elseif($fecha_cumple>$now){
  Core::alert("El paciente no puede venir del futuro, arregle la fecha de nacimiento.");
exit();
}

	$user->sick = $_POST["sick"];
  //VALIDANDO EL SICK-ENFERMEDADES
    $sick = $_POST["sick"];
if ($_POST['sick']){
  if (!preg_match("/^[A-Za-z0-9.,ñÑáéíóúÁÉÍÓÚ ]+$/", $sick)) {
    Core::alert("Solo letras, números, espacios en blanco, punto, y coma en enfermedades.");
    exit();
  }
}
if (strlen($sick)>50){
Core::alert("Enfermedades excede 50 carácteres.");
exit();
}

	$user->medicaments = $_POST["medicaments"];
  //VALIDANDO MEDICAMENTOS
  $medicamentos=$_POST["medicaments"];
  if ($_POST['medicaments']){
    if (!preg_match("/^[A-Za-z0-9.,ñÑáéíóúÁÉÍÓÚ ]+$/", $sick)) {
      Core::alert("Solo letras, números, espacios en blanco, punto, y coma en medicamentos.");
      exit();
    }
  }
  if (strlen($medicamentos)>50){
  Core::alert("Medicamentos excede 50 carácteres.");
  exit();
  }


	$user->alergy = $_POST["alergy"];
//VALIDANDO LAS ALERGIAS
$alergy=$_POST["alergy"];
if ($_POST['alergy']){
  if (!preg_match("/^[A-Za-z0-9.,ñÑáéíóúÁÉÍÓÚ ]+$/", $alergy)) {
    Core::alert("Solo letras, números, espacios en blanco, punto, y coma en alergias.");
    exit();
  }
}
if (strlen($alergy)>50){
Core::alert("La alergia excede 50 carácteres.");
exit();
}



	$user->address = $_POST["address"];
  //VALIDANDO ADDRESS
    $address = $_POST["address"];
    if ($address==NULL) {
      Core::alert("La dirección no puede estar vacío.");
      exit();
}
  if (!preg_match("/^[A-Za-z0-9.,ñÑáéíóúÁÉÍÓÚ ]+$/", $address)) {
Core::alert("La dirección no cumple con el formato, solo letras, números, punto, y espacios permitidos.");
      exit();
    }

    if (strlen($address)>70){
    Core::alert("La dirección excede 70 carácteres.");
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

	$user->phone = $_POST["phone"];
//VALIDANDO EL TELEFONO
$phone=$_POST["phone"];
  if(!preg_match("/^[0-9]{8}$/", $phone)) {
    Core::alert("El telefono tiene un formato invalido, recuerda que son 8 sin incluir el +569");
    exit();
  }

	$user->update();

Core::alert("Actualizado exitosamente!");
print "<script>window.location='index.php?view=pacients';</script>";


}


?>
