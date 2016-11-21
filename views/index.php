<?php
include ('include/top.php');
?>
<div class="content-wrapper">
<?php
if(isset($_GET['mod']) && !isset($_GET['submod'])){
$sql="SELECT * from modulos WHERE id_modulo=?";
$modulo = $mysqli->rawQueryOne($sql,array($_GET['mod']));
include 'include/level.php';
include $modulo['archivo_modulo'];
}elseif(isset($_GET['mod']) && isset($_GET['submod']) && !isset($_GET['opt'])){
$sql="SELECT * from modulos a, submodulos b WHERE a.id_modulo=b.id_modulo and b.id_modulo=? and b.id_submodulo=?";
$modulo = $mysqli->rawQueryOne($sql,array($_GET['mod'],$_GET['submod']));
include 'include/level.php';
include $modulo['archivo_submodulo'];
}elseif(isset($_GET['mod']) && isset($_GET['submod']) && isset($_GET['opt'])){
$opt="archivo_".$_GET['opt'];
$sql="SELECT * from modulos a, submodulos b, opciones c WHERE a.id_modulo=b.id_modulo and b.id_submodulo=c.id_submodulo and b.id_modulo=? and b.id_submodulo=? and c.opt=?";
$modulo = $mysqli->rawQueryOne($sql,array($_GET['mod'],$_GET['submod'],$_GET['opt']));
include 'include/level.php';
include $modulo['archivo_opt'];
}
?>
</div>
<?php
include 'include/bottom.php';
?>