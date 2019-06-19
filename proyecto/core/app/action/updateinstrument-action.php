<?php

if(count($_POST)>0){
	$user = InstrumentData::getById($_POST["user_id"]);

	$user->name = $_POST["name"];
	$user->cantidad = $_POST["cantidad"];
  $user->codigo = $_POST["codigo"];
  $user->marca = $_POST["marca"];

	$user->update();

Core::alert("Actualizado exitosamente!");
print "<script>window.location='index.php?view=instruments';</script>";


}


?>
