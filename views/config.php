<?php
$sql="SELECT * from submodulos WHERE id_modulo=?";
$submodulos = $mysqli->rawQuery($sql,array($_GET['mod']));
?>
</script>
<section class="content"> 
<div class="row">
<?php foreach ($submodulos as $submodulo) { ?>
<div class="col-xs-6 col-md-2 col-xs-6 col-lg-2">
<center>
<a class="btn btn-default btn-block" style="background-color:#fff;" href='?mod=<?php echo $submodulo['id_modulo'];?>&submod=<?php echo $submodulo['id_submodulo'];?>'>
<img alt="imagen" width=100px height=100px src='../icons/png/<?php echo $submodulo['icono_submodulo']?>' align="center">
<br>
</a>
<p class="text-capitalize text-info"><?php echo $submodulo['nombre_submodulo']?></p>
</center>
</div>
<?php } ?>
</div>
</section>