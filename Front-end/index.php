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

  <title>Centro Bus Index</title>
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Squadfree - v2.3.1
  * Template URL: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html"><span>Centro Bus</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Inicio</a></li>
          <li><a href="#about">Nosotros</a></li>
          <li><a href="#services">Rutas</a></li>
          <li><a href="#portfolio">Horarios</a></li>
          <li><a href="compraTicket.php">Compra de tiquetes</a></li>
          <li><a href="registrar.php">Registrarse</a></li>
          <li><a href="login.php">Inicie session</a></li>



        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-up">
      <h1>Bienbenido a Centro Bus</h1>
      <h2>Llevamos personas por todo centroamerica</h2>
      <a href="#about" class="btn-get-started scrollto"><i class="bx bx-chevrons-down"></i></a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <div class="content col-xl-5 d-flex align-items-stretch" data-aos="fade-up">
            <div class="content">
              <h3>Nosotros</h3>
              <p>
                Somos una empresa que tranporta personas por todos los pasises de Centro Amenrica.
                <br>En nuestra página podra realizar los siguientes servicios.
              </p>
              <a href="#" class="about-btn">About us <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
          <div class="col-xl-7 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-receipt"></i>
                  <h4>Consulta de Horarios</h4>
                  <p>Consulte los horarios de los diferentes rutas por toda centro America.</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Compre sus tiquetes</h4>
                  <p>Compre sus tiquetes en linea por medio esta página.</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="bx bx-images"></i>
                  <h4>Cree un usuario</h4>
                  <p>Cree su propio usuario y disfrute todos los servicios que nuestra página le ofrece.</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class="bx bx-shield"></i>
                  <h4>Reserve desde cualquier lugar</h4>
                  <p>Ahora puede reservar desde cualquier lugar y escoger el lugar de su preferencia.</p>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Rutas</h2>
          <p>Ofrecemos varias rutas por toda centro America para que las personas se puedan transportar hacia cualquier
            país del continente centroamericano</p>
        </div>

        <table class="table table-hover">

          <thead>
            <tr>
              <th>Rutas</th>
              <th>Origen</th>
              <th>Destino</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $conn = connection();
          
            $sql = "SELECT * FROM `HorariosBus`.`Rutas`";
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
            ?>



      </div>
    </section><!-- End Services Section -->



    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Cree su propio usuario</h3>
          <p>Cree su propio usuario con un click y haga sus reservaciones de tiquetes desde cualquier lugar y acceda a
            todos los servicios que le ofrecemos .</p>
          <a class="cta-btn" href="registrar.php">Registrarse</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Horarios</h2>
          <p>Consulte acerca de nustros horarios regulares de salida que tenemos de lunes a viernes a su disposición
            desde todos los países.</p>
        </div>
        <table class="table table-hover">

          <thead>
            <tr>
              <th>Rutas</th>
              <th>Horarios</th>
              <th>Precios</th>

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
    </section><!-- End Portfolio Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Reserve ya su tiquete</h3>
          <p>Compre su tiquete en linea desde aquí con con tan solo unos minutos desde cualquier lugar y sin hacer filas seleccione el lugar y el horario que más de convenga.</p>
          <a class="cta-btn" href="compraTicket.php">Comprar tiquetes</a>
        </div>

      </div>
    </section><!-- End Cta Section -->



  </main><!-- End #main -->

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
              <li><i class="bx bx-chevron-right"></i> <a href="compraTicket.php">Compra de tiquetes</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="registrar.php">Registrarse</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="login.php">Inicie sessión</a></li>

            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="250">
            <h4>Referencias</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.bootstrapdash.com/product/free-bootstrap-login/" target="_blank">www.bootstrapdash.com</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://www.prepbootstrap.com/bootstrap-template/credit-card-payment" target="_blank">http://www.prepbootstrap.com/</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://bbbootstrap.com/snippets/bootstrap-ecommerce-checkout-page-payment-options-50848752" target="_blank">bbbootstrap.com</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://github.com/ODQC" target="_blank">Mi GitHub</a></li>
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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>