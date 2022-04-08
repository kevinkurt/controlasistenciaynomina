<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_GET['data_id'];
		$firstname = $_POST['nombres'];
		$lastname = $_POST['apellidos'];
		$address = $_POST['direccion'];
		$birthdate = $_POST['fecha_nacto'];
		$contact = $_POST['info_contacto'];
		$gender = $_POST['genero'];
		$position = $_POST['id_cargo'];
		$schedule = $_POST['id_horario'];
		$sql = "UPDATE empleado SET nombres = '$firstname', apellidos = '$lastname', direccion = '$address', fecha_nacto = '$birthdate', info_contacto = '$contact', genero = '$gender', id_cargo = '$position', id_horario = '$schedule' WHERE id_empleado = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Empleado actualizado con éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Seleccionar empleado para editar primero';
	}

	header('location: employee.php');
?>