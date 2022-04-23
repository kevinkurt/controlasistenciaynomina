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
  $sql = "SELECT * FROM productos ";
  $query = $conn->query($sql);
  
?>
 <center>Reporte productos por terminar</center>
 <br>


</br>
<h3>Ferreteria rivera 2010</h3>
 <table id="example1" class="table table-bordered">
    <thead>
      <th>Nombre producto</th> 
      <th>Cantidad</th>
      <th>Fecha insercion</th>  
    </thead>
    <tbody>
      <?php
                     $sql = "SELECT * FROM productos WHERE Cantidad <='5' ";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['descripcion']; ?></td>
                          <td><?php echo $row['Cantidad']; ?></td>
                          <td><?php echo date('M d, Y', strtotime($row['fecha_insercion'])) ?></td>
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
$dompdf->stream("reporte productos por terminar.pdf", array("Attachment"=> true));

?>
