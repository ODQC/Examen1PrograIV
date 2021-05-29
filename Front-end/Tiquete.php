<?php



$ced = intval($_GET['ced']);
$idTicket = intval($_GET['idTikect']);
$emision = intval($_GET['emision']);
$espacio = intval($_GET['espacio']);
$bus = intval($_GET['bus']);
$horario = intval($_GET['horario']);
$ruta = intval($_GET['ruta']);
$salida = intval($_GET['salida']);

echo "<tr>

    <td><?php echo $ ?></td>
    <td><?php echo $ ?></td>
    <td><?php echo $Espacios_Buses_idBus ?></td>
    <td><?php echo $Horarios_idhorario ?></td>
    <td><?php echo $Horarios_Rutas_idRutas ?></td>
    <td><?php echo $idUsuario ?></td>
    <td><?php echo $fechaEmision ?></td>
    <td><?php echo $fechaSalida ?></td>
        </tr>";