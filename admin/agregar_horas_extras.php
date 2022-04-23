<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$employee = $_POST['id_empleado'];
		$date = $_POST['Fecha_hora_extra'];
		$hours = $_POST['Cantidad_horas'] + ($_POST['mins']/60);
		$rate = $_POST['tipo_hora'];
		$sql = "SELECT * FROM empleado WHERE id_empleado = '$employee'";
		$query = $conn->query($sql);
		if($query->num_rows < 1){
			$_SESSION['error'] = 'Empleado no encontrado';
		}
		else{
			$row = $query->fetch_assoc();
			$employee_id = $row['id_empleado'];
			$sql = "INSERT INTO tiempo_extra (id_empleado, Fecha_hora_extra, Cantidad_horas, tipo_hora) VALUES ('$employee_id', '$date', '$hours', '$rate')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'ingreso de hora exitoso';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
		}
	}	
	else{
		$_SESSION['error'] = 'error de registro';
	}

	header('location: horas_extras.php');

?>