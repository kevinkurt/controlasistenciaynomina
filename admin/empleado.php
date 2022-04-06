<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Nomina / Modificacion Nomina
      </h1>
      <ol class="breadcrumb">
        <li><a href="SubmenuNomina.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Nomina</li>
        <li class="active">Modificacion Nomina</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i>¡Proceso Exitoso!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
               <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>ID Empleado</th>
                  <th>Nombre</th>
                  <th>Cargo</th>
                  <th>Horario</th>
                  <th>Fecha inicio contrato</th>
                  <th>Acción</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, empleado.id AS empid FROM empleado LEFT JOIN cargos ON cargos.id_cargo=empleado.id_cargo LEFT JOIN horario ON horario.id_horario=empleado.id_horario";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['id_empleado']; ?></td>
                          <td><?php echo $row['nombres'].' '.$row['apellidos']; ?></td>
                          <td><?php echo date('h:i A', strtotime($row['Hora_ingreso'])).' - '.date('h:i A', strtotime($row['Hora_salida'])); ?></td>
                          <td><?php echo date('M d, Y', strtotime($row['fecha_creacion'])) ?></td>
                          <td>
                            <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['empid']; ?>"><i class="fa fa-edit"></i> Editar</button>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['empid']; ?>"><i class="fa fa-trash"></i> Eliminar</button>
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
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/Modulo_edicion_empleado.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'empleado_fila.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.empid);
      $('.id_empleado').html(response.id_empleado);
      $('.Nombre_completo_empleado').html(response.nombres+' '+response.apellidos);
      $('#nombre_empleado').html(response.nombres+' '+response.apellidos);
      $('#editar_nombre').val(response.nombres);
      $('#editar_apellido').val(response.apellidos);
      $('#editar_direccion').val(response.direccion);
      $('#editar_formato_fechas').val(response.fecha_nacto);
      $('#editar_contacto').val(response.info_contacto);
      $('#validar_genero').val(response.genero).html(response.genero);
      $('#validar_cargo').val(response.id_cargo).html(response.id_cargo);
      $('#validar_horario').val(response.id_horario).html(response.Hora_ingreso+' - '+response.Hora_salida);
    }
  });
}
</script>
</body>
</html>
