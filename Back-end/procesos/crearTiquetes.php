<?php

	
try{
	require_once "../php/connect.php";
	$idTiquetes = $_POST['idTiquetes'];
	$Espacios_idEspacio = $_POST['idEspacio'];
	$Espacios_Buses_idBus = $_POST['idBus'];
	$Horarios_idhorario = $_POST['idhorario'];
	$Horarios_Rutas_idRutas = $_POST['idRutas'];
	$Usuarios_idUsuario = $_POST['idUsuario'];
	$fechaEmision = date('Y-m-d H:i:s');
	$fechaSalida = $_POST['fechaSalida'];
	
	$query = "INSERT INTO usuario(idTiquetes,Espacios_idEspacio,Espacios_Buses_idBus,Horarios_idhorario,Horarios_Rutas_idRutas,Usuarios_idUsuario,fechaEmision,fechaSalida)
	 VALUES('$idTiquetes','$Espacios_idEspacio','$Espacios_Buses_idBus','$Horarios_idhorario','$Horarios_Rutas_idRutas','$Usuarios_idUsuario','$fechaEmision','$fechaSalida')";
	if ($mysqli->query($query)) {
				echo '<script type="text/JavaScript"> 
			alert("Se ejecutó la compra exitosamente ");
		</script>';
	} else {
				echo '<script type="text/JavaScript"> 
			alert("No se pudo realizar la compra");
		</script>';
	}
	}catch (mysqli_sql_exception $e) {
		throw $e;
	}catch(Exception $e) {
		echo 'Message: ' .$e->getMessage();
	}
header('Location: ../Front-end/factura.php');