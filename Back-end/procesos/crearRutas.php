<?php
	
try{
	require_once "../php/connect.php";
	$idRutas = $_POST['idRutas'];
	$destino = $_POST['destino'];
	$origen = $_POST['origen'];
	
	$query = "INSERT INTO `HorariosBus`.`Rutas`(`idRutas`, `destino`, `origen`) VALUES('$idRutas','$destino','$origen')";
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
