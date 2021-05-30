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

    <td><$idTicker </td>
    <td><$espacio</td>
    <td><$bus</td>
    <td>$horario</td>
    <td>$ruta</td>
    <td>$ced </td>
    <td>$emision</td>
    <td>$salida</td>
        </tr>";
?>



