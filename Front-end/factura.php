<?php
session_start();
if (!$_SESSION['verificar']) {
    header("Location: login.php");
}
$user = $_SESSION['user'];
$usuario = implode(", ", $user);
$idUsuario = $_SESSION['idUsuario'];
$correo = $_SESSION['correo'];
$telefono = $_SESSION['telefono'];
$apellido1 = $_SESSION['apellido1'];
$paellido2 = $_SESSION['apellido2'];

?>
<?php
$idTiquetes = "";
$idEspacio = "";
$idBus = "";
$idhorario = "";
$idRutas = "";
$idUsuario = "";
$fechaEmision = "";
$fechaSalida = "";
$origen = "";
$destino = "";
$precio =  "";
$conn = connection();

$sql = "SELECT * FROM HorariosBus.Tiquetes WHERE (Usuarios_idUsuario=$idUsuario)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $idTiquetes = $row["idTiquetes"];
        $idEspacio = $row["Espacios_idEspacio"];
        $idBus = $row["Espacios_Buses_idBus"];
        $idhorario = $row["Horarios_idhorario"];
        $idRutas = $row["Horarios_Rutas_idRutas"];
        $idUsuario = $row["Usuarios_idUsuario"];
        $fechaEmision = $row["fechaEmision"];
        $fechaSalida = $row["fechaSalida"];
    }
} else {
    echo "0 results";
}

$conn->close();

$conn = connection();
$sql = "SELECT * FROM `HorariosBus`.`Rutas`WHERE (idRutas=$idRutas)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $origen = $row["destino"];
        $destino = $row["origen"];
    }
} else {
    echo "0 results";
}

$conn->close();


$sql = "SELECT * FROM `HorariosBus`.`Horarios` WHERE (idhorario=$idhorario)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $precio =  $row["precio"];
    }
} else {
    echo "0 results";
}

$conn->close();


?>

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


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/factura.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="receipt-content">
        <div class="container bootstrap snippets bootdey">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-wrapper">
                        <div class="intro">
                            <H1>RECIBO DE COMPRA DE TIQUETE</H1>
                            <br>
                            <H2>CENTRO BUS</H2>
                        </div>

                        <div class="payment-info">
                            <div class="row">
                                <div class="col-sm-6">
                                    <span>No. TIQUETE</span>
                                    <strong><?php echo $idTiquetes ?></strong>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span>FECHA DE EMICIÓN</span>
                                    <strong><?php echo $fechaEmision ?></strong>
                                </div>
                            </div>
                        </div>

                        <div class="payment-details">
                            <div class="row">
                                <div class="col-sm-6">
                                    <span>NOMBRE DE CLIENTE</span>
                                    <strong>
                                        <?php echo $user . $paellido1 . $paellido2 ?>
                                    </strong>
                                    <span>CORREO ELECTRONICO</span>
                                    <strong>
                                        <?php echo $correo ?>
                                    </strong>
                                    <span>NO. TELEFONO</span>
                                    <strong>
                                        <?php echo $telefono ?>
                                    </strong>
                                    <span>NO.CEDULA</span>
                                    <strong>
                                        <?php echo $idUsuario ?>
                                    </strong>
                                </div>

                            </div>
                        </div>

                        <div class="line-items">

                            <div class="items">
                                <div class="row item">
                                    <div class="col-xs-4 desc">
                                        NO. RUTA:
                                    </div>
                                    <div class="col-xs-3 qty">
                                        <?php echo $idRutas ?>
                                    </div>

                                </div>
                                <div class="row item">
                                    <div class="col-xs-4 desc">
                                        FECHA DE SALIDA:
                                    </div>
                                    <div class="col-xs-3 qty">
                                        <?php echo $fechaSalida ?>
                                    </div>

                                </div>
                                <div class="row item">
                                    <div class="col-xs-5 amount text-right">
                                        HORARIO:
                                    </div>
                                    <div class="col-xs-4 desc">
                                        <?php echo $fechaEmision ?>
                                    </div>

                                </div>
                                <div class="row item">
                                    <div class="col-xs-5 amount text-right">
                                        DESTINO:
                                    </div>
                                    <div class="col-xs-4 desc">
                                        <?php echo $destino ?>
                                    </div>

                                </div>
                                <div class="row item">
                                    <div class="col-xs-5 amount text-right">
                                        ORIGEN:
                                    </div>
                                    <div class="col-xs-4 desc">
                                        <?php echo $origen ?>
                                    </div>

                                </div>
                                <div class="row item">
                                    <div class="col-xs-5 amount text-right">
                                        NO. BUS:
                                    </div>
                                    <div class="col-xs-4 desc">
                                        <?php echo $idBus ?>
                                    </div>

                                </div>
                                <div class="row item">
                                    <div class="col-xs-5 amount text-right">
                                        NO. ASIENTO:
                                    </div>
                                    <div class="col-xs-4 desc">
                                        <?php echo $idEspacio ?>
                                    </div>

                                </div>
                            </div>
                            <div class="row item">
                                <div class="col-xs-5 amount text-right">
                                    PRECIO:
                                </div>
                                <div class="col-xs-4 desc">
                                    <?php echo $precio ?>
                                </div>

                            </div>

                            <div class="print">



                                <button class="fa fa-print" onclick="display()">IMPRIMIR RECIBO</button>


                            </div>
                        </div>
                    </div>

                    <div class="footer">
                        Copyright © 2021. CENTRO BUS
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function display() {
        window.print();
    }
</script>

</html>