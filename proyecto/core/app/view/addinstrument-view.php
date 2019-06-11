<?php
/**
* Sistema control de citas WELCOME
* @author localhost

**/

if(count($_POST)>0){
	$user = new InstrumentData();

	$user->name = $_POST["name"];
	$user->cantidad = $_POST["cantidad"];

	$user->add();

print "<script>window.location='index.php?view=instruments';</script>";


}


?>
