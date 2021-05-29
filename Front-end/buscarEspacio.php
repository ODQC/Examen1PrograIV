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

    $q = intval($_GET['q']);   

    mysqli_select_db($conn, "ajax_demo");
    $sql = "SELECT * FROM `HorariosBus`.`Espacios` WHERE estado='Disponible' AND Buses_idBus= '".$q."'";
    $result = mysqli_query($conn, $sql);
    ?>
        <option value="0">--Selecionar--</option>
    <?php

    while ($row = mysqli_fetch_array($result)) {?>
    <option value=" <?php echo $row["idEspacio"]; ?>"><?php echo ($row["numAsiento"]); ?></option>';
    <?php }

     mysqli_close($con);?>