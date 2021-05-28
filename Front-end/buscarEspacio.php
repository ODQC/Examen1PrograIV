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

       


    if (isset($_POST['Buses_idBus'])) {
        $conn = connection();
        $Buses_idBus = $_POST['Buses_idBus'];
                
        $sql = "SELECT * FROM `HorariosBus`.`Espacios` WHERE estado='Disponible' AND Buses_idBus= ".$_POST['Buses_idBus'] ;
        $result = mysqli_query($conn, $sql);

    echo '<script type="text/JavaScript"> 
			alert("Si llegué");
		</script>';

            while ($row1 = mysqli_fetch_array($result)) :; ?>

                <option value=" <?php echo $row1['idEspacio']; ?>"><?php echo $row1['numAsiento']; ?></option>

            <?php endwhile;
        }
    ?>} 

