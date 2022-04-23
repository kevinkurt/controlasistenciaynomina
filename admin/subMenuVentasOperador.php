<?php 
include 'includes/session.php';
include('includes/header.php');	

?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navegadorOperador.php'; ?>
    <?php include 'includes/menubarOperador.php'; ?>

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
                       <br>	Ferreteria rivera 2010</br>	
                       <br>	Nit: 91013368-9  </br>	
                       <br>	REGIMEN SIMPLIFICADO</br>	
                       <br>	Carrera 93 C # 49 F -45 Bosa - Cel:3132166865- Bta. D.C.</br>	
                       <br>

                      </div>      		
                      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
                        <br>	Fecha:</br>
                        <?php
                           $fechaActual = date('Y-m-d');
                           echo $fechaActual;
                        ?>
                        <br></br>
                        <br>	Numero de factura:</br>
                        <?php
                           $a = 0000;
                           echo  ++$a ."<br />\n";
                        ?>
                        <br> </br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="companyName" id="companyName" placeholder="Nombre de cliente" autocomplete="off">
                        </div>  
                       </div>
                    </div>
                     <div class="row">
                       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <table class="table table-bordered table-hover" id="invoiceItem">	
                               <tr>
                                 <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                                 <th width="15%">Prod. No</th>
                                 <th width="38%">Nombre Producto</th>
                                 <th width="15%">Cantidad</th>
                                 <th width="15%">Precio</th>								
                                 <th width="15%">Total</th>
                              </tr>							
                               <tr>
                                 <td><input class="itemRow" type="checkbox"></td>
                                 <td><input type="text" name="productCode[]" id="productCode_1" class="form-control" autocomplete="off"></td>
                                 <td><div class="form-group">
                                        <div class="col-sm-9">
                                          <select class="form-control" id="position" name="id_cargo" required>
                                             <option value="" selected>- Seleccionar -</option>
                                               <?php
                                                 $sql = "SELECT * FROM productos";
                                                 $query = $conn->query($sql);
                                                 while($prow = $query->fetch_assoc()){
                                                   echo "
                                                   <option value='".$prow['id_producto']."'>".$prow['descripcion']."</option>
                                                 ";
                                                 }
                                                ?>
                                           </select>
                                        </div>
                                      </div></td>			
                                 <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
                                 <td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
                                 <td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
                               </tr>						
                           </table>
                   </div>
                 </div>
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
    <?php include 'includes/scripts.php'; ?>
</div>
</body>

