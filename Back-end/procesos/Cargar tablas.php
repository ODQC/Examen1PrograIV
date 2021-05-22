<?php
function buscarUsuarios(){
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

  $sql = "SELECT * FROM HorariosBus.Usuarios";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
                        <td>" . $row["idusuario"] . "</td>
                        <td>" . $row["nombre"] . "</td>
                        <td>" . $row["apellido1"] . "</td>
                        <td>" . $row["apellido2"] . "</td>
                        <td>" . $row["correo"] . "</td>
                        <td>" . $row["telfono"] . "</td>
                        <td>" . $row["clave"] . "</td>
                        <td>" . $row["nacionalidad"] . "</td>
                        
                        
                        </tr>";
    }
    echo "</tbody>
              </table>";
  } else {
    echo "0 results";
  }

  $conn->close();
}
function buscarTarjetas()
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

  $sql = "SELECT * FROM HorariosBus.Tarjetas";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
                        <td>" . $row["idTarjetas"] . "</td>
                        <td>" . $row["terjeta"] . "</td>
                        <td>" . $row["ccv"] . "</td>
                        <td>" . $row["fechaVencimiento"] . "</td>
                        <td>" . $row["Usuarios_idUsuario"] . "</td>
                        
                        </tr>";
    }
    echo "</tbody>
              </table>";
  } else {
    echo "0 results";
  }

  $conn->close();
}
function buscarRutas()
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

  $sql = "SELECT * FROM HorariosBus.Rutas";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
                        <td>" . $row["idRutas"] . "</td>
                        <td>" . $row["destino"] . "</td>
                        <td>" . $row["origen"] . "</td>
                        
                        </tr>";
    }
    echo "</tbody>
              </table>";
  } else {
    echo "0 results";
  }

  $conn->close();
}
function buscarBuses()
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

  $sql = "SELECT * FROM HorariosBus.Buses";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
                        <td>" . $row["idBus"] . "</td>
                        <td>" . $row["numPlaca"] . "</td>
                        <td>" . $row["marca"] . "</td>
                        <td>" . $row["modelo"] . "</td>
                        <td>" . $row["cantPasajeros"] . "</td>
                        
                        
                        </tr>";
    }
    echo "</tbody>
              </table>";
  } else {
    echo "0 results";
  }

  $conn->close();
}
function buscarEspacios($idBus)
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

  $sql = "SELECT * FROM HorariosBus.Espacios WHERE (Buses_idBus=$idBus)";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
                        <td>" . $row["idEspacio"] . "</td>
                        <td>" . $row["estado"] . "</td>
                        <td>" . $row["Buses_idBus"] . "</td>
                        <td>" . $row["numAsiento"] . "</td>
                        
                        </tr>";
    }
    echo "</tbody>
              </table>";
  } else {
    echo "0 results";
  }

  $conn->close();
}
function buscarHorarios()
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

  $sql = "SELECT * FROM HorariosBus.Horarios";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
                        <td>" . $row["idhorario"] . "</td>
                        <td>" . $row["horario"] . "</td>
                        <td>" . $row["precio"] . "</td>
                        <td>" . $row["Buses_idBus"] . "</td>
                        <td>" . $row["Rutas_idRutas"] . "</td>
                        
                        </tr>";
    }
    echo "</tbody>
              </table>";
  } else {
    echo "0 results";
  }

  $conn->close();
}
function buscarTiquetesUsuario($idUsuario)
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

  $sql = "SELECT * FROM HorariosBus.Tiquetes WHERE (Usuarios_idUsuario='$idUsuario')";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
                        <td>" . $row["idTiquetes"] . "</td>
                        <td>" . $row["Espacios_idEspacio"] . "</td>
                        <td>" . $row["Espacios_Buses_idBus"] . "</td>
                        <td>" . $row["Horarios_idhorario"] . "</td>
                        <td>" . $row["Horarios_Rutas_idRutas"] . "</td>
                        <td>" . $row["Usuarios_idUsuario"] . "</td>
                        <td>" . $row["fechaEmision"] . "</td>
                        <td>" . $row["fechaSalida"] . "</td>
                        
                        </tr>";
    }
    echo "</tbody>
              </table>";
  } else {
    echo "0 results";
  }

  $conn->close();
}
function buscarTiquetes()
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

  $sql = "SELECT * FROM HorariosBus.Tiquetes";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
                        <td>" . $row["idTiquetes"] . "</td>
                        <td>" . $row["Espacios_idEspacio"] . "</td>
                        <td>" . $row["Espacios_Buses_idBus"] . "</td>
                        <td>" . $row["Horarios_idhorario"] . "</td>
                        <td>" . $row["Horarios_Rutas_idRutas"] . "</td>
                        <td>" . $row["Usuarios_idUsuario"] . "</td>
                        <td>" . $row["fechaEmision"] . "</td>
                        <td>" . $row["fechaSalida"] . "</td>
                        
                        </tr>";
    }
    echo "</tbody>
              </table>";
  } else {
    echo "0 results";
  }

  $conn->close();
}
            
            ?>