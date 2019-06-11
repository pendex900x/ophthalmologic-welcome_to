<?php
/**
* Sistema control de citas WELCOME
* @author localhost
**/
$user = ReservationData::getById($_GET["id"]);
$user->del();
print "<script>window.location='index.php?view=reservations';</script>";

?>