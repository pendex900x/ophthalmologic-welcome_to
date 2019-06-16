<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Nuevo Instrumento</h4>
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
		echo "No tiene acceso ya que su cuenta no posee privilegios de administrador y tampoco tiene el rango de secretaria.";
		exit();
		}
	?>

  <div class="card-content table-responsive">

		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addinstrument" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cantidad</label>
    <div class="col-md-6">
      <input type="text" name="cantidad"  class="form-control" id="cantidad" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Instrumento</button>
    </div>
  </div>
</form>
</div>
</div>
	</div>
</div>
