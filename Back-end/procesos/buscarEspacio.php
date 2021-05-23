<?php



    $servername = "localhost";
    $username = "root";
    $password = "207460988";
    $dbname = "HorariosBus";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    



    $Buses_idBus = $_POST['Buses_idBus'];
    $queryM = "SELECT `numAsiento`, `idEspacio` FROM `HorariosBus`.`Espacios` WHERE (Buses_idBus=$Buses_idBus AND estado='Disponible');";
    $resultadoM = $mysqli->query($queryM);

    $html = "<option value='0'>Seleccionar Asiento</option>";

    while ($rowM = $resultadoM->fetch_assoc()) {
        $html .= "<option value='" . $rowM['idEspacio'] . "'>" . $rowM['numAsiento'] . "</option>";
    }

    echo $html;

