<?php
session_start();
?>
<?php

try {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	
	$query = "SELECT * FROM HorariosBus.Usuarios WHERE correo='$email' AND clave='$password'";
	echo $query;
	$consulta2 = $mysqli->query($query);
	if ($consulta2->num_rows >= 1) {
		$fila = $consulta2->fetch_array(MYSQLI_ASSOC);
		session_start();
		$_SESSION['user'] = $fila['nombre'];
		$_SESSION['idUsuario'] = $fila['idUsuario'];
		$_SESSION['correo'] = $fila['correo'];
		$_SESSION['telefono'] = $fila['telefono'];
		$_SESSION['apellido1'] = $fila['apellido1'];
		$_SESSION['apellido2'] = $fila['apellido2'];
		$_SESSION['verificar'] = true;
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (15 * 60);
		$ipAdd = $_SERVER['HTTP_HOST'];
		header("Location:http://$ipAdd/Examen1PrograIV/Front-end/index.php");
	
		
	} else {
		echo '<script type="text/JavaScript"> 
							alert("El email o contraseña son incorrectos");
						</script>';
	}
} catch (Exception $e) {
	echo $e->getMessage();
}
mysqli_close($conexion);
?>