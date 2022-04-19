<?php

ob_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<title>documento</title>
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<?php
  session_start();
  include 'includes/conn.php';
  
?>
 <center>Reporte ventas</center>
 <br>


</br>
<h3>Ferreteria rivera 2010</h3>
<table id="example1" class="table table-bordered">
                <thead>
                  <th>fecha venta</th>
                  <th>cantidad productos</th>                
                  <th>valor venta</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT fecha_venta AS fecha, sum(cantidad) AS cantidad_producto, SUM(valor_por_venta) AS valor_por_venta
                    FROM ventas
                    GROUP BY fecha_venta";
                    $query = $conn->query($sql);  
                    while($row = $query->fetch_assoc()){
                    ?>
                        <tr>
                          <td><?php echo $row['fecha'];?></td>
                          <td><?php echo $row['cantidad_producto'];?></td>
                          <td><?php echo $row['valor_por_venta'];?></td>
                        </tr>
                        <?php
                    }
                    ?> 
                </tbody>
              </table>
</body>
</html>
<?php

$html=ob_get_clean();
//echo $html;

require_once '../librerias/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
//$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("reporte ventas.pdf", array("Attachment"=> true));

?>
