<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inventario/Inventario productos
      </h1>
      <ol class="breadcrumb">
        <li><a href="SubMenuInventario.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Inventario</li>
        <li>Inventario productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Informe de inventario productos</h3>
              <div class="box-tools pull-right">                
                <form class="form-inline">
                  <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="glyphicon glyphicon-print"></i> Descarga informe de productos </button>  
                </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <br>
                
                <div id="legend" class="text-center"></div>
                <canvas id="barChart" style="height:350px"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
</body>
</html>
