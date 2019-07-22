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

<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Nuevo usuario</h4>
  </div>
  <div class="card-content table-responsive">

		<form class="form-horizontal" method="post" id="adduser" action="" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre de usuario*</label>
    <div class="col-md-6">
      <input type="text" name="username" class="form-control" required id="username" placeholder="Nombre de usuario">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email" class="form-control" id="email" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
    <div class="col-md-6">
      <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
    </div>
  </div>

	<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Es administrador</label>
    <div class="col-md-6">
<div class="checkbox">
    <label>
      <input type="checkbox" name="is_admin">
    </label>
  </div>
    </div>
  </div>

	<div class="form-group">
		<label for="inputEmail1" class="col-lg-2 control-label">Es secretaria</label>
		<div class="col-md-6">
<div class="checkbox">
		<label>
			<input type="checkbox" name="is_secretaria">
		</label>
	</div>
		</div>
	</div>

	<div class="form-group">
		<label for="inputEmail1" class="col-lg-2 control-label">Es Contador</label>
		<div class="col-md-6">
<div class="checkbox">
		<label>
			<input type="checkbox" name="is_contador">
		</label>
	</div>
		</div>
	</div>

	<div class="form-group">
		<label for="inputEmail1" class="col-lg-2 control-label">Es Inventario</label>
		<div class="col-md-6">
<div class="checkbox">
		<label>
			<input type="checkbox" name="is_inventario">
		</label>
	</div>
		</div>
	</div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Usuario</button>
    </div>
  </div>
</form>
<div id="results1"></div>

<script type="text/javascript">
$(document).ready(function() {

  $("form").submit(function() {
    // Getting the form ID
    var formID = $(this).attr('id');
    var formDetails = $('#'+formID);

		$.ajax({
			type: "POST",
			url: './?action=adduser',
			data: formDetails.serialize(),
			success: function (data) {
				// Inserting html into the result div
			//  $('#results0').html(data);

				if(formID=='adduser')
							 $('#results1').html(data);
				// else if(formID=='contact2')
				//       $('#results2').html(data);

			//  $('#results0').html(data);
			},
			error: function(jqXHR, text, error){
						// Displaying if there are any errors
							$('#result').html(error);
				}
		});
		return false;
		});
		});
</script>
	</div>
</div>
</div>
</div>
