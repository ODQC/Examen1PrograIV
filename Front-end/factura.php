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
                                        <?php echo $idhorario ?>
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
<?php
session_start();
if (!$_SESSION['verificar']) {
    header("Location: login.php");
}
$user = $_SESSION['user'];
$usuario = implode(", ", $user);
$idUsuario = "207460988";
$correo = $_SESSION['correo'];
$telefono = $_SESSION['telefono'];
$apellido1 = $_SESSION['apellido1'];
$paellido2 = $_SESSION['apellido2'];
$conn = connection();

try {


    $sql = "SELECT * FROM HorariosBus.Tiquetes WHERE (Usuarios_idUsuario='207460988')";
    echo $sql;
    $result = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_array($result);
    $idTiquetes = $row["idTiquetes"];
    $idEspacio = $row["Espacios_idEspacio"];
    $idBus = $row["Espacios_Buses_idBus"];
    $idhorario = $row["Horarios_idhorario"];
    $idRutas = $row["Horarios_Rutas_idRutas"];
    $idUsuario = $row["Usuarios_idUsuario"];
    $fechaEmision = $row["fechaEmision"];
    $fechaSalida = $row["fechaSalida"];
    echo $row;
} catch (mysqli_sql_exception $e) {
    throw $e;
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
try {
    $conn = connection();

    $sql = "SELECT * FROM `HorariosBus`.`Rutas`WHERE (idRutas=$idRutas)";
    $result = mysqli_query($conn, $sql);
    echo $sql;
    $row1 = mysqli_fetch_array($result);
    $origen = $row["destino"];
    $destino = $row["origen"];

    $conn->close();
} catch (mysqli_sql_exception $e) {
    throw $e;
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
try {

    $sql = "SELECT `precio` FROM `HorariosBus`.`Horarios` WHERE (idhorario=$idhorario)";
    $result = mysqli_query($conn, $sql);
    echo $sql;
    $row1 = mysqli_fetch_array($result);
    $precio =  $row["precio"];
    $conn->close();
} catch (mysqli_sql_exception $e) {
    throw $e;
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}

?>

</html>