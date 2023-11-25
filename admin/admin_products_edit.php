<?php
//editar productos
include_once("../Class/Conexion.php");
$conexion = new Conexion();
$pdo = $conexion->getConexion();

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT id_product, name_product, category_product, description_product, made_of_product, image_product, price_product, exist_product FROM products WHERE id_product = :id;");
$stmt->execute(['id' => $id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// procesar el formulario al guardar los cambios
if (isset($_POST['guardar'])) {
    $name_product = $_POST['name_product'];
    $category_product = $_POST['category_product'];
    $description_product = $_POST['description_product'];
    $made_of_product = $_POST['made_of_product'];
    $price_product = $_POST['price_product'];
    $exist_product = $_POST['exist_product'];
    $image_product = $_POST['image_product_actual']; // 

    // procesar la carga de la imagen
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

    // actualizar la base de datos
    $stmt = $pdo->prepare("UPDATE products SET name_product = :name_product, category_product = :category_product, description_product = :description_product, made_of_product = :made_of_product, image_product = :image_product, price_product = :price_product, exist_product = :exist_product WHERE id_product = :id;");
    $stmt->execute(['name_product' => $name_product, 'category_product' => $category_product, 'description_product' => $description_product, 'made_of_product' => $made_of_product, 'image_product' => $image_product, 'price_product' => $price_product, 'exist_product' => $exist_product, 'id' => $id]);


    echo '<script>window.location.href = "panel.php?modulo=products";</script>';
    exit();
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>EDITAR PRODUCTO</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="#" method="post" enctype="multipart/form-data">                             
                                <div class="form-group">
                                    <label for="name_product">Nombre</label>
                                    <input type="text" class="form-control" name="name_product" id="name_product" placeholder="Nombre" value="<?php echo $row['name_product'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="categoria">Categoría</label>
                                    <select class="form-control" id="categoria" name="category_product">
                                        <option value="<?php echo $row['category_product'] ?>"><?php echo $row['category_product'] ?></option>
                                        <option value="pan">Pan</option>
                                        <option value="cupcakes">Cupcakes</option>
                                        <option value="tortas">Tortas</option>
                                        <option value="galletas">Galletas</option>
                                        <option value="brownie">Brownie</option>
                                        <option value="tartas">Tartas</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description_product">Descripcion</label>
                                    <input type="text" class="form-control" name="description_product" id="description_product" placeholder="Descripcion" value="<?php echo $row['description_product'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="made_of_product">Ingredientes</label>
                                    <input type="text" class="form-control" name="made_of_product" id="made_of_product" placeholder="Ingredientes" value="<?php echo $row['made_of_product'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="image_product">Imagen</label>
                                    <div>
                                        <img src="<?php echo $row['image_product']; ?>" height="100" alt="Imagen Actual">
                                    </div>
                                    <input type="file" class="form-control" name="image_product" id="image_product">
                                </div>
                                <div class="form-group">
                                    <label for="price_product">Precio</label>
                                    <input type="text" class="form-control" name="price_product" id="price_product" placeholder="Precio" value="<?php echo $row['price_product'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exist_product">Existencia</label>
                                    <input type="text" class="form-control" name="exist_product" id="exist_product" placeholder="Existencia" value="<?php echo $row['exist_product'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $row['id_product'] ?>">
                                    <button type="submit" class="btn btn-primary" name="guardar">Guardar Cambios</button>
                                </div>
                                <input type="hidden" name="image_product_actual" value="<?php echo $row['image_product']; ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>