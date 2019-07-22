<?php
/**
* Sistema control de citas WELCOME 
* @author localhost

**/
?>

<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
<!--<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/clients-word.php">Word 2007 (.docx)</a></li>
  </ul>
  
</div>
-->
</div>
<div class="card">
  <div class="card-header" >
      <h4 class="tit title" >Stock de Instrumental e Insumos</h4>
  </div>

	<?
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
	?>

  <div class="card-content table-responsive">


	
		<?php

		$users = InstrumentData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover" style="text-style:verdana">
			<thead>
			<th style="font-size: 18px;font-weight:bold; color:#07ECF7">Nombre</th>
			<th style="font-size: 18px;font-weight:bold;color:#07ECF7">Cantidad</th>
			<th style="font-size: 18px;font-weight:bold;color:#07ECF7">Marca</th>
			<th style="font-size: 18px;font-weight:bold;color:#07ECF7">Código</th>
			<th style="font-size: 18px;font-weight:bold;color:#07ECF7">Fecha Creación</th>
      		<th style="font-size: 18px;font-weight:bold;color:#07ECF7">Opciones</th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td style="font-weight:bold;font-size: 16px;color:black"><?php echo $user->name; ?></td>
				<td style="font-weight:bold;font-size: 16px;color:black"><?php echo $user->cantidad; ?></td>
				<td style="font-weight:bold;font-size: 16px;color:black"><?php echo $user->marca; ?></td>
				<td style="font-weight:bold;font-size: 16px;color:black"><?php echo $user->codigo; ?></td>
				<td style="font-weight:bold;font-size: 16px;color:black"><?php echo $user->created_at; ?></td>
				<td style="width:178px;">
				<a href="index.php?view=editinstrument&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delinstrument&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				</td>
				</tr>
				<?php

			}
			?>
			</table>
			</div>
			</div>
			<?php



		}else{
			echo "<p style= 'font-size:20px;'class='alert alert-danger'>No hay instrumental registrado</p>";
		}
		

		?>


	</div>
</div>
<a href="index.php?view=newinstrument" class="añadir btn btn-default" ><i class='fa fa-male'></i> Añadir <br> Instrumental / Insumos</a>
