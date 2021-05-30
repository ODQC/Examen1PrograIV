<?php
session_start();
if (!$_SESSION['verificar']) {
  header("Location: login.php");
}
$user = $_SESSION['user'];
$usuario = implode(", ", $user);
$idUsuario = $_SESSION['idUsuario'];
$idBus = "";


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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Comprar tiquetes</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!-- end Vendor CSS Files -->

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#cbx_horario").change(function() {

        //$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

        $("#cbx_horario option:selected").each(function() {
          Buses_idBus = $(this).val();
          $.post("../Back-end/procesos/buscarEspacio.php", {
            Buses_idBus: Buses_idBus
          }, function(data) {
            $("#cbx_Espacio").html(data);
          });
        });
      })
    });
  </script>

  <!-- =======================================================
  * Template Name: Squadfree - v2.3.1
  * Template URL: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js"></script>
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/pagar.css" rel="stylesheet">
  <link href="assets/css/styleCalendar.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
  <link rel="stylesheet" href="assets/css/rome.css">


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!-- Style -->



  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style type="text/css">
    #regiration_form fieldset:not(:first-of-type) {
      display: none;
    }
  </style>


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.php"><span>Centro Bus</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="#about">Compra tiquetes</a></li>
          <li><a href="#Mistiquetes">Mis tiquetes</a></li>
          <li><a href="#horarios">Horarios</a></li>
          <li><a href="#lugares">Lugares</a></li>
          <li><a href="#cta">Pagar</a></li>

          <li><a href="logout.php">Salir</a></li>



        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Compra de tiquetes</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Compra de tiquetes</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->


  </main><!-- End #main -->
  <!-- ======= Section1 ======= -->
  <section class="inner-page" id="Mistiquetes">
    <form name="MisTiquetes" id="MisTiquetes" action="" method="post" role="form" class="php-email-form">
      <div class="container">
        <p>
        <h4>Mis tiquetes</h4>

        <table class="table table-hover">

          <thead>
            <tr>
              <th>Id Tiquete</th>
              <th>Num. Espacio</th>
              <th>Num. Bus</th>
              <th>Horario</th>
              <th>Ruta</th>
              <th>Cédula</th>
              <th>Emitido</th>
              <th>Fecha Salida</th>

            </tr>
          </thead>
          <tbody>

            <?php

            $conn = connection();

            $sql = "SELECT * FROM `HorariosBus`.`Tiquetes` WHERE (`Usuarios_idUsuario`='$idUsuario')";
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
              echo "El cliente aún no tiene tiquetes comprados.";
            }

            $conn->close();
            ?>

      </div>
    </form>
  </section>
  <!-- End  Section1 -->
  <section id="cta" class="cta">
    <div class="container" data-aos="zoom-in">

      <div class="text-center">
        <h3>Reserve su tiquete en linea</h3>
      </div>

    </div>
  </section><!-- End Cta Section -->



  <section class="inner-page">
    <div class="container">
      <h1>Compra de tiquetes en linea</h1>
      <div class="progress">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
      </div>

      <form id="regiration_form" novalidate action="factura.php" method="post">
        <fieldset>
          <h2> Paso 1: Seleccione el Horario</h2>
          <div class="form-group">
            <h4>Seleccione la fecha:</h4>
            <label for="fechaSalida">Fecha de salida:</label>
            <input type="datetime-local" id="fechaSalida" name="fechaSalida">

          </div>
          <div class="form-group">
            <table class="table table-hover">

              <thead>
                <tr>
                  <th>id Horario</th>
                  <th>Rutas</th>
                  <th>Horarios</th>
                  <th>Precios en dolares</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $conn = connection();
                $sql = "SELECT * FROM `HorariosBus`.`Horarios`";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                  // output data of each row
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["idhorario"] . "</td>
                        <td>" . $row["Rutas_idRutas"] . "</td>
                        <td>" . $row["horario"] . "</td>
                        <td>" . $row["precio"] . "</td>
                        
						            
                        </tr>";
                  }
                  echo "</tbody>
              </table>";
                } else {
                  echo "0 results";
                }

                $conn->close();
                ?>

          </div>
          <div class="form-group">
            <h4>Seleccione el horario:</h4>
            <select size="1" class="form-control" id="idhorario" name="idhorario" onchange="showIdBus(this.value)" required>

              <?php
              $conn = connection();
              $sql = "SELECT * FROM `HorariosBus`.`Horarios`";
              $result = mysqli_query($conn, $sql);
              ?>
              <option value="0">--Selecionar--</option>


              <?php while ($row1 = mysqli_fetch_array($result)) :; ?>

                <option value="<?php echo ($row1['idhorario']) ?>"> <?php echo ($row1["Rutas_idRutas"]), ("-"), ($row1["horario"]); ?> </option>

              <?php endwhile; ?>
            </select>
          </div>

          <input type="button" name="data[password]" class="next btn btn-info" value="Siguiente" />
        </fieldset>

        <fieldset>
          <h2> Paso 2: Seleccione el Espacio</h2>
          <div class="form-group">
            <img src="assets/img/espacios-bus.jpeg" alt="Trulli" width="800" height="333">
            <br>Selecione el lugar de su preferencia.
          </div>
          <div class="form-group">
            <select size="1" class="form-control" id="idEspacio" name="idEspacio">
              <option>--Espacio--</option>
            </select>
          </div>

          <input type="button" name="previous" class="previous btn btn-default" value="Previo" />
          <input type="button" name="next" class="next btn btn-info" value="Siguiente" />
        </fieldset>
        <fieldset>
          <h2>Paso 3: Confirmar Compra</h2>
          <script type="text/javascript">
            idTicker
          </script>
          <table class="table table-hover" id="tbl_ticket">

            <thead>
              <tr>
                <th>Id Tiquete</th>
                <th>Num. Espacio</th>
                <th>Num. Bus</th>
                <th>Horario</th>
                <th>Ruta</th>
                <th>Cédula</th>
                <th>Emitido</th>
                <th>Fecha Salida</th>

              </tr>
            </thead>

            <tbody>
              <tr>
                <td id="1"></td>
                <td id="2"></td>
                <td id="3"></td>
                <td id="4"></td>
                <td id="5"></td>
                <td id="6"> </td>
                <td id="7"></td>
                <td id="8"></td>
              </tr>

            </tbody>
          </table>


          <input type="button" name="btnCargar" class="" value="Cargar" onclick="CargarTicket()" />
          <h2>Paso 4: Método de pago</h2>

          <div class="form-group">
            <form id="metodoPago" method="post" novalidate="novalidate" class="needs-validation">


              <div class="form-group">
                <label for="cc-number" class="control-label mb-1">Nombre de tarjeta</label>
                <input id="tarjeta" name="tarjeta" type="text" class="form-control cc-number identified visa" required autocomplete="off">
                <label for="cc-number" class="control-label mb-1">Número de tarjeta</label>
                <input id="idTarjetas" name="idTarjetas" type="tel" class="form-control cc-number identified visa" required autocomplete="off">
                <span class="invalid-feedback">Enter a valid 12 to 16 digit card number</span>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="cc-exp" class="control-label mb-1">Expiration</label>
                    <input id="fechaVencimineto" name="fechaVencimineto" type="tel" class="form-control cc-exp" required placeholder="MM / YY" autocomplete="cc-exp">
                    <span class="invalid-feedback">Fecha de expiración</span>
                  </div>
                </div>
                <div class="col-6">
                  <label for="x_card_code" class="control-label mb-1">CVV</label>
                  <div class="input-group">
                    <input id="cvv" name="cvv" type="tel" class="form-control cc-cvc" required autocomplete="off">
                    <span class="invalid-feedback order-last">Enter the 3-digit code on back</span>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fa fa-question-circle fa-lg" data-toggle="popover" data-container="body" data-html="true" data-title="CVV" data-content="<div class='text-center one-card'>The 3 digit code on back of the card..<div class='visa-mc-cvc-preview'></div></div>" data-trigger="hover"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div>
                <button id="payment-button" name="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                  <i class="fa fa-lock fa-lg"></i>&nbsp;
                  <span id="payment-button-amount">Verificar método de pago </span>
                  <span id="payment-button-sending" style="display:none;">Sending…</span>
                </button>
              </div>
            </form>
          </div>
          <input type="button" name="previous" class="previous btn btn-default" value="Previo" />
          <input type="submit" name="submit" class="submit btn btn-success" value="Enviar" id="submit_data" />
        </fieldset>

      </form>
    </div>
  </section>


  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info" data-aos="fade-up" data-aos-delay="50">
              <h3>Examen I Programación IV</h3>
              <p class="pb-3"><em><strong>Estudiante: </strong>Oscar Quesada Calderón.</em>
              </p>
              <p>
                <strong>Universidad Nacional</strong><br>
                <strong>Sede Interuniversitaria</strong><br>
                <strong>Ing. Sistemas</strong><br>
                <strong>Correo:</strong> oscar.quesada.calderon@est.una.ac.cr<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="150">
            <h4>Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Inicio</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Nosotros</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Rutas</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Horarios</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="compraTicket.html">Compra de tiquetes</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="registrar.html">Registrarse</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="login.html">Inicie sessión</a></li>

            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="250">
            <h4>Referencias</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.bootstrapdash.com/product/free-bootstrap-login/" target="_blank">www.bootstrapdash.com</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://www.prepbootstrap.com/bootstrap-template/credit-card-payment" target="_blank">http://www.prepbootstrap.com/</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://bbbootstrap.com/snippets/bootstrap-ecommerce-checkout-page-payment-options-50848752" target="_blank">bbbootstrap.com</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://github.com/ODQC" target="_blank">Mi GitHub</a>
              </li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://github.com/ODQC/Examen1PrograIV.git" target="_blank">Repositorio Git del proyecto</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="mailto:oscar.quesada.calderon@est.una.ac.cr">oscar.quesada.calderon@est.una.ac.cr</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="mailto:oscaardanielqc@outlook.es">oscaardanielqc@outlook.es</a></li>
            </ul>
          </div>



        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        <p>Plantilla rediseñada por Oscar Quesada utilizada únicamente con fines académicos.</p>
        &copy; Copyright <strong><span>Squadfree</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/ -->
        Designed by <a href="bootstrapmade.com" target="_blank">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <!--
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  -->
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/rome.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/pagar.js"></script>
  <script src="assets/js/calendar.js"></script>
  <script src="assets/js/ticketController.js"></script>
  <script src="assets/js/Tiquete.js"></script>

