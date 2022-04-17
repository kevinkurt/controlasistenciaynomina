<?php
	$conn = new mysqli('localhost', 'root', '', 'apsystem') or die("connection failed");

	/*
	echo "Conexión exitosa a la base de datos ";
*/


	if ($conn->connect_error) {
	    die("Conexión Fallida: " . $conn->connect_error);
	}
