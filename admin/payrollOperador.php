<?php include 'includes/session.php'; ?>
<?php
include '../timezone.php';
$range_to = date('m/d/Y');
$range_from = date('m/d/Y', strtotime('-30 day', strtotime($range_to)));
?>
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
          Desprendible de nomina
        </h1>
        <ol class="breadcrumb">
          <li><a href="vistaoperario.php"><i class="fa fa-user"></i> Inicio</a></li>
          <li><a href="subMenuNominaOperador.php"><i class="fa fa-book"></i> Nomina</a></li>

          <li><a href=""><i class="fa fa-download"></i> Desprendible de nomina</a></li>

        </ol>
      </section>
            <section class="content">
        <?php
        if (isset($_SESSION['error'])) {
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Éxito!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
          unset($_SESSION['success']);
        }
        ?>
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
            
              <div class="box-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <th class="hidden"></th>
                    <th>fecha</th>
                    <th>id empelado</th>
                    <th>sueldo neto</th>
                    <th>sueldo total </th>
                    <th>Acción</th>
                  </thead>
                  <tbody>
                    <?php
                  
                    $sql = "SELECT fecha_generacion, numero_documento , sueldo AS sueldo_neto, (sueldo+subsidio_transporte + (SELECT SUM(calculo_valor_hora) FROM maestra_sueldos WHERE numero_documento=11)) - ((aportes*2) + CASE  WHEN monto_movimiento IS NULL THEN 0  ELSE monto_movimiento END)  AS sueldo_total FROM maestra_sueldos
                    WHERE numero_documento=11
                    GROUP BY numero_documento,sueldo";
                    
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>" . date('M , Y', strtotime($row['fecha_generacion'])) . "</td>
                          <td>" . $row['numero_documento'] . "</td>
                          
                          <td>" . $row['sueldo_neto'] . "</td>
                          <td>" . $row['sueldo_total'] . "</td>
                    
                          <td>
                            <button class='btn btn-success btn-sm btn-flat edit' data-id='" . $row['numero_documento'] . "'><i class='fa fa-edit'></i> Desprendible de pago </button>
                            
                          </td>
                        </tr>
                      ";
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
    <?php include 'includes/overtime_modal.php'; ?>
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
        url: 'overtime_row.php',
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