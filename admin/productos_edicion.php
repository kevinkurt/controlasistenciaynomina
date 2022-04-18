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
      Inventario / Modificacion productos
      </h1>
      <ol class="breadcrumb">
        <li><a href="vistaAdministrador.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="SubMenuInventario.php"><i class="fa fa-dashboard"></i> Inventario</a></li>
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
                  <th>ID producto</th>
                  <th>Descripcion</th>
                  <th>Cantidad</th>
                  <th>Valor costo</th>
                  <th>Valor venta</th>
                  <th>Fecha registro</th>
                  <th>Acción</th>
                </thead>
                <tbody>
                  <?php
                     $sql = "SELECT * FROM productos ";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['id_producto']; ?></td>
                          <td><?php echo $row['descripcion']; ?></td>
                          <td><?php echo $row['Cantidad']; ?></td>
                          <td><?php echo $row['valor_costo']; ?></td>
                          <td><?php echo $row['valor_venta']; ?></td>
                          <td><?php echo date('M d, Y', strtotime($row['fecha_insercion'])) ?></td>
                          <td>
                            <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['id_producto']; ?>"><i class="fa fa-edit"></i> Editar</button>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['id_producto']; ?>"><i class="fa fa-trash"></i> Eliminar</button>
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
  <?php include 'includes/productos_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id_producto');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id_producto');
    getRow(id);
  });
});
</script>
</body>
</html>
