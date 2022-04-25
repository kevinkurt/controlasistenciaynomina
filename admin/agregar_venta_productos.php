<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$cantidad= $_POST['Cantidad'];
		$descripcion=$_POST['descripcion'];	
		$sql = "INSERT INTO agrega_prod (Cantidad, descripcion) VALUES ('$cantidad', '$descripcion')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'producto añadido';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'no se registro empleado';
	}

	header('location: submenuVentasOperador.php');
?>