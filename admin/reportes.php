<?php
  session_start();
  include 'includes/conn.php';
  $sql = "SELECT * FROM productos ";
  $query = $conn->query($sql);
?>
<?php include 'includes/subMenuVentas.php'; ?>
<table id="example1" class="table table-bordered">
    <thead>
      <th>Nombre producto</th> 
      <th>Cantidad</th>
      <th>Fecha insercion</th>  
    </thead>
    <tbody>
                  <?php
                      $sql = "SELECT fecha_venta AS fecha, sum(cantidad) AS cantidad_producto, SUM(valor_por_venta) AS valor_por_venta
                      FROM ventas
                      GROUP BY fecha_venta";
                      $query = $conn->query($sql);
                      $drow = $query->fetch_assoc();
                      $deduction = $drow['total_amount'];
                      ?>
                        <tr>
                        <td><?php echo $productos['descripcion']; ?></td>
                          <td><?php echo $productos['Cantidad']; ?></td>
                          <td><?php echo date('M d, Y', strtotime($productos['fecha_insercion'])) ?></td>
                        </tr>
                      <?php
                    }
                  ?>
    </tbody>
</table>