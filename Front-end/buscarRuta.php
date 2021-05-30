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

  $conn = connection();
    $q = intval($_GET['q']); 
  mysqli_select_db($conn, "ajax_demo");
  $sql = "SELECT Rutas_idRutas FROM HorariosBus.Horarios WHERE idhorario =  '" . $q . "'";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_array($result);
   

    echo "<td>" . $row["Rutas_idRutas"] . "</td>";

mysqli_close($con); ?>