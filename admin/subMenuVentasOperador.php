<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbarOperador.php'; ?>
    <?php include 'includes/menubarOperador.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Ventas
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li>Ventas</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Informe de reporte de ventas</h3>
                <div class="box-tools pull-right">
                  <form class="form-inline">
                    <div class="form-group">
                      <label>Reporte ventas: </label>
                      <select class="form-control input-sm" id="select_year">
                        <option value="0">Seleccionar</option>
                        <option value="Dia">Dia</option>
                        <option value="Mes">Mes</option>
                        <option value="Año">Año</option>
                      </select>
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