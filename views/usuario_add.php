<?php
$sql="SELECT * from perfiles";
$perfiles = $mysqli->rawQuery($sql);
?>
<script>
$(function () {
 $(".select2").select2();
});
</script>
<script src="validations/usuario_add.js"></script>
<section class="content">
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos del Usuario</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="" id="form" name="form">
              <div class="box-body">
              <div class="form-group">
				<label for="nacionalidad_usuario" class="control-label col-sm-2">Cédula:</label>
				<div id="nacionalidad_usuario">
                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2">
                  <select class="form-control select" style="width: 100%;" name="nacionalidad_usuario">
                  <option selected="selected">V</option>
                  <option>E</option>
                </select>
                </div>
                <div class="col-xs-4 col-sm-4 col-lg-2">
                    <input type="text" class="form-control" id="cedula_usuario" name="cedula_usuario" placeholder="Cédula">
                </div>
                </div>
                </div>

                <div class="form-group">
                  <label for="nombre_usuario" class="col-xs-2 col-md-2 col-lg-2 control-label">Nombres:</label>
                  <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Nombres">
                  </div>
                </div>

                <div class="form-group">
                  <label for="apellido_usuario" class="col-xs-2 col-md-2 col-lg-2 control-label">Apellidos:</label>
                  <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                    <input type="text" class="form-control" id="apellido_usuario" name="apellido_usuario" placeholder="Apellidos">
                  </div>
                </div>

                <div class="form-group">
                  <label for="login_usuario" class="col-xs-2 col-md-2 col-lg-2 control-label">Login:</label>
                  <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                    <input type="text" class="form-control" id="login_usuario" name="login_usuario" placeholder="Login">
                  </div>
                </div>

                <div class="form-group">
                  <label for="pass_usuario" class="col-xs-2 col-md-2 col-lg-2 control-label">Contraseña:</label>
                  <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                    <input type="password" class="form-control" id="pass_usuario1" name="pass_usuario1" placeholder="Contraseña">
                  </div>
                </div>

                <div class="form-group">
                  <label for="pass_usuario2" class="col-xs-2 col-md-2 col-lg-2 control-label">Confirmar:</label>
                  <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                    <input type="password" class="form-control" id="pass_usuario2" name="pass_usuario2" placeholder="Repita la Contraseña">
                  </div>
                </div>

                <div class="form-group">
                  <label for="rol_usuario" class="col-xs-2 col-md-2 col-lg-2 control-label">Perfil:</label>
                  <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                    <select class="form-control select2" style="width: 100%;" name="rol_usuario">
                  	<option value="" disabled="disabled" selected="selected">Seleccione</option>
                  	<?php foreach ($perfiles as $perfil) { ?>
                  	<option value="<?php echo $perfil['id_perfil'];?>"><?php echo $perfil['descripcion_perfil'];?></option>
                  	<?php } ?>
                	</select>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Limpiar</button>
                <button type="submit" class="btn btn-info pull-right">Aceptar</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
</section>