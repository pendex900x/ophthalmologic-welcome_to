<?php $user = CategoryData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Editar Categoria</h4>
  </div>

	<?
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
	?>

  <div class="card-content table-responsive">


		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatecategory" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Categoria</button>
    </div>
  </div>
</form>
</div>
</div>
	</div>
</div>
