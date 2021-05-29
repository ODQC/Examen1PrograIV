<?php



$ced = intval($_GET['ced']);
$idTicket = intval($_GET['idTikect']);
$emision = intval($_GET['emision']);
$espacio = intval($_GET['espacio']);
$bus = intval($_GET['bus']);
$horario = intval($_GET['horario']);
$ruta = intval($_GET['ruta']);
$salida = intval($_GET['salida']);

 echo'<table class="table table-hover" id="tbl_ticket">

            <thead>
              <tr>
                <th>Id Tiquete</th>
                <th>Num. Espacio</th>
                <th>Num. Bus</th>
                <th>Horario</th>
                <th>Ruta</th>
                <th>Cédula</th>
                <th>Emitido</th>
                <th>Fecha Salida</th>

              </tr>
            </thead>

            <tbody>


            </tbody>
          </table>';
echo "<tr>

    <td><?php echo $idTicker ?></td>
    <td><?php echo $espacio ?></td>
    <td><?php echo $bus ?></td>
    <td><?php echo $horario ?></td>
    <td><?php echo $ruta ?></td>
    <td><?php echo $ced ?></td>
    <td><?php echo $emision ?></td>
    <td><?php echo $salida ?></td>
        </tr>';
?>



