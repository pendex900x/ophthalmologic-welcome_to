<?php


// Module.php
// Tareas que se realizan con modulos.

class Module {

	public static function loadLayout(){
		if(Core::$root==""){
		include "core/app/layouts/layout.php";
		}else if(Core::$root=="admin/"){
		include "core/app/".Core::$theme."/layouts/layout.php";
		}
	}


}



?>
