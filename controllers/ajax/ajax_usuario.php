<?php
include('../../classes/autoload.php');
$opt = $_GET["opt"];
$db = new MysqliDb();
switch ($opt) {

	case "validar_cedula":
		echo $_GET["cedula_usuario"]; exit();
	break;
}
?>