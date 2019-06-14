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
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Instrumentos</h4>
  </div>
  <div class="card-content table-responsive">

	<?php
	$user = UserData::getById($_SESSION['user_id']);
	if ($user->is_admin==1){
	}elseif ($user->is_inventario==0){
		echo "No tiene acceso.";
		exit();
	}
	?>

	<a href="index.php?view=newinstrument" class="btn btn-default"><i class='fa fa-male'></i> Nuevo Instrumento</a>
		<?php

		$users = InstrumentData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th>Cantidad</th>
			<th>Creado en</th>
      <th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name; ?></td>
				<td><?php echo $user->cantidad; ?></td>
				<td><?php echo $user->created_at; ?></td>
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
			echo "<p class='alert alert-danger'>No hay pacientes</p>";
		}


		?>


	</div>
</div>