</body>

</html>
<script type="text/javascript">
  function CargarTicket() {
    try {
      var ced = <?php echo $idUsuario ?>;
      var idTicket = new Date().getFullYear().toString() + Math.random().toString(36).substring(7);
      var emision = new Date().toISOString().slice(0, 19).replace('T', ' ');
      var espacio = document.getElementById("idEspacio").value;
      var horario = document.getElementById("idhorario").value;

      var salida = document.getElementById("fechaSalida").value;
      var xmlhttp = new XMLHttpRequest();
      

      document.getElementById("1").innerHTML = idTicket;
      document.getElementById("2").innerHTML = espacio;
      document.getElementById("4").innerHTML = horario;
      document.getElementById("6").innerHTML = ced;
      document.getElementById("7").innerHTML = emision;
      document.getElementById("8").innerHTML = salida;
      getBus(horario);
      getRuta(horario);

    } catch (err) {
      alert(err);
    }

  }

  function getBus(id) {

    if (id == 0) {
      document.getElementById("idEspacio").innerHTML = "";
      return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("idEspacio").innerHTML = this.responseText;
      }
    }
    xmlhttp.open("GET", "buscarEspacio.php?q=" + id, true);
    xmlhttp.send();
  }


  function getRuta(id) {

    if (id == 0) {
      document.getElementById("5").innerHTML = "";
      return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("5").innerHTML = this.responseText;
      }
    }
    xmlhttp.open("GET", "buscarRuta.php?q=" + id, true);
    xmlhttp.send();
  }
</script>
<script type="text/javascript">
  function showIdBus(id) {

    if (id == 0) {
      document.getElementById("3").innerHTML = "";
      return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("3").innerHTML = this.responseText;
      }
    }
    xmlhttp.open("GET", "buscarBus.php?q=" + id, true);
    xmlhttp.send();
  }
</script>