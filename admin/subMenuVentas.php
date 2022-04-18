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
        Ventas
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
            <div class="box-header with-border">
              <h3 class="box-title">Informe de reporte de ventas</h3>
              <div class="box-tools pull-right">
              <form class="form-inline">
                  <div class="form-group">
                  <button  type="submit" class="btn btn-primary btn-flat" name="reportes"><i class="glyphicon glyphicon-print"></i> Descarga informe de ventas </button>  
                </div>
                </form>               
              </div>
            </div>
            <div class="box-body">
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>fecha venta</th>
                  <th>cantidad productos</th>                
                  <th>valor venta</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT fecha_venta AS fecha, sum(cantidad) AS cantidad_producto, SUM(valor_por_venta) AS valor_por_venta
                    FROM ventas
                    GROUP BY fecha_venta";
                    $query = $conn->query($sql);  
                    while($row = $query->fetch_assoc()){
                    ?>
                        <tr>
                          <td><?php echo $row['fecha'];?></td>
                          <td><?php echo $row['cantidad_producto'];?></td>
                          <td><?php echo $row['valor_por_venta'];?></td>
                        </tr>
                        <?php
                    }
                    ?> 
                </tbody>
              </table>
            </div>
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
  <?php include 'includes/scripts.php'; ?>
</body>
</html>
