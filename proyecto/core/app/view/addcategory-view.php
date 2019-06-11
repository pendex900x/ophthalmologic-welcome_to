<?php
/**
* Sistema control de citas WELCOME
* @author localhost
**/

if(count($_POST)>0){
	$user = new CategoryData();
	$user->name = $_POST["name"];
	$user->add();

print "<script>window.location='index.php?view=categories';</script>";


}


?>