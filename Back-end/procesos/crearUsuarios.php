<?php
try{


	$servername = "localhost";
	$username = "root";
	$password = "207460988";
	$dbname = "HorariosBus";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$idUsuario = $_POST['idUsuario'];
	$nombre = $_POST['nombre'];
	$apellido1 = $_POST['apellido1'];
	$apellido2 = $_POST['apellido2'];
	$correo = $_POST['email'];
	$telefono = $_POST['telefono'];
	$clave = md5($_POST['password']);
	$nacionalidad = $_POST['nacionalidad'];
	
	
	
	$sql = "INSERT INTO `HorariosBus`.`Usuarios` (`idUsuario`, `nombre`, `apellido1`, `apellido2`, `correo`, `telefono`, `clave`, `nacionalidad`)
	VALUES ('$idUsuario','$nombre','$apellido1','$apellido2','$correo','$telefono','$clave','$nacionalidad')";
	$result = mysqli_query($conn,$sql);
	if ($result) {
		echo '<script type="text/JavaScript"> 
			alert("El usuario se creó correctamente");
		</script>';
		header("Location: ../Front-end/login.php");
	} else {
		echo '<script type="text/JavaScript"> 
			alert("No se pudo crear el usuario");
		</script>';
		header("Location: ../Front-end/registrar.php");
	}
	
}catch (mysqli_sql_exception $e) {
	throw $e;
}catch(Exception $e) {
	echo 'Message: ' .$e->getMessage();
}

$conn->close();





