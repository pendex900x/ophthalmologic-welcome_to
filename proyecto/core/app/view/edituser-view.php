
<style>
	#contact label{
		display: inline-block;
		width: 100px;
		text-align: right;
	}
	#contact_submit{
		padding-left: 100px;
	}
	#contact div{
		margin-top: 1em;
	}
	textarea{
		vertical-align: top;
		height: 5em;
	}

	.error{
		display: none;
		margin-left: 10px;
	}

	.error_show{
		color: red;
		margin-left: 10px;
	}

	input.invalid, textarea.invalid{
		border: 2px solid red;
	}

	input.valid, textarea.valid{
		border: 2px solid green;
	}
</style>

<?php $user = UserData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header">
      <h4 class="tit title">Editar Usuario</h4>
  </div>

	<? //Verifica si esta logeado
	if(!isset($_SESSION["user_id"])){
		  header('Location: index.php');
	}
	?>

	<?php //ROLES
	$user1 = UserData::getById($_SESSION['user_id']);

	if (strpos($user1->is_type, 'A')!== false){
	}else{
		echo "No tiene acceso ya que su cuenta no posee privilegios de administrador.";
		exit();
	}
	?>

  <div class="card-content table-responsive">

		<form class="form-horizontal" method="post" id="updateuser" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" required class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre de usuario*</label>
    <div class="col-md-6">
      <input type="text" name="username" value="<?php echo $user->username;?>" class="form-control" required id="username" placeholder="Nombre de usuario">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email" value="<?php echo $user->email;?>" required class="form-control" id="email" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
    <div class="col-md-6">
      <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
<p class="help-block">La contrase&ntilde;a solo se modificara si escribes algo, en caso contrario no se modifica.</p>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label" >Esta activo</label>
    <div class="col-md-6">
<div class="checkbox">
    <label>
      <input type="checkbox" name="is_active" <?php if($user->is_active){ echo "checked";}?>>
    </label>
  </div>
    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label" >Es administrador</label>
    <div class="col-md-6">
<div class="checkbox">
    <label>
      <input type="checkbox" name="is_admin" <?php if (strpos($user->is_type, 'A') !== false){ echo "checked";}?>>
    </label>
  </div>
    </div>
  </div>

	<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label" >Es secretaria</label>
    <div class="col-md-6">
<div class="checkbox">
    <label>
      <input type="checkbox" name="is_secretaria" <?php if (strpos($user->is_type, 's') !== false){ echo "checked";}?>>
    </label>
  </div>
    </div>
  </div>

	<div class="form-group">
		<label for="inputEmail1" class="col-lg-2 control-label" >Es contador</label>
		<div class="col-md-6">
<div class="checkbox">
		<label>
			<input type="checkbox" name="is_contador" <?php if (strpos($user->is_type, 'c') !== false){ echo "checked";}?>>
		</label>
	</div>
		</div>
	</div>

	<div class="form-group">
		<label for="inputEmail1" class="col-lg-2 control-label" >Es Inventario</label>
		<div class="col-md-6">
<div class="checkbox">
		<label>
			<input type="checkbox" name="is_inventario" <?php if (strpos($user->is_type, 'i') !== false){ echo "checked";}?>>
		</label>
	</div>
		</div>
	</div>


  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
    </div>
  </div>
</form>
<div id="results1"></div>
	</div>
</div>
</div>
</div>


<script type="text/javascript">
$(document).ready(function() {

  $("form").submit(function() {
    // Getting the form ID
    var formID = $(this).attr('id');
    var formDetails = $('#'+formID);

		$.ajax({
			type: "POST",
			url: './?action=updateuser',
			data: formDetails.serialize(),
			success: function (data) {
				// Inserting html into the result div
			//  $('#results0').html(data);

				if(formID=='updateuser')
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
