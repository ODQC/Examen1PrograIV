<?php

try {
    require_once "php/connect.php";
    if (isset($_GET['idEspacio'])) {
        $idEspacio = $_GET['idEspacio'];
        $query = "DELETE FROM `HorariosBus`.`Espacios` WHERE (`idEspacio` = '$idEspacio')";
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
