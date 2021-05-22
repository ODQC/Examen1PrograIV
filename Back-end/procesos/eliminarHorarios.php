<?php

try {
    require_once "php/connect.php";
    if (isset($_GET['idhorario'])) {
        $idhorario = $_GET['idhorario'];
        $idRutas = $_GET['Rutas_idRutas'];
        $query = "DELETE FROM `HorariosBus`.`Horarios` WHERE (`idhorario` = '$idhorario') and (`Rutas_idRutas` = ''$idRutas)";
        if ($mysqli->query($query)) {
            echo "Registro eliminado";
        } else {
            echo "Error no se pudo eliminar el registro";
        }
    } else {
        echo "Error no se pudo procesar la peticion";
    }
} catch (mysqli_sql_exception $e) {
    throw $e;
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
