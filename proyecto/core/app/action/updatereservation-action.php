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

if(count($_POST)>0){
	$user = ReservationData::getById($_POST["id"]);
	$user->title = $_POST["title"];

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



	$user->pacient_id = $_POST["pacient_id"];
	$user->medic_id = $_POST["medic_id"];
	$user->date_at = $_POST["date_at"];

echo $ahora= date('Y-m-d H:i');echo "<br>";
echo $fecha_ingresada=$_POST["date_at"].$_POST["time_at"];
exit();
if ($ahora<$fecha_ingresada){
  Core::alert("Tiene que ser una fecha posterior a la de ahora.");
exit();
}



	$user->time_at = $_POST["time_at"];
	$user->note = $_POST["note"];
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


	$user->tipo_cita = $_POST["tipo_cita"];

	$user->status_id = $_POST["status_id"];
	$user->payment_id = $_POST["payment_id"];
	$user->price = $_POST["price"];

	//valida el costo

	$price=$_POST["price"];
if(!preg_match("/^[0-9]+$/", $_POST["price"])) {
	  Core::alert("El costo solo puede llevar numeros");
	  exit();
	}



	$user->sick = $_POST["sick"];

	//VALIDANDO EL SICK-ENFERMEDADES

$sick = $_POST["sick"];
if ($_POST['sick']){
if (!preg_match("/^[A-Za-z,.ñÑáéíóúÁÉÍÓÚ ]+$/", $sick)) {
	Core::alert("Solo letras, números, espacios en blanco, punto, y coma en enfermedades.");
	exit();
}
}
if (strlen($sick)>50){
Core::alert("Enfermedades excede 50 carácteres.");
exit();
}



	$user->symtoms = $_POST["symtoms"];

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


	$user->medicaments = $_POST["medicaments"];

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




	$user->update();

Core::alert("Actualizado exitosamente!");
print "<script>window.location='index.php?view=reservations';</script>";


}


?>
