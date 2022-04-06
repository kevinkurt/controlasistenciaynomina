<?php 
	include 'includes/session.php';

	if(isset($_POST['id_empleado'])){
		$id = $_POST['id_empleado'];
		$sql = "SELECT *, empleado.id_empleado as empid FROM empleado LEFT JOIN cargos ON cargo.id_cargo=empleado.id_cargo LEFT JOIN horario ON horario.id_horario=empleado.id_horario WHERE empleado.id_empleado = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>