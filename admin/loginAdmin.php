<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM administrador WHERE usuario = '$usuario'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'cuenta de usuario no existente';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['Cliente_Admin1'] = $row['id'];
			}
			else{
				$_SESSION['error'] = 'contraseña incorrecta';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'credenciales erroneas';
	}

	header('location: indexAdm.php');

?>