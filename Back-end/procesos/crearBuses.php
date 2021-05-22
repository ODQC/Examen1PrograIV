<?php

try{
	require_once "../php/connect.php";
	$numPlaca = $_POST['numPlaca'];
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$cantPasajeros = $_POST['cantPasajeros'];
	
	$query = "INSERT INTO `HorariosBus`.`Buses` (`numPlaca`, `marca`, `modelo`, `cantPasajeros`)  VALUES('$numPlaca','$marca','$modelo','$cantPasajeros')";
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
