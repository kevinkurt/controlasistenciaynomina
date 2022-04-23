<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navegadorAdministrador.php'; ?>
  <?php include 'includes/menuAdministrador.php'; ?>
<!-- titulo y retorno inicio -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Inventario
      </h1>
      <ol class="breadcrumb">
        <li><a href="vistaAdministrador.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
      </ol>
    </section>
    <section class="content">      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box-body">
              <div class="chart" style="margin-left: 200px;padding-top: 100px; ">
                <br>
                <div class="col-md-3 col-sm-6 col-xs-12">
          <!-- opciones submenu -->
          <div class="small-box bg-red">
            <div class="inner" style="padding-bottom: 22px;">
              <p>Inventario por terminar</p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
            <a href="productos_por_terminar.php" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
         </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <!-- opciones submenu -->
          <div class="small-box bg-green">
            <div class="inner" style="padding-bottom: 22px;">         
              <p>Inventario productos</p>
            </div>
            <div class="icon">
              <i class="fa fa-bookmark-o"></i>
            </div>
            <a href="productos_inventario.php" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <!-- opciones submenu -->
        <div class="small-box bg-yellow">
            <div class="inner" style="padding-bottom: 22px;">
              <p>Modificacion productos</p>
            </div>
            <div class="icon">
              <i class="fa fa-thumbs-o-up"></i>
            </div>
            <a href="productos_edicion.php" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
                <div id="legend" class="text-center"></div>
                <canvas id="barChart" style="height:350px"></canvas>
              </div>
            </div>
          <div class="row">
              <br>
        
          </div>
        </div>
      </div>
    </section>   
  </div>
  <?php include 'includes/scripts.php'; ?>
</body>
</html>
