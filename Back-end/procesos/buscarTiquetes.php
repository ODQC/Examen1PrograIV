<?php
	
try {
	$idUsuario=$_POST['idUsuario'];
	$query= "SELECT * FROM HorariosBus.Tiquetes WHERE (Usuarios_idUsuario='$idUsuario');";
	$consulta3=$mysqli->query($query);
	
	if($consulta3->num_rows>=1){
	
	}else{
		echo '<script type="text/JavaScript"> 
			alert("No hemos encotrado ningun registro");
		</script>';
	}
} catch (mysqli_sql_exception $e) {
	throw $e;
} catch (Exception $e) {
	echo 'Message: ' . $e->getMessage();
}