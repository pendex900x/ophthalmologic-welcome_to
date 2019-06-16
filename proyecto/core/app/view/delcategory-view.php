<?php

//Verifica si esta logeado
  if(!isset($_SESSION["user_id"])){
  header('Location: index.php');
  }


//ROLES
  $user1 = UserData::getById($_SESSION['user_id']);

  if (strpos($user1->is_type, 'A')!== false){
  }else{
  echo "No tiene acceso ya que su cuenta no posee privilegios de administrador.";
  exit();
  }



$category = CategoryData::getById($_GET["id"]);

$category->del();
Core::redir("./index.php?view=categories");


?>
