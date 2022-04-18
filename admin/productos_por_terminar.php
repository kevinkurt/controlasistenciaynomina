<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include 'includes/navegadorAdministrador.php'; ?>
  <?php include 'includes/menuAdministrador.php'; ?>
  <div class="content-wrapper">
    <section class="content-header">
    <h1>
      Inventario / inventario por terminar
      </h1>
      <ol class="breadcrumb">
        <li><a href="vistaAdministrador.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="SubMenuInventario.php"><i class="fa fa-dashboard"></i> Inventario</a></li>
      </ol>
    </section>
    <!-- Menu contenido -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Informe de productos por terminar</h3> 
              <div class="box-tools pull-right">                
                <form class="form-inline">
                  <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="glyphicon glyphicon-print"></i> Descarga informe de productos </button>  
                  </div>
                </form>
              </div>             
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                <th>Nombre producto</th>
                  <th>Cantidad</th>
                  <th>Fecha insercion</th> 
                </thead>
                <tbody>
                  <?php
                     $sql = "SELECT * FROM productos WHERE Cantidad <='5' ";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <<td><?php echo $row['descripcion']; ?></td>
                          <td><?php echo $row['Cantidad']; ?></td>
                          <td><?php echo date('M d, Y', strtotime($row['fecha_insercion'])) ?></td>
                        </tr>
                      <?php
                    }
                  ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
