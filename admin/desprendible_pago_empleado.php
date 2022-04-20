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
 <center>Desprendible pago</center>
 <br>


</br>
<h3>Ferreteria rivera 2010</h3>
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
//$dompdf->setPaper('letter');
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("desprendible pago.pdf", array("Attachment"=> true));

?>
