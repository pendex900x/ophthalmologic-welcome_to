<?php
/**
* Sistema control de citas WELCOME
* @author localhost
**/

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


$rx = ReservationData::getRepeated($_POST["pacient_id"],$_POST["medic_id"],$_POST["date_at"],$_POST["time_at"]);
if($rx==null){
$r = new ReservationData();
$r->title = $_POST["title"];

//valida title(asunto)
$title = $_POST["title"];
if ($_POST['title']){
  if (!preg_match("/^[A-Za-z,.ñÑáéíóúÁÉÍÓÚ ]+$/",$title)) {
    Core::alert("Solo letras, números, espacios en blanco, punto, y coma en asunto.");
    exit();
  }
}
if (strlen($title)>50){
Core::alert("Asunto excede 50 carácteres.");
exit();
}


$r->note = $_POST["note"];
// valida notas
	$note = $_POST["note"];
	if ($_POST['note']){
	  if (!preg_match("/^[A-Za-z,.ñÑáéíóúÁÉÍÓÚ ]+$/",$note)) {
	    Core::alert("Solo letras, números, espacios en blanco, punto, y coma en nota.");
	    exit();
	  }
	}
	if (strlen($note)>50){
	Core::alert("Nota excede 50 carácteres.");
	exit();
	}



$r->pacient_id = $_POST["pacient_id"];
$r->medic_id = $_POST["medic_id"];
$r->date_at = $_POST["date_at"];
$r->time_at = $_POST["time_at"];
$r->user_id = $_SESSION["user_id"];

$r->tipo_cita = $_POST["tipo_cita"];

$r->status_id = $_POST["status_id"];
$r->payment_id = $_POST["payment_id"];
$r->price = $_POST["price"];
//valida el costo

$price=$_POST["price"];
if(!preg_match("/^[0-9]+$/", $_POST["price"])) {
  Core::alert("El costo solo puede llevar numeros");
  exit();
}



$r->sick = $_POST["sick"];
//VALIDANDO EL SICK-ENFERMEDADES

$sick = $_POST["sick"];
if ($_POST['sick']){
if (!preg_match("/^[A-Za-z,.ñÑáéíóúÁÉÍÓÚ ]+$/",, $sick)) {
Core::alert("Solo letras, números, espacios en blanco, punto, y coma en enfermedades.");
exit();
}
}
if (strlen($sick)>50){
Core::alert("Enfermedades excede 50 carácteres.");
exit();
}


$r->symtoms = $_POST["symtoms"];
//VALIDANDO syntomas
  $symtoms=$_POST["symtoms"];
  if ($_POST['symtoms']){
    if (!preg_match("/^[A-Za-z,.ñÑáéíóúÁÉÍÓÚ ]+$/", $symtoms)) {
      Core::alert("Solo letras, números, espacios en blanco, punto, y coma en sintomas.");
      exit();
    }
  }
  if (strlen($symtoms)>50){
  Core::alert("Sintomas excede 50 carácteres.");
  exit();
  }



$r->medicaments = $_POST["medicaments"];
//VALIDANDO MEDICAMENTOS
  $medicaments=$_POST["medicaments"];
  if ($_POST['medicaments']){
    if (!preg_match("/^[A-Za-z,.ñÑáéíóúÁÉÍÓÚ ]+$/", $medicaments)) {
      Core::alert("Solo letras, números, espacios en blanco, punto, y coma en medicamentos.");
      exit();
    }
  }
  if (strlen($medicaments)>50){
  Core::alert("Medicamentos excede 50 carácteres.");
  exit();
  }



$r->add();

Core::alert("Agregado exitosamente!");
}else{
Core::alert("Error al agregar, Cita Repetida!");
}

print "<script>window.location='index.php?view=reservations';</script>";
//Core::redir("./index.php?view=reservations");
?>
