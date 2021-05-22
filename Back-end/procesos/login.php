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
		$_SESSION['tipoUsuario'] = $fila['tipoUsuario'];
		$_SESSION['verificar'] = true;
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (15 * 60);
		header("Location: ../Front-end/compraTicket.php");
		
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