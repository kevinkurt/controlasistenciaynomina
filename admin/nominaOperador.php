<?php include 'includes/session.php'; ?>
<?php
include '../timezone.php';
$range_to = date('m/d/Y');
$range_from = date('m/d/Y', strtotime('-30 day', strtotime($range_to)));
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
          Desprendible de nomina
        </h1>
        <ol class="breadcrumb">
          <li><a href="vistaoperario.php"><i class="fa fa-user"></i> Inicio</a></li>
          <li><a href="subMenuNominaOperador.php"><i class="fa fa-book"></i> Nomina</a></li>

          <li><a href="desprendible_pago_empleado.php"><i class="fa fa-download"></i> Desprendible de nomina</a></li>

        </ol>
      </section>
            <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
            
              <div class="box-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <th class="hidden"></th>
                    <th>fecha</th>
                    <th>numero documento</th>
                    <th>nombre</th>
                    <th>sueldo neto</th>
                    <th>deducciones salud y pension</th>
                    <th>prestamos</th>
                    <th>subsidio de transporte</th>
                    <th>cantidad horas extras</th>
                    <th>tipo de hora extra</th>
                    <th>valor horas extras</th>
                    <th>sueldo total </th>
                  </thead>
                  <tbody>
                    <?php
                  
                    $sql = "SELECT  numero_documento, nombre,  Null AS sueldo_neto
                    ,Null AS deduccion_salud_pension, Null AS avances_en_efectivo
                    , Null subsidio_transporte
                    , cantidad_horas
                    , tipo_hora
                    , calculo_valor_hora AS horas_extras
                    ,  Null  AS sueldo_total
                    ,  fecha_generacion AS fecha
                    FROM maestra_sueldos
                    WHERE numero_documento=11
                    UNION ALL
                    SELECT  DISTINCT numero_documento, nombre,  sueldo AS sueldo_neto
                    ,aportes AS deduccion_salud_pension, CASE  WHEN monto_movimiento IS NULL THEN 0  ELSE monto_movimiento END AS avances_en_efectivo
                    , subsidio_transporte
                    , (SELECT SUM(cantidad_horas) FROM maestra_sueldos WHERE numero_documento=11) AS cantidad_horas
                    , NULL AS tipo_hora
                    , (SELECT SUM(calculo_valor_hora) FROM maestra_sueldos WHERE numero_documento=11) AS horas_extras
                    ,  (sueldo+subsidio_transporte + (SELECT SUM(calculo_valor_hora) FROM maestra_sueldos WHERE numero_documento=11)) - ((aportes*2) + CASE  WHEN monto_movimiento IS NULL THEN 0  ELSE monto_movimiento END)  AS sueldo_total
                    , fecha_generacion AS fecha
                    FROM maestra_sueldos
                    WHERE numero_documento=11";
                    
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) { 
                      ?>
                        <tr>
                          <td class='hidden'></td>
                          <td><?php echo date('Y , M', strtotime($row['fecha'])) ?></td>
                          <td><?php echo $row['numero_documento'] ?></td>
                          <td><?php echo $row['nombre'] ?></td>
                          <td><?php echo $row['sueldo_neto'] ?></td>
                          <td><?php echo $row['deduccion_salud_pension'] ?></td>
                          <td><?php echo $row['avances_en_efectivo'] ?></td>
                          <td><?php echo $row['subsidio_transporte'] ?></td>
                          <td><?php echo $row['cantidad_horas'] ?></td>
                          <td><?php echo $row['tipo_hora'] ?></td>
                          <td><?php echo $row['horas_extras'] ?></td>
                          <td><?php echo $row['sueldo_total'] ?></td>
                    
                          <td>
                            
                          </td>
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
    <?php include 'includes/horas_extras_modal.php'; ?>
  </div>
  <?php include 'includes/scripts.php'; ?>
  <script>
    $(function() {
      $('.edit').click(function(e) {
        e.preventDefault();
        $('#edit').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $('.delete').click(function(e) {
        e.preventDefault();
        $('#delete').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });
    });

    function getRow(id) {
      $.ajax({
        type: 'POST',
        url: 'horas_extras_fila.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          var time = response.hours;
          var split = time.split('.');
          var hour = split[0];
          var min = '.' + split[1];
          min = min * 60;
          console.log(min);
          $('.employee_name').html(response.firstname + ' ' + response.lastname);
          $('.otid').val(response.otid);
          $('#datepicker_edit').val(response.date_overtime);
          $('#overtime_date').html(response.date_overtime);
          $('#hours_edit').val(hour);
          $('#mins_edit').val(min);
          $('#rate_edit').val(response.rate);
        }
      });
    }
  </script>
</body>

</html>