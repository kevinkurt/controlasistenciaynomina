<?php
	$conn = new mysqli('localhost', 'root', '', 'apsystem') or die("connection failed");
	echo "connection success";

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>