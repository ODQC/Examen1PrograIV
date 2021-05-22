<?php
	
try{
	require_once "../php/connect.php";
	$horario = $_POST['horario'];
	$precio = $_POST['precio'];
	$idBus = $_POST['Buses_idBus'];
	$idRutas = $_POST['Rutas_idRutas'];
	
	$query = "INSERT INTO `HorariosBus`.`Horarios` (`horario`, `precio`, `Buses_idBus`, `Rutas_idRutas`) 
	VALUES('$horario','$precio','$idBus','$idRutas')";
	if ($mysqli->query($query)) {
		echo '<script type="text/JavaScript"> 
	alert("");
</script>';
	} else {
		echo '<script type="text/JavaScript"> 
	alert("");
</script>';
	}
	}catch (mysqli_sql_exception $e) {
		throw $e;
	}catch(Exception $e) {
		echo 'Message: ' .$e->getMessage();
	}
