<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$empid = $_GET['data_id'];
		$sql = "DELETE FROM empleado WHERE id_empleado = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Empleado eliminado con éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Seleccione el elemento para eliminar primero';
	}

	header('location: empleado.php');
	
?>