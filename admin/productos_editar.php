<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_GET['data_id'];
		$description=$_POST['descripcion'];
		$quantity = $_POST['Cantidad'];
		$value_cost = $_POST['valor_costo'];
		$value_seller = $_POST['valor_venta'];

		$sql = "UPDATE productos SET descripcion = '$description', Cantidad = '$quantity', valor_costo = '$value_cost', valor_venta = '$value_seller' WHERE id_producto = '$empid'";
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