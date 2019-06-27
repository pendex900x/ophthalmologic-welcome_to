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

		<form class="form-horizontal" method="post" id="addinstrument" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cantidad</label>
    <div class="col-md-6">
      <input type="number" name="cantidad"  class="form-control" id="cantidad" placeholder="Cantidad">
    </div>
  </div>
	  <div class="form-group">
	    <label for="inputEmail1" class="col-lg-2 control-label">Marca</label>
	    <div class="col-md-6">
	      <input type="text" name="marca"  class="form-control" id="" placeholder="Marca">
	    </div>
		</div>
		<div class="form-group">
		    <label for="inputEmail1" class="col-lg-2 control-label">Código</label>
		    <div class="col-md-6">
		      <input type="text" name="codigo"  class="form-control" id="codigo" placeholder="Código">
		    </div>
		</div>


  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Instrumento</button>
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
			url: './?action=addinstrument',
			data: formDetails.serialize(),
			success: function (data) {
				// Inserting html into the result div
			//  $('#results0').html(data);

				if(formID=='addinstrument')
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
