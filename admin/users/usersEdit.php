<?php
include_once("../Class/Conexion.php");
$conexion = new Conexion();
$pdo = $conexion->getConexion();
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT id_user, email_user, name_user FROM users WHERE id_user = :id;");
$stmt->execute(['id' => $id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if (isset($_POST['guardar'])) {
    $name_user = $_POST['name_user'];
    $email_user = $_POST['email_user'];
    $password_user = $_POST['password_user'];
    $stmt = $pdo->prepare("UPDATE users SET name_user = :name_user, email_user = :email_user, password_user = :password_user WHERE id_user = :id;");
    $stmt->execute(['name_user' => $name_user, 'email_user' => $email_user, 'password_user' => $password_user, 'id' => $id]);
    echo '<script>window.location.href = "panel.php?modulo=users";</script>';
    exit();
}

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>EDITAR USUARIO</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <label for="name_user">Nombre</label>
                                    <input type="text" class="form-control" name="name_user" id="name_user" placeholder="Nombre" value="<?php echo $row['name_user'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email_user">Email</label>
                                    <input type="email" class="form-control" name="email_user" id="email_user" placeholder="Email" value="<?php echo $row['email_user'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="name_user">Contraseña</label>
                                    <input type="password" class="form-control" name="password_user" id="password_user" placeholder="Contraseña" required>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $row['id_user'] ?>">
                                    <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
</div>