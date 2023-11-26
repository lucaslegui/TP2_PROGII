<?php
include_once("Class/Conexion.php");
include_once("Class/Productos.php");

$conexion = new Conexion();
$pdo = $conexion->getConexion();
$productos = new Productos($pdo);

//enviar el tipo de filtro seleccionado a Productos
$tipoFiltro = isset($_GET['tipo']) ? $_GET['tipo'] : 'all';
$listaProductos = $productos->obtenerProductos($tipoFiltro);
?>

<section id="productos">
    <h2>Podes conocer y comprar nuestros productos acá</h2>
    <p>Te mostramos todos los productos que tenemos disponibles para que puedas comprarlos y disfrutarlos en tu casa.</p>

    <!-- filtrar productos por categoria -->
    <div class="filtro m-5">
        <form action="index.php?page=productos#productos" method="GET">
            <select name="tipo">
                <option value="all">Todos</option>
                <option value="tortas" <?php echo $tipoFiltro == 'tortas' ? 'selected' : ''; ?>>Tortas</option>
                <option value="pan" <?php echo $tipoFiltro == 'pan' ? 'selected' : ''; ?>>Panes</option>
                <option value="brownie" <?php echo $tipoFiltro == 'brownie' ? 'selected' : ''; ?>>Brownies</option>
                <option value="galletas" <?php echo $tipoFiltro == 'galletas' ? 'selected' : ''; ?>>Galletas</option>
                <option value="cupcakes" <?php echo $tipoFiltro == 'cupcakes' ? 'selected' : ''; ?>>Cupcakes</option>
            </select>
            <input type="submit" value="Filtrar">
            <input type="hidden" name="page" value="productos">
        </form>
    </div>

    <div class="row">
        <?php
        foreach ($listaProductos as $producto) {
            echo "<div class='col-lg-4 col-md-6 col-sm-12 mb-4'>";
            echo "<div class='card'>";
            echo "<img src='./admin/" . $producto['image_product'] . "' class='card-img-top product-image'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $producto['name_product'] . "</h5>";
            echo "<p class='card-text text-descripcion'>" . $producto['description_product'] . "</p>";
            echo "<p class='card-text text-precio'>$" . $producto['price_product'] . "</p>";
            echo "<a href='#' class='btn btn-primary'>Agregar al carrito</a>";
            echo " <button type='button' class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#modalDetalleProducto-" . $producto['id_product'] . "'>Detalles</button>";
            echo "</div>";
            echo "</div>";

            // modal para cada producto
            echo "<div class='modal fade' id='modalDetalleProducto-" . $producto['id_product'] . "' tabindex='-1' aria-labelledby='modalDetalleLabel' aria-hidden='true'>";
            echo "<div class='modal-dialog'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h5 class='modal-title' id='modalDetalleLabel'>" . $producto['name_product'] . "</h5>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
            echo "</div>";
            echo "<div class='modal-body'>";
            echo "<img src='./admin/" . $producto['image_product'] . "' class='img-fluid'>";
            echo "<p class='text-descripcion mt-4'>Descripción: " . $producto['description_product'] . "</p>";
            echo "<p class='text-descripcion'>Ingredientes: " . $producto['made_of_product'] . "</p>";
            echo "<p class='text-precio'>Precio: $" . $producto['price_product'] . "</p>";
            echo "</div>";
            echo "<div class='modal-footer'>";
            echo "<a href='#' class='btn btn-primary'>Agregar al carrito</a>";
            echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
</section>