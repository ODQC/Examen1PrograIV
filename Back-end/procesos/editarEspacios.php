<?php
	try {
		require_once "../php/connect.php";
		$idEspacio = $_POST['idEspacio'];
		$estado = $_POST['estado'];
		$idBus = $_POST['idBus'];

		$query = "UPDATE `HorariosBus`.`Espacios` SET `estado` = '$estado' WHERE (`idEspacio` = '$idEspacio') and (`Buses_idBus` = '$idBus');";
		if ($mysqli->query($query)) {
			echo "Datos actualizados";
		} else {
			echo "Error no se pudo actualizar los datos";
		}
	} catch (mysqli_sql_exception $e) {
		throw $e;
	} catch (Exception $e) {
		echo 'Message: ' . $e->getMessage();
	}
	