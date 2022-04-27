<?php
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$celular = $_POST['celular'];
	$mensaje = $_POST['mensaje'];

	// Database connection
	$conn = new mysqli('localhost','root','4311','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contacts (nombre, correo, celular, mensaje) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $nombre, $correo, $celular, $mensaje);
		$execval = $stmt->execute();
		$stmt->close();
		$conn->close();
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit;
	}
?> 