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

$conn = connection();
$sql = "SELECT * FROM `HorariosBus`.`Horarios` WHERE idhorario ='" . $q . "'";
$result = mysqli_query($conn, $sql);


    $row = mysqli_fetch_array($result);
    $idBus = $row["Buses_idBus"];



mysqli_select_db($conn, "ajax_demo");
$sql1 = "SELECT * FROM `HorariosBus`.`Espacios` WHERE estado='Disponible' AND Buses_idBus= $idBus" ;
$result1 = mysqli_query($conn, $sql1);
?>
<option value="0">--Selecionar--</option>
<?php

while ($row1 = mysqli_fetch_array($result1)) { ?>
    <option value=" <?php echo $row1["idEspacio"]; ?>"><?php echo ($row1["numAsiento"]); ?></option>';
<?php }

mysqli_close($con); ?>