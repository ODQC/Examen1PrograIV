<?php
try{
	require_once "../php/connect.php";
	$idUsuario = $_POST['idUsuario'];
	$nombre = $_POST['nombre'];
	$apellido1 = $_POST['apellido1'];
	$apellido2 = $_POST['apellido2'];
	$correo = $_POST['correo'];
	$telefono = $_POST['telefono'];
	$clave = $_POST['clave'];
	$nacionalidad = $_POST['nacionalidad'];

	$query = "INSERT INTO usuario(idUsuario,nombre,apellido1,apellido2,correo,telefono,clave,nacionalidad) 
	VALUES('$idUsuario','$nombre','$apellido1','$apellido2','$correo','$telefono','$clave','$nacionalidad')";
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
