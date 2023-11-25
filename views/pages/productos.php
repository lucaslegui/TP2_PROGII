<?php
include_once("Class/Conexion.php");
$conexion = new Conexion();
$pdo = $conexion->getConexion();
$stmt = $pdo->prepare("SELECT id_product, name_product, description_product, price_product, image_product FROM products;");
$stmt->execute();

?>

<section id="productos">
    <h2>Podes conocer y comprar nuestros productos acá</h2>
    <div class="row">
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='col-lg-4 col-md-6 col-sm-12 mb-4'>";
            echo "<div class='card'>";
            echo "<img src='./admin/" . $row['image_product'] . "' class='card-img-top'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $row['name_product'] . "</h5>";
            echo "<p class='card-text'>" . $row['description_product'] . "</p>";
            echo "<p class='card-text'>$" . $row['price_product'] . "</p>";
            echo "<a href='#' class='btn btn-primary'>Agregar al carrito</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
</section>
