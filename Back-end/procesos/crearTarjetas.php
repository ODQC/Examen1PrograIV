<?php
	
	
try{
	require_once "../php/connect.php";

	$idTarjetas = $_POST['idTarjetas'];
	$tarjeta = $_POST['tarjeta'];
	$ccv = $_POST['ccv'];
	$fechaVencimineto = $_POST['fechaVencimineto'];
	$Usuarios_idUsuario = $_POST['Usuarios_idUsuario'];
	
	$query = "INSERT INTO `HorariosBus`.`Tarjetas`(idTarjetas,tarjeta,ccv,Usuarios_idUsuario) VALUES('$idTarjetas','$tarjeta','$ccv','$fechaVencimineto','$Usuarios_idUsuario')";
	echo $query;
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
