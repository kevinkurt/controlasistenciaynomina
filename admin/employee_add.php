<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$employee_id= $_POST['id_empleado'];
		$firstname = $_POST['nombres'];
		$lastname = $_POST['apellidos'];
		$address = $_POST['direccion'];
		$birthdate = $_POST['fecha_nacto'];
		$contact = $_POST['info_contacto'];
		$gender = $_POST['genero'];
		$position = $_POST['id_cargo'];
		$schedule = $_POST['id_horario'];
		
		$sql = "INSERT INTO empleado (id_empleado, nombres, apellidos, direccion, fecha_nacto, info_contacto, genero, id_cargo, id_horario, fecha_creacion) VALUES ('$employee_id', '$firstname', '$lastname', '$address', '$birthdate', '$contact', '$gender', '$position', '$schedule', NOW())";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Empleado añadido satisfactoriamente';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: employee.php');
?>