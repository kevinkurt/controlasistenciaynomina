<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

  <?php include 'includes/navegadorOperador.php'; ?>
  <?php include 'includes/menubarOperador.php'; ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Nomina
        </h1>
        <ol class="breadcrumb">
          <li><a href="vistaoperario.php"><i class="fa fa-user"></i> Inicio</a></li>
          <li><a href="subMenuNominaOperador.php"><i class="fa fa-book"></i> Nomina</a></li>
        </ol>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-lg-12">
            <div class="box">
              <div class="box-body">
                <div class="chart" style="margin-left: 300px;padding-top: 100px; ">
                  <br>
                  <div class="col-lg-3 col-xs-12">
                    <!-- opciones submenu -->
                    <div class="small-box bg-navy">
                      <div class="inner" style="padding-bottom: 30px";>
                        <p>ingresar horas extras</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-clock"></i>
                      </div>
                      <a href="horasOperador.php" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <div class="col-lg-3 col-xs-6">
                    <!-- opciones submenu -->
                    <div class="small-box bg-blue">
                      <div class="inner" style="padding-bottom: 30px;">
                        <p>Recibo de Nomina</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-clipboard"></i>
                      </div>
                      <a href="nominaOperador.php" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
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