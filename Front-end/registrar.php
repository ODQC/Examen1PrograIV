<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registrarse</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/registrar.css">
</head>

<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="assets/img/registrar-img.jpeg" alt="login image" class="login-img">
        </div>
        <div class="col-sm-6 login-section-wrapper">

          <div class="login-wrapper my-auto">
            <h1 class="login-title">Registrarse</h1>
            <form action="../Back-end/procesos/crearUsuarios.php" method="POST">
              <div class="form-group">
                <label for="idUsuario">Cédula</label>
                <input maxlength="9" type="text" name="idUsuario" id="idUsuario" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="apellido">Primer apellido</label>
                <input type="text" name="apellido1" id="apellido1" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="apellido">Segundo apellido</label>
                <input type="text" name="apellido2" id="apellido2" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="telefono">Número teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="nacionalidad">Indique su nacionalidad</label>
                <select class="form-control" id="nacionalidad" name="nacionalidad">
                  <option value="">--Seleccionar--</option>
                  <option value="Costa Rica">Costa Rica</option>
                  <option value="Honduras">Honduras</option>
                  <option value="Panamá">Panamá</option>
                  <option value="Nicaragua">Nicaragua</option>
                  <option value="El Salvador">El Salvador</option>
                  <option value="Guatemala">Guatemala</option>
                  <option value="otro">otro</option>


                </select>
              </div>
              <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com">
              </div>
              <div class="form-group mb-4">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese su contraseña">
              </div>
              <input name="registrar" id="registrar" class="btn btn-block login-btn" type="submit" value="Registrar">
            </form>

            <p class="login-wrapper-footer-text"><a href="index.php" class="text-reset">Volver a inicio</a></p>
          </div>
        </div>

      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>