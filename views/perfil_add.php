<?php
$sql="SELECT * from modulos";
$modulos = $mysqli->rawQuery($sql);
?>
<script>
//iCheck
$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass: 'iradio_flat-green'
  });
});
</script>
<script src="validations/permiso_add.js"></script>
<script>
</script>
<section class="content">
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos del Perfil</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="" id="form" name="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="nombre_usuario" class="col-xs-2 col-md-2 col-lg-2 control-label">Nombre del Perfil:</label>
                  <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre del Perfil">
                  </div>
                </div>
                <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Seleccionar Permisos:</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <?php foreach ($modulos as $modulo) { ?>

                <!-- Consulto los Submodulos del Modulo -->
                <?php
                $sql="SELECT * FROM submodulos WHERE id_modulo=".$modulo['id_modulo']." order by nombre_submodulo";
                $submodulos = $mysqli->rawQuery($sql);
                ?>

                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $modulo['id_modulo'];?>">
                        <i class="<?php echo $modulo['icono_modulo'];?>"></i>
                        <?php echo $modulo['nombre_modulo'];?>
                      </a>
                    </h4>
                  </div>
                  <div id="collapse<?php echo $modulo['id_modulo'];?>" class="panel-collapse collapse">
                    <div class="box-body no-padding">
                      <table class="table">
                      <tr>
                        <tr>
                          <th align="center">Nombre del Modulo</th>
                          <th align="center" colspan="3">Permisos</th>
                        </tr>
                        </tr>
                        <?php foreach ($submodulos as $submodulo) { 
                        $sql="SELECT * FROM permisos_submodulos a, permisos b WHERE a.id_permiso=b.id_permiso and id_submodulo=".$submodulo['id_submodulo']." order by id_permiso_sub";
                        $permisos_sub = $mysqli->rawQuery($sql);
                        ?>
                        <tr>
                          <td><?php echo $submodulo['nombre_submodulo'];?></td>

                          <?php foreach ($permisos_sub as $permiso_sub) { 
                          ?>
                          <td>
                          <label><input type="checkbox"></label> <?php echo $permiso_sub['nombre_permiso'];?>
                          </td>
                          <?php }?>
                          </tr>
                        <?php } ?>
                        </table>
                      </div>
                    </div>
                  </div>
                <?php } ?>
             </div>
            </div>
            <!-- /.box-body -->
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