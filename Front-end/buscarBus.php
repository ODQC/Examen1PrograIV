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
?>
<?php
$q = intval($_GET['q']);
$conn = connection();
mysqli_select_db($conn, "ajax_demo");
$sql = "SELECT Buses_idBus FROM HorariosBus.Horarios WHERE idhorario = '" . $q . "'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);
return $row["Buses_idBus"];
mysqli_close($con); ?>