<?php

session_start();

require_once("../Class/Conexion.php");

$conexion = new Conexion();
$pdo = $conexion->getConexion();

if (isset($_REQUEST['login'])) {
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];

  $stmt = $pdo->prepare("SELECT * FROM users WHERE email_user = :email AND password_user = :password");
  $stmt->execute(['email' => $email, 'password' => $password]);

  if ($stmt->rowCount() > 0) {

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user_id'] = $user['id_user'];
    $_SESSION['user_name'] = $user['name_user'];
    header('Location: panel.php');
    exit();

  } else {
    $error = "<script>$(document).ready(function() { $('#errorToast').toast('show'); });</script>";
    // activa el toast
  }
}

?>

<!DOCTYPE html>
<html lang="es_AR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>VanylaCakes | Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <h2><b>Vanyla</b>Admin</h2>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Logueate para iniciar sesion</p>

        <form method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
          <!-- toast error -->
          <div id="errorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <strong class="mr-auto">Error</strong>
            </div>
            <div class="toast-body bg-danger">
              Usuario o contraseña incorrectos.
            </div>
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>

  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>


  <?php if (isset($error)) echo $error; ?>
</body>

</html>