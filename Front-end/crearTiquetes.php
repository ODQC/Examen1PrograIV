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

	$idTiquetes = intval($_GET['idTicket']);
	$Espacios_idEspacio = intval($_GET['espacio']);
	$Espacios_Buses_idBus = intval($_GET['bus']);
	$Horarios_idhorario = intval($_GET['horario']);
	$Horarios_Rutas_idRutas = intval($_GET['ruta']);
	$Usuarios_idUsuario = intval($_GET['ced']);
	$fechaEmision = intval($_GET['emision']);
	$fechaSalida = intval($_GET['salida']);


	

	$conn =connection();

	$sql = "INSERT INTO usuario(idTiquetes,Espacios_idEspacio,Espacios_Buses_idBus,Horarios_idhorario,Horarios_Rutas_idRutas,Usuarios_idUsuario,fechaEmision,fechaSalida)
	 VALUES('$idTiquetes','$Espacios_idEspacio','$Espacios_Buses_idBus','$Horarios_idhorario','$Horarios_Rutas_idRutas','$Usuarios_idUsuario','$fechaEmision','$fechaSalida')";
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
