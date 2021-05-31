<?php

function connection()
{
	$servername = "localhost";
	$username = "root";
	$password = "207460988";
	$dbname = "HorariosBus";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	return $conn;
}
?>

<?php

try {

	$conn = connection();

	$idTiquetes = $_POST['1'];
	$Espacios_idEspacio = $_POST['2'];
	$Espacios_Buses_idBus = $_POST['3'];
	$Horarios_idhorario = $_POST['4'];
	$Horarios_Rutas_idRutas = $_POST['5'];
	$Usuarios_idUsuario = $_POST['6'];
	$fechaEmision = $_POST['7'];
	$fechaSalida = $_POST['8'];
	
	
	$sql = "INSERT INTO usuario(idTiquetes,Espacios_idEspacio,Espacios_Buses_idBus,Horarios_idhorario,Horarios_Rutas_idRutas,Usuarios_idUsuario,fechaEmision,fechaSalida)
	 VALUES('$idTiquetes','$Espacios_idEspacio','$Espacios_Buses_idBus','$Horarios_idhorario','$Horarios_Rutas_idRutas','$Usuarios_idUsuario','$fechaEmision','$fechaSalida')";
	echo $sql;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo '<script type="text/JavaScript"> 
			alert("Se ejecutó la compra exitosamente ");
		</script>';
	} else {
		echo '<script type="text/JavaScript"> 
			alert("No se pudo realizar la compra");
		</script>';
	}
	
} catch (mysqli_sql_exception $e) {
	throw $e;
} catch (Exception $e) {
	echo 'Message: ' . $e->getMessage();
}
