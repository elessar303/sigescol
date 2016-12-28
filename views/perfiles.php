<?php
$sql="SELECT * from submodulos WHERE id_submodulo=?";
$opt = $mysqli->rawQuery($sql,array($_GET['submod']));
//Columnas de la Cabecera
$columnas=array('ID', 'Perfil');
//Consulta SQL
$sql="SELECT * FROM perfiles a";
//Columnas a mostrar de la Consulta 
$cols = Array ('id_perfil', 'descripcion_perfil');
//Ojo: Las columnas de la Cabecera y las Columnas a mostrar de la consulta deben ser la misma Cantidad
$regs = $mysqli->rawQuery($sql, null, $cols);
?>
<!-- Script de Configuracion Datatable-->
<script src="include/js/datatable_header.js"></script>
<!-- Agregamos los botones adicionaless -->
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#example').DataTable();
    new $.fn.dataTable.Buttons( table, {
        buttons: [
            {
            text: '<i class="fa fa-plus"></i>', 
            titleAttr:'Agregar Perfil',
            action: function ( e, dt, node, conf ) {
                    var mod = getUrlVars()["mod"];
                    var submod = getUrlVars()["submod"];
                    window.location.href="?mod="+mod+"&submod="+submod+"&opt=add";
                    }
            }
        ]
    });
    table.buttons().container()
    .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
} );
</script>
<section class="content">
<div class="table-responsive">
<table id="example" class="table table-striped table-hover table-condensed" cellspacing="0" width="100%">
        <thead>
            <tr>
            <?php foreach ($columnas as $columna){?>
                <th><?php echo $columna;?></th><?php } ?>
                <td align="center"><b>Opciones</b></td>
            </tr>
        </thead>
        <tfoot>
            <tr>
            <?php foreach ($columnas as $columna){?><th><?php echo $columna;?></th><?php } ?>
                <td><b></b></td>
            </tr>
        </tfoot>
        <tbody>
        <?php foreach ($regs as $reg){?>
        <tr>
            <?php foreach ($cols as $col){?>     
                <td align="center"><?php echo $reg[$col];?></td>
            <?php } ?>
            <!-- Opciones para cada Registro (ver,editar,etc) -->
                <td align="center">
                <a title="Ver" href='?mod=<?php echo $opt[0]['id_modulo'];?>&submod=<?php echo $opt[0]['id_submodulo'];?>&opt=view&cod=<?php echo $reg['id_perfil'];?>' class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>
                <a title="Editar" href='?mod=<?php echo $opt[0]['id_modulo'];?>&submod=<?php echo $opt[0]['id_submodulo'];?>&opt=edit&cod=<?php echo $reg['id_perfil'];?>' class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                <a title="Eliminar" href='?mod=<?php echo $opt[0]['id_modulo'];?>&submod=<?php echo $opt[0]['id_submodulo'];?>&opt=delete&cod=<?php echo $reg['id_perfil'];?>' class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></a>
                </td>
        </tr>
        <?php } ?>  
        </tbody>
</table>
</div>
</section>