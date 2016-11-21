<?php
session_start();
require_once ('../classes/autoload.php');
include '../views/include/links.php';
$db = new MysqliDb();
$login = new Login();
$user=$_POST['user'];
$password=$_POST['password'];
if (($_SERVER['HTTP_REFERER'] == "")){
include '../views/include/forbbiden.php';
exit();
}
$sesion=$login->validarAcceso($user, $password);
if ($sesion==1) {

?>
<script type="text/javascript">
$(document).ready(function(){
		$("#modal2").modal('show');
});

</script>
    <div id="modal2" class="modal modal-success fade">
        <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">¡Inicio Exitoso!</h4>
      </div>
      <div class="modal-body">
        <p>Continuar&hellip;</p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-default" href="../views/" role="button">Aceptar</a>
      </div>
    </div>
  </div>    		
<?php
}elseif ($sesion!=1){
?>
<script type="text/javascript">
$(document).ready(function(){
		$("#modal3").modal('show');
});

</script>
    <div id="modal3" class="modal modal-danger fade">
        <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">¡Usuario No Registrado!</h4>
      </div>
      <div class="modal-body">
        <p>Continuar&hellip;</p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-default" href="../index.php" role="button">Aceptar</a>
      </div>
    </div>
  </div>    
<?php
}
?>