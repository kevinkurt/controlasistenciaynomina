<?php
include 'includes/session.php';
include('includes/header.php');
?>

<?php include 'includes/scripts.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navegadorOperador.php'; ?>
    <?php include 'includes/menubarOperador.php'; ?>
    <?php include 'includes/modal_registro_venta_producto.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Ventas
        </h1>
        <ol class="breadcrumb">
          <li><a href="vistaoperario.php"><i class="fa fa-user"></i> Inicio</a></li>
          <li><a href="subMenuVentasOperador.php"><i class="fa fa-shopping-cart"></i> Ventas</a></li>
        </ol>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="container content-invoice">
                <form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate>
                  <div class="load-animate animated fadeInUp">
                    <div class="row">
                      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <h2 class="title">Sistema de Facturación</h2>
                        <script src="facturacion.js"></script>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <br> Ferreteria rivera 2010</br>
                        <br> Nit: 91013368-9 </br>
                        <br> REGIMEN SIMPLIFICADO</br>
                        <br> Carrera 93 C # 49 F -45 Bosa - Cel:3132166865- Bta. D.C.</br>
                        <br>

                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
                        <br> Fecha:</br>
                        <?php
                        $fechaActual = date('Y-m-d');
                        echo $fechaActual;
                        ?>
                        <br></br>
                        <br> Numero de factura:</br>
                        <?php
                        $a = 0000;
                        echo  ++$a . "<br />\n";
                        ?>
                        <br> </br>
                        <div class="form-group">
                          <input type="text" class="form-control" name="companyName" id="companyName" placeholder="Nombre de cliente" autocomplete="off">
                        </div>
                      </div>
                    </div>
                    <section class="content">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="box">
                            <div class="box-header with-border">
                              <a href="#addnew2" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo</a>
                            </div>
                            <div class="box-body">
                              <table id="example1" class="table table-bordered">
                                <thead>
                                  <th>cantidad</th>
                                  <th>descripcion</th>
                                  <th>valor costo</th>
                                  <th>valor venta</th>
                                </thead>
                                <tbody>
                                  <?php
                                  $sql = "SELECT agrega_prod.Cantidad, agrega_prod.descripcion, productos.valor_venta, (agrega_prod.Cantidad*productos.valor_venta) AS VALOR_TOTAL
                     FROM agrega_prod, productos
                     WHERE agrega_prod.descripcion=productos.descripcion ";
                                  $query = $conn->query($sql);
                                  while ($row = $query->fetch_assoc()) {
                                  ?>
                                    <tr>
                                      <td><?php echo $row['Cantidad']; ?></td>
                                      <td><?php echo $row['descripcion']; ?></td>
                                      <td><?php echo $row['valor_venta']; ?></td>
                                      <td><?php echo $row['VALOR_TOTAL']; ?></td>
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
                    <div class="row">
                      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <button class="btn btn-danger delete" id="removeRows" type="button">- Borrar</button>
                        <button class="btn btn-success" id="addRows" type="button">+ Agregar Más</button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                        <br>
                        <div class="form-group">
                          <input data-loading-text="Guardando factura..." type="submit" name="invoice_btn" value="imprimir recibo" class="btn btn-success submit_btn invoice-save-btm">
                        </div>

                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <span class="form-inline">
                          <div class="form-group">
                            <label>Total: &nbsp;</label>
                            <div class="input-group">
                              <div class="input-group-addon currency">$</div>
                              <input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
                            </div>
                          </div>

                        </span>
                        
                      </div>
                    </form>
                  </div>
              </div>
            </div>
        </div>
      </section>
    </div>
  </div>
 
</body>