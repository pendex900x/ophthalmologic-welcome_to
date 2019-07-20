<style>
body{
  padding: 2em;
}

</style>

<?php

require_once('./core/app/model/ChileRut.php');

$rut = $_POST['rut']; //FALTA PROTEGER LA VARIABLE
if ($rut==null OR $rut==''){
  Core::alert("El rut ingresado es incorrecto! Ingrese nuevamente.");
  Core::redir(".?view=ver_citas");
  exit();
}

if($_POST['rut']){
    if(validaRut($_POST['rut'])==true AND solo_pararut($_POST['rut'])==true){
    }else{
         echo "El rut ".$_POST['rut']." es incorrecto";
         Core::alert("El rut ingresado es incorrecto! Ingrese nuevamente.");
         Core::redir(".?view=ver_citas");
         exit();
    }
}
$rut0 = str_replace(" ", "", $rut, $contador);
$rut1 = str_replace("-", "", $rut0, $contador);
$rut2 = str_replace(".", "", $rut1, $contador); //FORMATO PARA AGREGAR RUT AL SISTEMA ES SIN GUIÓN NI PUNTOS.

$base = new Database();
$con = $base->connect();
$sql = "select pacient.name as pacient_nombre, pacient.lastname as pacient_last, medic.name as medic_name, medic.lastname as medic_lastname, reservation.date_at as r_date_at, reservation.time_at as r_time_at from reservation join pacient on(reservation.pacient_id=pacient.id) join medic on(reservation.medic_id=medic.id) where pacient.no= \"".$rut2."\" ";
 //$sql = "select * from reservation where no= \"".$rut."\"";
//print $sql;
$query = $con->query($sql);

$found = false;
$userid = null;
while($r = $query->fetch_array()){
	$found = true;
	$userid = $r['title'];
  $nombre= $r['pacient_nombre'];
  $apellido= $r['pacient_last'];
  $fecha_reservation=$r['r_date_at'];
  $fecha_reservation_hora=$r['r_time_at'];
  $medic_n=$r['medic_name'];
  $medic_a=$r['medic_lastname'];

}

if($found==true) {
?>
<h3>Historial de citas por paciente.</h3>
<table class="table table-bordered table-hover">
<thead>
<th>Paciente</th>
<th>Medico</th>
<th>Fecha de reservación</th>
<th>Tipo de reserva</th>
</thead>

  <tr>
  <td><?php echo "$nombre $apellido"; ?></td>
  <td><?php echo "$medic_n $medic_a"; ?></td>
  <td><?php echo "$fecha_reservation $fecha_reservation_hora"; ?></td>
  <td><?php echo "ACA PONER TIPO DE RESERVA"; ?></td>
  </tr>
  <?php


?>
</table>



<?
}else{
  echo "No registra citas reservadas.";
}
//	print "<script>window.location='index.php?view=login';</script>";
//	print "<script>window.location='index.php?view=home';</script>";

?>
