<?php
	
try{
	require_once "../php/connect.php";
	
	$estado = $_POST['estado'];
	$idBus = $_POST['idBus'];
	$numAsiento = $_POST['numAsiento'];
	
	$query = "INSERT INTO `HorariosBus`.`Espacios` (`estado`, `Buses_idBus`, `numAsiento`) VALUES('$estado','$idBus','$numAsiento')";
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
