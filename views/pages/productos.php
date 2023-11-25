<?php
include_once("Class/Conexion.php");
$conexion = new Conexion();
$pdo = $conexion->getConexion();
$stmt = $pdo->prepare("SELECT id_product, name_product, description_product, made_of_product, price_product, image_product FROM products;");
$stmt->execute();

?>

<section id="productos">
    <h2>Podes conocer y comprar nuestros productos acá</h2>
    <div class="row">
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='col-lg-4 col-md-6 col-sm-12 mb-4'>";
            echo "<div class='card'>";
            echo "<img src='./admin/" . $row['image_product'] . "' class='card-img-top product-image'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $row['name_product'] . "</h5>";
            echo "<p class='card-text'>" . $row['description_product'] . "</p>";
            echo "<p class='card-text'>$" . $row['price_product'] . "</p>";
            echo "<a href='#' class='btn btn-primary'>Agregar al carrito</a>";
            echo " <button type='button' class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#modalDetalleProducto-" . $row['id_product'] . "'>Detalles</button>";
            echo "</div>";
            echo "</div>";

            // Modal para cada producto
            echo "<div class='modal fade' id='modalDetalleProducto-" . $row['id_product'] . "' tabindex='-1' aria-labelledby='modalDetalleLabel' aria-hidden='true'>";
            echo "<div class='modal-dialog'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h5 class='modal-title' id='modalDetalleLabel'>" . $row['name_product'] . "</h5>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
            echo "</div>";
            echo "<div class='modal-body'>";
            echo "<img src='./admin/" . $row['image_product'] . "' class='img-fluid'>";
            echo "<p>Descripción: " . $row['description_product'] . "</p>";
            echo "<p>Ingredientes: " . $row['made_of_product'] . "</p>";
            echo "<p>Precio: $" . $row['price_product'] . "</p>";
            echo "</div>";
            echo "<div class='modal-footer'>";
            echo "<a href='#' class='btn btn-primary'>Agregar al carrito</a>";
            echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

            echo "</div>"; // Fin columna
        }
        ?>
    </div>
</section>

