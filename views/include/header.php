  <?php
  require('../classes/autoload.php');
  session_start();
  ?>
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SGC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIGESCOL</b>Admin</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- messages-menu -->
          <?php
          include 'messages.php';
          ?>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <?php
          include 'notifications.php';
          ?>
          <!-- /.notifications-menu -->

          <!-- Tasks Menu -->
          <?php
          include 'tasks.php';
          ?>          
          <!-- end task item -->
          
          <!-- User Account Menu -->
          <?php
          include 'account.php';
          ?> 
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>