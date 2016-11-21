<?php
$mysqli= new MysqliDb ();
$sql="SELECT * from permisos a, modulos b WHERE a.id_modulo=b.id_modulo AND id_perfil=?";
$permisos = $mysqli->rawQuery($sql,array($_SESSION['id_perfil']));
?>
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nombre_usuario']." ".$_SESSION['apellido_usuario']; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header" align="center">MENÚ</li>
        <li <?php if (!isset($_GET['mod'])) {echo "class='active'";} ?>><a href="../views"><i class="fa fa-home"></i><span>Inicio</span></a></li>
        <?php foreach ($permisos as $permiso) { ?>
        <li 
        <?php if(isset($_GET['mod'])){if ($_GET['mod']==$permiso['id_modulo']) {echo "class='active'";}} ?>
        ><a href="?mod=<?php echo $permiso['id_modulo'];?>"><i class="<?php echo $permiso['icono_modulo'];?>"></i><span> <?php echo $permiso['nombre_modulo'];?></span></a></li>
        <?php } ?>
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview">
          <a href="#"><i class="glyphicon glyphicon-cog"></i> <span>Expandible</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>