<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM administrador WHERE usuario = '$usuario'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with the usuario';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['Cliente_Admin1'] = $row['id'];
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input admin credentials first';
	}

	header('location: index copy.php');

?>