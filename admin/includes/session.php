<?php
	session_start();
	include 'includes/conn.php';

	if(!isset($_SESSION['Cliente_Admin1']) || trim($_SESSION['Cliente_Admin1']) == ''){
		header('location: index.php');
	}

	$sql = "SELECT * FROM administrador WHERE id = '".$_SESSION['Cliente_Admin1']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>