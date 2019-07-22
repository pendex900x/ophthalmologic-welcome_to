<?php

if(count($_POST)>0){
	$user = CategoryData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];

$name=$_POST["name"];
//VALIDANDO CATEGORIA
  $name=$_POST["name"];
  if ($_POST['name']){
    if (!preg_match("/^[A-Za-z0-9.,ñÑáéíóúÁÉÍÓÚ ]+$/", $name)) {
      Core::alert("Solo letras, números, espacios en blanco, punto, y coma en medicamentos.");
      exit();
    }
  }
  if (strlen($name)>50){
  Core::alert("Nombre de categoria excede 50 carácteres.");
  exit();
  }

	$user->update();
  Core::alert("Actualizado exitosamente!");
print "<script>window.location='index.php?view=categories';</script>";


}

?>
