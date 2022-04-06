<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id'];
		$nombres = $_POST['nombres'];
		$apellidos = $_POST['apellidos'];
		$direccion = $_POST['direccion'];
		$fecha_nacto = $_POST['fecha_nacto'];
		$info_contacto = $_POST['info_contacto'];
		$genero = $_POST['genero'];
		$id_cargo = $_POST['id_cargo'];
		$id_horario = $_POST['id_horario'];
		
		$sql = "UPDATE empleado SET nombres = '$nombres', apellidos = '$apellidos', direccion = '$direccion', fecha_nacto = '$fecha_nacto', info_contacto = '$info_contacto', genero = '$genero', id_cargo = '$id_cargo', id_horario = '$id_horario' WHERE id = '$empid'";
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

	header('location: empleado.php');
?>