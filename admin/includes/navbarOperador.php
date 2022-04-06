<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Configuro</b>Web</span>
    <img src="../images/logo1.jpg" class="logo-image" alt="Logo Image">

  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div>

      <div style="position:absolute; top: 11px;; left:600px;color:white; font-size: medium">
        <strong>Operario</strong>
      </div>
    </div>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="../images/logo1.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $user['usuario']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="../images/logo1.jpg" class="img-circle" alt="User Image">
              <p>
                <?php echo $user['usuario']; ?>
                <small>Miembro desde <?php echo date('M. Y', strtotime($user['fecha_creacion'])); ?></small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Actualizar</a>
              </div>
              <div class="pull-right">
                <a href="logout.php" class="btn btn-default btn-flat">Cerrar Sesión</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php include 'includes/profile_modal.php'; ?>