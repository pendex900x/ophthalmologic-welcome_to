<?php $user = InstrumentData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">

<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Editar Instrumento</h4>
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
		<form class="form-horizontal" method="post" id="updateinstrument" action="" role="form">

	<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cantidad*</label>
    <div class="col-md-6">
      <input type="text" name="cantidad" value="<?php echo $user->cantidad;?>" required class="form-control" id="lastname">
    </div>
  </div>
	<div class="form-group">
		<label for="inputEmail1" class="col-lg-2 control-label">Marca</label>
		<div class="col-md-6">
			<input type="text" name="marca" value="<?php echo $user->marca;?>" required class="form-control" id="lastname">
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail1" class="col-lg-2 control-label">Codigo*</label>
		<div class="col-md-6">
			<input type="text" name="codigo" value="<?php echo $user->codigo;?>" required class="form-control" id="lastname">
		</div>
	</div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Instrumento</button>
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

	<!-- name cant be blank-->
	$('#name').on('input', function() {
		var input=$(this);
		var is_name=input.val();
		if(is_name){input.removeClass("invalid").addClass("valid");}
		else{input.removeClass("valid").addClass("invalid");}
	});

	<!-- (no) rut cant be blank-->
	$('#no').on('input', function() {
		var input=$(this);
		var is_no=input.val();
		if(is_no){input.removeClass("invalid").addClass("valid");}
		else{input.removeClass("valid").addClass("invalid");}
	});


  $("form").submit(function() {
    // Getting the form ID
    var formID = $(this).attr('id');
    var formDetails = $('#'+formID);

		$.ajax({
			type: "POST",
			url: './?action=updateinstrument',
			data: formDetails.serialize(),
			success: function (data) {
				// Inserting html into the result div
			//  $('#results0').html(data);

				if(formID=='updateinstrument')
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
