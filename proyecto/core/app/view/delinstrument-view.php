<?php

$client = InstrumentData::getById($_GET["id"]);
$client->del();
Core::redir("./index.php?view=instruments");

?>
