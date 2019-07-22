<?php
/**
* Sistema control de citas WELCOME
* @author localhost

**/
?>
<style>

th{padding:.2em .8em;border:1px solid rgba(20,50,90,0.25);background:#000058;text-align:left;font-size: 18px!important;font-weight:bold!important; color:#07ECF7!important;}
td{padding:.2em .8em;border:1px solid rgba(16,76,167,0.25);background:rgba(90,156,255,0.25);text-align:left;font-weight:bold!important;font-size: 16px!important;color:black!important;}
.añadir{background-color:#00B6FF!important;}
</style>
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
  <div class="card-header">
      <h4 class="title" style="font-size: 20px;font-weight:bold;color:#07ECF7">Instrumentos</h4>
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
			<th>Marca</th>
			<th>Código</th>
			<th>Creado en</th>
      <th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name; ?></td>
				<td><?php echo $user->cantidad; ?></td>
				<td><?php echo $user->marca; ?></td>
				<td><?php echo $user->codigo; ?></td>
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
			echo "<p class='alert alert-danger'>No hay instrumentos</p>";
		}


		?>


	</div>
</div>
