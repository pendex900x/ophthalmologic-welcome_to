<?php
/**
* Sistema control de citas WELCOME
* @author localhost

**/

if(count($_POST)>0){
	$user = new InstrumentData();

	$user->name = $_POST["name"];
	//VALIDANDO EL NOMBRE
	$name = $_POST["name"];
	if ($_POST['name']==NULL){
		Core::alert("El nombre no puede estar vacío.");
		exit();
	}elseif(strlen($name)>30){

		Core::alert("El nombre excede 30 carácteres.");
		exit();
	}

	//VALIDANDO CANTIDAD
	$user->cantidad = $_POST["cantidad"];
	$cantidad = $_POST["cantidad"];
	if ($_POST['cantidad']==NULL){
		Core::alert("DEBE ENUMERAR CANTIDAD, SI NO QUEDAN INSTRUMENTOS, PONGA 0.");
		exit();
	}
	//VALIDANDO MARCA
	$user->marca = $_POST["marca"];
	$marca = $_POST["marca"];
	if ($_POST['marca']==NULL){
		Core::alert("DEBE ESCRIBIR UNA MARCA.");
		exit();
    }elseif(strlen($marca)>16){

		Core::alert("MARCA EXCEDE LARGO, MAX 16 CARACTERES");
		exit();
	}
	//VALIDANDO CÓDIGO
	$user->codigo = $_POST["codigo"];
	$codigo = $_POST["codigo"];
	if ($_POST['codigo']==NULL){
		Core::alert("DEBE ESCRIBIR UN CÓDIGO.");
		exit();
    }elseif(strlen($codigo)>20){

		Core::alert("CODIGO EXCEDE LARGO, MAX 20 CARACTERES");
		exit();
	}


	$user->add();

print "<script>window.location='index.php?view=instruments';</script>";


}


?>
