<section class="content-header">
      <h1>
        <?php 
        if(isset($_GET['mod']) && !isset($_GET['submod'])){echo $modulo['nombre_modulo'];}
        elseif(isset($_GET['mod']) && isset($_GET['submod']) && !isset($_GET['opt'])){
        ?>
        <img alt="imagen" width=40px height=40px src='../icons/png/<?php echo $modulo['icono_submodulo']?>' align="center">
        <?php
        echo $modulo['nombre_submodulo'];
        }elseif (isset($_GET['mod']) && isset($_GET['submod']) && isset($_GET['opt'])) {
        ?>
        <img alt="imagen" width=40px height=40px src='../icons/png/<?php echo $modulo['icono_opt']?>' align="center">
        <?php
        echo $modulo['nombre_opt'];
        }
        ?>
        <small>
        <?php 
        if(isset($_GET['mod']) && !isset($_GET['submod'])){echo $modulo['descripcion_modulo'];}
        elseif(isset($_GET['mod']) && isset($_GET['submod']) && !isset($_GET['opt'])){echo $modulo['descripcion_submodulo'];}
        elseif(isset($_GET['mod']) && isset($_GET['submod']) && isset($_GET['opt'])){echo $modulo['descripcion_opt'];}
        ?>
        </small>
      </h1>
      <ol class="breadcrumb">
      <?php 
        if(isset($_GET['mod']) && !isset($_GET['submod'])){
        ?>
        <li><a href=?mod=<?php echo $modulo['id_modulo'];?>><i class="<?php echo $modulo['icono_modulo'];?>"></i><?php echo $modulo['nombre_modulo']; ?></a></li>
        <?php
    	}elseif(isset($_GET['mod']) && isset($_GET['submod']) && !isset($_GET['opt'])){
     	?>
     	<li><a href=?mod=<?php echo $modulo['id_modulo'];?>><i class="<?php echo $modulo['icono_modulo'];?>"></i><?php echo $modulo['nombre_modulo']; ?></a></li>
     	<li><a href='?mod=<?php echo $modulo['id_modulo'];?>&submod=<?php echo $modulo['id_submodulo'];?>'><?php echo $modulo['nombre_submodulo']; ?></a></li>
     	<?php
        }elseif(isset($_GET['mod']) && isset($_GET['submod']) && isset($_GET['opt'])){
        ?>
          <li><a href=?mod=<?php echo $modulo['id_modulo'];?>><i class="<?php echo $modulo['icono_modulo'];?>"></i><?php echo $modulo['nombre_modulo']; ?></a></li>
          <li><a href='?mod=<?php echo $modulo['id_modulo'];?>&submod=<?php echo $modulo['id_submodulo'];?>'><?php echo $modulo['nombre_submodulo']; ?></a></li>
          <li><a href='?mod=<?php echo $modulo['id_modulo'];?>&submod=<?php echo $modulo['id_submodulo'];?>&opt=<?php echo $_GET['opt'];?>'><?php echo $modulo['nombre_opt']; ?></a></li>
        <?php }?>
        <li class="active">Aquí</li>
      </ol>
</section>