<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, empleado.id as empid FROM empleado LEFT JOIN cargos ON cargos.id_cargo=empleado.id_cargo LEFT JOIN horario ON horario.id_horario=empleado.id_horario WHERE empleado.id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>