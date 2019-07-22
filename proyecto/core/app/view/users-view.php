<div class="row">
	<div class="col-md-12">

<div class="card">
  <div class="card-header">
      <h4 class="tit title">Usuarios</h4>
  </div>
  <div class="card-content table-responsive">


<? //Verifica si esta logeado
if(!isset($_SESSION["user_id"])){
header('Location: index.php');
}
?>

<?php //ROLES
$user = UserData::getById($_SESSION['user_id']);

if (strpos($user->is_type, 'A')!== false){
}else{
echo "No tiene acceso ya que su cuenta no posee privilegios de administrador.";
exit();
}
?>

	<a href="index.php?view=newuser" class="btn btn-default"><i class='fa fa-user'></i> Nuevo Usuario</a>
<br>

		<?php

		$users = UserData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre completo</th>
			<th>Nick</th>
			<th>Email</th>
			<th>Activo</th>
			<th>Admin</th>
			<th>Secretaria</th>
			<th>Contador</th>
			<th>Inventario</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>

				<tr>
				<td><?php echo $user->name." ".$user->lastname; ?></td>
				<td><?php echo $user->email; ?></td>
				<td><?php echo $user->username; ?></td>
				<td>
					<?php if($user->is_active):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>
				<td>
					<?php if (strpos($user->is_type, 'A') !== false):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>
				<td>
					<?php if (strpos($user->is_type, 's') !== false):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>
				<td>
					<?php if (strpos($user->is_type, 'c') !== false):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>
				<td>
					<?php if (strpos($user->is_type, 'i') !== false):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>
				<td style="width:30px;"><a href="index.php?view=edituser&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a></td>
				</tr>
				<?php

			}
			?>
			</table>
			<?php



		}else{
			echo "No existen usuarios";// no hay usuarios
		}


		?>

</div>
</div>
	</div>
</div>
