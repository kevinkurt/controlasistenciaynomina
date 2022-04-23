<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navegadorAdministrador.php'; ?>
  <?php include 'includes/menuAdministrador.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"> 
      <h1>
        Nomina 
      </h1>
      <ol class="breadcrumb">
        <li><a href="vistaAdministrador.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box-body">
              <div class="chart" style="margin-left: 300px;padding-top: 100px; ">
                <br>
                <div class="col-lg-3 col-xs-6"> 
          <!-- small box -->
          <div class="small-box bg-aqua" >
            <div class="inner" style="padding-bottom: 20px;">
              <p>Modificacion Nomina</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i> 
            </div>
            <a href="empleado.php" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
          </div>


        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple"> 
            <div class="inner" style="padding-bottom: 20px;">         
              <p>Liquidar Nomina</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="liquidacion_nomina.php" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
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
