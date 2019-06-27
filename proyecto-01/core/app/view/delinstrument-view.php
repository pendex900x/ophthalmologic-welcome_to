<?php

//Verifica si esta logeado
  if(!isset($_SESSION["user_id"])){
  header('Location: index.php');
  }


//ROLES
  $user1 = UserData::getById($_SESSION['user_id']);

  if ((strpos($user1->is_type, 'A')!== false) OR (strpos($user1->is_type, 'i')!== false)){
  }else{
  echo "No tiene acceso ya que su cuenta no posee privilegios de administrador y tampoco tiene el rango de inventario.";
  exit();
  }


$client = InstrumentData::getById($_GET["id"]);
$client->del();
Core::redir("./index.php?view=instruments");

?>
