<?php
function connection()
{
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
    return $conn;
}
function buscar($idHorario){
    $conn = connection();
    $sql =
    "SELECT * FROM `HorariosBus`.`Horarios` WHERE idhorario = '" . $idHorario . "'";;
    $result = mysqli_query($conn, $sql);
   
   if( $row1 = mysqli_fetch_array($result)){
    echo '<script type="text/JavaScript"> 
			alert("Se ha encotrado registro");
		</script>';

    return $row1['Buses_idBus'];
   }else{
		echo '<script type="text/JavaScript"> 
			alert("No hemos encotrado ningun registro");
		</script>';
	}

}



?>


<?php



   
    // Create connection
    $conn = connection();
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $q = intval($_GET['q']);   
    buscar($q);
    #mysqli_select_db($conn, "ajax_demo");
    #$sql = "SELECT * FROM `HorariosBus`.`Espacios` WHERE estado='Disponible' AND Buses_idBus= '".$q."'";
    #$result = mysqli_query($conn, $sql);
    #?>
        <option value="0">--Selecionar--</option>
    <?php

    #while ($row = mysqli_fetch_array($result)) {?>
    
    <option value=" <?php #echo $row["idEspacio"]; ?>"><?php #echo ($row["numAsiento"]); ?></option>';
    <?php #}

     mysqli_close($con);?>