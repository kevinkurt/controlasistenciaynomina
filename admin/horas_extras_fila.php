<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id_empleado'];
		$sql = "SELECT *, tiempo_extra.id AS otid FROM tiempo_extra LEFT JOIN empleado on empleado.id_empleado =tiempo_extra.id_empleado WHERE tiempo_extra.id_empleado='$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>