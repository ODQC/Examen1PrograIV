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


$Buses_idBus = $_POST['Buses_idBus'];



$conn = connection();
$sql = "SELECT `numAsiento`, `idEspacio` FROM `HorariosBus`.`Espacios` WHERE (Buses_idBus=$Buses_idBus AND estado='Disponible');";
$result = mysqli_query($conn, $sql);
?>
<option value="0">--Selecionar--</option>
<?php while ($row1 = mysqli_fetch_array($result)) :; ?>

    <option value="<?php echo $row1['idEspacio']; ?>"><?php echo $row1['numAsiento']; ?></option>

<?php endwhile; ?>