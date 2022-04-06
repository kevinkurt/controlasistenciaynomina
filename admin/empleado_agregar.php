<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$id_empleado= $_POST['id_empleado'];
		$nombres = $_POST['nombres'];
		$apellido = $_POST['apellido'];
		$direccio = $_POST['direccion'];
		$fecha_nacto = $_POST['fecha_nacto'];
		$info_contacto = $_POST['info_contacto'];
		$genero = $_POST['genero'];
		$id_cargo = $_POST['id_cargo'];
		$id_cargo = $_POST['id_cargo'];
		$sql = "INSERT INTO empleado (id_empleado, nombres, apellidos, direccion, fecha_nacto, info_contacto, genero, id_cargo, id_horario, fecha_creacion) VALUES ('$id_empleado', '$nombres', '$apellidos', '$direccion', '$fecha_nacto', '$info_contacto', '$genero', '$id_cargo', '$id_horario', NOW())";
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

	header('location: empleado.php');
?>