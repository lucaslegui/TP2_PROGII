<?php
//eliminar usuario
include_once("../Class/Conexion.php");
$conexion = new Conexion();
$pdo = $conexion->getConexion();

//eliminar usuario
if (isset($_GET['accion']) && $_GET['accion'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM users WHERE id_user = :id");

    $result = $stmt->execute(['id' => $id]);

    if ($result) {
        echo '<script>window.location.href = "panel.php?modulo=users";</script>';
        exit();
    } else {

        echo "Error al eliminar el usuario.";
    }
}
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios</h1>
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
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Acciones
                                            <a href="panel.php?modulo=users&accion=add" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include_once("../Class/Conexion.php");
                                    $conexion = new Conexion();
                                    $pdo = $conexion->getConexion();
                                    $stmt = $pdo->prepare("SELECT id_user, email_user, name_user FROM users;");
                                    $stmt->execute();
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['name_user'] . "</td>";
                                        echo "<td>" . $row['email_user'] . "</td>";
                                        echo "<td><a href='panel.php?modulo=users&accion=edit&id=" . $row['id_user'] . "'>Editar</a> | <a href='panel.php?modulo=users&accion=delete&id=" . $row['id_user'] . "'>Eliminar</a></td>";
                                        echo "</tr>";
                                    }
                                    ?>

                                </tbody>
                            </table>
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