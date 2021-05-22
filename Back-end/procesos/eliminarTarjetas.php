<?php

try {
    require_once "php/connect.php";
    if (isset($_GET['idTarjetas'])) {
        $idTarjetas = $_GET['idTarjetas'];
        $query = "DELETE FROM `HorariosBus`.`Tarjetas` WHERE (`idTarjetas` = '$idTarjetas')";
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
