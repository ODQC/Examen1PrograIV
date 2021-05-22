<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ingresar</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">

          <div class="login-wrapper my-auto">
            <h1 class="login-title">Iniciar sesión</h1>
            <h3>Centro Bus.</h3>
            <h6> <br> <br> Bienvenido por favor ingrese sus credenciales.</h6>
            <form action="login.php" method="POST">
              <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com">
              </div>
              <div class="form-group mb-4">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese su contraseña">
              </div>
              <input name="ingresar" id="ingresar" class="btn btn-block login-btn" type="submit" value="Ingresar">
            </form>

            <p class="login-wrapper-footer-text">No tiene una cuenta? <a href="registrar.html" class="text-reset">Registrese aquí</a></p>
            <p class="login-wrapper-footer-text"><a href="index.php" class="text-reset">Volver a inicio</a></p>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="assets/img/login Background.jpeg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <?php
  if (isset($_POST['email']) && isset($_POST['password'])) {
    require_once "../Back-end/php/connect.php";
    require_once "../Back-end/procesos/login.php";
  }
  ?>
</body>

</html>