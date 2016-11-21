<?php
include('../classes/autoload.php');
$conn = new MysqliDb();
$opt = $_GET["opt"];
switch ($opt) {

	case "validar_cedula":
		$user = $conn->rawQueryOne ('select * from usuarios where cedula_usuario=?',array($_GET["cedula_usuario"]));
		if ($conn->count > 0){echo "false";}else{echo "true";}
	break;

	case "validar_login":
		$user = $conn->rawQueryOne ('select * from usuarios where login_usuario=?',array($_GET["login_usuario"]));
		if ($conn->count > 0){echo "false";}else{echo "true";}
	break;
}
?>