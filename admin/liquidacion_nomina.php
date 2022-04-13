<?php include 'includes/session.php'; ?>
<?php
  include '../timezone.php';
  $range_to = date('m/d/Y');
  $range_from = date('m/d/Y', strtotime('-30 day', strtotime($range_to)));
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menuAdministrador.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nómina / Liquidar Nomina
      </h1>
      <ol class="breadcrumb">
        <li><a href="submenuNomina.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Nomina</li>
        <li class="active">Liquidar Nomina</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="pull-right">
                <form method="POST" class="form-inline" id="payForm">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range" value="<?php echo (isset($_GET['range'])) ? $_GET['range'] : $range_from.' - '.$range_to; ?>">
                  </div>

                  <button type="button" class="btn btn-success btn-sm btn-flat" id="payroll"><span class="glyphicon glyphicon-print"></span> Liquidar empleados</button>
                </form>
              </div>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>ID Empleado</th>
                  <th>Nombre Empleado</th>                
                  <th>Sueldo neto</th>
                  <th>Deducciones salud y pension</th>
                  <th>Avance de Efectivo</th>
                  <th>Subsidio de transporte</th>
                  <th>Calculo valor horas extras</th>
                  <th>Pago total</th>
                  <th>Mes y año de generacion</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT  e.id_empleado AS Numero_documento
                    , UPPER(CONCAT(e.nombres,' ',e.apellidos)) AS Nombre
                    , (c.sueldo) AS sueldo_neto
                    , ((c.sueldo*0.04)*2) AS deducciones_salud_y_pension    
                    , CASE  WHEN m.monto IS NULL THEN 0  ELSE m.monto END  AS avances_en_efectivo
                    , CASE  WHEN c.sueldo> (SELECT monto FROM valores WHERE tipo='sueldo_min_trans') THEN 0 ELSE (SELECT monto FROM valores WHERE tipo='subsidio_transporte')   END AS subsidio_transporte
                    , CASE  WHEN t.cantidad_horas IS NULL THEN 0 ELSE (SUM(CASE WHEN t.tipo_hora='Nocturna_festiva' THEN  ((c.sueldo/240)* 2.5)*t.cantidad_horas  WHEN t.tipo_hora='Diurna_festiva'  THEN  ((c.sueldo/240)* 2)*t.cantidad_horas  WHEN t.tipo_hora='Diurna_normal'  THEN  ((c.sueldo/240)* 1.25)*t.cantidad_horas  ELSE ((c.sueldo/240)* 1.75)*t.cantidad_horas END )) END AS calculo_valor_horas_extras
                    , (c.sueldo+(CASE  WHEN c.sueldo> (SELECT monto FROM valores WHERE tipo='sueldo_min_trans') THEN 0 ELSE (SELECT monto FROM valores WHERE tipo='subsidio_transporte')   END ) + (CASE  WHEN t.cantidad_horas IS NULL THEN 0 ELSE (SUM(CASE WHEN t.tipo_hora='Nocturna_festiva' THEN  ((c.sueldo/240)* 2.5)*t.cantidad_horas  WHEN t.tipo_hora='Diurna_festiva'  THEN  ((c.sueldo/240)* 2)*t.cantidad_horas  WHEN t.tipo_hora='Diurna_normal'  THEN  ((c.sueldo/240)* 1.25)*t.cantidad_horas  ELSE ((c.sueldo/240)* 1.75)*t.cantidad_horas END )) END )-(((c.sueldo*0.04)*2)+(CASE  WHEN m.monto IS NULL THEN 0  ELSE m.monto END)))  AS sueldo_total
                    , CONCAT(EXTRACT(MONTH FROM SYSDATE()),' ',EXTRACT(YEAR FROM SYSDATE()))  AS mes_ano_generacion
                    FROM empleado e
                    JOIN cargos c
                    ON e.id_cargo=c.id_cargo
                    AND DATE_FORMAT(SYSDATE(), '%m/%d/%Y')  BETWEEN '04/01/2022' AND '04/30/2022'
                    LEFT JOIN tiempo_extra t
                    ON e.id_empleado=t.id_empleado
                    LEFT JOIN movimientos m
                    ON e.id_empleado=m.id_empleado
                    GROUP BY e.id_empleado, UPPER(CONCAT(e.nombres,' ',e.apellidos)), (c.sueldo)
                    , CASE  WHEN m.monto IS NULL THEN 0  ELSE m.monto END 
                    , CASE  WHEN c.sueldo> (SELECT monto FROM valores WHERE tipo='sueldo_min_trans') THEN 0 ELSE (SELECT monto FROM valores WHERE tipo='subsidio_transporte')   END
                    , CONCAT(EXTRACT(MONTH FROM SYSDATE()),' ',EXTRACT(YEAR FROM SYSDATE())) ";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                        <td><?php echo $row['Numero_documento']?></td>
                        <td><?php echo $row['Nombre']?></td>
                        <td><?php echo $row['sueldo_neto']?></td>
                        <td><?php echo $row['deducciones_salud_y_pension']?></td>
                        <td><?php echo $row['avances_en_efectivo']?></td> 
                        <td><?php echo $row['subsidio_transporte']?></td> 
                        <td><?php echo $row['calculo_valor_horas_extras']?></td> 
                        <td><?php echo $row['sueldo_total']?></td> 
                        <td><?php echo (isset($_GET['range'])) ? $_GET['range'] : $range_from.' - '.$range_to; ?></td> 
                        <td><?php echo $range_to;?></td>
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
    
  <?php include 'includes/footer.php'; ?>

</div>
<?php include 'includes/scripts.php'; ?> 
<script>
$(function(){
  $("#reservation").on('change', function(){
    var range = encodeURI($(this).val());
    window.location = 'liquidacion_nomina.php?range='+range;
  });

  $('#payroll').click(function(e){
    e.preventDefault();
    $('#payForm').attr('action', 'payroll_generate.php');
    $('#payForm').submit();
  });

  $('#payslip').click(function(e){
    e.preventDefault();
    $('#payForm').attr('action', 'payslip_generate.php');
    $('#payForm').submit();
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'position_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#posid').val(response.id);
      $('#edit_title').val(response.description);
      $('#edit_rate').val(response.rate);
      $('#del_posid').val(response.id);
      $('#del_position').html(response.description);
    }
  });
}


</script>
</body>
</html>
