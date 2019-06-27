<?php
/*PARA EL RUT*/
require_once('./core/app/model/ChileRut.php');

$categories = CategoryData::getAll();
?>

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

<div class="row">
	<div class="col-md-12">

<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Nuevo Medico</h4>
  </div>

	<?
	//Verifica si esta logeado
		if(!isset($_SESSION["user_id"])){
		header('Location: index.php');
		}


	//ROLES
		$user1 = UserData::getById($_SESSION['user_id']);

		if ((strpos($user1->is_type, 'A')!== false) OR (strpos($user1->is_type, 's')!== false)){
		}else{
		echo "No tiene acceso ya que su cuenta no posee privilegios de administrador y tampoco tiene el rango de secretaria.";
		exit();
		}
	?>
	
  <div class="card-content table-responsive">
		<form class="form-horizontal" method="post" id="addmedic" action="" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Area*</label>
    <div class="col-md-6">
    <select name="category_id" class="form-control">
    <option value="">-- SELECCIONE --</option>
    <?php foreach($categories as $cat):?>
    <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
    <?php endforeach;?>
    </select>
    </div>
  </div>


	<div class="form-group">
		<label for="no" class="col-lg-2 control-label">RUT*</label>
		<div class="col-md-6">
			<input type="text" name="no" class="form-control" required value="<? echo $_POST['no']; ?>" id="no" placeholder="ej: 12345678-9">
		</div>
		<span class="error">This field is required</span>
	</div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" class="form-control" value="<? echo $_POST['name']; ?>" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="lastname" required class="form-control" value="<? echo $_POST['lastname']; ?>" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
    <div class="col-md-6">
      <input type="text" name="address" class="form-control"  value="<? echo $_POST['address']; ?>" id="address" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email" class="form-control" value="<? echo $_POST['email']; ?>" id="email" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono*</label>
    <div class="col-md-6">
      <input type="text" name="phone" class="form-control" id="phone" placeholder="Telefono">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Medico</button>
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
			url: './?action=addmedic',
			data: formDetails.serialize(),
			success: function (data) {
				// Inserting html into the result div
			//  $('#results0').html(data);

				if(formID=='addmedic')
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
