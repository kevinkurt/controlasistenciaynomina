<?php include 'includes/session.php'; ?>
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
          ingreso de horas extras
        </h1>
        <ol class="breadcrumb">
          <li><a href="vistaoperario.php"><i class="fa fa-user"></i> Inicio</a></li>

          <li><a href="subMenuNominaOperador.php"><i class="fa fa-clock-o"></i> horas</a></li>
          
          <li><a href="horasOperador.php"><i class="fa fa-pencil"></i> ingreso de horas</a></li>



        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo</a>
              </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <th class="hidden"></th>
                    <th>Fecha Hora</th>
                    <th>id empleado</th>
                    <th>cantidad de horas</th>
                    <th>tipo de hora</th>
                                              
                    <th></th>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT *, tiempo_extra.id AS otid, empleado.id_empleado AS empid
                    FROM tiempo_extra
                    LEFT JOIN empleado
                    ON empleado.id_empleado=tiempo_extra.id_empleado
                    ORDER BY tiempo_extra.Fecha_hora_extra DESC";                    

                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                      echo "
                        <tr>
                          <td class='hidden'></td>                           
                          <td>" . date('M d, Y', strtotime($row['Fecha_hora_extra'])) . "</td>
                          <td>" . $row['empid'] . "</td>
                          <td>" . $row['Cantidad_horas'] ."</td>
                          <td>" . $row['tipo_hora'] . "</td>                      
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