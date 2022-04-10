<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$id_product= $_POST['id_producto'];
		$description=$_POST['descripcion'];
		$quantity = $_POST['Cantidad'];
		$value_cost = $_POST['valor_costo'];
		$value_seller = $_POST['valor_venta'];
		
		$sql = "INSERT INTO productos (id_producto, descripcion, Cantidad, valor_costo, valor_venta, fecha_insercion) VALUES ('$id_product', '$description', '$quantity', '$value_cost', '$value_seller', NOW())";
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

	header('location: productos_edicion.php');
?>