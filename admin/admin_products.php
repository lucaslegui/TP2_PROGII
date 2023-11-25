<?php
include_once("../Class/Conexion.php");
$conexion = new Conexion();
$pdo = $conexion->getConexion();

//manejar las imagenes
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name_product = $_POST['name_product'];
    $category_product = $_POST['category_product'];
    $description_product = $_POST['description_product'];
    $price_product = $_POST['price_product'];
    $exist_product = $_POST['exist_product'];
    $image_product = ''; // inicia como cadena vacia
        //mover la imagen insertada en el file
    if (isset($_FILES['image_product']) && $_FILES['image_product']['error'] == 0) {
        $directorioDestino = "img_products/";
        $nombreArchivo = basename($_FILES['image_product']['name']);
        $rutaArchivo = $directorioDestino . $nombreArchivo;

        if (move_uploaded_file($_FILES['image_product']['tmp_name'], $rutaArchivo)) {
            $image_product = $rutaArchivo;
        } else {
            echo "Hubo un error al subir el archivo.";
        }
    }

    // Insertar en la base de datos
    $stmt = $pdo->prepare("INSERT INTO products (name_product, category_product, description_product, image_product, price_product, exist_product) VALUES (:name_product, :category_product, :description_product, :image_product, :price_product, :exist_product);");
    $stmt->execute(['name_product' => $name_product, 'category_product' => $category_product, 'description_product' => $description_product, 'image_product' => $image_product, 'price_product' => $price_product, 'exist_product' => $exist_product]);
    echo '<script>window.location.href = "panel.php?modulo=products";</script>';
    exit();
}

//eliminar productos
if (isset($_GET['accion']) && $_GET['accion'] == 'delete') {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM products WHERE id_product = :id;");
    $stmt->execute(['id' => $id]);
    echo '<script>window.location.href = "panel.php?modulo=products";</script>';
    exit();
}

?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">                      
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Categoria</th>
                                        <th>Nombre del producto</th>
                                        <th>Descripcion</th>
                                        <th>Imagen</th>
                                        <th>Precio</th>
                                        <th>Existencia</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include_once("../Class/Conexion.php");
                                    $conexion = new Conexion();
                                    $pdo = $conexion->getConexion();
                                    $stmt = $pdo->prepare("SELECT id_product, category_product, name_product, description_product, image_product, price_product, exist_product FROM products;");
                                    $stmt->execute();

                                    if ($stmt->rowCount() > 0) {

                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['category_product'] . "</td>";
                                            echo "<td>" . $row['name_product'] . "</td>";
                                            echo "<td>" . $row['description_product'] . "</td>";
                                            echo "<td>" . $row['image_product'] . "</td>";
                                            echo "<td>" . $row['price_product'] . "</td>";
                                            echo "<td>" . $row['exist_product'] . "</td>";
                                            echo "<td>";
                                            echo "<a href='panel.php?modulo=products&accion=edit&id=" . $row['id_product'] . "' class='btn btn-warning'><i class='fas fa-edit'></i></a>";
                                            echo "<a href='panel.php?modulo=products&accion=delete&id=" . $row['id_product'] . "' class='btn btn-danger'><i class='fas fa-trash'></i></a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        // si no hay productos
                                        echo "<tr><td colspan='6'>No hay productos disponibles.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                                <div class="col-sm-6">
                                    <h2>PRODUCTOS</h1>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
                                        Agregar Producto
                                    </button>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Agregar Producto -->
    <div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Agregar Nuevo Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para agregar producto -->
                    <form id="formAgregarProducto" action="#" method="post" enctype="multipart/form-data">
                        <!-- Agregar productos al formulario -->
                        <div class="form-group">
                            <label for="nombre">Nombre del producto</label>
                            <input type="text" class="form-control" id="nombre" name="name_product" placeholder="Ingrese el nombre del producto">
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoría</label>
                            <select class="form-control" id="categoria" name="category_product">
                                <option value="">Seleccione una categoría</option>
                                <option value="pan">Pan</option>
                                <option value="cupcakes">Cupcakes</option>
                                <option value="tortas">Tortas</option>
                                <option value="galletas">Galletas</option>
                                <option value="brownie">Brownie</option>
                                <option value="tartas">Tartas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="description_product" rows="3" placeholder="Ingrese una descripción del producto"></textarea>
                        </div>
                        <!-- imagen del producto -->
                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" class="form-control-file" id="imagen" name="image_product">

                        </div>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="number" class="form-control" id="precio" name="price_product" placeholder="Ingrese el precio del producto">
                        </div>
                        <!-- exitencia del producto -->
                        <div class="form-group">
                            <label for="existencia">Existencia</label>
                            <input type="number" class="form-control" id="existencia" name="exist_product" placeholder="Ingrese la existencia del producto">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" form="formAgregarProducto" class="btn btn-primary" name="guardar">Guardar Producto</button>
                </div>
            </div>
        </div>
    </div>
    
</div>