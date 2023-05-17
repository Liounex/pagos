<?php
require_once './fetch.php';
$pago = new MostrarData();
$actualizar = $pago->actualizar($_POST['id_pago'], 1);