<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'home.php';
	}

	if(isset($_POST['save'])){
		$curr_password = $_POST['curr_password'];
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		if(password_verify($curr_password, $user['password'])){
			if($password == $user['password']){
				$password = $user['password'];
			}
			else{
				$password = password_hash($password, PASSWORD_DEFAULT);
			}

			$sql = "UPDATE administrador SET usuario = '$usuario', password = '$password' WHERE id = '".$user['id']."'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Perfil de administrador actualizado correctamente';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
		}
		else{
			$_SESSION['error'] = 'Contraseña Incorrecta';
		}
	}
	else{
		$_SESSION['error'] = 'Rellene los detalles requeridos primero';
	}

	header('location:'.$return);

?>